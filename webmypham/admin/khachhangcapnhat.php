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
$sql = "UPDATE khachhang SET kh_ten = '".$_POST["kh_ten"] ."' ,
kh_sdt = '".$_POST["kh_sdt"] ."' ,
kh_email = '".$_POST["kh_email"] ."' ,
kh_matkhau = '".$_POST["kh_matkhau"] ."' ,
kh_diachi = '".$_POST["kh_diachi"] ."' 
Where kh_ma = '".$_POST["kh_ma"] ."'";

 
 if ($conn->query($sql) == TRUE) {
 //neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
 header('Location: khachhang.php');
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
?>