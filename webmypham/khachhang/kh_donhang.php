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
                            $dbname = "mypham";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $a = $_COOKIE["kh_ma"];
                            $TT_MA= $_GET["TT_MA"];

                            $sql = " SELECT * FROM donhang a, khachhang b,
                           phuongthucthanhtoan d , trangthai e, diachinhanhang f
                                    where a.KH_MA=b.KH_MA
                              
                                    AND a.DCNH_MA =f.DCNH_MA
                                    AND a.PTTT_MA = d.PTTT_MA
                                    AND a.TT_MA=e.TT_MA
                                    AND a.KH_MA = '$a'
                                    AND a.TT_MA='$TT_MA'";
                                
                            
                            $result = mysqli_query($conn, $sql);

                            $data = [];
                        $rowNum = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $data[] = array(
                                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                'DH_MA' => $row['DH_MA'],
                                'DH_NGAYDAT' => $row['DH_NGAYDAT'],
                                'DCNH_DIACHI' => $row['DCNH_DIACHI'],
                                'DVVC_MA' => $row['DVVC_MA'],
                                'DCNH_XA' => $row['DCNH_XA'],
                                'DCNH_HUYEN' => $row['DCNH_HUYEN'],
                                'DCNH_TINH' => $row['DCNH_TINH'],
                                'DH_TONGTHANHTOAN' => $row['DH_TONGTHANHTOAN'],
                                'DCNH_MA' => $row['DCNH_MA'],
                                'KH_TEN' => $row['KH_TEN'],
                             
                                'PTTT_MA' => $row['PTTT_MA'],
                                'PTTT_TEN' => $row['PTTT_TEN'],
                                'TT_MA' => $row['TT_MA'],                                
                                'TT_TEN' => $row['TT_TEN'],                                
                                
                            );
                        
                            $rowNum++;
                        }


                            ?>

                            
                
            </h3>
            <div class="row">

                <div class="col l-12 m-12 s-12">
                    <div class="main__cart">
                        <form method="POST">

                            <div class="row title" >

                                <div class="col l-2 m-1 s-0">Mã Đơn</div>
                                <div class="col l-2 m-2 s-0">Tổng Tiền</div>
                                <div class="col l-2 m-2 s-0">Vận Chuyển</div>
                                <div class="col l-3 m-3 s-0">Phương Thức Thanh Toán</div>
                                <div class="col l-3 m-3 s-0">Địa chỉ nhận hàng</div>
                              
                                
                            </div>
                            
                            <?php foreach ($data as $row) : ?>
                                <div class="row item">
                                    
                                    <div class="col l-2 m-1 s-0">
                                         <div class="main__cart-product">                                            
                                               <div class="name"  ><?php echo $row['DH_MA'] ?><br>
                                               <div style="color: darkgray;" >Ngày Đặt: <?php echo $row['DH_NGAYDAT'] ?> </div>
                                              </div>
                                          </div>
                                    </div>

                                    
                                    <div class="col l-2 m-2 s-0">
                                        <div class="main__cart-product">                                            
                                            <div class="name"><?php echo number_format($row['DH_TONGTHANHTOAN']) ?>  VNĐ</div>
                                        </div>
                                    </div>

                                    <div class="col l-2 m-2 s-0">
                                        <div class="main__cart-product">                                            
                                            <div class="name"><?php echo  $row['DVVC_MA'] ?></div>
                                        </div>
                                    </div>

                                    <div class="col l-3 m-3 s-8">
                                        <div class="main__cart-product">                                            
                                            <div class="name"><?php echo $row['PTTT_TEN'] ?></div>
                                        </div>
                                    </div>

                                    <div class="col l-2 m-2 s-0">
                                        <div class="main__cart-product">                                            
                                            <div class="name" style="font-size">
                                            <?php echo $row['DCNH_DIACHI'];?>,
                                            <?php echo $row['DCNH_XA'];?>, 
                                            <?php echo $row['DCNH_HUYEN'];?>, 
                                            
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="col l-4 m-4 s-0" style="font-size:14px; margin-bottom:10px">
                                        <td > <img src="../image/giaohang.png" width="30" height="30"> 
                                        <?php echo $row['TT_TEN'];?></td>
                                    
                                  
                                    </div> 
                                    <div class="col l-3 m-3 s-0" >

                                        <div class="main__cart-product name" style="font-size:14px; margin-bottom:10px">                                            
                                            <a  href="kh_donhangchitiet.php?DH_MA=<?php echo $row['DH_MA'] ?>">Xem chi tiết đơn hàng</a>
                                        </div>
                                    </div>

                                    <div class="col l-2 m-2 s-0" >
                                    <a  href="kh_donhanghuy.php?DH_MA=<?php echo $row['DH_MA'] ?>">
                                    <?php 
                                     if($row['TT_MA']==1){
                                        echo '<div class="main__cart-product name" style="font-size:14px; margin-bottom:10px">                                            
                                            Hủy đơn hàng
                                        </div>';
                                    }
                                    ?>
                                    </a>
                                        
   
                                    </div> 
                                                                         
                                          
                                                        
                                    
                                    
                                </div>
                               
                            <?php endforeach; ?>

                            
                        </form>    
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
 <?php
include 'inc/footer.php';
?>
   