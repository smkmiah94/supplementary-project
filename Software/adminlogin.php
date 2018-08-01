<?php
session_start();
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
<input type="button" class="btn8" value="Go Back" onclick="relocate_back()">
    <br><br>
        <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Bradford University</span>
        <span class="site-heading-lower">Admin Portal</span>
    </h1>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1" id="form_container">
                    <img src="img/login.png">
                    <form action="adminloginconnection.php" method="POST" class="login">
                        <input placeholder="Admin ID*" type="text" name="user">
                        <input placeholder="Password" type="password" name="pass">
                        <input class="btn5" type="submit" value="Login" name="submit">

                    </form>
                </div>

            </div>
        </div>
                              <script>
        function relocate_back() {
            location.href = "index.html";
        }
    </script>
               
    </body>

    </html>