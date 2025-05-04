<link rel="stylesheet" href="css/Header.css">
<?php
include 'db.php'; // Make sure your database connection is set up here!


// Get search term from URL
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

// Build query
if (!empty($searchTerm)) {
    // Search by country or continent
    $query = "
        SELECT DISTINCT p.packageID, p.packageName, p.airline, p.price, p.departureFlight, p.returnFlight
        FROM packages p
        INNER JOIN packagedestinations pd ON p.packageID = pd.PackageID
        INNER JOIN destinations d ON pd.DestinationID = d.destinationID
        WHERE d.country LIKE ? OR d.continent LIKE ?
    ";

    $stmt = $conn->prepare($query);
    $likeTerm = "%$searchTerm%";
    $stmt->bind_param("ss", $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // No search term -> show all packages
    $query = "SELECT * FROM packages";
    $result = $conn->query($query);
}

// Display results
if ($result && $result->num_rows > 0) {
    //echo "<h2>Packages Found:</h2>";
    //echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        //echo "<li>";
        //echo "<strong>" . htmlspecialchars($row['packageName']) . "</strong><br>";
        //echo "Airline: " . htmlspecialchars($row['airline']) . "<br>";
        //echo "Price: €" . number_format($row['price'], 2) . "<br>";
        //echo "Departure: " . htmlspecialchars($row['departureFlight']) . "<br>";
        //echo "Return: " . htmlspecialchars($row['returnFlight']) . "<br>";
        //echo "</li><br>";
    }
    //echo "</ul>";
} else {
    //echo "<p>No packages found matching your search.</p>";
}
?>


<link rel="stylesheet" href="css/header.css">
<header>
    <div class="container">
        <div class="logo">TravelWizard</div>
        <nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="trips.php">Trips</a></li>
                <li><a href="login.php">Sign In</a></li>
                <li><a href="register.php">Create Account</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </nav>

        <!-- Search Bar -->
        <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="search" placeholder="Search for trips" value="<?php echo $searchTerm; ?>">
                <button type="submit">🔍</button>
            </form>
        </div>
    </div>
</header>