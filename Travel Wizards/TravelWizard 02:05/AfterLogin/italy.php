<?php

// Start session to access session variables
session_start();

//https://www.w3schools.com/charsets/ref_emoji_weather.asp
//https://www.w3schools.com/charsets/ref_emoji_sky.asp
//https://www.w3schools.com/charsets/ref_emoji_places.asp


// Include authentication script to protect the page for logged-in users only
require_once '../BeforeLogin/auth.php';

include 'db.php';

// Destination IDs and package ID for the trip
$packagedestinationsID = ['PD116', 'PD117', 'PD118'];
$packageID = ['20'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Dolce Vita - 23 Days in Italy</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <!-- Package Section -->
        <section class="package">
            <h1>La Dolce Vita - 23 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/italy/italy1.png" alt="Milan">
                        <img src="images/italy/italy2.png" alt="Venice">
                        <img src="images/italy/italy3.png" alt="Pisa">
                        <img src="images/italy/italy4.png" alt="Sicily">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&ccid=ZEuCYoI4&id=4B3AEAFA25A140231518267A42D37F3EA5DC9AD5&thid=OIP.ZEuCYoI4tiGW8wSI8oGoDwHaE8&mediaurl=https%3A%2F%2Fwww.urlaubsguru.de%2Fwp-content%2Fuploads%2F2017%2F03%2Fskyline-von-seoul-istock-464629385-2.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.644b82628238b62196f30488f281a80f%3Frik%3D1ZrcpT5%252f00J6Jg%26pid%3DImgRaw%26r%3D0&exph=2578&expw=3863&q=seoul+korea&simid=608033023586424410&FORM=IRPRST&ck=0CAD6E1198799574A43EDDA0D20E6DEE&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=ytd1NtLa&id=88D37B87FBB3EE2D3DCCDEDD3B544DDB3E7D8C40&thid=OIP.ytd1NtLaPoK5wvoNX7RlSQHaE7&mediaurl=https%3A%2F%2Fwww.hkwalkers.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhong-kong.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.cad77536d2da3e82b9c2fa0d5fb46549%3Frik%3DQIx9PttNVDvd3g%26pid%3DImgRaw%26r%3D0&exph=1365&expw=2048&q=hong+kong&simid=607988763949949539&form=IRPRST&ck=F128A81E8D051804DD9E05499C9BD2C2&selectedindex=2&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0&vt=0&sim=11
https://www.bing.com/images/search?view=detailV2&ccid=jePwS3wy&id=EE3F5DC619BC285ECCB5AE675BB6EF1C41A7E85F&thid=OIP.jePwS3wyKnksat_BtA-dugHaE8&mediaurl=https%3A%2F%2Fwww.travelingeast.com%2Fwp-content%2Fuploads%2F2013%2F06%2FDepositphotos_41449771_xl-2015-scaled-1920x1280.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.8de3f04b7c322a792c6adfc1b40f9dba%3Frik%3DX%252binQRzvtltnrg%26pid%3DImgRaw%26r%3D0&exph=1280&expw=1920&q=taiwan&simid=607998139850369044&FORM=IRPRST&ck=6DB1D01A414CCAAACEA282D56C55ED31&selectedIndex=1&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=4GWdpl%2Fj&id=E72226EB83F28C58B9AB9FF71961F7D7AE465279&thid=OIP.4GWdpl_jObPIBKbw2jnlugHaE7&mediaurl=https%3A%2F%2Fwww.tripsavvy.com%2Fthmb%2FxSYU3yS9dQDBPdWoRyz9kxPozDo%3D%2F4256x2832%2Ffilters%3Afill%28auto%2C1%29%2Fpanoramic-skyline-of-shanghai-shanghai-center-at-the-time-of-construction-1097393186-c81b13c30ce045f6a403089b14330963.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.e0659da65fe339b3c804a6f0da39e5ba%3Frik%3DeVJGrtf3YRn3nw%26pid%3DImgRaw%26r%3D0&exph=2832&expw=4256&q=shanghai&simid=607992693839651453&FORM=IRPRST&ck=2D62000D8E45E4E35D503B2B53730A37&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->
                <!-- Trip Details Section -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Aer Lingus</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Milan (MXP) at 8:00 AM</p>
                    <p><strong>Return Flight:</strong> Catania (CTA) → Dublin (DUB) at 5:00 AM</p>
                    <p><strong>Cost:</strong> €1,700 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. </p>
                    <p>Meals not covered unless specified with * symbol.</p>

                    <!-- Booking form for a specific departure date -->
                    <form action="booking.php" method="POST">
                        <input type="hidden" name="package_id" value="20">
                        <input type="hidden" name="departureFlight" value="2025-06-15">
                        <input type="hidden" name="returnFlight" value="2025-07-08">
                        <button type="submit">June 15 - July 08, 2025</button>
                    </form>

                    <!-- Booking form for another specific departure date -->
                    <form action="booking.php" method="POST">
                        <input type="hidden" name="package_id" value="20">
                        <input type="hidden" name="departureFlight" value="2025-08-20">
                        <input type="hidden" name="returnFlight" value="2025-09-12">
                        <button type="submit">August 20 - September 12, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion Section -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        // Array defining the trip destinations and itinerary details for each section
                        $destinations = [
                            ["title" => "🏙️ Days 1-4: Milan & Lake Como", "details" => [
                                "Day 1: Arrival in Milan, Check-in: Hotel Principe di Savoia, Explore Piazza del Duomo, Dinner at Cracco*.",
                                "Day 2: Visit Duomo di Milano, Sforza Castle, and Galleria Vittorio Emanuele II. Dinner at Nobu Milano.",
                                "Day 3: Day trip to Lake Como - Visit Bellagio and Varenna, Lakeside lunch, return to Milan, Dinner at Il Luogo di Aimo e Nadia*.",
                                "Day 4: Explore Milan’s Quadrilatero d'Oro for luxury shopping. Dinner at Ristorante Cracco*."
                            ]],
                            ["title" => "🛶 Days 5-7: Venice & Murano", "details" => [
                                "Day 5: Travel to Venice, Check-in: Hotel Danieli, Gondola ride along Grand Canal, Dinner at Antiche Carampane.",
                                "Day 6: Visit St. Mark’s Basilica, Doge’s Palace, and Rialto Bridge. Dinner at Osteria alle Testiere*.",
                                "Day 7: Boat tour to Murano & Burano Islands. Return to Venice, Dinner at La Caravella."
                            ]],
                            ["title" => "🎨 Days 8-10: Florence & Tuscany", "details" => [
                                "Day 8: Travel to Florence, Check-in: Four Seasons Hotel Firenze, Dinner at Osteria All'Antico Vinaio*.",
                                "Day 9: Visit Uffizi Gallery, Duomo di Santa Maria del Fiore, and Ponte Vecchio. Dinner at Enoteca Pinchiorri.",
                                "Day 10: Day trip to Chianti region for vineyard tours and wine tastings. Return to Florence for dinner."
                            ]],
                            ["title" => "🏛️ Days 11-12: Pisa", "details" => [
                                "Day 11: Travel to Pisa, Check-in: Hotel Bologna, Visit Leaning Tower of Pisa, Piazza dei Miracoli. Dinner at Ristorante La Buca.",
                                "Day 12: Visit Pisa Cathedral, Pisa Baptistery, and Botanical Garden of Pisa. Dinner at Il Vecchio Marino*."
                            ]],
                            ["title" => "🏺 Days 13-16: Rome & Vatican City", "details" => [
                                "Day 13: Travel to Rome, Check-in: Hotel de Russie, Dinner at La Pergola.",
                                "Day 14: Visit Colosseum, Roman Forum, Pantheon, Trevi Fountain, Piazza di Spagna. Dinner at Antico Arco*.",
                                "Day 15: Vatican City Tour - St. Peter’s Basilica, Vatican Museums, Sistine Chapel. Dinner at Il Pagliaccio*.",
                                "Day 16: Day trip to Tivoli - Villa d'Este, Hadrian’s Villa. Return to Rome for dinner."
                            ]],
                            ["title" => "🌋 Days 17-19: Naples & Pompeii", "details" => [
                                "Day 17: Travel to Naples, Check-in: Grand Hotel Vesuvio, Explore Spaccanapoli district, Dinner at La Cantina dei Lazzari.",
                                "Day 18: Visit Pompeii Archaeological Site and Mount Vesuvius. Dinner at Ristorante Palazzo Petrucci.",
                                "Day 19: Visit Naples National Archaeological Museum, Castel dell'Ovo, and Spaccanapoli. Dinner at Da Michele*."
                            ]],
                            ["title" => "🏝️ Days 20-23: Sicily (Palermo & Catania)", "details" => [
                                "Day 20: Travel to Palermo, Check-in: Villa Igiea, Dinner at Antica Focacceria San Francesco.",
                                "Day 21: Visit Palermo Cathedral, Norman Palace, and Catacombs of the Capuchins. Dinner at Il Crocifisso*.",
                                "Day 22: Travel to Catania, Check-in: Palace Catania | UNA Esperienze, Explore Mount Etna, Seafood dinner in Catania.",
                                "Day 23: Departure from Catania."
                            ]]
                        ];
                    ?>

                    <!-- Loop through each destination and display the accordion items -->
                    <?php foreach ($destinations as $destination): ?>
                        <div class="accordion-item">
                            <button class="accordion-header">
                                <!-- Display the destination title  -->
                                <?php echo htmlspecialchars($destination["title"]); ?> 
                                <span class="toggle-icon">+</span>
                            </button>
                            <div class="accordion-content">
                                <ul>
                                    <!-- Loop through each day's details and display them -->
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

