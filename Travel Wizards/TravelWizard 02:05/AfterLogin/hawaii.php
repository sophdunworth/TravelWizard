
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php';
$packagedestinationsID = ['PD090', 'PD091', 'PD092','PD093', 'PD094', 'PD095'];
$packageID = ['17'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aloha to Adventure: Exploring the Pacific Islands</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Aloha to Adventure: Exploring the Pacific Islands - 12 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/hawaii/hawaii1.png" alt="Tahiti">
                        <img src="images/hawaii/hawaii2.png" alt="Bora Bora">
                        <img src="images/hawaii/hawaii3.png" alt="Oahu">
                        <img src="images/hawaii/hawaii4.png" alt="Maui">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
                
<!-- Image Refs
https://www.bing.com/images/search?view=detailV2&ccid=HC64hSNs&id=C240CED9F079192E7EC12B7BAE1C9EB276C99D0B&thid=OIP.HC64hSNsu7gXpwGNESWvkQHaE8&mediaurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.1c2eb885236cbbb817a7018d1125af91%3Frik%3DC53JdrKeHK57Kw%26riu%3Dhttp%253a%252f%252f1.bp.blogspot.com%252f-5pNBJAJAJD4%252fUW00w-jv8_I%252fAAAAAAAADP4%252f6zP_yP38iBw%252fs1600%252fPG_Bora_Bora_Motu.jpg%26ehk%3Dt7fVU%252bYYt5vofEo9n6GJPFuObYFrp%252b9%252b%252bXYFE0Ebb1M%253d%26risl%3D%26pid%3DImgRaw%26r%3D0&exph=1000&expw=1500&q=bora+bora&simid=608035372891656622&FORM=IRPRST&ck=3DCF623DB7CC3FA8E8419ECD01BC2FED&selectedIndex=3&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=2%2BP4lLTh&id=BE16F4C464382128D104895D3A99CB93826FED35&thid=OIP.2-P4lLThnKiqRfV-hY5MEQHaE8&mediaurl=https%3A%2F%2Fwww.travelweekly.com.au%2Fwp-content%2Fuploads%2F2021%2F03%2FiStock-618651752-scaled.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.dbe3f894b4e19ca8aa45f57e858e4c11%3Frik%3DNe1vgpPLmTpdiQ%26pid%3DImgRaw%26r%3D0&exph=1707&expw=2560&q=tahiti&simid=608041725133671981&FORM=IRPRST&ck=AD2B8B67652A0A21D90F3EF4CE0EF101&selectedIndex=3&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=GiNb9Y8L&id=63A90AAF69FDBB7A9BDB9FD013DBFFB817EA4B14&thid=OIP.GiNb9Y8Lo5LE3Okn3NOV_wHaD2&mediaurl=https%3A%2F%2Fcdn.getyourguide.com%2Fimg%2Ftour%2F61414fc8c1460.jpeg%2F98.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.1a235bf58f0ba392c4dce927dcd395ff%3Frik%3DFEvqF7j%252f2xPQnw%26pid%3DImgRaw%26r%3D0&exph=616&expw=1185&q=lagoon+safrai+bora+bora&simid=608050233486613695&FORM=IRPRST&ck=7DA7FF01A31641BA4F284B8B663D50C8&selectedIndex=10&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=onvgxPaf&id=34F7E55C88026B9A3E8CEBEEA1F6A4E735F500FE&thid=OIP.onvgxPafDJx5Y05aBK9nWQHaEK&mediaurl=https%3A%2F%2Fwww.tripsavvy.com%2Fthmb%2Fea5NEfSbRtkp5wbhvOL413RQc7Q%3D%2F2310x1300%2Ffilters%3Afill%28auto%2C1%29%2F502236413-56a3b6fa3df78cf7727ed4f1.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.a27be0c4f69f0c9c79634e5a04af6759%3Frik%3D%252fgD1Neek9qHu6w%26pid%3DImgRaw%26r%3D0&exph=1300&expw=2310&q=Sunrise+on+Haleakal%C4%81+Crater&simid=607986814017610132&FORM=IRPRST&ck=910CB0D45E6322F1A64E977F7002337A&selectedIndex=1&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->

                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Air Tahiti Nui, Hawaiian Airlines</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Tahiti (PPT) at 8:00 AM</p>
                    <p><strong>Return Flight:</strong> Maui (OGG) → Dublin (DUB) at 10:00 PM</p>
                    <p><strong>Cost:</strong> €4,350 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. </p>
                                                <p>Meals not covered unless specified with * symbol.</p>

                    
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="17">
                    <input type="hidden" name="departureFlight" value="2025-07-10">
                    <input type="hidden" name="returnFlight" value="2025-07-22">
                    <button type="submit">July 10 - July 22, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="17">
                    <input type="hidden" name="departureFlight" value="2025-09-05">
                    <input type="hidden" name="returnFlight" value="2025-09-17">
                    <button type="submit">September 05 - September 17, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🌴 Days 1-5: French Polynesia (Tahiti, Bora Bora)", "details" => [
                                "Day 1: Arrival in Tahiti, Check-in: InterContinental Tahiti Resort & Spa, Evening beach relaxation and Polynesian dinner at Le Lotus Restaurant.",
                                "Day 2: Visit Fautaua Waterfall, Museum of Tahiti and the Islands, and Papeete Market. Dinner at Le Coco's for gourmet Polynesian dining*.",
                                "Day 3: Travel to Bora Bora, Check-in: Four Seasons Resort Bora Bora, Sunset dinner at Arii Moana*.",
                                "Day 4: Bora Bora Lagoon Tour - Snorkeling, shark and ray feeding. Dinner at La Villa Mahana.",
                                "Day 5: Relax on Bora Bora beach or spa day. Sunset dinner at Lagoon Restaurant, St. Regis Bora Bora Resort*."
                            ]],
                            ["title" => "🏄‍♂️ Days 6-12: Hawaii (Oahu, Maui)", "details" => [
                                "Day 6: Travel to Oahu, Check-in: The Royal Hawaiian, Waikiki Beach stroll and dinner at House Without a Key.",
                                "Day 7: Visit Pearl Harbor, Diamond Head Crater, and Iolani Palace. Dinner at Alan Wong's Honolulu*.",
                                "Day 8: North Shore Adventure - Visit Waimea Bay, return to Waikiki for dinner at Roy's Waikiki.",
                                "Day 9: Travel to Maui, Check-in: Hotel Wailea, Dinner at Mama's Fish House.",
                                "Day 10: Explore Haleakalā National Park, hike Sunrise on Haleakalā Crater, Dinner at Spago, Four Seasons Resort Maui.",
                                "Day 11: Road to Hana - Scenic drive, waterfalls, tropical forests. Dinner at Nalu Health Bar & Grill*.",
                                "Day 12: Relaxation and departure, Dinner at The Plantation House Restaurant before flight*."
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

    <?php include 'templates/sfooter.php'; ?>
</body>
</html>

