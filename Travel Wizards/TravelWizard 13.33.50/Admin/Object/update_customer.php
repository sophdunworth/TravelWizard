<?php
require_once 'db1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = intval($_POST['userID']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    if (empty($username) || empty($email)) {
        echo "Username and email cannot be empty.";
        exit;
    }

    $stmt = $conn->prepare("UPDATE Users SET username = ?, email = ? WHERE userID = ?");
    $stmt->bind_param("ssi", $username, $email, $userID);

    if ($stmt->execute()) {
        echo "User updated successfully!";
    } else {
        echo "Error updating user.";
    }

    $stmt->close();
}
?>


