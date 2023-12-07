<?php
$name=$_GET['name'];
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

$sql1 = "SELECT * from breed where name='$name' ";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();


?>


<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>


<script>
var password=prompt("enter password");
if (password=="sohil") ; else location.reload();
function showHint() {
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
	var name=document.getElementById("name").value;
	var photo=document.getElementById("photo");
	var stock=document.getElementById("stock").value;
	var price=document.getElementById("price").value;
   xmlhttp.open("POST", "search.php?name="+name +"&photo="+document.getElementById("photo")+"&stock="+stock+"&price="+price, true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
}

function showHintt(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "search.php?name=" + str, true);
    xmlhttp.send();
  }
}

function select(str){
document.getElementById("selected").src=str;
}

</script>

</head>

<center>

<body style="font-family:impact,sans-serif;">

<form action="gethint.php" method="post"  enctype="multipart/form-data"  >
<br><br><br><br>
<image src="KMS.png" style="position:fixed;z-index:-10;top:0;left:0;">
<div class="slidecontainer"    style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);width:100%">
<center style="font-size:40px"> KENNEL RECOMMENDATION SYSTEM </center>
<br><br><br><br>
<a href="admin.php"> CANCEL </a>
<h1> please fill the spaces  </h1>
<table class="button" style="text-align: left;">
<tr>
<td>  item name </td>
<td>  <input type="text" id="name" name="name" onkeyup=showHint(this.value) value=<?=$row['name']?> > </td>

</tr>
<tr>
<td> photo</td>
 <td> <input type="file" name="photo" id="photo"> </td>
 <td> <input type="file" name="photo1" id="photo1"> </td>
</tr>
<tr>
<td> stock </td>
<td>  <input type="number" id="stock" name="stock" min="0" max="100" value=<?=$row['stock']?> > </td>
</tr>
<tr>
<td> area</td>
<td>  <input type="number" id="area" name="area" min="0" max="100"  > </td>
</tr>
<tr>
<td> weight</td>
<td>  <input type="number" id="weight" name="weight" min="0" max="100"   value=<?=$row['weight']?>> </td>
</tr>
<tr>
<td> fur</td>
<td>  <input type="number" id="fur" name="fur" min="0" max="100"  value=<?=$row['fur']?>> </td>
</tr>
<tr>
<td> price  </td>
 <td> <input type="number" id="price" name="price" min="0" max="1000000000"  value=<?=$row['price'] ?> ></td> 
</tr>
<tr> 
<td> <button type="submit"> insert </button>  </td> 


 </tr> 

</table>


</div>
<br>
<br>

<br>
<p> <span id="txtHint"> </span></p>


</form>
</body>
</html>