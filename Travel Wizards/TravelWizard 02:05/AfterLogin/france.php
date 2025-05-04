
<?php

session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php';
$packagedestinationsID = ['PD010', 'PD011', 'PD012','PD013', 'PD014'];
$packageID = ['3'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C’est la vie dans France</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>C’est la Vie dans France – 15 Days</h1>

            <div class="trip-details">
                <!-- Image Carousel -->
                <div class="carousel-container">
                    <button class="carousel-button prev">&#10094;</button>
                    <div class="carousel">
                        <img src="images/paris/paris1.png" alt="France">
                        <img src="images/paris/paris2.png" alt="France">
                        <img src="images/paris/paris3.png" alt="France">
                        <img src="images/paris/paris4.png" alt="France">
                    </div>
                    <button class="carousel-button next">&#10095;</button>
                </div>
                
<!-- Image Refs
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qL-fk6QPmSEIHg*ccid_v5%2BTpA%2BZ&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1110+x+746+%c2%b7+51.06+kB+%c2%b7+png&sbifnm=paris1.png&thw=1110&thh=746&ptime=64&dlen=69716&expw=731&exph=491&selectedindex=0&id=1017904512&ccid=v5%2BTpA%2BZ&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qPPcp-YqXyEI4Q*ccid_89yn5ipf&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1102+x+772+%c2%b7+48.66+kB+%c2%b7+png&sbifnm=paris2.png&thw=1102&thh=772&ptime=48&dlen=66436&expw=716&exph=502&selectedindex=0&id=-135658860&ccid=89yn5ipf&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RF7Td7G-zCEIqxcxoNWLuD9SqbotqVTdP6I&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1080+x+778+%C2%B7+67.44+kB+%C2%B7+png&sbifnm=paris3.png&thw=1080&thh=778&ptime=58&dlen=92080&expw=1080&exph=778
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qB0gKGJoAyEImQ*ccid_HSAoYmgD&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1124+x+776+%c2%b7+90.39+kB+%c2%b7+png&sbifnm=paris4.png&thw=1124&thh=776&ptime=63&dlen=123408&expw=722&exph=498&selectedindex=0&id=-193989090&ccid=HSAoYmgD&vt=2&sim=11
-->
                <!-- Trip Details -->
                <div class="info">
                    <h2>Trip Details</h2>
                    <p><strong>Airline:</strong> Air France</p>
                    <p><strong>Departure Flight:</strong> Dublin (DUB) → Paris (CDG) at 9:00 AM</p>
                    <p><strong>Return Flight:</strong> Nice (NCE) → Dublin (DUB) at 8:30 PM</p>
                    <p><strong>Cost:</strong> €1,800 per person</p>
                    <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. Meals not covered unless specified with * symbol.</p>

                    
                    
                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="3">
                    <input type="hidden" name="departureFlight" value="2025-05-10">
                    <input type="hidden" name="returnFlight" value="2025-05-29">
                    <button type="submit">May 15 - May 29, 2025</button>
                    </form>

                    <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="3">
                    <input type="hidden" name="departureFlight" value="2025-09-15">
                    <input type="hidden" name="returnFlight" value="2025-09-30">
                    <button type="submit">September 15 - September 30, 2025</button>
                    </form>
                </div>
            </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "📍 Days 1-4: Paris", "details" => [
                                "Day 1: Arrival in Paris, Check-in: Le Meurice, Stroll along the Champs-Élysées, Dinner at Le Jules Verne*.",
                                "Day 2: Visit Louvre Museum, Notre-Dame Cathedral, Montmartre, Dinner at Le Comptoir du Relais.",
                                "Day 3: Visit Palace of Versailles, Musée d'Orsay, Seine river cruise, Dinner at Le Cinq*.",
                                "Day 4: Shopping at Galeries Lafayette & Le Marais, Dinner at L'Avenue."
                            ]],
                            ["title" => "📍 Days 5-7: Lyon", "details" => [
                                "Day 5: Travel to Lyon by train, Check-in: Villa Florentine, Explore Vieux Lyon, Dinner at Restaurant Paul Bocuse.",
                                "Day 6: Visit Basilica of Notre-Dame de Fourvière, Lyon’s Traboules, Musée des Confluences, Dinner at Les Trois Dômes*.",
                                "Day 7: Day trip to Beaujolais wine region, Wine tasting, Dinner at Le Gourmet de Sèze."
                            ]],
                            ["title" => "📍 Days 8-10: Bordeaux", "details" => [
                                "Day 8: Travel to Bordeaux by train, Check-in: Les Sources de Caudalie, Visit Place de la Bourse, Dinner at Le Pressoir d'Argent.",
                                "Day 9: Visit La Cité du Vin, Bordeaux National Opera, Dinner at Le Quatrième Mur*.",
                                "Day 10: Wine tour in Saint-Émilion, Dinner at Le Chapon Fin."
                            ]],
                            ["title" => "📍 Days 11-13: Marseille", "details" => [
                                "Day 11: Travel to Marseille by train, Check-in: InterContinental Marseille - Hotel Dieu, Dinner at Le Petit Nice Passedat*.",
                                "Day 12: Visit Basilica of Notre-Dame de la Garde, MuCEM, Le Panier, Dinner at Une Table au Sud.",
                                "Day 13: Boat trip to Cassis & Calanques National Park, Dinner at La Table de l'Olivier*."
                            ]],
                            ["title" => "📍 Days 14-15: Monaco", "details" => [
                                "Day 14: Travel to Monaco, Check-in: Hotel de Paris Monte-Carlo, Dinner at Le Louis XV - Alain Ducasse*.",
                                "Day 15: Visit Prince's Palace, Oceanographic Museum, Casino de Monte-Carlo, Departure."
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

