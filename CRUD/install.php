<?php
/**
 * Open a connection via PDO to create a new database and table with structure.
 */
require "config.php";

try {
    // Connect to MySQL and create database if it doesn't exist
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $connection->exec("CREATE DATABASE IF NOT EXISTS $dbname");

    // Reconnect with the database selected
    $connection = new PDO($dsn, $username, $password, $options);

    // Load and execute SQL file
    $sqlFile = "data/init.sql";
    if (!file_exists($sqlFile)) {
        throw new Exception("SQL file not found: $sqlFile");
    }

    $sql = file_get_contents($sqlFile);
    $connection->exec($sql);

    echo "✅ Database '$dbname' and table(s) created successfully.";
} catch (PDOException $error) {
    echo "<pre>❌ Database error: " . $error->getMessage() . "</pre>";
} catch (Exception $error) {
    echo "<pre>⚠️ Error: " . $error->getMessage() . "</pre>";
}
?>

