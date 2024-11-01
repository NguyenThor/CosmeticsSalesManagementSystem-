
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
 $s = $_COOKIE["kh_email"];
 
$sql = "UPDATE giohang SET TIENHANG= '".$_POST["TIENHANG"] ."',
 GIAMGIA =  '".$_POST["TONGGIAMGIA"] ."',
  THANHTOAN =  '".$_POST["THANHTOAN"] ."'
Where GH_MA ='$s'";

 if ($conn->query($sql) == TRUE) {
header('Location:kh_thanhtoan.php');
 } 
 else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 
 $conn->close();}

?>