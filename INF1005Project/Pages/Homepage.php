
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
        <link rel="stylesheet" href="../css/homepage.css">

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
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>
        <script defer src="../js/main.js"></script>
        <script defer src="../js/homepage.js"></script>
       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class = "d-flex flex-column min-vh-100">
        <?php
        include "nav.inc.php";
        ?>

        <main class="homepage" id='homepage'>
            <div class='homepagediv' id='homepagediv'>
                
                <!-- This is the wrapper-->
                <div class="homeaddiv">
                    <div class="adcarouselbtndiv" id="adleft">
                        <i class="bi bi-arrow-left-short adcarouselbtn" ></i>
                    </div>
                    
                    <!-- This is the slideshow carousel-->
                    <div class="homeadcarousel" id="homeadcarousel">
                        <!-- Can add div later-->
                        <img src="../Images/homeadvertv2small.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertgreensmall.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertv2.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertgreensmall.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertv2small.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertgreensmall.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertv2.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertv2.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertgreensmall.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertv2.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertv2.png" alt="Advertisement" class="homeadimg">
                        <img src="../Images/homeadvertgreensmall.png" alt="Advertisement" class="homeadimg">
                        
                    </div>
                    <div class="adcarouselbtndiv" id="adright">
                        <i class="bi bi-arrow-right-short adcarouselbtn" ></i>
                    </div>
                    
              
                </div>
                
                
                <div class="homecatsdiv">
                    
                    <div class='homecatheaderdiv'>
                        
                        <div class="homecatheader">
                            <p class="homecattitle">CATEGORIES</p>
                        </div>
                        
                        <div class="homecatbtndiv">
                            <a class="homecatbtn" href="../Pages/ProductList.php">View All Categories</a>
                        </div>
                        
                    </div>
                    
                    <div class="homecategorywrapper">

                        <div class="catcarouselbtndiv" id="catleft">
                            <i class="bi bi-arrow-left-short catcarouselbtn" ></i>
                        </div>

                        <!-- This is the slideshow carousel-->
                        <div class="homecatcarousel" id="homecatcarousel">
                            <!-- Can add div later-->

                            <div class='homecatdiv'>
                                <div class="homecatimgdiv">
                                        <img src="../Images/categories/pinktop.png" alt="Advertisement" class="homecatimg">
                                </div>

                                <div class="homecattxtdiv">
                                    <p class="homecattxt">
                                        TOP
                                    </p>
                                </div>

                            </div>

                            <div class='homecatdiv'>
                                <div class="homecatimgdiv">
                                        <img src="../Images/categories/pantsfront.png" alt="Advertisement" class="homecatimg">
                                </div>

                                <div class="homecattxtdiv">
                                    <p class="homecattxt">
                                        BOTTOM
                                    </p>
                                </div>

                            </div>

                            <div class='homecatdiv'>
                                <div class="homecatimgdiv">
                                        <img src="../Images/categories/jeansfront.png" alt="Advertisement" class="homecatimg">
                                </div>

                                <div class="homecattxtdiv">
                                    <p class="homecattxt">
                                        JEANS
                                    </p>
                                </div>

                            </div>


                            <div class='homecatdiv'>
                                <div class="homecatimgdiv">
                                        <img src="../Images/categories/dressfront.png" alt="Advertisement" class="homecatimg">
                                </div>

                                <div class="homecattxtdiv">
                                    <p class="homecattxt">
                                        DRESSES
                                    </p>
                                </div>

                            </div>

                            <div class='homecatdiv'>
                                <div class="homecatimgdiv">
                                        <img src="../Images/categories/jacket.png" alt="Advertisement" class="homecatimg">
                                </div>

                                <div class="homecattxtdiv">
                                    <p class="homecattxt">
                                        OUTERWEAR
                                    </p>
                                </div>

                            </div>

                            <div class='homecatdiv'>
                                <div class="homecatimgdiv">
                                        <img src="../Images/categories/nikeshoe.png" alt="Advertisement" class="homecatimg">
                                </div>

                                <div class="homecattxtdiv">
                                    <p class="homecattxt">
                                       SHOES
                                    </p>
                                </div>

                            </div>



                        </div> 

                        <div class="catcarouselbtndiv" id="catright">
                            <i class="bi bi-arrow-right-short catcarouselbtn" ></i>
                        </div>


                </div>
                
            </div>
            
        </main>



        <?php
        include "footer.inc.php";
        ?>

    </body>

</html>
