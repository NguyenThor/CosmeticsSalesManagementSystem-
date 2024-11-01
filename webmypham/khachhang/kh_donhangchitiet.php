<?php
include 'inc/header_donhang.php';
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
                                $DH_MA = $_GET['DH_MA'];
                                $sql = " SELECT *
                                    FROM chitietdonhang a , sanpham b, donhang c
                                        WHERE a.SP_MA = b.SP_MA
                                        AND a.DH_MA=c.DH_MA
                                        AND a.DH_MA = '$DH_MA'";
                                
                                $result = mysqli_query($conn, $sql);

                                $data= [];
                            $rowNum = 1;
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $data[] = array(
                                    'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                    'DH_MA' => $row['DH_MA'],
                                    'TT_MA' => $row['TT_MA'],
                                    'ID' => $row['ID'],
                                    'SP_MA' => $row['SP_MA'],
                                    'SP_TEN' => $row['SP_TEN'],
                                    'SP_HINH'  => $row['SP_HINH'],
                                    'SP_GIABAN'  => $row['SP_GIABAN'],
                                    'SOLUONG'  => $row['SOLUONG'],
                                    'SP_SOLUONGTON'  => $row['SP_SOLUONGTON'],
                                    'DH_GHICHU'  => $row['DH_GHICHU'],
                                    'DH_TONGTIENVANCHUYEN' => $row['DH_TONGTIENVANCHUYEN'],
                                    'DH_TONGTHANHTOAN' => $row['DH_TONGTHANHTOAN'],
                                    'DH_GIAMGIA' => $row['DH_GIAMGIA'],
                                    'DG_TT' => $row['DG_TT'],

                                );
                                $rowNum++;
                            }
                                ?>
                
            </h3>
            <div class="row">

                <div class="col l-8 m-12 s-12">
                    <div class="main__cart">
                        <form method="POST" action="">
                            <div class="row title">
                                <div class="col l-4 m-4 s-8">Sản phẩm</div>
                                <div class="col l-2 m-2 s-0">Đơn giá</div>
                                <div class="col l-2 m-2 s-0">Số lượng</div>
                                <div class="col l-2 m-2 s-4">Tổng</div>

                            </div>
                            <?php foreach ($data as $row) : ?>
                            <div class="row item">
                                <form action="kh_themgiohang.php" method="post">
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
                                    <div class="main__cart-price">
                                   x <?php echo $row['SOLUONG']; ?> </DIV>
                                           
                                    </div>

                                    <div class="col l-2 m-2 s-4">
                                        <div class="main__cart-price"> <?php echo number_format($tong=(($row['SP_GIABAN'] * $row['SOLUONG'])) ); ?></div>    
                                    </div>
                                    <div class="col l-2 m-2 s-0">
                                        <div class="main__cart-price">                                            
                                        <?php 
                                                    if($row['TT_MA']==4 && $row['DG_TT']==0){
                                                        echo '<p><a class="btn btn--default" style="font-size:14px; margin-bottom:10px" href="danhgia.php?SP_MA='.$row['SP_MA'].'">Đánh Giá</a></p>';

                                                    }
                                                    else if($row['TT_MA']==4 && $row['DG_TT']==1){
                                                        echo '<p><a class="btn btn--default " style="pointer-events: none;font-size:14px; margin-bottom:10px;background-color:rgb(255, 145, 0);" href="danhgia.php?SP_MA='.$row['SP_MA'].'">Đã Đánh Giá</a></p>';

                                                    }

                                        ?>

                                        
                                        
                                           
                                            
                                        </div>
                                    </div>


                                   
                            </div>
                                            <?php global $Tien;
                                                number_format($Tien += $tong);
                                            ?>
                                        
                                    
                                    <?php endforeach; ?>
                                        <a href="kh_giohangthem.php?SP_MA=<?php echo $row['SP_MA'];?>"  >
                                        <?php 
                                            if($row['TT_MA']==4){
                                                echo '<div class="btn btn--default" style="font-size:14px; margin-bottom:10px">                                            
                                            Mua Lại
                                                </div>';
                                            }
                                        ?></a>
                             
                           
                        </form>    
                    </div>
                </div>
                
                <div class="col l-4 m-12 s-12">
                    <div class="main__pay">
                        <div class="main__pay-title">Tổng số lượng</div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Tiền Hàng</div>
                            <div class="main__pay-price">
                        
                            <?= number_format ($Tien);?>
                            </div>
                        </div>                     
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Tiền Vận Chuyển</div>            
                            <div class="main__pay-price">
                            <?php echo number_format($row['DH_TONGTIENVANCHUYEN']); ?>
                            </div>
                        </div>                      
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Tổng Giảm Giá</div>
                            <div class="main__pay-price">
                            <?php echo number_format($row['DH_GIAMGIA']); ?>
                            </div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Tổng Thành Tiền</div>
                            <div class="main__pay-price">
                            <?php echo number_format($row['DH_TONGTHANHTOAN']); ?>
                            </div>
                        </div>
                        <div class="pay-info">
                            <div class="main__pay-text">
                                Ghi Chú</div>            
                            <div class="main__pay-text">
                            <?php echo $row['DH_GHICHU']; ?>
                            </div>
                        </div>
                    
                      
                
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php
include 'inc/footer.php';
?>
   