<?php session_start();  ?>

<?php if($_SESSION['username'] && $_SESSION['name']  && $_SESSION['id'] && $_SESSION['account'] ){
	$sessionUserName=$_SESSION['username'];
  $sessionName=$_SESSION['name'];
	$sessionId = $_SESSION['id'];
	$sessionAcc = $_SESSION['account'];
}    ?>


<?php include('dbcon.php'); 



$balance = 0.00;
$depoUser = "select * from `".$sessionUserName."` where accno = '$sessionAcc'";

$query = mysqli_query($con,$depoUser);

while($row=mysqli_fetch_array($query)){

    $balance = $balance + $row['amount'];

}



mysqli_autocommit($con,FALSE);

$upsquery = mysqli_query($con, "select * from users");
while ($rowss = mysqli_fetch_assoc($upsquery)) {
    $accountsnum[] = $rowss;
    //  $touser = $accountsnum['user'] ;
    //  $userid = $accountsnum['user_id'] ;


}




if (isset($_POST['submit'] )) {

$amount = mysqli_real_escape_string($con, $_POST['amt']);
$from = mysqli_real_escape_string($con, $_POST['from']);
$to = mysqli_real_escape_string($con, $_POST['to']);
$detail = mysqli_real_escape_string($con,$_POST['details']);
$date = mysqli_real_escape_string($con,date("Y/m/d"));
// $touser = mysqli_real_escape_string($con,$accountsnum['user']);
// $toid =  mysqli_real_escape_string($con,$accountsnum['user_id']);

$toacc_search = "select * from users where accno = $to";
$query = mysqli_query($con,$toacc_search );
$acc_count = mysqli_num_rows($query);

if($acc_count ){
  $acc_pass = mysqli_fetch_assoc($query);
  $to_user = $acc_pass['name'];
  $to_acctable = $acc_pass['username'];
  $to_id = $acc_pass['id'];

}

$_SESSION['amt'] = $amount;
$_SESSION['det'] = $detail;
$_SESSION['transfer'] = $to;

 


if(empty($amount)){
	$amt_err = "**please enter your amount**";
}else if($amount > $balance){
  ?>
  
  <script>
  alert("insufficient balance");

  location.href="balance.php";

</script>
  <?php
 
  exit("insufficient fund");
}
else if($from!==$sessionAcc ){
  $acn_err = '**wrong account number **';

}else if($to === $sessionAcc ){
  $acn_err = '**Invalid transfer, cannot transfer money to your own account**';
}
else if(empty($detail)){
  $det_err = '**Please enter some detail eg(Ime transfer) **';
  
}else{

  $amount=(-$amount);


$updatesub = "insert into `".$sessionUserName."` (accno,amount,transdate,detail,user,user_id) values ('$from','$amount','$date','$detail','$sessionName','$sessionId')";
$uquerysub = mysqli_query($con , $updatesub);

// sub query
// $updatesub = "update bank  set amount = amount  " . ( - $amount) ." where accno = " . $from  ;

$newamt = abs($amount);
//add query 

$updateadd = "insert into `".$to_acctable."` (accno,amount,transdate,detail,user,user_id) values ('$to','$newamt','$date','$detail','$to_user','$to_id')";
$uqueryadd = mysqli_query($con , $updateadd);

if($uqueryadd!== TRUE && $uquerysub!== TRUE){
  mysqli_rollback($con); 
}

mysqli_commit($con);



if($uqueryadd && $uquerysub ){
  ?>
  <script>
  
  alert('Transferred successfull');
    location.href="TransactionSuccess.php";
</script>
	<?php 
 
  
	}else{
		?>
		<script>alert('cannot transfer money');</script>
		<?php
	}




}

// header("loaction:TransactionSuccess.php");

}


mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <?php include('../links/link.php')   ?> 
    <title>fund transfer</title>

    <style>
      .container{
        background:white;
      }
      body{
      	background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6)),url('../image/bank.jpg');
			background-size:100% 100% ;
		}
    .wrap{
			text-align:center;
		}
		.w-btn{
			position: absolute;
		}
    </style>

</head>
<body>
  
<?php   include('../banknav/banknavft.php');   ?>

    



<div class="conatiner"><h3 class="text-center my-5">Fund Transfer</h3></div>
<div class="container py-4 my-5 shadow login-container">

<h3> Welcome to Banking <?php echo $sessionName ?></h3>

    <form  name="myform" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>">

      
		<div class="mb-3">
              <label for="Account num" class="form-label">Enter the amount</label>
			        <input type="number" class="form-control"  name="amt" size="5"><br>
            <p style="color:red;"> <?php if(isset($amt_err)){
              echo $amt_err;}?></p>
			  </div>


        <div class="mb-3">
              <label for="" class="form-label">Sender Account Num</label>
              <select name="from">
              <?php
              
                echo "<option value=" . 	$sessionAcc . ">"   . $sessionAcc   . "</option>";  
              
              ?>
              </select>
            <p style="color:red;"> <?php if(isset($acn_err)){
              echo $acn_err;}?></p>
			  </div>


        <div class="mb-3">
              <label for="" class="form-label">Reciever Account Num</label>
              
              <input type="number" class="form-control"  name="to" size="5"><br>
            <p style="color:red;"> <?php if(isset($acn_err)){
              echo $acn_err;}?></p>
			  </div>

        <div class="mb-3">
              <label for="detail" class="form-label">Add some Detail:</label>	
            
            <input type="text" name="details" class="form-control"><br>
            <p style="color:red;"> <?php if(isset($det_err)){
                    echo $det_err;}     ?></p>

      <div class="wrap">
        <input type="submit" name="submit" class="btn btn-success w-btn" value="Transfer"> <br>
        </div>


        <div class="p-3 mb-2 div-1 text-white my-3 py-5"><button class="btn btn-success" style="text-align:left;"><a href="balance.php" class="text-white">Check balance</a></button> <span style="float:right;">	<button class="btn btn-primary"><a href = "index.php" class="text-white">Go Back</a></button></span></div></a></button>


        <!-- <h3 class="text-center font-weight-bold my-3">In order to transfer money reciver account must have atleast some money ! </h3> -->

        </form>


        



    
   
</body>
</html>







