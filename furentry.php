<?php
$Y=$_REQUEST["Y"];
$X=$_REQUEST["X"];





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

$sql = "INSERT INTO fur 
VALUES ('$Y', '$X')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


//header("Location: page.php");
?>