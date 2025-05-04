
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php';
$packagedestinationsID = ['PD001', 'PD002', 'PD003','PD004', 'PD005'];
$packageID = ['1'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greek Island Party Cruise</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Greek Island Party Cruise: Sun, Shots & Sea – 2 Weeks</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/greekisland/greekisland1.png" alt="Mykonos">
                        <img src="images/greekisland/greekisland2.png" alt="Santorini">
                        <img src="images/greekisland/greekisland3.png" alt="Paros">
                        <img src="images/greekisland/greekisland4.png" alt="Naxos">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
<!-- Image Refs
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RCXW97D3RyEIqxcxoNWLuD9SqbotqVTdP.c&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1202+x+716+%c2%b7+78.73+kB+%c2%b7+png&sbifnm=greekisland1.png&thw=1202&thh=716&ptime=41&dlen=107488&expw=1202&exph=716
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qJK.C12CxyEIkA*ccid_kr8LXYLH&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1086+x+792+%c2%b7+68.22+kB+%c2%b7+png&sbifnm=greekisland2.png&thw=1086&thh=792&ptime=73&dlen=93148&expw=702&exph=512&selectedindex=0&id=-1036530370&ccid=kr8LXYLH&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHLkCF2m.CEIRw*ccid_cuQIXab8&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1074+x+842+%c2%b7+60.31+kB+%c2%b7+png&sbifnm=greekisland3.png&thw=1074&thh=842&ptime=67&dlen=82340&expw=677&exph=531&selectedindex=0&id=-65653859&ccid=cuQIXab8&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qMhYxOXy4yEIsg*ccid_yFjE5fLj&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1014+x+766+%c2%b7+52.78+kB+%c2%b7+png&sbifnm=greekisland4.png&thw=1014&thh=766&ptime=58&dlen=72060&expw=690&exph=521&selectedindex=0&id=-253783598&ccid=yFjE5fLj&vt=2&sim=11
-->
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Ryanair</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Mykonos (JMK) at 10:30 AM</p>
                    <p><strong>Return Flight:</strong> Zakynthos (ZTH) → Dublin (DUB) at 10:45 PM</p>
                    <p><strong>Cost:</strong> €2,000 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. Meals not covered unless specified with * symbol.</p>

                    
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="1">
                    <input type="hidden" name="departureFlight" value="2025-06-15">
                    <input type="hidden" name="returnFlight" value="2025-06-29">
                    <button type="submit">June 15 - June 29, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="1">
                    <input type="hidden" name="departureFlight" value="2025-08-01">
                    <input type="hidden" name="returnFlight" value="2025-08-15">
                    <button type="submit">August 01 - August 15, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Days 1-4: Mykonos", "details" => [
                                "Day 1: Arrival in Mykonos, Check-in: Cavo Tagoo Mykonos, Dinner at Katrin Restaurant*.",
                                "Day 2: Explore Mykonos Town, Relax at Psarou Beach or Paradise Beach, Dinner at Nammos.",
                                "Day 3: Day trip to Delos Island, Dinner at M-eating.",
                                "Day 4: Leisure day and Greek cooking class*."
                            ]],
                            ["title" => "📍 Days 5-7: Santorini", "details" => [
                                "Day 5: Travel to Santorini, Check-in: Katikies Hotel, Sunset at Oia, Dinner at Ammoudi Fish Tavern.",
                                "Day 6: Visit Fira, Pyrgos, Akrotiri ruins, Relax on Red Beach or Kamari Beach, Dinner at Selene.",
                                "Day 7: Wine tasting tour, Explore Oia, Dinner at Ambrosia Restaurant*."
                            ]],
                            ["title" => "📍 Days 8-10: Paros", "details" => [
                                "Day 8: Travel to Paros, Check-in: Parilio Hotel, Dinner at Barbarossa.",
                                "Day 9: Explore Parikia and Lefkes, Relax at Kolymbithres Beach, Dinner at Soso.",
                                "Day 10: Boat trip to Antiparos, Visit Antiparos Cave, Dinner at La Dolce Vita."
                            ]],
                            ["title" => "📍 Days 11-12: Naxos", "details" => [
                                "Day 11: Travel to Naxos, Check-in: Naxian Collection, Dinner at La Vigne.",
                                "Day 12: Tour Naxos Island, Visit Temple of Apollo, Dinner at To Elliniko*."
                            ]],
                            ["title" => "📍 Days 13-14: Zante (Zakynthos)", "details" => [
                                "Day 13: Travel to Zante, Check-in: Lesante Blu Luxury Hotel & Spa, Dinner at Ammos Restaurant.",
                                "Day 14: Visit Navagio Beach, Boat trip to Blue Caves, Farewell lunch at Bovino Steakhouse* before departure."
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



