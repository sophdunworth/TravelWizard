<?php
// Include the Admin class
require_once 'classes/Admin.php';

// Handle form submission with isset($_POST['submit'])
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store the userID input
        $userID = escape($_POST['userID']); 

        // Prepare SQL query for deleting an admin by userID
        $sql = "DELETE FROM admins WHERE userID = :userID"; // SQL query with placeholder for prepared statement

        // Prepare and execute the SQL statement
        $statement = $conn->prepare($sql);
        $statement->bindParam(':userID', $userID, PDO::PARAM_INT); // Bind the userID parameter
        $statement->execute();

        // Check if any rows were affected
        if ($statement->rowCount() > 0) {
            // Redirect on success with a success message
            header("Location: manage_admins.php?status=Admin+deleted+successfully");
        } else {
            // Redirect if no rows were affected (no admin found with the given ID)
            header("Location: manage_admins.php?status=Error+deleting+admin");
        }
        exit;
    } catch (PDOException $e) {
        // Handle any errors and display a message
        echo "Error: " . $e->getMessage();
    }
}
?>




