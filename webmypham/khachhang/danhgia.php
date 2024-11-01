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
$b = $_GET['SP_MA'];


$sql="INSERT INTO chitietdanhgia (BINHLUAN, KH_MA, DG_MA, SP_MA)
      VALUES ('".$_POST["BINHLUAN"] ."','$a','".$_POST["DG_MA"] ."','$b')";

if ($conn->query($sql) == TRUE){
  $sqlT2 = "UPDATE chitietdonhang SET DG_TT=1 WHERE SP_MA='$b'";
  $resultT2 = mysqli_query($conn,$sqlT2); 
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          
          header('Location: kh_sanphamchitiet.php?SP_MA='.$b);


?>