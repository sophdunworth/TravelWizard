<?php 
require_once 'classes/Payment.php';
require_once 'db1.php'; // Database connection

// If form submitted to update payment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_payment'])) {
    $bookingID = $_POST['bookingID'];
    $amountPaid = $_POST['amountPaid'];
    $amountPending = $_POST['amountPending'];
    $payment_status = $_POST['payment_status'];
    $notes = $_POST['notes'] ?? '';

    $payment = new Payment($conn);

    if ($payment->updatePayment($bookingID, $amountPaid, $amountPending, $payment_status, $notes)) {
        echo "<script>alert('Payment updated successfully!'); window.location.href='manage_payments.php';</script>";
    } else {
        echo "<script>alert('Error updating payment.'); window.location.href='manage_payments.php';</script>";
    }
}

// Handle filtering or searching
$filter = $_GET['filter'] ?? '';
$searchBookingID = $_GET['search'] ?? '';

if (!empty($searchBookingID)) {
    $query = "SELECT * FROM payments WHERE bookingID = " . intval($searchBookingID);
} elseif ($filter == 'full') {
    $query = "SELECT * FROM payments WHERE amountPending <= 0";
} elseif ($filter == 'installments') {
    $query = "SELECT * FROM payments WHERE amountPending > 0";
} else {
    $query = "SELECT * FROM payments";
}

$result = mysqli_query($conn, $query);

// If editing, get the payment details
$editPayment = null;
if (isset($_GET['edit'])) {
    $editID = intval($_GET['edit']);
    $editQuery = "SELECT * FROM payments WHERE bookingID = $editID";
    $editResult = mysqli_query($conn, $editQuery);
    $editPayment = mysqli_fetch_assoc($editResult);
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Manage Payments</h2>
    <link rel="stylesheet" href="css/Admin.css">
    <a href="dashboard.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Dashboard</a>
<br><br>

    <!-- SEARCH BAR -->
    <form action="manage_payments.php" method="GET" class="mb-4">
        <div class="input-group mb-3" style="max-width: 400px;">
            <input type="text" class="form-control" name="search" placeholder="Search by Booking ID" value="<?php echo htmlspecialchars($searchBookingID); ?>">
            <button class="btn btn-primary" type="submit">Search</button>
            <a href="manage_payments.php" class="btn btn-secondary">Clear</a>
        </div>
    </form>

    <!-- FILTER BUTTONS -->
    <div class="mb-4">
        <a href="manage_payments.php" class="btn btn-secondary">Show All</a>
        <a href="manage_payments.php?filter=full" class="btn btn-success">Show Paid in Full</a>
        <a href="manage_payments.php?filter=installments" class="btn btn-warning">Show Installments</a>
    </div>

    <?php if ($editPayment) { ?>
    <!-- Edit Payment Form -->
    <h4>Edit Payment</h4>
    <form action="manage_payments.php" method="POST" class="mb-4">
        <input type="hidden" name="bookingID" value="<?php echo htmlspecialchars($editPayment['bookingID']); ?>">

        <input type="number" step="0.01" name="amountPaid" value="<?php echo htmlspecialchars($editPayment['amountPaid']); ?>" placeholder="Amount Paid" required><br><br>

        <input type="number" step="0.01" name="amountPending" value="<?php echo htmlspecialchars($editPayment['amountPending']); ?>" placeholder="Amount Pending" required><br><br>

        <select name="payment_status" required>
            <option value="pending" <?php if($editPayment['payment_status'] == 'pending') echo 'selected'; ?>>Pending</option>
            <option value="completed" <?php if($editPayment['payment_status'] == 'completed') echo 'selected'; ?>>Completed</option>
        </select><br><br>

        <textarea name="notes" placeholder="Enter notes (optional)" rows="3" style="width:100%;"><?php echo htmlspecialchars($editPayment['notes'] ?? ''); ?></textarea><br><br>

        <button type="submit" name="update_payment" class="btn btn-success">Update Payment</button>
    </form>
    <?php } ?>

    <!-- PAYMENTS TABLE -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Amount Paid</th>
                <th>Payment Status</th>
                <th>Transaction Date</th>
                <th>Amount Pending</th>
                <th>Payment Completion</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['bookingID']); ?></td>
                    <td><?php echo htmlspecialchars($row['amountPaid']); ?></td>
                    <td><?php echo htmlspecialchars($row['payment_status']); ?></td>
                    <td><?php echo htmlspecialchars($row['transactionDate']); ?></td>
                    <td><?php echo htmlspecialchars($row['amountPending']); ?></td>

                    <td>
                        <?php 
                            if (floatval($row['amountPending']) <= 0) {
                                echo '<span class="badge bg-success">Paid in Full</span>';
                            } else {
                                echo '<span class="badge bg-warning text-dark">Installments</span>';
                            }
                        ?>
                    </td>

                    <td><?php echo htmlspecialchars($row['notes'] ?? ''); ?></td>

                    <td>
                        <a href="manage_payments.php?edit=<?php echo $row['bookingID']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>





