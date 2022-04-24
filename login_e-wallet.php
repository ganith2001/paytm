<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";
$salt="zj@i*ksw.";
if(isset($_POST['aadhar']) && isset($_POST['name']) && isset($_POST['phno']) && isset($_POST['email']) && isset($_POST['add']) && isset($_POST['pswd1']) && isset($_POST['pswd2']) && $_POST['pswd1']==$_POST['pswd2']){
$selected_tables = new Table_Field_Rel(
	"signup",

	"aadhar",
	"name",
	"phno",
	"email",
	"address",
	"passwd",
	"DOB"
);


	$query = new MySQL_Query_Capsule($selected_tables);
	$stored=hash('md5',$salt.$_POST['pswd1']);
	$userList=array(
		"'".$_POST['aadhar']."'",
		"'".$_POST['name']."'",
		"'".$_POST['phno']."'",
		"'".$_POST['email']."'",
		"'".$_POST['add']."'",
		"'".$stored."'",
		"'".$_POST['birthday']."'"
	);
	$insertion = $query->InsertValuesQuery(
		implode(",", $userList)
	);
	echo "<script>console.log(\"" . "$insertion" . "\");</script>";
	$dbc->PushQuery(
		$insertion
	);

	$return = $dbc->FlushStack();

}
else{
	echo "<script>console.log('All fields are important')</script>";
}
//echo "<script>console.log(\"" . "$return" . "\");</script>";
	if(isset($_POST['uname1']) && isset($_POST['psw1'])){
		$selected_tables = new Table_Field_Rel(
			"signup",

			"aadhar",
			"name",
			"phno",
			"email",
			"address",
			"passwd",
			"DOB"
		);


			$query = new MySQL_Query_Capsule($selected_tables);
			$stored=hash('md5',$salt.$_POST['psw1']);
			$userList=array(
				
				"'".$_POST['uname1']."'",
				"'".$stored."'"
			);
			
			$selection = $query->SelectFromQuery();
			$selection = $query->Where($selection);
			$selection = $query->Setwhere($selection,"phno=$userList[0]");
			$selection = $query->AND($selection);
			$selection = $query->Setwhere($selection,"passwd=$userList[1]");
			$out=$dbc->selectQuery(
				$selection
			);
			$name=$out['phno'];
			$pwd=$out['passwd'];
			
			if($name==$_POST['uname1'] and $pwd==$stored){
				$_SESSION['name']=$out['name'];
				$_SESSION['aadhar']=$out['aadhar'];
				$_SESSION['phno']=$out['phno'];
				$_SESSION['email']=$out['email'];
				$_SESSION['address']=$out['address'];
				$_SESSION['passwd']=$out['passwd'];
				$_SESSION['DOB']=$out['DOB'];
				header("Location: home.php");
			}
			
			echo "<script>console.log(\"" . "$o" . "\");</script>";
		}
	?>
<!DOCTYPE html>
<html>
<style>
	
	/*assign full width inputs*/
	input[type=text],
	input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 20px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}
	
	/*set a style for the buttons*/
	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}
	
	/* set a hover effect for the button*/
	button:hover {
		opacity: 0.8;
	}
	
	/*set extra style for the cancel button*/
	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}
	
	/*centre the display image inside the container*/
	.imgcontainer {
		text-align: center;
		margin: 32px 0 16px 0;
		position: relative;
	}
	
	/*set image properties*/
	img.avatar {
		width: 40%;
		border-radius: 50%;
	}
	
	/*set padding to the container*/
	.container {
		align-items: center;
		position: center;
        top: 40%;
        left: 40%;
	}
	
	/*set the forgot password text*/
	span.psw {
		float: right;
		padding-top: 16px;
	}
	
	/*set the Modal background*/
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0, 0, 0);
		background-color: rgba(0, 0, 0, 0.4);
		padding-top: 60px;
	}
	
	/*style the model content box*/
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto;
		border: 1px solid #888;
		width: 80%;
	}
	
	/*style the close button*/
	.close {
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}
	
	.close:hover,
	.close:focus {
		color: red;
		cursor: pointer;
	}
	
	/* add zoom animation*/
	.animate {
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}
	
	@-webkit-keyframes animatezoom {
		from {
			-webkit-transform: scale(0)
		}
		to {
			-webkit-transform: scale(1)
		}
	}
	
	@keyframes animatezoom {
		from {
			transform: scale(0)
		}
		to {
			transform: scale(1)
		}
	}
	
	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 100%;
		}
	}

</style>

<body background="https://eudatasharing.eu/sites/default/files/styles/sidebar_image_scale_to_368px_width_/public/2021-06/EU%20Digital%20Wallet.png?itok=I4eh6xn5">
<style>
body{
  background-image: url('https://eudatasharing.eu/sites/default/files/styles/sidebar_image_scale_to_368px_width_/public/2021-06/EU%20Digital%20Wallet.png?itok=I4eh6xn5');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

	<h2 style="color:#FFFFF0";><center>E-Wallet </center></h2>
	<!--Step 1 : Adding HTML-->
	<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
      <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button></center>

	<div id="id01" class="modal">

		<form class="modal-content animate"  method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
				<img src="https://truust.io/wp-content/uploads/sites/18/2019/11/Mobile-Wallets-vs-Payment-Banks-Whats-the-Difference.jpg" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label><b>Phone Number</b></label>
				<input type="text" placeholder="Enter phone number" name="uname1" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw1" required>

				<button type="submit">Login</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>
			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>
   <div id="id02" class="modal">

		<form class="modal-content animate"  method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
				<img src="https://truust.io/wp-content/uploads/sites/18/2019/11/Mobile-Wallets-vs-Payment-Banks-Whats-the-Difference.jpg" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label><b>Name</b></label>
				<input type="text" placeholder="enter name" name="name" required>
                        <label><b>Phone number</b></label>
				<input type="text" placeholder="enter phone number" name="phno" required>
				<br>
 				<label><b>Address</b></label>
				<input type="text" placeholder="enter address" name="add" required>
				</br>
                        <label><b>Aadhar Number</b></label>
				<input type="text" placeholder="enter aadhar number" name="aadhar" required>
                        
                        <label><b>Email</b></label>
				<input type="text" placeholder="Enter Username" name="email" required>
                        </br>
				<label><b>DOB</b></label>
				<input type="date" id="birthday" name="birthday"><br>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="pswd1" required>
				<label><b>Re-enter Password</b></label>
				<input type="password" placeholder="Re-enter Password" name="pswd2" required>
				<button type="submit">Sign Up</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>


	<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
           var modal = document.getElementById('id02');
	     window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</body>

</html>
 