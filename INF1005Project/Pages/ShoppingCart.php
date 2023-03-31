<?php
session_start();
$user_id = $_SESSION["member-id"];
if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_GET['remove'])){
    $config = parse_ini_file('/var/www/private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `order` WHERE id = '$remove_id'") or die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=ErrorHandling.php">');
   header('location:ShoppingCart.php');
}
if(isset($_POST['order_btn'])){
    $config = parse_ini_file('/var/www/private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);

    $stmt=$conn->prepare("INSERT INTO world_of_pets.orderhistory (userid, name, price, quantity, image, purchasedate, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $cart_query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'") or die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=ErrorHandling.php">');
// Loop through each item in the cart and insert into table
while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
     $t=time();
     $date=date("Y-m-d",$t);
    // Bind parameters and execute SQL statement
    $stmt->bind_param("issssss",$user_id, $fetch_cart['name'], $fetch_cart['price'], $fetch_cart['quantity'], $fetch_cart['image'],$date, $fetch_cart['description']);
    $stmt->execute();
    mysqli_query($conn, "DELETE FROM `order` WHERE user_id = '$user_id'") or die('query failed');
    
}

// Close statement and connection
$stmt->close();
$conn->close();
echo "<script>
    alert('Thank you for your order!');
    window.location.href='Homepage.php';
</script>";
   }
?>
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

        <link rel="stylesheet" href="../css/main.css"/>
        <link rel="stylesheet" href="../css/ShoppingCart.css">

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
        include "nav.inc.php";
        ?>

        <main class ="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-7">
                                <h5 class="mb-3">MY CART</h5>
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <?php
                                        $config = parse_ini_file('/var/www/private/db-config.ini');
                                        $conn = new mysqli($config['servername'], $config['username'],
                                                $config['password'], $config['dbname']);
                                        $cart_query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$user_id'") or die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=ErrorHandling.php">');
                                        if(mysqli_num_rows($cart_query) > 0){
                                        while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                                            ?>                                       
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img
                                                            src="../Images/<?php echo $fetch_cart['image']; ?>"
                                                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px; margin-right: 5px">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5><?php echo $fetch_cart['name']; ?></h5>
                                                        <p class="small mb-0"><?php echo $fetch_cart['description']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    
                                                    <div style="width: 50px;">
                                                        <h5 class="fw-normal mb-0"><?php echo $fetch_cart['quantity']; ?></h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></h5>
                                                    </div>
                                                    <a href="ShoppingCart.php?remove=<?php echo $fetch_cart['id']; ?>" style="color:Red;" class="delete-btn" onclick="return confirm('remove item from cart?');">remove><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                            <?php
                                            $grand_total += $sub_total;
                                        }
                                        }else{
                                            $nocart=true;
                                          echo "No Product Added!";                                            
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="card bg-light text-dark">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <b class="mb-2">Subtotal</b>

                                            <b class="mb-2">$<?php echo $grand_total; ?></b>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Taxes</p>
                                            <p class="mb-2">$FREE</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Shipping</p>
                                            <p class="mb-2">FREE</p>
                                        </div>

                                        <hr>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Total(Incl. taxes)</p>
                                            <p class="mb-2">$<?php echo $grand_total; ?></p>
                                        </div>

                                    </div>
                                </div>


                                <div class="d-flex" style="padding-top: 20px;">
                                    <h5 class="mb-0">DELIVERY ADDRESS</h5>
                                </div>
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                <div class="d-flex justify-content-between">
                                        <p class="mb-2">Name: <?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Address: <?php echo $_SESSION["block"]." ".$_SESSION["street"]." ".$_SESSION["unit"];?></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Postal Code: <?php echo $_SESSION["postal"];?></p>
                                    </div>



                                    <form class="mt-4" method="post">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">PAYMENT DETAILS</h5>
                                        </div>
                                        <hr style="height:1px;border:none;color:#333;background-color:#333;">

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeName">CARD NUMBER</label>
                                            <input type="text" id="typeName" class="form-control form-control-sm" size="5"
                                                   placeholder="CARD NUMBER"required minlength="16" maxlength="16" />

                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeText">NAME ON CARD</label>
                                            <input type="text" id="typeText" class="form-control form-control-sm" size="5"
                                                   placeholder="NAME" required maxlength="19" />

                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-outline form-white">
                                                    <label class="form-label" for="typeExp">Expiration</label>
                                                    <input type="text" id="typeExp" class="form-control form-control-sm"
                                                           placeholder="MM/YYYY" size="5" id="exp"  required minlength="7" maxlength="7" />

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-outline form-white">
                                                    <label class="form-label" for="typeText">CVV</label>
                                                    <input type="password" id="typeText" class="form-control form-control-sm"
                                                           placeholder="&#9679;&#9679;&#9679;" size="5"  required minlength="3" maxlength="3" />

                                                </div>
                                            </div>

                                        </div>
                                        <div class ="row mb-12">
                                            <input type="submit" type="button" style="background-color: black" name="order_btn"  class="btn btn-secondary btn-lg btn-block" value="MAKE PAYMENT"<?php if ($nocart) echo 'disabled'; ?>>
                                        </div>
                                    </form>


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
