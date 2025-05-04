
<?php include 'db.php'; 
$packagedestinationsID = ['PD032', 'PD033', 'PD034', 'PD035', 'PD036', 'PD037'];
$packageID = ['7'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Land Down Under: From the Outback to Kiwi Wonders</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
</head>
<body>
    <?php include 'templates/header1.php'; ?>

    <main>
        <section class="package">
            <h1>The Land Down Under: From the Outback to Kiwi Wonders – 15 Days</h1>
            
            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/australia/australia1.png" alt="Australia Image 1">
                        <img src="images/australia/australia2.png" alt="Australia Image 2">
                        <img src="images/australia/australia3.png" alt="Australia Image 3">
                        <img src="images/australia/australia4.png" alt="Australia Image 4">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
                
<!-- Image Refs
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qOUVbLq5aiEIhQ*ccid_5RVsurlq&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1130+x+786+%c2%b7+56.87+kB+%c2%b7+png&sbifnm=australia1.png&thw=1130&thh=786&ptime=60&dlen=77644&expw=719&exph=500&selectedindex=0&id=-1757434156&ccid=5RVsurlq&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHPpLHNTrCEIEg*ccid_c%2Bksc1Os&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1046+x+840+%c2%b7+63.76+kB+%c2%b7+png&sbifnm=australia2.png&thw=1046&thh=840&ptime=68&dlen=87048&expw=669&exph=537&selectedindex=0&id=-191779359&ccid=c%2Bksc1Os&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qHmNTucuASEI4w*ccid_eY1O5y4B&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=912+x+608+%c2%b7+40.43+kB+%c2%b7+png&sbifnm=australia3.png&thw=912&thh=608&ptime=44&dlen=55204&expw=734&exph=489&selectedindex=0&id=1595777411&ccid=eY1O5y4B&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RKPFsimI2CEIqxcxoNWLuD9SqbotqVTdP3c&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1070+x+810+%c2%b7+71.53+kB+%c2%b7+png&sbifnm=australia4.png&thw=1070&thh=810&ptime=44&dlen=97664&expw=1070&exph=810
-->
                
                
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Qantas</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) - London (LON) - Sydney (SYD) at 10:00 AM</p>
                    <p><strong>Return Flight:</strong> Queenstown (ZQN) - London (LON) - Dublin (DUB) at 7:00 PM</p>
                    <p><strong>Cost:</strong> €4500 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included. Meals not covered unless specified with * symbol.</p>

                    
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="7">
                    <input type="hidden" name="departureFlight" value="2025-05-15">
                    <input type="hidden" name="returnFlight" value="2025-05-30">
                    <button type="submit">May 15 - May 30, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="7">
                    <input type="hidden" name="departureFlight" value="2025-08-10">
                    <input type="hidden" name="returnFlight" value="2025-08-25">
                    <button type="submit">August 10 - August 25, 2025</button>
                    </form>
                
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Day 1-7: Australia (Sydney, Uluru, Great Barrier Reef)", "details" => [
                                "Day 1: Arrival in Sydney, Check-in: The Langham, Sydney, Explore Circular Quay.",
                                "Day 2: Sydney Opera House tour, Harbour Cruise, Dinner at Quay Restaurant*.",
                                "Day 3: Bondi Beach, Coastal Walk to Coogee Beach, Relax at The Langham.",
                                "Day 4: Flight to Uluru, Check-in: Sails in the Desert, Sunset at Uluru, Dinner at Tali Restaurant*.",
                                "Day 5: Visit Uluru & Kata Tjuta, Mala Walk, Stargazing experience.",
                                "Day 6: Flight to Cairns, Check-in: Shangri-La Hotel, Relax at Marina Mirage.",
                                "Day 7: Great Barrier Reef Tour, Snorkeling or Scuba Diving, Return to Cairns."
                            ]],
                            ["title" => "📍 Day 8-15: New Zealand (Auckland, Rotorua, Queenstown)", "details" => [
                                "Day 8: Flight to Auckland, Check-in: SKYCITY Grand Hotel, Explore Viaduct Harbour.",
                                "Day 9: Auckland City Tour, Visit Sky Tower & Auckland Museum, Dinner at The Federal Delicatessen*.",
                                "Day 10: Travel to Rotorua, Check-in: Polynesian Spa Resort, Relax in hot mineral pools.",
                                "Day 11: Visit Te Puia, Geothermal geysers, Maori cultural experience, Hangi feast*.",
                                "Day 12: Flight to Queenstown, Check-in: The Rees Hotel, Explore waterfront, Dinner at Rata Restaurant*.",
                                "Day 13: Milford Sound tour, Boat cruise, Return to Queenstown.",
                                "Day 14: Adventure Day, Shotover Jet, Bungee Jumping, Skyline Gondola ride.",
                                "Day 15: Departure."
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

