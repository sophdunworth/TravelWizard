<link rel="stylesheet" href="css/Admin.css">
<script defer src="js/TripScript.js"></script>

<?php
session_start();
include 'config.php'; // Database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="Adminindex.php">Dashboard</a></li>
            <li><a href="manageTrips.php">Manage Trips</a></li>
            <li><a href="adminBooking.php">Bookings</a></li>
            <li><a href="User.php">Users</a></li>
            <li><a href="Messages.php">Messages</a></li>
            <li><a href="Notfications.php">Notifications</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Welcome, Admin</h1>
        <p>Select an option from the sidebar to manage the website.</p>
    </div>
</body>
</html>

