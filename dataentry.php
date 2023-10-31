<!DOCTYPE html>
<head>
<script>

function showCD() {
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };

   xmlhttp.open("POST", "SD.php", true);
    xmlhttp.send();
}


window.addEventListener('load', (event) => {
    console.log('The page has fully loaded');
showCD();
});

</script>

</head>
<body style="font-family:impact,sans-serif;">

<p><b>Start typing a name in the input field below:</b></p>
<form  method="post"  enctype="multipart/form-data"  >
<div  style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
<table >
<tr>
<td>  <label >INSERT INTO TABLE </label>  </td>
<td>  <select name="cars" id="cars">
  <option value="volvo">tall</option>
  <option value="saab">weight</option>
  <option value="mercedes">fur</option>
 
</select> </td>
<td>  VALUES  <input type="text" id="name" name="name" onkeyup=showCD() >   <input type="text" id="name" name="name" onkeyup=showCD() ></td>


</tr>

<tr>
<td>  <label >UPDATE </label>  </td>
<td>  <select name="cars" id="cars">
  <option value="volvo">tall</option>
  <option value="saab">weight</option>
  <option value="mercedes">fur</option>
</select>      SET <input>  , <input></td>
<td>  WHERE  <input type="text" id="name" name="name" onkeyup=showCD() >  AND  <input type="text" id="name" name="name" onkeyup=showCD() > </td>
</tr>

<tr> 
<td> <button type="submit"> GO </button>  </td>
</tr>
</table>
</div>
<br>
<br>
<br><br><br><br><br><br>
<p  id="txtHint">89898989</p>


</form>
</body>
</html>