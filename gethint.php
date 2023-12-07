<?php
$name=$_REQUEST["name"];
$area=$_REQUEST["area"];
$weight=$_REQUEST["weight"];
$fur=$_REQUEST["fur"];
$stock=$_REQUEST["stock"];
$price=$_REQUEST["price"];


$target_dir = "uploads/";


echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

$target_file = $name.".jpeg";
$target_file1 =$name.".gif";
$name=$_REQUEST["name"];
$area=$_REQUEST["area"];
$weight=$_REQUEST["weight"];
$fur=$_REQUEST["fur"];
$stock=$_REQUEST["stock"];
$price=$_REQUEST["price"];
$photo=$target_file;
$photo1=$target_file1;




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

$sql = "INSERT INTO breed 
VALUES ('$name', '$area','$weight','$fur','$photo','$photo1', '$stock','$price')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file1)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["photo1"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//header("Location: page.php");
?>