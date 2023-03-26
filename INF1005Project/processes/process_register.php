
<?php

//Declare varaible for storing inputs
$username = $email = $fname = $lname = $errorMsg = "";
$success = true;

//Validate form inputs - check if empty for all imputs
if (empty($_POST["username"])) {
    $errorMsg .= "Last Name is required.<br>";
    $success = false;
}
if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
}
if (empty($_POST["fname"])) {
    $errorMsg .= "Last Name is required.<br>";
    $success = false;
}
if (empty($_POST["lname"])) {
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
    $username = sanitize_input($_POST["username"]);
    $email = sanitize_input($_POST["email"]);
    $fname = sanitize_input($_POST["fname"]);
    $lname = sanitize_input($_POST["lname"]);

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


// Display success html code
//        saveMemberToDB();


if ($success) {
    // Database
//        saveMemberToDB();

    if ($success) { // redirect to Homepage
        
        header("Location: ../Pages/Homepage.php?success=1"); // success passes in case we want to display that new account is successfully created
        // Sessions ?
    } else { // redirect to Register With error Msg
        header("Location: ../Pages/register.php?errorMsg=". $errorMsg);
    }
}
// else display html page meant for errors
else {
    header("Location: ../Pages/register.php?errorMsg=" . $errorMsg);
}

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
        $stmt = $conn->prepare("INSERT INTO world_of_pets_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");
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