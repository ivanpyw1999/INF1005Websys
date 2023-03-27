<?php
$config = parse_ini_file('../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Create Function (C)
function createOrder($user_id, $name, $price, $image, $quantity, $product_id) {
  global $conn;
  $stmt = $conn->prepare("INSERT INTO orders (user_id, name, price, image, quantity, product_id) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdssi", $user_id, $name, $price, $image, $quantity, $product_id);
  $stmt->execute();
}

// Read Function (R)
function getOrderById($id) {
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $order = $result->fetch_assoc();
  return $order;
}

// Update Function (U)
function updateOrder($id, $user_id, $name, $price, $image, $quantity, $product_id) {
  global $conn;
  $stmt = $conn->prepare("UPDATE orders SET user_id = ?, name = ?, price = ?, image = ?, quantity = ?, product_id = ? WHERE id = ?");
  $stmt->bind_param("ssdssii", $user_id, $name, $price, $image, $quantity, $product_id, $id);
  $stmt->execute();
}

// Delete Function (D)
function deleteOrder($id) {
  global $conn;
  $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

// Close the connection
$conn->close();
?>
