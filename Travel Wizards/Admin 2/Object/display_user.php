<?php
require_once 'db1.php';
require_once 'classes/User.php';

// Fetch all users
$result = $conn->query("SELECT userID FROM users");

echo "<h2>Users List</h2>";
while ($row = $result->fetch_assoc()) {
    $user = new User($conn, $row['userID']); // Create User object
    echo "<p>{$user->getUsername()} - {$user->getEmail()}</p>";
}

?>
