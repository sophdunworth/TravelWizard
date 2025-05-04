<?php
require_once 'classes/User.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the database connection is valid
if (!isset($conn) || !($conn instanceof PDO)) {
    die("Database connection error.");
}

// Sanitize and store search input (from GET request)
$searchQuery = !empty($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

try {
    // Prepare SQL query based on search input
    $sql = "SELECT * FROM users";
    $params = [];

    // If there is a search query, filter users by email
    if (!empty($searchQuery)) {
        $sql .= " WHERE email LIKE :searchQuery";
        $params[':searchQuery'] = "%" . $searchQuery . "%";
    }

    // Prepare and execute the SQL statement
    $statement = $conn->prepare($sql);
    $statement->execute($params);

    // Fetch all matching users
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Display success message or results
    if ($users) {
        $successMessage = 'Users fetched successfully!';
    } else {
        $successMessage = 'No users found matching the search criteria.';
    }
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<h2>Manage Users</h2>
<a href="dashboard.php">&larr; Return to Dashboard</a>

<!-- Display success or error messages -->
<?php if (isset($_GET['success']) && $_GET['success'] === 'deleted'): ?>
    <p class="message" style="color: green;">✅ User deleted successfully.</p>
<?php elseif (isset($_GET['success']) && $_GET['success'] === 'updated'): ?>
    <p class="message" style="color: green;">✅ User updated successfully.</p>
<?php elseif (isset($_GET['error'])): ?>
    <p class="message" style="color: red;">❌ An error occurred.</p>
<?php endif; ?>

<!-- Search form -->
<form method="GET" action="" style="margin-top: 20px;">
    <input type="text" name="search" placeholder="Search by email..." value="<?= htmlspecialchars($searchQuery); ?>">
    <button type="submit">Search</button>
</form>

<!-- Users table -->
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
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['userID']); ?></td>
                <td><?= htmlspecialchars($u['username']); ?></td>
                <td><?= htmlspecialchars($u['email']); ?></td>
                <td><?= htmlspecialchars($u['user_type']); ?></td>
                <td>
                    <!-- Update form -->
                    <form method="POST" action="update_user.php" style="display:inline-block;">
                        <input type="hidden" name="userID" value="<?= $u['userID']; ?>">
                        <input type="text" name="username" value="<?= htmlspecialchars($u['username']); ?>" required>
                        <input type="email" name="email" value="<?= htmlspecialchars($u['email']); ?>" required>
                        <select name="user_type" required>
                            <option value="customer" <?= $u['user_type'] === 'customer' ? 'selected' : '' ?>>Customer</option>
                            <option value="admin" <?= $u['user_type'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                        <button type="submit" name="update_user">Update</button>
                    </form>

                    <!-- Delete form -->
                    <form method="POST" action="delete_user.php" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        <input type="hidden" name="userID" value="<?= $u['userID']; ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">No users found.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>


