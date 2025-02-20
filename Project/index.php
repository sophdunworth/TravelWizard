<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Wizard</title>
    <link rel="stylesheet" href="css/Body.css">
        <?php include 'header.php'; ?>
</head>
<body>

<section class="hero">
    <h1>Discover Your Next Adventure</h1>
    <p>Explore amazing destinations and create unforgettable memories</p>
    <a href="trips.php" class="btn">Start Planning</a>
</section>

<section class="featured-trips">
    <h2>Featured Trips</h2>
    <div class="trip-list">
        <?php 
        $trips = [
            ["name" => "Tropical Treasures", "duration" => "16 days in the Indian Ocean", "price" => "€1,299", "link" => "maldieves.php", "image" => "images/maldives.png"],
            ["name" => "La Dolce Vita", "duration" => "24 days in Italy", "price" => "€2,499", "link" => "italy.php", "image" => "images/italy.png"],
            ["name" => "Grand European Escape", "duration" => "21 days in Central Europe", "price" => "€1,899", "link" => "european.php", "image" => "images/european.png"]
        ];
        
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



<section class="travel-inspiration">
    <h2>Travel Inspiration</h2>
    <div class="cards">
        <?php 
        $categories = [
            "Beach Getaways" => "Discover pristine beaches and crystal-clear waters",
            "City Breaks" => "Explore vibrant cities and cultural hotspots",
            "Adventure Tours" => "Embark on thrilling outdoor adventures",
            "Cultural Experiences" => "Immerse yourself in local traditions"
        ];

        foreach ($categories as $category => $description) {
            echo "<div class='card'>
                    <h3>$category</h3>
                    <p>$description</p>
                  </div>";
        }
        ?>
    </div>
</section>


<?php include 'footer.php'; ?>

</body>
</html>




