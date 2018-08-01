<?php  
//export.php  
$connect = mysqli_connect("lamp.scim.brad.ac.uk", "dkhan5", "Nosesabe10", "dkhan5");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT username, email , password FROM users";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<table class="table table-dark">
 <tr>
  <th>UOB</th> 
  <th>Email</th> 
  <th>Password (MD5 Encrypted)</th>
 </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= "<tr><td>" . $row["username"] . "</td><td>". $row["email"] . "</td><td>". $row["password"]. "</td></tr>";
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=registeredusers.xls');
  echo $output;
 }
}
?>