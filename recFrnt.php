<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #04AA6D;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #04AA6D;
  cursor: pointer;
}
</style>

</head>
<body>
<image  style="position:fixed;top:0;z-index:-1;width:100%;"  src="sohil.jpeg" id="logo"></image>
<form>






<div class="slidecontainer"    style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);width:100%">
<center style="font-size:40px"> KENNEL RECOMMENDATION SYSTEM </center>

<table width=100%  >
<tr>
<td width=50px> <image align="left" width=90 height=90;" id="selected"  hidden="true"> </image> </td>
<td width=50px>  <label style="text-align:center;">search</label>  </td>
<td width=50px>  <input type="search" id="name"  onkeyup=showHint() > </td><td id="username">guest</td>
</tr>
<tr>
<td width=50px> <label >item</label> </td>
 <td width=50px id="itemname">  </td>

</tr>
<tr>
<td width=50px> <label >stock</label></td>
<td width=50px id="stock">  </td>
</tr>
<tr>
<td width=100> <label for="price">price</label> </td>
 <td width=100 id="price"> </td> </td>  <td width=100%> </td>  <td style="text-align:right;"> <button onclick="signin()" type="button">signin</button></td> <td> <button type="button" onclick="showitem()" >owned </td>
</tr>
<tr> 

</tr>
</table>

  <input type="range" min="1" max="100" value="50" class="slider" id="myRange1">
 <p>Your Area: <span id="s1"></span></p>


<input type="range" min="1" max="100" value="50" class="slider" id="myRange3">
  <p>Area temperature: <span id="s3"></span></p>

 
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <p> <span id="txtHint"></span></p>
</p>






</form>


</body>
<script>
function showCD(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
var height=document.getElementById("myRange1").value;
var weight=90;
var fur=document.getElementById("myRange3").value;
  xmlhttp.open("POST","linregalgo.php?height="+height+"&weight="+weight+"&fur="+fur,true);
  xmlhttp.send();
}

function select(image,name,stock,price){
document.getElementById("name").innerHTML="name: "+name;
document.getElementById("stock").innerHTML="stock: "+stock;
document.getElementById("price").innerHTML="price:"+price;
document.getElementById(name).src="uploads/"+name+".gif";
}

function unselect(image,name,stock,price){
document.getElementById("name").innerHTML="name: ";
document.getElementById("stock").innerHTML="stock: "+stock;
document.getElementById("price").innerHTML="price:"+price;
document.getElementById(name).src=image;
}






var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("s1");

var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("s3");
output1.innerHTML = slider1.value;

output3.innerHTML = slider3.value;

slider1.oninput = function() {
  output1.innerHTML = this.value;
showCD();
}



slider3.oninput = function() {
  output3.innerHTML = this.value;
showCD();
}


window.addEventListener('load', (event) => {
    console.log('The page has fully loaded');
showCD();
});


</script>



</html>