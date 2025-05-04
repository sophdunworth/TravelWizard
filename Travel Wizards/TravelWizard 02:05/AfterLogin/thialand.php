
<?php
session_start();

// Protect page for logged-in users only
require_once '../BeforeLogin/auth.php';
include 'db.php'; 
$packagedestinationsID = ['PD060', 'PD061', 'PD062', 'PD063', 'PD064', 'PD065', 'PD066'];
$packageID = ['12', '11'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sun, Spice & Serenity: Southeast Asia Uncovered</title>
    <link rel="stylesheet" href="css/Trips.css">
    <script defer src="js/TripScript.js"></script>
    <script defer src="js/Accordion.js"></script>
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <section class="package">
            <h1>☀️ Sun, Spice & Serenity: Southeast Asia Uncovered - 18 Days</h1>

            <div class="trip-details">
            <!-- Image Carousel -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <img src="images/thialand/thialand1.png" alt="Thailand Adventure">
                    <img src="images/thialand/thialand2.png" alt="Vietnam Scenery">
                    <img src="images/thialand/thialand3.png" alt="Malaysia Highlights">
                    <img src="images/thialand/thialand4.png" alt="Bali Beach">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>
            
<!-- Image Carousel 
https://www.bing.com/images/search?view=detailV2&insightsToken=bcid_RLkzBkiSZSEIqxcxoNWLuD9SqbotqVTdP94&FORM=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1156+x+756+%C2%B7+58.31+kB+%C2%B7+png&sbifnm=thialand1.png&thw=1156&thh=756&ptime=39&dlen=79612&expw=1156&exph=756
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qBZN9S22cyEIBw*ccid_Fk31LbZz&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=620+x+930+%c2%b7+50.85+kB+%c2%b7+png&sbifnm=thialand2.png&thw=620&thh=930&ptime=47&dlen=69428&expw=489&exph=734&selectedindex=0&id=385031139&ccid=Fk31LbZz&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qEQRELGQviEI3g*ccid_RBEQsZC%2B&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1120+x+784+%c2%b7+124.54+kB+%c2%b7+png&sbifnm=thialand3.png&thw=1120&thh=784&ptime=76&dlen=170040&expw=717&exph=501&selectedindex=0&id=1334453544&ccid=RBEQsZC%2B&vt=2&sim=11
https://www.bing.com/images/search?view=detailV2&insightstoken=bcid_qOxHvl2Q7CEIeQ*ccid_7Ee%2BXZDs&form=SBIIDP&iss=SBIUPLOADGET&sbisrc=ImgDropper&idpbck=1&sbifsz=1160+x+794+%c2%b7+62.12+kB+%c2%b7+png&sbifnm=thialand4.png&thw=1160&thh=794&ptime=64&dlen=84808&expw=725&exph=496&selectedindex=0&id=-1220957217&ccid=7Ee%2BXZDs&vt=2&sim=11
-->


            <!-- Trip Details -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Various Southeast Asian Carriers</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) → Bangkok (BKK) - 10:00 AM</p>
                <p><strong>Return Flight:</strong> Jakarta (CGK) → Dublin (DUB) - 10:00 PM</p>
                <p><strong>Cost:</strong> €3,750 per person</p>
                <p><strong>Extra Info:</strong> Includes accommodation, transport & activities. Meals not covered unless specified (*).</p>

                <!-- Booking Button -->
              
                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="12">
                <input type="hidden" name="departureFlight" value="2025-07-05">
                <input type="hidden" name="returnFlight" value="2025-07-23">
                <button type="submit">July 05 - July 23, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                <input type="hidden" name="package_id" value="12">
                <input type="hidden" name="departureFlight" value="2025-09-5">
                <input type="hidden" name="returnFlight" value="2025-09-23">
                <button type="submit">September 05 - September 23, 2025</button>
                </form>
            </div>
        </div>

            <!-- Itinerary Accordion -->
            <div class="trip-itinerary">
                <h2>📍 Itinerary</h2>
                <div class="accordion">
                    <?php
                        $destinations = [
                            ["title" => "🇹🇭 Days 1-4: Thailand (Bangkok & Chiang Mai)", "details" => [
                                "Day 1: Arrival in Bangkok, Check-in: Mandarin Oriental Bangkok, Explore Grand Palace, Wat Pho, and enjoy a dinner cruise on the Chao Phraya River*.",
                                "Day 2: Visit Chatuchak Market, tour Jim Thompson House, relax at Lumphini Park, and dine at Sirocco for a sky-high dining experience*.",
                                "Day 3: Travel to Chiang Mai, Check-in: Four Seasons Resort Chiang Mai, Visit Doi Suthep Temple, explore Old City temples, and visit the Night Bazaar.",
                                "Day 4: Take a cooking class at Baipai Thai Cooking School, visit Elephant Nature Park, and enjoy a traditional Khantoke dinner*."
                            ]],
                            ["title" => "🇻🇳 Days 5-7: Vietnam (Hanoi & Halong Bay)", "details" => [
                                "Day 5: Travel to Hanoi, Check-in: Sofitel Legend Metropole Hanoi, Visit Hoan Kiem Lake, explore Old Quarter, and see Ho Chi Minh Mausoleum.",
                                "Day 6: Explore Temple of Literature, visit the Vietnam Museum of Ethnology, and enjoy Vietnamese street food at Bún Chả. Dine at La Verticale for French-Vietnamese fusion cuisine*.",
                                "Day 7: Take a day trip to Halong Bay, enjoy a cruise around limestone islands, and go kayaking or swimming. Return to Hanoi for dinner at The Gourmet Corner*."
                            ]],
                            ["title" => "🇲🇾 Days 8-10: Malaysia (Kuala Lumpur)", "details" => [
                                "Day 8: Travel to Kuala Lumpur, Check-in: The St. Regis Kuala Lumpur, Visit Petronas Twin Towers, explore Merdeka Square, and shop in Bukit Bintang.",
                                "Day 9: Explore the Batu Caves, visit Islamic Arts Museum, and stroll through KL Bird Park. Dine at Marini’s on 57 for panoramic views and fine dining*.",
                                "Day 10: Take a day trip to Malacca, visit the Stadthuys, A Famosa fort, and explore Jonker Street. Return to Kuala Lumpur for dinner at Jalan Alor Night Market."
                            ]],
                            ["title" => "🇮🇩 Days 11-14: Indonesia (Bali)", "details" => [
                                "Day 11: Travel to Bali, Check-in: The Mulia, Nusa Dua, Relax on Nusa Dua Beach, visit Uluwatu Temple, and enjoy a Kecak dance performance.",
                                "Day 12: Visit the Sacred Monkey Forest Sanctuary in Ubud, walk through Tegallalang Rice Terrace, and shop in Ubud Market. Enjoy dinner at Mozaic in Ubud*.",
                                "Day 13: Visit Besakih Temple, explore Tirta Empul for a spiritual experience, and relax at Sanur Beach. Dine at The Legian Bali for a beachfront dinner*.",
                                "Day 14: Take a boat trip to Nusa Penida, explore stunning beaches like Keling King Beach and Broken Beach. Return to Bali and dine at Bumbu Bali."
                            ]],
                            ["title" => "🇮🇩 Days 15-18: Indonesia (Jakarta)", "details" => [
                                "Day 15: Travel to Jakarta, Check-in: The Ritz-Carlton Jakarta, Explore National Monument (Monas), visit Istiqlal Mosque, and check out Taman Mini Indonesia Indah.",
                                "Day 16: Visit Kota Tua (Old Town), explore National Museum of Indonesia, and stroll through Ancol Dreamland. Dine at Henshin, a rooftop restaurant with great city views.",
                                "Day 17: Take a day trip to Bogor, visit the Botanical Gardens, explore the Presidential Palace, and hike Mount Salak. Return to Jakarta and dine at SKYE Bar & Restaurant*.",
                                "Day 18: Last-minute shopping at Grand Indonesia Mall and relax before departure."
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

