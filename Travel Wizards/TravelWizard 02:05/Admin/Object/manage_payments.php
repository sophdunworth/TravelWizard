<?php
require_once 'classes/Payment.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle payment update
if (isset($_POST['update_payment'])) {
    try {
		$payment_data = array(
		    "bookingID" => $_POST['bookingID'],
		    "amountPaid" => $_POST['amountPaid'],
		    "amountPending" => $_POST['amountPending'],
		    "payment_status" => $_POST['payment_status'],
		    "notes" => $_POST['notes'] ?? ''
		);

        $sql = "UPDATE payments SET 
                    amountPaid = :amountPaid,
                    amountPending = :amountPending,
                    payment_status = :payment_status,
                    notes = :notes
                WHERE bookingID = :bookingID";

        $stmt = $conn->prepare($sql);
        $stmt->execute($payment_data);

        echo "<script>alert('✅ Payment updated successfully!'); window.location.href='manage_payments.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('❌ Error updating payment.'); window.location.href='manage_payments.php';</script>";
    }
}

// Search/filter logic
$searchBookingID = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';
$editPayment = null;

try {
    $query = "SELECT * FROM payments";
    $params = [];

    if (!empty($searchBookingID)) {
        $query .= " WHERE bookingID = :searchBookingID";
        $params[':searchBookingID'] = $searchBookingID;
    } elseif ($filter === 'full') {
        $query .= " WHERE amountPending <= 0";
    } elseif ($filter === 'installments') {
        $query .= " WHERE amountPending > 0";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Load record to edit
    if (isset($_GET['edit'])) {
        $editID = intval($_GET['edit']);
        $editStmt = $conn->prepare("SELECT * FROM payments WHERE bookingID = :editID");
        $editStmt->execute([':editID' => $editID]);
        $editPayment = $editStmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("❌ Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Payments</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<div class="container">
    <h2>Manage Payments</h2>
    <a href="dashboard.php" class="btn">&larr; Return to Dashboard</a><br><br>

    <!-- Search & Filter -->
    <form method="GET">
        <input type="text" name="search" placeholder="Search by Booking ID" value="<?= htmlspecialchars($searchBookingID) ?>">
        <button type="submit">Search</button>
        <a href="manage_payments.php" class="btn">Clear</a>
    </form>

    <div style="margin-top: 10px;">
        <a href="manage_payments.php" class="btn">Show All</a>
        <a href="manage_payments.php?filter=full" class="btn">Paid in Full</a>
        <a href="manage_payments.php?filter=installments" class="btn">Installments</a>
    </div>

    <!-- Edit Form -->
    <?php if ($editPayment): ?>
        <hr>
        <h3>Edit Payment</h3>
        <form method="POST" style="margin-bottom: 30px;">
            <input type="hidden" name="bookingID" value="<?= htmlspecialchars($editPayment['bookingID']) ?>">

            <input type="number" step="0.01" name="amountPaid" value="<?= htmlspecialchars($editPayment['amountPaid']) ?>" placeholder="Amount Paid" required><br><br>

            <input type="number" step="0.01" name="amountPending" value="<?= htmlspecialchars($editPayment['amountPending']) ?>" placeholder="Amount Pending" required><br><br>

            <select name="payment_status" required>
                <option value="pending" <?= $editPayment['payment_status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="completed" <?= $editPayment['payment_status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
            </select><br><br>

            <textarea name="notes" placeholder="Enter notes (optional)" rows="3" style="width:100%;"><?= htmlspecialchars($editPayment['notes'] ?? '') ?></textarea><br><br>

            <button type="submit" name="update_payment">Update Payment</button>
        </form>
    <?php endif; ?>

    <!-- Payment Table -->
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Amount Paid</th>
                <th>Amount Pending</th>
                <th>Status</th>
                <th>Transaction Date</th>
                <th>Completion</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($result)): ?>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['bookingID']) ?></td>
                    <td><?= htmlspecialchars($row['amountPaid']) ?></td>
                    <td><?= htmlspecialchars($row['amountPending']) ?></td>
                    <td><?= htmlspecialchars($row['payment_status']) ?></td>
                    <td><?= htmlspecialchars($row['transactionDate']) ?></td>
                    <td>
                        <?php if (floatval($row['amountPending']) <= 0): ?>
                            <span class="badge bg-success">Paid in Full</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Installments</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['notes'] ?? '') ?></td>
                    <td><a href="manage_payments.php?edit=<?= $row['bookingID'] ?>" class="btn btn-sm">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8">No payments found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

