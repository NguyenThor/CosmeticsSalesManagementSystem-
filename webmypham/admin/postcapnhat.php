<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "mypham";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
$sql = "UPDATE baiviet SET bv_ten = '".$_POST["BV_TEN"] ."' ,
BV_TEN = '".$_POST["BV_TEN"] ."' ,
BV_MOTANGAN = '".$_POST["BV_MOTANGAN"] ."' ,
BV_NOIDUNG = '".$_POST["BV_NOIDUNG"] ."'  
Where BV_MA = '".$_POST["BV_MA"] ."'";
 if ($conn->query($sql) == TRUE) {
 //neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
 header('Location: posts.php');
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
?>