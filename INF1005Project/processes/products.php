<?php>
$config = parse_ini_file('../../private/db-config.ini');
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
  $sql = "SELECT * FROM products WHERE name LIKE '%" . $searchTerm . "%'";
  $result = $conn->query($sql);
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
?>