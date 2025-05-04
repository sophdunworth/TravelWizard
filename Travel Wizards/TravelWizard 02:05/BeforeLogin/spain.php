
<?php include 'db.php';
$packagedestinationsID = ['PD015', 'PD016', 'PD017', 'PD018', 'PD019', 'PD020'];
$packageID = ['4'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costa del Sol & Beyond: A Spanish Dream</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header1.php'; ?>

    <main>
        <section class="package">
            <h1>🌞 Costa del Sol & Beyond: A Spanish Dream – 21 Days</h1>

            <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/spain/spain1.png" alt="Madrid, Spain">
                    <img src="images/spain/spain2.png" alt="Barcelona, Spain">
                    <img src="images/spain/spain3.png" alt="Valencia, Spain">
                    <img src="images/spain/spain4.png" alt="Alicante, Spain">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qKEkiOF2USEIbw*ccid_oSSI4XZR&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1092+x+868+%c2%b7+53.42+kB+%c2%b7+png&sbifnm=spain1.png&thw=1092&thh=868&ptime=63&dlen=72936&expw=672&exph=534&selectedindex=0&id=1443386198&ccid=oSSI4XZR&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qMwo0iXk1SEItw*ccid_zCjSJeTV&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1032+x+822+%c2%b7+66.64+kB+%c2%b7+png&sbifnm=spain2.png&thw=1032&thh=822&ptime=65&dlen=90988&expw=672&exph=535&selectedindex=0&id=-876466248&ccid=zCjSJeTV&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qFqcG1dtbiEIow*ccid_WpwbV21u&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1096+x+694+%c2%b7+86.37+kB+%c2%b7+png&sbifnm=spain3.png&thw=1096&thh=694&ptime=49&dlen=117924&expw=754&exph=477&selectedindex=0&id=-1524865178&ccid=WpwbV21u&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qNOyOof4FyEIIg*ccid_07I6h%2FgX&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1034+x+792+%c2%b7+70.27+kB+%c2%b7+png&sbifnm=spain4.png&thw=1034&thh=792&ptime=62&dlen=95944&expw=685&exph=525&selectedindex=0&id=1191649580&ccid=07I6h%2FgX&vt=2&sim=11
-->

            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Iberia</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Madrid (MAD) - 10:00 AM</p>
                <p><strong>Return Flight:</strong> Palma de Mallorca (PMI) → Dublin (DUB) - 9:00 PM</p>
                <p><strong>Cost:</strong> €2,250 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
            
                
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="4">
                <input type="hidden" name="departureFlight" value="2025-06-10">
                <input type="hidden" name="returnFlight" value="2025-07-01">
                <button type="submit">June 10 - July 01, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="4">
                <input type="hidden" name="departureFlight" value="2025-08-10">
                <input type="hidden" name="returnFlight" value="2025-08-31">
                <button type="submit">August 10 - August 31, 2025</button>
                </form>
            </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🇪🇸 Days 1-4: Madrid", "details" => [
                                "Day 1: Arrival in Madrid, Check-in: The Westin Palace, Madrid, Dinner at Sobrino de Botín*.",
                                "Day 2: Visit Prado Museum, Reina Sofia Museum, Retiro Park, and Almudena Cathedral. Dinner at Casa Lucio.",
                                "Day 3: Explore Royal Palace of Madrid, Plaza Mayor, and shop in Gran Vía. Tapas at El Club Allard*.",
                                "Day 4: Day trip to Toledo. Return to Madrid for the evening."
                            ]],
                            ["title" => "🇪🇸 Days 5-8: Barcelona", "details" => [
                                "Day 5: Travel to Barcelona, Check-in: Majestic Hotel & Spa. Stroll La Rambla. Dinner at Cervecería Catalana.",
                                "Day 6: Visit La Sagrada Família, Park Güell, Casa Batlló. Dinner at Lasarte*.",
                                "Day 7: Explore Gothic Quarter, Barcelona Cathedral, and relax at Barceloneta Beach. Dinner at Tapeo*.",
                                "Day 8: Cable car to Montjuïc, visit Poble Espanyol. Dinner at Cinc Sentits."
                            ]],
                            ["title" => "🇪🇸 Days 9-11: Valencia", "details" => [
                                "Day 9: Travel to Valencia, Check-in: The Westin Valencia. Explore Plaza del Ayuntamiento. Dinner at La Pepica.",
                                "Day 10: Visit City of Arts & Sciences, Oceanografic Aquarium, and Museo de las Ciencias. Dinner at Casa Carmela.",
                                "Day 11: Visit Central Market, Valencia Cathedral, and La Lonja de la Seda. Dinner in Ruzafa district."
                            ]],
                            ["title" => "🇪🇸 Days 12-14: Alicante", "details" => [
                                "Day 12: Travel to Alicante, Check-in: Meliá Alicante. Relax at the beach. Dinner at El Portal.",
                                "Day 13: Visit Santa Bárbara Castle, Alicante Old Town. Dinner at Restaurante Dársena.",
                                "Day 14: Beach day at Postiguet Beach, explore Explanada de España. Dinner at La Taberna del Gourmet*."
                            ]],
                            ["title" => "🇪🇸 Days 15-17: Malaga", "details" => [
                                "Day 15: Travel to Malaga, Check-in: Gran Hotel Miramar. Explore Malaga Port. Dinner at Restaurante José Carlos García*.",
                                "Day 16: Visit Alcazaba, Roman Theatre, and Malaga Cathedral. Enjoy tapas in Soho district.",
                                "Day 17: Visit Picasso Museum, relax at Malagueta Beach. Dinner at El Pimpi*."
                            ]],
                            ["title" => "🇪🇸 Days 18-21: Palma de Mallorca", "details" => [
                                "Day 18: Travel to Palma de Mallorca, Check-in: Hotel Nixe Palace. Relax at Cala Mayor Beach. Dinner at Marc Fosh.",
                                "Day 19: Visit Palma Cathedral, explore Old Town. Dinner at Es Baluard Restaurant*.",
                                "Day 20: Visit Bellver Castle, beach day at Cala d’Or. Dinner at Can Carlos.",
                                "Day 21: Final morning at Mercat de l’Olivar. Departure to the airport."
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

