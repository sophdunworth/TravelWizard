<?php 
ob_start(); // Start output buffering to allow for safe header redirects
 
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 
// Enable error reporting for debugging 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
require 'db.php'; // Database connection
 
$error = ""; // Initialize error variable
 
// Only process the form if it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and normalize input
    $email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
 
    try {
        // Prepare a secure SQL statement to fetch user by email
        $stmt = $pdo->prepare("SELECT userID, password FROM Users WHERE email = :email");
        $stmt->execute([':email' => $email]);
 
        // Fetch the user record
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // If user is found and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Store user data in session variables
            $_SESSION['userid'] = $user['userID'];
            $_SESSION['email'] = $email;
 
            // Redirect to the originally requested page or default page
            $redirectPage = $_SESSION['redirect_after_login'] ?? '../AfterLogin/index.php';
            unset($_SESSION['redirect_after_login']); // Clear redirect session key
 
            header("Location: " . $redirectPage);
            exit(); // Terminate script after redirect
        } else {
            // Authentication failed
            $error = "Invalid email or password.";
        }
    } catch (PDOException $e) {
        // Handle database connection or query errors
        $error = "Database error: " . htmlspecialchars($e->getMessage());
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
<body>
<?php include 'templates/header1.php'; ?> 

<div class="login-container">
    <h2>User Login</h2>

    <!-- Display error message if login fails -->
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Login form -->
    <form action="login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <p>
        Don't have an account?
        <a href="register.php"><button type="button">Create an Account</button></a>
    </p>
</div>
<?php include 'templates/footer.php'; ?> 

</body>
</html>

