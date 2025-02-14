<?php
$products = [
    "Europe",
    "North America",
    "Asia",
    "Africa",
    "South America"
];

// Handle search if search term is passed
$searchTerm = isset($_GET['search']) ? strtolower($_GET['search']) : '';
$filteredProducts = [];

if ($searchTerm) {
    // Filter products based on the search term
    foreach ($products as $product) {
        if (strpos(strtolower($product), $searchTerm) !== false) {
            $filteredProducts[] = $product;
        }
    }
} else {
    // If no search term, display all products
    $filteredProducts = $products;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWizard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Places to Travel!</h1>
    </header>

    <section class="search">
        <form action="index.php" method="GET">
            <input type="text" name="search" placeholder="Search destinations..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
            <button type="submit">Search</button>
        </form>
    </section>

    <section class="products">
        <ul>
            <?php
            if (empty($filteredProducts)) {
                echo "<li>No results found for '$searchTerm'.</li>";
            } else {
                foreach ($filteredProducts as $product) {
                    echo "<li>$product</li>";
                }
            }
            ?>
        </ul>
    </section>

    <footer>
        <p>&copy; 2025 TravelWizard</p>
    </footer>
</body>
</html>

