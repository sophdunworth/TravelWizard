
<?php 

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php';
$packagedestinationsID = ['PD029', 'PD030', 'PD031'];
$packageID = ['6'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabian Nights: A Grand Tour of the Gulf</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Arabian Nights: A Grand Tour of the Gulf – 14 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/dubai/dubai1.png" alt="Dubai">
                        <img src="images/dubai/dubai2.png" alt="Dubai">
                        <img src="images/dubai/dubai3.png" alt="Dubai">
                        <img src="images/dubai/dubai4.png" alt="Dubai">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
<!-- Image Ref
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RO1aONnpBSEIqxcxoNWLuD9SqbotqVTdP3s&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1130+x+742+%C2%B7+28.09+kB+%C2%B7+png&sbifnm=dubai1.png&thw=1130&thh=742&ptime=41&dlen=38352&expw=1130&exph=742
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qCwhFCcWUyEI.A*ccid_LCEUJxZT&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1050+x+792+%c2%b7+55.28+kB+%c2%b7+png&sbifnm=dubai2.png&thw=1050&thh=792&ptime=59&dlen=75476&expw=690&exph=521&selectedindex=0&id=1604016750&ccid=LCEUJxZT&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qNv0x.fg-iEIGg*ccid_2%2FTH9%2BD6&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=998+x+816+%c2%b7+51.20+kB+%c2%b7+png&sbifnm=dubai3.png&thw=998&thh=816&ptime=69&dlen=69904&expw=663&exph=542&selectedindex=0&id=1431813497&ccid=2%2FTH9%2BD6&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qG73zFB9-yEIsA*ccid_bvfMUH37&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1064+x+764+%c2%b7+66.89+kB+%c2%b7+png&sbifnm=dubai4.png&thw=1064&thh=764&ptime=68&dlen=91332&expw=708&exph=508&selectedindex=0&id=1480686394&ccid=bvfMUH37&vt=2&sim=11
 -->
                
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Emirates</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Dubai (DXB) at 9:00 AM</p>
                    <p><strong>Return Flight:</strong> Doha (DOH) → Dublin (DUB) at 8:00 PM</p>
                    <p><strong>Cost:</strong> €3,200 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included. Meals not covered unless specified with * symbol.</p>

                    
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="6">
                    <input type="hidden" name="departureFlight" value="2025-05-10">
                    <input type="hidden" name="returnFlight" value="2025-05-24">
                    <button type="submit">May 15 - May 24, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="6">
                    <input type="hidden" name="departureFlight" value="2025-11-05">
                    <input type="hidden" name="returnFlight" value="2025-11-19">
                    <button type="submit">November 05 - November 19, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Days 1-5: Dubai", "details" => [
                                "Day 1: Arrival in Dubai, Check-in: Burj Al Arab Jumeirah, Dinner at Pierchic*.",
                                "Day 2: Visit Burj Khalifa, Dubai Mall, Aquarium, Ice Rink, Dinner at Atmosphere*.",
                                "Day 3: Desert Safari, Dune Bashing, Camel Riding, Dinner at Al Hadheerah.",
                                "Day 4: Visit Atlantis The Palm, Aquaventure Waterpark, Dinner at Nobu.",
                                "Day 5: Explore Dubai Parks & Resorts, Dubai Marina nightlife."
                            ]],
                            ["title" => "📍 Days 6-9: Abu Dhabi", "details" => [
                                "Day 6: Travel to Abu Dhabi, Check-in: Emirates Palace, Dinner at Li Beirut*.",
                                "Day 7: Visit Sheikh Zayed Grand Mosque, Abu Dhabi Corniche, Dinner at Spoon.",
                                "Day 8: Explore Louvre Abu Dhabi, Saadiyat Island, Dinner at The Terrace.",
                                "Day 9: Visit Ferrari World, Explore Yas Marina, Dinner at Folly by Nick & Scott*."
                            ]],
                            ["title" => "📍 Days 10-14: Qatar (Doha)", "details" => [
                                "Day 10: Travel to Doha, Check-in: The Ritz-Carlton, Dinner at IDAM.",
                                "Day 11: Visit Museum of Islamic Art, Explore Souq Waqif, Dinner at Al Mourjan*.",
                                "Day 12: Relax at Aspire Park, Explore Villaggio Mall, Dinner at Nobu Doha.",
                                "Day 13: Visit The Pearl-Qatar, Katara Cultural Village, Dinner at Al Seef*.",
                                "Day 14: Visit Al Zubara Fort, Relax at hotel spa, Departure."
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

