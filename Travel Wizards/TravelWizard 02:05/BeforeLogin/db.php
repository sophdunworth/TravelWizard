<?php
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "TravelWizard1";
// PDO options for better error handling and default fetch mode
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Return rows as associative arrays
];

// Attempt to establish a PDO connection
try {
    // Create a new PDO instance with host, dbname, username, and password
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set error mode to Exception, redundant with $options, but still valid
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If the connection fails, output the error message and terminate the script
    die("PDO Connection failed: " . $e->getMessage());
}
?>



