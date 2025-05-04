
<?php
// Start session if not already started

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
$packagedestinationsID = ['PD071', 'PD072', 'PD073','PD074', 'PD075', 'PD076', 'PD077', 'PD078', 'PD079'];
$packageID = ['14'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central Cities Discovery: Culture, History & Skyline</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Central Cities Discovery: Culture, History & Skyline - 14 Days</h1>
            
            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/chicago/chicago1.png" alt="Chicago">
                        <img src="images/chicago/chicago2.png" alt="Chicago">
                        <img src="images/chicago/chicago3.png" alt="Chicago">
                        <img src="images/chicago/chicago4.png" alt="Chicago">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
<!-- Image Refs
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qKQdwxhgMSEIdg*ccid_pB3DGGAx&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1016+x+654+%c2%b7+84.96+kB+%c2%b7+png&sbifnm=chicago1.png&thw=1016&thh=654&ptime=70&dlen=115996&expw=747&exph=481&selectedindex=0&id=-1657600218&ccid=pB3DGGAx&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qE.G3JmC0iEI7g*ccid_T8bcmYLS&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1036+x+788+%c2%b7+49.00+kB+%c2%b7+png&sbifnm=chicago2.png&thw=1036&thh=788&ptime=59&dlen=66900&expw=687&exph=523&selectedindex=0&id=522682053&ccid=T8bcmYLS&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_RP8IpRC37yEIqxcxoNWLuD9SqbotqVTdP5Q*ccid_%2FwilELfv&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1078+x+706+%c2%b7+70.97+kB+%c2%b7+png&sbifnm=chicago3.png&thw=1078&thh=706&ptime=59&dlen=96904&expw=1078&exph=706&selectedindex=0&id=-1540506234&ccid=%2FwilELfv&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qDGX0hEVcyEIFg*ccid_MZfSERVz&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1132+x+756+%c2%b7+47.68+kB+%c2%b7+png&sbifnm=chicago4.png&thw=1132&thh=756&ptime=52&dlen=65096&expw=734&exph=490&selectedindex=0&id=2035060221&ccid=MZfSERVz&vt=2&sim=11
 -->
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Air Canada, Delta Airlines, United Airlines</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Montreal (YUL) at 09:30 AM</p>
                    <p><strong>Return Flight:</strong> Chicago (ORD) → Dublin (DUB) at 07:00 PM</p>
                    <p><strong>Cost:</strong> €2,800 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included. Meals not covered unless specified with * symbol.</p>

                   
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="14">
                    <input type="hidden" name="departureFlight" value="2025-04-10">
                    <input type="hidden" name="returnFlight" value="2025-04-24">
                    <button type="submit">April 15 - April 29, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="14">
                    <input type="hidden" name="departureFlight" value="2025-09-05">
                    <input type="hidden" name="returnFlight" value="2025-09-19">
                    <button type="submit">September 05 - September 19, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Days 1-3: Montreal, Canada", "details" => [
                                "Day 1: Arrival in Montreal, Check-in: Hotel Le Germain Montreal, Explore Old Montreal, walk along Mont Royal, and dine at Toqué!*.",
                                "Day 2: Visit Basilica of Notre-Dame, explore Montreal Museum of Fine Arts, and tour Atwater Market. Dine at Joe Beef*.",
                                "Day 3: Drive to Quebec City for a day trip, visit Old Town, walk around Place Royale, and have lunch at Le Saint-Amour."
                            ]],
                            ["title" => "📍 Days 4-7: Toronto, Canada", "details" => [
                                "Day 4: Travel to Toronto (5-hour drive), Check-in: Four Seasons Hotel Toronto, Visit CN Tower, explore Harbourfront Centre, and dine at Alo Restaurant*.",
                                "Day 5: Visit Royal Ontario Museum, walk through Distillery District, and visit St. Lawrence Market. Dine at Canoe.",
                                "Day 6: Take a day trip to Niagara Falls, boat tour at the falls, visit Niagara-on-the-Lake. Return to Toronto for dinner at Momofuku*.",
                                "Day 7: Visit Toronto Islands, check out Art Gallery of Ontario, and enjoy a meal at Buca*."
                            ]],
                            ["title" => "📍 Days 8-10: Detroit, Michigan", "details" => [
                                "Day 8: Travel to Detroit (4-hour drive), Check-in: The Westin Book Cadillac Detroit, Visit Detroit Institute of Arts, explore Belle Isle Park, and dine at Iridescence*.",
                                "Day 9: Tour Motown Museum, visit Detroit Historical Museum, and check out Greektown. Dine at Andiamo in Greektown*.",
                                "Day 10: Take a short trip to Ann Arbor, visit University of Michigan, and explore Ann Arbor Hands-On Museum. Dine at Zingerman’s Roadhouse."
                            ]],
                            ["title" => "📍 Days 11-14: Chicago, Illinois", "details" => [
                                "Day 11: Travel to Chicago (4-hour drive), Check-in: The Langham, Chicago, Explore Millennium Park, visit Art Institute of Chicago, and take an architecture boat tour.",
                                "Day 12: Visit Willis Tower Skydeck, stroll through Navy Pier, and explore Magnificent Mile. Dine at The Signature Room at Hancock Building*.",
                                "Day 13: Visit Lincoln Park Zoo, tour Field Museum of Natural History, and relax in Grant Park. Dine at Alinea*.",
                                "Day 14: Explore Wicker Park, check out The 606 elevated park, and visit Museum of Science and Industry before departure."
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

