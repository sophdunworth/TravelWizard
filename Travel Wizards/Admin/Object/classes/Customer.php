<?php
require_once __DIR__ . '/../db1.php';

class Customer {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
 
    // Get all customers
    public function getAllCustomers() {
        $sql = "SELECT userID, username, email FROM users WHERE user_type = 'customer'";
        $result = $this->conn->query($sql);
 
        if (!$result) {
            throw new Exception("Error fetching customers: " . $this->conn->error);
        }
 
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    // Search customers by email
    public function searchCustomersByEmail($email) {
        $sql = "SELECT userID, username, email FROM users WHERE user_type = 'customer' AND email LIKE ?";
        $stmt = $this->conn->prepare($sql);
 
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->conn->error);
        }
 
        $likeEmail = '%' . $email . '%';
        $stmt->bind_param("s", $likeEmail);
 
        if (!$stmt->execute()) {
            throw new Exception("Search failed: " . $stmt->error);
        }
 
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    // Aggregate: Get total number of customers
    public function getTotalCustomers() {
        $sql = "SELECT COUNT(*) as total_customers FROM users WHERE user_type = 'customer'";
        $result = $this->conn->query($sql);
 
        if (!$result) {
            throw new Exception("Error counting customers: " . $this->conn->error);
        }
 
        $data = $result->fetch_assoc();
        return $data['total_customers'];  // Returns the total number of customers
    }
 
    // Aggregate: Get average email length of customers
    public function getAverageEmailLength() {
        $sql = "SELECT AVG(CHAR_LENGTH(email)) as avg_email_length FROM users WHERE user_type = 'customer'";
        $result = $this->conn->query($sql);
 
        if (!$result) {
            throw new Exception("Error calculating average email length: " . $this->conn->error);
        }
 
        $data = $result->fetch_assoc();
        return $data['avg_email_length'];  // Returns the average email length
    }
}
?>



