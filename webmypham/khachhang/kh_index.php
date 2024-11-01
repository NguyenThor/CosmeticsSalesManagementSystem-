<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
    
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
                    <div class="line"></div>
                </div>
                <!-- Tab content -->
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
                                               
                                                <div class="price__new"><?php echo number_format ($row['SP_GIABAN']); ?> <span class="price__unit">đ</span></div>
                                            </div>
                                            <div class="product__sale">
                                                <span class="product__sale-percent">Chính hãng</span>
                                                
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
        
        <!-- Sales Policy -->
        <div class="main__policy">
            <div class="row">
                <div class="col l-3 m-6">
                    <div class="policy bg-1">
                        <img src="./assets/img/policy/policy1.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">GIAO HÀNG MIỄN PHÍ</h3>
                            <p class="policy__description">Cho đơn hàng từ 300K</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-2">
                        <img src="./assets/img/policy/policy2.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">ĐỔI TRẢ HÀNG</h3>
                            <p class="policy__description">Trong 3 ngày đầu tiên</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-1">
                        <img src="./assets/img/policy/policy3.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">HÀNG CHÍNH HÃNG</h3>
                            <p class="policy__description">Cam kết chất lượng</p>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-6">
                    <div class="policy bg-2">
                        <img src="./assets/img/policy/policy4.png" class="policy__img"></img>
                        <div class="policy__info">
                            <h3 class="policy__title">TƯ VẤN 24/24</h3>
                            <p class="policy__description">Giải đáp mọi thắc mắc</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- News -->
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
                $sql1 = "select * from baiviet";
            
            
                $result1 = mysqli_query($conn, $sql1);
            
                $data1 = [];
            $rowNum = 1;
            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                $data1[] = array(
                    'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                    'BV_MA' => $row1['BV_MA'],
                    'BV_TEN' => $row1['BV_TEN'],
                    'BV_MOTANGAN' => $row1['BV_MOTANGAN'],
                    'BV_NOIDUNG' => $row1['BV_NOIDUNG'],
                    'BV_NGAYDANG' => $row1['BV_NGAYDANG'],
                    'BV_HINH' => $row1['BV_HINH'],
                
                );
                $rowNum++;
                
            }

        ?>
        
            <div class="main__frame ">
                <div class="grid wide">
                    <h3 class="category__title">Hana Cometics</h3>
                    <h3 class="category__heading">Tin Tức</h3>                  
                    <div class="owl-carousel news owl-theme"> 
                        <?php foreach ($data1 as $row1 => $value) { ?>
                            <a href="kh_tintucchitiet.php?BV_MA=<?= $value['BV_MA'] ?>"class="news">
                                <div class="news__img">
                                <img src="../image/post/<?= $value['BV_HINH'] ?>" alt="">
                                </div>
                                <div class="news__body">
                                    <h3 class="news__body-title"> <?= $value['BV_TEN'] ?></h3>
                                    <div class="new__body-date"><?= $value['BV_NGAYDANG'] ?></div>
                                    <p class="news__description">
                                        <?= $value['BV_MOTANGAN'] ?> 
                                    </p>
                                </div>
                            </a>
                        <?php } ?> 
                    </div>
                     
                </div>
                
            </div>
            <br><br>
      
        <div class="main__bands">
            <div class="grid wide">
                <div class="owl-carousel bands">
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band1.png)"></a>
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band2.png)"></a>
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band3.png)"></a>
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band4.png)"></a>
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band5.png)"></a>
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band6.png)"></a>
                    <a href="listProduct.php" class="band__item" style="background-image: url(./assets/img/band/band7.png)"></a>
                </div>
            </div>
        </div>

<?php
include 'inc/footer.php';

?>