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

 $a = $_COOKIE["kh_email"];
 $b = $_GET['SP_MA'];
 $soluong = $_POST['SOLUONG'];
 $sqlS="select  a.SP_MA,b.ID,b.SOLUONG FROM SANPHAM a, chitietgiohang b, giohang c where a.SP_MA=b.SP_MA 
 AND b.GH_MA = c.GH_MA
 AND c.GH_MA='$a'";
$resultS = mysqli_query($conn, $sqlS);
$rowS = mysqli_fetch_array($resultS, MYSQLI_ASSOC);
    if($b==$rowS['SP_MA']){
      $sp=$rowS['SP_MA'];
      $id=$rowS['ID'];
      $sqlU="UPDATE  CHITIETGIOHANG SET SOLUONG= $SOLUONG+$rowS[SOLUONG]
      WHERE SP_MA ='$sp' and id='$id'";
      mysqli_query($conn,"$sqlU");

      }
    else{

$sql="INSERT INTO chitietgiohang (sp_ma,soluong,gh_ma)
      VALUES ('$b','$soluong','$a')";
 mysqli_query($conn,"$sql");
}

echo "Đăng Ký Thành Công";
header('Location: kh_index.php');

          
          $conn->close();
          


          


?>