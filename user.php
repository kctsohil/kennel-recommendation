<html>
<head>
<script>
function showHint() {
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
	var name=document.getElementById("name").value;
	
   xmlhttp.open("POST", "search.php?name="+name , true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
xmlhttp.close();
}


showHint();
</script>
</head>
<body style="font-family:impact,sans-serif;">

<p><b>Start typing a name in the input field below:</b></p>
<form id="form" action="signup.php" method="post">
<div  style="position: sticky;top: 0;background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
<table >
<tr>
<td>  <label for="name">item name</label>  </td>
<td>  <input type="number" id="name" name="id"  onkeyup="showHint()"> </td>
</tr>
<tr>
<td> <label for="price">password</label> </td>
 <td> <input type="password" id="password" name="password"> </td>
</tr>
<tr>

<tr> 
<td> <button>create </td>
</tr>
</table>
<a href="login.php">get in</a>
</div>
<br>
<p>Suggestions: <span id="txtHint"></span></p>

</form>
</body>
</html>