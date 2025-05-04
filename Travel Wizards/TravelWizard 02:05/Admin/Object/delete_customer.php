<?php
// Include the database connection
require_once 'classes/Customer.php';

// Check if the request method is POST and if the userID is set
if (isset($_POST['submit'])) {
    try {
        // Sanitize the user ID to ensure it's an integer
        $userID = escape($_POST['userID']);

        // Begin a database transaction to ensure both deletions are completed together
        $conn->beginTransaction();

        // Delete the corresponding entry from the customers table
        $stmt1 = $conn->prepare("DELETE FROM customers WHERE userID = :userID");
        $stmt1->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt1->execute();

        // Delete the user entry from the users table
        $stmt2 = $conn->prepare("DELETE FROM users WHERE userID = :userID");
        $stmt2->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt2->execute();

        // Commit the transaction since both deletions were successful
        $conn->commit();

        // Redirect back to the customer management page with a success message
        header("Location: manage_customers.php?status=Customer+deleted+successfully");
        exit();
    } catch (PDOException $e) {
        // If there's any error, roll back the transaction to prevent partial deletion
        $conn->rollBack();

        // Redirect back with an error message
        header("Location: manage_customers.php?status=Error+deleting+customer");
        exit();
    }
}
?>


