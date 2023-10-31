<?php
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "item";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM userinfo where email='$email' AND password='$pass'" ;
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) echo $row['name'];else header("Location: sign_in.php");
if ($row['vcode']=='0') {session_start();
$_SESSION["user"] = $row['name'];  header("Location: info.php");
}  

	
?>


<html>
<head>
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
function showHint() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
	var vcode=document.getElementById("vcode").value;
	var email= '<?=$email?>';
	var name= '<?=$row['name']?>';
    xmlhttp.open("GET", "verify.php?vcode="+vcode+"&email="+email+"&user="+name, true);
    xmlhttp.send();
  
}
</script>
</head>
<body>
<center>
<form action="signin.php" method="post" style="border:1px solid #ccc"  >
	<br><br><br><br>
<image src="KMS.png" style="position:fixed;z-index:0;top:0;left:0;">
<div class="slidecontainer"    style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);width:100%">
<center style="font-size:40px"> KENNEL RECOMMENDATION SYSTEM </center>

<br><br><br><br>
    <h1>Sign In</h1>
    <p>Please fill in this form to sign in.</p>
    <hr>
	
	<table class="button">

	<tr><td> Verification Code </td> <td> <input id="vcode"  required></td></tr>
	
	</table>



   
   
      <button type="button" onclick="showHint()"  class="button"><span>SUBMIT </span></button>

</form>
<p>Suggestions: <span id="txtHint"></span></p>
<center>
</body>
</html>