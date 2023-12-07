<?php
session_start();
$_SESSION["user"]="";
session_unset();
session_destroy();
?>

<html >
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
</head>
<center>
<body>

<form action="signin.php" method="post" style="border:1px solid #ccc"  >
	<br><br><br><br>
<image src="KMS.png" style="position:fixed;z-index:-10;top:0;left:0;">


<div class="slidecontainer"    style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);width:100%">
<center style="font-size:40px"> KENNEL RECOMMENDATION SYSTEM </center>
<br><br><br><br>
    <h1>Sign In</h1>
    <p>Please fill in this form to sign in.</p>
<center>
    <hr>
	
	<table class="button" style="text-align: left;">;


	<tr><td> Email </td> <td> <input name="email" type="email" required></td></tr>
	<tr><td> Password </td><td> <input type="password" name="pass" required> </td></tr>
	</table>



   
   
      <button type="submit" class="button"><span>SUBMIT </span></button>
<br>
no account yet <a href="sign_up.php"> sign up </a>

</form>
</body>
</center>

</html>