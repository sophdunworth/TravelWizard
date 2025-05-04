<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php'; // Adjust path if needed

require 'db.php'; // Database connection

$user_id = $_SESSION['userid'];

// Fetch user details
$user_query = "SELECT username, email FROM users WHERE userID = ?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_result && $user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
    $username = htmlspecialchars($user['username']);
    $email = htmlspecialchars($user['email']);
} else {
    die("User not found.");
}
$stmt->close();

// Fetch bookings
$booking_query = "SELECT * FROM bookings WHERE user_id = ?";
$stmt = $conn->prepare($booking_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$booking_result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Travel Wizard</title>
    <link rel="stylesheet" href="css/Login.css">
    <?php include 'templates/header.php'; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .account-container {
            flex: 1;
            max-width: 800px;
            margin: 80px auto 20px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
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

<div class="account-container">
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

    <p><a href="contactus.php">Want to make a change to your profile or booking? Click Here!</a></p>

    <h2>My Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>Departure Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($booking = $booking_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($booking['departureFlight']); ?></td>
                    <td><?php echo htmlspecialchars($booking['returnFlight']); ?></td>
                    <td><a href="view_booking.php?id=<?php echo urlencode($booking['bookingID']); ?>">View</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <p><a href="logout.php">Logout</a></p>
</div>

<?php include 'templates/footer.php'; ?>

</body>
</html>


