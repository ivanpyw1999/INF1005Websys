<?php


$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);
    // Get the search term from the POST parameters
    $searchTerm = $_POST['searchTerm'];
    if (empty($_POST["searchTerm"])) {
        $errorMsg .= "empty search term";
        echo $errorMsg;
    }else{
    // Call the searchProductsByName function
    $results = searchProductsByName($searchTerm);

    // Return the results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
    
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

?>