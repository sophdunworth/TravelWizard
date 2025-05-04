<?php 
// Include the Review class
require_once 'classes/Review.php';

// Enable full error reporting for debugging during development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the search query from the URL 
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Try to fetch reviews from the database, optionally filtered by search term
try {
    $reviewObj = new Review($conn);
    $reviews = $reviewObj->getAllReviews($searchQuery);
} catch (Exception $e) {
    // Show error if something goes wrong
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

<!-- Page Heading -->
<h2>Manage Reviews</h2>

<!-- Navigation back to dashboard -->
<a href="dashboard.php" style="text-decoration: none; color: #007BFF; font-size: 16px;">&larr; Return to Dashboard</a>
<br><br>

<!-- Search form for filtering reviews by service -->
<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by service..." value="<?php echo htmlspecialchars($searchQuery); ?>">
    <button type="submit">Search</button>
</form>

<!-- Reviews table -->
<table>
    <thead>
        <tr>
            <th>Review ID</th>
            <th>Email</th>
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
                    <td><?php echo htmlspecialchars($review['email'] ?? 'Not Available'); ?></td>
                    <td><?php echo htmlspecialchars($review['rating']); ?></td>
                    <td><?php echo htmlspecialchars($review['service']); ?></td>
                    <td><?php echo htmlspecialchars($review['reviewText'] ?? 'No description available'); ?></td>
                    <td><?php echo htmlspecialchars($review['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- If no reviews match the search -->
            <tr><td colspan="6">No reviews found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
