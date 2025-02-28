<?php
/**
 * Function to query information based on a parameter: location.
 */

require "C:/laragon/www/CRUD/common.php"; // Ensure common functions are loaded
require_once 'C:/laragon/www/CRUD/src/DBconnect.php'; // Ensure database connection

$result = [];

if (isset($_POST['submit'])) {
    try {
        $sql = "SELECT * FROM users WHERE location = :location";
        $location = escape($_POST['location']); // Escape input for security
        $statement = $connection->prepare($sql);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

require "templates/header.php";
?>

<h2>Find User Based on Location</h2>

<form method="post">
    <label for="location">Location</label>
    <input type="text" id="location" name="location" required>
    <input type="submit" name="submit" value="View Results">
</form>

<?php if (isset($_POST['submit'])): ?>
    <?php if (!empty($result)): ?>
        <h2>Results</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo escape($row["id"]); ?></td>
                        <td><?php echo escape($row["firstname"]); ?></td>
                        <td><?php echo escape($row["lastname"]); ?></td>
                        <td><?php echo escape($row["email"]); ?></td>
                        <td><?php echo escape($row["age"]); ?></td>
                        <td><?php echo escape($row["location"]); ?></td>
                        <td><?php echo escape($row["date"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found for <strong><?php echo escape($_POST['location']); ?></strong>.</p>
    <?php endif; ?>
<?php endif; ?>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>

