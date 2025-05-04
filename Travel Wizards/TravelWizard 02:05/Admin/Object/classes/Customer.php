<?php
require_once 'User.php';  

class Customer {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all customers
    public function getAllCustomers() {
        $sql = "SELECT userID, username, email FROM users WHERE user_type = 'customer'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search customers by email
    public function searchCustomersByEmail($email) {
        $sql = "SELECT userID, username, email FROM users WHERE user_type = 'customer' AND email LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $likeEmail = '%' . $email . '%';
        $stmt->execute([$likeEmail]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Total number of customers
    public function getTotalCustomers() {
        $sql = "SELECT COUNT(*) as total_customers FROM users WHERE user_type = 'customer'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['total_customers'] ?? 0;
    }

    // Average email length
    public function getAverageEmailLength() {
        $sql = "SELECT AVG(CHAR_LENGTH(email)) as avg_email_length FROM users WHERE user_type = 'customer'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return round($data['avg_email_length'], 2) ?? 0;
    }
}
?>
