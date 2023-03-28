<?php
$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);
// Get the input data from the form
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$description = $_POST['description'];

// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "world_of_pets";


// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query
$sql = "INSERT INTO products (name, price, image, category, stock, description) VALUES ('$name', '$price', '$image', '$category', '$stock', '$description')";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Product added successfully";
} else {
  echo "Error adding product: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
