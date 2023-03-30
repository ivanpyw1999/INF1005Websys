<?php session_start() ?>


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
        <script defer src="../js/myAccount.js"></script>
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
                    <h3 class="fw-bold mb-2 mb-md-4 mt-2">My Account</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 px-0 px-md-3">
                    <div class="nav nav-pills d-flex flex-md-column justify-content-center" id="v-pills-tab">
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark active" id="my-details-tab" data-toggle="pill" href="#my-details" role="tab" aria-controls="my-details" aria-selected="true">My Details</a>
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark" id="order-history-tab" data-toggle="pill" href="#order-history" role="tab" aria-controls="order-history" aria-selected="false">Order History</a>
                        <a class="nav-link my-md-2 px-2 px-md-3 text-dark" id="change-password-tab" data-toggle="pill" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">Change Password</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 mt-0 mt-md-2 py-4 px-5 bg-light rounded">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="my-details" role="tabpanel" aria-labelledby="my-details-tab">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold">My Details</h3>
                                </div>
                            </div>
                            <!--Personal-Information-View-->
                            <div id="personal-information-view">
                                <form action="../processes/account_process.php" method="post">
                                    <div class="row">
                                        <div class="col align-self-center">
                                            PERSONAL INFORMATION
                                        </div>
                                        <div class="col text-right">
                                            <button type="button" id="personal-information-view-button" class="btn btn-link text-dark personalInfoButton" onclick="enableInputs(this.id)">Edit</button>
                                            <button  type="submit" class="btn btn-warning personalInfo personalInfoButton d-none">Submit</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <!--Usename Display-->
                                        <div class="col-12 col-md-8">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="username_label">Username</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="username" name="username" class="form-control personalInfo" value="<?php echo $_SESSION["username"] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row justify-content-center">
                                        <!--First Name-->
                                        <div class="col-12 col-md-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="fname_label">First Name</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="fname" name="fname" class="form-control personalInfo" value="<?php echo $_SESSION["fname"] ?>" disabled>
                                                    <br class="d-block d-md-none"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Last  Name-->
                                        <div class="col-12 col-md-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="lname_label">Last Name</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="lname" name="lname" class="form-control personalInfo" value="<?php echo $_SESSION["lname"] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row justify-content-center">
                                        <!--Email Display-->
                                        <div class="col-12 col-md-8">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="bday_label">Email</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="email" id="email" name="email" class="form-control personalInfo" value="<?php echo $_SESSION["email"] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </form>
                            </div>
                            <!--Delivery Location View-->
                            <div id="delivery-location-view">

                                <form action="../processes/delivery_process.php" method="post">
                                    <div class="row">
                                        <div class="col align-self-center">
                                            DELIVERY ADDRESS
                                        </div>    
                                        <div class="col text-right">
                                            <button type="button" id="delivery-location-view-button" class="btn btn-link text-dark deliverylocationButton" onclick="enableInputs(this.id)">Edit</button>
                                            <button  type="submit" class="btn btn-warning deliverylocation deliverylocationButton d-none">Submit</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <!--Street-->
                                        <div class="col-12 col-md-8">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="street_label">Street</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="street" name="street" class="form-control deliverylocation" value="<?php echo $_SESSION["street"] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row justify-content-center">
                                        <!--Blk-->
                                        <div class="col-12 col-md-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="blk_label">Block</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="block" name="block" class="form-control deliverylocation" value="<?php echo $_SESSION["block"] ?>" disabled>
                                                    <br class="d-block d-md-none"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Unit-->
                                        <div class="col-12 col-md-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="unit_label">Unit</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="unit" name="unit" class="form-control deliverylocation" value="<?php echo $_SESSION["unit"] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <br/>                         
                                    <div class="row justify-content-center">
                                        <!--City-->
                                        <div class="col-12 col-md-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="city_label">City</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="city" name="city" class="form-control" value="Singapore" disabled>
                                                    <br class="d-block d-md-none"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Postal-->
                                        <div class="col-12 col-md-4">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12">
                                                    <label for="postal_label">Postal</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <input type="text" id="postal" name="postal" class="form-control deliverylocation" value="<?php echo $_SESSION["postal"] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>                           
                        </div>
                        <!--Order History-->
                        <div class="tab-pane fade 50vh" id="order-history" role="tabpanel" aria-labelledby="order-history-tab">
                            <div id="order-history-view">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Order History</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <?php
                                                $prevOrder = null;
                                                $config = parse_ini_file('/var/www/private/db-config.ini');
                                                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                                                $results = mysqli_query($conn, "SELECT * FROM `orderhistory` WHERE userid = " . $_SESSION["member-id"]) or die('query failed');
                                                while ($row = mysqli_fetch_assoc($results)) {

                                                    if (!empty($prevOrder) && $prevOrder != $row['purchasedate']) {
                                                        ?>
                                                        <hr/>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <h5 class="pl-3 mb-0"><?php echo $prevOrder; ?></h5>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <h5 class="pr-3 mb-0">$<?php echo $grand_total; ?></h5>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card mb-3">
                                                    <div class="card-body">

                                                    <?php $grand_total = 0; } ?>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img
                                                                    src="<?php echo $row['image']; ?>"
                                                                    class="img-fluid rounded-3" alt="Order item" style="width: 65px; margin-right: 5px">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5><?php echo $row['name']; ?></h5>
                                                                <p class="small mb-0">Description</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0"><?php echo $row['quantity']; ?></h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0">$<?php echo $sub_total = ($row['price'] * $row['quantity']); ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <?php
                                                    $grand_total += $sub_total;
                                                    $prevOrder = $row['purchasedate'];
                                                }
                                                ?>
                                                <hr/>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <h5 class="pl-3 mb-0"><?php echo $prevOrder ?></h5>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <h5 class="pr-3 mb-0">$<?php echo $grand_total; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Change Password-->
                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-messages-tab">
                            <!--Change Password Check-->
                            <div id="change-password-check">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Change Password</h3>
                                    </div>                                    
                                </div>
                                <hr/>
                                <form action="../processes/password_process.php" method="post">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <!--Password Input-->
                                            <div class="form-group">
                                                <label for="pwd">New Password:</label>
                                                <input class="form-control" type="password" id="pwd" name="pwd"
                                                       required name="pwd" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-right d-none d-md-block d-lg-block">
                                        <button id="change-password-check-button" class="btn btn-warning text-dark" onclick="">Change Password</button>
                                    </div>
                                </form>
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
