<?php
require "C:/laragon/www/CRUD/common.php"; // Include sanitization helper
require_once 'C:/laragon/www/CRUD/src/DBconnect.php'; // Ensure correct DB connection

if (isset($_POST['submit'])) {
    try {
        $new_user = array(
            "firstname" => escape($_POST['firstname']),
            "lastname" => escape($_POST['lastname']),
            "email" => escape($_POST['email']),
            "age" => escape($_POST['age']),
            "location" => escape($_POST['location'])
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);

        $successMessage = $new_user['firstname'] . ' successfully added!'; // Success message
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

require "templates/header.php";
?>

<h2>Add a User</h2>

<?php if (!empty($successMessage)) : ?>
    <p style="color: green;"><?php echo $successMessage; ?></p>
<?php endif; ?>

<form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" required>

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>

    <label for="age">Age</label>
    <input type="number" name="age" id="age">

    <label for="location">Location</label>
    <input type="text" name="location" id="location">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>

