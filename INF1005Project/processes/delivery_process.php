<?php
session_start();
$user_id = $_SESSION["member-id"];
?>
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

        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/ShoppingCart.css">

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
        include "../Pages/nav.inc.php";
        ?>
        <main class="container">
            <?php
            $block = $errorMsg = "";
            $street = $errorMsg = "";
            $unit = $errorMsg = "";
            $postal = $errorMsg = "";
            $success = true;
            if (empty($_POST["block"])) {
                $errorMsg .= "Block number is required.<br>";
                $success = false;
            } if (empty($_POST["street"])) {
                $errorMsg .= "Street Address is required.<br>";
                $success = false;
            } if (empty($_POST["unit"])) {
                $errorMsg .= "Unit number is required.<br>";
                $success = false;
            } if (empty($_POST["postal"])) {
                $errorMsg .= "Postal code is required.<br>";
                $success = false;
            } else {
                $block = sanitize_input($_POST["block"]);
                $street = sanitize_input($_POST["street"]);
                $unit = sanitize_input($_POST["unit"]);
                $postal = sanitize_input($_POST["postal"]);
            }
            if (!$success) {
                echo"<h1>Opps!</h1>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo("<button  onclick=\"location.href='../Pages/MyAccount.php'\">Return to Account page</button>");
            } else {
                saveMemberToDB();
                if (!$success) {
                    echo"<h1>Opps!</h1>";
                    echo "<h4>The following input errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo("<button  onclick=\"location.href='../Pages/MyAccount.php'\">Return to Account page</button>");
                } else {
                    echo"<h1>Yay!</h1>";
                    echo "<h4>Delivery address update successful!</h4>";
                    echo "<p>Block: " . $block . "</p>";
                    echo "<p>Street: " . $street;
                    echo "<p>Unit: " . $unit;
                    echo "<p>Postal: " . $postal . "</p>";
                    echo "<p>Note:You must LOG-OUT for changes to take effect</p>";
                    echo("<button  onclick=\"location.href='../Pages/logout.php'\">Log-OUT</button>");
                }
            }

//Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function saveMemberToDB() {
                global $block, $street, $unit, $errorMsg, $success, $postal, $user_id;
// Create database connection.
                $config = parse_ini_file('/var/www/private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
// Check connection
                if ($conn->connect_error || !$success) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
// Prepare the statement:
                    $stmt = $conn->prepare("UPDATE world_of_pets.users SET block=?, street=?, unit=?, postal=? WHERE member_id=?");
// Bind & execute the query statement:
                    $stmt->bind_param("sssss", $block, $street, $unit, $postal, $user_id);
                    if (!$stmt->execute()) {
                        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                        $success = false;
                    }
                    $stmt->close();
                }
                $conn->close();
            }
            ?>
        </main>
        <?php
        include "../Pages/footer.inc.php";
        ?>
    </body>