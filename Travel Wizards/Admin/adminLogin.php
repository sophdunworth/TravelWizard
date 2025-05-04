<?php
session_start();
require 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        // NOW: check user_type instead of type
        $query = $pdo->prepare("SELECT * FROM users WHERE email = ? AND user_type = 'admin'");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Store admin session
            $_SESSION['admin_id'] = $user['userID'];
            $_SESSION['admin_name'] = $user['username'];

            header("Location: Object/dashboard.php");
            exit;
        } else {
            $error = "Invalid admin email or password.";
        }
    } else {
        $error = "Please fill in both fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Object/css/Admin.css">
    <title>Admin Login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .container { max-width: 300px; margin: auto; }
        input { width: 100%; padding: 10px; margin: 5px 0; }
        button { width: 100%; padding: 10px; background: blue; color: white; border: none; }
        .error { color: red; }
    </style>
</head>
<body>

<div class="container">
    <h2>Admin Login</h2>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    
    <form action="adminLogin.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>


