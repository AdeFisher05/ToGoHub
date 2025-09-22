<?php
session_start();
require './header.php';
$config = require __DIR__ . '/config.php';

if (!isset($_SESSION['pending_email'])) {
    echo "<p style='color:red;'>No pending verification. Please signup again.</p>";
    exit;
}

$email = $_SESSION['pending_email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = trim($_POST['otp']);

    try {
        $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
        $db = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        // check OTP and expiry
        $stmt = $db->prepare("SELECT otp, otp_expires FROM users WHERE email = :email AND is_verified = 0 LIMIT 1");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch();

        if ($row) {
            if ($row['otp'] == $otp && strtotime($row['otp_expires']) > time()) {
                //  verify user
                $update = $db->prepare("UPDATE users SET is_verified = 1, otp = NULL, otp_expires = NULL WHERE email = :email");
                $update->execute([':email' => $email]);

                unset($_SESSION['pending_email']);
                echo "<p style='color:green;'>Email verified successfully!</p>";
                header("Location: ./login");
            } elseif ($row['otp'] == $otp) {
                echo "<p style='color:red;'>OTP expired. Please signup again.</p>";
            } else {
                echo "<p style='color:red;'>Invalid OTP. Please try again.</p>";
            }
        } else {
            echo "<p style='color:red;'>No pending verification found.</p>";
        }
    } catch (PDOException $e) {
        error_log("DB Error: " . $e->getMessage());
        echo "<p style='color:red;'>Something went wrong. Please try again later.</p>";
    }
}
?>

<div class="container verify">
  <h2>Verify Email</h2>
  <form action="" method="post">
    <input type="text" name="otp" placeholder="Enter OTP" required />
    <button type="submit" >Verify</button>
  </form>
</div>

<?php require './footer.php'; ?>
