<?php

$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Get the HTTP request method
$request_method = $_SERVER['REQUEST_METHOD'];

// Only allow POST requests
if ($request_method == 'POST') {

    // Get the input parameters from the POST request
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];
    if (!isset($user_id)) {
        die('Error: Missing required parameter "user_id".');
    }

    if (!isset($name)) {
        die('Error: Missing required parameter "name".');
    }

    if (!isset($price)) {
        die('Error: Missing required parameter "price".');
    }

    if (!isset($image)) {
        die('Error: Missing required parameter "image".');
    }

    if (!isset($quantity)) {
        die('Error: Missing required parameter "quantity".');
    }
    // Check the value of the "action" parameter to determine which function to call
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            echo "Creating order...";
            createOrder($user_id, $name, $price, $image, $quantity);
            echo "Created order";
            break;
        case 'read':
            $id = $_POST['id'];
            $order = getOrderById($id);
            // Do something with the $order object
            break;
        case 'update':
            $id = $_POST['id'];
            updateOrder($id, $user_id, $name, $price, $image, $quantity);
            break;
        case 'delete':
            $id = $_POST['id'];
            deleteOrder($id);
            break;
        default:
            // Invalid action parameter
            break;
    }
} else {
    // Invalid request method
}

// Create Function (C)
function createOrder($user_id, $name, $price, $image, $quantity) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO `order` (user_id, name, price, image, quantity) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $user_id, $name, $price, $image, $quantity);
    $stmt->execute();
}

// Read Function (R)
function getOrderById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `order` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
    return $order;
}

// Update Function (U)
function updateOrder($id, $user_id, $name, $price, $image, $quantity) {
    global $conn;
    $stmt = $conn->prepare("UPDATE `order` SET user_id = ?, name = ?, price = ?, image = ?, quantity = ? WHERE id = ?");
    $stmt->bind_param("ssdssi", $user_id, $name, $price, $image, $quantity, $id);
    $stmt->execute();
}

// Delete Function (D)
function deleteOrder($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM `order` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Close the connection
$conn->close();
?>
