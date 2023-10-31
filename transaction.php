
  

<?php

session_start();
// get the q parameter from URL

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";


$name=$_REQUEST['name'];
$email=$_REQUEST['email'];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection



if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select *from breed where name=$name";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

$stock=$row['stock']; 


if($stock>=1) $newstock=$stock-1; else $newstock=$stock;
$sql="  UPDATE breed SET stock=$newstock  WHERE name=$name";
$conn->query($sql);

if($stock>=1) $newstock=$stock-1; else $newstock=$stock;
$sql="  insert into order values($email,$name);
$conn->query($sql);

/*

$sql="  UPDATE furniture SET stock=$stock WHERE name='$name'";
$conn->query($sql);
}
$sql = "select *from user where id=$id";
$result=$conn->query($sql);

$row = $result->fetch_assoc();
echo $row['balance'];

*/


$conn->close();

?>
