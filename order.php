
  

<?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";

session_start();
if(!isset($_SESSION['user'])) echo "login to order" ; else {
$user=$_SESSION['user'];


$name=$_REQUEST['name'];
//$email=$_REQUEST['email'];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection



if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select *from breed where name='$name'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

$stock=$row['stock']; 


if($stock>=1) $newstock=$stock-1; else $newstock=$stock;
$sql="  UPDATE breed SET stock=$newstock  WHERE name='$name'";
if($conn->query($sql)) echo "ordered requested breed" ;

if($stock>=1) $newstock=$stock-1; else $newstock=$stock;
$sql="  insert into orders(email,breed) values('$user','$name')";
$conn->query($sql);




$conn->close();
}
?>
