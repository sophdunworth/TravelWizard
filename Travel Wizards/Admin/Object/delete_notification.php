<?php
session_start();
require_once 'classes/Notification.php';


// Ensure the user is an admin
if (!isset($_SESSION['adminName'])) {
    die("Access denied. Please log in as an admin.");
}

$notification = new Notification();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notificationID = $_POST['notificationID'];

    if ($notification->deleteNotification($notificationID)) {
        echo "Notification deleted successfully!";
    } else {
        echo "Error deleting notification.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Notification</title>
</head>
<body>

<h2>Delete Notification</h2>
<form action="delete_notification.php" method="POST">
    <input type="number" name="notificationID" placeholder="Notification ID" required><br>
    <button type="submit">Delete</button>
</form>

<a href="manage_notifications.php">Back to Manage Notifications</a>

</body>
</html>
