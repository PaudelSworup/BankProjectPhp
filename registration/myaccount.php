<?php session_start();?>

<?php
if($_SESSION['username'] && $_SESSION['name'] && $_SESSION['id'] && $_SESSION['account'] && $_SESSION['acctype'] ){
	$sessionUserName=$_SESSION['username'];
    $sessionName = $_SESSION['name'];
	$sessionId = $_SESSION['id'];
	$sessionAcc = $_SESSION['account'];
	$sessionAcctype = $_SESSION['acctype'];
}

 include('dbcon.php');  
        
$balance = 0.00;
$depoUser = "select * from `".$sessionUserName."` where accno = '$sessionAcc'";

$query = mysqli_query($con,$depoUser);

while($row=mysqli_fetch_array($query)){

    $balance = $balance + $row['amount'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <?php include('../links/link.php')   ?>

      <style>
      body{
          background-color:#ccc!important;
          text-transform
      }

      .c1 .khata, .detail{
        margin:auto;
        padding: 10px;      
    
      }

      .khata , .stmt{
       
          background-color:#DC143C;
          height:120px;
          width:80%;
            
      }
      .detail  {
          background-color:white;
          height:auto;
          width:80%;
       
      }
      .bs{
          width:40%;
      }

      

      </style>
    

    <title>Account Detail</title>
    
</head>
<body>

<?php   include('../banknav/banknavmy.php');   ?>
<?php 
$rate = 1.5;
$time=1;
$si = NULL;

$si = ($balance*$rate*$time) / 100;


?>
<h1 class="text-center font-weight-bold my-5 ">My Accounts</h1><br><br> 
<div class="container c1  ">

<div class="khata shadow">
<h2 class="text-white">Bidhyarthi Bachat Khata </h2>
<p class="text-white"><?php echo $sessionName;  ?> </p>
<p class="text-white"> <?php echo $sessionAcc;   ?>  </p>
</div>

<div class="p-3 mb-2 detail shadow ">
<p style="text-align:left;">Available Balance <span style="float:right;"> NPR <?php echo $balance;  ?></span></p>
<p style="text-align:left;">Actual Balance <span style="float:right;"> NPR <?php echo $balance+$si;  ?></span></p>
<p style="text-align:left;">Accured Interest<span style="float:right;"> NPR <?php echo $si;  ?></span></p>
<p style="text-align:left;">Interest Rate <span style="float:right;">  <?php echo $rate."%";  ?></span></p>

</div> 


</div>


</body>
</html>


