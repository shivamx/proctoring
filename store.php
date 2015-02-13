
<?php
include "config.php";
//$con=mysqli_connect("localhost","root","getlost","tab");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 else {
$user=$_POST['id'];
$attempt=$_POST['id1'];
$time = date("d-m-Y h:i:s");

$sql="INSERT INTO logs VALUES ('$user','$attempt','$time')";
mysqli_query($con,$sql);
}


?>

