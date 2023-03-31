
<?php
session_start();
if($_SESSION["member-id"]!='1'){
    header("Location: ErrorHandling.php");
    exit();
}
?>

<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="en">
    <head>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/accountPages.css">

        <!--jQuery-->
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <!--Bootstrap JS-->
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                crossorigin="anonymous">
        </script>
        <!-- Custom JS -->
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class = "d-flex flex-column min-vh-100">
        <?php
        include "nav.inc.php";
        ?>
        <main class="container-fluid px-3 px-md-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="fw-bold mb-2 mb-md-4 mt-2">Admin Page</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 px-0 px-md-3">
                    <div class="nav nav-pills d-flex flex-md-column justify-content-center" id="v-pills-tab">
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark active" id="stats-tab" data-toggle="pill" href="#stats" role="tab" aria-controls="stats" aria-selected="true">Statistics</a>
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark" id="add-product-tab" data-toggle="pill" href="#add-product" role="tab" aria-controls="add-product" aria-selected="false">Add Products</a>
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark" id="delete-product-tab" data-toggle="pill" href="#delete-product" role="tab" aria-controls="delete-product" aria-selected="false">Delete Products</a>
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark" id="modify-product-tab" data-toggle="pill" href="#modify-product" role="tab" aria-controls="modify-product" aria-selected="false">Modify Products</a>
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark" id="feedback-tab" data-toggle="pill" href="#feedback" role="tab" aria-controls="feedback" aria-selected="false">View Feedback</a>

                    </div>
                </div>

                <div class="col-sm-12 col-md-9 mt-0 mt-md-2 py-4 px-5 bg-light rounded">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                            <div class="row">

                            </div>
                            <!--Personal-Information-View-->
                            <div id="stats-view">


                                <div class="row gx-lg-5">
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card bg-light border-0 h-100">
                                            <div class="card-body shadow bg-white rounded-3 text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                                <h4 class="fs-4 fw-bold">Total Earned</h4>
                                                <p class="mb-0"><?php
// parse the configuration file
                                                    $config = parse_ini_file('../../../private/db-config.ini');

// create a new MySQLi connection
                                                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// check for connection errors
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }

// construct the SQL query to retrieve the total price
                                                    $sql = "SELECT SUM(price) AS total_price FROM orderhistory";

// execute the query and fetch the result
                                                    $result = $conn->query($sql);
                                                    $row = $result->fetch_assoc();

// print the total price
                                                    echo "Total price: $" . $row["total_price"];

// close the MySQLi connection
                                                    $conn->close();
                                                    ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card bg-light border-0 h-100">
                                            <div class="card-body shadow bg-white rounded-3 text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                                <h4 class="fs-4 fw-bold">Total Registered Users</h4>
                                                <p class="mb-0">
                                                    <?php
// parse the configuration file
                                                    $config = parse_ini_file('../../../private/db-config.ini');

// create a new MySQLi connection
                                                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// check for connection errors
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }

// construct the SQL query to count the number of rows in the users table
                                                    $sql = "SELECT COUNT(*) AS num_users FROM users";

// execute the query and fetch the result
                                                    $result = $conn->query($sql);
                                                    $row = $result->fetch_assoc();

// print the number of rows in the users table
                                                    echo "Number of users: " . $row["num_users"];

// close the MySQLi connection
                                                    $conn->close();
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card bg-light border-0 h-100">
                                            <div class="card-body shadow bg-white rounded-3 text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                                <h4 class="fs-4 fw-bold">Number of sales</h4>
                                                <p class="mb-0">
                                                    <?php
// parse the configuration file
                                                    $config = parse_ini_file('../../../private/db-config.ini');

// create a new MySQLi connection
                                                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// check for connection errors
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }

// construct the SQL query to count the number of rows in the orderhistory table
                                                    $sql = "SELECT COUNT(*) AS num_orders FROM orderhistory";

// execute the query and fetch the result
                                                    $result = $conn->query($sql);
                                                    $row = $result->fetch_assoc();

// print the number of rows in the orderhistory table
                                                    echo "Number of orders: " . $row["num_orders"];

// close the MySQLi connection
                                                    $conn->close();
                                                    ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card bg-light border-0 h-100">
                                            <div class="card-body shadow bg-white rounded-3 text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                                <h4 class="fs-4 fw-bold">Average Earned Per Purchase</h4>
                                                <p class="mb-0">
                                                    <?php
// parse the configuration file
                                                    $config = parse_ini_file('../../../private/db-config.ini');

// create a new MySQLi connection
                                                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// check for connection errors
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }

// construct the SQL query to calculate the total price and number of rows in the orderhistory table
                                                    $sql = "SELECT SUM(price) AS total_price, COUNT(*) AS num_orders FROM orderhistory";

// execute the query and fetch the result
                                                    $result = $conn->query($sql);
                                                    $row = $result->fetch_assoc();

// calculate the average price per order
                                                    if ($row["num_orders"] > 0) {
                                                        $avg_price = $row["total_price"] / $row["num_orders"];
                                                    } else {
                                                        $avg_price = 0;
                                                    }

// print the average price per order
                                                    echo "Average price per order: " . $avg_price;

// close the MySQLi connection
                                                    $conn->close();
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>



                        <div class="tab-pane fade show" id="add-product" role="tabpanel" aria-labelledby="add-product-tab">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold">Add Product</h3>
                                </div>
                            </div>
                            <!--Personal-Information-View-->
                            <div id="add-product-view">
                                <div class="row">
                                    <div class="col align-self-center">
                                        New Product
                                    </div>

                                </div>
                                <hr/>
                                <form method="POST" action="add_product.php">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" class="form-control" id="price" name="price" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="text" class="form-control" id="image" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock:</label>
                                        <input type="number" class="form-control" id="stock" name="stock" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" id="description" name="description" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Add Product</button>
                                </form>



                            </div>

                        </div>

                        <!--Order History-->
                        <div class="tab-pane fade 50vh" id="delete-product" role="tabpanel" aria-labelledby="delete-product-tab">
                            <div id="delete-product-view">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Delete Product</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="delete_product.php">
                                            <div class="form-group">
                                                <label for="id">Product ID:</label>
                                                <input type="number" class="form-control" id="id" name="id" required>
                                            </div>
                                            <button type="submit" class="btn btn-dark">Delete Product</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--Change Password-->
                        <div class="tab-pane fade" id="modify-product" role="tabpanel" aria-labelledby="modify-product-tab">
                            <!--Change Password Check-->
                            <div id="modify-product-check">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Modify Product</h3>
                                    </div>                                    
                                </div>
                                <hr/>
                                <form method="POST" action="update_product.php">
                                    <div class="form-group">
                                        <label for="id">Product ID:</label>
                                        <input type="number" class="form-control" id="id" name="id" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" class="form-control" id="price" name="price" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="text" class="form-control" id="image" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock:</label>
                                        <input type="number" class="form-control" id="stock" name="stock" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Update Product</button>
                                </form>
                            </div>              
                        </div>

                        <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                            <!--Change Password Check-->
                            <div id="feedback-check">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Feedbacks</h3>
                                    </div>                                    
                                </div>
                                <hr/>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No feedback found</td></tr>";
}
$conn->close();
?>
                                    </tbody>
                                </table>
                            </div>              
                        </div>

                    </div>
                </div>
            </div>
            <br/>
        </main>
<?php
include "footer.inc.php";
?>

    </body>
</html>

