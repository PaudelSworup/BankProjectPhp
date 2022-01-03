<?php

session_start();



include "dbcon.php";

$id = $_GET['id'];
$tble = $_GET['table_name'];

// if($tble == "sk9"){
//     echo "<script>alert('Restricted to delete admin ')</script>";
//     exit('cannot delete admin table');
// }

$deletequery = "delete from users where id = $id ";
$query = mysqli_query($con , $deletequery );



$delete_table = "drop table `".$tble."` ";

if($tble == "SK9"){
    echo "<script>alert('Restricted to delete admin ')</script>";
}else{
$delete_tablequery = mysqli_query($con , $delete_table );
}



header('location:showuser.php');

?>