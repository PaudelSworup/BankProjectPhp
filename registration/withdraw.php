<?php  session_start(); ?>

<?php 
if($_SESSION['username'] && $_SESSION['name'] && $_SESSION['id'] && $_SESSION['account'] ){
	$sessionUserName=$_SESSION['username'];
	$sessionName = $_SESSION['name'];
	$sessionId = $_SESSION['id'];
	$sessionAcc = $_SESSION['account'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/bank.css">
      <?php include('../links/link.php');   ?>


      <style>  
		.btn-success a{
			text-decoration:none;
		}
		

		.main-cont{
			background-color:white;
		}

		.acc_no{
			background:linear-gradient(#bdc3c7, #2c3e50);
		}
		body{
			background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6));
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

<?php   include('../banknav/banknavwith.php');   ?>
<!-- <script src="../JS/bank.js"></script> -->

<?php 

include('dbcon.php');

 
$balance = 0.00;


$depoUser = "select * from `".$sessionUserName."` where user = '$sessionName'";


$queryuser = mysqli_query($con,$depoUser);


while($row=mysqli_fetch_array($queryuser)){

    $balance = $balance + $row['amount'];

}


if(isset($_POST['withdrawsub'])){
$acnno = mysqli_real_escape_string($con,$_POST['acn']);
$amount = mysqli_real_escape_string($con,$_POST['withdrawamt']);
$detail = mysqli_real_escape_string($con,$_POST['details']);
$date = mysqli_real_escape_string($con,date("Y/m/d"));


$_SESSION['amt'] = $amount;
$_SESSION['det'] = $detail;

$amtlength = strlen((string)$amount);



if(empty($acnno)){
	$acn_err = "**Please enter your acc no**";
}else if($acnno!== $sessionAcc ){
	$acn_err ="**Wrong account num**";
}

 else if(empty($amount)){
	$amt_err = "**please enter your amount**";
}
elseif($amtlength > 5 || $amtlength < 3 ){
	$amt_err = "**maximum withdraw upto 99000 and minimum upto 100**";
}
else if($amount > $balance){
	
	?>
	<script>
	alert("Insufficient Balance");
	location.href="balance.php";
	</script>";

	<?php
	exit("You have insufficient funds!");
	
	// header("location:balance.php");
 }

 else if(empty($detail)){
	$det_err = "**add some detail (eg:for fee)**";
}else{
	$amount=(-$amount);
	

	$insqueryuser = "insert into `".$sessionUserName."`(accno,amount,transdate,detail,user,user_id) values ('$acnno','$amount','$date','$detail','$sessionName','$sessionId')";
	$iqueryuser = mysqli_query($con,$insqueryuser);

	if( $iqueryuser ){
		?>
		<script>alert('Withdraw Successfully');
		location.href= "withSuccess.php";</script>
		
		<?php 

	}else{
		?>
		<script>alert('cannot withdraw money');</script>
		<?php
	}
}
}
?>




<div class="container main-cont shadow  my-5">
		<h2 >The Withdraw Page</h2>
		<h3> Welcome to Banking <?php echo $sessionName ?></h3>
		<!-- <h3 class="acc_no"> Account number : </h3> -->
		
		<br/><br/>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">



		<div class="mb-3">
              <label for="Account num" class="form-label">Enter your account number</label>
			 <input type="number" class="form-control"  name="acn"><br>
            <p style="color:red;"> <?php if(isset($acn_err)){
              echo $acn_err;}?></p>
			  </div>

        <div class="mb-3">
              <label for="Withdraw" class="form-label">Enter the amount to be withdrawl</label>
			 <input type="number" class="form-control"  name="withdrawamt"><br>
            <p style="color:red;"> <?php if(isset($amt_err)){
              echo $amt_err;}?></p>
		</div>

        <div class="mb-3">
              <label for="Deposit" class="form-label">Prupose of withdrawl</label>	
			 <input type="text" name="details" class="form-control"><br>
			<p style="color:red;"> <?php if(isset($det_err)){
              echo $det_err;}     ?></p>
        </div>
		
		<div class="wrap">
        <button class="btn btn-primary w-btn" name="withdrawsub" > Withdraw</button>
		</div>
		</form>
			
		<div class="p-3 mb-2 div-1 text-white my-3 py-5"><button class="btn btn-success" style="text-align:left;"><a href="balance.php" class="text-white">Check balance</a></button> <span style="float:right;">	<button class="btn btn-primary"><a href = "index.php" class="text-white">Go Back</a></button></span><</div>
			
		

			<p class="font-weight-bold text-center">Do not withdraw more than you have in your Account  </p>  



</div>


