<?php
session_start();
require './header.php';

// Load DB config
$config = require __DIR__ . '/config.php';

// Generate CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // ✅ CSRF check
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new Exception("Invalid form submission");
        }

        // Collect inputs
        $emailOrUser = trim($_POST['email']);
        $passwordRaw = trim($_POST['password']);  // ✅ added trim

        // DB connection
        $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset={$config['db']['charset']}";
        $db = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        // ✅ Fetch user
        $stmt = $db->prepare("SELECT UserID, firstName, lastName, email, psword FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $emailOrUser]);
        $user = $stmt->fetch();

        if (!$user) {
            throw new Exception("No account found with that email");
        }

        // ✅ Verify password
        if (!password_verify($passwordRaw, $user['psword'])) {
            // Debugging hint (remove in production)
            // echo "Entered: " . htmlspecialchars($passwordRaw) . "<br>Stored: " . htmlspecialchars($user['psword']);
            throw new Exception("Incorrect password");
        }

        // ✅ Set session
        $_SESSION['user'] = [
            'UserID'        => $user['UserID'],
            'firstName' => $user['firstName'],
            'lastName'  => $user['lastName'],
            'email'     => $user['email'],
        ];

        // Redirect
        header("Location: home.php");
        exit;

    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage());
        echo "<p style='color:red;'>Login failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

?>

<section class="container login">
    <h2>Login</h2>
    <form action="" method="post">
        <!-- ✅ Include CSRF token -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        
        <button type="submit">Login</button>
        <p>
            <span>Don't have an account?</span>
            <a href="./signup.php">Signup</a>
        </p>
    </form>
</section>

<?php
require './footer.php';
?>

