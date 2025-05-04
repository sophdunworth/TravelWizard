<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "TravelWizard1";
// PDO options for error handling and fetch mode
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exception handling for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Default fetch mode for results is associative array
];

// Attempting to establish a connection with the database using PDO
try {
    // Create a new PDO instance for database connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If the connection fails, output an error message
    die("PDO Connection failed: " . $e->getMessage());
}
?>


