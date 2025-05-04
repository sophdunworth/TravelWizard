<?php
require_once 'db1.php';              // Include DB connection
require_once 'classes/User.php';     // Include User class

if (isset($_POST['submit'])) {
    try {
        // Sanitize and store input data
        $user_data = array(
            "userID"    => escape($_POST['userID']),
            "username"  => escape(($_POST['username'] ?? '')),
            "email"     => escape(($_POST['email'] ?? '')),
            "user_type" => escape(($_POST['user_type'] ?? ''))
        );

        // Validate inputs
        if (
            $user_data['userID'] <= 0 ||
            empty($user_data['username']) ||
            !filter_var($user_data['email'], FILTER_VALIDATE_EMAIL) ||
            !in_array($user_data['user_type'], ['admin', 'customer'])
        ) {
            throw new Exception("Invalid input");
        }

        // Update main users table via User class
        $user = new User($conn, $user_data['userID']);
        $user->setUsername($user_data['username']);
        $user->setEmail($user_data['email']);
        $user->setUserType($user_data['user_type']);

        // Update role-specific tables
        if ($user_data['user_type'] === 'admin') {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM admins WHERE userID = :userID");
            $stmt->execute(["userID" => $user_data['userID']]);
            if ($stmt->fetchColumn()) {
                $update = $conn->prepare("UPDATE admins SET adminName = :username WHERE userID = :userID");
                $update->execute([
                    "username" => $user_data['username'],
                    "userID"   => $user_data['userID']
                ]);
            }
        } else {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM customers WHERE userID = :userID");
            $stmt->execute(["userID" => $user_data['userID']]);
            if ($stmt->fetchColumn()) {
                $update = $conn->prepare("UPDATE customers SET username = :username, email = :email WHERE userID = :userID");
                $update->execute([
                    "username" => $user_data['username'],
                    "email"    => $user_data['email'],
                    "userID"   => $user_data['userID']
                ]);
            }
        }

        // Redirect on success
        header("Location: manage_users.php?success=User+updated+successfully");
        exit();

    } catch (Exception $e) {
        error_log("❌ Update error: " . $e->getMessage());
        header("Location: manage_users.php?error=" . urlencode($e->getMessage()));
        exit();
    }
}
?>

