<?php
 
 
class ContactUsRequest {
    private $conn;
 
    public function __construct() {
		require_once __DIR__ . '/../db1.php';
        $this->conn = $conn;
    }
 
    public function getAllRequests() {
        $query = "SELECT * FROM contactusrequests ORDER BY created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    public function markAsAnswered($id, $adminID) {
        $query = "UPDATE contactusrequests SET answered = 1, admin_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $adminID, $id);
        return $stmt->execute();
    }
   
    public function getRequestByID($id) {
    $stmt = $this->conn->prepare("SELECT * FROM contactusrequests WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
 
public function submitResponse($id, $adminID, $response) {
    $stmt = $this->conn->prepare("UPDATE contactusrequests SET answered = 1, admin_id = ?, response = ? WHERE id = ?");
    $stmt->bind_param("isi", $adminID, $response, $id);
    return $stmt->execute();
}
 
 
}
?>