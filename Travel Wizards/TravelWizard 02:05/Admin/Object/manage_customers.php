<?php
require_once 'classes/Customer.php';


$searchQuery = $_GET['search'] ?? ''; 
$customerObj = new Customer($conn);
 
// Fetch customers based on search input
$customers = !empty($searchQuery)
    ? $customerObj->searchCustomersByEmail($searchQuery)
    : $customerObj->getAllCustomers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Customers</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<div class="container">
    <h2>Manage Customers</h2>
    <div class="back-link"><a href="dashboard.php">&larr; Back to Dashboard</a></div>
    
    <!-- Display feedback based on action outcome -->
    <?php if (isset($_GET['success']) && $_GET['success'] === 'deleted'): ?>
        <div class="notification">✅ Customer deleted successfully!</div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] === 'updated'): ?>
        <div class="notification">✅ Customer updated successfully!</div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="error">❌ An error occurred.</div>
    <?php endif; ?>

    <!-- Search form -->
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by email..." value="<?= htmlspecialchars($searchQuery); ?>">
        <button type="submit">Search</button>
    </form>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($customers)): ?>
                    <?php foreach ($customers as $cust): ?>
                        <tr>
                            <td><?= htmlspecialchars($cust['userID']); ?></td>
                            <td><?= htmlspecialchars($cust['username']); ?></td>
                            <td><?= htmlspecialchars($cust['email']); ?></td>
                            <td>
                                <button onclick="openModal('<?= $cust['userID']; ?>', '<?= htmlspecialchars($cust['username'], ENT_QUOTES); ?>', '<?= htmlspecialchars($cust['email'], ENT_QUOTES); ?>')">Edit</button>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="userID" value="<?= $cust['userID']; ?>">
                                    <button type="submit" name="delete_user" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">No customers found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
