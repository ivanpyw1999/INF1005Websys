<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="en">
    <head>
        <!-- Custom Bootstrap -->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <!-- Custom CSS -->
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
        
        <!-- CSS and JS for Swiper JS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        
       <!-- Custom Bootstrap -->
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
            <div class='homepagediv vh-100' id='homepagediv'>
                
                <!-- Slider for Advertisements -->
                <div class="slide-container swiper">
                    
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            
                            <!-- Nine Image Cards -->
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/firstad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/secondad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/thirdad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/fourthad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/fifthad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/sixthad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/seventhad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/eighthad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                            <div class="card d-flex swiper-slide">
                                <div class="image-content home-ad-image-div">
                                    <img src="../Images/advertisements/ninthad.png" alt="Advertisement" class="homeadimg">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                    <div class="swiper-pagination"></div>
                    
                </div>
                
                <div class="homecatsdiv">
                    
                    <div class='homecatheaderdiv'>
                        
                        <div class="homecatheader">
                            <p class="homecattitle">Categories</p>
                        </div>
                        
                        <div class="homecatsbtndiv">
                            <a class="homecatsbtn" href="../Pages/ProductList.php">View All Categories</a>
                        </div>
                        
                    </div>
                    
                    <div class="homecategorywrapper h-100 flex-wrap">

                        <!-- This is the slideshow carousel-->
                        <div class="homecatsection row " id="homecatsection">
                            <!-- Can add div later-->
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 catdivwrapper">
                                <div class='homecatdiv card'>
                                    <div class="homecatimgdiv">
                                            <img src="../Images/productimgs/yellowshirt.png" alt="Top Category" class="homecatimg">
                                    </div>
                                
                                    <div class="homecattxtdiv">
                                        <p class="homecattxt">
                                            TOP
                                        </p>
                                    </div>        

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3 catdivwrapper">
                                <div class='homecatdiv card'>
                                    <div class="homecatimgdiv">
                                        <img src="../Images/productimgs/finalpantsfront.png" alt="Bottom Category" class="homecatimg">
                                    </div>

                                    <div class="homecattxtdiv">
                                        <p class="homecattxt">
                                            BOTTOM
                                        </p>
                                    </div>      

                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 catdivwrapper">
                                <div class='homecatdiv card'>
                                    <div class="homecatimgdiv">
                                        <img src="../Images/productimgs/manyjeans.png" alt="Jeans Category" class="homecatimg">
                                    </div>

                                    <div class="homecattxtdiv">
                                        <p class="homecattxt">
                                            JEANS
                                        </p>
                                    </div>      

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3 catdivwrapper">
                                <div class='homecatdiv card'>
                                    <div class="homecatimgdiv">
                                        <img src="../Images/productimgs/finaldressfront.png" alt="Dresses Category" class="homecatimg">
                                    </div>

                                    <div class="homecattxtdiv">
                                        <p class="homecattxt">
                                            DRESSES
                                        </p>
                                    </div>      

                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 catdivwrapper">
                                <div class='homecatdiv card'>
                                    <div class="homecatimgdiv">
                                        <img src="../Images/productimgs/finaljacket.png" alt="Outerwear" class="homecatimg">
                                    </div>

                                    <div class="homecattxtdiv">
                                        <p class="homecattxt">
                                            OUTERWEAR
                                        </p>
                                    </div>      

                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 catdivwrapper">
                                <div class='homecatdiv card'>
                                    <div class="homecatimgdiv">
                                        <img src="../Images/productimgs/colourfulshoes.png" alt="Outerwear" class="homecatimg">
                                    </div>

                                    <div class="homecattxtdiv">
                                        <p class="homecattxt">
                                            SHOES
                                        </p>
                                    </div>      

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
