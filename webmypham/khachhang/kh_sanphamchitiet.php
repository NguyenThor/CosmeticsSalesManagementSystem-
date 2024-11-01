<?php
include 'inc/header_chitiet.php';
//include 'inc/slider.php';
?>
<?php
       
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "mypham";
       $conn = new mysqli($servername, $username, $password, $dbname);

      
       $SP_MA = $_GET['SP_MA'];
       $sql = " SELECT * FROM sanpham a , loaihang b, thuonghieu c
            WHERE SP_MA = '".$SP_MA."'
            AND a.L_MA = b.L_MA
            AND a.TH_MA=c.TH_MA";


      
       $result = mysqli_query($conn, $sql);

       $data = [];
       $rowNum = 1;
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $data[] = array(
            'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
            'SP_MA' => $row['SP_MA'],
            'SP_TEN' => $row['SP_TEN'],
            'SP_HINH' => $row['SP_HINH'],
            'SP_CONGDUNG' => $row['SP_CONGDUNG'],
            'SP_THANHPHAN' => $row['SP_THANHPHAN'],
            'SP_TRONGLUONG' => $row['SP_TRONGLUONG'],
            'SP_DVT' => $row['SP_DVT'],
            'SP_GIABAN' => $row['SP_GIABAN'],
            'SP_SOLUONGTON' => $row['SP_SOLUONGTON'],
            'SP_SOLUONGDABAN' => $row['SP_SOLUONGDABAN'],
            'TH_TEN' => $row['TH_TEN'],
            'L_TEN' => $row['L_TEN'],
               

           );
           $rowNum++;
       }
       ?>
        <?php foreach ($data as $row) : ?>
            
            
            <?php endforeach; ?>
        
    <div class="main">
        <div class="grid wide">
            <div class="productInfo">
                <div class="row">
                    <div class="col l-5 m-8 s-1">
                        <div class="owl-carousel owl-theme" id="sync1">
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product1.jpg)">
                                </div>
                            </a>
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product1.jpg)">
                                </div>
                            </a>
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product2.jpg)">
                                </div>
                            </a>
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product3.jpg)">
                                </div>
                            </a>
                        </div>
                        <div class="owl-carousel owl-theme" id="sync2">
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product1.jpg)">
                                </div>
                            </a>
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product1.jpg)">
                                </div>
                            </a>
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product2.jpg)">
                                </div>
                            </a>
                            <a href="#" class="product">
                                <div class="product__avt" style="background-image: url(assets/img/product/product3.jpg)">
                                </div>
                            </a>
                        </div>
                        <div class="product">
                        <div class="product__avt" style="background-image: url(../image/addsp/<?php echo $row['SP_HINH']; ?>);">
                            </div>
                        </div>

                    </div>
                    <div class="col l-7 m-12s s-12 pl">
                        
                        <div class="main__breadcrumb">
                            <div class="breadcrumb__item">
                                <a href="#" class="breadcrumb__link">Trang chủ</a>
                            </div>
                            <div class="breadcrumb__item">
                                <a href="#" class="breadcrumb__link">Cửa hàng</a>
                            </div>
                            <div class="breadcrumb__item">
                                <a href="#" class="breadcrumb__link">Hãng DHC</a>
                            </div>
                        </div>
    
      
                        <h3 class="productInfo__name">
                        <?php echo $row['SP_TEN']; ?>
                        </h3>
                        <div class="productInfo__price">
                        <?php echo number_format ($row['SP_GIABAN']); ?> <span class="priceInfo__unit">đ</span>
                        </div>
                        <div class="productInfo__description">
                            <span> <?php echo $row['SP_DVT']; ?> </span> 
                            <span> <?php echo $row['SP_TRONGLUONG']; ?> </span> 
                        </div>

                        <div class="productInfo__addToCart">
                            <div class="buttons_added">

                                <form action="kh_themgiohang.php?SP_MA=<?= $row['SP_MA'] ?>" method="post" class="form-login" style="font-size:20px ">
                            
                                    Số Lượng: <input value="1" size="10"  style="font-size:20px " type="number" id="SOLUONG" name="SOLUONG" min="1" max="<?= $row['SP_SOLUONGTON'] ?>"  >
                                    
                                
                                    <input class=" btn btn--default orange " type="submit" value="Thêm Vào Giỏ Hàng">
                                
                                </form>
                                            
                            </div>          
                                      
                        </div>


                            
                        <div class="productIndfo__policy ">
                            <div class="policy bg-1 ">
                                <img src="./assets/img/policy/policy1.png " class="productIndfo__policy-img "></img>
                                <div class="productIndfo__policy-info ">
                                    <h3 class="productIndfo__policy-title ">Giao hàng miễn phí</h3>
                                    <p class="productIndfo__policy-description ">Cho đơn hàng từ 300K</p>
                                </div>
                            </div>
                            <div class="policy bg-2 ">
                                <img src="./assets/img/policy/policy2.png " class="productIndfo__policy-img "></img>
                                <div class="productIndfo__policy-info ">
                                    <h3 class="productIndfo__policy-title ">Giao hàng miễn phí</h3>
                                    <p class="productIndfo__policy-description ">Cho đơn hàng từ 300K</p>
                                </div>
                            </div>
                            <div class="policy bg-1 ">
                                <img src="./assets/img/policy/policy3.png " class="productIndfo__policy-img "></img>
                                <div class="productIndfo__policy-info ">
                                    <h3 class="productIndfo__policy-title ">Giao hàng miễn phí</h3>
                                    <p class="productIndfo__policy-description ">Cho đơn hàng từ 300K</p>
                                </div>
                            </div>
                            <div class="policy bg-2 ">
                                <img src="./assets/img/policy/policy4.png " class="productIndfo__policy-img "></img>
                                <div class="productIndfo__policy-info ">
                                    <h3 class="productIndfo__policy-title ">Giao hàng miễn phí</h3>
                                    <p class="productIndfo__policy-description ">Cho đơn hàng từ 300K</p>
                                </div>
                            </div>
                        </div>
                        <div class="productIndfo__category ">
                            <p class="productIndfo__category-text"> Danh mục : <a href="# " class="productIndfo__category-link "><?php echo $row['L_TEN']; ?></a></p>
                            <p class="productIndfo__category-text"> Hãng : <a href="# " class="productIndfo__category-link "><?php echo $row['TH_TEN']; ?></a></p>
                            <p class="productIndfo__category-text"> Số lượng đã bán : <?php echo $row['SP_SOLUONGDABAN']; ?></p>
                            <p class="productIndfo__category-text"> Số lượng trong kho : <?php echo $row['SP_SOLUONGTON']; ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="productDetail ">
                <div class="main__tabnine ">
                    <div class="grid wide ">
                        <!-- Tab items -->
                        <div class="tabs ">
                            <div class="tab-item active ">
                                Mô tả
                            </div>
                            <div class="tab-item ">
                                Đánh giá
                            </div>
                            <div class="line "></div>
                        </div>
                        <!-- Tab content -->
                        <div class="tab-content ">
                            <div class="tab-pane active ">
                                <div class="productDes ">
                                    <div class="productDes__title ">Công Dụng Sản Phẩm</div>
                                    <p class="productDes__text "> <a href="# " class="productDes__link "><?php echo $row['SP_TEN']; ?></a> <?php echo $row['SP_CONGDUNG']; ?>
                                    </p>
                                    <div class="productDes__title ">Thành Phần Sản Phẩm</div>
                                    <p class="productDes__text "> <a href="# " class="productDes__link "> </a> <?php echo $row['SP_THANHPHAN']; ?>
                                    </p>
                                </div>
                            </div>
                            <form  action="danhgia.php?SP_MA=<?= $row['SP_MA'] ?>" method="post">
                            <div class="tab-pane ">
                                <div class="productDes__ratting ">
                                    <div class="productDes__ratting-title ">Đánh giá của bạn</div><br>
                                    <div class="productDes__ratting-wrap">
                                         
                                    <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password ="";
                                        $dbname = "mypham";

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql2 = "select * from danhgia";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                            $data2[] = array(
                                            'DG_MA' => $row2['DG_MA'],
                                            'DG_TEN' => $row2['DG_TEN'],
                                            );
                                        }
                                        ?> 
                                         
                                         <select style="margin-left:90px;width:150px;font-size:15px;text-align:center;"  name="DG_MA" id="DG_MA">
                                                    <option>--Chọn--</option>
                                        <?php foreach ($data2 as $row2) : ?>
                                        
                                                <option style="color: #FFD700;" value="<?php echo $row2['DG_MA'];?>"><?php echo $row2['DG_TEN']; ?></option>
                                                <?php endforeach; ?>
                                        </select>

                                        <textarea class="ratecomment" name="BINHLUAN" id="BINHLUAN" cols="30 " rows="1" placeholder="Vui lòng viết đánh giá của bạn "></textarea>
                                    </div>
                                    <input style="margin-left:500px;" type="submit" class="btn btn--default" value="Đánh giá">
                                </div>
                            </form>
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
                                    $sql3 = " SELECT * FROM chitietdanhgia a, khachhang b, sanpham c, danhgia d
                                    where a.KH_MA = b.KH_MA
                                    and a.SP_MA = c.SP_MA
                                    and a.SP_MA = '".$SP_MA."'
                                    and a.DG_MA= d.DG_MA ";    
                                
                                    $result3 = mysqli_query($conn, $sql3);
                                
                                    $data3= [];
                                $rowNum = 1;
                                while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                                    $data3[] = array(
                                        'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                                        'BINHLUAN' => $row3['BINHLUAN'],
                                        'THOIGIAN' => $row3['THOIGIAN'],
                                        'KH_TEN' => $row3['KH_TEN'],
                                        'DG_TEN' => $row3['DG_TEN'],
                                        'SP_MA' => $row3['SP_MA'],                                 
                                    );
                                    $rowNum++;
                                    
                                }
                                    ?>
                                                                                                                        
                                <ul class="rate__list">
                                <?php foreach ($data3 as $row3 => $value) { ?>
                                    <li class="rate__item">
                                        <div class="rate__info">
                                            <img src="https://lh3.googleusercontent.com/ogw/ADGmqu9PFgn_rHIm9i3eIlVr5RwzwY2w8EystHF213wj=s32-c-mo" alt="">
                                            <h3 class="rate__user"><?= $value['KH_TEN'] ?></h3>
                                         </div>
                                        <div class="rate__comment"><?= $value['BINHLUAN']?></div>
                                        <div style="padding-top: 8px;margin-left: 52px;"><?= $value['THOIGIAN']?></div>
                                        <div class="rate__star" style="border-bottom: 2px solid gainsboro;font-size:16px;padding: 8px 0 8px 0;margin-left: 52px;color: rgb(240, 240, 59);">                                        
                                        <?= $value['DG_TEN']?>
                                         </div>
                                    </li>
                                    <?php } ?>
                                   
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
       
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "mypham";
       $conn = new mysqli($servername, $username, $password, $dbname);
       $SP = $_GET['SP_MA'];
        $sql1 = " SELECT *FROM sanpham WHERE L_MA IN (SELECT L_MA FROM sanpham WHERE SP_MA ='$SP')";

      
       $result1 = mysqli_query($conn, $sql1);

       $data1 = [];
       $rowNum = 1;
       while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
           $data1[] = array(
               'rowNum' => $rowNum, 
               'SP_MA' => $row1['SP_MA'],
               'SP_TEN' => $row1['SP_TEN'],
               'SP_HINH' => $row1['SP_HINH'],
               'SP_GIABAN' => $row1['SP_GIABAN'],
               

           );
           $rowNum++;
       }
    ?>
    <?php foreach ($data1 as $row1) : ?>
            
            
            <?php endforeach; ?>
        

            <div class="main__frame ">
                <div class="grid wide ">
                    
                    <h3 class="category__heading ">Sản Phẩm Tương tự</h3>                                           
                    <div class="owl-carousel hight owl-theme ">
                        <?php foreach ($data1 as $row1) : ?>  
                            <a href="# " class="product ">
                                <div class="product__avt " style="background-image: url(../image/addsp/<?php echo $row1['SP_HINH']; ?>) ">
                                </div>
                                <div class="product__info">
                                    <h3 class="product__name"><?php echo $row1['SP_TEN']; ?></h3>
                                    <div class="product__price">
                                        
                                        <div class="price__new"><?php echo number_format ($row1['SP_GIABAN']); ?> <span class="price__unit">đ</span></div>
                                    </div>
                                    
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    
                </div>
            </div
        </div>
        <?php
include 'inc/footer.php';

?>