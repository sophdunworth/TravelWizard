
<?php include 'db.php'; 
$packagedestinationsID = ['PD041', 'PD042', 'PD043', 'PD044'];
$packageID = ['9'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora & Fjords: The Best of Scandinavia – 14 Days</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header1.php'; ?>

    <main>
        <section class="package">
            <h1>🌌 Aurora & Fjords: The Best of Scandinavia – 14 Days</h1>
            
            <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/nordic/nordic1.png" alt="Stockholm, Sweden">
                    <img src="images/nordic/nordic2.png" alt="Oslo, Norway">
                    <img src="images/nordic/nordic3.png" alt="Copenhagen, Denmark">
                    <img src="images/nordic/nordic4.png" alt="Helsinki, Finland">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>

            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Scandinavian Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Stockholm (ARN) at 10:00 AM</p>
                <p><strong>Return Flight:</strong> Stockholm (ARN) → Dublin (DUB) at 7:00 PM</p>
                <p><strong>Cost:</strong> €2800 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
               
                
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="9">
                <input type="hidden" name="departureFlight" value="2025-04-10">
                <input type="hidden" name="returnFlight" value="2025-04-24">
                <button type="submit">April 10 - April 24, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="9">
                <input type="hidden" name="departureFlight" value="2025-10-05">
                <input type="hidden" name="returnFlight" value="2025-10-19">
                <button type="submit">October 05 - October 19, 2025</button>
                </form>
            </div>
         </div>        
            
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qEki9hEplSEIWw*ccid_SSL2ESmV&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1060+x+758+%c2%b7+43.28+kB+%c2%b7+png&sbifnm=nordic1.png&thw=1060&thh=758&ptime=61&dlen=59092&expw=709&exph=507&selectedindex=0&id=1745172223&ccid=SSL2ESmV&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qB4OY4ykRCEI7w*ccid_Hg5jjKRE&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1040+x+694+%c2%b7+42.51+kB+%c2%b7+png&sbifnm=nordic2.png&thw=1040&thh=694&ptime=46&dlen=58044&expw=734&exph=490&selectedindex=0&id=882190699&ccid=Hg5jjKRE&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qJQdiW5WpCEIow*ccid_lB2Jblak&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1022+x+622+%c2%b7+64.19+kB+%c2%b7+png&sbifnm=nordic3.png&thw=1022&thh=622&ptime=64&dlen=87644&expw=769&exph=468&selectedindex=0&id=-179972572&ccid=lB2Jblak&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RKEPs5ETwiEIqxcxoNWLuD9SqbotqVTdP.g&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1024+x+818+%C2%B7+64.07+kB+%C2%B7+png&sbifnm=nordic4.png&thw=1024&thh=818&ptime=62&dlen=87476&expw=1024&exph=818
-->


            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🇸🇪 Days 1-3: Sweden (Stockholm)", "details" => [
                                "Day 1: Arrive in Stockholm, Check-in at Grand Hôtel, Explore Gamla Stan, Dinner at Tradition*.",
                                "Day 2: Visit Royal Palace, Vasa Museum, ABBA Museum, Dinner at Oaxen Krog*.",
                                "Day 3: Day Trip to Skåne, Visit Malmö & Lund, Return to Stockholm for Dinner at Smorgastarteriet."
                            ]],
                            ["title" => "🇳🇴 Days 4-6: Norway (Oslo)", "details" => [
                                "Day 4: Travel to Oslo, Flight to Oslo, Check-in at The Thief, Dinner at Ekebergrestauranten*.",
                                "Day 5: Oslo City Tour, Visit Viking Ship Museum, Oslo Opera House, Aker Brygge, Dinner at Maaemo.",
                                "Day 6: Holmenkollen & Bygdøy, Explore Ski Museum, Bygdøy Peninsula, Dinner at Døgnvill Burger*."
                            ]],
                            ["title" => "🇩🇰 Days 7-9: Denmark (Copenhagen)", "details" => [
                                "Day 7: Flight to Copenhagen, Check-in at Hotel d'Angleterre, Dinner at Noma.",
                                "Day 8: Copenhagen City Tour, Visit Tivoli Gardens, Nyhavn, The Little Mermaid, Dinner at Geranium*.",
                                "Day 9: Day Trip to Helsingør, Visit Kronborg Castle, Return to Copenhagen, Dinner at Kødbyens Fiskebar."
                            ]],
                            ["title" => "🇫🇮 Days 10-12: Finland (Helsinki)", "details" => [
                                "Day 10: Flight to Helsinki, Check-in at Hotel Kämp, Dinner at Savoy*.",
                                "Day 11: Helsinki City Tour, Visit Suomenlinna Fortress, Helsinki Cathedral, Design District, Dinner at Löyly*.",
                                "Day 12: Day Trip to Porvoo, Explore Wooden Houses, Return to Helsinki, Dinner at Ravintola Olo."
                            ]],
                            ["title" => "🇸🇪 Days 13-14: Sweden (Stockholm)", "details" => [
                                "Day 13: Travel back to Stockholm, Flight/Ferry to Stockholm, Check-in at Nobis Hotel, Dinner at Pelikan.",
                                "Day 14: Final Day in Stockholm, Shopping in Östermalm, Boat Tour, Lunch at Frantzén*, Departure."
                            ]]
                        ];
                    ?>

                    <?php foreach ($destinations as $destination): ?>
                        <div class="accordion-item">
                            <button class="accordion-header">
                                <?php echo htmlspecialchars($destination["title"]); ?>
                                <span class="toggle-icon">+</span>
                            </button>
                            <div class="accordion-content">
                                <ul>
                                    <?php foreach ($destination["details"] as $detail): ?>
                                        <li><?php echo htmlspecialchars($detail); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>
</html>

