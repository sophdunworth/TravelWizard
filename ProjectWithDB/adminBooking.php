<link rel="stylesheet" href="css/Admin.css">
<script defer src="js/TripScript.js"></script>

<?php
$result = mysqli_query($conn, "SELECT * FROM bookings");
?>
<h2>Bookings</h2>
<table>
    <tr><th>Trip</th><th>User</th><th>Status</th><th>Payment</th></tr>
    <?php while($booking = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $booking['trip_name']; ?></td>
            <td><?php echo $booking['user_name']; ?></td>
            <td><?php echo $booking['status']; ?></td>
            <td><?php echo $booking['payment_status']; ?></td>
        </tr>
    <?php } ?>
</table>