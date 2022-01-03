<?php session_start();    ?>



<!DOCTYPE html>
<html lang="en">
<head>

  <?php include('../links/link.php')   ?> 
    <title>Login</title>

    <style>
    body{
        background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6));
    }
    .login-container{
    max-width:80%;
    margin-top:50px;
    margin-bottom:100px;
	background-color: #1C252E!important;
    border-radius:20px;
    height:auto;
   

    }

    .btp-inp{
        width:100%;
        border:none;
        outline:none;
        height:40px;
        text-indent: 20px;
	    box-sizing: border-box;
	    background-color: #28323C;
    }

    .btp-inp:focus{
	background-color: white;
	transition: 3s;
}

    .before-container{
        /* background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6)); */
        width:80%;
        height:auto;
    }
    .img-c{
        width:20%;
    }
    .img-logo{
        width:40%;
    }


    


    
    </style>

<!-- <script>
    let d = new date();
    document.getElementById('date-id').innerHTML = d; 
</script> -->

</head>
<body>

<?php  

include('dbcon.php');

if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password_1'];

$emailpass_search = "select * from users where email = '$email'";
$query = mysqli_query($con,$emailpass_search );
$email_count = mysqli_num_rows($query);

$emailadmin = "select * from admin where email = '$email'";
$admin_query = mysqli_query($con,$emailadmin);
$admin_email= mysqli_num_rows($admin_query);
if($admin_email){
$adm_pass = mysqli_fetch_assoc($admin_query);
$_SESSION['admin'] = $adm_pass['name'];
}




if(empty($email)){
    $eml_err = "**Please enter your email**";
}else if($email_count ){
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass = $email_pass['pass'];
    $db_email = $email_pass['email'];
    $_SESSION['name'] = $email_pass['name'];
    $_SESSION['username'] = $email_pass['username'];
    $_SESSION['id'] = $email_pass['id'];
    $_SESSION['account'] = $email_pass['accno'];
    $_SESSION['acctype'] = $email_pass['acctype'];
    
   
   

    if($password ==  $db_pass && $db_email == "admin@admin.com"){
        ?>
    <script>alert("Login Successful");
    
        location.replace('adminindex.php');

    </script>
        <?php
    }elseif($password ==  $db_pass){
        // echo" <script>alert('Login Successful')</script>";
        // header("Location:index.php");
          ?>
    <script>alert("Login Successful");
    
        location.replace('index.php');

    </script>
        <?php
    }
    else{
        $pass_err = "**Incorrect Password** ";
        
    }

}else{
    $eml_err = "**Email do not exist**";
}

if(empty($password)){
    $pass_err = "**Please enter your password** ";
}

}

?>

<div class="container img-c my-5">
<img src="../image/bank-logo.jpg" class="img-logo">

</div>



<!-- <div class="conatiner"><h3 class="text-center my-5">Login Detail</h3></div> -->
<div class="container before-container  my-5">
<div class="container py-4 my-5 shadow login-container">

    <form  name="myform" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>">
   
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"><span class="text-white">Email address<span></label>
              <input type="email" class="btp-inp"  name="email" placeholder="Enter your email" value="<?php  
            if(isset($_POST['email'])) echo $_POST['email'];?>" >
              <p style="color:red;"> <?php if(isset($eml_err)){
              echo $eml_err;
            }     ?></p>
          </div>

        
       
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label"><span class="text-white">Password</span></label>
          <input type="password" class=" btp-inp"  name="password_1" placeholder="Enter your password"><br>
          <p style="color:red;"> <?php if(isset($pass_err)){
              echo $pass_err;
            }     ?></p>
        </div>


       
       
        <button type="submit" class="btn btn-primary btn-lg btn-block " name="submit">Login Now!</button><br><br>

        <p class="text-white">  Don't have an Account? <a href = "register.php">  Sign up </a>  </p>
      </form>
</div>
</div>
       
</body>
</html>