<?php

session_start();

$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Prepare the SQL statement with placeholders
$stmt = $conn->prepare("INSERT INTO `world_of_pets`.`order` (`user_id`, `name`, `price`, `quantity`) VALUES (?, ?, ?, ?)");

// Bind the values from the form to the placeholders
$stmt->bind_param("isdi", $user_id, $name, $price, $quantity);
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// Execute the prepared statement
if ($stmt->execute()) {
    // Redirect to a success page
    header('Location: success.html');
    exit;
} else {
    // Redirect to an error page
    header('Location: error.html');
    exit;
}
?>
