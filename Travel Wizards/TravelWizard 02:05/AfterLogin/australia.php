<?php
// Start the session
session_start();

// Protect this page: only logged-in users can view it
require_once '../BeforeLogin/auth.php';

// Connect to the database
include 'db.php';

//Destination IDs and package ID for this trip
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
    <script defer src="js/Accordion.js"></script>
</head>
<body>

<?php include 'templates/header.php'; ?>

<main>
    <section class="package">
        <h1>The Land Down Under: From the Outback to Kiwi Wonders – 15 Days</h1>

        <div class="trip-details">
            <!-- Image Carousel Section -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <!-- Carousel images for the trip -->
                    <img src="images/australia/australia1.png" alt="Australia Image 1">
                    <img src="images/australia/australia2.png" alt="Australia Image 2">
                    <img src="images/australia/australia3.png" alt="Australia Image 3">
                    <img src="images/australia/australia4.png" alt="Australia Image 4">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>

            <!-- Trip Information Section -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> Qantas</p>
                <p><strong>Departure Flight:</strong> Dublin → London → Sydney at 10:00 AM</p>
                <p><strong>Return Flight:</strong> Queenstown → London → Dublin at 7:00 PM</p>
                <p><strong>Cost:</strong> €4500 per person</p>
                <p><strong>Extra Info:</strong> All activities, accommodation, and transport are included. Meals not covered unless marked with *.</p>

                <!-- Booking Buttons -->
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
        </div>

            <!-- Itinerary Section -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>

                <!-- Accordion for Day-by-Day Trip Breakdown -->
                <div class="accordion">
                    <?php
                    // Each part of the trip 
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
                            "Day 14: Adventure Day: Shotover Jet, Bungee Jumping, Skyline Gondola ride.",
                            "Day 15: Departure."
                        ]]
                    ];
                    ?>

                    <!-- Loop through each destination and create an accordion item -->
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
