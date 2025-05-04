<link rel="stylesheet" href="css/Header.css">
<?php
require_once 'db.php'; // Ensure this file initializes $pdo correctly

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize $result to an empty array to avoid undefined variable notice
$result = [];

$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    if (!empty($searchTerm)) {
        // Perform the search query
        $query = "
            SELECT DISTINCT p.packageID, p.packageName, p.airline, p.price, p.departureFlight, p.returnFlight
            FROM packages p
            INNER JOIN packagedestinations pd ON p.packageID = pd.PackageID
            INNER JOIN destinations d ON pd.DestinationID = d.destinationID
            WHERE d.country LIKE :searchTerm OR d.continent LIKE :searchTerm
        ";

        $stmt = $pdo->prepare($query);
        $stmt->execute([':searchTerm' => "%$searchTerm%"]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // If no search term, fetch all packages
        $stmt = $pdo->query("SELECT * FROM packages");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
}
?>

<!-- Display Results -->
<?php 
if ($result && count($result) > 0) {
    foreach ($result as $row) {
        // use $row
    }
} else {
    echo "<p>No packages found matching your search.</p>";
}
?>



<header>
    <div class="container">
        <div class="logo">TravelWizard</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="trips.php">Trips</a></li>
                <li><a href="manageTrips.php">Manage Trip</a></li>
                <li><a href="myAccount.php">My Account</a></li>
                <li><a href="Contactus.php">Contact Us</a></li>
                <li><a href="logout.php">Sign Out</a></li>
                <li><a href="myMail.php">My Mail</a></li>
            </ul>
        </nav>

        <!-- Search Bar -->
        <div class="search-bar">
            <form action="search.php" method="GET">
            <input type="text" name="search" placeholder="Search for trips" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">🔍</button>
            </form>

        </div>
    </div>
</header>

