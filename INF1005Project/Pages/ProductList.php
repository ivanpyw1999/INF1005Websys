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
        <script defer src="../js/main.js"></script>
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>
        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        session_start();
        include "nav.inc.php";
        ?>



        <main class ="productlistmain">
            <div class='productsdiv d-flex vw-100 h-100'>

                <div class="productbodydiv">

                    <div class="productfilterdiv container-fluid">

                        <form action="ProductList.php" class="form-group searchinputdiv">
                            <input class="form-control mr-sm-2 searchinput" type="search" name="search" placeholder="Search products.." aria-label="Search">
                            </div>
                            <div class="form-group filtersdiv">
                                <div class="filtercatdiv">

                                    <div class="filtercattxtdiv">
                                        <p class="filtercattxt">Categories</p>
                                    </div>

                                    <div class="filtercatoptiondiv form-check form-check-inline">
                                        <div class="filtercatboxdiv">
                                            <input class="filtercatoption form-check-input" id="top" type="checkbox" name="category[]" value="Top">
                                        </div>
                                        <div class="filterboxtxtdiv">
                                            <label class="filterboxtxt form-check-label" for="top">Top</label>
                                        </div>
                                    </div>

                                    <div class="filtercatoptiondiv form-check form-check-inline">
                                        <div class="filtercatboxdiv">
                                            <input class="filtercatoption form-check-input" id="bottom" type="checkbox" name="category[]" value="Bottom">
                                        </div>
                                        <div class="filterboxtxtdiv">
                                            <label class="filterboxtxt form-check-label" for="bottom">Bottom</label>
                                        </div>
                                    </div>

                                    <div class="filtercatoptiondiv form-check form-check-inline">
                                        <div class="filtercatboxdiv">
                                            <input class="filtercatoption form-check-input" id="jeans" type="checkbox" name="category[]" value="Jeans">
                                        </div>
                                        <div class="filterboxtxtdiv">
                                            <label class="filterboxtxt form-check-label" for="jeans">Jeans</label>
                                        </div>
                                    </div>

                                    <div class="filtercatoptiondiv form-check form-check-inline">
                                        <div class="filtercatboxdiv">
                                            <input class="filtercatoption form-check-input" id="outerwear" type="checkbox" name="category[]" value="Outerwear">
                                        </div>
                                        <div class="filterboxtxtdiv">
                                            <label class="filterboxtxt form-check-label" for="outerwear">Outerwear</label>
                                        </div>
                                    </div>

                                    <div class="filtercatoptiondiv form-check form-check-inline">
                                        <div class="filtercatboxdiv">
                                            <input class="filtercatoption form-check-input" id="shoes" type="checkbox" name="category[]" value="Shoes">
                                        </div>
                                        <div class="filterboxtxtdiv">
                                            <label class="filterboxtxt form-check-label" for="shoes">Shoes</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--                            <div class="searchbtndiv">
                                                            <button class="btn btn-outline-success my-2 my-sm-0 searchbtn" type="submit">Search</button>
                                                        </div>-->
                        </form>

                    </div>
                    <div class="productlistdiv container">
                        <div class="productheaderdiv">
                            <h1 class="productheader">Product List</h1>
                        </div>
                        <div class="productlistwrapper d-flex flex-wrap row" id="productlistwrapper">
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

                                while ($row = $result->fetch_assoc()) {

                                    echo '<div class="productcarddiv col-md-4 mb-4">'; //Div 1 Start

                                    echo '<a href="SpecificProductPage.php?id=' . $row['id'] . '">';
                                    echo '<div class="productcard shadow card">'; //Div 2 Start
                                    echo '<div class="productimgdiv">'; //Div 3 Start
                                    echo '<img src="' . $row['image'] . '" class="productimg alt="' . $row['name'] . '" width="200" height="300">';
                                    echo '</div>'; //Div 3 End

                                    echo '<div class="productcardcontent">'; //Div 4 Start
                                    echo '<div class="productnamediv">'; //Div 6 Start
                                    echo '<p class="productname">' . $row['name'] . '</p>';
                                    echo '</div>'; //Div 5 End

                                    echo '</div>'; //Div 4 End

                                    echo '<div class="productcarddetails">'; //Div 9 Start

                                    echo "<ul class='list-group list-group-flush'>";
                                    echo '<div class="productcostdiv">';
                                    echo '<li class="list-group-item productcost">Price: $' . number_format($row["price"], 2) . '</li>';
                                    echo '</div>';
                                    echo "</ul>";

                                    echo '</div>';

                                    echo '</div>'; //Div 2 End
                                    echo '</a>';

                                    echo '</div>'; //Div 1 End
                                }
                            } else {
                                echo'<div class="noproductresults" style="padding: 2rem;">';
                                echo '<p>No results found.</p>';
                                echo '</div>';
                            }

                            // Close the database connection
                            $stmt->close();
                            $conn->close();
                            ?>
                        </div>

                    </div>
                </div>
            </div>

        </main>



<?php
include "footer.inc.php";
?>

    </body>

</html>
