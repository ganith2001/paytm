<?php
session_start();

?>
<html>
    <head>
   
</head>
    <body>
     <form method="post">  
    Name:
    <input type="text" value=<?php echo "'".$_SESSION['name']."'" ;?> id="lname1" name="lname" ></form> <button  id="btn1" onclick="myFunction1()">Edit</button><br><br>
    <form method="post">
    Email:
    <input type="text" value=<?php echo "'".$_SESSION['email']."'" ;?> id="lname2" name="lname" > </form><button id="btn2" onclick="myFunction2()">Edit</button><br><br>
    <form method="post">
    Address:
    <input type="text" value=<?php echo "'".$_SESSION['address']."'" ;?> id="lname3" name="lname" ></form> <button id="btn3" onclick="myFunction3()">Edit</button><br><br>
    <form method="post">
    Phone number:
    <input type="text" value=<?php echo "'".$_SESSION['phno']."'" ;?> id="lname4" name="lname" > </form><button  id="btn4" onclick="myFunction4()">Edit</button><br><br>
    <form method="post">
    Password:
    <input type="text" value=<?php echo "'".$_SESSION['passwd']."'" ;?> id="lname5" name="lname" ></form> <button id="btn5" onclick="myFunction5()">Edit</button><br><br>
    <form method="post">
    Aadhar:
    <input type="text"  value=<?php echo "'".$_SESSION['aadhar']."'" ;?> id="lname6" name="lname" ></form> <button id="btn6" onclick="myFunction6()">Edit</button><br><br>

    





<script>
document.getElementById("lname1").disabled = true;
document.getElementById("lname2").disabled = true;
document.getElementById("lname3").disabled = true;
document.getElementById("lname4").disabled = true;
document.getElementById("lname5").disabled = true;
document.getElementById("lname6").disabled = true;
document.getElementById("btn1").hidden = false;
document.getElementById("btn2").hidden = false;
document.getElementById("btn3").hidden = false;
document.getElementById("btn4").hidden = false;
document.getElementById("btn5").hidden = false;
document.getElementById("btn6").hidden = false;
function myFunction1() {
  document.getElementById("lname1").disabled = false;
  document.getElementById("btn1").hidden = true;
}
function myFunction2() {
  document.getElementById("lname2").disabled = false;
  document.getElementById("btn2").hidden = true;
}
function myFunction3() {
  document.getElementById("lname3").disabled = false;
  document.getElementById("btn3").hidden = true;
}
function myFunction4() {
  document.getElementById("lname4").disabled = false;
  document.getElementById("btn4").hidden = true;
}
function myFunction5() {
  document.getElementById("lname5").disabled = false;
  document.getElementById("btn5").hidden = true;
}

function myFunction6() {
  document.getElementById("lname6").disabled = false;
  document.getElementById("btn6").hidden = true;
}
</script>
</body>
</html>