<?php
session_start();
    echo "Welcome user";
  echo $_SESSION['name'];
?>
<a href="profile.php">Profile</a>