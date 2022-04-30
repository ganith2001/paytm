<h1>Shopping Cart</h1>
<a href="home.php">Home</a>
<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";
if(!isset($_SESSION['aadhar']) && !isset($_SESSION['phno'])){
  header("Location: login_e-wallet.php");
}
$selected_tables = new Table_Field_Rel(
    "cartitems",
  
    "itemid",
    "itemname",
    "category",
    "description",
    "price",
    "DOD",
    "image",
    "aadhar",
    "quantity"
  );
  
  $query = new MySQL_Query_Capsule($selected_tables);
  $selection = $query->SelectFromQuery();
  $selection = $query->Where($selection);
  $selection = $query->Setwhere($selection,"aadhar='".$_SESSION['aadhar']."'");
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
      <th>Quantity</th>
      <th>Remove</th>
    </tr>
    <?php foreach($out as $o){ 
      $id=$o[0]?>
    <tr>
      <td><img src=<?php echo("'".$o[6]."'")?> style="height:100px; width: 100px;"></td>
      <td><?php echo($o[1])?></td>
      <td><?php echo($o[2])?></td>
      <td><?php echo($o[3])?></td>
      <td><?php echo("rs ".$o[4])?></td>
      <td><?php echo($o[5])?></td>
      <td><form method="post"><button name=<?php echo("'"."inc".$id."'") ?> style="width:20px">+</button><input value=<?php echo($o[8])?> style="width:20px" disabled></input><button  name=<?php echo("'"."dec".$id."'") ?> style="width:20px">-</button></form></td>
      <td><form method="post"><button name=<?php echo("'"."name".$id."'") ?> value="add">Remove</button></form></td>
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
        "'".$i."'"
    
    );
    $deletion = $query->DeleteQuery(
      implode(",", $userList)
    );
    $deletion = $query->Where($deletion);
			$deletion = $query->Setwhere($deletion,"aadhar=$userList[0]");
			$deletion = $query->AND($deletion);
			$deletion = $query->Setwhere($deletion,"itemid=$userList[1]");
    echo "<script>console.log(\"" . "$deletion" . "\");</script>";
    $dbc->PushQuery(
      $deletion
    );
  
    $return = $dbc->FlushStack();
    header("Location: cart.php");
  }

  if(isset($_POST['inc'.$o[0]]) || isset($_POST['dec'.$o[0]])){
    $i=$o[0];
    $s=$o[8];
    if(isset($_POST['inc'.$o[0]]) && $s<10){
    $s=$o[8]+1;
    }
    else if(isset($_POST['dec'.$o[0]]) && $s>1 ){
      $s=$o[8]-1;
      }
    echo "<script>console.log(\"" . "$i" . "\");</script>";
    $selected_tables = new Table_Field_Rel(
      "cart",
    
      "aadhar",
      "itemid",
      "quantity"
    );
    $query = new MySQL_Query_Capsule($selected_tables);
    $updation = $query->UpdateQuery(
      $s,
      'quantity'
      );
      $updation = $query->Where($updation);
      $updation = $query->Setwhere($updation,"aadhar='".$_SESSION['aadhar']."'");
      $updation = $query->AND($updation);
			$updation = $query->Setwhere($updation,"itemid=$i");
      echo "<script>console.log(\"" . "$updation" . "\");</script>";
      $dbc->PushQuery(
          $updation
      );

      $return = $dbc->FlushStack();
    
     header("Location: cart.php");

}
  
}
?>