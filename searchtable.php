 <?php
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

$sql1 = "SELECT * from breed ORDER BY name ASC ";
$result = $conn->query($sql1);

$hint = "";



// lookup all hints from array if $q is different from ""






$table=0;

if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
echo '<center><table><tr>';
  while($row = $result->fetch_assoc()) {
    if (stristr($q, substr($row["name"], 0, $len))) { 
	
if($table<=1){
$table++;
echo '<td class="buttonK"><image width=260 height=260 '.'src='.$row["image"]; ?>  onclick=select('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')></image>  <?php 
echo '<br><center>'.$row['name']; ?> <br><image src='find.png' class="buttonK" width=30 height=30 onClick=zoom(<?=$row['name']?>)></image> <?php  echo '</td>';

} else {$table=0; echo '</tr><tr>';}

    } 
  }

echo '</table>';
}  
else { 
?>   <center> <table> <tr> <?php

 while($row = $result->fetch_assoc()){ 
?>

<?php
echo '<td class="buttonK"><image width=218 height=218 '.'src='.$row["image"]; ?>  onclick=select('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')></image>  <?php 
echo '<br><center>'.$row['name']; ?> <br><image  class="buttonK" src='find.png'  width=30 height=30 onclick=zoom('<?=$row['name']?>')></image> <?php  echo '</td>';
if($table<=1){
$table++;


} else {$table=0; echo '</tr><tr>';}

    } 


 }




echo '</table></center>';

// Output "no suggestion" if no hint was found or output correct values


$conn->close();



?>
