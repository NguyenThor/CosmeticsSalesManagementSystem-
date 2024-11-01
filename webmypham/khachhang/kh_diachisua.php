<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mypham";
$conn = new mysqli($servername, $username, $password, $dbname);
 
$DCNH_MA = $_GET['DCNH_MA'];

$sql = "UPDATE diachinhanhang SET trangthai='1'  WHERE DCNH_MA='$DCNH_MA'";


$result = mysqli_query($conn, $sql);


mysqli_close($conn);


header('location:kh_thanhtoan.php');

?>