 <!DOCTYPE html>
 <html>
 <head>
 	<script>
  function changeText2(){
var firstname = document.getElementById('firstname').value;
document.getElementById('boldStuff2').innerHTML = firstname;
var node=document.createElement("LI");
var textnode=document.createTextNode(firstname);
node.appendChild(textnode);
document.getElementById("demo").appendChild(node);
 }
 </script>
 </head>
 <body>
 
 
 First name: <input type="text" id="firstname"><br> 
 <p>Your first name is: <b id='boldStuff2'></b> </p> 
 <p> Other people's names: </p>

 <li id="demo"> 
 </li>
 <input type='button' onclick='changeText2()'   value='Submit'/> 
 </body>
 </html>