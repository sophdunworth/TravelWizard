<?php
require_once 'classes/Admin.php';

// Pass the database connection ($conn) to the Admin constructor
$admin = new Admin($conn);  // Ensure $conn is passed here

// Get all admins from the database
$admins = $admin->getAllAdmins();

echo "<h2>Admin List</h2>";

// Display each admin's name
foreach ($admins as $a) {
    echo "<p>{$a['adminName']}</p>";
}
?>
