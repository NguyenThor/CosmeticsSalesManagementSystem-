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


if($_POST['kh_email'] == "admin@gmail.com" AND $_POST['kh_pass'] = "123"){
    header('Location: ./admin/index.php');
  }


else{
  $sql = "select kh_ma, kh_ten,kh_email from khachhang where kh_email = '".$_POST["kh_email"]."' and kh_matkhau = '".($_POST["kh_matkhau"])."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  $row = $result->fetch_assoc();
  $cookie_name = "user";
  $cookie_value = $row['kh_email'] ;
  setcookie($cookie_name, $cookie_value, time() + (86400 / 24), "/");
  setcookie("kh_ten", $row['kh_ten'], time() + (86400 / 24), "/");
  setcookie("kh_ma", $row['kh_ma'], time() + (86400 / 24), "/");
  setcookie("kh_email", $row['kh_email'], time() + (86400 / 24), "/");


  
//thử
      
  header('Location: ./khachhang/kh_index.php');  
} 
 

else {
 
  //Tro ve trang dang nhap sau 3 giay
  echo"Đăng Nhập Không Thành Công.Mời Nhập Lại";
  header('Refresh: 3;url=dangnhap.php');

}


}
 
  $conn->close();

?>