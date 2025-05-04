
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
 $packagedestinationsID = ['PD096', 'PD097', 'PD098', 'PD099','PD100', 'PD101', 'PD102', 'PD103', 'PD104'];
$packageID = ['18'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Coast Gateway: Beaches, Cities & Road Trip</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Golden Coast Gateway: Beaches, Cities & Road Trip - 21 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/la/la1.png" alt="Golden Coast Adventure">
                        <img src="images/la/la2.png" alt="San Francisco">
                        <img src="images/la/la3.png" alt="Seattle">
                        <img src="images/la/la4.png" alt="Las Vegas">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
            
    
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&ccid=kDf8F%2B2H&id=AB279336337B92DD7CDA75789803108CDDD8DBBD&thid=OIP.kDf8F-2HjNLK473CZdWOsgHaET&mediaurl=https%3A%2F%2Fwww.tripsavvy.com%2Fthmb%2FuqNzAoqBIraz1RIKIPklL3H-z5Y%3D%2F2270x1321%2Ffilters%3Afill%28auto%2C1%29%2FGettyImages-629829924-5bdb57f74cedfd0026ae431f.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.9037fc17ed878cd2cae3bdc265d58eb2%3Frik%3DvdvY3YwQA5h4dQ%26pid%3DImgRaw%26r%3D0&exph=1321&expw=2270&q=vancouver+canada&simid=608017956804784059&FORM=IRPRST&ck=C9D1E914A2446097F2E7870FFEAD17F9&selectedIndex=0&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=10C4RzKF&id=402A859FB7232676A2D2EDC016F65F5A8167A8EC&thid=OIP.10C4RzKFL0dv3-l7ZcvttQHaE8&mediaurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.d740b84732852f476fdfe97b65cbedb5%3Frik%3D7KhngVpf9hbA7Q%26riu%3Dhttp%253a%252f%252fwallpapercave.com%252fwp%252fF4dY3jx.jpg%26ehk%3DGTdJsJvgUOPQ8efUZsbUpmqIWPCjfXD6MquO9ck4mFM%253d%26risl%3D%26pid%3DImgRaw%26r%3D0&exph=1920&expw=2880&q=seattle&simid=608000205659576394&form=IRPRST&ck=7BCF10E3791F499895688E97663B34FA&selectedindex=3&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0&vt=0&sim=11
https://www.bing.com/images/search?view=detailV2&ccid=e4H%2F4q1N&id=D5FFF41533A0209A63D3CD502AFCFFB1848A2E1F&thid=OIP.e4H_4q1NsTBSgtiRrz6bBgHaE7&mediaurl=https%3A%2F%2Fa.cdn-hotels.com%2Fgdcs%2Fproduction92%2Fd1580%2F9a28fc70-9bea-11e8-a1b5-0242ac110053.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.7b81ffe2ad4db1305282d891af3e9b06%3Frik%3DHy6KhLH%252f%252fCpQzQ%26pid%3DImgRaw%26r%3D0&exph=1066&expw=1600&q=san+francisco&simid=607990859888159030&FORM=IRPRST&ck=7F4798D20875971C7F94D0BF521DCD4E&selectedIndex=3&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=Y9hhIYUl&id=A233B2F2415A3391D54862DD1CB88D62DB4096B4&thid=OIP.Y9hhIYUlZq2L24ws0EyTxwHaE8&mediaurl=https%3A%2F%2Fvegasexperience.com%2Fwp-content%2Fuploads%2F2023%2F01%2FPhoto-of-Las-Vegas-Downtown-1920x1280.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.63d86121852566ad8bdb8c2cd04c93c7%3Frik%3DtJZA22KNuBzdYg%26pid%3DImgRaw%26r%3D0&exph=1280&expw=1920&q=las+vegas&simid=608008701154111762&FORM=IRPRST&ck=144B35DB2E26C2B48374B185A18FD8A8&selectedIndex=2&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->


            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Air Canada, Alaska Airlines, United Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Vancouver (YVR) at 7:00 AM</p>
                <p><strong>Return Flight:</strong> Las Vegas (LAS) → Dublin (DUB) at 11:00 PM</p>
                <p><strong>Cost:</strong> €3,300 per person</p>
                <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. Meals not covered unless specified with * symbol.</p>

                
                
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="18">
                <input type="hidden" name="departureFlight" value="2025-07-01">
                <input type="hidden" name="returnFlight" value="2025-07-22">
                <button type="submit">July 01 - July 22, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="18">
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
                            ["title" => "🌲 Days 1-4: Vancouver, Canada", "details" => [
                                "Day 1: Arrival in Vancouver, Check-in: Fairmont Pacific Rim, Stroll along Canada Place, Dinner at Five Sails*.",
                                "Day 2: Visit Stanley Park, Granville Island, and Vancouver Aquarium. Dinner at Blue Water Café.",
                                "Day 3: Day Trip to Whistler - Scenic mountain views, hiking, gondola rides. Return to Vancouver, Dinner at Chambar*.",
                                "Day 4: Visit Capilano Suspension Bridge, Grouse Mountain Skyride. Dinner at The Keg Steakhouse & Bar*."
                            ]],
                            ["title" => "🌆 Days 5-7: Seattle, USA", "details" => [
                                "Day 5: Travel to Seattle, Check-in: The Four Seasons Hotel Seattle, Dinner at Canlis.",
                                "Day 6: Visit the Space Needle, Pike Place Market, Chihuly Garden and Glass. Dinner at The Pink Door*.",
                                "Day 7: Day Trip to Mount Rainier for hiking or scenic views. Return to Seattle, Dinner at Elliott’s Oyster House*."
                            ]],
                            ["title" => "🌵 Days 8-10: Phoenix, USA", "details" => [
                                "Day 8: Travel to Phoenix, Check-in: The Phoenician, Dinner at Steak 44*.",
                                "Day 9: Visit Desert Botanical Garden, Heard Museum, Taliesin West. Dinner at Kai Restaurant.",
                                "Day 10: Day Trip to Grand Canyon National Park. Return to Phoenix, Dinner at Pizzeria Bianco."
                            ]],
                            ["title" => "🌁 Days 11-14: San Francisco, USA", "details" => [
                                "Day 11: Travel to San Francisco, Check-in: The Ritz-Carlton San Francisco, Dinner at Scoma’s*.",
                                "Day 12: Visit Golden Gate Bridge, Alcatraz Island, Chinatown. Dinner at Gary Danko.",
                                "Day 13: Day Trip to Napa Valley for wine tours. Dinner at The French Laundry*.",
                                "Day 14: Explore Mission District, Lombard Street, Coit Tower. Dinner at Zuni Café."
                            ]],
                            ["title" => "🎬 Days 15-17: Los Angeles, USA", "details" => [
                                "Day 15: Travel to Los Angeles, Check-in: The Beverly Hills Hotel, Santa Monica Pier, Dinner at The Lobster*.",
                                "Day 16: Visit Hollywood Walk of Fame, Griffith Observatory, The Getty Center. Dinner at Providence.",
                                "Day 17: Day Trip to Malibu & Venice Beach. Return to LA, Dinner at Bestia*."
                            ]],
                            ["title" => "🎲 Days 18-21: Las Vegas, USA", "details" => [
                                "Day 18: Travel to Las Vegas, Check-in: The Venetian Resort, Dinner and Cirque du Soleil show*.",
                                "Day 19: Explore the Las Vegas Strip - Bellagio, Caesars Palace, Luxor. Dinner at Joël Robuchon.",
                                "Day 20: Day Trip to Hoover Dam & Lake Mead. Return to Las Vegas, Dinner at Mastro’s Steakhouse.",
                                "Day 21: Final day in Las Vegas, Shopping or pool relaxation. Farewell lunch at Sushi Kame."
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

