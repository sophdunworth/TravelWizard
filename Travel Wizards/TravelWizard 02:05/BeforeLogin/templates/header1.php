<link rel="stylesheet" href="css/Header.css">
<?php
require_once 'db.php'; // This sets up $pdo

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get search term from URL
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    if (!empty($searchTerm)) {
        // Search by country or continent
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
        // No search term -> show all packages
        $stmt = $pdo->query("SELECT * FROM packages");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

// No need to display search results here unless you want to
?>

<link rel="stylesheet" href="css/header.css">
<header>
    <div class="container">
        <div class="logo">TravelWizard</div>
        <nav>
            <ul>
                <li><a href="index1.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index1.php' ? 'active' : '' ?>">Home</a></li>
                <li><a href="trips.php" class="<?= basename($_SERVER['PHP_SELF']) == 'trips.php' ? 'active' : '' ?>">Trips</a></li>
                <li><a href="login.php" class="<?= basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '' ?>">Sign In</a></li>
                <li><a href="register.php" class="<?= basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : '' ?>">Create Account</a></li>
                <li><a href="contactus.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contactus.php' ? 'active' : '' ?>">Contact Us</a></li>
            </ul>
        </nav>

        <!-- Search Bar -->
        <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="search" placeholder="Search for trips" value="<?php echo htmlspecialchars($searchTerm); ?>">
				<!-- https://www.w3schools.com/charsets/ref_emoji_office.asp-->
				<button type="submit">&#128270;</button>
            </form>
        </div>
    </div>
</header>
