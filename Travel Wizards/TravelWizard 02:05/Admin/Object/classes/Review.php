<?php
require_once __DIR__ . '/../db1.php';

// Review class to manage customer reviews and search functionality
class Review {
    private $conn;
    private $reviewID;
    private $email;
    private $rating;
    private $service;
    private $reviewText;

    public function __construct($conn, $reviewID = null) {
        $this->conn = $conn;
        if ($reviewID) {
            $this->loadReview($reviewID);
        }
    }

    // Load a specific review by ID
    private function loadReview($reviewID) {
        $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE reviewID = ?");
        $stmt->execute([$reviewID]);
        $review = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($review) {
            $this->reviewID = $review['reviewID'];
            $this->email = $review['email'];
            $this->rating = $review['rating'];
            $this->service = $review['service'];
            $this->reviewText = $review['reviewText'];
        }
    }

    // Getters for review properties
    public function getReviewID() { return $this->reviewID; }
    public function getEmail() { return $this->email; }
    public function getRating() { return $this->rating; }
    public function getService() { return $this->service; }
    public function getReviewText() { return $this->reviewText; }

    // Get all reviews, with optional search by service or email
    public function getAllReviews($searchQuery = '') {
        $sql = "SELECT * FROM reviews";

        if (!empty($searchQuery)) {
            $sql .= " WHERE service LIKE ? OR email LIKE ?";
        }

        $stmt = $this->conn->prepare($sql);

        if (!empty($searchQuery)) {
            $searchTerm = "%" . $searchQuery . "%";
            $stmt->execute([$searchTerm, $searchTerm]);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
