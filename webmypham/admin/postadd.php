
<?php
    include '../classes/adminlogin.php';
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "mypham";
                                                $conn = new mysqli($servername, $username, $password, $dbname);


               $sql = "INSERT INTO baiviet (BV_TEN,BV_MOTANGAN,BV_NOIDUNG,BV_HINH) 
                VALUES('".$_POST["BV_TEN"] ."','".$_POST["BV_MOTANGAN"] ."','".$_POST["BV_NOIDUNG"] ."','".$_POST["BV_HINH"] ."')";

              
                if ($conn->query($sql) == TRUE) {
                echo "Đăng Ký Thành Công";
                header('Location:posts.php');
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                $conn->close();
                ?>

	