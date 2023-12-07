<?php session_start();$name=$_SESSION['user']; ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="mystyle.css">
<script>
var orderstrigger=false;
function showHint() {
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
	var name=document.getElementById("name").value;
	
   xmlhttp.open("POST", "searchDF.php?name="+name, true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
xmlhttp.close();
}

function showHint1() {
 document.getElementById("orders").hidden=!(document.getElementById("orders").hidden);
 if(orderstrigger){
document.getElementById("bookings").style="height: 260px;overflow: scroll !important;";orderstrigger=false;} else{document.getElementById("bookings").style=" ";orderstrigger=true;}
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("orders").innerHTML = this.responseText;
      }
    };
	var name=document.getElementById("name").value;
	
   xmlhttp.open("POST", "search1.php?name="+name, true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
xmlhttp.close();




}



function zoom(name) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("usersignup").innerHTML = "<center>"+this.responseText+"</center>";
      }
    };


   xmlhttp.open("POST", "detailadmin.php?name="+name , true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
xmlhttp.close();

}

function signinMenu() {
window.location.href = "sign_in.php";

}




function close1() {
   
        document.getElementById("usersignup").innerHTML = " ";
 document.getElementById("usersignup1").hidden=true; document.getElementById("usersignin").hidden=true;
document.getElementById("orders").hidden=true;
  
}

function recommend(page) {
   
  window.location.href = page;
  
}




function order(name) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("usersignup").innerHTML = this.responseText;
      }
    };
	
   xmlhttp.open("POST", "order.php?name="+name, true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
xmlhttp.close();
}


function cancel(id,name) {

	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("usersignup").innerHTML = this.responseText;
      }
    };
	
   xmlhttp.open("POST", "cancel.php?id="+id+"&name="+name, true);
//  xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
showHint1();
xmlhttp.close();
showHint1();

}



function userop(){
 var xmlhttp1 = new XMLHttpRequest();
    xmlhttp1.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("balance").innerHTML = this.responseText;
      }
    };
var price=Number(document.getElementById("price").innerHTML);
var balance=Number(document.getElementById("balance").innerHTML);
var stock=Number(document.getElementById("stock").innerHTML);
var amt=document.getElementById("amt").value;
var error=false;
if(amt>stock && stock>0) {document.getElementById("amt").value=prompt("enter correct quantity");error=true;}
if(amt<0) {document.getElementById("amt").value=prompt("enter correct quantity");error=true;}
if (price>balance) {alert("insufficent balance");document.getElementById("myAudio").currentTime = 0;document.getElementById("myAudio").play();}
else if( document.getElementById("stock").innerHTML>0){
	if(confirm("are u sure?") && error==false) {document.getElementById("stock").innerHTML=document.getElementById("stock").innerHTML-document.getElementById("amt").value;
					var price=document.getElementById("price").innerHTML*document.getElementById("amt").value;
					var name=document.getElementById("itemname").innerHTML;
					var stock=document.getElementById("stock").innerHTML;
					
  					 xmlhttp1.open("POST", "transaction.php?price="+price+" &name="+name+" &stock="+stock, true);
					document.getElementById("myAudio").play();
 						xmlhttp1.send();}
	} else {alert("out of stock");document.getElementById("myAudio1").currentTime = 0;document.getElementById("myAudio1").play();}

}






window.addEventListener('load', (event) => {
    console.log('The page has fully loaded');
	document.getElementById("slide").hidden=true;
 document.getElementById("slidegap").hidden=true;
showHint();
});

window.addEventListener('keydown', function(e){
    if((e.key=='Escape'||e.key=='Esc'||e.keyCode==27) ){
        showHint();
     
    }
});

</script>


<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 60%;
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
<body >
<audio id="myAudio">
  <source src="ring.wav" type="audio/ogg">
  Your browser does not support the audio element.
</audio>
<audio id="myAudio1">
  <source src="error.wav" type="audio/ogg">
</audio>
<p><b>Start typing a name in the input field below:</b></p>
<form action="" method="post"  enctype="multipart/form-data"  >
<div class="slidecontainer"    style="position:fixed;top:0; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);width:100%">
<center style="font-size:40px"> KENNEL RECOMMENDATION SYSTEM </center>
<table width=100%  class="button" >
<tr><td></td><td><image src="korgi.gif" width=100 height=60></td><td style="text-align:right;" id="username"><image width=50 height=50 src="user.png"></image><br><?=$name ?> 


   <br> <button onclick="signinMenu()" type="button">signin</button></td><td></td>
</tr>


</table>
<button type="button" class="button" onclick="recommend('adminK.php')">RECOMEND</button>
<button type="button" class="button" onclick="recommend('adminU.php')">UserInfo</button>
<button type="button" class="button" onclick="recommend('adminAF.php')">Algorithm data1</button>
<button type="button" class="button" onclick="recommend('adminAH.php)">Algorithm data2</button>


<br>


<div id="slide" >
<input type="range" min="1" max="100" value="50" class="slider" id="myRange1">
 <p>Your Area: <span id="s1"></span></p>


<input type="range" min="1" max="100" value="50" class="slider" id="myRange3">
  <p>Area temperature: <span id="s3"></span></p>  </div>


 <image width=15 height=15  src="find.png" ><input type="search" id="name"  onkeyup=showHint() > </td><td >  

</div>


 



<div id="slidegap"> <br><br><br><br></div>


<br><br><br><br><br><br><br><br><br>
<image src="KMS.png" style="position:fixed;z-index:-6;top:0;left:0;"></image>
<class   style="z-index:3;position:fixed;top:20%; background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);"><span id="usersignup"></span></class>
<p> <span id="txtHint"></span></p>
<class   style="z-index:3;position:fixed;top:24%;left:80%; "><center><p class="button" onclick="showHint1()" >orders </p><p id="bookings" > <span id="orders" ></span></p></class>



</form>
</body>
<script> function showCD(str) {
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


var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("s1");

var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("s3");

output1.innerHTML = slider1.value+" MeterSquare";

output3.innerHTML = slider3.value+"Degree Centigrade";

slider1.oninput = function() {
  output1.innerHTML = this.value+ " MeterSquare";
showCD();
}



slider3.oninput = function() {
  output3.innerHTML = this.value+" Degree Centigrade";
showCD();
}
</script>
</html>