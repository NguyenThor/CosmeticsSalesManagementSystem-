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
$a= "kh_ma";
$DH_MA=$_GET["DH_MA"];
$sql = "UPDATE donhang SET TT_MA = '5'
where DH_MA='$DH_MA'";
 
 
 if ($conn->query($sql) == TRUE) {
    $sqlThem = " SELECT *
                FROM chitietdonhang a , sanpham b, donhang c
                    WHERE a.SP_MA = b.SP_MA
                    AND a.DH_MA = c.DH_MA
                    AND c.DH_MA = '$DH_MA'";
               
			$result = mysqli_query($conn, $sqlThem);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'DH_MA' => $row['DH_MA'],
                'ID' => $row['ID'],
                'SP_MA' => $row['SP_MA'],
                'SP_TEN' => $row['SP_TEN'],
                'SP_HINH'  => $row['SP_HINH'],
                'SP_GIABAN'  => $row['SP_GIABAN'],
                'SOLUONG'  => $row['SOLUONG'],
                'SP_SOLUONGTON'  => $row['SP_SOLUONGTON'],
            

            );
          
        }
        
        foreach ($data as $row => $value) :

           if ($conn->query($sql) == TRUE){
            $sqlDaBan="UPDATE  SANPHAM SET SP_SOLUONGDABAN= SP_SOLUONGDABAN-$value[SOLUONG]
            WHERE SP_MA ='$value[SP_MA]'";
             mysqli_query($conn,"$sqlDaBan");
            $sqlTon="UPDATE  SANPHAM SET SP_SOLUONGTON= SP_SOLUONGTON+$value[SOLUONG]
                  WHERE SP_MA ='$value[SP_MA]'";
             mysqli_query($conn,"$sqlTon");
           }
          
        endforeach;
 
       
       
        //neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
        header('Location: kh_donhang.php?TT_MA=1');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
                        
        
        $conn->close();
?>