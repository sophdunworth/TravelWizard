<?php
function getConnection() {
    $host = 'localhost';
    $db   = 'travelwizard1';
    $user = 'root';
    $pass = 'root';

    // Create connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Set character set to utf8mb4
    if (!$conn->set_charset("utf8mb4")) {
        die("Error loading character set utf8mb4: " . $conn->error);
    }

    return $conn;
}
?>


