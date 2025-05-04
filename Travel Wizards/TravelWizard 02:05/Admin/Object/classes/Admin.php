<?php
require_once 'User.php';    
require_once  'db1.php'; 

class Admin extends User {
    private $adminName;
    private $email;
    private $userID;
    private $password;

    /**
     * Constructor optionally accepts userID and adminName
     */
    public function __construct($conn, $userID = null, $adminName = null) {
        parent::__construct($conn, $userID);
        $this->userID = $userID;
        if ($adminName) {
            $this->adminName = $adminName;
        }
    }

    /**
     * Create only an admin 
     */
    public function createAdmin($adminName, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO admins (adminName, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$adminName, $email, $hashedPassword]);
    }

    /**
     * Create both a user and an admin in a single transaction
     */
    public function createAdminAndUser($adminName, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $this->conn->beginTransaction();

            // Insert into users table
            $stmtUser = $this->conn->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, 'admin')");
            $stmtUser->execute([$adminName, $email, $hashedPassword]);

            // Get the generated userID
            $userID = $this->conn->lastInsertId();

            // Insert into admins table
            $stmtAdmin = $this->conn->prepare("INSERT INTO admins (userID, adminName, password) VALUES (?, ?, ?)");
            $stmtAdmin->execute([$userID, $adminName, $hashedPassword]);

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "❌ DB ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Update admin name in both admins and users tables
     */
    public function updateAdmin($adminID, $newName) {
        try {
            // Update in admins table
            $stmtAdmin = $this->conn->prepare("UPDATE admins SET adminName = ? WHERE userID = ?");
            $stmtAdmin->execute([$newName, $adminID]);

            // Update in users table
            $stmtUser = $this->conn->prepare("UPDATE users SET username = ? WHERE userID = ?");
            $stmtUser->execute([$newName, $adminID]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Get all admins from the admins table
     */
    public function getAllAdmins() {
        $stmt = $this->conn->prepare("SELECT * FROM admins");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Update the admin name 
     */
    public function setAdminName($adminName) {
        $this->adminName = $adminName;
        $userID = $this->getUserID();

        if (!$userID) {
            throw new Exception("❌ No valid userID found.");
        }

        $stmt = $this->conn->prepare("UPDATE admins SET adminName = ? WHERE userID = ?");
        if (!$stmt->execute([$adminName, $userID])) {
            throw new Exception("❌ Failed to update admin name.");
        }
    }

    /**
     * Update admin password in the users table
     */
    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE userID = ?");
        if (!$stmt->execute([$this->password, $this->getUserID()])) {
            throw new Exception("❌ Failed to update password.");
        }
    }

    /**
     * Create an admin using an existing userID
     */
    public function createAdminWithID($userID, $adminName, $password, $email = null) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO admins (userID, adminName, email, password) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userID, $adminName, $email, $hashedPassword]);
    }

    /**
     * Delete an admin from both admins and users tables
     */
    public function deleteAdmin($userID) {
        try {
            // Delete from admins table
            $stmtAdmin = $this->conn->prepare("DELETE FROM admins WHERE userID = ?");
            $stmtAdmin->execute([$userID]);

            // Delete from users table
            $stmtUser = $this->conn->prepare("DELETE FROM users WHERE userID = ?");
            $stmtUser->execute([$userID]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // === Getters ===

    public function getAdminName() {
        return $this->adminName;
    }

    public function getEmail() {
        return $this->email;
    }
}
?>



