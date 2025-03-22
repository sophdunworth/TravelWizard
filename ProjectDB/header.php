<link rel="stylesheet" href="css/Header.css">
<?php
    if (isset($_GET['search'])) {
        $searchTerm = htmlspecialchars($_GET['search']);
        echo "<p>Searching for: <strong>$searchTerm</strong></p>";
    }
?>

<header>
    <div class="container">
        <div class="logo">TravelWizard</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="trips.php">Trips</a></li>
                <li><a href="manage-trips.php">Manage Trip</a></li>
                <li><a href="my-account.php">My Account</a></li>
                <li><a href="Contactus.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <!-- Search form that sends GET request with the search term -->
            <form action="trips.php" method="GET">
                <input type="text" name="search" placeholder="Search destinations..." value="<?php if(isset($searchTerm)) echo $searchTerm; ?>">
                <button type="submit">🔍</button>
            </form>
        </div>
    </div>
</header>
