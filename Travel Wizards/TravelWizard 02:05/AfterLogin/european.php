
<?php 

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php';
$packagedestinationsID = ['PD045', 'PD046', 'PD047','PD048', 'PD049', 'PD050', 'PD051', 'PD052'];
$packageID = ['10'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand European Escapade</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Grand European Escapade – 21 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/european/european1.png" alt="Europe">
                        <img src="images/european/european2.png" alt="Europe">
                        <img src="images/european/european3.png" alt="Europe">
                        <img src="images/european/european4.png" alt="Europe">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>

<!-- Images Refs
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHPFSiSskiEIVQ*ccid_c8VKJKyS&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1050+x+770+%c2%b7+82.48+kB+%c2%b7+png&sbifnm=european1.png&thw=1050&thh=770&ptime=63&dlen=112612&expw=700&exph=513&selectedindex=0&id=1869324924&ccid=c8VKJKyS&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qMdb43tsZyEItA*ccid_x1vje2xn&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=912+x+706+%c2%b7+39.36+kB+%c2%b7+png&sbifnm=european2.png&thw=912&thh=706&ptime=39&dlen=53736&expw=681&exph=527&selectedindex=0&id=2134185917&ccid=x1vje2xn&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qOpmx4lm1yEICQ*ccid_6mbHiWbX&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=678+x+934+%c2%b7+64.65+kB+%c2%b7+png&sbifnm=european3.png&thw=678&thh=934&ptime=47&dlen=88268&expw=511&exph=704&selectedindex=0&id=1422641220&ccid=6mbHiWbX&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qIpcAnczcCEIxg*ccid_ilwCdzNw&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1068+x+736+%c2%b7+70.69+kB+%c2%b7+png&sbifnm=european4.png&thw=1068&thh=736&ptime=65&dlen=96520&expw=722&exph=498&selectedindex=0&id=-1159485385&ccid=ilwCdzNw&vt=2&sim=11
 -->
                
                
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Various European Carriers</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Amsterdam (AMS) at 10:00 AM</p>
                    <p><strong>Return Flight:</strong> Zurich (ZRH) → Dublin (DUB) at 7:00 PM</p>
                    <p><strong>Cost:</strong> €2,000 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included. Meals not covered unless specified with * symbol.</p>

                   
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="10">
                    <input type="hidden" name="departureFlight" value="2025-04-15">
                    <input type="hidden" name="returnFlight" value="2025-05-06">
                    <button type="submit">April 15 - May 06, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="10">
                    <input type="hidden" name="departureFlight" value="2025-09-10">
                    <input type="hidden" name="returnFlight" value="2025-10-01">
                    <button type="submit">September 10 - October 01, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Days 1-3: Netherlands (Amsterdam)", "details" => [
                                "Day 1: Arrival in Amsterdam, Check-in: Hotel De L’Europe Amsterdam, Explore Rijksmuseum, Van Gogh Museum, Canal Cruise.",
                                "Day 2: Visit Anne Frank House, Jordaan District, Relax at Vondelpark, Dinner at Restaurant Greetje*.",
                                "Day 3: Day Trip to Keukenhof or Zaanse Schans for windmills and Dutch culture."
                            ]],
                            ["title" => "📍 Days 4-6: Belgium (Brussels & Bruges)", "details" => [
                                "Day 4: Travel to Brussels, Check-in: The Dominican, Visit Grand Place, Atomium, Royal Palace.",
                                "Day 5: Explore Manneken Pis, Magritte Museum, Galeries Royales Saint-Hubert, Dinner at La Roue d’Or*.",
                                "Day 6: Day Trip to Bruges, Explore Market Square, Belfry of Bruges, Boat Ride on Canals."
                            ]],
                            ["title" => "📍 Days 7-9: Germany (Cologne & Munich)", "details" => [
                                "Day 7: Travel to Cologne, Check-in: Excelsior Hotel Ernst, Visit Cologne Cathedral, Old Town, Rhine River.",
                                "Day 8: Travel to Munich, Check-in: Hotel Bayerischer Hof, Visit Marienplatz, English Garden, Nymphenburg Palace.",
                                "Day 9: Day Trip to Neuschwanstein Castle, Explore Bavarian Alps*."
                            ]],
                            ["title" => "📍 Days 10-12: Czech Republic (Prague)", "details" => [
                                "Day 10: Travel to Prague, Check-in: Four Seasons Hotel Prague, Visit Prague Castle, Charles Bridge, Old Town Square*.",
                                "Day 11: Visit St. Vitus Cathedral, Wenceslas Square, Vltava River Cruise.",
                                "Day 12: Day Trip to Kutná Hora, Visit Sedlec Ossuary, St. Barbara's Church, Medieval Streets."
                            ]],
                            ["title" => "📍 Days 13-15: Austria (Vienna)", "details" => [
                                "Day 13: Travel to Vienna, Check-in: Hotel Sacher, Visit Schönbrunn Palace, Stephansplatz, Kunsthistorisches Museum.",
                                "Day 14: Visit Hofburg Palace, Prater Park, Attend Vienna Opera Performance.",
                                "Day 15: Day Trip to Salzburg, Explore Mirabell Palace, Hohensalzburg Castle*."
                            ]],
                            ["title" => "📍 Days 16-18: Switzerland (Zurich)", "details" => [
                                "Day 16: Travel to Zurich, Check-in: Badrutt’s Palace Hotel, Explore Old Town, Swiss National Museum, Lake Zurich*.",
                                "Day 17: Visit Bahnhofstrasse, Zurich Zoo, Enjoy Felsenegg for panoramic views.",
                                "Day 18: Day Trip to Lucerne, Visit Chapel Bridge, Cable Car to Mount Pilatus."
                            ]],
                            ["title" => "📍 Days 19-21: Switzerland (Geneva & Interlaken)", "details" => [
                                "Day 19: Travel to Geneva, Check-in: Four Seasons Hotel des Bergues, Visit Jet d’Eau Fountain, Lake Geneva, United Nations Office.",
                                "Day 20: Travel to Interlaken, Check-in: Victoria Jungfrau Grand Hotel & Spa, Boat Ride on Lake Thun, Jungfrau Railway*.",
                                "Day 21: Train to Zurich, Departure."
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

