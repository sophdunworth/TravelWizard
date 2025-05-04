<?php
include 'db.php';
session_start();
 
// Get the search input
$searchTerm = isset($_GET['search']) ? ($_GET['search']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Results - TravelWizard</title>
<link rel="stylesheet" href="css/Header.css">
<link rel="stylesheet" href="css/Search.css">
</head>
<body>
<?php include 'templates/header.php'; ?>
 
<div class="content">
<h2>Search Results for "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
 
    <div class="cards-container">
 
<?php
// Only run search if a term was provided
if (!empty($searchTerm)) {
    try {
        // Prepare SQL query to search for matching packages by country or continent
        $query = "
            SELECT DISTINCT p.packageID, p.packageName, p.airline, p.price, p.departureFlight, p.returnFlight
            FROM packages p
            INNER JOIN packagedestinations pd ON p.packageID = pd.PackageID
            INNER JOIN destinations d ON pd.DestinationID = d.destinationID
            WHERE d.country LIKE :term OR d.continent LIKE :term
        ";
 
        $stmt = $pdo->prepare($query);
        $likeTerm = "%$searchTerm%"; 
        $stmt->bindParam(':term', $likeTerm, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        if ($result) {
            foreach ($result as $row) {
                $packageID = $row['packageID'];
 
                // Query to get destination names and country for the current package
                $destQuery = "
                    SELECT d.name, d.country
                    FROM destinations d
                    INNER JOIN packagedestinations pd ON d.destinationID = pd.DestinationID
                    WHERE pd.PackageID = :packageID
                ";
                $destStmt = $pdo->prepare($destQuery);
                $destStmt->bindParam(':packageID', $packageID, PDO::PARAM_INT);
                $destStmt->execute();
                $destinations = $destStmt->fetchAll(PDO::FETCH_ASSOC);
 
                $destinationNames = [];
                $country = "";
                foreach ($destinations as $dest) {
                    $destinationNames[] = $dest['name'];
                    if (empty($country)) {
                        $country = $dest['country'];
                    }
                }
 
                // Generate image file path based on first destination
                $imageName = strtolower(str_replace(' ', '_', $destinationNames[0])) . '.jpg';
                $imagePath = "images/destinations/$imageName";
                if (!file_exists($imagePath)) {
                    $imagePath = "images/default.jpg";
                }
 
                // Generate link to country-specific page
                $countryPage = strtolower(str_replace(' ', '', $country)) . ".php";
?>
<!-- One card for each package -->
<div class="card">
<a href="<?php echo htmlspecialchars($countryPage); ?>">
<img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($destinationNames[0]); ?>">
<h3><?php echo htmlspecialchars($row['packageName']); ?></h3>
<p>Airline: <?php echo htmlspecialchars($row['airline']); ?></p>
<p>Price: €<?php echo htmlspecialchars($row['price']); ?></p>
<p>Departure: <?php echo htmlspecialchars($row['departureFlight']); ?></p>
<p>Return: <?php echo htmlspecialchars($row['returnFlight']); ?></p>
</a>
</div>
<?php
            } // End foreach
        } else {
            echo "<p>No results found for \"" . htmlspecialchars($searchTerm) . "\".</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
 
    </div> <!-- End of cards-container -->
</div> <!-- End of content -->
 
<?php include 'templates/footer.php'; ?>
</body>
</html>



