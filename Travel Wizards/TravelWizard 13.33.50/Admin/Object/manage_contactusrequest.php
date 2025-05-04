<?php
session_start();
require_once 'classes/ContactUsRequest.php';
 
 
 
$contactHandler = new ContactUsRequest();
$requests = $contactHandler->getAllRequests();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Contact Requests</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>
 
<h2>Contact Us Requests</h2>
   
    <a href="dashboard.php">← Back to Dashboard</a>
 
<?php if (!empty($requests)): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</th>
                <th>Answered</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= htmlspecialchars($request['id']) ?></td>
                <td><?= htmlspecialchars($request['email']) ?></td>
                <td><?= htmlspecialchars($request['subject']) ?></td>
                <td><?= nl2br(htmlspecialchars($request['message'])) ?></td>
                <td><?= htmlspecialchars($request['status']) ?></td>
                <td><?= $request['answered'] ? 'Yes' : 'No' ?></td>
                <td><?= htmlspecialchars($request['created_at']) ?></td>
                <td>
                    <?php if (!$request['answered']): ?>
                        <a href="answer_contactusrequest.php?id=<?= $request['id'] ?>">
                            <button type="button">Answer</button>
                        </a>
                    <?php else: ?>
                        ✅
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No contact requests found.</p>
<?php endif; ?>
 
<br>
 
 
</body>
</html>