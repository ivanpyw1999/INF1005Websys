<?php

$userinput = $_POST['searchbar'];
header("location: ../Pages/ProductList.php?search=".$userinput);
?>