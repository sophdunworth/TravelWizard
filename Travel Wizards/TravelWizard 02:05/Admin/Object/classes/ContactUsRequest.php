<?php
require_once __DIR__ . '/../db1.php';


class ContactUsRequest {
    private $conn;

    // constructor expects $conn to be passed in
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fetch all requests
    public function getAllRequests() {
        $query = "SELECT * FROM contactusrequests ORDER BY created_at DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mark as answered and store admin ID
    public function markAsAnswered($id, $adminID) {
        $query = "UPDATE contactusrequests SET answered = 1, admin_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$adminID, $id]);
    }

    // Get request by ID
    public function getRequestByID($id) {
        $stmt = $this->conn->prepare("SELECT * FROM contactusrequests WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Submit a response
    public function submitResponse($id, $adminID, $response) {
        $stmt = $this->conn->prepare("UPDATE contactusrequests SET answered = 1, admin_id = ?, response = ? WHERE id = ?");
        return $stmt->execute([$adminID, $response, $id]);
    }
}
?>

