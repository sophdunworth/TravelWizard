<?php 
// Start the session if it hasn't already been started
session_start();

// Protect the page so only logged-in users can access it
require_once '../BeforeLogin/auth.php'; 
include 'db.php'; 

// Destination IDs and package IDs 
$packagedestinationsID = ['PD105', 'PD106', 'PD107','PD108','PD109', 'PD110', 'PD111','PD112','PD113', 'PD114', 'PD115'];
$packageID = ['19'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caribbean Bliss: Sun, Sand & Serenity - 28 Days</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>Caribbean Bliss: Sun, Sand & Serenity - 28 Days</h1>
            
            <div class="trip-details">
            <!-- Image Carousel  -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button> 
                <div class="carousel">
                    <!-- Images for the carousel -->
                    <img src="images/carribean/carribean1.png" alt="Caribbean Adventure 1">
                    <img src="images/carribean/carribean2.png" alt="Caribbean Adventure 2">
                    <img src="images/carribean/carribean3.png" alt="Caribbean Adventure 3">
                    <img src="images/carribean/carribean4.png" alt="Caribbean Adventure 4">
                </div>
                <button class="carousel-button next">&#10095;</button> 
            </div>
            
            <!-- Image Refs
https://www.bing.com/images/search?view=detailV2&ccid=g3n8BNhZ&id=4EA20E22F27E15C80F5D4A328B02D4B85AB4DD1E&thid=OIP.g3n8BNhZ2aUDVPQJ9NDAbwHaE9&mediaurl=https%3A%2F%2Fwww.sandals.com%2Fblog%2Fcontent%2Fimages%2F2021%2F02%2FBNG_Long-Beach-from-Watersports-121-edit.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.8379fc04d859d9a50354f409f4d0c06f%3Frik%3DHt20WrjUAosySg%26pid%3DImgRaw%26r%3D0&exph=1205&expw=1800&q=Seven+Mile+Beach+Jamaica&simid=608031219666131407&FORM=IRPRST&ck=C0925E99359FC3F1598AB86A56A38762&selectedIndex=4&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailV2&ccid=PklF4f9L&id=4CD1BF30F4F26D6A0BC39B07870BAB56A1CA5293&thid=OIP.PklF4f9LNcdefrlLV6QfnwHaE8&mediaurl=https%3A%2F%2Fexpertvagabond.com%2Fwp-content%2Fuploads%2Fhavana-cuba-capitol-building.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.3e4945e1ff4b35c75e7eb94b57a41f9f%3Frik%3Dk1LKoVarC4cHmw%26pid%3DImgRaw%26r%3D0&exph=854&expw=1280&q=havana+cuba&simid=608031610505402652&FORM=IRPRST&ck=749832CF5B37F3733E2728382BB66F77&selectedIndex=7&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
https://www.bing.com/images/search?view=detailv2&iss=sbi&form=SBIIRP&sbisrc=ImgDropper&q=imgurl:https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FOIP.h_aMjL-KIa02F_YkBUqldQHaEK%3Fw%3D321%26h%3D181%26c%3D7%26r%3D0%26o%3D5%26dpr%3D2%26pid%3D1.7&idpbck=1&selectedindex=0&id=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FOIP.h_aMjL-KIa02F_YkBUqldQHaEK%3Fw%3D321%26h%3D181%26c%3D7%26r%3D0%26o%3D5%26dpr%3D2%26pid%3D1.7&ccid=0xK%2FL5WU&mediaurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FOIP.h_aMjL-KIa02F_YkBUqldQHaEK%3Fw%3D321%26h%3D181%26c%3D7%26r%3D0%26o%3D5%26dpr%3D2%26pid%3D1.7&exph=266&expw=472&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&ccid=QIgj9Xk2&id=2F3EB8FE8EBA05AA6E4D93EF05F1A86A4C5B84EB&thid=OIP.QIgj9Xk2L8fCQLzKpwvH_AHaFj&mediaurl=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fe6%2F4a%2F85%2Fe64a8532809c69c13e796bcec98851b4.jpg&cdnurl=https%3A%2F%2Fth.bing.com%2Fth%2Fid%2FR.408823f579362fc7c240bccaa70bc7fc%3Frik%3D64RbTGqo8QXvkw%26pid%3DImgRaw%26r%3D0&exph=1440&expw=1920&q=st+lucia+island&simid=608013176498094491&FORM=IRPRST&ck=3C8C350435CAD10711A02684F14BD8C3&selectedIndex=3&itb=0&cw=642&ch=660&ajaxhist=0&ajaxserp=0
-->

            <!-- Trip Details Section -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> American Airlines, JetBlue, Caribbean Airlines</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Miami (MIA) → Montego Bay (MBJ) at 9:00 AM</p>
                <p><strong>Return Flight:</strong> Port of Spain (POS) → Miami (MIA) → Dublin (DUB) at 6:00 PM</p>
                <p><strong>Cost:</strong> €4,700 per person</p>
                <p><strong>Extra Info:</strong> All activities, accommodation, and transport listed are included.</p>
                <p>Meals not covered unless specified with * symbol.</p>

                <!-- Forms for booking the trip for different dates -->
                <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="19">
                    <input type="hidden" name="departureFlight" value="2025-05-01">
                    <input type="hidden" name="returnFlight" value="2025-05-28">
                    <button type="submit">May 01 - May 28, 2025</button> 
                </form>

                <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="19">
                    <input type="hidden" name="departureFlight" value="2025-08-01">
                    <input type="hidden" name="returnFlight" value="2025-08-29">
                    <button type="submit">August 01 - August 29, 2025</button> 
                </form>
            </div>
        </div>

            <!-- Trip Itinerary Section -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>
                <!-- Accordion for showing trip details by destination -->
                <div class="accordion">
                    <?php
                        // Array with trip details for different destinations
                        $destinations = [
                            ["title" => "📍 Days 1-3: Jamaica", "details" => [
                                "Day 1: Arrival in Montego Bay, Check-in: Half Moon Resort, Relax at the beach and pools.",
                                "Day 2: Day trip to Negril, Seven Mile Beach. Dinner at The Sugar Mill*.",
                                "Day 3: Visit Rose Hall Great House & Dunn’s River Falls. Evening relaxation."
                            ]],
                            ["title" => "📍 Days 4-6: Cuba", "details" => [
                                "Day 4: Travel to Havana, Check-in: Gran Hotel Manzana Kempinski, Explore Old Havana, Dinner at La Guarida*.",
                                "Day 5: Varadero Beach day trip for relaxation and water activities.",
                                "Day 6: Visit Plaza Vieja, Havana Cathedral, El Capitolio. Evening at Tropicana Club."
                            ]],
                            ["title" => "📍 Days 7-10: Puerto Rico", "details" => [
                                "Day 7: Travel to San Juan, Check-in: Condado Vanderbilt Hotel.",
                                "Day 8: El Yunque Rainforest hike and adventure.",
                                "Day 9: Beach day at Isla Verde, Dinner at La Placita de Santurce*.",
                                "Day 10: Visit Ponce, tour Plaza Las Delicias."
                            ]],
                            ["title" => "📍 Days 11-14: Dominican Republic", "details" => [
                                "Day 11: Travel to Punta Cana, Check-in: Eden Roc Cap Cana.",
                                "Day 12: Day trip to Santo Domingo, explore Colonial Zone.",
                                "Day 13: Bavaro Beach day and water activities.",
                                "Day 14: Visit Indigenous Eyes Ecological Park."
                            ]],
                            ["title" => "📍 Days 15-17: Turks and Caicos", "details" => [
                                "Day 15: Travel to Providenciales, Check-in: Amanyara Resort.",
                                "Day 16: Explore Grace Bay, Visit the Turks and Caicos Conch Farm.",
                                "Day 17: Full-day snorkeling and sailing trip."
                            ]],
                            ["title" => "📍 Days 18-20: Bahamas", "details" => [
                                "Day 18: Travel to Nassau, Check-in: Atlantis Paradise Island.",
                                "Day 19: Exuma Islands day trip, snorkeling with pigs.",
                                "Day 20: Explore Nassau, visit Pirates Museum, Blue Hole."
                            ]],
                            ["title" => "📍 Days 21-23: Saint Lucia", "details" => [
                                "Day 21: Travel to Castries, Check-in: Sugar Beach Resort.",
                                "Day 22: Day trip to Pitons, Sulphur Springs, Diamond Falls.",
                                "Day 23: Snorkeling and paddleboarding at Sugar Beach."
                            ]],
                            ["title" => "📍 Days 24-26: Barbados", "details" => [
                                "Day 24: Travel to Bridgetown, Check-in: Sandy Lane Hotel.",
                                "Day 25: Visit Harrison’s Cave, Barbados Wildlife Reserve.",
                                "Day 26: Beach day at Carlisle Bay, Evening at Oistins Fish Fry."
                            ]],
                            ["title" => "📍 Days 27-28: Trinidad and Tobago", "details" => [
                                "Day 27: Travel to Port of Spain, Check-in: Hyatt Centric.",
                                "Day 28: Visit Pigeon Point Beach, Enjoy final moments in paradise."
                            ]]
                        ];
                    ?>

                    <!-- Loop through the destinations and display each as an accordion item -->
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


