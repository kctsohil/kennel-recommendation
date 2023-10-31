
  

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT * from weight ";
$sql2 = "SELECT * from weight";
$sql3 = "SELECT * from tall";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);
$result1 = $conn->query($sql1);
$result2 = $conn1->query($sql2);
$result3 = $conn->query($sql3);
echo "<table>";
echo "<tr><td> tall ..........................</td><td>area.....................................................</td><td>Weight.................</td><td>Area.................................................</td><td>fur......................</td><td>temperature...................</td></tr>";
while(   ($row1 = $result1->fetch_assoc())  && ($row2 = $result2->fetch_assoc()) && ($row3 = $result3->fetch_assoc()) ) { 
echo "<tr><td>".$row1['Y']."</td><td>".$row1['X']."</td><td>".$row2['Y']."</td><td>".$row2['X']."</td><td>".$row3['Y']."</td><td>".$row3['X']."</td></tr>";
}
echo "</table>";
?>
