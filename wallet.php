<?php
session_start();
require_once "connection_to_db.php";
require_once "relay.php";
require_once "query.php";
if(!isset($_SESSION['aadhar']) && !isset($_SESSION['phno'])){
  header("Location: login_e-wallet.php");
}
$selected_tables = new Table_Field_Rel(
    "banks",
  
    "BIC",
    "bankName",
    "bankLogo"
  );
  
  $query = new MySQL_Query_Capsule($selected_tables);
$selection = $query->SelectFromQuery();

$out=$dbc->selectMultiplrQuery(
  $selection
);

$o=$out[0][1];
  echo "<script>console.log(\"" . "$o" . "\");</script>";
   
//--------------------------------------------------------------------------------------------------------------------------------
  if(isset($_POST['bank']) && isset($_POST['accid']) && isset($_POST['accholder']) && isset($_POST['cvv']) && isset($_POST['exp'])) {
    $selected_tables = new Table_Field_Rel(
        "userbank",
    
        "BIC",
        "AccountID",
        "Name",
        "cvv",
        "Expiry",
        "balance",
        "aadhar"
        
    );
    
    
        $query = new MySQL_Query_Capsule($selected_tables);
      
        $userList=array(
            "'".$_POST['bank']."'",
            "'".$_POST['accid']."'",
            "'".$_POST['accholder']."'",
            "'".$_POST['cvv']."'",
            "'".$_POST['exp']."-01'",
            100000,
            "'".$_SESSION['aadhar']."'"
            
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

        if(isset($_POST['remove2'])){
            $selected_tables = new Table_Field_Rel(
                "userbank",
                "BIC",
                "AccountID"
              
              );
              $query = new MySQL_Query_Capsule($selected_tables);
              $userList=array(
                  "'".$_SESSION['aadhar']."'"
                
              
              );
              $deletion = $query->DeleteQuery(
                implode(",", $userList)
              );
              $deletion = $query->Where($deletion);
                      $deletion = $query->Setwhere($deletion,"aadhar=$userList[0]");
                   
              echo "<script>console.log(\"" . "$deletion" . "\");</script>";
              $dbc->PushQuery(
                $deletion
              );
            
              $return = $dbc->FlushStack();
              header("Location: wallet.php");
        }

        $selected_tables = new Table_Field_Rel(
			"signup",

			"wallet"
		);


			$query = new MySQL_Query_Capsule($selected_tables);
	
			$userList=array(
				
				"'".$_SESSION['aadhar']."'",
				
			);
			
			$selection = $query->SelectFromQuery();
			$selection = $query->Where($selection);
			$selection = $query->Setwhere($selection,"aadhar=$userList[0]");
	
			$out3=$dbc->selectQuery(
				$selection
			);
            $wallet=$out3['wallet'];
            echo "<script>console.log(\"" . "$wallet" . "\");</script>";
  ?>
<h1>Balence</h1>
<a href="home.php">Home</a>
<p>Wallet Balence: rs <?php echo($wallet) ?> </p>
<?php if(!isset($out2)){ ?>
<form method="post"><button name="addbank">+ ADD Bank</button></form>
<?php if(isset($_POST['addbank'])){ ?>
<form method="post" >
Bank: <input type="text" name="bank" list="cityname">
  <datalist id="cityname">
  <?php foreach($out as $o){ 
    $id=$o[0]?>
    <option value=<?php echo("'".$o[0]."'") ?>><?php echo($o[1]) ?></option>
    
    <?php } 

?>
  </datalist>
  <br>
Account Id:<input type="number" name="accid" max=9999999999999999 min=1000000000000000><br>
Account Holder: <input type="text" name="accholder" ><br>
CVV: <input type="number" name="cvv" max=999 min=100><br>
Expiry: <input type="month" name="exp" >
<input type="submit" value="Submit">
</form>
<?php } 

?>
<?php } else{ ?>
<img src=<?php echo("'".$out2['bankLogo']."'") ?> style="height:50px;width:50px"> <p><?php echo($out2['bankName']) ?></P>
<p>Name: <?php echo($out2['Name']) ?></P>
<p>AccountID: <?php echo($out2['AccountID']) ?></P>
<p>Balance: <?php echo($out2['balance']) ?></P>
<form method="post">
<button name="remove2">Remove Account</button>
</form>
<?php }  ?>