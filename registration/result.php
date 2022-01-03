<?php 

include('dbcon.php');
if(isset($_POST['register'])){
$name =mysqli_real_escape_string($con , $_POST['name']);
$username = mysqli_real_escape_string($con , $_POST['username']);
$email =mysqli_real_escape_string($con , $_POST['email']);
$accno = mysqli_real_escape_string($con , $_POST['accno']);
$acctype = mysqli_real_escape_string($con , $_POST['acctype']);
$password1 =mysqli_real_escape_string($con , $_POST['password_1']);
$password2 =mysqli_real_escape_string($con , $_POST['password_2']);



$acclength = strlen((string)$accno);
// echo $acclength;
// var_dump($acclength);
$one = substr($accno,-6,1);
$two = substr($accno,-5,1);
$three = substr($accno,-4,1);
$four = substr($accno,-3,1);
$five = substr($accno,-2,1);
$six = substr($accno,-1,1);

$newaccno = $one . $two . $three . $four . $five . $six;
// var_dump($newaccno);



// $pass = password_hash($password1, PASSWORD_BCRYPT);
// $cpass = password_hash($password2, PASSWORD_BCRYPT);

    $emailQuery = "select * from users where email = '$email' ";
    $query = mysqli_query($con,$emailQuery);
    $email_count = mysqli_num_rows($query);

    $accQuery = "select * from users where accno = '$newaccno'";
    $aquery = mysqli_query($con,$accQuery);
    $acc_count = mysqli_num_rows($aquery);

    $usernameQuery = "select * from users where username = '$username'";
    $uquery = mysqli_query($con,$usernameQuery);
    $user_count = mysqli_num_rows($uquery);



if(empty($name)){
    $name_err = "**name is required**";
}
elseif(!preg_match("/^[a-zA-Z\s]+$/",$name)){
    $name_err = "**name must be in alphabets**";
}

else if(empty($username)){
     $username_err = "**Username is required**";
}
elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    $username_err = "**username must be in alphabets and numerical**";
}


elseif(strlen($username) < 3){
    $username_err = "**Username must be atleast 3 character**";
}

elseif($user_count > 0){
    $username_err = "**Username already exist**";
}

else if(empty($email)){
    $eml_err = "**email is required**";
}

else if($email_count > 0){
    $eml_err = "**email already exist**";
}
 
else if(empty($newaccno)){
    $acc_err = "**account num is required**";
}

else if($one!="9" || $two!="2" || $three!="0"){
    $acc_err = "**account num must start with 920 and can have only six digits **";
}

elseif($four==" " || $five== " " || $six== ""){
    $acc_err = "**Please enter all your six digits **";
}


else if($acclength > 6 || $acclength < 6){
    $acc_err = "**account num can contain only six digits**";
}


else if($acc_count > 0){
    $acc_err = "**account num already exist**";
}

else if(empty($acctype)){
    $acct_err = "**choose your Type**";
}

else{
    if($password1 === $password2){

        $insertQuery = "insert into users( name, username ,  email, accno, acctype , pass, cpass , table_name) values ('$name','$username','$email',$newaccno,'$acctype','$password1','$password2' , '$username')";
        $iquery = mysqli_query($con,$insertQuery);

            $create_table = "create table `".$username."`(id int not null auto_increment primary key , 
            accno int not null , amount int not null , transdate date not null , detail varchar(50),
            user varchar(70) not null , user_id int not null , foreign key(user_id) references users(id)
            )";

            $create_query = mysqli_query($con, $create_table);


        if($iquery && $create_query ){
            ?>
            <script>alert('Registration Successful , now you can login');</script>
            <?php 
            
        }
        
        else{
            ?>
            <script>alert('Registration Failed');</script>
            <?php
        }

    }else{
        $pass2_err ="**password do not match**";
    }
}

if(empty($password1)){
    $pass_err = "**password is required**";
}




}



include('register.php');






?>


<?php 




?>