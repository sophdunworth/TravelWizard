<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php'; // Adjust the path if needed!

require 'db.php'; // If you use database on this page (optional in Trips)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWizard - Trips</title>
    <link rel="stylesheet" href="css/Tripmain.css">
    <?php include 'templates/header.php'; ?>
</head>
<body>

<section class="trips">
    <h1>Find Your Perfect Travel Experience with Us</h1>
    <div class="trip-grid">
        <?php 
        // Hardcoded trips data
        $trips = [
            ["name" => "Caribbean Bliss", "locations" => "Jamaica, Bahamas, Dominican Republic", "price" => "€4,700", "link" => "carribean.php", "image" => "images/carribean/carribean.png"],
            ["name" => "La Dolce Vita", "locations" => "Venice, Rome, Sicily", "price" => "€1,700", "link" => "italy.php", "image" => "images/italy/italy.png"],
            ["name" => "Gold Coast Gateway", "locations" => "Vancouver, Seattle, Phoenix", "price" => "€3,300", "link" => "la.php", "image" => "images/la/la.png"],
            ["name" => "South East Asia Uncovered", "locations" => "Bali, Malaysia, Thailand", "price" => "€3,750", "link" => "thialand.php", "image" => "images/thialand/thialand.png"],
            ["name" => "Arabian Nights", "locations" => "Dubai, Abu Dhabi, Qatar", "price" => "€3,200", "link" => "dubai.php", "image" => "images/dubai/dubai.png"],
            ["name" => "African Safari", "locations" => "Johannesburg, Cape Town, Durban", "price" => "€6,200", "link" => "africa.php", "image" => "images/africa/africa.png"],
            ["name" => "Tropical Treasures", "locations" => "Maldives, Seychelles & Beyond", "price" => "€3,500", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
            ["name" => "Southern Charm", "locations" => "Atlanta, New Orleans, Dallas", "price" => "€5,200", "link" => "texas.php", "image" => "images/texas/texas.png"],
            ["name" => "Central Cities Discovery", "locations" => "Chicago, Detroit, Montreal", "price" => "€2,800", "link" => "chicago.php", "image" => "images/chicago/chicago.png"],
            ["name" => "Greek Island Odyssey", "locations" => "Rhodes, Kos, Mykonos", "price" => "€1,000", "link" => "rhodes.php", "image" => "images/rhodes/rhodes.png"],
            ["name" => "Greek Island Party Cruise", "locations" => "Santorini, Paros, Naxos", "price" => "€2,000", "link" => "greekisland.php", "image" => "images/greekisland/Greek Island Party Cruise.png"],
            ["name" => "Legends of the East", "locations" => "Japan, South Korea, Shanghai", "price" => "€6,500", "link" => "japan.php", "image" => "images/japan/japan.png"],
            ["name" => "Amazon to the Andes", "locations" => "Colombia, Peru, Argentina", "price" => "€4,800", "link" => "southamerica.php", "image" => "images/southamerica/southamerica.png"],
            ["name" => "East Coast Explorer", "locations" => "New York, Boston, Miami", "price" => "€3,500", "link" => "newyork.php", "image" => "images/newyork/newyork.png"],
            ["name" => "Aloha to Adventure", "locations" => "Hawaii, Bali, French Polynesia", "price" => "€4,350", "link" => "hawaii.php", "image" => "images/hawaii/hawaii.png"],
            ["name" => "Aurora & Fjords", "locations" => "Sweden, Norway, Finland", "price" => "€2,800", "link" => "nordic.php", "image" => "images/nordic/nordic.png"],
            ["name" => "Grand European Escapade", "locations" => "France, Germany, Austria", "price" => "€2,000", "link" => "european.php", "image" => "images/european/european.png"],
            ["name" => "The Land Down Under", "locations" => "Australia, New Zealand", "price" => "€4,500", "link" => "australia.php", "image" => "images/australia/australia.png"],
            ["name" => "Costa del Sol & Beyond", "locations" => "Spain, Monaco, Switzerland", "price" => "€2,250", "link" => "spain.php", "image" => "images/spain/spain.png"],
            ["name" => "C'est La Vie dans France", "locations" => "Paris, Lyon, Bordeaux, Marseille", "price" => "€1,800", "link" => "france.php", "image" => "images/paris/paris.png"]
        ];

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





