
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
$packagedestinationsID = ['PD067', 'PD068', 'PD069','PD070'];
$packageID = ['13'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legends of the East: Culture, Cities & Temples</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Legends of the East: Culture, Cities & Temples - 21 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/japan/japan1.png" alt="Seoul">
                        <img src="images/japan/japan2.png" alt="Tokyo">
                        <img src="images/japan/japan3.png" alt="Shanghai">
                        <img src="images/japan/japan4.png" alt="Hong Kong">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
           
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&ccid=ZEuCYoI4&id=4B3AEAFA25A140231518267A42D37F3EA5DC9AD5&thid=OIP.ZEuCYoI4tiGW8wSI8oGoDwHaE8&mediaurl=https%3A%2F%2Fwww.urlaubsguru.de%2Fwp-content%2Fuploads%2F2017%2F03%2Fskyline-von-seoul-istock-464629385-2.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.644b82628238b62196f30488f281a80f%3Frik%3D1ZrcpT5%252f00J6Jg%26pid%3DImgRaw%26r%3D0&exph=2578&expw=3863&q=seoul+korea&simid=608033023586424410&FORM=IRPRST&ck=0CAD6E1198799574A43EDDA0D20E6DEE&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=ytd1NtLa&id=88D37B87FBB3EE2D3DCCDEDD3B544DDB3E7D8C40&thid=OIP.ytd1NtLaPoK5wvoNX7RlSQHaE7&mediaurl=https%3A%2F%2Fwww.hkwalkers.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhong-kong.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.cad77536d2da3e82b9c2fa0d5fb46549%3Frik%3DQIx9PttNVDvd3g%26pid%3DImgRaw%26r%3D0&exph=1365&expw=2048&q=hong+kong&simid=607988763949949539&form=IRPRST&ck=F128A81E8D051804DD9E05499C9BD2C2&selectedindex=2&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0&vt=0&sim=11
https://www.bing.com/images/search?view=detailV2&ccid=jePwS3wy&id=EE3F5DC619BC285ECCB5AE675BB6EF1C41A7E85F&thid=OIP.jePwS3wyKnksat_BtA-dugHaE8&mediaurl=https%3A%2F%2Fwww.travelingeast.com%2Fwp-content%2Fuploads%2F2013%2F06%2FDepositphotos_41449771_xl-2015-scaled-1920x1280.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.8de3f04b7c322a792c6adfc1b40f9dba%3Frik%3DX%252binQRzvtltnrg%26pid%3DImgRaw%26r%3D0&exph=1280&expw=1920&q=taiwan&simid=607998139850369044&FORM=IRPRST&ck=6DB1D01A414CCAAACEA282D56C55ED31&selectedIndex=1&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=4GWdpl%2Fj&id=E72226EB83F28C58B9AB9FF71961F7D7AE465279&thid=OIP.4GWdpl_jObPIBKbw2jnlugHaE7&mediaurl=https%3A%2F%2Fwww.tripsavvy.com%2Fthmb%2FxSYU3yS9dQDBPdWoRyz9kxPozDo%3D%2F4256x2832%2Ffilters%3Afill%28auto%2C1%29%2Fpanoramic-skyline-of-shanghai-shanghai-center-at-the-time-of-construction-1097393186-c81b13c30ce045f6a403089b14330963.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.e0659da65fe339b3c804a6f0da39e5ba%3Frik%3DeVJGrtf3YRn3nw%26pid%3DImgRaw%26r%3D0&exph=2832&expw=4256&q=shanghai&simid=607992693839651453&FORM=IRPRST&ck=2D62000D8E45E4E35D503B2B53730A37&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->


            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Korean Air, Japan Airlines, China Eastern, Cathay Pacific, EVA Air, Philippine Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Seoul (ICN) at 10:00 AM</p>
                <p><strong>Return Flight:</strong> Manila (MNL) → Dublin (DUB) at 08:00 AM</p>
                <p><strong>Cost:</strong> €6,500 per person</p>
                <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. Meals not covered unless specified with * symbol.</p>

                
                
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="13">
                <input type="hidden" name="departureFlight" value="2025-06-05">
                <input type="hidden" name="returnFlight" value="2025-06-26">
                <button type="submit">June 05 - June 26, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="13">
                <input type="hidden" name="departureFlight" value="2025-08-10">
                <input type="hidden" name="returnFlight" value="2025-08-31">
                <button type="submit">August 10 - August 31, 2025</button>
                </form>
            </div>
        </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🇰🇷 Days 1-3: South Korea (Seoul)", "details" => [
                                "Day 1: Arrival in Seoul, Check-in: Four Seasons Hotel Seoul, Explore Gyeongbokgung Palace, walk along Bukchon Hanok Village, and dine at Mingles*.",
                                "Day 2: Visit National Museum of Korea, shop in Insadong and Myeongdong, and visit N Seoul Tower. Dine at Joo Ok*.",
                                "Day 3: Take a day trip to the DMZ, visit Dorasan Station and the Third Infiltration Tunnel. Return to Seoul for dinner at La Yeon."
                            ]],
                            ["title" => "🇯🇵 Days 4-7: Japan (Tokyo)", "details" => [
                                "Day 4: Travel to Tokyo, Check-in: The Peninsula Tokyo, Visit Meiji Shrine, explore Shibuya Crossing, and dine at Narisawa.",
                                "Day 5: Visit Tokyo Skytree, explore Asakusa Temple, and check out Tsukiji Fish Market. Enjoy sushi at Sukiyabashi Jiro*.",
                                "Day 6: Take a scenic day trip to Mount Fuji & Hakone. Return to Tokyo and dine at Nobu Tokyo.",
                                "Day 7: Spend the day in Odaiba, visit teamLab Borderless, and relax at Oedo Onsen Monogatari. Try Ramen Jiro*."
                            ]],
                            ["title" => "🇨🇳 Days 8-10: Shanghai, China", "details" => [
                                "Day 8: Travel to Shanghai, Check-in: The Peninsula Shanghai, Stroll along The Bund, explore Yuyuan Garden, and dine at Ultraviolet by Paul Pairet*.",
                                "Day 9: Visit Shanghai Museum, explore Tianzifang, and shop on Nanjing Road. Enjoy dinner at Jade on 36.",
                                "Day 10: Take a day trip to Suzhou, visit Classical Gardens and Suzhou Museum, and stroll through the Canal Walk. Return to Shanghai for dinner at M on the Bund*."
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


