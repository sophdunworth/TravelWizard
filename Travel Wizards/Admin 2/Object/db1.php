<?php
$servername = "localhost"; // or your DB host
$username = "root"; // your DB username
$password = "root"; // your DB password
$dbname = "TravelWizard1"; // your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
