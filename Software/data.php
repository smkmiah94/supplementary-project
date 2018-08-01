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
    <input type="button" class="btn3 btn-primary btn-xl" value="Logout" onclick="relocate_logout()">
    <br>
    <br>
    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Bradford University</span>
        <span class="site-heading-lower">Admin Portal</span>
    </h1>
    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Bradford PP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="admin.html">Check Uploaded CV's

              </a>
                    </li>
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="data.php">Registered Students Database</a>
                        <span class="sr-only">(current)</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end of nav-->
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-15" id="form_container">

                <table class="table table-dark">
                    <tr>
                        <th>UOB</th>
                        <th>Email</th>
                        <th>Password (MD5 Encrypted)</th>
                    </tr>

                    <?php
$conn = mysqli_connect("lamp.scim.brad.ac.uk", "dkhan5", "Nosesabe10", "dkhan5");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT username, email , password FROM users";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["username"] . "</td><td>". $row["email"] . "</td><td>". $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
                </table>
                <form method="post" action="export.php">
                    <input type="submit" name="export" class="btn7" value="Export Data" />
                </form>
                <input type="button" class="btn6" value="Refresh Data" onclick=" relocate_data()">

                <script>
                    function relocate_data() {
                        location.href = "data.php";
                    }
                </script>

            </div>
        </div>
    </div>
    <script>
        function relocate_logout() {
            location.href = "logout.php";
        }
    </script>
</body>

</html>