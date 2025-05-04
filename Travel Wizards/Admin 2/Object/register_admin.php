<?php
require_once 'db1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $userType = $_POST['userType']; // customer or admin

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, userType) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $userType);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form action="register.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <select name="userType">
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Register</button>
</form>
