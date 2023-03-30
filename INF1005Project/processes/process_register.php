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

        <link rel="stylesheet" href="../css/main.css"/>

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
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <main class="container">
            <?php
            $email = $errorMsg = "";
            $fname = $errorMsg = "";
            $lname = $errorMsg = "";
            $user_name = $errorMsg = "";
            $pwd = $_POST["pwd"];
            $pwdconf = $_POST["pwd_confirm"];
            $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

            $success = true;
            if (empty($_POST["email"])) {
                $errorMsg .= "Email is required.<br>";
                $success = false;
            } if (empty($_POST["fname"])) {
                $errorMsg .= "First name is required.<br>";
                $success = false;
            } if (empty($_POST["lname"])) {
                $errorMsg .= "Last name is required.<br>";
                $success = false;
            } if (empty($_POST["pwd"])) {
                $errorMsg .= "Password is required.<br>";
                $success = false;
            } if (empty($_POST["username"])) {
                $errorMsg .= "Username is required.<br>";
                $success = false;
            } if (empty($_POST["pwd_confirm"])) {
                $errorMsg .= "Please confirm your password.<br>";
                $success = false;
            } if ($pwd !== $pwdconf) {
                $errorMsg .= "Password do not match.<br>";
                $success = false;
            } else {
                $email = sanitize_input($_POST["email"]);
                $fname = sanitize_input($_POST["fname"]);
                $lname = sanitize_input($_POST["lname"]);
                $username = sanitize_input($_POST["username"]);

// Additional check to make sure e-mail address is well-formed.
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg .= "Invalid email format.";
                    $success = false;
                }
            }

            if (!$success) {
                echo"<h1>Opps!</h1>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo("<button  onclick=\"location.href='../Pages/register.php'\">Return to Sign-Up</button>");
            } else {
                saveMemberToDB();
                if (!$success) {
                    echo"<h1>Opps!</h1>";
                    echo "<h4>The following input errors were detected:</h4>";
                    echo "<p>" . $errorMsg . "</p>";
                    echo("<button  onclick=\"location.href='../Pages/register.php'\">Return to Sign-Up</button>");
                } else {
                    echo"<h1>Yay!</h1>";
                    echo "<h4>Registration successful!</h4>";
                    echo "<p>Username: " . $username . "</p>";
                    echo "<p>First Name: " . $fname;
                    echo "<p>Last Name: " . $lname;
                    echo "<p>Email: " . $email . "</p>";
                    echo("<button  onclick=\"location.href='../Pages/Homepage.php'\">Back to Home</button>");
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
                global $fname, $lname, $email, $hashed_password, $errorMsg, $success, $username;
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
                    $stmt = $conn->prepare("INSERT INTO world_of_pets.users (fname, lname,
email, password, username) VALUES (?, ?, ?, ?, ?)");
// Bind & execute the query statement:
                    $stmt->bind_param("sssss", $fname, $lname, $email, $hashed_password, $username);
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