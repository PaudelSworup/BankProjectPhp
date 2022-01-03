<?php 
$server = 'localhost';
$user = 'root';
$password = '';
$db_name = 'registration';

$con = mysqli_connect($server,$user,$password,$db_name);

if(!$con){
    ?>
    <script>alert('Connection Failed');</script>
<?php
}
// else{
// 
//     
// }

?>
