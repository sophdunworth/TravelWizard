<?php
session_start();
require_once 'db1.php';
require_once 'classes/Notification.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $userID = intval($_POST['user_id']);  // manually entered admin ID
    $sentAt = date("Y-m-d H:i:s");
 
    $notification = new Notification($conn);
 
    if ($notification->createNotification($name, $userID, $message, $sentAt)) {
        echo "<script>alert('✅ Notification created!'); window.location.href='manage_notifications.php';</script>";
    } else {
        echo "<script>alert('❌ Error creating notification.');</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Notification</title>
    <link rel="stylesheet" href="css/Admin.css">
    <style>
        body {
            background-color: #e6f7fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
 
        h2 {
            background-color: #0288d1;
            color: white;
            padding: 25px;
            margin: 0;
            text-align: center;
            font-size: 30px;
        }
 
        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 40px;
        }
 
        form {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 600px;
        }
 
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            margin-top: 20px;
        }
 
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
 
        textarea {
            height: 200px;
            resize: vertical;
        }
 
        button {
            background-color: #0288d1;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }
 
        button:hover {
            background-color: #0277bd;
        }
 
        .back-link {
            text-align: center;
            margin-top: 25px;
        }
 
        .back-link a {
            color: #0288d1;
            text-decoration: none;
            font-weight: bold;
        }
 
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 
<h2>Create Notification</h2>
   
    <a href="manage_notifications.php">← Back to Notifications</a>
 
<div class="form-wrapper">
    <form action="create_notification.php" method="POST">
        <label for="name">Notification Title:</label>
        <input type="text" name="name" id="name" placeholder="Enter a short title..." required>
 
        <label for="message">Notification Message:</label>
        <textarea name="message" id="message" placeholder="Enter message to all Customers here:" required></textarea>
 
        <input type="text" name="user_id" id="user_id" placeholder="Enter your admin user ID" required>
 
 
        <button type="submit">Send Notification</button>
    </form>
</div>
 
<div class="back-link">
   
</div>
 
</body>
</html>