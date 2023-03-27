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
        <link rel="stylesheet" href="../css/products.css">
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

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        include "nav.inc.php";
        ?>



        <main class ="productlistmain">
            <div class='productlistdiv'>
                
                <div class="productbodydiv">
                    <div class="productfilterdiv">
                        <div class="searchfilterdiv">
                            <form class="form-inline searchfilterform">
                                <div class="searchinputdiv">
                                    <input class="form-control mr-sm-2 searchinput" type="search" placeholder="Search" aria-label="Search">
                                </div>
                                <div class="searchbtndiv">
                                    <button class="btn btn-outline-success my-2 my-sm-0 searchbtn" type="submit">Filter</button>
                                </div>
                                
                                
                            </form>
                        </div>
                        
                        <div class="filtersdiv">
                            <div class="filtercatdiv">
                                <div class="filtercattxtdiv">
                                    <p class="filtercattxt">Categories</p>
                                </div>
                                
                                <div class="filtercatcheckdiv">
                                    <form class="filtercatcheck">
                                        
                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Top</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Bottom</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Jeans</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Dresses</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Outerwear</label>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="filtercatoptiondiv">
                                            <div class="filtercatboxdiv">
                                                <input class="filtercatoption" type="checkbox">
                                            </div>
                                            <div class="filterboxtxtdiv">
                                                <label class="filterboxtxt">Shoes</label>
                                            </div>
                                            
                                        </div>
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="productlistdiv">
                        <div class="productheaderdiv">
                            <h1 class="productheader">Product List</h1>
                        </div>
                        <div class="productlistwrapper">
                            
                            <div class="productcarddiv">
                                <div class="productimgdiv">
                                    <img src-="../Images/categories/stripedtop.png" class="productimg">
                                </div>
                                
                                <div class-="productcardcontent">
                                    <div class="productcardleft">
                                        <div class="productnamediv">
                                            <p class="productname">
                                                Striped Shirt
                                            </p>
                                        </div>
                                        
                                        <div class="productcostdiv">
                                            <p class="productcost">
                                                $7.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="productcardright">
                                        <div class="productsavebtndiv">
                                            <input class="productsavebtn" type="checkbox" name="productsave">
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            
                                                        <div class="productcarddiv">
                                <div class="productimgdiv">
                                    <img src-="../Images/categories/stripedtop.png" class="productimg">
                                </div>
                                
                                <div class-="productcardcontent">
                                    <div class="productcardleft">
                                        <div class="productnamediv">
                                            <p class="productname">
                                                Striped Shirt
                                            </p>
                                        </div>
                                        
                                        <div class="productcostdiv">
                                            <p class="productcost">
                                                $7.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="productcardright">
                                        <div class="productsavebtndiv">
                                            <input class="productsavebtn" type="checkbox" name="productsave">
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            
                                                        <div class="productcarddiv">
                                <div class="productimgdiv">
                                    <img src-="../Images/categories/stripedtop.png" class="productimg">
                                </div>
                                
                                <div class-="productcardcontent">
                                    <div class="productcardleft">
                                        <div class="productnamediv">
                                            <p class="productname">
                                                Striped Shirt
                                            </p>
                                        </div>
                                        
                                        <div class="productcostdiv">
                                            <p class="productcost">
                                                $7.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="productcardright">
                                        <div class="productsavebtndiv">
                                            <input class="productsavebtn" type="checkbox" name="productsave">
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            
                                                        <div class="productcarddiv">
                                <div class="productimgdiv">
                                    <img src-="../Images/categories/stripedtop.png" class="productimg">
                                </div>
                                
                                <div class-="productcardcontent">
                                    <div class="productcardleft">
                                        <div class="productnamediv">
                                            <p class="productname">
                                                Striped Shirt
                                            </p>
                                        </div>
                                        
                                        <div class="productcostdiv">
                                            <p class="productcost">
                                                $7.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="productcardright">
                                        <div class="productsavebtndiv">
                                            <input class="productsavebtn" type="checkbox" name="productsave">
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            
                                                        <div class="productcarddiv">
                                <div class="productimgdiv">
                                    <img src-="../Images/categories/stripedtop.png" class="productimg">
                                </div>
                                
                                <div class-="productcardcontent">
                                    <div class="productcardleft">
                                        <div class="productnamediv">
                                            <p class="productname">
                                                Striped Shirt
                                            </p>
                                        </div>
                                        
                                        <div class="productcostdiv">
                                            <p class="productcost">
                                                $7.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="productcardright">
                                        <div class="productsavebtndiv">
                                            <input class="productsavebtn" type="checkbox" name="productsave">
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            
                                                        <div class="productcarddiv">
                                <div class="productimgdiv">
                                    <img src-="../Images/categories/stripedtop.png" class="productimg">
                                </div>
                                
                                <div class-="productcardcontent">
                                    <div class="productcardleft">
                                        <div class="productnamediv">
                                            <p class="productname">
                                                Striped Shirt
                                            </p>
                                        </div>
                                        
                                        <div class="productcostdiv">
                                            <p class="productcost">
                                                $7.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="productcardright">
                                        <div class="productsavebtndiv">
                                            <input class="productsavebtn" type="checkbox" name="productsave">
                                        </div>
                                    </div>
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
