<?php
require_once 'db1.php';
require_once 'classes/Customer.php';
require_once 'classes/User.php';


if (!isset($pdo)) {
    die("Database connection error.");
}

if (isset($_GET['userID']) && is_numeric($_GET['userID'])) {
    $userID = $_GET['userID'];

    try {
        // Start a transaction to ensure both deletions succeed
        $pdo->beginTransaction();

        // Delete from Customers table first
        $deleteCustomer = "DELETE FROM Customers WHERE userID = ?";
        $stmt = $pdo->prepare($deleteCustomer);
        $stmt->execute([$userID]);

        // Delete from Users table
        $deleteUser = "DELETE FROM Users WHERE userID = ?";
        $stmt = $pdo->prepare($deleteUser);
        $stmt->execute([$userID]);

        // Commit transaction
        $pdo->commit();

        // Redirect back with success message
        header("Location: ../manage_customers.php?success=deleted");
        exit();
    } catch (Exception $e) {
        // Rollback on error
        $pdo->rollBack();
        die("Error deleting customer: " . $e->getMessage());
    }
} else {
    die("Invalid User ID.");
}
?>


