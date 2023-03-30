<?php
session_start();
if($_SESSION["member-id"]=='1'){
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
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Prepare the SQL query
    $sql = "UPDATE products SET name=?, price=?, image=?, category=?, stock=?, description=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisi", $name, $price, $image, $category, $stock, $description, $id);

// Execute the query
    if ($stmt->execute()) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $stmt->error;
    }

// Close the database connection
    $stmt->close();
    $conn->close();
}
?>
