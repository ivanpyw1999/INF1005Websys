<?php 
$username = $fname = $lname = $email = $street = $blk = $unit = $city = $postal = "";

if(!empty($_GET["errorMsgPassword"])) echo "<script> alert('".$_GET['errorMsgPassword']."')</script>";



// button clicked functions
if(isset($_REQUEST["personal-information-edit-button"])) {
    global $username, $fname, $lname, $emai, $success, $errorMsg;
    $success = true;
    $errorMsg = "";
    
    if (empty($_POST["email"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
        
        header("Location: ../Pages/MyAccount.php?errorMsgPersonal=" . $errorMsg);
    }
    if (empty($_POST["fname"])) {
        $errorMsg .= "First Name is required.<br>";
        $success = false;
        
        header("Location: ../Pages/MyAccount.php?errorMsgPersonal=" . $errorMsg);
    }
    if (empty($_POST["lname"])) {
        $errorMsg .= "Last Name is required.<br>";
        $success = false;
        
        header("Location: ../Pages/MyAccount.php?errorMsgPersonal=" . $errorMsg);
    }
    
    if ($success) {
        // Database
        $errorMsg = $_POST["fname"]." ".$_POST["lname"]." ".$_POST["email"];
        // reload page to display new information
        header("Location: ../Pages/MyAccount.php?errorMsgPersonal=" . $errorMsg); //temp - remove
        //        header("Location: ../Pages/MyAccount.php");
    }
}

if(isset($_REQUEST["delivery-location-edit-button"])) {
    global $success, $errorMsg;
    $success = true;
    $errorMsg = "";
    
    if (empty($_POST["street"])) {
        $errorMsg .= "Street is required.<br>";
        $success = false;
        header("Location: ../Pages/MyAccount.php?errorMsgDelivery=" . $errorMsg);
    }
    if (empty($_POST["blk"])) {
        $errorMsg .= "Block is required.<br>";
        $success = false;
        header("Location: ../Pages/MyAccount.php?errorMsgDelivery=" . $errorMsg);
    }
    if (empty($_POST["unit"])) {
        $errorMsg .= "Unit is required.<br>";
        $success = false;
        header("Location: ../Pages/MyAccount.php?errorMsgDelivery=" . $errorMsg);
    }
    if (empty($_POST["city"])) {
        $errorMsg .= "City is required.<br>";
        $success = false;
        header("Location: ../Pages/MyAccount.php?errorMsgDelivery=" . $errorMsg);
    }
    if (empty($_POST["postal"])) {
        $errorMsg .= "Postal is required.<br>";
        $success = false;
        header("Location: ../Pages/MyAccount.php?errorMsgDelivery=" . $errorMsg);
    }
    
    if ($success) {
        // Database
        $errorMsg = $_POST["street"]." ".$_POST["blk"]." ".$_POST["unit"]." ".$_POST["city"]." ".$_POST["postal"];
        // reload page to display new information
        header("Location: ../Pages/MyAccount.php?errorMsgDelivery=" . $errorMsg); //temp - remove 
//        header("Location: ../Pages/MyAccount.php");
    }
}

if(isset($_REQUEST["change-password-check-button"])) {
    global $username, $fname, $lname, $emai, $success, $errorMsg;
    $success = true;
    $errorMsg = "";
    
    if (empty($_POST["pwd"])) {
        $errorMsg .= "Password is required.<br>";
        $success = false;
        
    }
    
    if ($success) {
        // Database
        // Check if password is correct
        // if correct update password
         header("Location: ../Pages/MyAccount.php?errorMsgPassword=Successfully Changed Password !");
        // if not correct
//        header("Location: ../Pages/MyAccount.php?errorMsgPassword=" . $errorMsg); //remove errorMSg 
    }
}

// temp Read User Table Function
function TempReadUserInfo() { // used by div Personal-Information-View & Personal-Information-Edit
    global $username, $fname, $lname, $email;
    
    // replace with SQL crap
    $result = array(    "username" => "SitiDenver",
                        "fname" => "Siti",
                        "lname"=> "Denver",
                        "email" => "email@gmail.com");
    
    $username = $result['username'];
    $fname = $result['fname'];
    $lname = $result['lname'];
    $email = $result['email'];
}

function TempReadDeliveryInfo() { // used by div Delivery-Location-View & Delivery-Location-Edit
    global $street, $blk, $unit, $city, $postal;
    
        // replace with SQL crap
    $result = array(    "street" => "Dover Street",
                        "blk" => "10",
                        "unit" => "4-20",
                        "city"=> "Singapore",
                        "postal" => "529863");
    
    $street = $result['street'];
    $blk = $result['blk'];
    $unit = $result['unit'];
    $city = $result['city'];
    $postal = $result['postal'];
}

function TempReadOrderList() {
    
    // test data - replace with sql
    $result = array(array(  "productID" => "1",
                            "productName" => "Button Up Shirt",
                            "productDescription" => "XS, Navy Blue",
                            "amt"=>2,
                            "subtotal" => 59.80,
                            "photo" => "https://img.freepik.com/free-photo/man-navy-jacket-shorts-streetwear_53876-102182.jpg?w=826&t=st=1679844960~exp=1679845560~hmac=9250c11ea1c2c88691a554f8957db7333130371958cc314569cdab97bd299252"),
                    array(  "productID" => "2",
                            "productName" => "Oversized Sweater",
                            "productDescription" => "M, Black",
                            "amt"=>1,
                            "subtotal" => 24.90,
                            "photo" => "https://img.freepik.com/free-photo/man-black-sweater-black-bucket-hat-youth-apparel-shoot_53876-102294.jpg?w=740&t=st=1679846421~exp=1679847021~hmac=02692611e7ba1d7e85506282babae17b4bf52ba4ee599d064473611756f1d801"));

    foreach( $result as $order )  { // test data - iterate through results
        echo '<div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div>
                                        <img
                                            src="'.$order['photo'].'"
                                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px; margin-right: 5px">
                                        </div>
                                        <div class="ms-3 px-2">
                                            <h5>'.$order['productName'].'</h5>
                                            <p class="small mb-0">'.$order['productDescription'].'</p>
                                         </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <div style="width: 50px;">
                                            <h5 class="fw-normal mb-0">'.$order['amt'].'</h5>
                                        </div>
                                    <div style="width: 80px;">
                                        <h5 class="mb-0">$'.$order['subtotal'].'</h5>
                                    </div>
                                    <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
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
        <script defer src="../js/main.js"></script>
        <script defer src="../js/myAccount.js"></script>

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body mh-100>
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
                                <?php TempReadUserInfo() ?>
                                <div class="row">
                                    <div class="col align-self-center">
                                        PERSONAL INFORMATION
                                    </div>
                                    <div class="col text-right">
                                        <button id="personal-information-view-button" class="btn btn-link text-dark" onclick="myFunction(this.id)">Edit</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row justify-content-center">
                                    <!--Usename Display-->
                                    <div class="col-12 col-md-8">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="bday_label">Username</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="bday_label"><?php echo $username ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row justify-content-center">
                                    <!--First Name-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="fname_label">First Name</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="fname_label"><?php echo $fname ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Last  Name-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="lname_label">Last Name</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="lname_label"><?php echo $lname ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br class="d-none d-md-block d-lg-block"/>
                                <div class="row justify-content-center">
                                    <!--Email Display-->
                                    <div class="col-12 col-md-8">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="bday_label">Email</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="bday_label"><?php echo $email ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <!--Error Display-->
                                    <div class="col-12 col-md-8">
                                        <?php if(!empty($_GET["errorMsgPersonal"])) echo "<div class='alert alert-danger'>".$_GET['errorMsgPersonal']."</div>"; ?>
                                    </div>
                                </div>
                                <br/>
                            </div>
<!--Personal-Information-Edit-->
                            <div id="personal-information-edit" class="d-none">
                                <?php TempReadUserInfo() ?>
                                
                                <form action="#" method="POST" >
                                    <div class="row">
                                        <div class="col align-self-center">
                                            PERSONAL INFORMATION
                                        </div>
                                        <div class="col text-right">
                                            <button id="personal-information-edit-button" name="personal-information-edit-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Save</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <!--Usename Display-->
                                        <div class="col-12 col-md-8">
                                            <div class="row justify-content-center">
                                                <div class="col-5 col-md-12 font-weight-bold">
                                                    <label for="username_label">Username</label>
                                                </div>
                                                <div class="col-6 col-md-12">
                                                    <label id="username_label"><?php echo $username ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row justify-content-center">
                                        <!--First Name-->
                                        <div class="col-12 col-md-4">
                                            <!--First Name-->
                                            <div class="form-group ">
                                                <label class="font-weight-bold" for="fname">First Name</label>
                                                <input class="form-control" type="text" id="fname" name="fname"
                                                       required maxlenth="45" placeholder="First name" value="<?php echo $fname ?>">
                                            </div>
                                        </div>
                                        <!--Last Name-->
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="lname">Last Name</label>
                                                <input class="form-control" type="text" id="lname" name="lname"
                                                       required maxlenth="45" placeholder="Last name" value="<?php echo $lname ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <!--Email-->
                                        <div class="col-12 col-md-8">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="email">Email</label>
                                                <input class="form-control" type="email" id="email" name="email"
                                                       required maxlenth="45" placeholder="Email" value="<?php echo $email ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br/>
                            </div>
<!--Delivery Location View-->
                            <div id="delivery-location-view">
                                <?php TempReadDeliveryInfo() ?>
                                <div class="row">
                                    <div class="col align-self-center">
                                        DELIVERY ADDRESS
                                    </div>
                                    <div class="col text-right">
                                        <button id="delivery-location-view-button" class="btn btn-link text-dark" onclick="myFunction(this.id)">Edit</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row justify-content-center">
                                    <!--Address-->
                                    <div class="col-12 col-md-8">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="street_label">Street</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="street_label"><?php echo $street ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <!--Blk-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="blk_label">Block</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="blk_label"><?php echo $blk ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Unit-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="unit_label">Unit</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="unit_label"><?php echo $unit ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row justify-content-center">
                                    <!--Postal-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="city_label">City</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="city_label"><?php echo $city ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--City-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12 font-weight-bold">
                                                <label for="postal_label">Postal</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="postal_label"><?php echo $postal ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <!--Error Display-->
                                    <div class="col-12 col-md-8">
                                        <?php if(!empty($_GET["errorMsgDelivery"])) echo "<div class='alert alert-danger'>".$_GET['errorMsgDelivery']."</div>"; ?>
                                    </div>
                                </div>
                            </div>
<!--Delivery Location Edit-->
                            <div id="delivery-location-edit" class="d-none">
                                <form action="#" method="POST" >
                                <div class="row">
                                    <div class="col align-self-center">
                                        DELIVERY ADDRESS
                                    </div>
                                    <div class="col text-right">
                                        <button id="delivery-location-edit-button" name="delivery-location-edit-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Save</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <!--Street-->
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="address">Street</label>
                                            <input class="form-control" type="text" id="street" name="street"
                                                   required maxlenth="45" placeholder="Street" value="<?php echo $street ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <!--Blk-->
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="city">Block</label>
                                            <input class="form-control" type="text" id="blk" name="blk"
                                                   required maxlenth="45" placeholder="Block" value="<?php echo $blk ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!--Unit-->
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="country">Unit</label>
                                            <input class="form-control" type="text" id="unit" name="unit"
                                                   required maxlenth="45" placeholder="Unit" value="<?php echo $unit ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <!--City-->
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="city">City</label>
                                            <input class="form-control" type="text" id="city" name="city"
                                                   required maxlenth="45" placeholder="City" value="<?php echo $city ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!--Postal-->
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="country">Postal</label>
                                            <input class="form-control" type="text" id="postal" name="postal"
                                                   required maxlenth="45" placeholder="postal" value="<?php echo $postal ?>">
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
                                <br/>
                                <?php TempReadOrderList(); ?>
                            </div>
                        </div>
<!--Change Password-->
                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-messages-tab">
<!--Change Password Check-->
                            <div id="change-password-check">
                                <form action="#" method="POST" >
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Change Password</h3>
                                    </div>
                                    <div class="col text-right d-none d-md-block d-lg-block">
                                        <button id="change-password-check-button" name="change-password-check-button" class="btn btn-warning text-dark" onclick="">Change Password</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <!--Password Input-->
                                        <div class="form-group">
                                            <label for="pwd_old">Current Password:</label>
                                            <input class="form-control" type="password" id="pwd_old"
                                                   minlength = "10" required name="pwd" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <!--New Password Input-->
                                        <div class="form-group">
                                            <label for="pwd_new">New Password:</label>
                                            <input class="form-control" type="password" id="pwd_new"
                                                   minlength = "10" required name="pwd" placeholder="New Password">
                                        </div>

                                        <!--Confirm Password Input-->
                                        <div class="form-group">
                                            <label for="pwd_cfm">Confirm Password:</label>
                                            <input class="form-control" type="password" id="pwd_cfm"
                                                   minlength = "10" required name="pwd" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right d-block d-md-none d-lg-none">
                                        <button id="change-password-check-button" name="change-password-check-button" class="btn btn-warning text-dark" onclick="">Change Password</button>
                                    </div>
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

