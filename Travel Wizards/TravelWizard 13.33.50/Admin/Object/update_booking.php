<?php
require_once 'classes/Booking.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingID = $_POST['bookingID'];
    $newDate = $_POST['newDate'];

    $booking = new Booking($conn, $bookingID); // Create Booking object

    // Directly update the date in the database
    $stmt = $conn->prepare("UPDATE bookings SET dateBooked = ? WHERE bookingID = ?");
    $stmt->bind_param("si", $newDate, $bookingID);
    if ($stmt->execute()) {
        echo "Booking updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form action="update_booking.php" method="POST">
    <input type="number" name="bookingID" placeholder="Booking ID" required><br>
    <input type="date" name="newDate" required><br>
    <button type="submit">Update</button>
</form>
