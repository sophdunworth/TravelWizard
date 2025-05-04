<?php
require_once 'db.php';
require_once 'User.php';
require_once 'Customer.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure $conn is set
if (!isset($conn) || !($conn instanceof mysqli)) {
    die("Database connection error.");
}

try {
    // Pass the valid connection to Customer
    $customer = new Customer($conn);
    $customers = $customer->getAllCustomers();
    
    // Debugging: Print data
    echo "<pre>";
    print_r($customers);
    echo "</pre>";
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
</head>
<body>
    <h2>Customer List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?php echo isset($customer['userID']) ? htmlspecialchars($customer['userID']) : 'N/A'; ?></td>
                        <td><?php echo isset($customer['username']) ? htmlspecialchars($customer['username']) : 'N/A'; ?></td>
                        <td><?php echo isset($customer['email']) ? htmlspecialchars($customer['email']) : 'N/A'; ?></td>
                        <td>
                            <!-- Edit button -->
                            <a href="edit_customer.php?userID=<?php echo isset($customer['userID']) ? $customer['userID'] : ''; ?>">Edit</a>
                            
                            <!-- Delete button -->
                            <a href="delete_customer.php?userID=<?php echo isset($customer['userID']) ? $customer['userID'] : ''; ?>" 
                               onclick="return confirm('Are you sure you want to delete this customer?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No customers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>



