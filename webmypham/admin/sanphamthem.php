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


$sql = "INSERT INTO sanpham (sp_ten, sp_hinh, sp_congdung, sp_thanhphan, sp_trongluong, sp_dvt, sp_giaban, sp_soluongton, sp_nsx, sp_hsd, sp_soluongdaban, th_ma, l_ma)
      VALUES ('" . $_POST["sp_ten"] . "','" . $_POST["sp_hinh"] . "', '" . $_POST["sp_congdung"] . "','" . $_POST["sp_thanhphan"] . "',
      '" . $_POST["sp_trongluong"] . "','" . $_POST["sp_dvt"] . "', '" . $_POST["sp_giaban"] . "', '" . $_POST["sp_soluongton"] . "','" . $_POST["sp_nsx"] . "','" . $_POST["sp_hsd"] . "',
      0, '" . $_POST["th_ma"] . "', '" . $_POST["l_ma"] . "')";

if ($conn->query($sql) == TRUE) {

//neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
header('Location: sanpham.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          
?>