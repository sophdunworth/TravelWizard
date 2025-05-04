<?php
require_once(__DIR__ . '/../db1.php');

class User {
    protected $conn;
    private $userID;
    private $username;
    private $email;
    private $password;
    private $user_type;

    /**
     * Constructor: Accepts a PDO connection and optionally loads a user by ID
     */
    public function __construct($conn, $userID = null) {
        $this->conn = $conn;
        if ($userID) {
            $this->userID = $userID;
            $this->loadUser($userID); // Load user data from database
        }
    }

    /**
     * Loads a user's data from the database and populates the object properties
     */
    private function loadUser($userID) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE userID = ?");
        $stmt->execute([$userID]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $this->userID = $user['userID'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            $this->user_type = $user['user_type'];
        }
    }

    // === Getter methods ===

    public function getUserID() {
        return $this->userID;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    // === Setter methods that also update the database ===

    /**
     * Updates the username property and saves it to the database
     */
    public function setUsername($username) {
        $this->username = $username;
        $stmt = $this->conn->prepare("UPDATE users SET username = ? WHERE userID = ?");
        $stmt->execute([$this->username, $this->userID]);
    }

    /**
     * Updates the email property and saves it to the database
     */
    public function setEmail($email) {
        $this->email = $email;
        $stmt = $this->conn->prepare("UPDATE users SET email = ? WHERE userID = ?");
        $stmt->execute([$this->email, $this->userID]);
    }

    /**
     * Hashes and updates the password in the database
     */
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE userID = ?");
        $stmt->execute([$this->password, $this->userID]);
    }

    /**
     * Updates the user type  in the database
     */
    public function setUserType($type) {
        $this->user_type = $type;
        $stmt = $this->conn->prepare("UPDATE users SET user_type = ? WHERE userID = ?");
        $stmt->execute([$this->user_type, $this->userID]);
    }

    /**
     * Fetches all users from the database
     */
    public function getAllUsers() {
        $sql = "SELECT userID, username, email, user_type FROM users";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Searches users by partial email match
     */
    public function searchUsersByEmail($email) {
        $sql = "SELECT userID, username, email, user_type FROM users WHERE email LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['%' . $email . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

