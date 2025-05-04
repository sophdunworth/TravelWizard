<?php
$servername = "localhost"; // Your database host
$username = "root"; // Your database username
$password = "root"; // Your database password
$dbname = "TravelWizard1"; // Your database name

// MySQLi Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("MySQLi Connection failed: " . $conn->connect_error);
}

// PDO Connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("PDO Connection failed: " . $e->getMessage());
}
?>



