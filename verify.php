<?php
$email=$_REQUEST['email'];
$vcode=$_REQUEST['vcode'];
$user=$_REQUEST['user'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM userinfo where email='$email' AND vcode='$vcode'" ;
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) {echo 'account verified';
$sql = " UPDATE userinfo SET vcode='0'  WHERE email='$email' and vcode='$vcode'" ;
$result = $conn->query($sql);
session_start();
$_SESSION["user"] =$row['name'] ;   <a href='info.php'>proceed</a>";
}
 else echo 'wrong code';


	
?>

