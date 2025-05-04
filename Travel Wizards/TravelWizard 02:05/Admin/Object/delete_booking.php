<?php 
require_once 'classes/Booking.php'; 

// Handle form submission with isset($_POST['submit'])
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store the bookingID input
        $bookingID = escape($_POST['bookingID']); 
		
        // Prepare SQL query for deleting a booking by bookingID
        $sql = "DELETE FROM bookings WHERE bookingID = :bookingID"; // SQL query with placeholder for prepared statement

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':bookingID', $bookingID, PDO::PARAM_INT); // Bind the bookingID parameter
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->rowCount() > 0) {
            // Redirect on success with a success message
            header("Location: manage_bookings.php?status=Booking+deleted+successfully");
        } else {
            // Redirect if no rows were affected (no booking found with the given ID)
            header("Location: manage_bookings.php?status=Error+deleting+booking");
        }
        exit;
    } catch (PDOException $e) {
        // Handle any errors and display a message
        echo "Error: " . $e->getMessage();
    }
}
?>




