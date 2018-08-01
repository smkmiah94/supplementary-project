<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['user']) || empty($_POST['pass'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['user'];
$password=$_POST['pass'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

    $connection = mysqli_connect("lamp.scim.brad.ac.uk", "sahme185", "P4sswordaa", "sahme185");

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection, $username);
//$password = mysqli_real_escape_string($connection, $password);
$password = md5($password);
// Selecting Database

//$db = mysqli_select_db($connection, "sahme185");

    // SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "select * from users where password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
    echo "ok";
$_SESSION['login_user']=$username; // Initializing Session
header("location: admin.html"); // Redirecting To Other Page
} else {
     header("location: error3.php");
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>