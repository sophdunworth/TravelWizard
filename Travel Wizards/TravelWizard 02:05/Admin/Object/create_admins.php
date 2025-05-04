<?php
// Include the Admin class
require_once 'classes/Admin.php';

// Create an instance of the Admin class
$adminObj = new Admin($conn);

// Initialize the status message
$statusMessage = "";

// Function to escape user input
function escape($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Check if the form is submitted using the 'submit' button
if (isset($_POST['submit'])) {
    try {
        // Sanitize and validate inputs
        $adminname = escape($_POST['adminname']);
        $email = escape($_POST['email']);
        $password = escape($_POST['password']);

        if (!empty($adminname) && !empty($email) && !empty($password)) {
            // Attempt to create the admin
            if ($adminObj->createAdminAndUser($adminname, $email, $password)) {
                header("Location: manage_admins.php?status=Admin+created+successfully");
                exit;
            } else {
                $statusMessage = "❌ Failed to create admin.";
            }
        } else {
            $statusMessage = "❌ All fields are required.";
        }
    } catch (PDOException $e) {
        $statusMessage = "❌ Database error: " . $e->getMessage();
    }
}
?>

<!-- HTML PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Admin</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body style="background-color: #e0f7fa; padding: 20px;">

<h2>Create New Admin</h2>
<a href="manage_admins.php">&larr; Back to Admin List</a>

<!-- Display status message if set -->
<?php if (!empty($statusMessage)): ?>
    <p><?php echo $statusMessage; ?></p>
<?php endif; ?>

<!-- Admin Creation Form -->
<form method="POST" action="">
    <label for="adminname">Admin Name:</label><br>
    <input type="text" name="adminname" id="adminname" required><br><br>

    <label for="email">Admin Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit" name="submit" style="padding: 10px 20px; background-color: #0288d1; color: white; border: none;">Create Admin</button>
</form>

</body>
</html>


