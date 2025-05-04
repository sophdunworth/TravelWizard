<?php
// Start session if not already started
session_start();

// Only allow access if the user is logged in
require_once '../BeforeLogin/auth.php'; // Adjust path to your auth.php if necessary

// Include database connection (PDO)
require 'db.php';

// Initialize message variable to show feedback to the user
$message = "";

// If the form was submitted (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user ID from session
    $user_id = $_SESSION['userid'] ?? null;

    // Get and clean form inputs
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $description = trim($_POST['description']);

    // Check if all fields are filled
    if (!empty($email) && !empty($subject) && !empty($description)) {
        try {
            // Prepare and execute the insert into the database
            $stmt = $conn->prepare('INSERT INTO contactusrequests (user_id, email, subject, message, status) VALUES (?, ?, ?, ?, "open")');
            $stmt->execute([$user_id, $email, $subject, $description]);

            // Success message
            $message = '<p style="color: green;">Support ticket submitted successfully.</p>';
        } catch (PDOException $e) {
            // Error if database operation fails
            $message = '<p style="color: red;">Error: ' . $e->getMessage() . '</p>';
        }
    } else {
        // Error message if any field is missing
        $message = '<p style="color: red;">Please fill out all fields.</p>';
    }
}
?>

<!-- HTML Section Starts -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Wizard - Contact Us</title>
    <link rel="stylesheet" href="css/Body.css"> <!-- Link to external CSS -->
    <?php include 'templates/header.php'; ?> <!-- Include website header -->
</head>
<body>

<!-- Contact Form Container -->
<div class="contact-container">
    <h2>Contact Us</h2>

    <!-- Display success or error messages -->
    <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>

    <!-- Contact Form -->
    <form method="post" class="contact-form">
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="description" placeholder="Describe your issue" rows="6" required></textarea>
        <button type="submit">Submit Ticket</button>
    </form>

    <!-- Contact Information -->
    <div class="info-section">
        <p>Email: info@travelwizard.com</p>
        <p>Phone: +1 (555) 123-4567</p>
    </div>
</div>

<!-- Include website footer -->
<?php include 'templates/footer.php'; ?>

</body>
</html>
