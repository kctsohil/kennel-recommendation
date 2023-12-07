<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";
session_start();$name=$_REQUEST['name'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM breed WHERE name='$name' " ;
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {

  ?> <center> <table><tr><td style="text-align: right;" ><button type="button" onclick="close1()" >X</button> </td></tr><tr><td><image width=390 height=390  src= <?=$row['image']?>></td></tr><tr><td>   name: <?=$row['name']?> </td></tr><tr><td> stock: <?=$row['stock']?></td></tr><tr><td> price: <?=$row['price']?></td></tr></table> <button type="button" onclick=order('<?=$row['name']?>')>modify</button><button type="button" onclick=order('<?=$row['name']?>')>remove</button></center>
<?php


  }




?>