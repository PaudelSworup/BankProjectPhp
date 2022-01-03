
<?php  session_start(); ?>

<?php 
if($_SESSION['name'] && $_SESSION['username']  && $_SESSION['id'] && $_SESSION['account'] && $_SESSION['acctype'] ){
	$sessionUserName=$_SESSION['username'];
	$sessionName = $_SESSION['name'];
	$sessionId = $_SESSION['id'];
	$sessionAcc = $_SESSION['account'];
	$sessionAcctype = $_SESSION['acctype'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
      <?php include('../links/link.php');   ?>
	  <link rel="stylesheet" href="../css/bank.css">
	  <style>  
		.btn-success a{
			text-decoration:none;
		}
		

		.main-cont{
			background-color:white;
		}
		.detail{
			background-color:#DC143C;
		}

		/* .acc_no{
			background:linear-gradient(#bdc3c7, #2c3e50);
		} */

		
		body{
			background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6)),url('../image/bank.jpg');
			background-size:100% 100% ;
		}

		.main-cont{
		width:50%;
		margin-top:40px;
		margin-bottom:100px;

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

<?php 


include('dbcon.php');
if(isset($_POST['depositsub'])){
$acnno = mysqli_real_escape_string($con,$_POST['acn']);
$amount = mysqli_real_escape_string($con,$_POST['amount']);
$detail = mysqli_real_escape_string($con,$_POST['details']);
$date = mysqli_real_escape_string($con,date("Y/m/d"));

// $amount = abs($amount);


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
}else if($amount<0){
	$amt_err = "**please enter positive amount**";
}
elseif ($amtlength > 5 || $amtlength < 4 ) {
	$amt_err = "** Maximum upto 99000 and minimum upto 1000  **";
	
}
 else if(empty($detail)){
	$det_err = "**add some detail (eg:saving)**";
}else{
	

	$insqueryuser = "insert into `".$sessionUserName."`(accno,amount,transdate,detail,user,user_id) values ('$acnno','$amount','$date','$detail','$sessionName','$sessionId')";
	$iqueryuser = mysqli_query($con,$insqueryuser);
	

	if($iqueryuser ){
		?>
		<script>
		alert('Deposited Successfully');
		location.href="depositSuccess.php";
		</script>
		<?php 

	}else{
		?>
		<script>alert('cannot deposit money');</script>
		<?php
	}
}
}


?> 

<?php include('../banknav/banknavdepo.php') ; ?>



<div class="container main-cont shadow my-5">


		<div class="detail container">
		<h2 class="text-white" >The Deposit Page</h2>
		<h3 class="text-white"> Welcome to Banking <?php echo $sessionName ?></h3>
		<h3 class="text-white"> Account number : <?php echo $sessionAcc ?> </h3>
		<h3 class = "text-white"> Account Type : <?php echo $sessionAcctype ?> </h3>

		</div>

		
		<br/><br/>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">


		<div class="mb-3">
              <label for="Account num" class="form-label">Enter your account number</label>
			 <input type="number" class="form-control"  name="acn"><br>
            <p style="color:red;"> <?php if(isset($acn_err)){
              echo $acn_err;}?></p>
			  </div>


		<div class="mb-3">
              <label for="Deposit" class="form-label">Enter the amount</label>
			 <input type="number" class="form-control"  name="amount"><br>
            <p style="color:red;"> <?php if(isset($amt_err)){
              echo $amt_err;}?></p>
			  </div>

				
		<div class="mb-3">
              <label for="Deposit" class="form-label">Prupose of deposit</label>	
            
			 <input type="text" name="details" class="form-control"><br>
			<p style="color:red;"> <?php if(isset($det_err)){
              echo $det_err;}     ?></p>

			  </div>
			  <div class="wrap">
			<button  class="btn btn-primary ml-5 w-btn"  name="depositsub" >Deposit</button>
			</div>
		</form>

			
		<div class="p-3 mb-2 div-1 text-white my-3 py-5"><button class="btn btn-success" style="text-align:left;"><a href="balance.php" class="text-white">Check balance</a></button> <span style="float:right;">	<button class="btn btn-primary"><a href = "index.php" class="text-white">Go Back</a></button></span></div></a></button>
				
	</div>


 




</body>
</html>