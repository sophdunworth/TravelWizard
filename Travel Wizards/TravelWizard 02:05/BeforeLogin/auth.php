<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    // User is not logged in
    header("Location: ../Login/login.php");
    exit();
}
?>
