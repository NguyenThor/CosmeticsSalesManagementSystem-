<?php
include 'inc/header.php';

?>
    <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                <div class="main__tabnine">
            <div class="grid wide">
                <!-- Tab items -->
                <div class="tabs">
                    <div class="tab-item active">
                        Bán Chạy
                    </div>
                    <div class="tab-item">
                        Giá tốt
                    </div>
                    <div class="tab-item">
                        Mới Nhập
                    </div>
                    <div class="line" style="left: 0px; width: 136px;"></div>
                </div>

    <?php
       
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "mypham";
       $conn = new mysqli($servername, $username, $password, $dbname);

      
       $sql = "select * from sanpham ";


      
       $result = mysqli_query($conn, $sql);

       $data = [];
       $rowNum = 1;
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $data[] = array(
               'rowNum' => $rowNum, 
               'SP_MA' => $row['SP_MA'],
               'SP_TEN' => $row['SP_TEN'],
               'SP_HINH' => $row['SP_HINH'],
               'SP_GIABAN' => $row['SP_GIABAN'],
               

           );
           $rowNum++;
       }
    ?>
                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                             <?php foreach ($data as $row) : ?>                           
                                <div class="col 1-2 m-2 s-3">                                   
                                    <div class="product">
                                        <div class="product__avt" style="background-image: url(../image/addsp/<?php echo $row['SP_HINH']; ?>);">
                                        </div>
                                        <div class="product__info">
                                            <h3 class="product__name"><?php echo $row['SP_TEN']; ?></h3>
                                            <div class="product__price">
                                                <div class="price__old">
                                                    300.000 đ
                                                </div>
                                                <div class="price__new"><?php echo number_format ($row['SP_GIABAN']); ?> <span class="price__unit">đ</span></div>
                                            </div>
                                            <div class="product__sale">
                                                <span class="product__sale-percent">24%%</span>
                                                <span class="product__sale-text">Giảm</span>
                                            </div>
                                        </div>
                                        <a href="kh_sanphamchitiet.php?SP_MA=<?php echo $row['SP_MA'];?>" class="viewDetail">Xem chi tiết</a>
                                        <a href="kh_giohangthem.php?SP_MA=<?php echo $row['SP_MA'];?>" class="addToCart">Thêm vào giỏ</a>
                                    </div>
                                    
                                </div>
                           <?php endforeach; ?>
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