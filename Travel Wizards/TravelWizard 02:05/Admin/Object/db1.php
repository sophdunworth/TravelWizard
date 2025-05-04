<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "TravelWizard1"; 

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);

// Check connection
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

