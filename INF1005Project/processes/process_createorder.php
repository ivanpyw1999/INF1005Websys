<?php
require_once('order.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order details from the POST parameters
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];

    // Call the createOrder function to add the order to the database
    createOrder($user_id, $name, $price, $image, $quantity, $product_id);

    // Return a success message
    echo "Order added successfully!";
}
?>