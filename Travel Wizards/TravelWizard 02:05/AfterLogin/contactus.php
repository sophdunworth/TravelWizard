<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session if not already started
session_start();

// Only allow access if the user is logged in
require_once '../BeforeLogin/auth.php';

// Include database connection (which will give us $pdo)
require 'db.php';

// Initialize feedback message
$message = "";

// Escape function to prevent XSS
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Check if the form was submitted
if (isset($_POST['submit'])) {
    try {
        // Get user ID from session
        $user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

        // Sanitize input fields
        $ticket_data = array(
            "user_id" => $user_id,
            "email" => escape($_POST['email']),
            "subject" => escape($_POST['subject']),
            "message" => escape($_POST['description'])
        );

        // Check for empty required fields
        if (!empty($ticket_data['email']) && !empty($ticket_data['subject']) && !empty($ticket_data['message'])) {
            // Build SQL insert statement using named placeholders
            $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                "contactusrequests",
                implode(", ", array_keys($ticket_data)),
                ":" . implode(", :", array_keys($ticket_data))
            );

            // Prepare and execute the SQL statement using $pdo
            $stmt = $pdo->prepare($sql);
            $stmt->execute($ticket_data);

            // Set success message
            $message = '<p style="color: green;">Support ticket submitted successfully.</p>';
        } else {
            $message = '<p style="color: red;">Please fill out all fields.</p>';
        }
    } catch (PDOException $e) {
        // Handle SQL execution errors
        $message = '<p style="color: red;">Error: ' . $e->getMessage() . '</p>';
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
    <link rel="stylesheet" href="css/Body.css"> 
    <?php include 'templates/header.php'; ?> 
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
        <button type="submit" name="submit">Submit Ticket</button>
    </form>

    <!-- Contact Information -->
    <div class="info-section">
        <p>Email: info@travelwizard.com</p>
        <p>Phone: +1 (555) 123-4567</p>
    </div>
</div>

<?php include 'templates/footer.php'; ?>

</body>
</html>


