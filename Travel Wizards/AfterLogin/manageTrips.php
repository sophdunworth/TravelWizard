<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php'; // Make sure path is correct
require 'db.php'; // Database connection

$user_id = $_SESSION['userid']; // Get the logged-in user's ID
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trips - Travel Wizard</title>
    <link rel="stylesheet" href="css/Body.css">  
    <?php include 'templates/header.php'; ?>

    <style>
        .manage-trips {
            max-width: 1000px;
            margin: 80px auto 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #008cff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #008cff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<section class="manage-trips">
    <h2>Manage Your Trips</h2>

    <?php
    // Correct SQL query to fetch upcoming trips for this user
    $sql = "SELECT b.bookingID, p.packageName, b.departureFlight, b.returnFlight, b.status
            FROM bookings b
            JOIN packages p ON b.package_id = p.packageID
            WHERE b.user_id = ? AND b.departureFlight >= CURDATE()
            ORDER BY b.departureFlight ASC";

    $stmt = $pdo->prepare($sql); // Assuming db.php uses $pdo

    if ($stmt) {
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result && count($result) > 0) {
            echo '<table>';
            echo '<tr><th>Package Name</th><th>Departure Date</th><th>Return Date</th><th>Status</th><th>Actions</th></tr>';

            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['packageName']) . '</td>';
                echo '<td>' . htmlspecialchars($row['departureFlight']) . '</td>';
                echo '<td>' . htmlspecialchars($row['returnFlight']) . '</td>';
                echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                echo '<td><a href="edit_trip.php?id=' . urlencode($row['bookingID']) . '">Edit</a></td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No upcoming trips found. <a href="trips.php">Browse and book trips</a></p>';
        }
    } else {
        echo '<p>There was an error preparing your trip data. Please try again later.</p>';
    }
    ?>
</section>

<?php include 'templates/footer.php'; ?>

</body>
</html>

