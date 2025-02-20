<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Wizard</title>
    <link rel="stylesheet" href="css/Body.css">
        <?php include 'header.php'; ?>
</head>
    <?php
// contact_us.php - Contact Us page with support ticket system
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'] ?? null;
    $subject = htmlspecialchars($_POST['subject']);
    $description = htmlspecialchars($_POST['description']);

    if ($user_id && !empty($subject) && !empty($description)) {
        $conn = new PDO('mysql:host=localhost;dbname=travelwizard', 'root', 'password');
        $stmt = $conn->prepare('INSERT INTO support_tickets (user_id, subject, description, status) VALUES (?, ?, ?, "open")');
        $stmt->execute([$user_id, $subject, $description]);
        $message = 'Support ticket submitted successfully.';
    } else {
        $message = 'Please fill out all fields.';
    }
}
?>
<body>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
        <form method="post" class="contact-form">
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="description" placeholder="Describe your issue" rows="6" required></textarea>
            <button type="submit">Submit Ticket</button>
        </form>
        <div class="info-section">
            <p>Email: info@travelwizard.com</p>
            <p>Phone: +1 (555) 123-4567</p>
        </div>
    </div>
    <?php include 'footer.php'; ?>

</body>
</html>