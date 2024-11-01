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
$sql="INSERT INTO donvivanchuyen (dv_ma, dv_hangvanchuyen, dv_loaidichvu, dv_thoigian, dv_tuyenvanchuyen, dv_lienhe)
      VALUES ('".$_POST["dv_ma"] ."','".$_POST["dv_hangvanchuyen"] ."', '".$_POST["dv_loaidichvu"] ."','".$_POST["dv_thoigian"] ."',
      '".$_POST["dv_tuyenvanchuyen"] ."','".$_POST["dv_lienhe"] ."')";
if ($conn->query($sql) == TRUE) {

//neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
header('Location: donvivanchuyen.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}     
          $conn->close();
?>