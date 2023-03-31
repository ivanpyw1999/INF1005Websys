<nav class = "navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="Homepage.php"><img src="../Images/FashionLogo.png" style="width: 100px; height: 50px;" alt="logo"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <div class="input-group">
            <form action="searchbar.php" method="post" class="d-flex">
                <input type="text" id="searchbar" name="searchbar" class="form-control flex-fill" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px" placeholder="Search our products list!">
                <button class="btn btn-secondary flex-shrink-0" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; "type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>


        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php
            if (!empty($_SESSION["username"])) {
                if ($_SESSION["member-id"] == '1') {
                    echo '<li class = "nav-item">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../Images/account.png" style="width:25px; height: 25px" alt="account dropdown" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item disabled" >Welcome! Admin</a>
          <a class="dropdown-item" href="AdminPage.php">Admin Dashboard</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>   
    </ul>
  </div></li>';
                } else {

                    echo '<li class = "nav-item">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../Images/account.png" style="width:25px; height: 25px" alt="account dropdown" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item disabled" >Welcome! ' . $_SESSION["username"] . '</a>
          <a class="dropdown-item" href="MyAccount.php">Profile page</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>   
    </ul>
  </div></li>';
                    echo '<li class ="nav-item">
              <a class ="nav-link" href="ShoppingCart.php"><img src="../Images/shopping-cart.png" style="width:25px; height: 25px" alt="cart"></a>  </li>
          </li>';
                }
            } else {

//put login form or include here.
                echo '<li class = "nav-item">
                <a class = "nav-link" href = "register.php">Register<span class="sr-only">(current)</a>
                </li>';
                echo '<li class = "nav-item">
                <a class = "nav-link" href = "login.php">Log-In<span class="sr-only">(current)</span></a>
                </li>';
            }
            ?>

            <!-- 
          <li class ="nav-item">
              <a class ="nav-link"><img src="../images/account.png" style="width:25px; height: 25px" alt="profile"></a>  </li>
          </li>
            comment -->
        </ul>

    </div>
</nav>