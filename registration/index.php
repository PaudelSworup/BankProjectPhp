
<?php session_start();  

if(!isset($_SESSION['username'])){
    header('location:login.php');
}
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/bank.css">

    <style>
    .margin-l{
      margin-left:20%;
    }

    body{
      background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6));
    }

    @media(max-width:766px){
      .main-text{
        font-size:10px;
        font-weight:bold;
      }
    }

    @media(max-width:541px){
      .card{
        display:block;
      }

     
    }




    </style>
      <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
      
    <title></title>
    
</head>
<body>


<?php   include('../banknav/indexnav.php');   ?>


<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img src="../image/bank.jpg" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-caption d-none d-md-block">
        <h5>WELCOME TO MERO BANK</h5>
        <p>Thank you For Login <?php echo $_SESSION['name'];  ?> .</p>
      </div>

    </div>
   </div> 
   




    <div class="container cards-container my-5 d-flex">
   <div class="card " style="width: 15rem; ">
  <img src="../image/depo.jpg" class="card-img-top" alt="" >
  <div class="card-body">   <a href="deposit.php" class="btn btn-primary main-c-b"><span class="main-text">Deposit<span></a></div>
  
</div>


<div class="card margin-l" style="width: 15rem; ">
  <img src="../image/newwith.jpg"  class="card-img-top" alt="">
  <div class="card-body">   <a href="withdraw.php" class="btn btn-primary main-c-b"><span class="main-text">Withdraw<span></a></div>
</div>


<div class="card margin-l" style="width: 18rem; ">
  <img src="../image/fundt.jpg" class="card-img-top" alt="">
  <div class="card-body">
    <a href="fundtransfer.php" class="btn btn-primary main-c-b"><span class="main-text">Transfer<span></a>
  </div>
</div>

</div>





<div class="container py-4 logout" >
<button class="btn btn-primary"><a href="logout.php">Logout</a><button>


    
</body>
</html>