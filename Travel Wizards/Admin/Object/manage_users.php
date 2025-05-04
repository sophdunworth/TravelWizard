<?php
require_once 'db1.php';
require_once 'classes/User.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure database connection exists
if (!isset($conn) || !($conn instanceof mysqli)) {
    die("Database connection error.");
}

// Handle deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $userID = intval($_POST['userID']);

    $stmt = $conn->prepare("DELETE FROM Users WHERE userID = ?");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
    $stmt->close();
}

// Search or get all users
try {
    $user = new User($conn);
    $searchQuery = "";

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchQuery = trim($_GET['search']);
        $users = $user->searchUsersByEmail($searchQuery);
    } else {
        $users = $user->getAllUsers();
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/Admin.css">
  
</head>
<body>

<h2>Manage Users</h2>

<a href="dashboard.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Dashboard</a>
<br><br>

<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by email..." value="<?php echo htmlspecialchars($searchQuery); ?>">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($users) && is_array($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr id="row-<?php echo $user['userID']; ?>">
                <td><?php echo htmlspecialchars($user['userID']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['user_type']); ?></td>
                <td>
                    <button onclick="openModal('<?php echo $user['userID']; ?>', '<?php echo $user['username']; ?>', '<?php echo $user['email']; ?>', '<?php echo $user['user_type']; ?>')">Edit</button>
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($user['userID']); ?>">
                        <button type="submit" name="delete_user" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">No users found.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<!-- Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit User</h2>
        <form id="updateForm">
            <input type="hidden" id="userID" name="userID">

            <label>Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label>Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label>User Type:</label>
            <input type="text" id="user_type" name="user_type" required><br><br>

            <button type="button" onclick="updateUser()">Update</button>
        </form>
    </div>
</div>

<script>
function openModal(userID, username, email, user_type) {
    document.getElementById('userID').value = userID;
    document.getElementById('username').value = username;
    document.getElementById('email').value = email;
    document.getElementById('user_type').value = user_type;
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

function updateUser() {
    var formData = new FormData(document.getElementById('updateForm'));

    fetch('update_user.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);

        const userID = document.getElementById('userID').value;
        const newUsername = document.getElementById('username').value;
        const newEmail = document.getElementById('email').value;
        const newType = document.getElementById('user_type').value;

        const row = document.getElementById('row-' + userID);
        if (row) {
            row.cells[1].innerText = newUsername;
            row.cells[2].innerText = newEmail;
            row.cells[3].innerText = newType;
        }

        closeModal();
    })
    .catch(error => console.error('Error:', error));
}
</script>

</body>
</html>














