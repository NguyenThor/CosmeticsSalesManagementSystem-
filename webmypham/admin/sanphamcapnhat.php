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
$sql = "UPDATE sanpham SET sp_ten = '".$_POST["sp_ten"] ."' ,
sp_congdung = '".$_POST["sp_congdung"] ."' ,
sp_thanhphan = '".$_POST["sp_thanhphan"] ."' ,
sp_giaban= '".$_POST["sp_giaban"] ."' ,
sp_trongluong= '".$_POST["sp_trongluong"] ."' ,
sp_nsx= '".$_POST["sp_nsx"] ."' ,
sp_hsd= '".$_POST["sp_hsd"] ."' ,
sp_dvt = '".$_POST["sp_dvt"] ."' ,
sp_soluongton = '".$_POST["sp_soluongton"] ."' ,
sp_soluongdaban = '".$_POST["sp_soluongdaban"] ."' ,
sp_dvt = '".$_POST["sp_dvt"] ."' ,
th_ma = '".$_POST["th_ma"] ."' ,
l_ma = '".$_POST["l_ma"] ."' 
Where sp_ma = '".$_POST["sp_ma"] ."'";

 
 if ($conn->query($sql) == TRUE) {
 //neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
 header('Location: sanpham.php');
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
?>