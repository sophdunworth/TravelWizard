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
    <title>City Breaks</title>
    <link rel="stylesheet" href="css/Tripmain.css">

    <?php include 'templates/header.php'; ?>
</head>
<body>
<section class="trips">
    <h1>Find Your Perfect Travel City Break</h1>
    <div class="trip-grid">
        <?php 
        // List of all city breaks
        $trips = [
            
            ["name" => "La Dolce Vita", "locations" => "Venice, Rome, Sicily", "price" => "€1,700", "link" => "italy.php", "image" => "images/italy/italy.png"],
            ["name" => "Central Cities Discovery", "locations" => "Chicago, Detroit, Montreal", "price" => "€2,800", "link" => "chicago.php", "image" => "images/chicago/chicago.png"],
            ["name" => "East Coast Explorer", "locations" => "New York, Boston, Miami", "price" => "€3,500", "link" => "newyork.php", "image" => "images/newyork/newyork.png"],
            ["name" => "Costa del Sol & Beyond", "locations" => "Spain, Monaco, Switzerland", "price" => "€2,250", "link" => "spain.php", "image" => "images/spain/spain.png"],
            ["name" => "C'est La Vie dans France", "locations" => "Paris, Lyon, Bordeaux, Marseille", "price" => "€1,800", "link" => "france.php", "image" => "images/paris/paris.png"]
            
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