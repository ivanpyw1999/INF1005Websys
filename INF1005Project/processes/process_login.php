<?php
// Start the session
session_start();
?>
<head>
    <title>FashFash</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script defer
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
            integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
            crossorigin="anonymous">
    </script>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <script defer src="../js/main.js"></script>
    <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>
<body>
    <?php
    include "../Pages/nav.inc.php";
    ?>
    <main class="container">
        <?php
        $email = $errorMsg = "";
        $pwd = $_POST["pwd"];
        $success = true;
        if (empty($_POST["email"])) {
            $errorMsg .= "Email is required.<br>";
            $success = false;
        } if (empty($_POST["pwd"])) {
            $errorMsg .= "Password is required.<br>";
            $success = false;
        } else {
            $email = sanitize_input($_POST["email"]);

// Additional check to make sure e-mail address is well-formed.
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMsg .= "Invalid email format.";
                $success = false;
            }
        }
        authenticateUser();
        if ($success) {
            echo"<h1>Yay!</h1>";
            echo "<h4>Welcome Back! " . $fname . " " . $lname . "</h4>";
            echo("<button  onclick=\"location.href='../Pages/Homepage.php'\">Back to Home</button>");
            $_SESSION["username"] = $username;
            $_SESSION["member-id"] = $userid;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["email"] = $email;
            $_SESSION["block"] = $block;
            $_SESSION["street"] = $street;
            $_SESSION["unit"] = $unit;
            $_SESSION["postal"] = $postal;
        } else {
            echo"<h1>Opps!</h1>";
            echo "<h4>The following input errors were detected:</h4>";
            echo "<p>" . $errorMsg . "</p>";
            echo("<button  onclick=\"location.href='../Pages/login.php'\">Return to Login</button>");
        }

//Helper function that checks input for malicious or unwanted content.
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function authenticateUser() {
            global $fname, $lname, $email, $hashed_password, $errorMsg, $success, $userid, $username, $block, $street, $unit, $postal;
// Create database connection.
            $config = parse_ini_file('/var/www/private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {
// Prepare the statement:
                $stmt = $conn->prepare("SELECT * FROM users WHERE
email=?");
// Bind & execute the query statement:
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
                    $row = $result->fetch_assoc();
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $userid = $row["member_id"];
                    $hashed_password = $row["password"];
                    $username = $row["username"];
                    $block = $row["block"];
                    $street = $row["street"];
                    $unit = $row["unit"];
                    $postal = $row["postal"];

// Check if the password matches:
                    if (!password_verify($_POST["pwd"], $hashed_password)) {
// Don't be too specific with the error message - hackers don't
// need to know which one they got right or wrong. :)
                        $errorMsg = "Email not found or password doesn't match...";
                        $success = false;
                    }
                } else {
                    $errorMsg = "Email not found or password doesn't match...";
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