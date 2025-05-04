<?php
session_start();
require_once 'classes/Booking.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['customerID'];
    $packageID = $_POST['packageID'];
    $date = $_POST['date'];
    
    $booking = new Booking();
    if ($booking->createBooking($customerID, $packageID, $date)) {
        echo "Booking created successfully!";
    } else {
        echo "Error creating booking.";
    }
}
?>
<form action="create_booking.php" method="POST">
    <input type="number" name="customerID" placeholder="Customer ID" required><br>
    <input type="number" name="packageID" placeholder="Package ID" required><br>
    <input type="date" name="date" required><br>
    <button type="submit">Create Booking</button>
</form>