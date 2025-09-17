<?php

session_start();
require './header.php';


// Load DB config
$config = require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ✅ CSRF check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("<p>Invalid form submission</p>");
    }

    try {
        // DB connection
        $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
        $db = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        // Collect inputs
        $firstName  = trim($_POST['firstName']);
        $otherName  = trim($_POST['otherName']);
        $lastName   = trim($_POST['lastName']);
        $email      = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $passwordRaw = $_POST['password'];

        // ✅ Validation
        if (!$email) {
            throw new Exception("Invalid email format");
        }
        if (strlen($passwordRaw) < 8) {
            throw new Exception("Password must be at least 8 characters");
        }

        // Hash password
        $psword = password_hash($passwordRaw, PASSWORD_DEFAULT);

        // ✅ Check if email already exists
        $check = $db->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
        $check->execute([':email' => $email]);
        if ($check->fetch()) {
            throw new Exception("Email already registered");
        }

        // Insert user
        $stmt = $db->prepare("INSERT INTO users (firstName, otherName, lastName, email, psword) 
                              VALUES (:firstName, :otherName, :lastName, :email, :psword)");
        $stmt->execute([
            ':firstName' => htmlspecialchars($firstName),
            ':otherName' => htmlspecialchars($otherName),
            ':lastName'  => htmlspecialchars($lastName),
            ':email'     => $email,
            ':psword'    => $psword
        ]);

        // Redirect on success
        header("Location: login.php?signup=success");
        exit;

    } catch (Exception $e) {
        // Log real error (to a file)
        error_log("Signup error: " . $e->getMessage());
        echo "<p style='color:red;'>Signup failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

// ✅ Generate CSRF token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));


?>
<div class="container signup">
      <h2>Signup</h2>
      <form action="" method="post">
        <input type="text" id="firstName" name="firstName" placeholder="First Name" required />
        <input type="text" id="otherName" name="otherName" placeholder="Other Name" required />
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required />
        <input type="email" id="email" name="email" placeholder="Email" required />
        <input type="password" id="password" name="password" placeholder="Password" required />
        <label for="">
          <input type="checkbox" name="" id="" required />
          <p>
          By creating an account, I agree to this website's
          <a href="">privacy policy</a> and <a href="">terms of service</a>
          </p>
        </label>
        <button type="submit">Signup</button>
      </form>
    </div>
    <?php
    require '../footer.php';

    
    // Set the hostname for MySQL (e.g., 'localhost' or an IP address)
//     $hostname = "localhost";

// // Set the database name
//     $dbname = "vlpngco2_ccuser";

// // Set the username and password with permissions to the database
//     $username = "vlpngco2_ccuser";
//     $password = "Aderinola05#";

// // Create the DSN for MySQL
//     $dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8mb4";

// // Create a PDO object
//     try {
//         $db = new PDO($dsn, $username, $password);
//         echo "Connection successful!";
//         $firstName = $_POST['firstName'];
//         $otherName = $_POST['otherName'];
//         $lastName = $_POST['lastName'];
//         $email = $_POST['email'];
//         $psword = $_POST['password'];
//         $newUserQuery = $db->prepare('INSERT INTO Users (firstName, otherName, lastName, email, psword) VALUES 
//         (:firstName, :otherName, :lastName, :email, :psword)');
//         $newUserQuery->execute(['firstName' => $firstName, 'otherName' => $otherName, 'lastName' => $lastName,
//         'email' => $email, 'psword' => $psword]);

//     } catch (PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//     }

// // Terminate db connection
//     $db = null;
    ?>
