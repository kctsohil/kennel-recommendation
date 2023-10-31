<?php
$x1 = $_REQUEST["height"];
$x2=$_REQUEST["weight"];
$x3=$_REQUEST["fur"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * from tall";
$sql2 = "SELECT * from breed";
$sql3= "SELECT * from weight";
$sql4= "SELECT * from fur";

function findab($sql){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";
 $conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($sql);
$hint = "";

$sumX=0;
$sumY=0;
$sumXY=0;
$sumXsq=0;
$n=0;
$k=0;

// lookup all hints from array if $q is different from ""
  while($row = $result->fetch_assoc()) {
$sumX=$row['X']+$sumX;    
$sumY=$row['Y']+$sumY;
$sumXY=$row['X']*$row['Y']+$sumXY;
$sumXsq=$row['X']*$row['X']+$sumXsq;
$n++;$k++;
}

$meanX=$sumX/$n;  $meanY=$sumY/$k;
global $a ;
global $b;
//$b=$sumXY/$sumXsq;
//$a=$meanY-$b*$meanX;

$b=($n*$sumXY-$sumX*$sumY)/($n*$sumXsq-$sumX*$sumX);
$a=($sumY*$sumXsq-$sumX*$sumXY)/($n*$sumXsq-$sumX*$sumX);
}

findab($sql1);
$x=$x1;   //yard 
$y1=$a+$b*$x;

findab($sql3);  //yard
$y2=$a+$b*$x;

findab($sql4);
$x=$x3;    //temp
$y3=$a+$b*$x;

//echo $y1 .'<br>' .$y2 . '<br>'. $y3 ;

$result1 = $conn->query($sql2);
$table=0;

?>   <center> <table><tr> <?php

 while($row = $result1->fetch_assoc()){ 
if(($row['height']-$y1)<6 && ($row['height']-$y1)>-6   &&  ($row['weight']-$y2)<6 && ($row['weight']-$y2)>-6 && ($row['fur']-$y3)<6 && ($row['fur']-$y3)>-6) {

?>

<?php
echo "<td class='button'><image width=260 height=260 "."src=".$row["image"]; ?> onclick=select('<?=$row['image']?>','<?=$row['name']?>','<?=$row['stock']?>','<?=$row['price']?>')></image>  <?php 
echo '<br><center>'.$row['name']; ?> <br><image src='find.png' class="button" width=30 height=30 onclick=zoom('<?=$row['name']?>')></image> <?php  echo '</td>';
if($table<=1){
$table++;


} else {$table=0; echo '</tr><tr>';}

    } 

 }




echo '</table></center>';
?>