<?php
// Start session
session_start();

// Connect to database
$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from URL parameter
$product_id = $_GET['id'];

// Query database to get product information
$stmt = $conn->prepare("SELECT name, price, stock FROM products WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Get quantity from HTML element
$quantity = $_POST['quantity'];

// Calculate price
$price = $product['price'];

// Get user ID from session
$user_id = $_SESSION["member-id"];

// Insert order into database
$stmt = $conn->prepare("INSERT INTO `order` (`user_id`, `name`, `price`, `quantity`) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die("Error: " . $conn->error); // check for any errors
}
$stmt->bind_param("isdi", $user_id, $product['name'], $price, $quantity);
$stmt->execute();

// Redirect to shopping cart page
header('Location: ShoppingCart.php');
exit;
?>
