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


$sql="INSERT INTO khuyenmai (km_ma,km_ten,km_hinh,km_giatri,km_ngaybd,km_ngaykt)
      VALUES ('".$_POST["KM_MA"] ."','".$_POST["KM_TEN"] ."', '".$_POST["KM_HINH"] ."','".$_POST["KM_GIATRI"] ."',
      '".$_POST["KM_NGAYBD"] ."','".$_POST["KM_NGAYKT"] ."')";
if ($conn->query($sql) == TRUE) {

//neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
header('Location: khuyenmai.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          


?>