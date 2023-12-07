<?php
$name=$_REQUEST["name"];






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE from breed 
where name='$name'";

if ($conn->query($sql) === TRUE) {
  echo " record success";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


//header("Location: page.php");
?>