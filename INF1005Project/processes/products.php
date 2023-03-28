<?php
$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

function getProductById($id) {
  global $conn;
  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");

  // Bind the parameters
  $stmt->bind_param("i", $id);

  // Execute the statement
  $stmt->execute();

  // Get the result set
  $result = $stmt->get_result();

  // Get the first row (there should only be one)
  $product = $result->fetch_assoc();

  // Close the connection
  $conn->close();

  return $product;
}

function updateProduct($id, $name, $price, $image, $category, $stock, $description) {
  global $conn;
  // Prepare the SQL statement
  $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, image = ?, category = ?, stock = ?, description = ? WHERE id = ?");

  // Bind the parameters
  $stmt->bind_param("sdssssi", $name, $price, $image, $category, $stock, $description, $id);

  // Execute the statement
  $stmt->execute();

  // Close the connection
  $conn->close();
}

function deleteProduct($id) {

  global $conn;
  // Prepare the SQL statement
  $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");

  // Bind the parameters
  $stmt->bind_param("i", $id);

  // Execute the statement
  $stmt->execute();

  // Close the connection
  $conn->close();
}


function createProduct($name, $price, $image, $category, $stock, $description) {

  global $conn;
  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO products (name, price, image, category, stock, description) VALUES (?, ?, ?, ?, ?, ?)");

  // Bind the parameters
  $stmt->bind_param("sdsssi", $name, $price, $image, $category, $stock, $description);

  // Execute the statement
  $stmt->execute();

  // Close the connection
  $conn->close();
}



function searchProductsByName($searchTerm) {
  
  global $conn;
  $sql = "SELECT * FROM products WHERE name LIKE ?";
  $stmt = $conn->prepare($sql);
  $searchTerm = '%' . $searchTerm . '%';
  $stmt->bind_param('s', $searchTerm);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $products = array();
    while ($row = $result->fetch_assoc()) {
      $products[] = $row;
    }
    return $products;
  } else {
    return null;
  }
}


function searchProductsByCategory($searchTerm) {
  
  global $conn;
  $sql = "SELECT * FROM products WHERE category = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $searchTerm);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $products = array();
    while ($row = $result->fetch_assoc()) {
      $products[] = $row;
    }
    return $products;
  } else {
    return null;
  }
}

if(isset($_POST['action'])) {
  $action = $_POST['action'];
  // Call the corresponding function based on the action
  switch ($action) {
    case 'getProductById':
      $id = $_POST['id'];
      $product = getProductById($id);
      // Output the product in JSON format
      echo json_encode($product);
      break;

    case 'updateProduct':
      $id = $_POST['id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $category = $_POST['category'];
      $stock = $_POST['stock'];
      $description = $_POST['description'];
      updateProduct($id, $name, $price, $image, $category, $stock, $description);
      break;

    case 'deleteProduct':
      $id = $_POST['id'];
      deleteProduct($id);
      break;

    case 'createProduct':
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $category = $_POST['category'];
      $stock = $_POST['stock'];
      $description = $_POST['description'];
      createProduct($name, $price, $image, $category, $stock, $description);
      break;

    case 'searchProductsByName':
      $searchTerm = $_POST['searchTerm'];
      $products = searchProductsByName($searchTerm);
      // Output the products in JSON format
      echo json_encode($products);
      break;

    case 'searchProductsByCategory':
      $searchTerm = $_POST['searchTerm'];
      $products = searchProductsByCategory($searchTerm);
      // Output the products in JSON format
      echo json_encode($products);
      break;

  
}
}
?>