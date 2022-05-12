<a href="home.php">Home</a><br>
<form method="post">
  <label for="fname">FROM :</label>
  <input type="text" id="fname" name="from" list="From">
  <datalist id="From">
  <option value="Bengaluru">Bengaluru</option>
  <option value="Chennai">Chennai</option>
</datalist><br><br>
  <label for="lname">TO :</label>
  <input type="text" id="lname" name="to" list="To">
  <datalist id="To">
  <option value="Bengaluru">Bengaluru</option>
  <option value="Chennai">Chennai</option>
</datalist><br><br>
  <label for="lname">DATE :</label>
  <input type="date" id="lname" name="date"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";
if(!isset($_SESSION['aadhar']) && !isset($_SESSION['phno'])){
  header("Location: signup.php");
}
$selected_tables = new Table_Field_Rel(
    "buses",
  
    "busid",
    "busname",
    "departure",
    "departuretime",
    "arrival",
    "arrivaltime",
    "provider",
    "seats",
    "fare"
    
  );
  
  $query = new MySQL_Query_Capsule($selected_tables);
  $selection = $query->SelectFromQuery();
  $selection = $query->Where($selection);
  $selection = $query->Setwhere($selection,"provider='KERTC'");
  if(isset($_POST['date']) && $_POST['date']!=''){
    $selection = $query->AND($selection);
    $selection = $query->Setwhere($selection,"departuretime like '".$_POST['date']."%'");
}
if(isset($_POST['from']) && isset($_POST['to']) && $_POST['from']!='' && $_POST['to']!=''){
    $selection = $query->AND($selection);
    $selection = $query->Setwhere($selection,"departure = '".$_POST['from']."'");
    $selection = $query->AND($selection);
    $selection = $query->Setwhere($selection,"arrival = '".$_POST['to']."'");
}
  $out=$dbc->selectMultiplrQuery(
    $selection
  );
  
  $o=$out[0][1];
    echo "<script>console.log(\"" . "$o" . "\");</script>";
    
  ?>

<?php if(isset($out[0][0])){ ?>
  <table>
    <tr >
      <th>Busid</th>
      <th>Bus Type</th>
      <th>Provider</th>
      <th>Daparture</th>
      <th>Departure Time</th>
      <th>Arrival</th>
      <th>Arrival Time</th>
      <th>Seats available</th>
      <th>Fare</th>
      <th>Bookings</th>
    </tr>
    <?php $total=0;
     foreach($out as $o){
         $rev=strrev($o[3]); 
         $sub=substr($rev,7);
         $rev=strrev($sub);
         $rev2=strrev($o[5]); 
         $sub=substr($rev2,7);
         $rev2=strrev($sub) ?>
    <tr>
    <td><?php echo($o[0])?></td>
      <td><?php echo($o[1])?></td>
      <td><?php echo($o[6])?></td>
      <td><?php echo($o[2])?></td>
      <td><?php echo($rev)?></td>
      <td><?php echo($o[4])?></td>
      <td><?php echo($rev2)?></td>
      <td><?php echo($o[7])?></td>
      <td>&#8377; <?php echo($o[8])?></td>
      

      <td><form method="post"><button name=<?php echo("'"."name".$o[0]."'") ?> value="add">Book</button></form></td>
    </tr>
   <?php } 
}
   ?>
  </table>

  <?php
 foreach($out as $o){

  if(isset($_POST['name'.$o[0]])){
      $_SESSION['bussesid']=$o[0];
      $_SESSION['fare']=$o[8];
      header("Location: seats.php");
  }
}

  ?>