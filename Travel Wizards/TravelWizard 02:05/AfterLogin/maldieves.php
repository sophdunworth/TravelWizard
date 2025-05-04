
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';

include 'db2.php';
    $packagedestinationsID = ['PD006', 'PD007', 'PD008', 'PD009'];
    $packageID = ['2'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical Treasures: Maldives, Seychelles & Beyond</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>🌴 Tropical Treasures: Maldives, Seychelles & Beyond – 16 Days</h1>

            <!-- Trip Overview -->
            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/maldives/maldives1.png" alt="Maldives">
                        <img src="images/maldives/maldives2.png" alt="Seychelles">
                        <img src="images/maldives/maldives3.png" alt="Mauritius">
                        <img src="images/maldives/maldives4.png" alt="Sri Lanka">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>

<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qG9NipzU1SEIfA*ccid_b02KnNTV&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1170+x+924+%c2%b7+77.20+kB+%c2%b7+png&sbifnm=maldives1.png&thw=1170&thh=924&ptime=78&dlen=105400&expw=675&exph=533&selectedindex=0&id=-1115038287&ccid=b02KnNTV&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qGkdcEYrGCEIBw*ccid_aR1wRisY&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1080+x+872+%c2%b7+42.44+kB+%c2%b7+png&sbifnm=maldives2.png&thw=1080&thh=872&ptime=63&dlen=57940&expw=667&exph=539&selectedindex=0&id=373953362&ccid=aR1wRisY&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qOfEsr1OBiEIyg*ccid_58SyvU4G&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1062+x+918+%c2%b7+63.52+kB+%c2%b7+png&sbifnm=maldives3.png&thw=1062&thh=918&ptime=61&dlen=86724&expw=645&exph=557&selectedindex=0&id=-955608971&ccid=58SyvU4G&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qD7LMwLGxSEIig*ccid_PsszAsbF&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1052+x+626+%c2%b7+48.87+kB+%c2%b7+png&sbifnm=maldives4.png&thw=1052&thh=626&ptime=53&dlen=66720&expw=777&exph=462&selectedindex=0&id=-2022059483&ccid=PsszAsbF&vt=2&sim=11
-->


                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Emirates</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Seychelles (SEZ) at 8:00 AM</p>
                    <p><strong>Return Flight:</strong> Maldives (MLE) → Dublin (DUB) at 10:15 PM</p>
                    <p><strong>Cost:</strong> €3,500 per person</p>
                    <p><strong>Extra Info:</strong> Includes accommodation, transport, & listed activities. Meals not covered unless specified (*).</p>

                    <h2>Select Your Travel Dates:</h2>

                <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="2">
                    <input type="hidden" name="departureFlight" value="2025-05-15">
                    <input type="hidden" name="returnFlight" value="2025-05-29">
                    <button type="submit">May 15 - May 29, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="2">
                    <input type="hidden" name="departureFlight" value="2025-08-10">
                    <input type="hidden" name="returnFlight" value="2025-08-24">
                    <button type="submit">August 10 - August 24, 2025</button>
                </form>
                    
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🏝️ Days 1-4: Seychelles", "details" => [
                                "Day 1: Arrival in Seychelles, Check-in: Four Seasons Resort Seychelles, Private beach dinner*.",
                                "Day 2: Explore Victoria, Botanical Gardens, Anse Intendance Beach, and Anse Source d'Argent, Dinner at The Rockpool restaurant.",
                                "Day 3: Day trip to Praslin Island, Visit Vallée de Mai Nature Reserve, Relax at the resort.",
                                "Day 4: Day trip to La Digue Island, Visit Anse Source d'Argent, Sunset relaxation at the resort."
                            ]],
                            ["title" => "🌊 Days 5-8: Mauritius", "details" => [
                                "Day 5: Travel to Mauritius, Check-in: One&Only Le Saint Géran, Relax and dinner at La Terrasse.",
                                "Day 6: Explore Port Louis, Pamplemousses Botanical Garden, and Grand Baie, Dinner at The Blue Penny Café.",
                                "Day 7: Visit Chamarel, Seven Colored Earths, Waterfall & Rum Distillery, Dinner at Le Chamarel restaurant*.",
                                "Day 8: Day trip to Île aux Cerfs, Water sports & beach relaxation, Sunset drinks at the resort."
                            ]],
                            ["title" => "🐘 Days 9-12: Sri Lanka", "details" => [
                                "Day 9: Travel to Sri Lanka, Check-in: Cinnamon Grand Colombo, Dinner at Ministry of Crab*.",
                                "Day 10: Colombo city tour - Gangaramaya Temple, Independence Square, Galle Face Green, Dinner at The Lagoon.",
                                "Day 11: Day trip to Kandy - Visit Temple of the Sacred Tooth Relic & Botanical Gardens, Return to Colombo.",
                                "Day 12: Explore Sigiriya Rock Fortress & Dambulla Cave Temples, Evening relaxation at the resort."
                            ]],
                            ["title" => "🌅 Days 13-16: Maldives", "details" => [
                                "Day 13: Travel to Maldives, Check-in: Soneva Fushi, Candlelit beach dinner*.",
                                "Day 14: Private island experience, Snorkeling, spa day, and Dinner at Fresh in the Garden.",
                                "Day 15: Diving trip to coral reefs, Sunset dinner cruise*.",
                                "Day 16: Final morning at leisure, Airport transfer & farewell."
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



