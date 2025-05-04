
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
 $packagedestinationsID = ['PD086', 'PD087', 'PD088', 'PD089'];
$packageID = ['16'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Coast Explorer: From History to Beaches - 18 Days</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>🗽 East Coast Explorer: From History to Beaches - 18 Days</h1>
            
            <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/newyork/newyork1.png" alt="Boston">
                    <img src="images/newyork/newyork2.png" alt="New York City">
                    <img src="images/newyork/newyork3.png" alt="Philadelphia">
                    <img src="images/newyork/newyork4.png" alt="Washington, D.C.">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>
<!-- Image Carousel
https://www.bing.com/images/search?view=detailV2&ccid=qJK6RB2l&id=E17D37574861690C0BB490D0FACDD857862C9F4F&thid=OIP.qJK6RB2lP3auQv9H9aIgiwHaE8&mediaurl=https%3A%2F%2Fstatic.independent.co.uk%2F2023%2F03%2F28%2F12%2FiStock-1336879395.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.a892ba441da53f76ae42ff47f5a2208b%3Frik%3DT58shlfYzfrQkA%26pid%3DImgRaw%26r%3D0&exph=1414&expw=2119&q=boston&simid=608035110859124467&FORM=IRPRST&ck=61CB8EF0D46D8B0083DDE30963193AB9&selectedIndex=7&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=TqlVpaAD&id=9804588A4366ED06DDCB0BB36676C77E0B87DADE&thid=OIP.TqlVpaADGAcPNmnar8iJggHaE8&mediaurl=https%3A%2F%2Fwww.drivethenation.com%2Fwp-content%2Fuploads%2F2017%2F09%2Fbigstock-Skyline-Of-Downtown-Charlotte-185476972-1500x1000.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.4ea955a5a00318070f3669daafc88982%3Frik%3D3tqHC37HdmazCw%26pid%3DImgRaw%26r%3D0&exph=1000&expw=1500&q=charlotte+nc&simid=608021276806051372&FORM=IRPRST&ck=13028A5DAB66F6D82BC684CBB74C5BD7&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=YsV7L9Ym&id=64C5C79D91DB12E62150D5065D505B4A16C8C8AE&thid=OIP.YsV7L9Ymi6YK7atn1P_sbQHaE7&mediaurl=https%3A%2F%2Fwww.tripsavvy.com%2Fthmb%2Fdw1scZ-PkJacGr0hTCLL4nRSDi4%3D%2F2121x1413%2Ffilters%3Afill%28auto%2C1%29%2Fsouth-beach-miami-from-south-pointe-park--florida--usa-1137673992-0dc4c290e2764b178a5ab5be28dbd2d7.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.62c57b2fd6268ba60aedab67d4ffec6d%3Frik%3DrsjIFkpbUF0G1Q%26pid%3DImgRaw%26r%3D0&exph=1413&expw=2121&q=miami&simid=608042790277813912&FORM=IRPRST&ck=293B8F737D8E017E0429AB579C586C31&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=Ygx9IGVE&id=F03C66ECCF0893A9906A86E6BEBA6C022B69B151&thid=OIF.CD4XPS4d%2B0vvW7ajw8SknQ&mediaurl=https%3A%2F%2Fwww.cuinsight.com%2Fwp-content%2Fuploads%2F2025%2F02%2Fbigstock-Skyline-of-downtown-Philadelph-30110054.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.620c7d2065446bb8f499a29867923be8%3Frik%3D%26pid%3DImgRaw%26r%3D0&exph=830&expw=1320&q=philadelphia&simid=7046690551600&FORM=IRPRST&ck=083E173D2E1DFB4BEF5BB6A3C3C4A49D&selectedIndex=26&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->


            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Delta Airlines, JetBlue, American Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Boston (BOS) at 7:45 AM</p>
                <p><strong>Return Flight:</strong> Miami (MIA) → Dublin (DUB) at 8:45 PM</p>
                <p><strong>Cost:</strong> €3,500 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="16">
                <input type="hidden" name="departureFlight" value="2025-06-05">
                <input type="hidden" name="returnFlight" value="2025-06-23">
                <button type="submit">June 05 - June 23, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="16">
                <input type="hidden" name="departureFlight" value="2025-12-10">
                <input type="hidden" name="returnFlight" value="2025-12-28">
                <button type="submit">December 10 - December 28, 2025</button>
                </form>
            </div>
         </div>    

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🏙️ Days 1-3: Boston, Massachusetts", "details" => [
                                "Day 1: Arrive in Boston, Check-in at Fairmont Copley Plaza, Explore Freedom Trail & North End (Italian Cuisine*).",
                                "Day 2: Visit Museum of Fine Arts, USS Constitution, and enjoy a Boston Harbor Cruise.",
                                "Day 3: Day trip to Salem, Explore Salem Witch Museum, Return to Boston."
                            ]],
                            ["title" => "🌆 Days 4-6: New York City, New York", "details" => [
                                "Day 4: Travel to NYC, Check-in at The Langham, Visit Times Square, Broadway Show, and Chinatown*.",
                                "Day 5: Explore Statue of Liberty, Central Park, and Metropolitan Museum of Art.",
                                "Day 6: Walk Brooklyn Bridge, Visit 9/11 Memorial, and Explore SoHo."
                            ]],
                            ["title" => "🏛️ Days 7-9: Philadelphia, Pennsylvania", "details" => [
                                "Day 7: Travel to Philadelphia, Check-in at The Rittenhouse Hotel, Visit Liberty Bell & Independence Hall.",
                                "Day 8: Explore Reading Terminal Market, Rittenhouse Square, and Old City for Dinner*.",
                                "Day 9: Day Trip to Amish Country, Tour Lancaster County, Return to Philadelphia."
                            ]],
                            ["title" => "🇺🇸 Days 10-12: Washington, D.C.", "details" => [
                                "Day 10: Travel to Washington, Check-in at The Willard InterContinental, Explore National Mall & Lincoln Memorial.",
                                "Day 11: Tour U.S. Capitol, Visit National Gallery of Art & Explore Georgetown.",
                                "Day 12: Visit White House, National Zoo, and Dine in Adams Morgan*."
                            ]],
                            ["title" => "🚗 Days 13-15: Charlotte, North Carolina", "details" => [
                                "Day 13: Travel to Charlotte, Check-in at The Ritz-Carlton, Visit NASCAR Hall of Fame & Uptown Charlotte.",
                                "Day 14: Explore Mint Museum, Freedom Park, and Blumenthal Performing Arts Center.",
                                "Day 15: Day Trip to Asheville, Tour Biltmore Estate & Blue Ridge Parkway."
                            ]],
                            ["title" => "🌴 Days 16-18: Miami, Florida", "details" => [
                                "Day 16: Travel to Miami, Check-in at The Ritz-Carlton Key Biscayne, Relax on South Beach & Ocean Drive.",
                                "Day 17: Visit Wynwood Walls, Explore Vizcaya Museum & Star Island Boat Tour.",
                                "Day 18: Visit Miami Seaquarium, Relax on Key Biscayne, Depart from Miami International Airport."
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

