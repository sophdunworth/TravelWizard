<?php
// Start session if not already started
session_start();

// Protect page: Only allow logged-in users to access
require_once '../BeforeLogin/auth.php'; 

// Connect to the database (PDO connection)
require 'db2.php';

// Helper function to safely display POST data or default to "Not provided"
function displayData($key) {
    return $_POST[$key] ?? 'Not provided';
}

// If the form is submitted with the "final_confirm" button
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['final_confirm'])) {

    // Get logged-in user ID from session
    $user_id = $_SESSION['userid']; 

    // Get package and flight details from form
    $package_id = $_POST['package_id'] ?? null;
    $departureFlight = $_POST['departureFlight'] ?? null;
    $returnFlight = $_POST['returnFlight'] ?? null;

    // Validate that all required fields are filled
    if (!$package_id || !$departureFlight || !$returnFlight) {
        echo "Booking details missing.";
        exit();
    }

    try {
        // Start database transaction
        $pdo->beginTransaction();

        // Step 1: Insert new booking into bookings table
        $sql = "INSERT INTO bookings (user_id, package_id, departureFlight, returnFlight, status)
                VALUES (:user_id, :package_id, :departureFlight, :returnFlight, 'pending')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'package_id' => $package_id,
            'departureFlight' => $departureFlight,
            'returnFlight' => $returnFlight
        ]);

        // Get the booking ID of the newly created booking
        $bookingID = $pdo->lastInsertId();

        // Step 2: Fetch the package price
        $package_stmt = $pdo->prepare("SELECT price FROM packages WHERE packageid = :package_id");
        $package_stmt->execute(['package_id' => $package_id]);
        $package = $package_stmt->fetch();

        // If package is not found, throw an error
        if (!$package) {
            throw new Exception("Package not found!");
        }

        $packagePrice = $package['price'];

        // Step 3: Set payment details depending on full payment or deposit
        $payment_type = $_POST['payment_type'] ?? 'full';

        if ($payment_type === 'full') {
            $amountPaid = $packagePrice;
            $amountPending = 0.00;
        } else {
            $amountPaid = 0.00;
            $amountPending = $packagePrice;
        }

        // Step 4: Insert payment record
        $payment_sql = "INSERT INTO payments (bookingID, amountPaid, amountPending, payment_status)
                        VALUES (:bookingID, :amountPaid, :amountPending, 'pending')";
        $payment_stmt = $pdo->prepare($payment_sql);
        $payment_stmt->execute([
            'bookingID' => $bookingID,
            'amountPaid' => $amountPaid,
            'amountPending' => $amountPending
        ]);

        // Commit the transaction
        $pdo->commit();

        // Redirect to success page
        header("Location: booking_success.php");
        exit();

    } catch (PDOException $e) {
        // Rollback if any error happens
        $pdo->rollBack();
        echo "Booking failed: " . $e->getMessage();
        exit();
    }
}
?>

<!-- HTML Section Starts -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Your Booking</title>
    <link rel="stylesheet" href="css/confirm.css"> <!-- Link to page styling -->
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
