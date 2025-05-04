<?php

class User {
    protected $conn; 
    private $userID;
    private $username;
    private $email;
    private $password;
    private $user_type;

    // Constructor takes $conn and optional $userID as arguments
   

    // Load a single user from the database
    private function loadUser($userID) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        
        if ($user) {
            $this->userID = $user['userID'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
        }
    }

    // Getter methods
    public function getUserID() { return $this->userID; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }

    // Setter methods
    public function setUsername($username) {
        $this->username = $username;
        $stmt = $this->conn->prepare("UPDATE users SET username = ? WHERE userID = ?");
        $stmt->bind_param("si", $username, $this->userID);
        $stmt->execute();
    }

    public function setEmail($email) {
        $this->email = $email;
        $stmt = $this->conn->prepare("UPDATE users SET email = ? WHERE userID = ?");
        $stmt->bind_param("si", $email, $this->userID);
        $stmt->execute();
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE userID = ?");
        $stmt->bind_param("si", $this->password, $this->userID);
        $stmt->execute();
    }

    // ✅ New: Get all users
    public function getAllUsers() {
        $sql = "SELECT userID, username, email, user_type FROM users";
        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Error fetching users: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ✅ New: Search users by email
    public function searchUsersByEmail($email) {
        $sql = "SELECT userID, username, email, user_type FROM users WHERE email LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $likeEmail = '%' . $email . '%';
        $stmt->bind_param("s", $likeEmail);

        if (!$stmt->execute()) {
            throw new Exception("Search failed: " . $stmt->error);
        }

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function setUserType($type) {
    $this->user_type = $type;
    $stmt = $this->conn->prepare("UPDATE users SET user_type = ? WHERE userID = ?");
    $stmt->bind_param("si", $type, $this->userID);
    $stmt->execute();
}
    public function __construct($conn, $userID = null) {
    $this->conn = $conn;
    if ($userID) {
        $this->userID = $userID;
        $this->loadUser($userID);
    }
}


}
?>

