<?php
include 'inc/header.php';
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
                        <div class="product__avt" style="background-image: url(image/addsp/<?php echo $row['SP_HINH']; ?>);">
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
                                <input class="minus is-form" type="button" value="-" onclick="minusProduct()">
                                <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
                                <input class="plus is-form" type="button" value="+" onclick="plusProduct()">
                            </div>
                            <div class=" btn btn--default orange ">Thêm vào giỏ</div>
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
                            <div class="tab-pane ">
                                <div class="productDes__ratting ">
                                    <div class="productDes__ratting-title ">Đánh giá của bạn</div>
                                    <div class="productDes__ratting-wrap">
                                        <div id="rating">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                            <input type="radio" id="star4half" name="rating" value="4 and a half" />
                                            <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                            <input type="radio" id="star3half" name="rating" value="3 and a half" />
                                            <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label class="full" for="star3" title="Meh - 3 stars"></label>

                                            <input type="radio" id="star2half" name="rating" value="2 and a half" />
                                            <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                            <input type="radio" id="star1half" name="rating" value="1 and a half" />
                                            <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                                            <input type="radio" id="starhalf" name="rating" value="half" />
                                            <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                        </div>
                                        <textarea class="ratecomment" name=" " id=" " cols="30 " rows="1" placeholder="Vui lòng viết đánh giá của bạn "></textarea>
                                    </div>
                                    <input type="submit " class="btn btn--default" value="Đánh giá">
                                </div>
                                <ul class="rate__list">
                                    <li class="rate__item">
                                        <div class="rate__info">
                                            <img src="https://lh3.googleusercontent.com/ogw/ADGmqu9PFgn_rHIm9i3eIlVr5RwzwY2w8EystHF213wj=s32-c-mo" alt="">
                                            <h3 class="rate__user">Giang Tuấn Phương</h3>
                                            <div class="rate__star">
                                                <div class="group-star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rate__comment">Sản phẩm chất lượng rất tốt thật tuyệt vời</div>
                                    </li>
                                    <li class="rate__item">
                                        <div class="rate__info">
                                            <img src="https://lh3.googleusercontent.com/ogw/ADGmqu9PFgn_rHIm9i3eIlVr5RwzwY2w8EystHF213wj=s32-c-mo" alt="">
                                            <h3 class="rate__user">Giang Tuấn Phương</h3>
                                            <div class="rate__star">

                                            </div>
                                        </div>
                                        <div class="rate__comment">Sản phẩm chất lượng rất tốt</div>
                                    </li>
                                    <li class="rate__item">
                                        <div class="rate__info">
                                            <img src="https://lh3.googleusercontent.com/ogw/ADGmqu9PFgn_rHIm9i3eIlVr5RwzwY2w8EystHF213wj=s32-c-mo" alt="">
                                            <h3 class="rate__user">Giang Tuấn Phương</h3>
                                            <div class="rate__star">

                                            </div>
                                        </div>
                                        <div class="rate__comment">Sản phẩm chất lượng rất tốt</div>
                                    </li>
                                </ul>
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
                            <a href="product.php?SP_MA=<?php echo $row['SP_MA'];?>"  class="product ">
                                <div class="product__avt " style="background-image: url(image/addsp/<?php echo $row1['SP_HINH']; ?>) ">
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
            </div>
        </div>
        <?php
include 'inc/footer.php';

?>