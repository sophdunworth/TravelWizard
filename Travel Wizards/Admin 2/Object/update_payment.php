<?php
require_once 'classes/Payment.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingID = $_POST['bookingID'];
    $newAmountPaid = $_POST['amountPaid'];
    $newAmountPending = $_POST['amountPending'];
    $newStatus = $_POST['payment_status'];

    $payment = new Payment();

    if ($payment->updatePayment($bookingID, $newAmountPaid, $newAmountPending, $newStatus)) {
        echo "Payment updated successfully!";
    } else {
        echo "Error updating payment.";
    }
}
?>
<form action="update_payment.php" method="POST">
    <input type="number" name="bookingID" placeholder="Booking ID" required><br><br>
    
    <input type="number" step="0.01" name="amountPaid" placeholder="New Amount Paid" required><br><br>
    
    <input type="number" step="0.01" name="amountPending" placeholder="New Amount Pending" required><br><br>

    <select name="payment_status" required>
        <option value="">Select New Status</option>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
    </select><br><br>

    <button type="submit">Update Payment</button>
</form>
