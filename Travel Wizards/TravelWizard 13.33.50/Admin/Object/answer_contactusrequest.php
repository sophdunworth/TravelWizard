<?php
session_start();
require_once 'classes/ContactUsRequest.php';
 
 
$contactHandler = new ContactUsRequest();
 
if (!isset($_GET['id'])) {
    die("No request ID provided.");
}
 
$requestID = intval($_GET['id']);
$request = $contactHandler->getRequestByID($requestID);
 
if (!$request) {
    die("Contact request not found.");
}
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminID = $_SESSION['userID'];
    $response = trim($_POST['response']);
 
    if ($contactHandler->submitResponse($requestID, $adminID, $response)) {
        echo "<script>alert('Response submitted!'); window.location.href='manage_contactusrequest.php';</script>";
        exit;
    } else {
        echo "Error submitting response.";
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
 
<h2>Reply to Contact Message</h2>
 
<p><strong>Email:</strong> <?= htmlspecialchars($request['email']) ?></p>
<p><strong>Subject:</strong> <?= htmlspecialchars($request['subject']) ?></p>
<p><strong>Message:</strong> <?= nl2br(htmlspecialchars($request['message'])) ?></p>
 
<form method="POST">
    <label for="response">Your Response:</label><br>
    <textarea name="response" rows="6" cols="50" required></textarea><br><br>
    <button type="submit">Send Response</button>
</form>
 
<br>
<a href="manage_contactusrequest.php">← Back to Contact Requests</a>
 
</body>
</html>