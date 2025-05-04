
<?php
session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
$packageID = ['21'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greek Island Odyssey – 14 Days</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>🏝️ Greek Island Odyssey: Sun, Sea, and History – 14 Days</h1>

            <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/rhodes/rhodes1.png" alt="Rhodes, Greece">
                    <img src="images/rhodes/rhodes2.png" alt="Kos, Greece">
                    <img src="images/rhodes/rhodes3.png" alt="Crete, Greece">
                    <img src="images/rhodes/rhodes4.png" alt="Symi Island">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>
            
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&ccid=wIw9ZBCK&id=0B5470FB890F7EE6D21AE0457754DB92DE0AC3CF&thid=OIP.wIw9ZBCKNHFfhAzPIgm_6AHaEK&mediaurl=https%3A%2F%2Fwww.grecomap.com%2Fimages%2Fattractions%2F23%2F2417%2F1920%2F126346_Knossos-palace-51.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.c08c3d64108a34715f840ccf2209bfe8%3Frik%3Dz8MK3pLbVHdF4A%26pid%3DImgRaw%26r%3D0&exph=1080&expw=1920&q=Palace+of+Knossos&simid=608020112915441945&FORM=IRPRST&ck=26F1B5EC06C298EB1B55DAADC5A2089F&selectedIndex=5&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=imjkQ80m&id=B0DE4915B48BA90887C7F5BE965A3C24E2AEFE6B&thid=OIP.imjkQ80mi8V-HX8F5IaQmwHaE7&mediaurl=https%3A%2F%2Fwww.verkengriekenland.nl%2Fwp-content%2Fuploads%2F2019%2F01%2Fkos-griekenland.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.8a68e443cd268bc57e1d7f05e486909b%3Frik%3Da%252f6u4iQ8Wpa%252b9Q%26pid%3DImgRaw%26r%3D0&exph=666&expw=1000&q=kos&simid=607991100405083334&FORM=IRPRST&ck=FE4A20FE507E4D2D3797B47607C6384B&selectedIndex=4&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=uuXsErX0&id=DDA8A2E28548BFC34198B2566EAE0C3B656AE046&thid=OIP.uuXsErX0LPssiqbU5FqMCgHaFj&mediaurl=https%3A%2F%2Fwww.greeka.com%2Fseedo%2Fphotos%2F753%2Fepidaurus-sanctuary-of-asklepios-thumb-1-1024.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.bae5ec12b5f42cfb2c8aa6d4e45a8c0a%3Frik%3DRuBqZTsMrm5Wsg%26pid%3DImgRaw%26r%3D0&exph=768&expw=1024&q=Asklepion+Sanctuary+and+Thermal+Springs&simid=608028844556578945&FORM=IRPRST&ck=3370A679D722671DC57EEEDD83B073A9&selectedIndex=14&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=%2BWyphrfH&id=C4C03C93834456C3614F4113BDC1C266343E9895&thid=OIP.-WyphrfHAkO-UQ0eJniNzgHaE8&mediaurl=https%3A%2F%2Fwww.greeka.com%2Fphotos%2Fdodecanese%2Fkos%2Fhero%2Fkos-island-3-1920.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.f96ca986b7c70243be510d1e26788dce%3Frik%3DlZg%252bNGbCwb0TQQ%26pid%3DImgRaw%26r%3D0&exph=1281&expw=1920&q=kos&simid=608003718988059689&FORM=IRPRST&ck=9102016AF4DDC5BC370A2A3F7AAB18BA&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->


            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Aegean Airlines, Olympic Air, Aer Lingus</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Athens (ATH) → Rhodes (RHO) - 10:00 AM</p>
                <p><strong>Return Flight:</strong> Crete (HER) → Athens (ATH) → Dublin (DUB) - 7:00 PM</p>
                <p><strong>Cost:</strong> €1,000 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="21">
                <input type="hidden" name="departureFlight" value="2025-06-10">
                <input type="hidden" name="returnFlight" value="2025-06-24">
                <button type="submit">June 10 - June 24, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="21">
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
                            ["title" => "🇬🇷 Days 1-5: Rhodes", "details" => [
                                "Day 1: Arrive in Rhodes, Check-in at Kallithea Horizon Royal, Sunset dinner at seaside restaurant*.",
                                "Day 2: Explore Rhodes Old Town, visit Palace of the Grand Master, Dinner at Marco Polo Cafe*.",
                                "Day 3: Visit Lindos, Acropolis, St. Paul’s Bay. Relax in the afternoon.",
                                "Day 4: Discover the Valley of the Butterflies, unwind at the hotel spa.",
                                "Day 5: Take a day trip to Symi Island, explore colorful houses & beaches."
                            ]],
                            ["title" => "🇬🇷 Days 6-10: Kos", "details" => [
                                "Day 6: Travel to Kos, Check-in at Kipriotis Village Resort, Dinner at Pelagos Restaurant*.",
                                "Day 7: Explore Kos Town, Hippocrates' Tree, Ancient Agora, Dinner at Lofaki Restaurant*.",
                                "Day 8: Visit Asklepion Sanctuary, enjoy the Thermal Springs.",
                                "Day 9: Relax at Tigaki Beach, try water sports.",
                                "Day 10: Take a boat trip to Nisyros Island, visit volcanic craters."
                            ]],
                            ["title" => "🇬🇷 Days 11-14: Crete", "details" => [
                                "Day 11: Travel to Crete, Check-in at Blue Palace, Sunset dinner with views of Spinalonga Island*.",
                                "Day 12: Explore Knossos Palace, Archaeological Museum, walk through Heraklion Old Town.",
                                "Day 13: Enjoy Elafonissi Beach, then visit Chania Town.",
                                "Day 14: Visit Rethymno Old Town, explore Venetian architecture before departure."
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

