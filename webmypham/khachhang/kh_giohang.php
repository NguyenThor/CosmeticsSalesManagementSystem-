<?php
include 'inc/header_chitiet.php';
//include 'inc/slider.php';
?>
    <div class="main">
        <div class="grid wide">
            <h3 class="main__notify">
                <div class="main__notify-icon">
                  
                    <!-- <i class="fas fa-times"></i> -->
                </div>

                <?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "MYPHAM";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
            $a = $_COOKIE["kh_email"];
            $sql = " SELECT *
                FROM chitietgiohang a , sanpham b
                    WHERE a.SP_MA = b.SP_MA
                    AND a.GH_MA = '$a'";
               
			$result = mysqli_query($conn, $sql);

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
            $rowNum++;
        }
            ?>
                
            </h3>
            <div class="row">

                <div class="col l-8 m-12 s-12">
                    <div class="main__cart">
                    <div class="row title">
                                
                                <div class="col l-4 m-4 s-8">Sản phẩm</div>
                                <div class="col l-2 m-2 s-0">Đơn Giá</div>
                                <div class="col l-2 m-2 s-0">Số lượng</div>
                                <div class="col l-2 m-2 s-4">Tổng</div>
                                <div class="col l-1 m-1 s-0">Xóa</div>
                            </div>
                        <form method="POST" action="kh_capnhatgiohang.php">
                           
                            <?php foreach ($data as $row) : ?>
                                <input type="hidden" id="ID" name="ID"  value="<?php echo $row['ID']; ?>">
                                <input type="hidden" id="ID" name="ID"  value="<?php echo $row['ID']; ?>">
                                <div class="row item">
                                    
                                    <div class="col l-4 m-4 s-8">
                                        <div class="main__cart-product">
                                            <img src="../image/addsp/<?php echo $row['SP_HINH']; ?>" alt="">
                                            <div class="name"><?php echo $row['SP_TEN']; ?></div>
                                            
                                        </div>
                                    </div>
                                    <div class="col l-2 m-2 s-0">
                                        <div class="main__cart-price"><?php echo number_format($row['SP_GIABAN']); ?></div>
                                    </div>
                                    <div class="col l-2 m-2 s-0">
                                    <div class="buttons_added">
                                    <input type="hidden" id="SOLUONG" name="SOLUONG"  value="<?php echo $row['SOLUONG']; ?>">
                                    <a href="kh_giohangtru.php?ID=<?php echo $row['ID']; ?>" >
                                     <input class="minus is-form" type="button" value="-" onclick="minusProduct()" ></a>

                                    
                                     <input aria-label="quantity" class="input-qty" max="<?php echo $row['SP_SOLUONGTON']; ?>" min="1" name="" type="number" value="<?php echo $row['SOLUONG']; ?>">
                                     <a href="kh_giohangcong.php?ID=<?php echo $row['ID']; ?>" >
                                     <input class="plus is-form" type="button" value="+" onclick="plusProduct()" > </a>
                                </div>
                                </div>

                                    <div class="col l-2 m-2 s-4">
                                        <div class="main__cart-price"> <?php echo number_format($tong=(($row['SP_GIABAN'] * $row['SOLUONG'])) ); ?></div>
                                    </div>
                                    <div class="col l-1 m-1 s-0">
                                        <span class="main__cart-icon">
                                        <a href="kh_giohangxoa.php?ID=<?php echo $row['ID']; ?>" > <i class="far fa-times-circle "></i></a>
                                    </span>
                                    </div>
                                </div>
                                <?php global $Tien;
                                            number_format($Tien += $tong);
                                        ?>
                                    
                            <?php endforeach; ?>

                            <div >
                         
                            </div>
                        </form>    
                    </div>
                </div>
                
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
                            $kh_email = $_COOKIE["kh_email"];

                            $sqlTH = "select  COUNT(id) as th 
                            from giohang a, chitietgiohang b where a.GH_MA = '$kh_email' and
                            a.GH_MA = b.GH_MA";
                        
                            $resultTH = mysqli_query($conn, $sqlTH);
                            $rowTH = mysqli_fetch_array($resultTH, MYSQLI_ASSOC);

                            
                    ?>
                    <div class="col l-4 m-12 s-12">
                    <div class="main__pay">
                    <div class="main__pay-title">Tổng số lượng</div>
                    
                                        
                    <form  method="post">
                    <div class="pay-info">
                            <div class="main__pay-text">
                                Tiền Hàng</div>
                                <?php 
                                global $Tien;

                                     if($rowTH['th']>=1){
                                        echo ' <div class="main__pay-price"> 
                                        <input type="hidden" class="form-control" id="TIENHANG" name="TIENHANG" value="'
                                        .number_format ($Tien).'">'.number_format ($Tien).'</div>';
                                    }
                                    ?>

                        </div>
                        
                        <div class="main__pay-title">Phiếu ưu đãi</div>
                        <input type="text" class="form-control" id="KIEMTRA" name="KIEMTRA">
                        <button class="btn btn--default" name="ApDung" >Áp dụng </button>
                                </form>
                           
                        <?php
                            if (isset($_POST['ApDung'])) {
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
                            $sql = "SELECT count(km_ma) as giatri ,km_ma,KM_GIATRI from KHUYENMAI WHERE KM_MA = '".$_POST["KIEMTRA"] ."'";
                            $result = mysqli_query($conn,$sql); 
                            $row = mysqli_fetch_assoc($result);
                            
                            if($row["giatri"]==1 && $Tien >=500000 ){
                                $a =(INT)$_POST["TIENHANG"]*1000;
                                $b =$row["KM_GIATRI"];
                                $c =((INT)$a * ($row['KM_GIATRI'] / 100));
                                $d =((INT)$a - $c);


                                
                                //  header('Location: kh_giohang.php');
                                echo'<br><B>Giảm Giá:' .$b.'% <BR>';


                               
                            }
                            else  if($row["giatri"]==1 && $Tien <500000 ){
                                $a =(INT)$_POST["TIENHANG"]*1000;
                                $c = 0;
                                $d = $a;

                                echo'Mã Giảm Giá Không Hợp Lệ';
                            }
                            
                            
                                $conn->close();


                            }
                        ?>
<form action="tienthanhtoan.php" method="post">  
 <input type="hidden" class="form-control" id="TIENHANG" name="TIENHANG" value="<?php echo''.$Tien ?>">
<div class="pay-info">
    <div class="main__pay-text">Tổng Giảm Giá</div>
    <div class="main__pay-price" id="discount-amount">
    <input type="hidden" id="TONGGIAMGIA" name="TONGGIAMGIA" value="
    <?php 
     if(isset($_POST['ApDung'])){
        if($row["giatri"]==1){
    echo' '.$c;}
        else echo'0';
     }
     else echo'0';
     ?>
     ">
     
    <?php 
     if(isset($_POST['ApDung'])){
        if($row["giatri"]==1){
    echo' '.number_format($c);}
        else echo'0';
     }
     else echo'0';
     ?>

</div>
</div>




<div class="pay-info">
    <div class="main__pay-text">Tổng Thành Tiền</div>
    <div class="main__pay-price" id="total-amount">
    <input type="hidden" id="THANHTOAN" name="THANHTOAN" value="
    <?php 
     if(isset($_POST['ApDung'])){
        if($row["giatri"]==1){
    echo' '.$d;}

    else echo''.$Tien;
     }
        else echo''.$Tien;
     ?>
     ">

    <?php 
     if(isset($_POST['ApDung'])){
        if($row["giatri"]==1){
    echo' '.number_format($d);}

    else echo''.number_format ($Tien);
     }
        else echo''.number_format ($Tien);
     ?>

</div>
</div>


   <input type="submit" value="TIẾN THÀNH THANH TOÁN"  class="btn btn--default">

    </form  >




                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php
include 'inc/footer.php';
?>
   