<?php 
session_start();

require_once 'db1.php'; // DB connection
require_once 'classes/ContactUsRequest.php'; // Contact form handler

$contactHandler = new ContactUsRequest($conn); // Instantiate with PDO connection

// Check if a valid request ID is passed
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request ID.");
}

$requestID = intval($_GET['id']);

// Fetch the contact request
$request = $contactHandler->getRequestByID($requestID);

if (!$request) {
    die("Contact request not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminID = $_SESSION['userID'];
    $response = trim($_POST['response']);

    if (empty($response)) {
        $error = "Response cannot be empty.";
    } else {
        if ($contactHandler->submitResponse($requestID, $adminID, $response)) {
            echo "<script>alert('✅ Response submitted successfully!'); window.location.href='manage_contactusrequest.php';</script>";
            exit;
        } else {
            $error = "❌ Failed to submit the response.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Answer Contact Request</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<h2>Respond to Contact Request</h2>

<div class="container">
    <p><strong>Email:</strong> <?= htmlspecialchars($request['email']) ?></p>
    <p><strong>Subject:</strong> <?= htmlspecialchars($request['subject']) ?></p>
    <p><strong>Message:</strong> <?= nl2br(htmlspecialchars($request['message'])) ?></p>

    <!-- Display error if any -->
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="response">Your Response:</label><br>
        <textarea name="response" required></textarea><br>
        <button type="submit">Submit Response</button>
    </form>

    <div class="back-link">
        <a href="manage_contactusrequest.php">← Back to Manage Requests</a>
    </div>
</div>

</body>
</html>
