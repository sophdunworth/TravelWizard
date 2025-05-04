<?php
require_once 'db1.php';                    
require_once 'classes/Notification.php';   
 
$notificationObj = new Notification($conn);
$notifications = $notificationObj->getAllNotifications();
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Notifications</title>
<link rel="stylesheet" href="css/Admin.css"> 

</head>
<body>
 
<h2>Previous Notifications</h2>
 
<!-- Search box to filter notifications by month -->
<div class="search-container">
<input type="text" id="searchInput" placeholder="Search by month (e.g. March or 03)">
</div>
<!-- Back to main notifications management page -->
<div class="back-link">
<a href="manage_notifications.php">← Back to Notifications</a>
</div>
 
<!-- Notification list -->
<div id="notificationList">
<?php if (!empty($notifications)): ?>
<?php foreach ($notifications as $n): ?>
<?php
                // Convert the sent_at datetime into different formats for display and filtering
                $sentAt = strtotime($n['sent_at']);
                $monthName = strtolower(date('F', $sentAt));   
                $monthNumber = date('m', $sentAt);              
                $sentFormatted = date("Y-m-d H:i", $sentAt);    
            ?>
<!-- Each notification is wrapped with a data attribute for filtering -->
<div class="notification" data-month="<?= $monthName ?> <?= $monthNumber ?>">
<div class="notification-title" onclick="toggleMessage(this)">
<?= htmlspecialchars($n['name']) ?>
<span class="sent-at-inline">(<?= $sentFormatted ?>)</span>
</div>
<div class="notification-message">
<?= nl2br(htmlspecialchars($n['message'])) ?>
<div class="sent-at">Sent at: <?= htmlspecialchars($n['sent_at']) ?></div>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<p style="text-align:center;">No notifications found.</p>
<?php endif; ?>
</div>
 
 
<!-- JavaScript for toggling messages and filtering -->
<script>
// Toggle the visibility of a notification's message
function toggleMessage(titleElement) {
    const messageDiv = titleElement.nextElementSibling;
    messageDiv.style.display = (messageDiv.style.display === "block") ? "none" : "block";
}
 
// Filter notifications based on search input 
document.getElementById("searchInput").addEventListener("input", function () {
    const filter = this.value.toLowerCase();
    const notifications = document.querySelectorAll(".notification");
 
    notifications.forEach(function (notif) {
        const data = notif.getAttribute("data-month");
        notif.style.display = data.includes(filter) ? "block" : "none";
    });
});
</script>
 
</body>
</html>

