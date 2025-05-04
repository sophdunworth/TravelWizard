<?php
require_once 'db1.php';

if (isset($_GET['id'])) {
    $bookingID = intval($_GET['id']);
    $query = "DELETE FROM payments WHERE bookingID = $bookingID";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Payment deleted successfully!'); window.location.href='manage_payments.php';</script>";
    } else {
        echo "<script>alert('Error deleting payment.'); window.location.href='manage_payments.php';</script>";
    }
}
?>
