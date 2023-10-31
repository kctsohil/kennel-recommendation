<!DOCTYPE html>
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
<body style="font-family:impact,sans-serif;">

<p><b>Start typing a name in the input field below:</b></p>
<form action="gethint.php" method="post"  enctype="multipart/form-data"  >
<div  style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
<table >
<tr>
<td>  <label >item name</label>  </td>
<td>  <input type="text" id="name" name="name" onkeyup=showHint(this.value) > </td>
<td> <image width=90 height=90;" id="selected"> </image> </td>
</tr>
<tr>
<td> <label >photo</label> </td>
 <td> <input type="file" name="photo" id="photo"> </td>
</tr>
<tr>
<td> <label >stock</label></td>
<td>  <input type="number" id="stock" name="stock" min="0" max="100"> </td>
</tr>
<tr>
<td> <label for="price">price</label> </td>
 <td> <input type="number" id="price" name="price" min="0" max="1000000000"></td> 
</tr>
<tr> 
<td> <button type="submit"> insert </button>  </td>
</tr>
</table>
</div>
<br>
<br>
<br>
<p> <span id="txtHint"></span></p>


</form>
</body>
</html>