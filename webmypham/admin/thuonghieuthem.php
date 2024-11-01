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


$sql="INSERT INTO thuonghieu (th_ten)
      VALUES ('".$_POST["TH_TEN"] ."')";
if ($conn->query($sql) == TRUE) {

//neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
header('Location: thuonghieu.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          


?>