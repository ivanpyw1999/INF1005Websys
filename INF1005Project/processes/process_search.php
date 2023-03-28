<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Search</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container mt-5">
            <h1>Product Search</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="searchTerm" placeholder="Search by name...">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <?php
            $config = parse_ini_file('../../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);

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

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the search term from the form
                $searchTerm = $_POST['searchTerm'];

                // Call the searchProductsByName function
                $results = searchProductsByName($searchTerm);

                // Display the results as a grid
                if ($results) {
                    echo '<div class="row mt-3">';
                    foreach ($results as $product) {
                        echo '<div class="col-sm-4">';
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $product['name'] . '</h5>';
                        echo '<p class="card-text">' . $product['description'] . '</p>';
                        echo '</div></div></div>';
                    }
                    echo '</div>';
                } else {
                    echo '<p>No results found.</p>';
                }
            }
            ?>

        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>