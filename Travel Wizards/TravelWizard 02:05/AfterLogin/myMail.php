<?php
 
// Protect the page so only logged-in users can access it
require_once '../BeforeLogin/auth.php'; 
require 'db.php';
 
// Retrieve the logged-in user's ID from the session
$user_id = $_SESSION['userid'];
 
// Prepare a SQL query to fetch user notifications and contact form responses
$query = $pdo->prepare("
    SELECT id, name, message, sent_at
    FROM notifications
    WHERE user_id = ?
    UNION
    SELECT id, subject AS name,
           CONCAT(message, '\n\nAdmin Response:\n', IFNULL(response, 'No response yet.')) AS message,
           created_at AS sent_at
    FROM contactusrequests
    WHERE user_id = ?
    ORDER BY sent_at DESC
");
 
// Execute the query with the user ID for both subqueries
$query->execute([$user_id, $user_id]);
 
// Fetch the combined messages as an associative array
$messages = $query->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Mail</title>
  <link rel="stylesheet" href="css/Body.css">
  <?php include 'templates/header.php'; ?>
</head>
<body>

<div class="mail-container">
  <h1 style="text-align: center; color: #2d3436; font-weight: 800;">My Mail</h1>

  <?php if (!empty($messages)): ?>
    <?php foreach ($messages as $msg): ?>
      <div class="mail-item" data-id="<?php echo $msg['id']; ?>">
        <div class="mail-header">
          <span><?php echo htmlspecialchars($msg['name']); ?></span>
          <button class="delete-btn" title="Hide this message">✖</button>
        </div>
        <div class="mail-message"><?php echo nl2br(htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8')); ?></div>
        <div class="mail-time"><?php echo htmlspecialchars($msg['sent_at']); ?></div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p style="text-align: center; color: #636e72;">No messages found.</p>
  <?php endif; ?>
</div>

<?php include 'templates/footer.php'; ?>
 
<script>
    // Retrieve hidden message IDs from localStorage
    const hiddenMessageIds = JSON.parse(localStorage.getItem('hiddenMessages') || '[]');
 
    // Loop through all messages and hide the ones previously marked hidden
    document.querySelectorAll('.mail-item').forEach(item => {
        const id = item.getAttribute('data-id');
        if (hiddenMessageIds.includes(id)) {
            item.style.display = 'none';
        }
    });
 
    // Add event listener to each "✖" button
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const item = this.closest('.mail-item'); 
            const id = item.getAttribute('data-id'); 
            item.style.display = 'none';
 
            // Save the ID in localStorage to keep it hidden on page reload
            if (!hiddenMessageIds.includes(id)) {
                hiddenMessageIds.push(id);
                localStorage.setItem('hiddenMessages', JSON.stringify(hiddenMessageIds));
            }
        });
    });
</script>
 
</body>
</html>
