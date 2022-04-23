<?php
session_start();
if($_SESSION['name']){
    echo "Welcome user";
  echo $_SESSION['name'];

?>
<a href="profile.php">Profile</a>
<a href="logout.php">Logout</a>
<?php }
else{
    ?>
<a href="login_e-wallet.php">Login</a>
<?php
}
?>