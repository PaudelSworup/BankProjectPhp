
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include('../links/link.php')   ?> 
    <title>Registration</title>

    <style>
body{

      background:linear-gradient(to right,rgba(152,200,253,0.6),rgba(252,253,2300,0.6));

}

.main-container{
  width:50%;
  margin-top:40px;
  margin-bottom:100px;

}

.h2col{
  font-weight:bold;
  font-size:30px;
}

.fa-facebook,.fa-twitter,.fa-instagram{
	color: white; 
	font-size: 50px;
	margin-top: 20px;
	margin-bottom: 20px;
	margin-left: 30px;
}
footer{
	background-color: #0f2840;
}

.nav-list li{
	list-style: none;
	display: inline-flex;
	
}

.footerContent1{
	font-size: 20px;
}

.footerContent2{
	font-size: 23px;
}

.copyrightContent{
	font-size: 25px;
}
    </style>

</head>
<body>


  <div class="container"><h2 class="text-center my-5 h2col "> Registration</h2></div>

<div class="container py-4 shadow  main-container">

    <form  name="myform" method="POST" action="result.php">
   

        <div class="mb">
            <label for="Name" class="form-label my-3">Name</label>
            <input type="name" class="form-control"  name="name" placeholder="Enter your full name" value="<?php  
            if(isset($_POST['name'])) echo $_POST['name'];?>"><br>
            <p style="color:red;"> <?php if(isset($name_err)){
              echo $name_err;
            }     ?></p>
          </div>

           <div class="mb-0">
            <label for="Name" class="form-label my-3">Username</label>
            <input type="name" class="form-control"  name="username" placeholder="enter your username" value="<?php  
            if(isset($_POST['username'])) echo $_POST['username'];?>"><br>
            <p style="color:red;"> <?php if(isset($username_err)){
              echo $username_err;
            }     ?></p>
          </div>


          
          <div class="mb-1">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control"  name="email"  placeholder="Enter your email" value="<?php  
            if(isset($_POST['email'])) echo $_POST['email'];?>" >
              <p style="color:red;"> <?php if(isset($eml_err)){
              echo $eml_err;
            }     ?></p>
          </div>

           
          <div class="mb-3">
              <label for="accno" class="form-label">Account number</label>
              <input type="number" class="form-control"  name="accno" min="3" data-max="6"  step="1"  placeholder="Enter your account number to be registred" value="<?php  
            if(isset($_POST['accno'])) echo $_POST['accno'];?>">
              <p style="color:red;"> <?php if(isset($acc_err)){
              echo $acc_err;
            }     ?></p>
          </div>

   

          <div class="mb-1">
              <label for="acctype" class="form-label">Account Type</label>
              <select class="form-control" name="acctype" value="<?php  
            if(isset($_POST['acctype'])) echo $_POST['acctype'];?>" >
              <option value="Current">Choose your account</option>
              <option value="Current">Current</option>
              <option value="Saving">Saving</option>
              
              </select>
              <p style="color:red;"> <?php if(isset($acct_err)){
              echo $acct_err;
            }     ?></p>
          </div>


         
        <div class="mb-1">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control"  name="password_1" placeholder="Enter your password" ><br>
          <p style="color:red;"> <?php if(isset($pass_err)){
              echo $pass_err;
            }     ?></p>
        </div>


        <div class="mb-1">
          <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
          <input type="password" class="form-control"  name="password_2" placeholder="Retype your password"  ><br>
          <p style="color:red;"> <?php if(isset($pass2_err)){
              echo $pass2_err;
            }     ?></p>
        </div>
       
        <button type="submit" class="btn btn-primary" name="register">Register</button><br><br>

        <p> Have an Account?  </p>
        <button class="btn btn-primary" type="submit"><a href="login.php" class="text-white">Login </a></button>
      </form>
      <br>

      <h5 class="bg-dark text-white">note:920 is your bank code and you must use 920 first to register in to your bank account and there can be only six digits (for example:920...)</h5>
      
</div>

<footer>
  <div class="container ">
    <h2 class="text-white ml-2 d-flex align-items-center justify-content-center">Connect with us</h2>
    <ul class="nav-list d-flex align-items-center justify-content-center">
      <li class="list-items"><i class="fab fa-facebook"></i></li>
      <li class="list-items"><i class="fab fa-twitter"></i></li>
      <li class="list-items"><i class="fab fa-instagram"></i></li>
    </ul>
  </div>
  <div class="container text-white d-flex justify-content-center align-items-center footerContent1">
    <p class="ml-4">Info</p><span><p class="ml-2">Support</p></span><span><p class="ml-2">Marketing</p></span>
  </div>
    <div class="text-white  d-flex justify-content-center align-items-center footerContent2">
    <p class="ml-2"><a>Terms of use</a></p><span><p class="ml-2">Privacy Policy</p></span>
  </div>
  <p class="text-secondary text-center copyrightContent"> &copy; 2021 banking.com.np</h2>
</footer>


</body>
</html>