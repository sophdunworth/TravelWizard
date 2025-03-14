<link rel="stylesheet" href="css/Admin.css">
<script defer src="js/TripScript.js"></script>

<?php
$result = mysqli_query($conn, "SELECT * FROM messages");
?>
<h2>Messages</h2>
<table>
    <tr><th>User</th><th>Message</th><th>Reply</th></tr>
    <?php while($message = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $message['user_name']; ?></td>
            <td><?php echo $message['message']; ?></td>
            <td><a href="reply_message.php?id=<?php echo $message['id']; ?>">Reply</a></td>
        </tr>
    <?php } ?>
</table>