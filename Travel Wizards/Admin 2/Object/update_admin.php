<?php
require_once 'db1.php';
require_once 'classes/Admin.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : 0;
    $adminname = isset($_POST['adminname']) ? trim($_POST['adminname']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($adminname)) {
        echo "❌ Admin name cannot be empty.";
        exit;
    }

    try {
        $admin = new Admin($conn, $userID);
        $admin->setAdminName($adminname);

        if (!empty($password)) {
            $admin->setPassword($password);
        }

        // ✅ Clean success message only
        echo "✅ Admin details have been updated and saved.";
        exit;
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage();
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Admin Info</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<h2>Update Admin Info</h2>

<form id="updateForm">
    <label for="userID">User ID:</label><br>
    <input type="number" name="userID" id="userID" required><br><br>

    <label for="adminname">Admin Name:</label><br>
    <input type="text" name="adminname" id="adminname" required><br><br>

    <label for="password">New Password (optional):</label><br>
    <input type="password" name="password" id="password"><br><br>

    <button type="submit">Update</button>
</form>

<script>
document.getElementById('updateForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('update_admin.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(message => {
        alert(message);
    })
    .catch(error => {
        alert("Something went wrong.");
        console.error("Error:", error);
    });
});
</script>

</body>
</html>
