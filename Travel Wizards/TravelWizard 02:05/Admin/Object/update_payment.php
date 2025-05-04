<?php
require_once 'db1.php';                  
require_once 'classes/Payment.php';      // Include the Payment class

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if (isset($_POST['submit'])) {
    try {
        // Sanitize and store user input
        $payment_data = array(
            "bookingID"      => escape($_POST['bookingID']),
            "amountPaid"     => escape($_POST['amountPaid']),
            "amountPending"  => escape($_POST['amountPending']),
            "payment_status" => escape(($_POST['payment_status'])) 
        );

        // Validate required fields
        foreach ($payment_data as $key => $value) {
            if ($value === null || $value === '' || ($key === 'bookingID' && $value <= 0)) {
                throw new Exception("Invalid or missing field: " . $key);
            }
        }

        // Create Payment object and attempt update
        $payment = new Payment($conn);
        $updated = $payment->updatePayment(
            $payment_data['bookingID'],
            $payment_data['amountPaid'],
            $payment_data['amountPending'],
            $payment_data['payment_status']
        );

        // Handle result
        if ($updated) {
            echo "✅ Payment updated successfully!";
        } else {
            throw new Exception("Payment update failed.");
        }

    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}
?>

<!-- === Payment Update Form === -->
<form action="update_payment.php" method="POST">
    <input type="number" name="bookingID" placeholder="Booking ID" required><br><br>
    
    <input type="number" step="0.01" name="amountPaid" placeholder="Amount Paid" required><br><br>
    
    <input type="number" step="0.01" name="amountPending" placeholder="Amount Pending" required><br><br>

    <select name="payment_status" required>
        <option value="">-- Select Status --</option>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
    </select><br><br>

    <button type="submit">Update Payment</button>
</form>


