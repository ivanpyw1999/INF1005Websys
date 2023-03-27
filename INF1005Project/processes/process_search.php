<?php
require_once('products.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the search term from the POST parameters
    $searchTerm = $_POST['searchTerm'];

    // Call the searchProductsByName function
    $results = searchProductsByName($searchTerm);

    // Return the results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
}
?>