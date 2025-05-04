<?php
session_start();
require_once 'classes/Customer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $customer = new Customer();
    if ($customer->createCustomer($name, $email)) {
        echo "Customer created successfully!";
    } else {
        echo "Error creating customer.";
    }
}
?>
<form action="create_customer.php" method="POST">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <button type="submit">Create Customer</button>
</form>