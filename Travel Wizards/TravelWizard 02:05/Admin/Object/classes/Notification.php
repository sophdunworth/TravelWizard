<?php
require_once 'db1.php';  
 
class Notification {
    private $conn;
 
    // Constructor: inject PDO connection
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }
 
    // Create a new notification and send it to all users
    public function createNotification($name, $adminID, $message, $sentAt) {
        try {
            // Fetch all user IDs
            $result = $this->conn->query("SELECT userID FROM users");
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
 
            // Prepare insert statement
            $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, name, message, sent_at) VALUES (?, ?, ?, ?)");
 
            foreach ($users as $row) {
                $userID = $row['userID'];
                $stmt->execute([$userID, $name, $message, $sentAt]);
            }
 
            return true;
        } catch (PDOException $e) {
            // Log or echo error if needed
            error_log("Error creating notifications: " . $e->getMessage());
            return false;
        }
    }
 
    // Retrieve all notifications ordered by sent date
    public function getAllNotifications() {
        $stmt = $this->conn->query("SELECT * FROM notifications ORDER BY sent_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    // Get all notifications for a specific user
    public function getNotificationsByUser($userID) {
        $stmt = $this->conn->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY sent_at DESC");
        $stmt->execute([$userID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    // Delete a specific notification by ID
    public function deleteNotification($id) {
        $stmt = $this->conn->prepare("DELETE FROM notifications WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>


