<link rel="stylesheet" href="css/Admin.css">
<script defer src="js/TripScript.js"></script>

<?php
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<h2>User Database</h2>
<table>
    <tr><th>Name</th><th>Email</th><th>Actions</th></tr>
    <?php while($user = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a></td>
        </tr>
    <?php } ?>
</table>

