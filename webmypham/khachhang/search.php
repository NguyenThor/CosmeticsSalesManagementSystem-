
<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
    <div class="main">
        <!-- Slider -->
        
        <!--Product Category -->
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

if ( isset($_POST['search']) ) {
  
  $k = $_POST['keyWord'];
  if($k ==""){
    echo "Vui long nhap vao thanh tim kiem";
  }else{
    
    $sql= "select * from sanpham  where SP_TEN like '%$k%'  ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count < 0){
      echo "Khong tim thay ket qua nao voi tu khoa, ". $k;

    }
  }

  }
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
        
        <?php foreach ($data as $row) : ?>
            
            
            <?php endforeach; ?>
      
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                        <?php foreach ($data as $row) : ?>                           
                                <div class="col 1 m-2 s-3">                                   
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
       
        <!-- Sales Policy -->
        

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