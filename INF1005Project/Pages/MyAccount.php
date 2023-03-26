
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
                                            <div class="col-5 col-md-12">
                                                <label for="bday_label">Username</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="bday_label">altex</label>
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
                                                <label id="fname_label">Siti</label>
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
                                                <label id="lname_label">Denver</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br class="d-none d-md-block d-lg-block"/>
                                <div class="row justify-content-center">
                                    <!--Email Display-->
                                    <div class="col-12 col-md-8">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12">
                                                <label for="bday_label">Email</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="bday_label">2202487@gmail.com</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
<!--Personal-Information-Edit-->
                            <div id="personal-information-edit" class="d-none">
                                <div class="row">
                                    <div class="col align-self-center">
                                        PERSONAL INFORMATION
                                    </div>
                                    <div class="col text-right">
                                        <button id="personal-information-edit-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Save</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row justify-content-center">
                                    <!--Usename Display-->
                                    <div class="col-12 col-md-8">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12">
                                                <label for="bday_label">Username</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="bday_label">altex</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row justify-content-center">
                                    <!--First Name-->
                                    <div class="col-12 col-md-4">
                                        <!--First Name-->
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input class="form-control" type="text" id="fname" name="fname"
                                                   required maxlenth="45" placeholder="First name">
                                        </div>
                                    </div>
                                    <!--Last Name-->
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input class="form-control" type="text" id="lname" name="lname"
                                                   required maxlenth="45" placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <!--Email-->
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <label for="bday">Email</label>
                                            <input class="form-control" type="email" id="email" name="email"
                                                   required maxlenth="45" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
<!--Delivery Location View-->
                            <div id="delivery-location-view">
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
                                            <div class="col-5 col-md-12">
                                                <label for="street_label">Street</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="street_label">10 Dover Dr</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <!--Blk-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12">
                                                <label for="blk_label">Block</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="blk_label">256</label>
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
                                                <label id="unit_label">#420</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row justify-content-center">
                                    <!--Postal-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12">
                                                <label for="city_label">City</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="city_label">Singapore</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--City-->
                                    <div class="col-12 col-md-4">
                                        <div class="row justify-content-center">
                                            <div class="col-5 col-md-12">
                                                <label for="postal_label">Postal</label>
                                            </div>
                                            <div class="col-6 col-md-12">
                                                <label id="postal_label">529863</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--Delivery Location Edit-->
                            <div id="delivery-location-edit" class="d-none">
                                <div class="row">
                                    <div class="col align-self-center">
                                        DELIVERY ADDRESS
                                    </div>
                                    <div class="col text-right">
                                        <button id="delivery-location-edit-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Save</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <!--Street-->
                                        <div class="form-group">
                                            <label for="address">Street</label>
                                            <input class="form-control" type="text" id="street" name="street"
                                                   required maxlenth="45" placeholder="Street">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <!--Blk-->
                                        <div class="form-group">
                                            <label for="city">Block</label>
                                            <input class="form-control" type="text" id="blk" name="blk"
                                                   required maxlenth="45" placeholder="Block">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!--Unit-->
                                        <div class="form-group">
                                            <label for="country">Unit</label>
                                            <input class="form-control" type="text" id="unit" name="unit"
                                                   required maxlenth="45" placeholder="Unit">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-4">
                                        <!--City-->
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input class="form-control" type="text" id="city" name="city"
                                                   required maxlenth="45" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!--Postal-->
                                        <div class="form-group">
                                            <label for="country">Postal</label>
                                            <input class="form-control" type="text" id="postal" name="postal"
                                                   required maxlenth="45" placeholder="postal">
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="col">
                                        Orders
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
                                    <div class="col text-right d-none d-md-block d-lg-block">
                                        <button id="change-password-check-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Change Password</button>
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
                                    <div class="col text-right d-block d-md-none d-lg-none">
                                        <button id="change-password-check-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Change Password</button>
                                    </div>
                                </div>
                            </div>
<!--Chnage Password Edit-->
                            <div id="change-password-edit" class="d-none">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <h3 class="fw-bold">Change Password</h3>
                                    </div>
                                    <div class="col text-right d-none d-md-block d-lg-block">
                                        <button id="change-password-edit-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Save New Password</button>
                                    </div>
                                </div>
                                <hr/>
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
                                        <button id="change-password-check-button" class="btn btn-warning text-dark" onclick="myFunction(this.id)">Change Password</button>
                                    </div>
                                </div>
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

