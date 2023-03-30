<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="en">
    <?php
// Connect to MySQL
    $config = parse_ini_file('../../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        // Insert data into feedback table
        $sql = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo '<div class = "alert alert-success alert-dismissible fade show" role = "alert">';
            echo '<strong>Message Sent. We will get back to you as soon as we can!';
            echo '<button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">';
            echo '<span aria-hidden = "true">&times';
            echo "</span>";
            echo "</button>";
            echo "</div>;";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close MySQL connection
        $conn->close();
    }
    ?>
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
        <script src="https://kit.fontawesome.com/926cf4293a.js" crossorigin="anonymous"></script>

        <title>FastFash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class = "d-flex flex-column min-vh-100">
        <?php
        include "nav.inc.php";
        ?>

        <main class ="container">
            <!--Section: Contact v.2-->
            <section class="mb-4">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                    a matter of hours to help you.</p>

                <div class="row">

                    <div class="col-md-12 mb-md-0 mb-5">

                        <form method="post">

                            <div class ="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name:</label>
                                    <input class="form-control" type="text" id="name"
                                           minlength = "10" required name="name" placeholder="Enter your name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input class="form-control" type="email" id="email"
                                           minlength = "10" required name="email" placeholder="Enter email">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input class="form-control" type="text" id="subject"
                                       minlength = "10" required name="subject" placeholder="Enter the subject">
                            </div>

                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!--Grid column-->


                </div>
                <!--Grid column-->


                </div>

            </section>
            <!--Section: Contact v.2-->
        </main>



        <?php
        include "footer.inc.php";
        ?>

    </body>

</html>
