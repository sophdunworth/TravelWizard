<?php 
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php'; // this gives us $pdo now

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

    try {
        $stmt = $pdo->prepare("SELECT userID, password FROM Users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['userID'];
            $_SESSION['email'] = $email;

            $redirectPage = $_SESSION['redirect_after_login'] ?? '../AfterLogin/index.php';
            unset($_SESSION['redirect_after_login']);

            header("Location: " . $redirectPage);
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
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

    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

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
