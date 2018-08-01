<?php
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli("lamp.scim.brad.ac.uk", "sahme185", "P4sswordaa", "sahme185");

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {

        //set all the post variables
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); //md5 has password for security

        //------------------*********************---------------------------------//

                //set session variables
                $_SESSION['username'] = $username;

                //insert user data into database
                $sql = "INSERT INTO users (username, email, password) "
                        . "VALUES ('$username', '$email', '$password')";

        //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                    header("location: adminform.php");
                }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
            } 
                else {
                    $_SESSION['message'] = "Two passwords do not match !";
                }

         }

?>
    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bradford University - Placement Portal</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/business-casual.css" rel="stylesheet">

    </head>

    <body>

        <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Bradford University</span>
        <span class="site-heading-lower">Placement Portal</span>
    </h1>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1" id="form_container">
                    <img src="img/login.png">
                    <form class="form" action="adminform.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error">
                            <?= $_SESSION['message'] ?>
                        </div>
                        <input type="text" placeholder="Admin ID*" name="username" required />
                        <input type="email" placeholder="Email" name="email" required />
                        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
                        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />

                        <input type="submit" value="Register" name="register" class="btn2" />
                        <input type="button" class="btn2" value="Already registered? Login" onclick=" relocate_login()">

                        <script>
                            function relocate_login() {
                                location.href = "adminlogin.php";
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>