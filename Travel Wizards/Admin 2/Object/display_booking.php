<?php
require_once 'classes/Booking.php';

echo "<h2>Bookings List</h2>";

// Fetch all bookings
$result = $conn->query("SELECT bookingID FROM bookings");

while ($row = $result->fetch_assoc()) {
    $booking = new Booking($conn, $row['bookingID']); // Create Booking object
    echo "<p>Booking ID: {$booking->getBookingID()} - User: {$booking->getCustomerID()} - Package: {$booking->getPackageID()} - Date: {$booking->getDateBooked()} - Status: {$booking->getStatus()}</p>";
}
?>