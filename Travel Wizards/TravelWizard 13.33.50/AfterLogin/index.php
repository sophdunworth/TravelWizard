<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protect the page for logged-in users only
require_once '../BeforeLogin/auth.php'; 

// Connect to the database
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Wizard</title>
<link rel="stylesheet" href="css/Body.css"> <!-- Link to your CSS -->
<?php include 'templates/header.php'; ?> <!-- Include website header -->
</head>
<body>

<!-- Hero Section -->
<section class="hero">
<h1>Discover Your Next Adventure</h1>
<p>Explore amazing destinations and create unforgettable memories</p>
<a href="trips.php" class="btn">Start Planning</a> <!-- Button to view trips -->
</section>

<!-- Featured Trips Section -->
<section class="featured-trips">
<h2>Featured Trips</h2>
<div class="trip-list">
<?php 
// Define featured trips manually (hardcoded)
$trips = [
    ["name" => "Tropical Treasures", "duration" => "16 days in the Indian Ocean", "price" => "€1,299", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
    ["name" => "La Dolce Vita", "duration" => "24 days in Italy", "price" => "€2,499", "link" => "italy.php", "image" => "images/italy/italy.png"],
    ["name" => "Grand European Escape", "duration" => "21 days in Central Europe", "price" => "€1,899", "link" => "european.php", "image" => "images/european/european.png"]
];

// Loop through trips and display each one
foreach ($trips as $trip) {
    echo "<div class='trip-card'>
    <img src='{$trip['image']}' alt='{$trip['name']}' class='trip-image'>
    <h3>{$trip['name']}</h3>
    <p>{$trip['duration']}</p>
    <p class='price'>{$trip['price']}</p>
    <a href='{$trip['link']}' class='btn'>View Details</a>
    </div>";
}
?>
</div>
</section>

<!-- Leave a Review Section -->
<div class="review-container">
<div class="footer-section review">
    <h3>Leave a Review</h3>
    <div class="stars">
        <!-- Links to review page with rating -->
        <a href="review.php?rating=1" class="star">&#9733;</a>
        <a href="review.php?rating=2" class="star">&#9733;</a>
        <a href="review.php?rating=3" class="star">&#9733;</a>
        <a href="review.php?rating=4" class="star">&#9733;</a>
        <a href="review.php?rating=5" class="star">&#9733;</a>
    </div>
    <p>Click a star to leave a review!</p>
</div>
</div>

<!-- Travel Inspiration Section -->
<section class="travel-inspiration">
<h2>Travel Inspiration</h2>
<div class="cards">
<?php 
// Define categories manually (hardcoded)
$categories = [
    "Beach Getaways" => [
        "description" => "Discover pristine beaches and crystal-clear waters",
        "link" => "beachgetaway.php"
    ],
    "City Breaks" => [
        "description" => "Explore vibrant cities and cultural hotspots",
        "link" => "CityBreaks.php"
    ],
    "Adventure Tours" => [
        "description" => "Embark on thrilling outdoor adventures",
        "link" => "AdventureTours.php"
    ],
    "Cultural Experiences" => [
        "description" => "Immerse yourself in local traditions",
        "link" => "CulturalExperiences.php"
    ]
];

// Loop through categories and display each one
foreach ($categories as $category => $info) {
    echo "<div class='card'>
        <h3><a href='{$info['link']}'>$category</a></h3>
        <p>{$info['description']}</p>
    </div>";
}
?>
</div>
</section>

<!-- Include footer -->
<?php include 'templates/footer.php'; ?>

</body>
</html>
