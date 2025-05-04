<?php
session_start();
require_once '../BeforeLogin/auth.php';
require 'db2.php';

// Custom escape function to sanitize input
function escape($value) {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

// Check if the form was submitted
if (isset($_POST['final_confirm'])) {
    try {
        // Sanitize and store booking data
        $booking_data = array(
            "user_id" => $_SESSION['userid'],
            "package_id" => escape($_POST['package_id']),
            "departureFlight" => escape($_POST['departureFlight']),
            "returnFlight" => escape($_POST['returnFlight']),
            "status" => 'pending'
        );

        // Validate required fields
        if (!$booking_data["user_id"] || !$booking_data["package_id"] || !$booking_data["departureFlight"] || !$booking_data["returnFlight"]) {
            echo "Booking details missing.";
            exit();
        }

        // Begin transaction
        $pdo->beginTransaction();

        // Insert booking
        $booking_sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "bookings",
            implode(", ", array_keys($booking_data)),
            ":" . implode(", :", array_keys($booking_data))
        );
        $stmt = $pdo->prepare($booking_sql);
        $stmt->execute($booking_data);

        // Get booking ID
        $bookingID = $pdo->lastInsertId();

        // Fetch package price
        $package_stmt = $pdo->prepare("SELECT price FROM packages WHERE packageid = :package_id");
        $package_stmt->execute(["package_id" => $booking_data["package_id"]]);
        $package = $package_stmt->fetch();

        if (!$package) {
            throw new Exception("Package not found.");
        }

        // Determine payment amounts
        $price = (float)$package['price'];
        $payment_type = $_POST['payment_type'] ?? 'full';
        $payment_data = array(
            "bookingID" => $bookingID,
            "amountPaid" => $payment_type === 'full' ? $price : 0.00,
            "amountPending" => $payment_type === 'full' ? 0.00 : $price,
            "payment_status" => 'pending'
        );

        // Insert payment
        $payment_sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "payments",
            implode(", ", array_keys($payment_data)),
            ":" . implode(", :", array_keys($payment_data))
        );
        $pay_stmt = $pdo->prepare($payment_sql);
        $pay_stmt->execute($payment_data);

        // Commit and redirect
        $pdo->commit();
        header("Location: booking_success.php");
        exit();

    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Booking failed: " . $e->getMessage();
    }
}
?>

<!-- HTML Section Starts -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Your Booking</title>
    <link rel="stylesheet" href="css/confirm.css"> 
</head>
<body>

<main>
    <h1>Confirm Your Booking</h1>

    <!-- Trip Details Section -->
    <section>
        <h2>Trip Details</h2>
        <p><strong>Departure Date:</strong> <?= displayData('departureFlight') ?></p>
        <p><strong>Return Date:</strong> <?= displayData('returnFlight') ?></p>
    </section>

    <!-- Personal Information Section -->
    <section>
        <h2>Personal Details</h2>
        <p><strong>First Name:</strong> <?= displayData('first_name') ?></p>
        <p><strong>Surname:</strong> <?= displayData('surname') ?></p>
        <p><strong>Date of Birth:</strong> <?= displayData('dob') ?></p>
        <p><strong>Address:</strong> 
            <?= displayData('house_number') ?>, 
            <?= displayData('road_name') ?>, 
            <?= displayData('town') ?>, 
            <?= displayData('county') ?>, 
            <?= displayData('country') ?>, 
            <?= displayData('eircode') ?>
        </p>
    </section>

    <!-- Payment Information Section -->
    <section>
        <h2>Payment Details</h2>
        <p><strong>Payment Type:</strong> <?= displayData('payment_type') ?></p>
        <p><strong>Card Type:</strong> <?= displayData('card_type') ?></p>
        <p><strong>Cardholder Name:</strong> <?= displayData('cardholder_name') ?></p>
        <p><strong>Card Number:</strong> **** **** **** <?= substr(displayData('card_number'), -4) ?></p>
    </section>

    <!-- Passport Information Section -->
    <section>
        <h2>Passport Information</h2>
        <p><strong>Passport Name:</strong> <?= displayData('passport_first_name') ?> <?= displayData('passport_second_name') ?></p>
        <p><strong>Passport Number:</strong> <?= displayData('passport_number') ?></p>
        <p><strong>Expiry Date:</strong> <?= displayData('passport_expiry') ?></p>
        <p><strong>Country of Issue:</strong> <?= displayData('passport_country') ?></p>
    </section>

    <!-- Health and Safety Section -->
    <section>
        <h2>Health and Safety</h2>
        <p><strong>Emergency Contact:</strong> <?= displayData('emergency_name') ?> (<?= displayData('emergency_phone') ?>)</p>
        <p><strong>Emergency Address:</strong> <?= displayData('emergency_address') ?></p>
        <p><strong>Allergies:</strong> <?= displayData('allergies') ?: 'None' ?></p>
    </section>

    <!-- Confirm and Edit Buttons -->
    <form method="POST">
        <!-- Hidden inputs to carry all posted data forward -->
        <?php foreach ($_POST as $key => $value): ?>
            <input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>">
        <?php endforeach; ?>

        <!-- Confirm Booking button -->
        <button type="submit" name="final_confirm">Confirm Booking</button>

        <!-- Go back to edit details -->
        <button type="button" onclick="window.history.back();">Edit</button>
    </form>

</main>

</body>
</html>
