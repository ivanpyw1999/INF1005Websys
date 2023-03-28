<?php
// Get the ID of the product to delete
$id = $_POST['id'];

// Connect to the database
$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query
$sql = "DELETE FROM products WHERE id = $id";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Product deleted successfully";
} else {
  echo "Error deleting product: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
