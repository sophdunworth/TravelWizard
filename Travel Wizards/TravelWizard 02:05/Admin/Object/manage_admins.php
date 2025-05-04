<?php  
require_once 'classes/Admin.php';

// Create an instance of the Admin class
$adminObj = new Admin($conn);

// Initialize variables for search and admin data
$searchQuery = "";
$admins = [];

// If a search term is provided via GET, filter the results
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Sanitize the search input
    $searchQuery = ($_GET['search']);

    // Retrieve all admins
    $allAdmins = $adminObj->getAllAdmins();

    // Filter results that match the search term 
    foreach ($allAdmins as $admin) {
        if (stripos($admin['adminName'], $searchQuery) !== false) {
            $admins[] = $admin;
        }
    }
} else {
    // If no search term is provided, retrieve all admins
    $admins = $adminObj->getAllAdmins();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<div class="container">
    <h2>Manage Admins</h2>
    <div class="back-link"><a href="dashboard.php">&larr; Back to Dashboard</a></div>

    <a href="create_admins.php"><button>➕ Create Admin</button></a>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by name..." value="<?php echo htmlspecialchars($searchQuery); ?>">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($_GET['status'])): ?>
        <div class="notification"> <?php echo htmlspecialchars($_GET['status']); ?> </div>
    <?php endif; ?>

    <div class="table-container">
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
                        <tr>
                            <td><?php echo htmlspecialchars($admin['userID']); ?></td>
                            <td><?php echo htmlspecialchars($admin['adminName']); ?></td>
                            <td>
                                <form method="POST" action="update_admin.php" style="display:inline-block;">
                                    <input type="hidden" name="userID" value="<?php echo $admin['userID']; ?>">
                                    <input type="text" name="adminname" value="<?php echo htmlspecialchars($admin['adminName']); ?>" required>
                                    <input type="password" name="password" placeholder="New Password (optional)">
                                    <button type="submit">Update</button>
                                </form>

                                <form method="POST" action="delete_admins.php" style="display:inline-block;" onsubmit="return confirm('Delete this admin?');">
                                    <input type="hidden" name="userID" value="<?php echo $admin['userID']; ?>">
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3">No admins found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
    </body>
</html>

