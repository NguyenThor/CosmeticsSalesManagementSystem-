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



$sql="INSERT INTO khachhang (kh_ten,kh_email,kh_sdt,kh_diachi,kh_matkhau)
      VALUES ('".$_POST["kh_ten"] ."', '".$_POST["kh_email"] ."','".$_POST["kh_sdt"] ."'
      ,'".$_POST["kh_diachi"] ."','".$_POST["kh_matkhau"] ."')";



if ($conn->query($sql) == TRUE) {
  $sql2="INSERT INTO giohang (gh_ma) VALUES ( '".$_POST["kh_email"] ."')";
  if ($conn->query($sql2) == TRUE)
echo "Đăng Ký Thành Công";
header('Location: index.php#my-Login');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          


?>

