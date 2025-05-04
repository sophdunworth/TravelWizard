<?php
require_once 'db1.php'; // Include the database connection

// Check if form was submitted
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store user input
        $update_data = array(
            "userID"   => escape($_POST['userID']),
            "username" => escape(($_POST['username'] ?? '')),
            "email"    => escape(($_POST['email'] ?? ''))
        );

        // Validate required fields
        if ($update_data['userID'] <= 0 || empty($update_data['username']) || empty($update_data['email'])) {
            throw new Exception("Invalid input");
        }

        // Validate email format
        if (!filter_var($update_data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        // Begin transaction
        $conn->beginTransaction();

        // Prepare SQL for users table
        $sqlUsers = "UPDATE users SET username = :username, email = :email WHERE userID = :userID";
        $stmtUsers = $conn->prepare($sqlUsers);
        $stmtUsers->execute($update_data);

        // Prepare SQL for customers table
        $sqlCustomers = "UPDATE customers SET username = :username, email = :email WHERE userID = :userID";
        $stmtCustomers = $conn->prepare($sqlCustomers);
        $stmtCustomers->execute($update_data);

        // Commit the transaction
        $conn->commit();

        // Redirect with success message
        header("Location: manage_customers.php?success=User+updated+successfully");
        exit();

    } catch (Exception $e) {
        // Roll back changes on failure
        if ($conn->inTransaction()) {
            $conn->rollBack();
        }

        // Redirect with error message
        header("Location: manage_customers.php?error=" . urlencode($e->getMessage()));
        exit();
    }
}
?>





