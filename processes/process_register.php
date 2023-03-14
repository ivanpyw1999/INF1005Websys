<html lang="en">
    <head>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="css/main.css">

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

        <title>World of Pets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        include "nav.inc.php";
        ?>
        <?php
        //Declare varaible for storing inputs
        $fname = $lname = $email = $errorMsg = "";
        $success = true;

        //Validate form inputs - check if empty for all imputs
        if (empty($_POST["lname"])) {
            $errorMsg .= "Last Name is required.<br>";
            $success = false;
        }
        if (empty($_POST["email"])) {
            $errorMsg .= "Email is required.<br>";
            $success = false;
        }
        if (empty($_POST["pwd"])) {
            $errorMsg .= "Password is required.<br>";
            $success = false;
        }
        if (empty($_POST["pwd_confirm"])) {
            $errorMsg .= "Confirm Password is required.<br>";
            $success = false;
        } else {
            //sanitize user inputs
            $fname = sanitize_input($_POST["fname"]);
            $lname = sanitize_input($_POST["lname"]);
            $email = sanitize_input($_POST["email"]);

            // Additional check to make sure e-mail address is well-formed.
            if (!empty($email) AND !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMsg .= "Invalid email format.<br>";
                $success = false;
            }
            if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
                $errorMsg .= "Passwords do not match.<br>";
                $success = false;
            } else {
                //hash password and store
                $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
                $success = true;
            }
        }
        ?>
        <div id="Server_result" class="container">
        <?php
        // Display success html code
        saveMemberToDB();
        if ($success) {
            echo "<hr>";
            echo "<h2>Your registration is successful!</h2>";
            echo "<h5>Thank you for signing up, " . $fname . " " . $lname . ".</h5>";
            echo "<form action='login.php'>";
            echo "<button style='background-color: #28A745; color: white; border: 0; border-radius: 3px; padding: 7px 18px; font-size: 15px;'>Log-in</button>";
            echo "</form>";
        }
        // else display html page meant for errors
        else {
            echo "<hr>";
            echo "<h2>Oops!</h2>";
            echo "<h4>The following errors were detected:</h4>";
            echo "<p>" . $errorMsg . "</p>";
            echo "<form action='register.php'>";
            echo "<button style='background-color: #DC3545; color: white; border: 0; border-radius: 3px; padding: 7px 18px; font-size: 15px;'>Return to Sign Up</button>";
            echo "</form>";
        }
        ?>
        </div>
            <?php

            //Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            /*
             * Helper function to write the member data to the DB
             */

            function saveMemberToDB() {
                global $fname, $lname, $email, $pwd, $errorMsg, $success;
// Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
// Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
// Prepare the statement:
                    $stmt = $conn->prepare("INSERT INTO world_of_pets_members (fname, lname,
email, password) VALUES (?, ?, ?, ?)");
// Bind & execute the query statement:
                    $stmt->bind_param("ssss", $fname, $lname, $email, $pwd);
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
        include "footer.inc.php";
        ?>
</body>

</html>