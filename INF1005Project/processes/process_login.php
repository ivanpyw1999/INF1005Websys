<?php

//Declare variable for storing inputs
$email = $errorMsg = "";
$success = true;

//Validate form inputs - check if empty for all imputs

if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
}
if (empty($_POST["pwd"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
} else {
    //sanitize user inputs
    $email = sanitize_input($_POST["email"]);
    $pwd = sanitize_input($_POST["pwd"]);

    // Additional check to make sure e-mail address is well-formed.
    if (!empty($email) AND !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    } else {
        $success = true;
    }
}

if ($success) {
    // Database
//        authenticateUser();

    tempAuthenticateUser();

    if ($success) { // redirect to Homepage
        header("Location: ../Pages/Homepage.php?");
    } else { // redirect to Login With error Msg
        header("Location: ../Pages/login.php?errorMsg=" . $errorMsg);
    }
}
// else display html page meant for errors
else {
    header("Location: ../Pages/login.php?errorMsg=" . $errorMsg);
}

/*
 * Helper function to authenticate the login.
 */

// temp function i use to test front end side
function tempAuthenticateUser() {
    global $pwd, $success, $errorMsg;
    $userCredentials = array("password" => password_hash("password123", PASSWORD_DEFAULT));

    if (!password_verify($pwd, $userCredentials["password"])) {
        $errorMsg = "Email not found or password doesn't match...";
        $success = false;
    }
}

// From previous labs
function authenticateUser() {
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
        $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
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
            $pwd_hashed = $row["password"];
// Check if the password matches:
            if (!password_verify($_POST["pwd"], $pwd_hashed)) {
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

// Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
