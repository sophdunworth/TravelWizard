<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protect this page
require_once '../BeforeLogin/auth.php'; // Make sure user is logged in

require 'db.php'; // Database connection

$user_id = $_SESSION['userid']; // Get the user ID from session

// Fetch user messages and admin replies
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
$query->execute([$user_id, $user_id]);

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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .mail-container {
            flex: 1;
            max-width: 700px;
            margin: 80px auto 20px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .mail-item {
            position: relative;
            border-bottom: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .mail-header {
            font-weight: bold;
            margin-bottom: 8px;
        }
        .mail-message {
            margin-bottom: 5px;
        }
        .mail-time {
            font-size: 12px;
            color: gray;
        }
        .delete-btn {
            position: absolute;
            top: 8px;
            right: 12px;
            background: none;
            border: none;
            font-size: 16px;
            color: #999;
            cursor: pointer;
        }
        .delete-btn:hover {
            color: red;
        }
    </style>
</head>
<body>

<div class="mail-container">
    <h1>My Mail</h1>

    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $msg): ?>
            <div class="mail-item" data-id="<?php echo $msg['id']; ?>">
                <button class="delete-btn" title="Hide this message">✖</button>
                <div class="mail-header"><?php echo htmlspecialchars($msg['name']); ?></div>
                <div class="mail-message"><?php echo nl2br(htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8')); ?></div>
                <div class="mail-time"><?php echo htmlspecialchars($msg['sent_at']); ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No messages found.</p>
    <?php endif; ?>
</div>

<?php include 'templates/footer.php'; ?>

<script>
    const hiddenMessageIds = JSON.parse(localStorage.getItem('hiddenMessages') || '[]');

    document.querySelectorAll('.mail-item').forEach(item => {
        const id = item.getAttribute('data-id');
        if (hiddenMessageIds.includes(id)) {
            item.style.display = 'none';
        }
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const item = this.closest('.mail-item');
            const id = item.getAttribute('data-id');
            item.style.display = 'none';

            if (!hiddenMessageIds.includes(id)) {
                hiddenMessageIds.push(id);
                localStorage.setItem('hiddenMessages', JSON.stringify(hiddenMessageIds));
            }
        });
    });
</script>

</body>
</html>
