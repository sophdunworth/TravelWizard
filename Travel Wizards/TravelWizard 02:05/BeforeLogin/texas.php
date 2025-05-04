
<?php include 'db.php';
$packagedestinationsID = ['PD080', 'PD081', 'PD082', 'PD083', 'PD084', 'PD085'];
$packageID = ['2'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Southern Charm: A Deep South Road Trip Adventure</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header1.php'; ?>

    <main>
        <section class="package">
            <h1>🚗 Southern Charm: A Deep South Road Trip Adventure – 23 Days</h1>

                <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/texas/texas1.png" alt="Houston, Texas">
                    <img src="images/texas/texas2.png" alt="New Orleans, Louisiana">
                    <img src="images/texas/texas3.png" alt="Nashville, Tennessee">
                    <img src="images/texas/texas4.png" alt="Savannah, Georgia">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>
            
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qIn32eA12CEIHw*ccid_iffZ4DXY&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1120+x+738+%c2%b7+53.31+kB+%c2%b7+png&sbifnm=texas1.png&thw=1120&thh=738&ptime=49&dlen=72784&expw=739&exph=487&selectedindex=0&id=1825811656&ccid=iffZ4DXY&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qEjfC5-InCEIOQ*ccid_SN8Ln4ic&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1106+x+514+%c2%b7+54.21+kB+%c2%b7+png&sbifnm=texas2.png&thw=1106&thh=514&ptime=34&dlen=74008&expw=880&exph=409&selectedindex=0&id=-457997415&ccid=SN8Ln4ic&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qF-h5mvTvyEIhQ*ccid_X6Hma9O%2F&form=SBIIRP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1026+x+868+%c2%b7+92.88+kB+%c2%b7+png&sbifnm=texas3.png&thw=1026&thh=868&ptime=82&dlen=126812&expw=652&exph=551&selectedindex=0&id=130653991&ccid=X6Hma9O%2F&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&ccid=AwwyzKPP&id=3CB37CE64FDB969CFBE41F44999741BBB3DD7D13&thid=OIP.AwwyzKPPAi5yNCBo2xknFAHaEQ&mediaurl=https%3A%2F%2Fcdn.aarp.net%2Fcontent%2Fdam%2Faarp%2Ftravel%2Fdestination-guides%2F2018%2F03%2F1140-savannah-stories-things-to-do.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.030c32cca3cf022e72342068db192714%3Frik%3DE33ds7tBl5lEHw%26pid%3DImgRaw%26r%3D0&exph=655&expw=1140&q=savannah+georgia&simid=608013704818869781&FORM=IRPRST&ck=E4938D9F8C863049B3C80DFA75F4E0CB&selectedIndex=7&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->


            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> American Airlines, Delta Airlines, Southwest Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Houston (IAH) - 9:00 AM</p>
                <p><strong>Return Flight:</strong> Atlanta (ATL) → Dublin (DUB) - 12:00 PM</p>
                <p><strong>Cost:</strong> €5,200 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
                
                
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="15">
                <input type="hidden" name="departureFlight" value="2025-06-01">
                <input type="hidden" name="returnFlight" value="2025-06-24">
                <button type="submit">June 01 - June 24, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="15">
                <input type="hidden" name="departureFlight" value="2025-09-01">
                <input type="hidden" name="returnFlight" value="2025-09-24">
                <button type="submit">September 01 - September 24, 2025</button>
                </form>
            </div>
        </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🇺🇸 Days 1-3: Texas (Houston & Austin)", "details" => [
                                "Day 1: Arrival in Houston, Check-in: The Post Oak Hotel, Visit Space Center Houston. Dinner at Pappadeaux’s Seafood Kitchen*.",
                                "Day 2: Explore Hermann Park, Houston Museum of Natural Science, The Galleria. Dinner at Brennan’s of Houston.",
                                "Day 3: Drive to Austin (3-hour drive), Check-in: The Driskill Hotel, Explore Lady Bird Lake. Dinner at Franklin Barbecue*."
                            ]],
                            ["title" => "🇺🇸 Days 4-5: Dallas, Texas", "details" => [
                                "Day 4: Drive to Dallas (3-hour drive), Check-in: The Ritz-Carlton Dallas, Visit Sixth Floor Museum. Dinner at Pappas Bros. Steakhouse*.",
                                "Day 5: Explore Perot Museum, Klyde Warren Park, NorthPark Center. Dinner at The French Room*."
                            ]],
                            ["title" => "🇺🇸 Days 6-8: New Orleans, Louisiana", "details" => [
                                "Day 6: Drive to New Orleans (7-hour drive), Check-in: The Roosevelt, Stroll the French Quarter. Dinner at Antoine’s.",
                                "Day 7: Steamboat ride, Jackson Square, St. Louis Cathedral. Dinner at Commander’s Palace*.",
                                "Day 8: Swamp tour in the Louisiana bayou. Dinner at Coop’s Place."
                            ]],
                            ["title" => "🇺🇸 Days 9-11: Atlanta, Georgia", "details" => [
                                "Day 9: Drive to Atlanta (6-hour drive), Check-in: The St. Regis, Visit Georgia Aquarium. Dinner at The Capital Grille*.",
                                "Day 10: Visit MLK Jr. National Historic Park, World of Coca-Cola. Dinner at Bones Steakhouse*.",
                                "Day 11: Day trip to Savannah (3-hour drive), Forsyth Park, River Street. Dinner at The Grey*."
                            ]],
                            ["title" => "🇺🇸 Days 12-14: Tennessee (Nashville & Memphis)", "details" => [
                                "Day 12: Drive to Nashville (4-hour drive), Check-in: The Hermitage Hotel, Explore Broadway Street. Dinner at The Catbird Seat.",
                                "Day 13: Visit Country Music Hall of Fame, The Parthenon. Dinner at Husk*.",
                                "Day 14: Day trip to Memphis (3-hour drive), Visit Graceland. Dinner at The Rendezvous*."
                            ]],
                            ["title" => "🇺🇸 Days 15-17: Kentucky (Lexington & Louisville)", "details" => [
                                "Day 15: Drive to Lexington (3-hour drive), Check-in: 21c Museum Hotel, Explore Horse Country. Dinner at The Grey Goose.",
                                "Day 16: Visit Mary Todd Lincoln House, Bourbon Trail tour. Dinner at The Local Taco*.",
                                "Day 17: Drive to Louisville (1.5-hour drive), Check-in: The Brown Hotel, Visit Muhammad Ali Center. Dinner at Jack Fry’s*."
                            ]],
                            ["title" => "🇺🇸 Days 18-20: Alabama (Birmingham & Mobile)", "details" => [
                                "Day 18: Drive to Birmingham (3-hour drive), Check-in: The Elyton Hotel, Explore Vulcan Park. Dinner at Highlands Bar & Grill.",
                                "Day 19: Visit Civil Rights Institute, Sloss Furnaces. Dinner at The Fish Market*.",
                                "Day 20: Drive to Mobile (1.5-hour drive), Check-in: Renaissance Mobile Hotel, Visit Fort Conde."
                            ]],
                            ["title" => "🇺🇸 Days 21-23: Georgia (Savannah & Atlanta)", "details" => [
                                "Day 21: Drive to Savannah (2-hour drive), Check-in: The Gastonian, Visit Historic District. Dinner at The Grey.",
                                "Day 22: Savannah Riverboat Cruise, Ghost Tour. Dinner at Mrs. Wilkes’ Dining Room*.",
                                "Day 23: Drive back to Atlanta (3-hour drive) for departure."
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

