<?php
include 'db.php';
session_start();

// Get the search input
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results - TravelWizard</title>
    <link rel="stylesheet" href="css/Search.css">
    <link rel="stylesheet" href="css/Body.css">
</head>
<body>
<?php include 'templates/header1.php'; ?>

<div class="content">
    <h2>Search Results for "<?php echo htmlspecialchars($searchTerm); ?>"</h2>

    <div class="cards-container">

<?php
if (!empty($searchTerm)) {
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

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $packageID = $row['packageID'];

            // Fetch linked destinations
            $destQuery = "
                SELECT d.name, d.country
                FROM destinations d
                INNER JOIN packagedestinations pd ON d.destinationID = pd.DestinationID
                WHERE pd.PackageID = ?
            ";
            $destStmt = $conn->prepare($destQuery);
            $destStmt->bind_param("i", $packageID);
            $destStmt->execute();
            $destResult = $destStmt->get_result();

            $destinationNames = [];
            $country = "";
            while ($destRow = $destResult->fetch_assoc()) {
                $destinationNames[] = $destRow['name'];
                if (empty($country)) {
                    $country = $destRow['country']; // Take the first country
                }
            }

            // Create image path
            $imageName = strtolower(str_replace(' ', '_', $destinationNames[0])) . '.jpg';
            $imagePath = "images/destinations/$imageName";
            if (!file_exists($imagePath)) {
                $imagePath = "images/default.jpg";
            }

            // Create link to specific country page
            $countryPage = strtolower(str_replace(' ', '', $country)) . ".php";
            ?>
            
            <!-- CARD -->
            <a href="<?php echo $countryPage; ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo $imagePath; ?>" alt="Destination Image">
                    <h3><?php echo htmlspecialchars($row['packageName']); ?></h3>
                    <p><?php echo htmlspecialchars(implode(", ", $destinationNames)); ?></p>
                    <p>€<?php echo number_format($row['price'], 2); ?></p>
                </div>
            </a>
            <?php
        }
    } else {
        echo "<p>No matching packages found.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>
    </div> <!-- end cards-container -->
</div>

</body>
</html>



