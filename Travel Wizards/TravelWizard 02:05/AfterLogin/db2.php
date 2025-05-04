<?php
$host = 'localhost';
$db = 'travelwizard1';
$user = 'root';
$pass = 'root';
 // Character encoding used for the database connection
$charset = 'utf8mb4';

// DSN (Data Source Name) specifies the database type, host, and charset for the connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options configuration
$options = [
    // Set the error mode to exception so that PDO will throw exceptions on errors
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    
    // Set the default fetch mode to associative array, meaning results will be returned as key-value pairs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    
    // Disable emulated prepares for better performance and security 
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Attempt to create a new PDO instance for the database connection
try {
    // Establish the PDO connection to the database using username, and password
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // If the connection fails, throw a PDOException with the error message and code
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

