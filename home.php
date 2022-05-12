<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";
if(!isset($_SESSION['aadhar']) && !isset($_SESSION['phno'])){
  header("Location: signup.php");
}

    echo "Welcome user";
  echo $_SESSION['name'];

?>
<a href="profile.php">Profile</a>
<a href="cart.php">Cart</a>
<a href="wallet.php">Balence</a>
<a href="ticket.php">Bookings</a>
<a href="shopping.php">Shopping</a>
<a href="logout.php">Logout</a>


