<!DOCTYPE html>
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

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="../css/products.css">
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
        <script defer src="js/main.js"></script>

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class = "d-flex flex-column min-vh-100">
        <?php
        include "nav.inc.php";
        ?>



        <main class ="productlistmain">
            <div class='productlistdiv'>

                <div class="productbodydiv">
                    <div class="productfilterdiv">
                        <div class="searchfilterdiv">
                            <form class="form-inline searchfilterform" action="" method="POST">
                                <div class="searchinputdiv">
                                    <input class="form-control mr-sm-2 searchinput" type="search" name="searchTerm" placeholder="Search by name..." aria-label="Search">
                                </div>
                                <div class="searchbtndiv">
                                    <button class="btn btn-outline-success my-2 my-sm-0 searchbtn" type="submit">Filter</button>
                                </div>


                            </form>
                        </div>

                        <div class="filtersdiv">

                            <div class="filtercatdiv">
                                <div class="filtercattxtdiv">
                                    <p class="filtercattxt">Categories</p>
                                </div>

                                <div class="filtercatcheckdiv">
                                    <form class="filtercatcheck">

                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Top</label>
                                            </div>

                                        </div>

                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Bottom</label>
                                            </div>

                                        </div>

                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Jeans</label>
                                            </div>

                                        </div>

                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Dresses</label>
                                            </div>

                                        </div>

                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Outerwear</label>
                                            </div>

                                        </div>

                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Shoes</label>
                                            </div>

                                        </div>
                                    </form>

                                </div>

                            </div>

                            <div class="filterbtndiv">
                                <button class="filterbtn">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="productlistdiv">
                        <div class="productheaderdiv">
                            <h1 class="productheader">Product List</h1>
                        </div>
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
                                    echo '<img src="' . $product['image'] . '" class="card-img-top" alt="' . $product['name'] . '" width="200" height="300">';
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
                </div>
            </div>

        </main>



        <?php
        include "footer.inc.php";
        ?>

    </body>

</html>
