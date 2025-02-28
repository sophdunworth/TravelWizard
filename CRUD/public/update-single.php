<?php
require "../common.php";
require_once '../src/DBconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "User not found!";
            exit;
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

if (isset($_POST['submit'])) {
    try {
        // ✅ Corrected SQL statement (removed `id = :id`)
        $sql = "UPDATE users 
                SET firstname = :firstname, lastname = :lastname, email = :email, age = :age, location = :location 
                WHERE id = :id";

        $statement = $connection->prepare($sql);

        $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $statement->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindParam(':age', $_POST['age'], PDO::PARAM_INT);
        $statement->bindParam(':location', $_POST['location'], PDO::PARAM_STR);

        $statement->execute();

        echo "✅ User updated successfully!";
    } catch (PDOException $error) {
        echo "❌ Error updating user: " . $error->getMessage();
    }
}

?>

<?php require "templates/header.php"; ?>

<h2>Edit User</h2>
<form method="post">
    <input type="hidden" name="id" value="<?php echo escape($user['id']); ?>">
    
    <label>First Name:</label>
    <input type="text" name="firstname" value="<?php echo escape($user['firstname']); ?>" required>
    
    <label>Last Name:</label>
    <input type="text" name="lastname" value="<?php echo escape($user['lastname']); ?>" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo escape($user['email']); ?>" required>
    
    <label>Age:</label>
    <input type="number" name="age" value="<?php echo escape($user['age']); ?>" required>
    
    <label>Location:</label>
    <input type="text" name="location" value="<?php echo escape($user['location']); ?>" required>
    
    <input type="submit" name="submit" value="Update">
</form>

<a href="update.php">Back to user list</a>

<?php require "templates/footer.php"; ?>
