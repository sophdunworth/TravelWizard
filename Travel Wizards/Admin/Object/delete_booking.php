<?php
require_once 'classes/Booking.php';
require_once 'db1.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingID = $_POST['bookingID'];

    // Delete the booking directly from the database
    $stmt = $conn->prepare("DELETE FROM bookings WHERE bookingID = ?");
    $stmt->bind_param("i", $bookingID);
    if ($stmt->execute()) {
        echo "Booking deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
