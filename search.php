
  

<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";



// get the q parameter from URL
$q = $_REQUEST["name"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * from breed";
$result = $conn->query($sql1);

$hint = "";



// lookup all hints from array if $q is different from ""








if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);

  while($row = $result->fetch_assoc()) {
    if (stristr($q, substr($row["name"], 0, $len))) { 
	
echo '<image width=160 height=160 '.'src='.$row["image"]; ?> onclick=select('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')></image> <?php 

    } 
  }
}  
else { 
 while($row = $result->fetch_assoc()){



echo ''.'<image width=160 height=160 '.'src='.$row["image"]; ?>  id=<?=$row['name']?> onmouseover=select('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')  onmouseout=unselect('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')></image> <?php }
}

// Output "no suggestion" if no hint was found or output correct values


$conn->close();



?>
