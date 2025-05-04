<?php
// Include database connection
require 'db1.php';
session_start();

// Check if a search term (userID) is provided
$searchQuery = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchID = $conn->real_escape_string($_GET['search']);
    $searchQuery = " WHERE u.userID = '$searchID'";
}

// Fetch customer data
$query = "SELECT u.userID, u.username, u.email, u.created_at 
          FROM users u
          LEFT JOIN customers c ON u.userID = c.userID" . $searchQuery;
$result = $conn->query($query);

// Fetch customer details for editing
$editCustomer = null;
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $editID = $conn->real_escape_string($_GET['edit']);
    $editQuery = "SELECT userID, username, email FROM users WHERE userID = '$editID'";
    $editResult = $conn->query($editQuery);
    if ($editResult && $editResult->num_rows > 0) {
        $editCustomer = $editResult->fetch_assoc();
    }
}

// Handle customer update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateCustomer'])) {
    $customerID = $_POST['customerID'];
    $newEmail = $_POST['newEmail'];

    $updateQuery = "UPDATE users SET email = ? WHERE userID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $newEmail, $customerID);
    if ($stmt->execute()) {
        echo "<p>Customer updated successfully!</p>";
    } else {
        echo "<p>Error updating customer.</p>";
    }
    $stmt->close();
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh the page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>
    <h2>Customer List</h2>

    <!-- Search Bar -->
    <form method="GET">
        <input type="number" name="search" placeholder="Search by ID..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Search</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['userID']) ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['created_at']) ?></td>
                        <td class="action-buttons">
                            <a href="?edit=<?= $row['userID'] ?>" class="edit-btn">Edit</a>
                            <a href="delete_customer.php?userID=<?= $row['userID'] ?>" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No users found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Edit Form (Only displayed when Edit button is clicked) -->
    <?php if ($editCustomer): ?>
        <h2>Edit Customer</h2>
        <form action="" method="POST">
            <input type="hidden" name="customerID" value="<?= htmlspecialchars($editCustomer['userID']) ?>">
            <label>Username:</label>
            <input type="text" value="<?= htmlspecialchars($editCustomer['username']) ?>" disabled><br>
            <label>Email:</label>
            <input type="email" name="newEmail" value="<?= htmlspecialchars($editCustomer['email']) ?>" required><br>
            <button type="submit" name="updateCustomer">Update Customer</button>
        </form>
    <?php endif; ?>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

