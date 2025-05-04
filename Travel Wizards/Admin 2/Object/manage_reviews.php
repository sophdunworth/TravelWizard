<?php 
require_once 'classes/Review.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch reviews
try {
    $reviewObj = new Review($conn);
    $reviews = $reviewObj->getAllReviews($searchQuery); // Pass search query to filter reviews
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Reviews</title>
    <link rel="stylesheet" href="css/Admin.css">
</head>
<body>

<h2>Manage Reviews</h2>

<a href="dashboard.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Dashboard</a>
<br><br>

<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by service..." value="<?php echo htmlspecialchars($searchQuery); ?>">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Review ID</th>
            <th>UserID</th>
            <th>Rating</th>
            <th>Service</th>
            <th>Review Description</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <tr id="row-<?php echo htmlspecialchars($review['reviewID']); ?>">
                <td><?php echo htmlspecialchars($review['reviewID']); ?></td>
                <td><?php echo htmlspecialchars($review['UserID'] ?? 'Not Available'); ?></td> 
                <td><?php echo htmlspecialchars($review['rating']); ?></td>
                <td><?php echo htmlspecialchars($review['service']); ?></td>
                <td><?php echo htmlspecialchars($review['reviewText'] ?? 'No description available'); ?></td> <!-- Fallback for missing review text -->
                <td><?php echo htmlspecialchars($review['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No reviews found.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>