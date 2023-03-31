 <?php


$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);
// Get the search term from the POST parameters
$searchTerm = $_POST['search'];
if (empty($_POST["search"])) {

}else{
// Call the searchProductsByName function
//$results = searchProductsByName($searchTerm);

// Return the results as JSON
header("Location: http://35.212.251.123/PhpProject2/Pages/ProductList.php?search=" + $searchTerm);
die();


}


?>