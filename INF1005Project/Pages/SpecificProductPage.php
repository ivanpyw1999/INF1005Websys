<?php
session_start();

$config = parse_ini_file('../../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

function getProductFromID($id) {

    global $conn;
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1)
        return $result->fetch_assoc();
    else
        return null;
}

function getBestSeller() { // gets random 3 products :/
    global $conn;
    $sql = "SELECT * FROM products order by RAND() LIMIT 3";
    $stmt = $conn->prepare($sql);
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

<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="../css/SpecificProductPage.css">

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
        <script defer src="../js/specificproduct.js"></script>
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>


        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class = "d-flex flex-column min-vh-100">
        <?php
        include "nav.inc.php";
        ?>
        <main class="container">
            <div class="container px-4 px-lg-5 my-5">

                <?php
                $product = getProductFromID($_GET['id']);
                if (empty($_GET['id']) || $product == null)
                    header("Location: ../Pages/ErrorHandling.php");
                ?>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="<?php echo $product['image'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $product['name'] ?></h1>
                        <div class="fs-5 mb-5">
                            <p class="lead">Price: $<?php echo $product['price'] ?></p>
                            <p class="lead">Stock: <?php echo $product['stock'] ?></p>
                            <p class="lead">Description:<br/>
                                <?php echo $product['description'] ?></p>
                            <div class="d-flex">
                                <form action="../process_addToCart.php?id=<?php echo $product['id'] ?>" method="post">
                                    <?php if($product['stock'] == 0 ) { ?>
                                    <button class="btn btn-outline-dark flex-shrink-0" type="button" disabled>
                                        <i class="bi-cart-fill me-1"></i>
                                        Out Of Stock
                                    </button>
                                    <?php } else { ?>
                                    
                                    <input id="amt" min="0" max="<?php echo $product['stock']?>" name="quantity" value="1" type="number" class="form-control form-control-sm" />
                                    <br/>
                                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                    
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>


                    <section class="bg-white">
                        <div class="text-center container py-5">
                            <h4 class="mt-4 mb-5"><strong>Bestsellers</strong></h4>

                            <div class="row">

                                <?php
                                $products = getBestSeller();

                                foreach ($products as $product) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 mb-4">

                                        <a href="<?php echo 'SpecificProductPage.php?id=' . $product['id'] ?>" class="text-reset">
                                            <div style="height: 100%" class="card">
                                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                                     data-mdb-ripple-color="light">
                                                    <img src="<?php echo $product['image'] ?>"
                                                         class="w-100" />
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3"><?php echo $product['name'] ?></h5>
                                                    <h6 class="mb-3"><?php echo $product['price'] ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </main>
        <?php
        include "footer.inc.php";
        ?>

    </body>

</html>

<!-- 
old photos
https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/belt.webp
https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp
https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/shoes%20(3).webp

-->
