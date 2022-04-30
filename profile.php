<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";

if(!isset($_SESSION['aadhar']) && !isset($_SESSION['phno'])){
  header("Location: login_e-wallet.php");
}
$selected_tables = new Table_Field_Rel(
	"signup",

	"aadhar",
	"name",
	"phno",
	"email",
	"address",
	"passwd"
);

$query = new MySQL_Query_Capsule($selected_tables);
if(isset($_POST['save1']) && isset($_POST['name'])){
    $a="name";
}
else if(isset($_POST['save2']) && isset($_POST['email'])){
    $a="email";
}
else if(isset($_POST['save3'])&& isset($_POST['address'])){
    $a="address";
}
else if(isset($_POST['save4']) && isset($_POST['phno'])){
    $a="phno";
}
else if(isset($_POST['save5']) && isset($_POST['DOB'])){
    $a="DOB";
}
else if(isset($_POST['save6']) && isset($_POST['aadhar'])) {
    $a="aadhar";
}
else if(isset($_POST['save7']) && isset($_POST['passwd']) && isset($_POST['psw2']) && $_POST['passwd']==$_POST['psw2']) {
  $a="passwd";
}
else if(isset($_POST['save1']) || isset($_POST['save2']) || isset($_POST['save3']) || isset($_POST['save4']) || isset($_POST['save5']) || isset($_POST['save6']) || isset($_POST['save7'])){
   header("Location: home.php");
}
if(isset($_POST['save1']) || isset($_POST['save2']) || isset($_POST['save3']) || isset($_POST['save4']) || isset($_POST['save5']) || isset($_POST['save6']) || isset($_POST['save7'])){
    echo "<script>console.log(\"" . "$a" . "\");</script>";
        $userList="'".$_POST[$a]."'";
        if(isset($_POST['save7'])){
          $salt="zj@i*ksw.";
          $stored=hash('md5',$salt.$_POST['passwd']);
          $userList="'".$stored."'";
        }
        $updation = $query->UpdateQuery(
        $userList,
        $a
        );
        $updation = $query->Where($updation);
        $updation = $query->Setwhere($updation,"aadhar='".$_SESSION['aadhar']."'");
        echo "<script>console.log(\"" . "$updation" . "\");</script>";
        $dbc->PushQuery(
            $updation
        );

        $return = $dbc->FlushStack();
        $_SESSION[$a]=$_POST[$a];
        echo "<script>console.log(\"" . "$a" . "\");</script>";
        header("Location: home.php");
    }
     
    ?>
<html>
    <head>
   
</head>
    <body>
    <a href="home.php">Home</a>
     <form method="post">  
    Name:
    <input type="text" value=<?php echo "'".$_SESSION['name']."'" ;?> id="lname1" name="name" ><button name="save1">Save</button></form> <button  id="btn1" onclick="myFunction1()">Edit</button><br><br>
    <form method="post">
    Email:
    <input type="text" value=<?php echo "'".$_SESSION['email']."'" ;?> id="lname2" name="email" ><button name="save2">Save</button> </form><button id="btn2" onclick="myFunction2()">Edit</button><br><br>
    <form method="post">
    Address:
    <input type="text" value=<?php echo "'".$_SESSION['address']."'" ;?> id="lname3" name="address" ><button name="save3">Save</button></form> <button id="btn3" onclick="myFunction3()">Edit</button><br><br>
    <form method="post">
    Phone number:
    <input type="text" value=<?php echo "'".$_SESSION['phno']."'" ;?> id="lname4" name="phno" > <button name="save4">Save</button></form><button  id="btn4" onclick="myFunction4()">Edit</button><br><br>
    <form method="post">
    DOB:
    <input type="date" value=<?php echo "'".$_SESSION['DOB']."'" ;?> id="lname5" name="DOB" ><button name="save5">Save</button></form> <button id="btn5" onclick="myFunction5()">Edit</button><br><br>
    <form method="post">
    Aadhar:
    <input type="text"  value=<?php echo "'".$_SESSION['aadhar']."'" ;?> id="lname6" name="aadhar" ><button name="save6">Save</button></form> <button id="btn6" onclick="myFunction6()">Edit</button><br><br>

    <form method="post">
    Password:
    <input type="password"  id="lname7" name="passwd" ><br>
    Confirm password:
    <input type="password"  id="lname8" name="psw2" >
    <button name="save7">Save</button></form> <br><br>

    <form action="upload.php"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>



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