<a href="Home.php">Home</a>
<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";

if(!isset($_SESSION['aadhar']) && !isset($_SESSION['phno'])){
  header("Location: signup.php");
}

$selected_tables = new Table_Field_Rel(
    "userbankname",
  
    "BIC",
    "bankName",
    "bankLogo",
    "AccountID",
    "Name",
    "cvv",
    "Expiry",
    "balance"
  );
  
  
    $query = new MySQL_Query_Capsule($selected_tables);
  
    $userList=array(
        
        "'".$_SESSION['aadhar']."'",
      
    );
    
    $selection = $query->SelectFromQuery();
    $selection = $query->Where($selection);
    $selection = $query->Setwhere($selection,"aadhar=$userList[0]");
  
    $out2=$dbc->selectQuery(
        $selection
    );




$selected_tables = new Table_Field_Rel(
    "passengers",
    
    "busid",
    "Name",
    "Phno",
    "age",
    "Seatno"
    
  );
  
  $query = new MySQL_Query_Capsule($selected_tables);
  $selection = $query->SelectFromQuery();
  $selection = $query->Where($selection);
  $selection = $query->Setwhere($selection,"busid='".$_SESSION['bussesid']."'");
  $out4=$dbc->selectMultiplrQuery(
    $selection
  );
$arr=array();
  foreach($out4 as $o){ 
    array_push($arr,$o[4]);
  }
?>

<form method="post">
<table>
<tr>
<td><span>  </span></td>
<td>A</td>
<td>B</td>
<td><span>  </span></td>
<td>C</td>
<td>D</td>
</tr>

<tr>
<td>1</td>
<td><input type="checkbox" id="1" name="A1" value="A1" <?php if(in_array("A1",$arr)){ echo("disabled"); } ?> ></td>
<td><input type="checkbox" id="2" name="B1" value="B1"  <?php if(in_array("B1",$arr)){ echo("disabled"); } ?>  ></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C1" value="C1"  <?php if(in_array("C1",$arr)){ echo("disabled"); } ?> ></td>
<td><input type="checkbox" id="4" name="D1" value="D1"  <?php if(in_array("D1",$arr)){ echo("disabled"); } ?> ></td>
<tr>

<tr>
<td>2</td>
<td><input type="checkbox" id="1" name="A2" value="A2"  <?php if(in_array("A2",$arr)){ echo("disabled"); } ?> ></td>
<td><input type="checkbox" id="2" name="B2" value="B2"  <?php if(in_array("B2",$arr)){ echo("disabled"); } ?> "></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C2" value="C2"  <?php if(in_array("C2",$arr)){ echo("disabled"); } ?> ></td>
<td><input type="checkbox" id="4" name="D2" value="D2"  <?php if(in_array("D2",$arr)){ echo("disabled"); } ?> ></td>
<tr>

<tr>
<td>3</td>
<td><input type="checkbox" id="1" name="A3" value="A3" <?php if(in_array("A3",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B3" value="B3" <?php if(in_array("B3",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C3" value="C3" <?php if(in_array("C3",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D3" value="D3" <?php if(in_array("D3",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>4</td>
<td><input type="checkbox" id="1" name="A4" value="A4" <?php if(in_array("A4",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B4" value="B4" <?php if(in_array("B4",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C4" value="C4" <?php if(in_array("C4",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D4" value="D4" <?php if(in_array("D4",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>5</td>
<td><input type="checkbox" id="1" name="A5" value="A5" <?php if(in_array("A5",$arr)){ echo("disabled"); } ?> ></td>
<td><input type="checkbox" id="2" name="B5" value="B5" <?php if(in_array("B5",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C5" value="C5" <?php if(in_array("C5",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D5" value="D5" <?php if(in_array("D5",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>6</td>
<td><input type="checkbox" id="1" name="A6" value="A6" <?php if(in_array("A6",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B6" value="B6" <?php if(in_array("B6",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C6" value="C6" <?php if(in_array("C6",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D6" value="D6" <?php if(in_array("D6",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>7</td>
<td><input type="checkbox" id="1" name="A7" value="A7" <?php if(in_array("A7",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B7" value="B7" <?php if(in_array("B7",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C7" value="C7" <?php if(in_array("C7",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D7" value="D7" <?php if(in_array("D7",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>8</td>
<td><input type="checkbox" id="1" name="A8" value="A8" <?php if(in_array("A8",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B8" value="B8" <?php if(in_array("B8",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C8" value="C8" <?php if(in_array("C8",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D8" value="D8" <?php if(in_array("D8",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>9</td>
<td><input type="checkbox" id="1" name="A9" value="A9" <?php if(in_array("A9",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B9" value="B9" <?php if(in_array("B9",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C9" value="C9" <?php if(in_array("C9",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D9" value="D9" <?php if(in_array("D9",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>10</td>
<td><input type="checkbox" id="1" name="A10" value="A10" <?php if(in_array("A10",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B10" value="B10" <?php if(in_array("B10",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C10" value="C10" <?php if(in_array("C10",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D10" value="D10" <?php if(in_array("D10",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>11</td>
<td><input type="checkbox" id="1" name="A11" value="A11" <?php if(in_array("A11",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B11" value="B11" <?php if(in_array("B11",$arr)){ echo("disabled"); } ?>></td>
<td><span>  </span></td>
<td><input type="checkbox" id="3" name="C11" value="C11" <?php if(in_array("C11",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D11" value="D11" <?php if(in_array("D11",$arr)){ echo("disabled"); } ?>></td>
<tr>

<tr>
<td>12</td>
<td><input type="checkbox" id="1" name="A12" value="A12" <?php if(in_array("A12",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="2" name="B12" value="B12" <?php if(in_array("B12",$arr)){ echo("disabled"); } ?>></td>
<td><span> </span></td>
<td><input type="checkbox" id="3" name="C12" value="C12" <?php if(in_array("C12",$arr)){ echo("disabled"); } ?>></td>
<td><input type="checkbox" id="4" name="D12" value="D12" <?php if(in_array("D12",$arr)){ echo("disabled"); } ?>></td>
<tr>



</table>
<input type="submit" name="select" value="select" >
</form>

<?php

if(isset($_POST['select'])){
    $c=0;
$a=array();
echo("Seat No. ");
for($i='A';$i<='D';$i++){
    for($j=1;$j<=12;$j++){
        if($_POST[$i."".$j]==$i."".$j){
            array_push($a,$_POST[$i."".$j]);
        echo($_POST[$i."".$j]);
        echo(",");
       $c++;
        }
        
    }

}
$_SESSION['seats']=$a;
?>
<br>
<?php
$total=$c*$_SESSION['fare'];
$_SESSION['total']=$total;
$_SESSION['count']=$c;
echo("Total Fare : ");
echo($_SESSION['total']);
}
?>

<?php
if(isset($_POST['select'])){
  
    ?>
<form method="post">
    <?php
          foreach($_SESSION['seats'] as $a1){
          
    ?>
<label for="lname">Name :</label>
<input type="text" id="lname" name=<?php echo("Name".$a1) ?> ><br><br>
<label for="fname">Phno :</label>
  <input type="number" id="lname" name=<?php echo("Phno".$a1) ?> ><br><br>
  <label for="fname">Age :</label>
  <input type="date" id="lname" name=<?php echo("Date".$a1) ?> ><br><br> 

  
  <?php
          }
          
         
  ?>
    CVV:  <input type="number" name="cvv2" max=999 min=100>
            Expiry:  <input type="month" name="exp2"><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
    }
    
    if(isset($_POST['submit']) && isset($_POST['cvv2']) && isset($_POST['exp2'])){
    
  foreach($_SESSION['seats'] as $a1 ){

    $selected_tables = new Table_Field_Rel(
        "passengers",
    
        "busid",
        "Name",
        "Phno",
        "age",
        "Seatno"
    );
    
  
        $query = new MySQL_Query_Capsule($selected_tables);
        
        $userList=array(
            "'".$_SESSION['bussesid']."'",
            "'".$_POST['Name'.$a1]."'",
            "'".$_POST['Phno'.$a1]."'",
            "'".$_POST['Date'.$a1]."'",
            "'".$a1."'"
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

  $selected_tables = new Table_Field_Rel(
    "userbank",

    "BIC",
    "AccountID"
   
);
$a="balance";
$query = new MySQL_Query_Capsule($selected_tables);
$userList=$out2['balance']-$_SESSION['total'];

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

$selected_tables = new Table_Field_Rel(
    "buses",

    "busid",
    "busname"
   
);
$a="seats";
$query = new MySQL_Query_Capsule($selected_tables);
$userList= $_SESSION['available']-$_SESSION['count'];

$updation = $query->UpdateQuery(
$userList,
$a
);
$updation = $query->Where($updation);
$updation = $query->Setwhere($updation,"busid='".$_SESSION['bussesid']."'");
echo "<script>console.log(\"" . "$updation" . "\");</script>";
$dbc->PushQuery(
    $updation
);

$return = $dbc->FlushStack();
header("Location: home.php");
}

?>

