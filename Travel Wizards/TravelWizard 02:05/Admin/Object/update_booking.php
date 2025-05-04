<?php 
require_once 'classes/Booking.php'; // Include the Booking class

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store user input
        $bookingData = array(
            "bookingID" => escape($_POST['bookingID']),
            "newDate"   => escape($_POST['newDate'])
        );

        // Create a Booking object (optional if not using object methods)
        $booking = new Booking($conn, $bookingData['bookingID']);

        // Prepare SQL query for updating the booking date
        $sql = "UPDATE bookings SET dateBooked = :newDate WHERE bookingID = :bookingID";

        // Prepare and execute the SQL statement
        $statement = $conn->prepare($sql);
        $statement->execute($bookingData);

        // Display success message
        $successMessage = "Booking ID " . $bookingData['bookingID'] . " successfully updated!";
    } catch (PDOException $error) {
        // Display error message if something goes wrong
        $errorMessage = "Error: " . $error->getMessage();
    }
}
?>

