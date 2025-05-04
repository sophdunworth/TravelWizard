<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Notifications</title>
<!-- Link to external CSS stylesheet -->
<link rel="stylesheet" type="text/css" href="css/Admin.css">
</head>
 
<body>
 
<!-- Display a temporary success popup if a notification was created -->
<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
<div class="alert-popup" id="popup">✅ Notification created successfully!</div>
<script>
        // Show the popup for 3 seconds
        const popup = document.getElementById("popup");
        popup.style.display = "block";
        setTimeout(() => { popup.style.display = "none"; }, 3000);
</script>
<?php endif; ?>
 
<!-- Page title -->
<h2>Manage Notifications</h2>
 
<!-- Link to return to the admin dashboard -->
<a href="dashboard.php">← Back to Dashboard</a>
 
<!-- Container for the action buttons -->
<!-- https://www.w3schools.com/charsets/ref_utf_dingbats.asp -->
<div class="button-container">
<!-- Button to create a new notification -->
<a href="create_notification.php" class="btn-link">➕ Create Notification</a>
</div>
    
<div class="button-container">    
<!-- Button to view previously created notifications -->
<!-- // www.w3schools.com/charsets/ref_emoji_office.asp -->
<a href="display_notifications.php" class="btn-link">📜 View Previous Notifications</a>
</div>
 
</body>
</html>
