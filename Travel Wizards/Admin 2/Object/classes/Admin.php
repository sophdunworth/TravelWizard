<?php
require_once 'User.php';
require_once 'db1.php';

class Admin extends User {
    private $adminName;
    private $userID;
    private $password;

    // Constructor
    public function __construct($conn, $userID = null, $adminName = null) {
        // Ensure that $conn is passed to the parent (User) constructor
        parent::__construct($conn, $userID);  // Pass $conn to User class constructor
        
        if ($adminName) {
            $this->adminName = $adminName;  // Set adminName if provided
        }
    }

    // Method to create a new admin
    public function createAdmin($adminName, $password) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the query to insert the new admin
        $stmt = $this->conn->prepare("INSERT INTO admins (adminName, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $adminName, $hashedPassword);

        return $stmt->execute();
    }

    // Method to update the admin's name based on their userID (or adminID)
    public function updateAdmin($adminID, $newName) {
        // Prepare the query to update the admin's name
        $stmt = $this->conn->prepare("UPDATE admins SET adminName = ? WHERE userID = ?");
        $stmt->bind_param("si", $newName, $adminID); // "s" for string, "i" for integer

        return $stmt->execute();  // Execute the update query
    }

    public function getAdminName() {
        return $this->adminName;
    }

    public function setAdminName($adminName) {
    $this->adminName = $adminName;
    $userID = $this->getUserID();  // Might be NULL or wrong

    if (!$userID) {
        echo "❌ No valid userID found in object.";
        return;
    }

    $stmt = $this->conn->prepare("UPDATE admins SET adminName = ? WHERE userID = ?");
    if (!$stmt) {
        echo "❌ SQL prepare failed: " . $this->conn->error;
        return;
    }

    $stmt->bind_param("si", $adminName, $userID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "✅ Admin name updated to: $adminName";
        } else {
            echo "⚠️ Update executed, but nothing changed. (userID: $userID)";
        }
    } else {
        echo "❌ SQL execute failed: " . $stmt->error;
    }

    $stmt->close();
}





    public function setPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE userID = ?");
    $stmt->bind_param("si", $this->password, $this->userID);
    $stmt->execute();
}


    // Method to get all admins (fetch all records from the database)
    public function getAllAdmins() {
        // Ensure $conn is used for query execution
        $stmt = $this->conn->prepare("SELECT * FROM admins");
        $stmt->execute();
        $result = $stmt->get_result();
        $admins = [];

        // Fetch all admins
        while ($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }

        return $admins;
    }
    
    // In Admin.php
public function createAdminWithID($userID, $adminName, $password) {
    $stmt = $this->conn->prepare("INSERT INTO admins (userID, adminName, password) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userID, $adminName, $password);
    return $stmt->execute();
}


}
?>
