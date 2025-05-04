
<?php
session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
$packagedestinationsID = ['PD021', 'PD022', 'PD023', 'PD024', 'PD025', 'PD026', 'PD027', 'PD028'];
$packageID = ['5'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon to Andes: A South American Adventure</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>🌎 Amazon to Andes: A South American Adventure – 28 Days</h1>

            <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/southamerica/southamerica1.png" alt="Bogotá, Colombia">
                    <img src="images/southamerica/southamerica2.png" alt="Rio de Janeiro, Brazil">
                    <img src="images/southamerica/southamerica3.png" alt="Machu Picchu, Peru">
                    <img src="images/southamerica/southamerica4.png" alt="Cancún, Mexico">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>
            
<!-- Image Carousel https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RCHJMCLksSEIqxcxoNWLuD9SqbotqVTdP0c&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=998+x+652+%C2%B7+97.17+kB+%C2%B7+png&sbifnm=southamerica1.png&thw=998&thh=652&ptime=58&dlen=132676&expw=998&exph=652
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qKt8-Qg2tyEIJA*ccid_q3z5CDa3&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=980+x+686+%c2%b7+46.80+kB+%c2%b7+png&sbifnm=southamerica2.png&thw=980&thh=686&ptime=47&dlen=63900&expw=717&exph=501&selectedindex=0&id=278079707&ccid=q3z5CDa3&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qBZ2lYQIEiEITg*ccid_FnaVhAgS&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1060+x+818+%c2%b7+56.85+kB+%c2%b7+png&sbifnm=southamerica3.png&thw=1060&thh=818&ptime=58&dlen=77620&expw=683&exph=527&selectedindex=0&id=-1438530326&ccid=FnaVhAgS&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qC9.2S.usiEIVA*ccid_L3%2FZL%2B6y&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=902+x+464+%c2%b7+52.53+kB+%c2%b7+png&sbifnm=southamerica4.png&thw=902&thh=464&ptime=48&dlen=71724&expw=836&exph=430&selectedindex=0&id=325209569&ccid=L3%2FZL%2B6y&vt=2&sim=11
-->


            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> LATAM Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Bogotá (BOG) - 8:00 AM</p>
                <p><strong>Return Flight:</strong> Cancún (CUN) → Dublin (DUB) - 7:30 PM</p>
                <p><strong>Cost:</strong> €4,800 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
                
                
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="5">
                <input type="hidden" name="departureFlight" value="2025-07-01">
                <input type="hidden" name="returnFlight" value="2025-07-29">
                <button type="submit">July 01 - July 29, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="5">
                <input type="hidden" name="departureFlight" value="2025-09-01">
                <input type="hidden" name="returnFlight" value="2025-09-29">
                <button type="submit">September 01 - September 29, 2025</button>
                </form>
            </div>
        </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🇨🇴 Days 1-4: Colombia (Bogotá & Medellín)", "details" => [
                                "Day 1: Arrival in Bogotá, Check-in: Hotel de la Opera, Dinner at Andrés Carne de Res*.",
                                "Day 2: Visit Gold Museum, Botero Museum, Monserrate Hill, Dinner at Leo Restaurante.",
                                "Day 3: Travel to Medellín, Check-in: The Charlee Hotel, Dinner at El Cielo.",
                                "Day 4: Explore Plaza Botero, Comuna 13, Arví Park, Nightlife in Poblado district."
                            ]],
                            ["title" => "🇧🇷 Days 8-11: Brazil (Rio de Janeiro & Iguazu Falls)", "details" => [
                                "Day 8: Travel to Rio, Check-in: Belmond Copacabana Palace, Dinner at Oro*.",
                                "Day 9: Visit Christ the Redeemer, Sugarloaf Mountain, Selarón Steps, Dinner at Aprazível.",
                                "Day 10: Travel to Iguazu Falls, Check-in: Hotel das Cataratas, Relax at hotel.",
                                "Day 11: Explore Iguazu Falls National Park, Dinner at La Pérgola*."
                            ]],
                            ["title" => "🇦🇷 Days 12-14: Argentina (Buenos Aires & Mendoza)", "details" => [
                                "Day 12: Travel to Buenos Aires, Check-in: Alvear Palace Hotel, Dinner at Don Julio*.",
                                "Day 13: Visit Plaza de Mayo, La Boca, Recoleta Cemetery, Dinner & tango show at Rojo Tango.",
                                "Day 14: Travel to Mendoza, Check-in: Park Hyatt Mendoza, Wine tasting dinner at Bodega Catena Zapata*."
                            ]],
                            ["title" => "🇵🇪 Days 15-18: Peru (Lima & Cusco)", "details" => [
                                "Day 15: Travel to Lima, Check-in: Belmond Miraflores Park, Dinner at Central.",
                                "Day 16: Visit Plaza Mayor, Lima Cathedral, Larco Museum, Dinner at Maido.",
                                "Day 17: Travel to Cusco, Check-in: Belmond Hotel Monasterio, Relax with coca tea.",
                                "Day 18: Sacred Valley Tour: Pisac, Ollantaytambo, Moray ruins, Dinner at Chicha*."
                            ]],
                            ["title" => "🇨🇷 Days 22-24: Costa Rica (San José & Arenal)", "details" => [
                                "Day 22: Travel to San José, Check-in: Grano de Oro Hotel, Dinner at Restaurante Silvestre.",
                                "Day 23: Visit Arenal Volcano, Enjoy hot springs, Dinner at La Fortuna*.",
                                "Day 24: Day trip to Monteverde Cloud Forest, Return to San José."
                            ]],
                            ["title" => "🇲🇽 Days 25-28: Mexico (Mexico City & Riviera Maya)", "details" => [
                                "Day 25: Travel to Mexico City, Check-in: Four Seasons Hotel, Dinner at Pujol*.",
                                "Day 26: Visit Zócalo, Chapultepec Castle, National Museum of Anthropology, Dinner at Quintonil.",
                                "Day 27: Travel to Riviera Maya, Check-in: Rosewood Mayakoba, Dinner at Agave Azul*.",
                                "Day 28: Visit Tulum, Explore cenotes and beaches, Final lunch at Casa de los Suenos before departure."
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
