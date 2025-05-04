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
    <title>Beach Getaways</title>
    <link rel="stylesheet" href="css/Tripmain.css">
    <?php include 'templates/header.php'; ?>
</head>
<body>

<section class="trips">
    <h1>Find Your Perfect Beach Getaway</h1>
    <div class="trip-grid">
        <?php 
        // List of available adventure trips
        $trips = [
            ["name" => "Caribbean Bliss", "locations" => "Jamaica, Bahamas, Dominican Republic", "price" => "€4,700", "link" => "carribean.php", "image" => "images/carribean/carribean.png"],
            ["name" => "Tropical Treasures", "locations" => "Maldives, Seychelles & Beyond", "price" => "€3,500", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
            ["name" => "Greek Island Odyssey", "locations" => "Rhodes, Kos, Mykonos", "price" => "€1,000", "link" => "rhodes.php", "image" => "images/rhodes/rhodes.png"],
            ["name" => "Greek Island Party Cruise", "locations" => "Santorini, Paros, Naxos", "price" => "€2,000", "link" => "greekisland.php", "image" => "images/greekisland/Greek Island Party Cruise.png"]
            
            
            
                
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