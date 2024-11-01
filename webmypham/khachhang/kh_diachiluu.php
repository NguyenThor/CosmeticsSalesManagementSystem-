
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

$a = $_COOKIE["kh_ma"];



$sql="INSERT INTO diachinhanhang (DCNH_TEN,DCNH_SDT,DCNH_TINH,DCNH_HUYEN,DCNH_XA,DCNH_DIACHI,KH_MA)
      VALUES (
      
      '".$_POST["DCNH_TEN"] ."',
      '".$_POST["DCNH_SDT"] ."',
      
      '".$_POST["DCNH_TINH"] ."',
      '".$_POST["DCNH_HUYEN"] ."',
      '".$_POST["DCNH_XA"] ."',
      '".$_POST["DCNH_DIACHI"] ."',  
      '$a')
      ";
if ($conn->query($sql) == TRUE) {
echo "Đăng Ký Thành Công";
echo $soluong;
header('Location: kh_diachi.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          


?>

