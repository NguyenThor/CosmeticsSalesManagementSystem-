

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

 $kh_ma = $_GET["kh_ma"];
 $b = $_GET['SP_MA'];
 $BINHLUAN = $_POST['BINHLUAN'];


$sql="INSERT INTO chitietdanhgia (sp_ma,BINHLUAN,kh_ma)
      VALUES ('$b','$BINHLUAN','$kh_ma')";
      
   mysqli_query($conn, $sqlInsert);

   
   mysqli_close($conn);

   
   header('location:nxb.php');
  

?>