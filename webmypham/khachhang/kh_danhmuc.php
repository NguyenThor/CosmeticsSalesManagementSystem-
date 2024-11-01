<?php
include 'inc/header.php';
//include 'inc/slider.php';
?>
    <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Cửa hàng</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link"> 
                            
                        </a>
                    </div>
                </div>
                <div class="main__sort">
                    <h3 class="sort__title">
                        Hiển thị kết quả theo
                    </h3>
                    <select class="sort__select"> name="" id="">
                        <option value="1">Thứ tự mặc định</option>
                        <option value="2">Mức độ phổ biến</option>
                        <option value="3">Điểm đánh giá</option>
                        <option value="4">Mới cập nhật</option>
                        <h><a href="giacao.php"><option value="5">Giá tăng dần</option></a><h>
                        <option href="giathap.php" value="6">Giá Thấp đến cao</option>
                    </select>
                </div>
            </div>

    <?php
       
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "mypham";
       $conn = new mysqli($servername, $username, $password, $dbname);

      
       $L_MA = $_GET['L_MA'];
       $sql = "select * from sanpham WHERE L_MA = '".$L_MA."'  ";


      
       $result = mysqli_query($conn, $sql);

       $data = [];
       $rowNum = 1;
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $data[] = array(
            'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
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
            <div class="productList">
                <div class="listProduct">
                    <div class="row">
                        <?php foreach ($data as $row) : ?>                           
                            <div class="col 1-2 m-2 s-4">                                   
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
                        
                       
                <div class="pagination">
                    <ul class="pagination__list">
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="pagination__item active">
                            <a href="listFilm.php" class="pagination__link">1</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">2</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">3</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">4</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">5</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">...</a>
                        </li>
                        <li class="pagination__item active">
                            <a href="listFilm.php" class="pagination__link">14</a>
                        </li>
                        <li class="pagination__item">
                            <a href="listFilm.php" class="pagination__link">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<?php
include 'inc/footer.php';
?>