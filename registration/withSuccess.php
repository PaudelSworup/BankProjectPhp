<?php session_start();   ?>
<?php 

if($_SESSION['username'] && $_SESSION['id'] && $_SESSION['account'] && $_SESSION['acctype'] ){
	$sessionUser=$_SESSION['username'];
	$sessionId = $_SESSION['id'];
	$sessionAcc = $_SESSION['account'];
	$sessionAcctype = $_SESSION['acctype'];
}

//  include('dbcon.php'); 



?>

<!DOCTYPE html>
<html lang="en">
<head>
      <?php include('../links/link.php');   ?>
      <style>
      .img-container{
          display:block;
          text-align:center;  
      }

      .img-container img{
          width:10%;
          border-radius:50%;
          border:10px solid green;
      }

      .full-detail{
          margin-top:100px;
      }

      .full-detail .div-1{
          background-color:#808080;

      }

      body{
          background:#cacaca;

      }
      </style>
</head>
<body>
<div class="container">
<div class="ts-div">
    <h2 class="text-center my-5 text-secondary">Transaction Success<h2>
    <span class="img-container">
    <img src="../image/tick.jpg">
    </span>
</div>

<div class="full-detail container  ">
<p>Transaction Detail</p>
<div class="p-3 mb-2 div-1 text-white"><p style="text-align:left;">Date/time <span style="float:right;">
<script>
let d = new Date();
let t = d.toLocaleTimeString();
let dts = d.toLocaleDateString();
document.write(dts  + " , " + "" +  t); 
</script> </span></p></div>

<div class="p-3 mb-2 div-1 text-white my-3"><p style="text-align:left;">Channel <span style="float:right;"> <?php echo "Online";  ?></span></p></div>

<div class="p-3 mb-2 div-1 text-white my-3"><p style="text-align:left;">Withdrawal Purpose <span style="float:right;"> <?php echo $_SESSION['det'];  ?></span></p></div>

<div class="p-3 mb-2 div-1 text-white my-3"><p style="text-align:left;">Amount(NPR): <span style="float:right;"> <?php echo $_SESSION['amt']; ?></span></p></div>

<div class="p-3 mb-2 div-1 text-white my-3"><p style="text-align:left;">Initiator <span style="float:right;"> <?php echo $sessionAcc;  ?></span></p></div>

<button class="btn btn-success btn-block"> <a href ="index.php" class="text-white"> DONE </a>  </button>



</div>
</div>

</body>
</html>




