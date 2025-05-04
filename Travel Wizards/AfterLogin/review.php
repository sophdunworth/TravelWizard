<?php
session_start();

// Protect the page so only logged-in users can leave a review
require_once '../BeforeLogin/auth.php'; // Adjust the path if needed

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Now you can be confident the user is logged in
    $userid = $_SESSION['userid'] ?? null; // Be consistent — use 'userid'

    $rating = $_POST['rating'] ?? '';
    $service = trim($_POST['service'] ?? '');
    $reviewText = trim($_POST['reviewText'] ?? '');

    if (!empty($userid) && !empty($rating) && !empty($service) && !empty($reviewText)) {
        try {
            // Insert review into the database
            $stmt = $conn->prepare('INSERT INTO reviews (userid, rating, service, reviewText) VALUES (?, ?, ?, ?)');
            $stmt->execute([$userid, $rating, $service, $reviewText]);

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
    <?php include 'templates/header.php'; ?>
</head>
<body>

<div class="contact-container">
    <h2>Leave a Review</h2>

    <form method="POST" class="contact-form">
        <label for="rating">Rate Us:</label>
        <div class="stars">
            <label class="star" data-value="1">&#9733;</label>
            <label class="star" data-value="2">&#9733;</label>
            <label class="star" data-value="3">&#9733;</label>
            <label class="star" data-value="4">&#9733;</label>
            <label class="star" data-value="5">&#9733;</label>
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
<div id="popupModal" class="modal">
    <div class="modal-content">
        <p id="popupMessageText"></p>
        <button class="close-btn" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
// Star rating logic
const stars = document.querySelectorAll('.star');
const ratingInput = document.getElementById('rating');

stars.forEach(star => {
    star.addEventListener('mouseover', handleMouseOver);
    star.addEventListener('mouseout', handleMouseOut);
    star.addEventListener('click', handleClick);
});

function handleMouseOver(event) {
    const value = event.target.getAttribute('data-value');
    highlightStars(value);
}

function handleMouseOut() {
    const selectedValue = ratingInput.value;
    highlightStars(selectedValue);
}

function handleClick(event) {
    const value = event.target.getAttribute('data-value');
    ratingInput.value = value;
    highlightStars(value);
}

function highlightStars(value) {
    stars.forEach(star => {
        if (star.getAttribute('data-value') <= value) {
            star.classList.add('selected');
        } else {
            star.classList.remove('selected');
        }
    });
}

// Modal popup logic
function closeModal() {
    document.getElementById('popupModal').style.display = 'none';
}

// Show modal if PHP indicates it
<?php if (!empty($showPopup)): ?>
window.onload = function () {
    document.getElementById('popupMessageText').innerText = <?= json_encode($popupMessage) ?>;
    document.getElementById('popupModal').style.display = 'block';
};
<?php endif; ?>
</script>

<?php include 'templates/footer.php'; ?>
</body>
</html>

