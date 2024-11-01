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
$b = $_COOKIE["kh_email"];

$timestamp = time();

$sql="INSERT INTO donhang (dh_ma
    ,dh_tongtienhang,
    dh_giamgia,
    dh_tongtienvanchuyen,
    dh_tongthanhtoan,
    dcnh_ma,
    kh_ma,
    dvvc_ma,
    pttt_ma,
    TT_MA,
    DH_GHICHU)
      VALUES ('$timestamp$a', 
      '".$_POST["TONGTIENHANG"] ."',
      '".$_POST["GIAMGIA"] ."',

      '".$_POST["TIENVANCHUYEN"] ."',
      '".$_POST["TONGTHANHTOAN"] ."',
      '".$_POST["DCNH_MA"] ."',
      '$a',
      'Giao hàng nhanh',
      '".$_POST["PTTT"] ."',
      '1',
      '".$_POST["DH_GHICHU"] ."'
      )
      ";


if ($conn->query($sql) == TRUE) {

  $sqlThem = " SELECT *
                FROM chitietgiohang a , sanpham b
                    WHERE a.SP_MA = b.SP_MA
                    AND a.GH_MA = '$b'";
               
			$result = mysqli_query($conn, $sqlThem);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'GH_MA' => $row['GH_MA'],
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

          $sql2="INSERT INTO CHITIETDONHANG (SP_MA,DH_MA,SOLUONG) VALUES ( '$value[SP_MA]',
          '$timestamp$a', '$value[SOLUONG]')";
           if ($conn->query($sql2) == TRUE){
            $sqlDaBan="UPDATE  SANPHAM SET SP_SOLUONGDABAN= SP_SOLUONGDABAN+$value[SOLUONG]
            WHERE SP_MA ='$value[SP_MA]'";
             mysqli_query($conn,"$sqlDaBan");
            $sqlTon="UPDATE  SANPHAM SET SP_SOLUONGTON= SP_SOLUONGTON-$value[SOLUONG]
                  WHERE SP_MA ='$value[SP_MA]'";
             mysqli_query($conn,"$sqlTon");
           }
          
        endforeach;
        $sqlU = "UPDATE giohang SET TIENHANG= '0',
        GIAMGIA =  '0',
         VANCHUYEN = '0', 
         THANHTOAN =  '0'
       Where GH_MA ='$b'";
         mysqli_query($conn,"$sqlU");
    $sql3="DELETE FROM CHITIETGIOHANG WHERE GH_MA='$b'";
    if ($conn->query($sql3) == TRUE)



    $pttt = $_POST["PTTT"];
    if($pttt==1) header('Location: dathangthanhcong.php');
    if($pttt==4) header('Location: vnpay/vnpay_pay.php?DH_MA='.$timestamp.$a);
    if($pttt==5) header('Location: momo/xulythanhtoanmomo.php?DH_MA='.$timestamp.$a);
    if($pttt==6) header('Location: momo/xulythanhtoanmomo-ATM.php?DH_MA='.$timestamp.$a);

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
          
          $conn->close();
          


?>