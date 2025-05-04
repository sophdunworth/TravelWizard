<?php
session_start();
require_once 'db1.php'; // make sure this contains $conn
require_once 'classes/Notification.php';
 
function escape($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
 
if (isset($_POST['submit'])) {
    try {
        $name = escape($_POST['name']);
        $message = escape($_POST['message']);
        $adminID = intval($_POST['user_id']);
        $sentAt = date("Y-m-d H:i:s");
 
        $notificationObj = new Notification($conn);
 
        $success = $notificationObj->createNotification($name, $adminID, $message, $sentAt);
 
        if ($success) {
            header("Location: manage_notifications.php?success=1");
            exit;
        } else {
            echo "<script>alert('❌ Failed to send notification to users.');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('❌ Database error: " . $e->getMessage() . "');</script>";
    }
}
?>
 
<!-- HTML Form to Create Notification -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Notification</title>
<link rel="stylesheet" href="css/Admin.css">
</head>
<body>
 
<h2>Create Notification</h2>
 
<form method="POST" action="create_notification.php">
<input type="text" name="name" placeholder="Notification Title" required>
<textarea name="message" placeholder="Notification Message" required></textarea>
<input type="number" name="user_id" placeholder="Admin User ID" required>
<button type="submit" name="submit">Send Notification</button>
</form>
 
<a href="manage_notifications.php">← Back to Manage Notifications</a>
 
</body>
</html>



