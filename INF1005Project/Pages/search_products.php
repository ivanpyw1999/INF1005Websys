<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Products</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container my-4">
            <form action="search_products.php" method="get">
                <div class="form-group">
                    <label for="search">Search Products:</label>
                    <input type="text" class="form-control" id="search" name="search" required>
                </div>
                <div class="form-group">
                    <label>Category Filters:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="top" name="category[]" value="Top">
                        <label class="form-check-label" for="top">Top</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="bottom" name="category[]" value="Bottom">
                        <label class="form-check-label" for="bottom">Bottom</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="jeans" name="category[]" value="Jeans">
                        <label class="form-check-label" for="jeans">Jeans</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="outwear" name="category[]" value="Outwear">
                        <label class="form-check-label" for="outwear">Outwear</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="shoes" name="category[]" value="Shoes">
                        <label class="form-check-label" for="shoes">Shoes</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <?php
// Retrieve the search term and category filters from the URL parameters
        $searchTerm = $_GET["search"];
        $categoryFilters = $_GET["category"];

// Build the SQL query
        $sql = "SELECT * FROM products WHERE name LIKE ?";

        $types = "s";
        $params = array("%$searchTerm%");

        if (!empty($categoryFilters)) {
            $inClause = implode(",", array_fill(0, count($categoryFilters), "?"));
            $sql .= " AND category IN ($inClause)";

            $types .= str_repeat("s", count($categoryFilters));
            $params = array_merge($params, $categoryFilters);
        }

// Connect to the database
        $config = parse_ini_file('../../../private/db-config.ini');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }

// Bind the parameters
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

// Execute the SQL query
        $result = $stmt->execute();
        if (!$result) {
            echo "Error executing statement: " . $stmt->error;
            exit;
        }

// Get the result set
        $result = $stmt->get_result();

// Display the results
        if ($result->num_rows > 0) {
            echo "<div class='container'>";
            echo "<h1>Search Results</h1>";
            echo "<div class='row'>";

            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card'>";
                echo "<img src='" . $row["image"] . "' class='card-img-top' alt='" . $row["name"] . "' style='width: 320px; height: 200px;'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row["name"] . "</h5>";
                echo "<p class='card-text'>" . $row["description"] . "</p>";
                echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item'>Price: $" . number_format($row["price"], 2) . "</li>";
                echo "<li class='list-group-item'>Category: " . $row["category"] . "</li>";
                echo "<li class='list-group-item'>Stock: " . $row["stock"] . "</li>";
                echo "</ul>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<p>No products found.</p>";
        }

// Close the database connection
        $stmt->close();
        $conn->close();
        ?>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    </body>
</html>
