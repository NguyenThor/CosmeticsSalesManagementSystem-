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
 $ID = $_GET['ID'];
$sqlKT = "SELECT *FROM CHITIETGIOHANG WHERE ID = $ID";
$resultKT = mysqli_query($conn,"$sqlKT");
$rowKT = mysqli_fetch_array($resultKT, MYSQLI_ASSOC);
if ($rowKT["SOLUONG"] > 1) {
$sql = "UPDATE chitietgiohang SET SOLUONG = SOLUONG-1  
Where ID=$ID";

 if ($conn->query($sql) == TRUE) {
 //neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
 header('Location: kh_giohang.php');
 } else {
 echo header('Location: kh_giohang.php');
 }
}else echo header('Location: kh_giohang.php');


 $conn->close();
?>