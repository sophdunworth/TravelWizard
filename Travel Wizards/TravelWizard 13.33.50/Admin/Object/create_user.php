<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $user = new User();
    if ($user->createUser($username, $email, $password)) {
        echo "User created successfully!";
    } else {
        echo "Error creating user.";
    }
}
?>
<form action="create_user.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Create User</button>
</form>