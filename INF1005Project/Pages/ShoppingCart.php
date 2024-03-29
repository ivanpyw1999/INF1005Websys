<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="../css/footer.css">

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
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <img
                                                        src="../Images/FashionLogo.png"
                                                        class="img-fluid rounded-3" alt="Shopping item" style="width: 65px; margin-right: 5px">
                                                </div>
                                                <div class="ms-3">
                                                    <h5>Product Name</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">

                                                <div style="width: 80px;">
                                                    <h5 class="mb-0">Price</h5>
                                                </div>
                                                <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="card bg-light text-dark">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <b class="mb-2">Subtotal</b>
                                            <b class="mb-2">$4798.00</b>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Taxes</p>
                                            <p class="mb-2">$20.00</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Shipping</p>
                                            <p class="mb-2">FREE</p>
                                        </div>

                                        <hr>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Total(Incl. taxes)</p>
                                            <p class="mb-2">$4818.00</p>
                                        </div>

                                    </div>
                                </div>


                                <div class="d-flex" style="padding-top: 20px;">
                                    <h5 class="mb-0">DELIVERY ADDRESS</h5>
                                </div>
                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Name</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Address</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Postal Code</p>
                                </div>



                                <form class="mt-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">PAYMENT DETAILS</h5>
                                    </div>
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;">

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeName">CARD NUMBER</label>
                                        <input type="text" id="typeName" class="form-control form-control-sm" size="5"
                                               placeholder="CARD NUMBER" />

                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeText">NAME ON CARD</label>
                                        <input type="text" id="typeText" class="form-control form-control-sm" size="5"
                                               placeholder="NAME" minlength="19" maxlength="19" />

                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="typeExp">Expiration</label>
                                                <input type="text" id="typeExp" class="form-control form-control-sm"
                                                       placeholder="MM/YYYY" size="5" id="exp" minlength="7" maxlength="7" />

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-outline form-white">
                                                <label class="form-label" for="typeText">CVV</label>
                                                <input type="password" id="typeText" class="form-control form-control-sm"
                                                       placeholder="&#9679;&#9679;&#9679;" size="5" minlength="3" maxlength="3" />

                                            </div>
                                        </div>

                                    </div>
                                    <div class ="row mb-12">
                                        <button type="button" style="background-color: black" class="btn btn-secondary btn-lg btn-block">MAKE PAYMENT</button>
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
