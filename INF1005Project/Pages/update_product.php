<?php
// Get the updated details of the product
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$description = $_POST['description'];

// Connect to the database
$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query
$sql = "UPDATE products SET name='$name', price='$price', image='$image', category='$category', stock='$stock', description='$description' WHERE id='$id'";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Product updated successfully";
} else {
  echo "Error updating product: " . $
$conn->error;
}

// Close the database connection
$conn->close();
?>