<?php
require_once 'classes/Payment.php';

// Create a new Payment object with the database connection
$payment = new Payment($conn);  // Pass the database connection

// Fetch all payments from the database
$payments = $payment->getAllPayments();  // Assuming you have this method in the Payment class

echo "<h2>Payments</h2>";
foreach ($payments as $p) {
    echo "<p>Booking ID: {$p['bookingID']} - Amount Paid: {$p['amountPaid']} - Status: {$p['payment_status']}</p>";
}
?>
