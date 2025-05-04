<?php 
// Start the session if it hasn't already been started
session_start();

// Protect the page by ensuring only logged-in users can access it
require_once '../BeforeLogin/auth.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Successful</title>
  <link rel="stylesheet" href="css/Body.css"> 
</head>
<body>

<main style="text-align: center; margin-top: 50px;">


	<!-- https://www.w3schools.com/charsets/ref_emoji_entertainment.asp  -->
    <h1>&#127881; Booking Successful!</h1>


    <p>Thank you for booking your trip with <strong>Travel Wizard</strong>!</p>


    <p>We have received your booking and payment details.  
    You will receive an email confirmation shortly.</p>


    <p>If you have any questions, feel free to <a href="contact.php">contact us</a>.</p>


    <a href="index.php">
        <button style="padding: 10px 20px; margin-top: 20px;">Return to Home</button>
    </a>

</main>

</body>
</html>




