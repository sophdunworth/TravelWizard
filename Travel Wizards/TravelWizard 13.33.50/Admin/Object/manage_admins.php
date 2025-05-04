<?php
require_once 'db1.php';
require_once 'classes/Admin.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $adminID = intval($_POST['adminID']);

    $stmt = $conn->prepare("DELETE FROM admins WHERE userID = ?");
    $stmt->bind_param("i", $adminID);

    if ($stmt->execute()) {
        echo "<script>alert('Admin deleted successfully!'); window.location.href='manage_admins.php';</script>";
    } else {
        echo "<script>alert('Error deleting admin.');</script>";
    }
    $stmt->close();
}

// Fetch admins
try {
    $adminObj = new Admin($conn);
    $searchQuery = "";
    $admins = [];

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchQuery = trim($_GET['search']);
        $allAdmins = $adminObj->getAllAdmins();
        foreach ($allAdmins as $admin) {
            if (stripos($admin['adminName'], $searchQuery) !== false) {
                $admins[] = $admin;
            }
        }
    } else {
        $admins = $adminObj->getAllAdmins();
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Admins</title>
    <link rel="stylesheet" href="css/Admin.css">
   
</head>
<body>

<h2>Manage Admins</h2>

<a href="dashboard.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Dashboard</a>
<br><br>

    <a href="create_admins.php">
    <button type="button" style="margin: 10px 0; padding: 8px 16px;">➕ Create Admin</button>
</a>
<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by name..." value="<?php echo htmlspecialchars($searchQuery); ?>">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Admin Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($admins)): ?>
        <?php foreach ($admins as $admin): ?>
            <tr id="row-<?php echo $admin['userID']; ?>">
                <td><?php echo htmlspecialchars($admin['userID']); ?></td>
                <td><?php echo htmlspecialchars($admin['adminName']); ?></td>
                <td>
                    <button onclick="openModal('<?php echo $admin['userID']; ?>', '<?php echo $admin['adminName']; ?>')">Edit</button>
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="adminID" value="<?php echo htmlspecialchars($admin['userID']); ?>">
                        <button type="submit" name="delete_user" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="3">No admins found.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<!-- Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit Admin</h2>
        <form id="updateForm">
            <input type="hidden" id="adminID" name="userID"> <!-- matches update_admin.php -->

            <label>Admin Name:</label><br>
            <input type="text" id="adminName" name="adminname" required><br><br>

            <label>New Password (optional):</label><br>
            <input type="password" id="password" name="password"><br><br>

            <button type="button" onclick="updateAdmin()">Update</button>
        </form>
    </div>
</div>

<script>
function openModal(adminID, adminName) {
    document.getElementById('adminID').value = adminID;
    document.getElementById('adminName').value = adminName;
    document.getElementById('password').value = ''; // Clear password
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

function updateAdmin() {
    const formData = new FormData(document.getElementById('updateForm'));

    fetch('update_admin.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(message => {
        alert(message);

        if (message.includes("✅")) {
            const id = document.getElementById('adminID').value;
            const newName = document.getElementById('adminName').value;
            const row = document.getElementById('row-' + id);
            if (row) {
                row.cells[1].innerText = newName;
            }
            closeModal();
        }
    })
    .catch(err => {
        alert("❌ Error updating admin.");
        console.error(err);
    });
}
</script>

</body>
</html>

