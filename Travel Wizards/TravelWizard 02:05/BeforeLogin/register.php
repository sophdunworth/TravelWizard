<?php 
include 'templates/header1.php'; 
require_once 'db.php'; 
require_once '../Admin/Object/db1.php'; 
require_once '../Admin/Object/classes/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $dob = trim($_POST['dob']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<p style='color:red;'>Error: Passwords do not match.</p>";
    } else {
        // Encrypt password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Check if username already exists
            $check_username = "SELECT userID FROM Users WHERE username = ?";
            $stmt = $pdo->prepare($check_username);
            $stmt->execute([$username]);
            if ($stmt->rowCount() > 0) {
                throw new Exception("Username already taken. Please choose another.");
            }

            // Check if email already exists
            $check_email = "SELECT userID FROM Users WHERE email = ?";
            $stmt = $pdo->prepare($check_email);
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                throw new Exception("Email already registered.");
            }

            // Insert into Users table
            $insert_user = "INSERT INTO Users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($insert_user);
            $stmt->execute([$username, $email, $hashed_password]);
            $user_id = $pdo->lastInsertId();

            // Insert into Customers table
            $insert_customer = "INSERT INTO Customers (userID, username, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($insert_customer);
            $stmt->execute([$user_id, $username, $email, $hashed_password]);

            // Redirect to login page
            header("Location: login.php");
            exit();
        } catch (Exception $e) {
            echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Travel Wizard</title>
    <link rel="stylesheet" href="css/Login.css">
    </head>
    
<div class="login-container">
    <h2>Create an Account</h2>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="name">First Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <input type="submit" value="Register">
    </form>

    <p>Already have an account?
        <a href="login.php"><button type="button">Login Here</button></a>
    </p>
</div>

<?php include 'templates/footer.php'; ?>

</html>
