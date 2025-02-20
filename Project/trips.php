<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelWizard - Trips</title>
            <style>
                 /* Global Styles */
                body {
                    font-family: 'Helvetica', sans-serif;
                    margin: 0;
                    padding: 0;
                    background: linear-gradient(to bottom, #e6f7ff, #ccf5ff);
                    color: #333;
                }

                /* Travel Inspiration Section */
                .travel-inspiration {
                    padding: 40px;
                    text-align: center;
                }

                .travel-inspiration h2 {
                    margin-bottom: 30px;
                    font-size: 2em;
                    font-weight: bold;
                    color: #1E3A8A;
                }

                .categories, .cards {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    flex-wrap: wrap;
                }

                .category, .card {
                    background-color: #fff;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    width: 220px;
                    transition: transform 0.3s;
                    cursor: pointer;
                    text-align: center;
                }

                .category:hover, .card:hover {
                    transform: translateY(-10px);
                }

                .category h3, .card h3 {
                    margin: 0 0 10px;
                    font-size: 1.2em;
                    color: #0f172a;
                }

                .category p, .card p {
                    margin: 0;
                    color: #475569;
                    font-size: 0.95em;
                }

                @media (max-width: 768px) {
                    .categories, .cards {
                        flex-direction: column;
                        align-items: center;
                    }
                }
                /* Hero Section */
                .hero {
                    text-align: center;
                    padding: 50px;
                    background: #e0f7fa;
                }

                .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    background: #008cff;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                }

                .btn:hover {
                    background: #005f99;
                }

                /* Featured Trips */
                .featured-trips {
                    padding: 40px;
                    text-align: center;
                }

                .trip-list {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    flex-wrap: wrap;
                }

                .trip-card {
                    background: white;
                    padding: 20px;
                    border-radius: 8px;
                    width: 300px;
                    text-align: center;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                /* Trip Grid */
                .trip-grid {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 20px;
                    padding: 40px;
                }

                .trip-image {
                    width: 100%;
                    height: 150px;
                    background: #ccc;
                    border-radius: 8px;
                    margin-bottom: 10px;
                }
        </style>

    <?php include 'header.php'; ?>
</head>
<body>
<section class="trips">
    <h1>Find Your Perfect Travel Experience with Us</h1>
    <div class="trip-grid">
        <?php 
        // Trips data in an associative array
        $trips = [
            ["name" => "Caribbean Bliss", "locations" => "Jamaica, Bahamas, Dominican Republic", "price" => "€2,499"],
            ["name" => "La Dolce Vita", "locations" => "Venice, Rome, Sicily", "price" => "€3,299"],
            ["name" => "Gold Coast Gateway", "locations" => "Vancouver, Seattle, Phoenix", "price" => "€2,899"],
            ["name" => "South East Asia Uncovered", "locations" => "Bali, Malaysia, Thailand", "price" => "€4,199"],
            ["name" => "Arabian Nights", "locations" => "Dubai, Abu Dhabi, Qatar", "price" => "€2,750"],
            ["name" => "African Safari", "locations" => "Johannesburg, Cape Town, Durban", "price" => "€2,500"]
        ];

        // Loop through the array and create trip cards dynamically
        foreach ($trips as $trip) {
            echo "<div class='trip-card'>
                    <h3>{$trip['name']}</h3>
                    <p>{$trip['locations']}</p>
                    <p class='price'>{$trip['price']}</p>
                    <a href='#' class='btn'>View Details</a>
                  </div>";
        }
        ?>
    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>



