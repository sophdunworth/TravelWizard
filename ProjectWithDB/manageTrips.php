<link rel="stylesheet" href="css/Admin.css">
<script defer src="js/TripScript.js"></script>

<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM trips");
?>
<h2>Manage Trips</h2>
<table>
    <tr><th>Trip Name</th><th>Bookings</th><th>Status</th><th>Actions</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['bookings']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="edit_trip.php?id=<?php echo $row['id']; ?>">Edit</a></td>
        </tr>
    <?php } ?>
</table>