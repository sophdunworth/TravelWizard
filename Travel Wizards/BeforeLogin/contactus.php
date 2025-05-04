
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Wizard - Contact Us</title>
    <link rel="stylesheet" href="css/Body.css">
    <?php include 'templates/header1.php'; ?>
</head>
<?php
include('db.php'); // Include database connection
 
$message = ""; // Initialize message variable
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['userid'] ?? null;
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $description = trim($_POST['description']);
 
    if (!empty($email) && !empty($subject) && !empty($description)) {
        try {
            $stmt = $conn->prepare('INSERT INTO contactusrequests (user_id, email, subject, message, status) VALUES (?, ?, ?, ?, "open")');
            $stmt->execute([$user_id, $email, $subject, $description]);
 
            $message = '<p style="color: green;">Support ticket submitted successfully.</p>';
        } catch (PDOException $e) {
            $message = '<p style="color: red;">Error: ' . $e->getMessage() . '</p>';
        }
    } else {
        $message = '<p style="color: red;">Please fill out all fields.</p>';
    }
}
?>
<body>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
       
        <form method="post" class="contact-form">
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="description" placeholder="Describe your issue" rows="6" required></textarea>
            <button type="submit">Submit Ticket</button>
        </form>
 
        <div class="info-section">
            <p>Email: info@travelwizard.com</p>
            <p>Phone: +1 (555) 123-4567</p>
        </div>
    </div>
   
    <?php include 'templates/footer.php'; ?>
</body>
</html>