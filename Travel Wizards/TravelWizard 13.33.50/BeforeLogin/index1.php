<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Wizard</title>
    <link rel="stylesheet" href="css/Body.css">
    <?php include 'templates/header1.php'; ?>
        
<?php
    if (isset($_GET['search'])) {
        $searchTerm = htmlspecialchars($_GET['search']);
        echo "<p>Searching for: <strong>$searchTerm</strong></p>";
    }
?>


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
            ["name" => "Tropical Treasures", "duration" => "16 days in the Indian Ocean", "price" => "€1,299", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
            ["name" => "La Dolce Vita", "duration" => "24 days in Italy", "price" => "€2,499", "link" => "italy.php", "image" => "images/italy/italy.png"],
            ["name" => "Grand European Escape", "duration" => "21 days in Central Europe", "price" => "€1,899", "link" => "european.php", "image" => "images/european/european.png"]
        ];
        //Link Refernces for the above images 
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qJNw4tB0hyEIZg*ccid_k3Di0HSH&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=944+x+590+%c2%b7+63.65+kB+%c2%b7+png&sbifnm=italy.png&thw=944&thh=590&ptime=75&dlen=86908&expw=758&exph=474&selectedindex=0&id=-1151463793&ccid=k3Di0HSH&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qPSmzxBE3yEIqQ*ccid_9KbPEETf&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=926+x+588+%c2%b7+63.95+kB+%c2%b7+png&sbifnm=european.png&thw=926&thh=588&ptime=64&dlen=87308&expw=752&exph=478&selectedindex=0&id=-1876203416&ccid=9KbPEETf&vt=2&sim=11
        //https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHy1nJiDfyEIrA*ccid_fLWcmIN%2F&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=942+x+618+%c2%b7+58.73+kB+%c2%b7+png&sbifnm=maldives.png&thw=942&thh=618&ptime=61&dlen=80188&expw=740&exph=485&selectedindex=0&id=-6744529&ccid=fLWcmIN%2F&vt=2&sim=11
        
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

<!-- Rate Us Section -->
    <div class="review-container">
<div class="footer-section review">
    <h3>Leave a Review</h3>
    <div class="stars">
        <a href="review.php?rating=1" class="star">&#9733;</a>
        <a href="review.php?rating=2" class="star">&#9733;</a>
        <a href="review.php?rating=3" class="star">&#9733;</a>
        <a href="review.php?rating=4" class="star">&#9733;</a>
        <a href="review.php?rating=5" class="star">&#9733;</a>
    </div>
    <p>Click a star to leave a review!</p>
</div>
    </div>

<section class="travel-inspiration">
    <h2>Travel Inspiration</h2>
    <div class="cards">
  <?php 
$categories = [
    "Beach Getaways" => [
        "description" => "Discover pristine beaches and crystal-clear waters",
        "link" => "beachgetaway.php"
    ],
    "City Breaks" => [
        "description" => "Explore vibrant cities and cultural hotspots",
        "link" => "citybreaks.php"
    ],
    "Adventure Tours" => [
        "description" => "Embark on thrilling outdoor adventures",
        "link" => "adventuretours.php"
    ],
    "Cultural Experiences" => [
        "description" => "Immerse yourself in local traditions",
        "link" => "culturalexperiences.php"
    ]
];

foreach ($categories as $category => $details) {
    echo "<div class='card'>
            <h3><a href='{$details['link']}'>$category</a></h3>
            <p>{$details['description']}</p>
          </div>";
}
?>



</div>
</section>

<?php include 'templates/footer.php'; ?>

</body>
</html>
