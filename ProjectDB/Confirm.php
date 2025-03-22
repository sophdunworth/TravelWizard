<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirm Your Booking</title>
<link rel="stylesheet" href="css/confirm.css">
</head>
<body>

 
    <main>
<h1>Confirm Your Booking</h1>
 
        <div class="trip-details">
<p><strong>Departure Date:</strong> <?php echo htmlspecialchars($departure); ?></p>
<p><strong>Return Date:</strong> <?php echo htmlspecialchars($return); ?></p>
<p>Are you sure you want to proceed with your booking?</p>
<form action="finalize_booking.php" method="POST">
<input type="hidden" name="departure" value="<?php echo htmlspecialchars($departure); ?>">
<input type="hidden" name="return" value="<?php echo htmlspecialchars($return); ?>">
<button type="button" onclick="window.location.href='finalise.php';">Confirm Booking</button>
<button type="button" onclick="window.history.back();">Cancel</button>
</form>
</div>
</main>
 
</body>
</html> 
<?php
$departure = $_POST['departure'] ?? 'Not Selected';
$return = $_POST['return'] ?? 'Not Selected';
 
// Here, you would normally save the booking details to a database.
 
?>