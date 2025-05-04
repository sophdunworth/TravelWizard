<?php
// Start the session to manage login state
session_start();

// Include the database connection file
require '../AfterLogin/db.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from POST data, defaulting to empty strings if not set
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Only proceed if both email and password fields are not empty
    if (!empty($email) && !empty($password)) {
        // Prepare a SQL query to fetch an admin user with the provided email
        $query = $pdo->prepare("SELECT * FROM users WHERE email = ? AND user_type = 'admin'");
        $query->execute([$email]);

        // Fetch the user as an associative array
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Verify the password against the hashed password stored in the database
        if ($user && password_verify($password, $user['password'])) {
            // Store admin's ID and name in session variables
            $_SESSION['admin_id'] = $user['userID'];
            $_SESSION['admin_name'] = $user['username'];

            // Redirect to the admin dashboard
            header("Location: Object/dashboard.php");
            exit;
        } else {
            // Set error message for incorrect email or password
            $error = "Invalid admin email or password.";
        }
    } else {
        // Set error message if any field is empty
        $error = "Please fill in both fields.";
    }
}
?>

<!-- HTML for Admin Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Object/css/Admin.css">
    <title>Admin Login</title>
    <style>
        /* Inline CSS styling for login form */
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .container { max-width: 300px; margin: auto; }
        input { width: 100%; padding: 10px; margin: 5px 0; }
        button { width: 100%; padding: 10px; background: blue; color: white; border: none; }
        .error { color: red; }
    </style>
</head>
<body>

<!-- Login form container -->
<div class="container">
    <h2>Admin Login</h2>

    <!-- Display error message if set -->
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    
    <!-- Admin login form -->
    <form action="adminLogin.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>


