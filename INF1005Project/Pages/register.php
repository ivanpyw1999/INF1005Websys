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

        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/accountPages.css">

        <!--        jQuery
                <script defer
                        src="https://code.jquery.com/jquery-3.4.1.min.js"
                        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                        crossorigin="anonymous">
                </script>
                Bootstrap JS
                <script defer
                        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                        crossorigin="anonymous">
                </script>
                 Custom JS 
                <script defer src="js/main.js"></script>-->
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        include "nav.inc.php";
        ?>
        <main class="container-fluid p-0 m-0">
            <div class="row">
                <div class="col-md-5 d-none d-md-block d-lg-block">
                    <div class="text-center register-background">
                        <img src="/Images/FashionLogo.png" class="img-fluid p-3" style="height:15%" alt="Responsive image">
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="d-flex vh-100 justify-content-center mt-5 mt-md-0 mt-lg-0">
                        <div class="card align-self-center bg-light border-light"> 
                            <div class="card-body">
                                <h3 class="fw-bold mb-4 pt-2 text-center">Register</h3>
                                <form action="temp.php" method="POST"> <!-- ../processes/process_register.php -->
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <!--Username Input--> 
                                            <div class="form-group text-left">
                                                <label for="fname">Username:</label>
                                                <input class="form-control" type="text" id="username" name="username"
                                                       required maxlenth="45" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <!--Email Input--> 
                                            <div class="form-group  text-left">
                                                <label for="email">Email:</label>
                                                <input class="form-control" type="email" id="email"
                                                       maxlength = "45" required name="email" placeholder="Email">
                                            </div>
                                            <br class="d-none d-md-block d-lg-block"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <!--First Name Input--> 
                                            <div class="form-group text-left">
                                                <label for="fname">First Name:</label>
                                                <input class="form-control" type="text" id="fname" name="fname"
                                                       required maxlenth="45" placeholder="First name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <!--Last Name Input--> 
                                            <div class="form-group  text-left">
                                                <label for="lname">Last Name:</label>
                                                <input class="form-control" type="text" id="lname" name="lname"
                                                       required maxlenth="45" placeholder="Last name">
                                            </div>
                                            <br class="d-none d-md-block d-lg-block"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <!--Password Input--> 
                                            <div class="form-group  text-left">
                                                <label for="pwd">Password:</label>
                                                <input class="form-control" type="password" id="pwd" name="pwd"
                                                       required maxlenth="45" placeholder="Enter password">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <!--Password Confirm Input--> 
                                            <div class="form-group  text-left">
                                                <label for="pwd_confirm">Confirm Password:</label>
                                                <input class="form-control" type="password" id="pwd_confirm" name="pwd_confirm"
                                                       required maxlenth="45" placeholder="Confirm password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check text-center"> 
                                        <label>
                                            <input type="checkbox" name="agree" required> 
                                            Agree to terms and conditions.
                                        </label>
                                    </div>
                                    <!--Submit button--> 
                                    <button type="submit" class="btn btn-dark btn-block mb-4">
                                        Sign up
                                    </button>
                                    
                            <?php if($_GET) echo "<div class='alert alert-danger'>".$_GET['errorMsg']."</div>"; ?>
                                    <p class="text-center">
                                        Already a member? Sign in <a href="/Pages/login.php">here</a>.

                                        <!--Forget Password? Click <a href="">here</a>.-->
                                    </p>
                                </form>
                            </div>
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
