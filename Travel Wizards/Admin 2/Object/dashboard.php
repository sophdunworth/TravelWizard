<?php
session_start(); // Start the session
require_once 'db1.php'; 
?>
<link rel="stylesheet" type="text/css" href="css/Admin.css">

<h2>Welcome, Admin <?php echo isset($_SESSION['adminName']) ? $_SESSION['adminName'] : ""; ?>!</h2>

<h3>Manage Sections</h3>
<a href="manage_users.php">Manage Users</a><br>
<a href="manage_bookings.php">Manage Bookings</a><br>
<a href="manage_reviews.php">Manage Reviews</a><br>
<a href="manage_admins.php">Manage Admins</a><br>
<a href="manage_customers.php">Manage Customers</a><br>
<a href="manage_payments.php">Manage Payments</a><br>
<a href="manage_notifications.php">Manage Notifications</a><br>
<a href="manage_contactusrequest.php">Manage Customer Queries</a><br>

<a href="admin_logout.php">Logout</a>


