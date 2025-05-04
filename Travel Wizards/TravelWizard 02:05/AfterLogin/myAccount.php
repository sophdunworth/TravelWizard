<?php
// Start the session if it hasn't been started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure this page is accessible only by authenticated users
require_once '../BeforeLogin/auth.php'; 
require 'db.php';

// Get the currently logged-in user's ID from the session
$user_id = $_SESSION['userid'];

try {
    // Prepare a SQL query to get username and email of the current user
    $user_query = "SELECT username, email FROM users WHERE userID = :user_id";
    $stmt = $pdo->prepare($user_query);
    
    // Bind the user_id parameter to the query securely
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the user's data
    $user_result = $stmt->fetch(PDO::FETCH_ASSOC);

    // If user is found, store sanitized data
    if ($user_result) {
        $username = htmlspecialchars($user_result['username']);
        $email = htmlspecialchars($user_result['email']);
    } else {
        // If user is not found, stop script with an error
        die("User not found.");
    }
} catch (PDOException $e) {
    // Handle query errors gracefully
    die("Error: " . $e->getMessage());
}

try {
    // Prepare a SQL query to get all bookings for the current user
    $booking_query = "SELECT * FROM bookings WHERE user_id = :user_id";
    $stmt = $pdo->prepare($booking_query);

    // Bind user_id again
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all bookings as an associative array
    $booking_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle booking query errors
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Travel Wizard</title>
    <link rel="stylesheet" href="css/Login.css">
    <?php include 'templates/header.php'; ?>
</head>
<body>

<div class="account-container">
    <!-- Greeting message with sanitized username -->
    <h1>Hello, <?php echo $username; ?>!</h1>


    <h2>My Details</h2>
    <table>
        <tr>
            <th>Username</th>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
    </table>

    <!-- Link to contact page for editing profile or bookings -->
    <p><a href="contactus.php">Want to make a change to your profile or booking? Click Here!</a></p>


    <h2>My Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>Departure Date</th>
                <th>Return Date</th>
                <th>Manage Trips</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through each booking and show data in table rows -->
            <?php foreach ($booking_result as $booking): ?>
                <tr>
                    <td><?php echo htmlspecialchars($booking['departureFlight']); ?></td>
                    <td><?php echo htmlspecialchars($booking['returnFlight']); ?></td>

                    <!-- Link to view more details of the booking -->
                    <td><a href="view_booking.php?id=<?php echo urlencode($booking['bookingID']); ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <p><a href="logout.php">Logout</a></p>
</div>

<?php include 'templates/footer.php'; ?>

</body>
</html>




