<?php 
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
 
// Include DB connection
require_once 'db.php';
 
// Sanitize input
function escape($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
 
// Initialize popup message variables
$showPopup = false;
$popupMessage = '';
 
// Handle form submission
if (isset($_POST['submit'])) {
    try {
        // Get and sanitize input
        $new_review = array(
            "email"      => escape($_POST['email']),
            "rating"     => escape($_POST['rating']),
            "service"    => escape($_POST['service']),
            "reviewText" => escape($_POST['reviewText'])
        );
 
        // Ensure all fields are filled
        if (!in_array('', $new_review, true)) {
            // Build query
            $sql = sprintf(
                "INSERT INTO reviews (%s) VALUES (%s)",
                implode(", ", array_keys($new_review)),
                ":" . implode(", :", array_keys($new_review))
            );
 
            // Insert review
            $stmt = $pdo->prepare($sql);
            $stmt->execute($new_review);
 
            $showPopup = true;
            $popupMessage = "✅ Thank you for your review!";
        } else {
            $showPopup = true;
            $popupMessage = "❌ Please fill in all fields.";
        }
    } catch (PDOException $e) {
        $showPopup = true;
        $popupMessage = "❌ Database error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Leave a Review - Travel Wizard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/Body.css">
</head>
<body>
 
<?php include 'templates/header.php'; ?>
 
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
<input type="hidden" name="rating" id="rating" required>
 
        <label for="service">What would you like to review?</label>
<select name="service" id="service" required>
<option value="">Choose an option</option>
<option value="Customer Service">Customer Service</option>
<option value="Holiday Purchased">Holiday Purchased</option>
</select>
 
        <label for="reviewText">Write Your Review:</label>
<textarea name="reviewText" id="reviewText" rows="6" placeholder="Your review..." required></textarea>
 
        <button type="submit" name="submit">Submit Review</button>
</form>
</div>
 
<!-- Popup Modal -->
<div id="popupModal" class="modal" style="display: none;">
<div class="modal-content">
<p id="popupMessageText"></p>
<button class="close-btn" onclick="closeModal()">Close</button>
</div>
</div>
 
<?php include 'templates/footer.php'; ?>
 
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
 
// Modal popup logic
function closeModal() {
    document.getElementById('popupModal').style.display = 'none';
}
 
<?php if ($showPopup): ?>
window.onload = function () {
    document.getElementById('popupMessageText').innerText = <?= json_encode($popupMessage) ?>;
    document.getElementById('popupModal').style.display = 'block';
};
<?php endif; ?>
</script>
 
</body>
</html>




