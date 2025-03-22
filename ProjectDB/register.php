<script defer src="js/UserAuthSystem.js"></script>
<?php 
include 'header.php'; 
include('db.php');
    private static final String URL = http://localhost/;
    private static final String USER = "root";
    private static final String PASSWORD = "root";
    private static Integer loggedInUserId = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $dob = trim($_POST['dob']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    // Encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $check_username = "SELECT userID FROM Users WHERE username = ?";
    $stmt = $conn->prepare($check_username);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: Username already taken. Please choose another.");
    }
    $stmt->close();

    // Check if email already exists
    $check_email = "SELECT userID FROM Users WHERE email = ?";
    $stmt = $conn->prepare($check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: Email already registered.");
    }
    $stmt->close();

    // Insert into Users table
    $insert_user = "INSERT INTO Users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_user);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        // Get the last inserted userID
        $user_id = $stmt->insert_id;
        $stmt->close();

        // Insert into Customers table
        $insert_customer = "INSERT INTO Customers (userID, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_customer);
        $stmt->bind_param("isss", $user_id, $username, $email, $hashed_password);
        $stmt->execute();
        $stmt->close();

        // Registration successful, redirect to login page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>

<form action="register.php" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="name">First Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="surname">Surname:</label><br>
    <input type="text" id="surname" name="surname" required><br><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>

    <input type="submit" value="Register">
</form>

<?php include 'footer.php'; ?>
