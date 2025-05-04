<?php
// Include database connection and User class
require_once 'classes/User.php';

// Check if the request method is POST and if the userID is set
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store user input
        $userID = escape($_POST['userID']); 

        // Begin a database transaction to ensure all deletions happen together
        $conn->beginTransaction();

        // Optionally delete roles and any other related tables
        $conn->prepare("DELETE FROM admins WHERE userID = :userID")->execute([':userID' => $userID]);
        $conn->prepare("DELETE FROM customers WHERE userID = :userID")->execute([':userID' => $userID]);

        // Then delete the user entry from the users table
        $conn->prepare("DELETE FROM users WHERE userID = :userID")->execute([':userID' => $userID]);

        // Commit the transaction if everything goes well
        $conn->commit();

        // Redirect with a success message
        header("Location: manage_users.php?success=User+deleted+successfully");
        exit();
    } catch (PDOException $error) {
        // If there is an error, roll back the transaction
        $conn->rollBack();
        
        // Log error and redirect with an error message
        error_log("Delete error: " . $error->getMessage());
        header("Location: manage_users.php?error=delete_failed");
        exit();
    }
} else {
    // If the request is invalid or userID is missing, redirect with an error message
    header("Location: manage_users.php?error=invalid_request");
    exit();
}
?>

