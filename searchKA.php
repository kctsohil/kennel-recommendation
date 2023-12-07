
  

<?php


// get the q parameter from URL

session_start();



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

$sql1 = "SELECT * from breed ";
$result = $conn->query($sql1);

$hint = "";



// lookup all hints from array if $q is different from ""






/*

if ($name !== "") {
  $name = strtolower($name);
  $len=strlen($name);
echo '<table>';
  while($row = $result->fetch_assoc()) {
    if (stristr($name, substr($row["name"], 0, $len))) { 
	


echo '<tr><td><image width=160 height=160 '.'src='.$row["image"]; ?> onclick=select('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')></image> <?php 
echo '</td><td>'.$row["name"].'</td><td>'.$row["stock"].'</td><td>'.$row["price"].'</td></tr>';
    } 
  }

echo '</table>';
}  
else { */
?>   <center> <table id="customers" ><tr><th>name</th><th> height </th> <th> weight </th><th> fur </th> <th> stock </th><th> price </th><th>  </th> </tr> <?php



if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);


    

 while($row = $result->fetch_assoc()){ 

  if (stristr($q, substr($row["name"], 0, $len))) { 
?>
<tr style="width:100%"><td> <?=$row['name']?> </td><td> <?=$row['height']?> </td><td> <?=$row['weight']?> </td><td> <?=$row['fur']?> </td><td> <?=$row['stock']?> </td><td> <?=$row['price']?> </td><td><button type="button" onclick=cancel('')> modify</button><a  href="pageedit.php?name=<?=$row['name']?>"> delete</a></td></tr>
<?php 

 }

 }
}  else{
  while($row = $result->fetch_assoc()){ 

    ?>
    <tr style="width:100%"><td> <?=$row['name']?> </td><td> <?=$row['height']?> </td><td> <?=$row['weight']?> </td><td> <?=$row['fur']?> </td><td> <?=$row['stock']?> </td><td> <?=$row['price']?> </td><td><button type="button" onclick=cancel('')> modify</button><a  href="pageedit.php?name=<?=$row['name']?>"> delete</a></td></tr>
<?php


  }
}

echo '</table></center>';

// Output "no suggestion" if no hint was found or output correct values


$conn->close();



?>
