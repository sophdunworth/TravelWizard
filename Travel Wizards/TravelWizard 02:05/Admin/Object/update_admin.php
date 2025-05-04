<?php 
// Include the Admin class
require_once 'classes/Admin.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request is a POST request and required fields are set
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store the input data
        $adminData = array(
            "userID" => escape($_POST['userID']), // Sanitize user ID input
            "adminname" => escape(($_POST['adminname'])), // Sanitize admin name input
            "password" => escape($_POST['password']) ? escape(($_POST['password'])) : null // Sanitize password input, if provided
        );

        // Create an instance of the Admin class
        $adminObj = new Admin($conn);

        // Prepare SQL query for updating the admin data
        $sql = sprintf(
            "UPDATE admins SET adminname = :adminname WHERE userID = :userID" // Query to update the admin details
        );

        // Prepare and execute the SQL statement
        $statement = $conn->prepare($sql);
        $statement->execute(array(
            ':adminname' => $adminData['adminname'],
            ':userID' => $adminData['userID']
        ));

        // If a password was provided, update it as well
        if (!empty($adminData['password'])) {
            // Assuming the `setPassword` method takes care of password encryption
            $adminObj->setPassword($adminData['password']);
        }

        // Display success message
        $successMessage = "Admin with userID {$adminData['userID']} successfully updated!";
    } catch (PDOException $error) {
        // Handle any errors that occur
        $errorMessage = "Error: " . $error->getMessage();
    }
}
?>



