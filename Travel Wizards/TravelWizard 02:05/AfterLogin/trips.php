<?php
// Start session if it's not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure only authenticated users can access this page
require_once '../BeforeLogin/auth.php'; 

// Connect to the database 
require 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWizard - Trips</title>
    <link rel="stylesheet" href="css/Tripmain.css">
    <?php include 'templates/header.php'; ?> 
</head>
<body>

<section class="trips">
    <h1>Find Your Perfect Travel Experience with Us</h1>

    <!-- Filter Bar for Users to Filter Trips -->
    <div class="trip-grid">
        <div class="filter-bar">
            <form method="GET" class="filters">

                <!-- Trip Type Filter -->
                <div class="filter-group">
                    <label>Trip Type:</label>
                    <label><input type="checkbox" name="type[]" value="Beach Getaways"> Beach</label>
                    <label><input type="checkbox" name="type[]" value="City Breaks"> City</label>
                    <label><input type="checkbox" name="type[]" value="Cultural Experience"> Cultural</label>
                    <label><input type="checkbox" name="type[]" value="Adventure Tours"> Adventure</label>
                </div>

                <!-- Price Filter -->
                <div class="filter-group">
                    <label>Max Price (€):</label>
                    <input type="number" name="max_price" placeholder="e.g. 1000">
                </div>

                <!-- Destination Filter -->
                <div class="filter-group">
                    <label>Destination:</label>
                    <input type="text" name="destination" placeholder="e.g. Maldives">
                </div>

                <button type="submit">Apply Filters</button>
            </form>
        </div>

        <?php 
        // Array of trips 
       $trips = [
            ["name" => "Caribbean Bliss", "locations" => "Jamaica, Bahamas, Dominican Republic", "type" => "Beach Getaways", "price" => "€4,700", "link" => "carribean.php", "image" => "images/carribean/carribean.png"],
            ["name" => "La Dolce Vita", "locations" => "Venice, Rome, Sicily", "price" => "€1,700", "type" => "City Breaks", "link" => "italy.php", "image" => "images/italy/italy.png"],
            ["name" => "Gold Coast Gateway", "locations" => "Vancouver, Seattle, Phoenix", "price" => "€3,300", "type" => "Beach Getaways", "link" => "la.php", "image" => "images/la/la.png"],
            ["name" => "South East Asia Uncovered", "locations" => "Bali, Malaysia, Thailand", "price" => "€3,750", "type" => "Cultural Experience", "link" => "thialand.php", "image" => "images/thialand/thialand.png"],
            ["name" => "Arabian Nights", "locations" => "Dubai, Abu Dhabi, Qatar", "price" => "€3,200", "type" => "Cultural Expereince", "link" => "dubai.php", "image" => "images/dubai/dubai.png"],
            ["name" => "African Safari", "locations" => "Johannesburg, Cape Town, Durban", "price" => "€6,200", "type" => "Adventure Tours", "link" => "africa.php", "image" => "images/africa/africa.png"],
            ["name" => "Tropical Treasures", "locations" => "Maldives, Seychelles & Beyond", "price" => "€3,500", "type" => "Beach Getaways", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
            ["name" => "Southern Charm", "locations" => "Atlanta, New Orleans, Dallas", "price" => "€5,200", "type" => "Cultural Experience", "link" => "texas.php", "image" => "images/texas/texas.png"],
            ["name" => "Central Cities Discovery", "locations" => "Chicago, Detroit, Montreal", "price" => "€2,800", "type" => "City Breaks", "link" => "chicago.php", "image" => "images/chicago/chicago.png"],
            ["name" => "Greek Island Odyssey", "locations" => "Rhodes, Kos, Mykonos", "price" => "€1,000", "type" => "Beach Getaways", "link" => "rhodes.php", "image" => "images/rhodes/rhodes.png"],
            ["name" => "Greek Island Party Cruise", "locations" => "Santorini, Paros, Naxos", "price" => "€2,000", "type" => "Beach Getaways", "link" => "greekisland.php", "image" => "images/greekisland/Greek Island Party Cruise.png"],
            ["name" => "Legends of the East", "locations" => "Japan, South Korea, Shanghai", "price" => "€6,500", "type" => "Cultural Expereince ", "link" => "japan.php", "image" => "images/japan/japan.png"],
            ["name" => "Amazon to the Andes", "locations" => "Colombia, Peru, Argentina", "price" => "€4,800", "type" => "Adventure Tours", "link" => "southamerica.php", "image" => "images/southamerica/southamerica.png"],
            ["name" => "East Coast Explorer", "locations" => "New York, Boston, Miami", "price" => "€3,500", "type" => "City Breaks", "link" => "newyork.php", "image" => "images/newyork/newyork.png"],
            ["name" => "Aloha to Adventure", "locations" => "Hawaii, Bali, French Polynesia", "price" => "€4,350", "type" => "Beach Getaways", "link" => "hawaii.php", "image" => "images/hawaii/hawaii.png"],
            ["name" => "Aurora & Fjords", "locations" => "Sweden, Norway, Finland", "price" => "€2,800", "type" => "Cultural Experience", "link" => "nordic.php", "image" => "images/nordic/nordic.png"],
            ["name" => "Grand European Escapade", "locations" => "France, Germany, Austria", "price" => "€2,000", "type" => "Cultural Experience", "link" => "european.php", "image" => "images/european/european.png"],
            ["name" => "The Land Down Under", "locations" => "Australia, New Zealand", "price" => "€4,500", "type" => "Adventure Tours", "link" => "australia.php", "image" => "images/australia/australia.png"],
            ["name" => "Costa del Sol & Beyond", "locations" => "Spain, Monaco, Switzerland", "price" => "€2,250", "type" => "City Breaks", "link" => "spain.php", "image" => "images/spain/spain.png"],
            ["name" => "C'est La Vie dans France", "locations" => "Paris, Lyon, Bordeaux, Marseille", "price" => "€1,800", "type" => "City Breaks", "link" => "france.php", "image" => "images/paris/paris.png"]
        ];

        // Capture filter values from GET request
        $typeFilters = $_GET['type'] ?? [];
        $maxPrice = $_GET['max_price'] ?? null;
        $destSearch = $_GET['destination'] ?? '';

        // Filter trips based on selected filters
        $filteredTrips = array_filter($trips, function($trip) use ($typeFilters, $maxPrice, $destSearch) {
            // Convert price string to integer for comparison
            $tripPrice = (int) str_replace(['€', ','], '', $trip['price']);

            // Filter by price
            if ($maxPrice && $tripPrice > $maxPrice) return false;

            // Filter by destination (case-insensitive search)
            if ($destSearch && stripos($trip['locations'], $destSearch) === false) return false;

            // Filter by trip type
            if (!empty($typeFilters)) {
                if (empty($trip['type']) || !in_array($trip['type'], $typeFilters)) return false;
            }

            return true; // Passes all filters
        });

        // Loop through and display each filtered trip
        foreach ($filteredTrips as $trip) {
            echo "<div class='trip-card'>
                    <img src='{$trip['image']}' alt='{$trip['name']}' class='trip-image'>
                    <h3>{$trip['name']}</h3>
                    <p>{$trip['locations']}</p>
                    <p class='price'>{$trip['price']}</p>
                    <a href='{$trip['link']}' class='btn'>View Details</a>
                  </div>";
        }
        ?>
    </div>
</section>

<?php include 'templates/footer.php'; ?> 

</body>
</html>






