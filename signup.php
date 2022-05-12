<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";

if(isset($_SESSION['aadhar']) && isset($_SESSION['phno'])){
	header("Location: home.php");
  }

date_default_timezone_set("India");
$todayyear=date("y");
$year=(int)"20".$todayyear;
$eighteen=$year-18;

$today=date("y-m-d");
$todayM=substr($today,3);
$eighteenplus="".$eighteen."-".$todayM."";

$salt="zj@i*ksw.";
if(isset($_POST['aadhar']) && isset($_POST['name']) && isset($_POST['phno']) && isset($_POST['email']) && isset($_POST['add']) && isset($_POST['pswd1']) && isset($_POST['pswd2']) && isset($_POST['birthday']) && $_POST['pswd1']==$_POST['pswd2'] && strlen($_POST['aadhar'])==12 && strlen($_POST['phno'])==10 && $eighteenplus>=$_POST['birthday'] && strlen($_POST['pswd1'])>=8  ){
	echo "<script>console.log('ffff');</script>";
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
		"'".$_POST['birthday']."'",
		0
	);
	$insertion = $query->InsertValuesQuery(
		implode(",", $userList)
	);
	echo "<script>console.log(\"" . "$insertion" . "\");</script>";
	$dbc->PushQuery(
		$insertion
	);

	$return = $dbc->FlushStack();

	echo '<script type="text/javascript">';
echo ' alert("Registration successfull :)")';  //not showing an alert box.
echo '</script>';

}
else if(isset($_POST['aadhar']) && isset($_POST['name']) && isset($_POST['phno']) && isset($_POST['email']) && isset($_POST['add']) && isset($_POST['pswd1']) && isset($_POST['pswd2']) && isset($_POST['birthday'])){
	echo "<script>console.log('Registration failed')</script>";
	echo '<script type="text/javascript">';
echo ' alert("Registration failed - Incorrect details")';  //not showing an alert box.
echo '</script>';
	
}

if($eighteenplus<$_POST['birthday']){
	echo "<script>console.log('You are not 18+')</script>";
}
if( strlen($_POST['phno'])!=10){
	echo "<script>console.log('Invalid phno')</script>";
}

if( strlen($_POST['aadhar'])!=12){
	echo "<script>console.log('Invalid aadhar number')</script>";
}

if(strlen($_POST['pswd1'])<8 ){
	echo "<script>console.log('atleast 8 charecters')</script>";
}

if($_POST['pswd1']!=$_POST['pswd2']){
	echo "<script>console.log('password and confirm password not matching')</script>";
}
//echo "<script>console.log(\"" . "$return" . "\");</script>";
$error="";
	if(isset($_POST['uname1']) && isset($_POST['psw1'])){
		$selected_tables = new Table_Field_Rel(
			"signup",

			"aadhar",
			"name",
			"phno",
			"email",
			"address",
			"passwd",
			"DOB",
			"wallet"
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
				$_SESSION['wallet']=$out['wallet'];
				header("Location: home.php");
			}
			else{
				$error="*Incorrect phno or password";
			}
			
			echo "<script>console.log(\"" . "$o" . "\");</script>";
		}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    *,
*::before,
*::after {
	box-sizing: border-box;
}

body {
	margin: 0;
	font-family: Roboto, -apple-system, 'Helvetica Neue', 'Segoe UI', Arial, sans-serif;
	background: #3b4465;
}

.forms-section {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

.section-title {
	font-size: 32px;
	letter-spacing: 1px;
	color: #fff;
}

.forms {
	display: flex;
	align-items: flex-start;
	margin-top: 30px;
}

.form-wrapper {
	animation: hideLayer .3s ease-out forwards;
}

.form-wrapper.is-active {
	animation: showLayer .3s ease-in forwards;
}

@keyframes showLayer {
	50% {
		z-index: 1;
	}
	100% {
		z-index: 1;
	}
}

@keyframes hideLayer {
	0% {
		z-index: 1;
	}
	49.999% {
		z-index: 1;
	}
}

.switcher {
	position: relative;
	cursor: pointer;
	display: block;
	margin-right: auto;
	margin-left: auto;
	padding: 0;
	text-transform: uppercase;
	font-family: inherit;
	font-size: 16px;
	letter-spacing: .5px;
	color: #999;
	background-color: transparent;
	border: none;
	outline: none;
	transform: translateX(0);
	transition: all .3s ease-out;
}

.form-wrapper.is-active .switcher-login {
	color: #fff;
	transform: translateX(90px);
}

.form-wrapper.is-active .switcher-signup {
	color: #fff;
	transform: translateX(-90px);
}

.underline {
	position: absolute;
	bottom: -5px;
	left: 0;
	overflow: hidden;
	pointer-events: none;
	width: 100%;
	height: 2px;
}

.underline::before {
	content: '';
	position: absolute;
	top: 0;
	left: inherit;
	display: block;
	width: inherit;
	height: inherit;
	background-color: currentColor;
	transition: transform .2s ease-out;
}

.switcher-login .underline::before {
	transform: translateX(101%);
}

.switcher-signup .underline::before {
	transform: translateX(-101%);
}

.form-wrapper.is-active .underline::before {
	transform: translateX(0);
}

.form {
	overflow: hidden;
	min-width: 260px;
	margin-top: 50px;
	padding: 30px 25px;
  border-radius: 5px;
	transform-origin: top;
}

.form-login {
	animation: hideLogin .3s ease-out forwards;
}

.form-wrapper.is-active .form-login {
	animation: showLogin .3s ease-in forwards;
}

@keyframes showLogin {
	0% {
		background: #d7e7f1;
		transform: translate(40%, 10px);
	}
	50% {
		transform: translate(0, 0);
	}
	100% {
		background-color: #fff;
		transform: translate(35%, -20px);
	}
}

@keyframes hideLogin {
	0% {
		background-color: #fff;
		transform: translate(35%, -20px);
	}
	50% {
		transform: translate(0, 0);
	}
	100% {
		background: #d7e7f1;
		transform: translate(40%, 10px);
	}
}

.form-signup {
	animation: hideSignup .3s ease-out forwards;
}

.form-wrapper.is-active .form-signup {
	animation: showSignup .3s ease-in forwards;
}

@keyframes showSignup {
	0% {
		background: #d7e7f1;
		transform: translate(-40%, 10px) scaleY(.8);
	}
	50% {
		transform: translate(0, 0) scaleY(.8);
	}
	100% {
		background-color: #fff;
		transform: translate(-35%, -20px) scaleY(1);
	}
}

@keyframes hideSignup {
	0% {
		background-color: #fff;
		transform: translate(-35%, -20px) scaleY(1);
	}
	50% {
		transform: translate(0, 0) scaleY(.8);
	}
	100% {
		background: #d7e7f1;
		transform: translate(-40%, 10px) scaleY(.8);
	}
}

.form fieldset {
	position: relative;
	opacity: 0;
	margin: 0;
	padding: 0;
	border: 0;
	transition: all .3s ease-out;
}

.form-login fieldset {
	transform: translateX(-50%);
}

.form-signup fieldset {
	transform: translateX(50%);
}

.form-wrapper.is-active fieldset {
	opacity: 1;
	transform: translateX(0);
	transition: opacity .4s ease-in, transform .35s ease-in;
}

.form legend {
	position: absolute;
	overflow: hidden;
	width: 1px;
	height: 1px;
	clip: rect(0 0 0 0);
}

.input-block {
	margin-bottom: 20px;
}

.input-block label {
	font-size: 14px;
  color: #a1b4b4;
}

.input-block input {
	display: block;
	width: 100%;
	margin-top: 8px;
	padding-right: 15px;
	padding-left: 15px;
	font-size: 16px;
	line-height: 40px;
	color: #3b4465;
  background: #eef9fe;
  border: 1px solid #cddbef;
  border-radius: 2px;
}

.form [type='submit'] {
	opacity: 0;
	display: block;
	min-width: 120px;
	margin: 30px auto 10px;
	font-size: 18px;
	line-height: 40px;
	border-radius: 25px;
	border: none;
	transition: all .3s ease-out;
}

.form-wrapper.is-active .form [type='submit'] {
	opacity: 1;
	transform: translateX(0);
	transition: all .4s ease-in;
}

.btn-login {
	color: #fbfdff;
	background: #a7e245;
	transform: translateX(-30%);
}

.btn-signup {
	color: #a7e245;
	background: #fbfdff;
	box-shadow: inset 0 0 0 2px #a7e245;
	transform: translateX(30%);
}

  </style>
</head>
<body>
  <section class="forms-section">
    <h1 class="section-title">AM-PAY</h1>
    <div class="forms">
      <div class="form-wrapper is-active">
        <button type="button" class="switcher switcher-login">
          Login
          <span class="underline"></span>
        </button>
        <form class="form form-login" method="post">
          <fieldset>
            <legend>Please, enter your email and password for login.</legend>
            <div class="input-block">
			<p style="color:red"><?php echo($error) ?></p>
              <label for="login-email">Phone Number</label>
              <input  type="number" name="uname1" required>
            </div>
		
            <div class="input-block">
              <label for="login-password">Password</label>
              <input id="login-password" type="password" name="psw1" required>
            </div>
          </fieldset>
          <button type="submit" class="btn-login">Login</button>
        </form>
      </div>
      <div class="form-wrapper" >
        <button type="button" class="switcher switcher-signup">
          Sign Up
          <span class="underline"></span>
        </button>
        <form class="form form-signup" method="post" >
          <fieldset>
            <legend>Please, enter your email, password and password confirmation for sign up.</legend>
            <div class="input-block">
              <label for="Username">Name</label>
              <input id="Username" type="text" name="name" required>
            </div>
            <div class="input-block">
              <label for="PhoneNumber">Phone Number</label>
              <input id="PhoneNumber" type="number" name="phno" required>
            </div>
            <div class="input-block">
              <label for="Address">Address</label>
              <input id="Address" type="text" name="add" required>
            </div>
            <div class="input-block">
              <label for="Aadhar">Aadhar Number</label>
              <input id="Aadhar" type="number" name="aadhar" required>
            </div>
            <div class="input-block">
              <label for="login-email">Email</label>
              <input  type="email" name="email" required>
            </div>
            <div class="input-block">
              <label for="DOB">Date.Of.Birth</label>
			  <p style="font-size:12px;color:red"> are you 18+ ?</p>
              <input id="DOB" max="<?php echo("20".$today) ?>" type="date"  name="birthday" required>
            </div>
            
            <div class="input-block">
				
              <label for="signup-password">Password</label>
			  <p style="font-size:12px;color:red"> Must contain atleast 8 charecters </p>
              <input id="signup-password" type="password"  name="pswd1" required>
            </div>
            <div class="input-block">
              <label for="signup-password-confirm">Confirm password</label>
              <input id="signup-password-confirm" type="password"  name="pswd2" required>
            </div>
          </fieldset>
          <button type="submit" class="btn-signup">Continue</button>
        </form>
      </div>
    </div>
  </section>

  <script>
    const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

  </script>
</body>
</html>