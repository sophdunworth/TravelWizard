<?php
require_once 'db1.php';
require_once 'classes/Admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminName = trim($_POST['adminName']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $createdAt = date("Y-m-d H:i:s");
    $userType = "admin";

    // Step 1: Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, created_at, user_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $adminName, $email, $password, $createdAt, $userType);

    if ($stmt->execute()) {
        $newUserID = $stmt->insert_id;

        // Step 2: Insert into admins table
        $admin = new Admin($conn);
        if ($admin->createAdminWithID($newUserID, $adminName, $password)) {
            echo "<script>alert('✅ Admin created successfully!'); window.location.href='manage_admins.php';</script>";
        } else {
            echo "Error inserting into admins table.";
        }
    } else {
        echo "Error inserting into users table.";
    }

    $stmt->close();
}
?>


 <link rel="stylesheet" href="css/Admin.css">
<form action="create_admins.php" method="POST">
    
    <h2>Create a New Admin</h2>
    <a href="manage_admins.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Manage Admins</a>
    <br><br>        

    <input type="text" name="adminName" placeholder="Admin Name" required><br>
    <input type="email" name="email" placeholder="Email Address" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Create</button>
</form>

