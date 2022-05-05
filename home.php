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
<a href="logout.php">Logout</a>


<?php


$selected_tables = new Table_Field_Rel(
  "items",

  "itemid",
  "itemname",
  "category",
  "description",
  "price",
  "DOD",
  "image"
);

$query = new MySQL_Query_Capsule($selected_tables);
$selection = $query->SelectFromQuery();

$out=$dbc->selectMultiplrQuery(
  $selection
);

$o=$out[0][1];
  echo "<script>console.log(\"" . "$o" . "\");</script>";
 
?>
<br>
<table>
  <tr >
    <th>Image</th>
    <th>Name</th>
    <th>Categoty</th>
    <th>Description</th>
    <th>Price</th>
    <th>Expected On</th>
    <th>Add</th>
  </tr>
  <?php foreach($out as $o){ 
    $id=$o[0]?>
  <tr>
    <td><img src=<?php echo("'".$o[6]."'")?> style="height:100px; width: 100px;"></td>
    <td><?php echo($o[1])?></td>
    <td><?php echo($o[2])?></td>
    <td><?php echo($o[3])?></td>
    <td>&#8377; <?php echo($o[4])?></td>
    <td><?php echo($o[5])?></td>
    <td><form method="post"><button name=<?php echo("'"."name".$id."'") ?> value="add">Add</button></form></td>
  </tr>
 <?php } 

 ?>
</table>
<?php
$i="0";
foreach($out as $o){

  if(isset($_POST['name'.$o[0]])){
    $i=$o[0];
    echo "<script>console.log(\"" . "$i" . "\");</script>";
    $selected_tables = new Table_Field_Rel(
      "cart",
    
      "aadhar",
      "itemid"
    );
    $query = new MySQL_Query_Capsule($selected_tables);
    $userList=array(
        "'".$_SESSION['aadhar']."'",
        "'".$i."'",
        1
    
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

}
?>