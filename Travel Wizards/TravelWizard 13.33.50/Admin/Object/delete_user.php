<?php
require_once 'db1.php';
require_once 'classes/User.php';

$user = new User($conn);
$users = $user->getAllUsers(); // method should return userID, username, email, etc.
?>

<table>
    <thead>
        <tr>
            <th>ID</th><th>Username</th><th>Email</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr id="user-<?php echo $user['userID']; ?>">
                <td><?php echo htmlspecialchars($user['userID']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td>
                    <button onclick="deleteUser(<?php echo $user['userID']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function deleteUser(userID) {
    if (!confirm("Are you sure you want to delete this user?")) return;

    const formData = new FormData();
    formData.append("userID", userID);

    fetch("delete_user.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(message => {
        alert(message);
        if (message.includes("✅")) {
            const row = document.getElementById("user-" + userID);
            if (row) row.remove(); // remove the row from the table
        }
    })
    .catch(err => {
        alert("Error deleting user.");
        console.error(err);
    });
}
</script>
