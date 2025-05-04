<?php
require_once 'db1.php';

// Review class with search support
class Review {
    private $conn;
    private $reviewID;
    private $userID; 
    private $rating; 
    private $service; 
    private $reviewText; 

    public function __construct($conn, $reviewID = null) {
        $this->conn = $conn;
        if ($reviewID) {
            $this->loadReview($reviewID);
        }
    }

    private function loadReview($reviewID) {
        $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE reviewID = ?");
        $stmt->bind_param("i", $reviewID);
        $stmt->execute();
        $review = $stmt->get_result()->fetch_assoc();

        if ($review) {
            $this->reviewID = $review['reviewID'];
            $this->userID = $review['userID']; 
            $this->rating = $review['rating']; 
            $this->service = $review['service']; 
            $this->reviewText = $review['reviewText']; 
        }
    }

    // Getter methods for review data
    public function getReviewID() { return $this->reviewID; }
    public function getUserID() { return $this->userID; }
    public function getRating() { return $this->rating; } 
    public function getService() { return $this->service; } 
    public function getReviewText() { return $this->reviewText; } 

    // Method to fetch all reviews with optional search query
    public function getAllReviews($searchQuery = '') {
        $sql = "SELECT * FROM reviews";
        if (!empty($searchQuery)) {
            $sql .= " WHERE service LIKE ? OR userID LIKE ?";
        }
        $stmt = $this->conn->prepare($sql);

        if (!empty($searchQuery)) {
            $searchTerm = "%" . $searchQuery . "%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = [];

        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        return $reviews;
    }
}



?>

