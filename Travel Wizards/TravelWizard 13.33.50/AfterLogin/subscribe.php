<?php
require_once 'db.php'; // Connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.'); window.history.back();</script>";
        exit;
    }

    // Check if already subscribed
    $check = $conn->prepare("SELECT * FROM subscribers WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('You are already subscribed!'); window.history.back();</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "<script>alert('Thank you for subscribing!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error subscribing. Please try again later.'); window.history.back();</script>";
        }
    }
}
?>
