
<?php 
session_start(); // Start session at the beginning
include 'header.php'; 
include('db.php'); // Ensure database connection


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Secure login with prepared statements
    $sql = "SELECT userID, password FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Store user session details
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;

            header("Location: index.php"); // Redirect to dashboard or homepage
            exit();
        } 
    }
    
    // Generic error message for security
    echo "<p style='color:red;'>Invalid email or password. Please try again.</p>";

    $stmt->close();
    $conn->close();
}
?>

<form action="login.php" method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<?php include 'footer.php'; ?>
