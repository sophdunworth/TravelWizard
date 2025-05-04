<?php include 'db.php';
$packagedestinationsID = ['PD038', 'PD039', 'PD040'];
$packageID = ['8'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>African Safari: Culture, Wildlife, and Coastal Wonders</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header1.php'; ?>

    <main>
        <section class="package">
            <h1>African Safari: Culture, Wildlife, and Coastal Wonders – 14 Days</h1>
            
            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/africa/africa1.png" alt="Safari Image 1">
                        <img src="images/africa/africa2.png" alt="Safari Image 2">
                        <img src="images/africa/africa3.png" alt="Safari Image 3">
                        <img src="images/africa/africa4.png" alt="Safari Image 4">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
<!-- Image Refs 
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qO622mDqayEIDA*ccid_7rbaYOpr&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=766+x+928+%c2%b7+75.23+kB+%c2%b7+png&sbifnm=africa1.png&thw=766&thh=928&ptime=41&dlen=102716&expw=545&exph=660&selectedindex=0&id=1805797453&ccid=7rbaYOpr&vt=2&sim=11            
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qLT6aYQmziEIeg*ccid_tPpphCbO&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=936+x+828+%c2%b7+71.08+kB+%c2%b7+png&sbifnm=africa2.png&thw=936&thh=828&ptime=47&dlen=97044&expw=637&exph=564&selectedindex=0&id=-1395594304&ccid=tPpphCbO&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHnHWLT4yCEIvQ*ccid_ecdYtPjI&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1026+x+728+%c2%b7+64.68+kB+%c2%b7+png&sbifnm=africa3.png&thw=1026&thh=728&ptime=35&dlen=88308&expw=712&exph=505&selectedindex=0&id=1192272014&ccid=ecdYtPjI&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RGYgim-TcCEIqxcxoNWLuD9SqbotqVTdP0Q&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1008+x+778+%C2%B7+40.16+kB+%C2%B7+png&sbifnm=africa4.png&thw=1008&thh=778&ptime=29&dlen=54836&expw=1008&exph=778
-->
                
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> South African Airways</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) - Cape Town (CPT) at 9:00 AM</p>
                    <p><strong>Return Flight:</strong> Durban (DUR) - Dublin (DUB) at 8:00 PM</p>
                    <p><strong>Cost:</strong> €6200 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included. </p>
                    <p>Meals not covered unless specified with * symbol.</p>
                    
                    
                    
                    <form action="login.php" method="POST">
                    <input type="hidden" name="package_id" value="8">
                    <input type="hidden" name="departureFlight" value="2025-06-01">
                    <input type="hidden" name="returnFlight" value="2025-06-14">
                    <button type="submit">June 01 - June 14, 2025</button>
                    </form>

                    <form action="login.php" method="POST">
                    <input type="hidden" name="package_id" value="8">
                    <input type="hidden" name="departureFlight" value="2025-09-01">
                    <input type="hidden" name="returnFlight" value="2025-09-14">
                    <button type="submit">September 01 - September 14, 2025</button>
                    </form>
                    </div>
                
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Day 1-4: Cape Town", "details" => [
                                "Day 1: Arrival, Table Mountain, Dinner at Nobu*.",
                                "Day 2: Cape Peninsula Tour, Visit Boulders Beach (penguins).",
                                "Day 3: Robben Island, V&A Waterfront exploration.",
                                "Day 4: Stellenbosch Winelands Tour."
                            ]],
                            ["title" => "📍 Day 5-9: Johannesburg & Safari", "details" => [
                                "Day 5: Flight to Johannesburg, Check-in: Saxon Hotel.",
                                "Day 6: Soweto Tour, Visit Nelson Mandela’s House.",
                                "Day 7: Cradle of Humankind, Sterkfontein Caves.",
                                "Day 8: Art Gallery, Constitution Hill, Evening Safari.",
                                "Day 9: Full-day Safari in Pilanesberg National Park."
                            ]],
                            ["title" => "📍 Day 10-14: Durban & Zululand", "details" => [
                                "Day 10: Flight to Durban, Check-in: The Oyster Box Hotel.",
                                "Day 11: Durban City Tour, Explore Golden Mile Beach.",
                                "Day 12: Relax at Umhlanga Rocks Beach.",
                                "Day 13: Safari in Zululand Game Reserve.",
                                "Day 14: Departure from Durban."
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

