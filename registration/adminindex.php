
<?php session_start();  

if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../links/link.php')   ?> 
   <link rel="stylesheet" href="../css/admin.css">
   <title>Document</title>
   <style>
     @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    font-family:'Josefin Sans', sans-serif;
}

body{
    background: #f3f5f9!important;
}

.wrapper{
    display: flex;
    position:relative;
}

.wrapper .sidebar{
    position: fixed;
    width:200px;
    height: 100vh;
    background: #4b4276;
    padding: 30px 0;
}

.wrapper .sidebar h2{
    text-transform: uppercase;
    color:#fff;
    text-align: center;
    margin-bottom: 30px;
}

.wrapper .sidebar ul li{
    padding: 15px;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(225,225,225,0.05);
    text-align: center;
    font-size: 20px;
}

.wrapper .sidebar ul li:hover{
    background: #594f8d;
}

.wrapper .sidebar ul li a{
    display: block;
    color:#fff;
}

.wrapper .main_content{
    width: 100%;
    margin-left: 200px;

}

.wrapper .main_content .header{
    padding: 20px;
    background: #fff!important;
    color:#717171;
    border-bottom: 1px solid #e0e4e8;
    font-size:20px;
    font-weight:bold;
    text-align:center;
}

.wrapper .main_content .info{
    margin: 20px;
    color:#717171;
    line-height: 25px;
}

.wrapper .sidebar .social_media{
    position: absolute;
    left:50%;
    display: flex;
    top:80%;
    margin-left:-30px;
}

.wrapper .sidebar .social_media a{
    text-decoration:none;
    color:white
}
   </style>
 </head>
 <body>
  


<?php include('dbcon.php'); ?>

   
 
<div class="wrapper">
        <div class="sidebar">
            <h2>MeroBank</h2>
            <ul>
                <li><a href="adminindex.php">Dashboard</a></li>
                <li><a href="showuser.php">Manage User</a></li> 
            </ul>
            <div class="social_media">
                <button class="btn btn-primary"><a href="logout.php">Logout</a><button></button>
            </div>
        </div>
        <div class="main_content">
            <div class="header">Welcome <?php echo $_SESSION['admin'];  ?>! have a nice day.</div>
        </div>
        </div>
   
 </body>
 </html>