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



</script>
</head>
<body style="font-family:impact,sans-serif;">
<image  style="position:fixed;top:0;z-index:-1;width:100%;"  src="illusion.gif" id="logo"></image>
<p><b>Start typing a name in the input field below:</b></p>
<form id="form" action="signin.php" method="post">
<div  style="position: sticky;top: 0;background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
<table >
<tr>

<td>  <label for="name">item name</label>  </td>
<td>  <input type="number"  name="id"  onkeyup="showHint()"> </td>
<td width=50px>  <label style="text-align:center;">search</label>  </td>
<td width=50px>  <input type="search" id="name"  onkeyup="showHint()" > </td>
</tr>
<tr>
<td> <label for="price">password</label> </td>
 <td> <input type="password" id="password" name="password"> </td>
</tr>
<tr>

<tr> 
<td> <button>getin</td>
</tr>
</table>
</div>
<br>
<p>Suggestions: <span id="txtHint"></span></p>

</form>
</body>
</html>