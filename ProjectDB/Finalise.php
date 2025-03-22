<?php
session_start();
include('db.php');

if (!isset($_SESSION['booking_data'])) {
    die("No booking data found. Please go back and fill out the form.");
}

$booking_data = $_SESSION['booking_data'];
$user_id = $_SESSION['user_id'] ?? null; // Ensure user is logged in
$departure = $booking_data['departure'];
$return = $booking_data['return'];
$first_name = $booking_data['first_name'];
$surname = $booking_data['surname'];
$dob = $booking_data['dob'];
$email = $booking_data['email'];
$payment_type = $booking_data['payment_type'];
$cardholder_name = $booking_data['cardholder_name'];
$card_number = $booking_data['card_number'];
$expiry_date = $booking_data['expiry_date'];
$cvc = $booking_data['cvc'];

try {
    $conn->beginTransaction();

    // Insert into bookings table
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, first_name, surname, email, departure_date, return_date, status) 
                            VALUES (?, ?, ?, ?, ?, ?, 'confirmed')");
    $stmt->execute([$user_id, $first_name, $surname, $email, $departure, $return]);

    // Get last inserted booking ID
    $booking_id = $conn->lastInsertId();

    // Insert into payments table
    $stmt = $conn->prepare("INSERT INTO payments (booking_id, user_id, payment_type, cardholder_name, card_number, expiry_date, cvc, amount, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'paid')");
    $stmt->execute([$booking_id, $user_id, $payment_type, $cardholder_name, $card_number, $expiry_date, $cvc, 1000]);

    $conn->commit();

    unset($_SESSION['booking_data']); // Clear session data

    header("Location: booking_success.php");
    exit();
} catch (PDOException $e) {
    $conn->rollBack();
    die("Error processing booking: " . $e->getMessage());
}
?>
