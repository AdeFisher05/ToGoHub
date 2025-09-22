<?php
session_start();
require './header.php';
require './vendor/autoload.php'; // PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$config = require __DIR__ . '/config.php';

// ✅ Generate CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ✅ CSRF check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("<p style='color:red;'>Invalid form submission</p>");
    }

    try {
        // DB connection
        $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
        $db = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        // collect & sanitize inputs
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $otherName = htmlspecialchars(trim($_POST['otherName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $passwordRaw = $_POST['password'];

        // ✅ Validation
        if (!$email) {
            throw new Exception("Invalid email format");
        }

        // Strong password check
        $passwordPattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/";
        if (!preg_match($passwordPattern, $passwordRaw)) {
            throw new Exception("Password must be at least 8 characters long and contain at least one letter, one number, and one special character.");
        }


        $psword = password_hash($passwordRaw, PASSWORD_DEFAULT);

        // prevent duplicate registration
        $check = $db->prepare("SELECT UserID FROM users WHERE email = :email LIMIT 1");
        $check->execute([':email' => $email]);
        if ($check->fetch()) {
            throw new Exception("Email already registered");
        }

        // generate OTP + expiry
        $otp = random_int(100000, 999999);
        $expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        // prepare mail
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $config['smtp']['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['smtp']['user'];
        $mail->Password = $config['smtp']['pass'];
        $mail->SMTPSecure = $config['smtp']['secure'];
        $mail->Port = $config['smtp']['port'];


        $mail->setFrom('noreply@togohub.ng', 'Togohub');
        $mail->addAddress($email, $firstName . ' ' . $lastName);

        $mail->isHTML(true);
        $mail->Subject = "Verify your email";
        $mail->Body = "<p>Your OTP is: <strong>$otp</strong><br>
                          This code will expire in 10 minutes.</p>";

        // ✅ Try sending email BEFORE inserting user
        if ($mail->send()) {
            // insert user only if email sent
            $stmt = $db->prepare("INSERT INTO users (firstName, otherName, lastName, email, psword, otp, otp_expires, is_verified) 
                                  VALUES (:firstName, :otherName, :lastName, :email, :psword, :otp, :otp_expires, 0)");
            $stmt->execute([
                ':firstName' => $firstName,
                ':otherName' => $otherName,
                ':lastName' => $lastName,
                ':email' => $email,
                ':psword' => $psword,
                ':otp' => $otp,
                ':otp_expires' => $expiry
            ]);

            $_SESSION['pending_email'] = $email;
            header("Location: verify.php");
            exit;
        } else {
            // cleanup session if email fails
            unset($_SESSION['pending_email']);
            echo "<p style='color:red;'>Signup failed: Could not send OTP. Please try again later.</p>";
        }

    } catch (PDOException $e) {
        error_log("DB Error: " . $e->getMessage());
        echo "<p style='color:red;'>Something went wrong. Please try again later.</p>";
    } catch (Exception $e) {
        error_log("App Error: " . $e->getMessage());
        echo "<p style='color:red;'>Signup failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<div class="container signup">
    <h2>Signup</h2>
    <form action="" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="text" name="firstName" placeholder="First Name" required />
        <input type="text" name="otherName" placeholder="Other Name"  />
        <input type="text" name="lastName" placeholder="Last Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <label>
            <input type="checkbox" required />
            <p>
                By creating an account, I agree to this website's
                <a href="">privacy policy</a> and <a href="">terms of service</a>
            </p>
        </label>
        <button type="submit">Signup</button>
    </form>
</div>

<?php require './footer.php'; ?>