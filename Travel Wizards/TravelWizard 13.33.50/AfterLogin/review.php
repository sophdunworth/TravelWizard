<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$showPopup = false;
$popupMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $rating = $_POST['rating'] ?? '';
    $service = trim($_POST['service'] ?? '');
    $reviewText = trim($_POST['reviewText'] ?? '');


    if (!empty($email) && !empty($rating) && !empty($service) && !empty($reviewText)) {
        try {
            $stmt = $pdo->prepare('INSERT INTO reviews (email, rating, service, reviewText) VALUES (?, ?, ?, ?)');
            $stmt->execute([$email, $rating, $service, $reviewText]);

            $showPopup = true;
            $popupMessage = "Thank you for your review!";
        } catch (PDOException $e) {
            $showPopup = true;
            $popupMessage = "Error: " . $e->getMessage();
        }
    } else {
        $showPopup = true;
        $popupMessage = "Please fill in all fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Wizard - Leave a Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Body.css">
    <?php include 'templates/header1.php'; ?>
</head>
<body>

<div class="contact-container">
    <h2>Leave a Review</h2>

    <form method="POST" class="contact-form">
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="rating">Rate Us:</label>
        <div class="stars">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <input type="hidden" name="rating" id="rating" value="">

        <label for="service">What would you like to review?</label>
        <select name="service" id="service" required>
            <option value="">Choose an option</option>
            <option value="Customer Service">Customer Service</option>
            <option value="Holiday Purchased">Holiday Purchased</option>
        </select>

        <label for="reviewText">Write Your Review:</label>
        <textarea name="reviewText" id="reviewText" rows="6" placeholder="Your review..." required></textarea>

        <button type="submit">Submit Review</button>
    </form>
    
</div>

<!-- Modal HTML -->
<div id="popupModal" class="modal" style="display: none;">
    <div class="modal-content">
        <p id="popupMessageText"></p>
        <button class="close-btn" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
// Star rating logic
const stars = document.querySelectorAll('.star');
const ratingInput = document.getElementById('rating');

stars.forEach((star, index) => {
    star.addEventListener('click', () => {
        const rating = index + 1;
        ratingInput.value = rating;
        updateStars(rating);
    });
});

function updateStars(rating) {
    stars.forEach((star, i) => {
        star.style.color = i < rating ? 'gold' : 'gray';
    });
}

// Modal logic
function closeModal() {
    document.getElementById('popupModal').style.display = 'none';
}

// Show modal if PHP indicates it
<?php if ($showPopup): ?>
window.onload = function () {
    document.getElementById('popupMessageText').innerText = <?= json_encode($popupMessage) ?>;
    document.getElementById('popupModal').style.display = 'block';
};
<?php endif; ?>
</script>

<?php include 'templates/footer.php'; ?>
</body>
</html>

