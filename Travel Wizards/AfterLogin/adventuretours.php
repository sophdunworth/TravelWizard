<?php
// Start the session
session_start();

// Only allow logged-in users to access this page
require_once '../BeforeLogin/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Tours</title>

    <!-- Link to CSS file for trip styles -->
    <link rel="stylesheet" href="css/Tripmain.css">

    <!-- Include the site header -->
    <?php include 'templates/header.php'; ?>
</head>
<body>

<!-- Start of the Adventure Trips Section -->
<section class="trips">
    <h1>Find Your Perfect Adventure</h1>

    <div class="trip-grid">
        <?php 
        // List of available adventure trips
        $trips = [
            ["name" => "African Safari", "locations" => "Johannesburg, Cape Town, Durban", "price" => "€6,200", "link" => "africa.php", "image" => "images/africa/africa.png"],
            ["name" => "Amazon to the Andes", "locations" => "Colombia, Peru, Argentina", "price" => "€4,800", "link" => "southamerica.php", "image" => "images/southamerica/southamerica.png"],
            ["name" => "Aloha to Adventure", "locations" => "Hawaii, Bali, French Polynesia", "price" => "€4,350", "link" => "hawaii.php", "image" => "images/hawaii/hawaii.png"],
            ["name" => "The Land Down Under", "locations" => "Australia, New Zealand", "price" => "€4,500", "link" => "australia.php", "image" => "images/australia/australia.png"]
        ];

        // Loop through each trip and display it
        foreach ($trips as $trip) {
            echo "<div class='trip-card'>
                    <img src='{$trip['image']}' alt='{$trip['name']}' class='trip-image'>
                    <h3>{$trip['name']}</h3>
                    <p>{$trip['locations']}</p>
                    <p class='price'>{$trip['price']}</p>
                    <a href='{$trip['link']}' class='btn'>View Details</a>
                  </div>";
        }
        ?>
    </div>
</section>

<!-- Include the site footer -->
<?php include 'templates/footer.php'; ?>

</body>
</html>
