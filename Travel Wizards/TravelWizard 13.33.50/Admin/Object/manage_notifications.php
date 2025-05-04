<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Notifications</title>
    <link rel="stylesheet" type="text/css" href="css/Admin.css">
    <style>
        body {
            background-color: #e6f7fa;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        h2 {
            background-color: #0288d1;
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 32px;
        }

        .button-container {
            margin-top: 60px;
        }

        .btn-link {
            display: inline-block;
            background-color: #0288d1;
            color: white;
            padding: 14px 24px;
            margin: 15px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-link:hover {
            background-color: #0277bd;
        }
    </style>
</head>
<body>

    <h2>Manage Notifications</h2>
    
     <a href="dashboard.php">← Back to Dashboard</a>

    <div class="button-container">
        <a href="create_notification.php" class="btn-link">➕ Create Notification</a>
        <a href="display_notifications.php" class="btn-link">📜 View Previous Notifications</a>
    </div>

</body>
</html>
