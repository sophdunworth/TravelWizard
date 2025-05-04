<?php
require_once 'db1.php';
require_once 'classes/Admin.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle delete request if triggered via fetch
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['userID'])) {
    $userID = intval($_POST['userID']);

    $stmt = $conn->prepare("DELETE FROM admins WHERE userID = ?");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "✅ Admin deleted successfully.";
    } else {
        echo "❌ Error: Could not delete admin.";
    }
    $stmt->close();
    exit;
}

// Otherwise, load the page normally
$admin = new Admin($conn);
$admins = $admin->getAllAdmins();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Admins</title>
    <link rel="stylesheet" href="css/Admin.css">
   
</head>
<body>

<h2>Delete Admins</h2>

<a href="dashboard.php" style="text-decoration: none; color: #007BFF;">&larr; Back to Dashboard</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Admin Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr id="admin-<?php echo $admin['userID']; ?>">
                <td><?php echo htmlspecialchars($admin['userID']); ?></td>
                <td><?php echo htmlspecialchars($admin['adminName']); ?></td>
                <td>
                    <button onclick="deleteAdmin(<?php echo $admin['userID']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function deleteAdmin(userID) {
    if (!confirm("Are you sure you want to delete this admin?")) return;

    const formData = new FormData();
    formData.append("userID", userID);

    fetch("delete_admins.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(message => {
        alert(message);
        if (message.includes("✅")) {
            const row = document.getElementById("admin-" + userID);
            if (row) row.remove();
        }
    })
    .catch(err => {
        alert("❌ Error deleting admin.");
        console.error(err);
    });
}
</script>

</body>
</html>

