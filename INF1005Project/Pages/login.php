
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

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        include "nav.inc.php";
        ?>
        <main class="container-fluid">
            <div class="d-flex h-75 justify-content-center">
                <!--<div class="card shadow-5-strong align-self-center">-->
                <div class="card align-self-center bg-light border-light"> 
                    <div class="card-body mx-5">
                        <h3 class="fw-bold mb-4 pt-2 text-center">Login</h3>
                        <form action="../processes/process_login.php" method="post">
                            <!--Email Input--> 
                            <div class="form-group">
                                <input class="form-control" type="email" id="email"
                                       maxlength = "45" required name="email" placeholder="Email">
                            </div>
                            <br/>
                            <!--Password Input-->
                            <div class="form-group">
                                <input class="form-control" type="password" id="pwd"
                                       minlength = "10" required name="pwd" placeholder="Password">
                            </div>
                            <br/>
                            <!--Submit button--> 
                            <button type="submit" class="btn btn-dark btn-block mb-4">
                                Sign up
                            </button>
                            
                            <?php if($_GET) echo "<div class='alert alert-danger'>".$_GET['errorMsg']."</div>"; ?>
                            
                            <p class="text-center">
                                Not a member yet? <br class="d-md-none d-lg-none"/>Register <a href="/Pages/register.php">here</a>.
                                <!--Forget Password? Click <a href="">here</a>.-->
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include "footer.inc.php";
        ?>

    </body>

</html>
