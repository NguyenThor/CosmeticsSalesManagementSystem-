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
$sql = "UPDATE khuyenmai SET km_ten = '".$_POST["KM_TEN"] ."' ,
KM_GIATRI = '".$_POST["KM_GIATRI"] ."' ,
KM_NGAYBD = '".$_POST["KM_NGAYBD"] ."' ,
KM_NGAYKT = '".$_POST["KM_NGAYKT"] ."'
Where KM_ma = '".$_POST["KM_MA"] ."'";

 
 if ($conn->query($sql) == TRUE) {
 //neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
 header('Location: khuyenmai.php');
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
?>