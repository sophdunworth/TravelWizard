<?php
// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include authentication script to restrict access to logged-in users
require_once '../BeforeLogin/auth.php'; 
require 'db.php';

// Get the ID of the currently logged-in user from the session
$user_id = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trips - Travel Wizard</title>
    <link rel="stylesheet" href="css/Body.css"> 
    <?php include 'templates/header.php'; ?>
</head>
<body>

<!-- Main content section for managing trips -->
<section class="manage-trips">
    <h2>Manage Your Trips</h2>

    <?php
    // Prepare SQL query to retrieve all upcoming trips for the logged-in user
    $sql = "SELECT b.bookingID, p.packageName, b.departureFlight, b.returnFlight, b.status
            FROM bookings b
            JOIN packages p ON b.package_id = p.packageID
            WHERE b.user_id = ? AND b.departureFlight >= CURDATE()
            ORDER BY b.departureFlight ASC";

    // Prepare the SQL statement 
    $stmt = $pdo->prepare($sql); 

    // Check if the statement prepared successfully
    if ($stmt) {
        // Execute the prepared statement with the current user's ID
        $stmt->execute([$user_id]);

        // Fetch all matching rows as an associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // If bookings were found, display them in a table
        if ($result && count($result) > 0) {
            echo '<table>';
            echo '<tr><th>Package Name</th><th>Departure Date</th><th>Return Date</th><th>Status</th><th>Actions</th></tr>';

            // Loop through each booking and output a row
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['packageName']) . '</td>';
                echo '<td>' . htmlspecialchars($row['departureFlight']) . '</td>';
                echo '<td>' . htmlspecialchars($row['returnFlight']) . '</td>';
                echo '<td>' . htmlspecialchars($row['status']) . '</td>';

                // Provide an edit link for each booking using booking ID
                echo '<td><a href="edit_trip.php?id=' . urlencode($row['bookingID']) . '">Edit</a></td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            // Message if no future trips are found
            echo '<p>No upcoming trips found. <a href="trips.php">Browse and book trips</a></p>';
        }
    } else {
        // Error message if the SQL preparation fails
        echo '<p>There was an error preparing your trip data. Please try again later.</p>';
    }
    ?>
</section>

<?php include 'templates/footer.php'; ?>

</body>
</html>


