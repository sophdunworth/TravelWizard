<?php

class User {
    protected $conn;
    private $userID;
    private $username;
    private $email;
    private $password;
    private $user_type;

    public function __construct($conn, $userID = null) {
        $this->conn = $conn;
        if ($userID) {
            $this->userID = $userID;
            $this->loadUser($userID);
        }
    }

    // Load a single user from the database
    private function loadUser($userID) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE userID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $this->userID = $user['userID'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            $this->user_type = $user['user_type'];
        }
    }

    // Getter methods
    public function getUserID() { return $this->userID; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }

    // Setter methods
    public function setUsername($username) {
        $this->username = $username;
        $stmt = $this->conn->prepare("UPDATE users SET username = :username WHERE userID = :userID");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userID', $this->userID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function setEmail($email) {
        $this->email = $email;
        $stmt = $this->conn->prepare("UPDATE users SET email = :email WHERE userID = :userID");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':userID', $this->userID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE userID = :userID");
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':userID', $this->userID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function setUserType($type) {
        $this->user_type = $type;
        $stmt = $this->conn->prepare("UPDATE users SET user_type = :user_type WHERE userID = :userID");
        $stmt->bindParam(':user_type', $type);
        $stmt->bindParam(':userID', $this->userID, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Get all users
    public function getAllUsers() {
        $sql = "SELECT userID, username, email, user_type FROM users";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search users by email
    public function searchUsersByEmail($email) {
        $sql = "SELECT userID, username, email, user_type FROM users WHERE email LIKE :email";
        $stmt = $this->conn->prepare($sql);
        $likeEmail = '%' . $email . '%';
        $stmt->bindParam(':email', $likeEmail);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
    public function isValidPassword($password) {
        // Rule 1: Password must be at least 9 characters
        if (strlen($password) < 9) {
            return false;
        }

        // Rule 2: Password must contain at least one special character
        if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
            return false;
        }

        return true;
    }
}
?>


