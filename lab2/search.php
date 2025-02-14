<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Search Products</h1>
    </header>

    <section class="search">
        <form action="search.php" method="GET">
            <input type="text" name="search" placeholder="Search products..." />
            <button type="submit">Search</button>
        </form>

        <?php
        if (isset($_GET['search'])) {
            $searchTerm = htmlspecialchars($_GET['search']);
            echo "<p>Searching for: <strong>$searchTerm</strong></p>";
        }
        ?>
    </section>

    <footer>
        <p>&copy; 2025 Shopping Site</p>
    </footer>
</body>
</html>
