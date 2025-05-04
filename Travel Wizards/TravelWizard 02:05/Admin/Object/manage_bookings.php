<?php  
require_once 'classes/Booking.php'; 

// Escape helper for input sanitization
function escape($input) {
    return htmlspecialchars(($input), ENT_QUOTES, 'UTF-8');
}

// ===== Update booking status if form submitted =====
if (isset($_POST['update_booking'])) {
    try {
        $bookingData = array(
            "bookingID" => escape($_POST['bookingID']),
            "status" => escape($_POST['status'])
        );

        $booking = new Booking($conn);

        // Update status in the database
        if ($booking->updateBookingStatus($bookingData['bookingID'], $bookingData['status'])) {
            echo "<script>alert('Booking status updated successfully!'); window.location.href='manage_bookings.php';</script>";
        } else {
            echo "<script>alert('Error updating booking status.'); window.location.href='manage_bookings.php';</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Database error: " . htmlspecialchars($e->getMessage()) . "'); window.location.href='manage_bookings.php';</script>";
    }
}

// ===== Handle search by Booking ID =====
try {
    $searchBookingID = isset($_GET['search']) ? escape($_GET['search']) : '';

    if (!empty($searchBookingID)) {
        $sql = "SELECT * FROM bookings WHERE bookingID = :bookingID";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['bookingID' => $searchBookingID]);
    } else {
        $sql = "SELECT * FROM bookings";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<script>alert('Database retrieval error: " . htmlspecialchars($e->getMessage()) . "');</script>";
}

// ===== Retrieve booking for edit request =====
$editBooking = null;
if (isset($_GET['edit'])) {
    try {
        $editID = intval($_GET['edit']);
        $editStmt = $conn->prepare("SELECT * FROM bookings WHERE bookingID = :bookingID");
        $editStmt->execute(['bookingID' => $editID]);
        $editBooking = $editStmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<script>alert('Error fetching booking: " . htmlspecialchars($e->getMessage()) . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="css/Admin.css"> 
</head>
<body>

<div class="container">
    <h2>Manage Bookings</h2>
    <div class="back-link"><a href="dashboard.php">&larr; Back to Dashboard</a></div>

    <form action="manage_bookings.php" method="GET">
        <input type="text" name="search" placeholder="Search by Booking ID" value="<?php echo htmlspecialchars($searchBookingID); ?>">
        <button type="submit">Search</button>
        <a href="manage_bookings.php" class="btn-link">Clear</a>
    </form>

    <?php if ($editBooking): ?>
        <h4>Edit Booking Status</h4>
        <form action="manage_bookings.php" method="POST">
            <input type="hidden" name="bookingID" value="<?php echo htmlspecialchars($editBooking['bookingID']); ?>">
            <select name="status" required>
                <option value="pending" <?php if ($editBooking['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                <option value="completed" <?php if ($editBooking['status'] == 'completed') echo 'selected'; ?>>Completed</option>
            </select>
            <button type="submit" name="update_booking">Update Status</button>
        </form>
    <?php endif; ?>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Package ID</th>
                    <th>Date Booked</th>
                    <th>Status</th>
                    <th>Departure Flight</th>
                    <th>Return Flight</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['bookingID']); ?></td>
                        <td>
                            <?php
                            if (isset($row['user_id'])) {
                                $userID = intval($row['user_id']);
                                $userStmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
                                $userStmt->execute([$userID]);
                                $userRow = $userStmt->fetch(PDO::FETCH_ASSOC);
                                echo $userRow ? htmlspecialchars($userRow['username']) : 'Unknown User';
                            } else {
                                echo 'Unknown User';
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['package_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['dateBooked']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($row['departureFlight']); ?></td>
                        <td><?php echo htmlspecialchars($row['returnFlight']); ?></td>
                        <td>
                            <a href="manage_bookings.php?edit=<?php echo $row['bookingID']; ?>">Edit</a>
                            <form method="POST" action="delete_booking.php" style="display:inline;" onsubmit="return confirm('Delete booking?');">
                                <input type="hidden" name="bookingID" value="<?php echo $row['bookingID']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
