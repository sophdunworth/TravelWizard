<?php
// Start the session
session_start();

// Only allow logged-in users to access this page
require_once '../BeforeLogin/auth.php';

// Connect to the database
include 'db.php';

// Destination IDs and package IDs 
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
<?php include 'templates/header.php'; ?>

<main>
    <section class="package">
        <h1>African Safari: Culture, Wildlife, and Coastal Wonders – 14 Days</h1>

        <div class="trip-details">
            <!-- Image Carousel Section -->
            <div class="carousel-container">
                <button class="carousel-button prev">&#10094;</button>
                <div class="carousel">
                    <!-- Trip images for the carousel -->
                    <img src="images/africa/africa1.png" alt="Safari Image 1">
                    <img src="images/africa/africa2.png" alt="Safari Image 2">
                    <img src="images/africa/africa3.png" alt="Safari Image 3">
                    <img src="images/africa/africa4.png" alt="Safari Image 4">
                </div>
                <button class="carousel-button next">&#10095;</button>
            </div>

            <!-- Trip Details Section -->
            <div class="info">
                <h2>Trip Details</h2>
                <p><strong>Airline:</strong> South African Airways</p>
                <p><strong>Departure Flight:</strong> Dublin (DUB) - Cape Town (CPT) at 9:00 AM</p>
                <p><strong>Return Flight:</strong> Durban (DUR) - Dublin (DUB) at 8:00 PM</p>
                <p><strong>Cost:</strong> €6200 per person</p>
                <p><strong>Extra Info:</strong> All activities, accommodation, and transport included. Meals marked with *.</p>

                <!-- Booking buttons for different travel dates -->
                <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="8">
                    <input type="hidden" name="departureFlight" value="2025-06-01">
                    <input type="hidden" name="returnFlight" value="2025-06-14">
                    <button type="submit">June 01 - June 14, 2025</button>
                </form>

                <form action="booking.php" method="POST">
                    <input type="hidden" name="package_id" value="8">
                    <input type="hidden" name="departureFlight" value="2025-09-01">
                    <input type="hidden" name="returnFlight" value="2025-09-14">
                    <button type="submit">September 01 - September 14, 2025</button>
                </form>
            </div>
        </div>

            <!-- Itinerary Section -->
            <div class="trip-itinerary">
                <h2>Trip Itinerary</h2>

                <!-- Accordion for each part of the trip -->
                <div class="accordion">
                    <?php
                    // List of destinations with activities
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

                    <!-- Loop through each destination -->
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
