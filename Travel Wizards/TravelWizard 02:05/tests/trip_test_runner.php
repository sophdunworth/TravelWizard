<?php

require 'db.php'; 


$trips = [    ["name" => "Caribbean Bliss", "locations" => "Jamaica, Bahamas, Dominican Republic", "price" => "€4,700", "link" => "carribean.php", "image" => "images/carribean/carribean.png"],
["name" => "La Dolce Vita", "locations" => "Venice, Rome, Sicily", "price" => "€1,700", "link" => "italy.php", "image" => "images/italy/italy.png"],
["name" => "Gold Coast Gateway", "locations" => "Vancouver, Seattle, Phoenix", "price" => "€3,300", "link" => "la.php", "image" => "images/la/la.png"],
["name" => "South East Asia Uncovered", "locations" => "Bali, Malaysia, Thailand", "price" => "€3,750", "link" => "thialand.php", "image" => "images/thialand/thialand.png"],
["name" => "Arabian Nights", "locations" => "Dubai, Abu Dhabi, Qatar", "price" => "€3,200", "link" => "dubai.php", "image" => "images/dubai/dubai.png"],
["name" => "African Safari", "locations" => "Johannesburg, Cape Town, Durban", "price" => "€6,200", "link" => "africa.php", "image" => "images/africa/africa.png"],
["name" => "Tropical Treasures", "locations" => "Maldives, Seychelles & Beyond", "price" => "€3,500", "link" => "maldieves.php", "image" => "images/maldives/maldives.png"],
["name" => "Southern Charm", "locations" => "Atlanta, New Orleans, Dallas", "price" => "€5,200", "link" => "texas.php", "image" => "images/texas/texas.png"],
["name" => "Central Cities Discovery", "locations" => "Chicago, Detroit, Montreal", "price" => "€2,800", "link" => "chicago.php", "image" => "images/chicago/chicago.png"],
["name" => "Greek Island Odyssey", "locations" => "Rhodes, Kos, Mykonos", "price" => "€1,000", "link" => "rhodes.php", "image" => "images/rhodes/rhodes.png"],
["name" => "Greek Island Party Cruise", "locations" => "Santorini, Paros, Naxos", "price" => "€2,000", "link" => "greekisland.php", "image" => "images/greekisland/Greek Island Party Cruise.png"],
["name" => "Legends of the East", "locations" => "Japan, South Korea, Shanghai", "price" => "€6,500", "link" => "japan.php", "image" => "images/japan/japan.png"],
["name" => "Amazon to the Andes", "locations" => "Colombia, Peru, Argentina", "price" => "€4,800", "link" => "southamerica.php", "image" => "images/southamerica/southamerica.png"],
["name" => "East Coast Explorer", "locations" => "New York, Boston, Miami", "price" => "€3,500", "link" => "newyork.php", "image" => "images/newyork/newyork.png"],
["name" => "Aloha to Adventure", "locations" => "Hawaii, Bali, French Polynesia", "price" => "€4,350", "link" => "hawaii.php", "image" => "images/hawaii/hawaii.png"],
["name" => "Aurora & Fjords", "locations" => "Sweden, Norway, Finland", "price" => "€2,800", "link" => "nordic.php", "image" => "images/nordic/nordic.png"],
["name" => "Grand European Escapade", "locations" => "France, Germany, Austria", "price" => "€2,000", "link" => "european.php", "image" => "images/european/european.png"],
["name" => "The Land Down Under", "locations" => "Australia, New Zealand", "price" => "€4,500", "link" => "australia.php", "image" => "images/australia/australia.png"],
["name" => "Costa del Sol & Beyond", "locations" => "Spain, Monaco, Switzerland", "price" => "€2,250", "link" => "spain.php", "image" => "images/spain/spain.png"],
["name" => "C'est La Vie dans France", "locations" => "Paris, Lyon, Bordeaux, Marseille", "price" => "€1,800", "link" => "france.php", "image" => "images/paris/paris.png"]];

//Test cases
$testCases = [
    // Path 1: No filters
    ['max_price' => null, 'destination' => null],

    // Path 2: Only max_price
    ['max_price' => 100, 'destination' => null],

    // Path 3: Only destination
    ['max_price' => null, 'destination' => 'Paris'],

    // Path 4: Both filters match
    ['max_price' => 2000, 'destination' => 'Paris'],

    // Path 5: Both filters but no match
    ['max_price' => 100, 'destination' => 'London'],

    // Path 6: max_price set, no destination
    ['max_price' => 2000, 'destination' => null],

    // Path 7: destination set, no price
    ['max_price' => null, 'destination' => 'London']
];


// Choose the test case to run
$test = $testCases[5];//Change index [0] to whichever test case you want to run

$max_price = isset($test['max_price']) ? floatval($test['max_price']) : null;
$destination = isset($test['destination']) ? strtolower(trim($test['destination'])) : null;

$filteredTrips = array_filter($trips, function ($trip) use ($max_price, $destination) {
    $priceNum = floatval(str_replace(['€', ','], '', $trip['price']));
    $priceMatch = !$max_price || $priceNum <= $max_price;
    $destinationMatch = !$destination || stripos($trip['locations'], $destination) !== false;
    return $priceMatch && $destinationMatch;
});

echo "<h2>Test Case: Max Price = " . ($max_price ?? 'None') . ", Destination = " . ($destination ?? 'None') . "</h2>";

if (empty($filteredTrips)) {
    echo "<p style='color:red;'>No trips match your filters.</p>";
} else {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Name</th><th>Locations</th><th>Price</th></tr>";
    foreach ($filteredTrips as $trip) {
        echo "<tr>
                <td>{$trip['name']}</td>
                <td>{$trip['locations']}</td>
                <td>{$trip['price']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
