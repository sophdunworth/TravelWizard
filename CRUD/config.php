<?php
/**
 * Configuration for database connection
 */
$host = "localhost";
$username = "root"; // Change if necessary
$password = "root"; // Add the correct password here
$dbname = "test";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
?>

