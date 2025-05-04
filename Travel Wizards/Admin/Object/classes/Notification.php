<?php
class Notification {
    private $conn;
 
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }
 
    // ✅ Create a new notification
    public function createNotification($name, $adminID, $message, $sentAt) {
        // Get all user IDs from users table (excluding admins)
        $result = $this->conn->query("SELECT userID FROM users");
        if (!$result) {
            return false;
        }
   
        $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, name, message, sent_at) VALUES (?, ?, ?, ?)");
   
        while ($row = $result->fetch_assoc()) {
            $userID = $row['userID'];
            $stmt->bind_param("isss", $userID, $name, $message, $sentAt);
            $stmt->execute();
        }
   
        return true;
    }
   
 
    // ✅ Get all notifications (newest first)
    public function getAllNotifications() {
        $query = "SELECT * FROM notifications ORDER BY sent_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    // ✅ Get notifications created by a specific admin
    public function getNotificationsByUser($userID) {
        $stmt = $this->conn->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY sent_at DESC");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    // ✅ Delete a specific notification (if needed)
    public function deleteNotification($id) {
        $stmt = $this->conn->prepare("DELETE FROM notifications WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>