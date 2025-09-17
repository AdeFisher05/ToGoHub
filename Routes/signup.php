<?php
require './header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hostname = "localhost";
    $dbname = "vlpngco2_site_users";
    $username = "vlpngco2_togohub";
    $password = "@+3+UbdqHU^4W}[r";
    $dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8mb4";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Collect and sanitize inputs
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $otherName = htmlspecialchars(trim($_POST['otherName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $passwordRaw = $_POST['password'];
        $psword = password_hash($passwordRaw, PASSWORD_DEFAULT);

        // Prepare and execute insert
        $stmt = $db->prepare("INSERT INTO users (firstName, otherName, lastName, email, psword) 
                              VALUES (:firstName, :otherName, :lastName, :email, :psword)");
        $stmt->execute([
            ':firstName' => $firstName,
            ':otherName' => $otherName,
            ':lastName' => $lastName,
            ':email' => $email,
            ':psword' => $psword
        ]);
        echo "User inserted successfully";
        echo "<p>Signup successful!</p>";
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }

    $db = null;
}
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
