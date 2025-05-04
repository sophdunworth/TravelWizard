<?php 
require_once 'classes/Booking.php';
require_once 'db1.php'; // Database connection

// If form submitted to update booking status
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_booking'])) {
    $bookingID = $_POST['bookingID'];
    $status = $_POST['status'];

    $booking = new Booking($conn);

    if ($booking->updateBookingStatus($bookingID, $status)) {
        echo "<script>alert('Booking status updated successfully!'); window.location.href='manage_bookings.php';</script>";
    } else {
        echo "<script>alert('Error updating booking status.'); window.location.href='manage_bookings.php';</script>";
    }
}

// Handle searching
$searchBookingID = $_GET['search'] ?? '';

if (!empty($searchBookingID)) {
    $query = "SELECT * FROM bookings WHERE bookingID = " . intval($searchBookingID);
} else {
    $query = "SELECT * FROM bookings";
}

$result = mysqli_query($conn, $query);

// If editing, get booking details
$editBooking = null;
if (isset($_GET['edit'])) {
    $editID = intval($_GET['edit']);
    $editQuery = "SELECT * FROM bookings WHERE bookingID = $editID";
    $editResult = mysqli_query($conn, $editQuery);
    $editBooking = mysqli_fetch_assoc($editResult);
}
?>

<script>
function confirmDelete(bookingID) {
    if (confirm('Are you sure you want to delete this booking?')) {
        // Create a form dynamically
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'delete_booking.php';

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'bookingID';
        input.value = bookingID;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
    return false; // Prevent the link from navigating
}
</script>


<div class="container mt-5">
    <h2 class="mb-4">Manage Bookings</h2>
    <link rel="stylesheet" href="css/Admin.css">
    <a href="dashboard.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Dashboard</a>
<br><br>

    <!-- SEARCH BAR -->
    <form action="manage_bookings.php" method="GET" class="mb-4">
        <div class="input-group mb-3" style="max-width: 400px;">
            <input type="text" class="form-control" name="search" placeholder="Search by Booking ID" value="<?php echo htmlspecialchars($searchBookingID); ?>">
            <button class="btn btn-primary" type="submit">Search</button>
            <a href="manage_bookings.php" class="btn btn-secondary">Clear</a>
        </div>
    </form>

    <?php if ($editBooking) { ?>
    <!-- Edit Booking Status Form -->
    <h4>Edit Booking Status</h4>
    <form action="manage_bookings.php" method="POST" class="mb-4">
        <input type="hidden" name="bookingID" value="<?php echo htmlspecialchars($editBooking['bookingID']); ?>">

        <select name="status" required>
            <option value="pending" <?php if($editBooking['status'] == 'pending') echo 'selected'; ?>>Pending</option>
            <option value="completed" <?php if($editBooking['status'] == 'completed') echo 'selected'; ?>>Completed</option>
        </select><br><br>

        <button type="submit" name="update_booking" class="btn btn-success">Update Status</button>
    </form>
    <?php } ?>

    <!-- BOOKINGS TABLE -->
    <table class="table table-bordered">
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
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['bookingID']); ?></td>

                    <td>
                        <?php
                        if (isset($row['user_id'])) {
                            $userID = intval($row['user_id']);
                            $userQuery = mysqli_query($conn, "SELECT username FROM users WHERE userID = $userID");
                            if ($userRow = mysqli_fetch_assoc($userQuery)) {
                                echo htmlspecialchars($userRow['username']);
                            } else {
                                echo 'Unknown User';
                            }
                        } else {
                            echo 'Unknown User';
                        }
                        ?>
                    </td>

                    <td><?php echo htmlspecialchars($row['package_id'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['dateBooked'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['status'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['departureFlight'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['returnFlight'] ?? ''); ?></td>

                
     <td>
    <a href="manage_bookings.php?edit=<?php echo $row['bookingID']; ?>" class="btn btn-primary btn-sm">Edit</a>

    <a href="#" onclick="return confirmDelete(<?php echo $row['bookingID']; ?>);" class="btn btn-danger btn-sm">Delete</a>
</td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>