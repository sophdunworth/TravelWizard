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




