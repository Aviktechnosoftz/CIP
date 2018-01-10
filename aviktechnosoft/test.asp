<%
Dim fname, myAge, myHeightM, allOfIt
myAge = 7
myAge = myAge & 5
myHeightM = 2
fname = "Teddy"
allOfIt = fname & " is " & myAge & " years old and "
allOfIt = allOfIt & myHeightM & " meters tall" 
Response.Write(allOfIt)
%>