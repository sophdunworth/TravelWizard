<?php
require_once 'db1.php';
require_once 'classes/User.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: text/plain');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : 0;
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $userType = isset($_POST['user_type']) ? trim($_POST['user_type']) : '';

    // Validate inputs
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "❌ Invalid email format.";
        exit;
    }

    if (empty($username)) {
        echo "❌ Username cannot be empty.";
        exit;
    }

    if (!in_array($userType, ['customer', 'admin'])) {
        echo "❌ Invalid user type.";
        exit;
    }

    try {
        $user = new User($conn, $userID);
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setUserType($userType);
        echo "✅ User details have been updated and saved.";
        exit;
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User Info</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<h2>Update User Info</h2>

<form id="updateForm">
    <label for="userID">User ID:</label><br>
    <input type="number" name="userID" id="userID" required><br><br>

    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="user_type">User Type:</label><br>
    <select name="user_type" id="user_type" required>
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<script>
document.getElementById('updateForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('update_user.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(message => {
        alert(message);
    })
    .catch(error => {
        alert("Something went wrong.");
        console.error("Error:", error);
    });
});
</script>

</body>
</html>


