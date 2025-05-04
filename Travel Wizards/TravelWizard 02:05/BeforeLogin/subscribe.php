<?php 
require_once 'db.php';
 
if (isset($_POST['email'])) {
    $email = $_POST['email'];
 
    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.'); window.history.back();</script>";
        exit;
    }
 
    // Check if the email is already subscribed
    $check = $pdo->prepare("SELECT * FROM subscribers WHERE email = ?");
    $check->execute([$email]);
    $result = $check->fetch(PDO::FETCH_ASSOC);
 
    if ($result) {
        echo "<script>alert('You are already subscribed!'); window.history.back();</script>";
    } else {
        // Insert new email
        $stmt = $pdo->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $stmt->execute([$email]);
 
        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Thank you for subscribing!'); window.location.href='index1.php';</script>";
        } else {
            echo "<script>alert('Error subscribing. Please try again later.'); window.history.back();</script>";
        }
    }
}
?>

