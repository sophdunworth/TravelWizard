<?php
session_start();
require_once 'db1.php';
include '../templates/header2.php'; // Include the styled admin header
?>

<link rel="stylesheet" href="css/Admin.css">

<h3>Manage Sections</h3>

<div class="dashboard-grid">
    <div class="grid-item"><a href="manage_users.php">Manage Users</a></div>
    <div class="grid-item"><a href="manage_bookings.php">Manage Bookings</a></div>
    <div class="grid-item"><a href="manage_reviews.php">Manage Reviews</a></div>
    <div class="grid-item"><a href="manage_admins.php">Manage Admins</a></div>
    <div class="grid-item"><a href="manage_customers.php">Manage Customers</a></div>
    <div class="grid-item"><a href="manage_payments.php">Manage Payments</a></div>
    <div class="grid-item"><a href="manage_notifications.php">Manage Notifications</a></div>
    <div class="grid-item"><a href="manage_contactusrequest.php">Customer Queries</a></div>
</div>





