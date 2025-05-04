<?php
// Start session if not already started

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultural Experiences</title>
    <link rel="stylesheet" href="css/Tripmain.css">
    <?php include 'templates/header.php'; ?>
</head>
<body>
<section class="trips">
    <h1>Find Your Perfect Cultural Experience</h1>
    <div class="trip-grid">
        <?php 
        // List of available adventure trips
        $trips = [
            ["name" => "South East Asia Uncovered", "locations" => "Bali, Malaysia, Thailand", "price" => "€3,750", "link" => "thialand.php", "image" => "images/thialand/thialand.png"],
            ["name" => "Arabian Nights", "locations" => "Dubai, Abu Dhabi, Qatar", "price" => "€3,200", "link" => "dubai.php", "image" => "images/dubai/dubai.png"],
            ["name" => "Southern Charm", "locations" => "Atlanta, New Orleans, Dallas", "price" => "€5,200", "link" => "texas.php", "image" => "images/texas/texas.png"],
            ["name" => "Central Cities Discovery", "locations" => "Chicago, Detroit, Montreal", "price" => "€2,800", "link" => "chicago.php", "image" => "images/chicago/chicago.png"],
            ["name" => "Greek Island Party Cruise", "locations" => "Santorini, Paros, Naxos", "price" => "€2,000", "link" => "greekisland.php", "image" => "images/greekisland/Greek Island Party Cruise.png"],
            ["name" => "Legends of the East", "locations" => "Japan, South Korea, Shanghai", "price" => "€6,500", "link" => "japan.php", "image" => "images/japan/japan.png"],
            ["name" => "Aurora & Fjords", "locations" => "Sweden, Norway, Finland", "price" => "€2,800", "link" => "nordic.php", "image" => "images/nordic/nordic.png"],
            ["name" => "Grand European Escapade", "locations" => "France, Germany, Austria", "price" => "€2,000", "link" => "european.php", "image" => "images/european/european.png"],
            
            ];
            
            
        

        // Loop through trips and display
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
<?php include 'templates/footer.php'; ?>

</body>
</html>