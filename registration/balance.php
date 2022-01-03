<?php  session_start(); ?>

<?php 
if($_SESSION['name'] && $_SESSION['account'] && $_SESSION['username']  ){
	$sessionName=$_SESSION['name']; 
    $sessionUserName=$_SESSION['username'];
    $sessionAcc = $_SESSION['account'];  
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
      <?php include('../links/link.php');   ?> 
      
<style>

.c-1{
	background-color: #DC143C;
}

.btn a{
    text-decoration:none;
    color:white;
}
.main-container{
    background:white;
}

body{
    background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6))  ;
    background-size:100% 100%;   
}

.main-container{
    width:50%;
  margin-top:40px;
  margin-bottom:100px;
}


</style>
</head>
<body>

<div class="container shadow py-5 my-5  align-items-center justify-content-center main-container">
	<div class="container c-1">	<h2  >Your Balance Page</h2> </div>
		<h3> Welcome to Banking <?php echo $sessionName ?></h3>
        <h3> Account number: <?php echo $sessionAcc ?> </h3>

        <?php include('dbcon.php');  
        
        $balance = 0.00;
        $depoUser = "select * from `".$sessionUserName."` where accno = '$sessionAcc'";

        $query = mysqli_query($con,$depoUser);

        while($row=mysqli_fetch_array($query)){

            $balance = $balance + $row['amount'];

        }
        ?>

        <p class="font-weight-bold"> Available balance: <?php echo "NPR. " .$balance   ?> </p>        
        
        

        <button class="btn btn-primary"><a href = "index.php">Go Back</a></button>

        


      

        

    </div>
        
        
        
        
        


</body>
</html>