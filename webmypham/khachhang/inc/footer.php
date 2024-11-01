</div>
    <div class="footer" >
        <div class="grid wide">
            <div class="row">
                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Menu</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="#" class="footer__link">Trang chủ</a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">Giới thiệu</a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">Khuyến mãi</a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">Tin tức</a>
                        </li>
                       
                    </ul>
                </div>
                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Hỗ trợ khách hàng</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="#" class="footer__link">Hướng dẫn mua hàng</a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">Giải đáp thắc mắc</a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">Chính sách mua hàng</a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">Chính sách đổi trả</a>
                        </li>
                    </ul>
                </div>
                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Liên hệ</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <span class="footer__text">
                                    <i class="fas fa-map-marked-alt"></i> Số 123 Đường 3/2, Xuân Khánh, Ninh Kiều, TP.Cần Thơ
                                </span>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">
                                <i class="fas fa-phone"></i> 0909 999 999
                            </a>
                        </li>
                        <li class="footer__item">
                            <a href="#" class="footer__link">
                                <i class="fas fa-envelope"></i> nhom02@gmail.com
                            </a>
                        </li>
                        <li class="footer__item">
                            <div class="social-group">
                                <a href="#" class="social-item"><i class="fab fa-facebook-f"></i>
                                    </a>
                                <a href="#" class="social-item"><i class="fab fa-twitter"></i>
                                    </a>
                                <a href="#" class="social-item"><i class="fab fa-pinterest-p"></i>
                                    </a>
                                <a href="#" class="social-item"><i class="fab fa-invision"></i>
                                    </a>
                                <a href="#" class="social-item"><i class="fab fa-youtube"></i>  
                                    </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col l-3 m-6 s-12">
                    <h3 class="footer__title">Đăng kí</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <span class="footer__text">Đăng ký để nhận được được thông tin ưu đãi mới nhất từ chúng tôi.</span>
                        </li>
                        <li class="footer__item">
                            <div class="send-email">
                                <input class="send-email__input" type="email" placeholder="Nhập Email...">
                                <a href="#" class="send-email__link">
                                    <i class="fas fa-paper-plane"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span class="footer__text"> &copy Bản quyền thuộc về <a class="footer__link" href="#"> NHÓM 02</a></span>
        </div>
    </div>
    <!-- Modal Form -->
    <div class="ModalForm">
        <!--dia chi-->
        
        


        <!-- dang ky-->
        <div class="modal" id="my-Register">
            <a href="#" class="overlay-close"></a>
            <div class="authen-modal register">
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
                        $SP_MA=$_GET['SP_MA'];                                  
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
                <h3 class="authen-modal__title">Đánh Giá</h3>
                <form action="dangky.php" method="post" >
                <div class="form-group">
                    <label for="account" class="form-label">Họ Tên</label>
                    <input id="kh_ten" name="kh_ten" type="text" class="form-control">
                </div>

                <ul class="rate__list">
                    <?php foreach ($data3 as $row3 => $value) { ?>
                        <li class="rate__item">
                            <div class="rate__info">
                                <img src="https://lh3.googleusercontent.com/ogw/ADGmqu9PFgn_rHIm9i3eIlVr5RwzwY2w8EystHF213wj=s32-c-mo" alt="">
                                <h3 class="rate__user"><?= $value['KH_TEN'] ?></h3>
                                </div>
                            <div class="rate__comment"><?= $value['BINHLUAN']?></div>
                            <div style="padding-top: 8px;margin-left: 52px;"><?= $value['THOIGIAN']?></div>
                            <div class="rate__star">                                        
                            <?= $value['DG_TEN']?>
                                </div>
                        </li>
                        <?php } ?>
                        
                </ul>
                <br>
                <center> <input type="submit" value="Đăng ký" name="submit"  class="btn btn--default"> <center>
             
                </form>
            </div>
        </div>
        
        <div class=" modal" id="my-Login">
            <a href="#" class="overlay-close"></a>
            <div class="authen-modal login">
                <h3 class="authen-modal__title">Đăng Nhập</h3>
                <form action="dangnhap.php" method="post" >
                <div class="form-group">
            
                    <label for="kh_email" class="form-label">Email *</label>
                    <input id="kh_email" name="kh_email" type="text" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="kh_matkhau" class="form-label">Mật khẩu *</label>
                    <input id="kh_matkhau" name="kh_matkhau" type="password" class="form-control">
                    <span class="form-message"></span>
                </div>
               
                <center> <input type="submit" value="Đăng Nhập" name="submit"  class="btn btn--default"> <center>
</form  >
        <br>

                    <input type="checkbox" class="authen-checkbox">
                    <label class="form-label">Ghi nhớ mật khẩu</label>
                
                <a class="authen__link">Quên mật khẩu ?</a>
            </div>
        </div>
        <div class="up-top" id="upTop" onclick="goToTop()">
            <i class="fas fa-chevron-up"></i>
        </div>

    </div>
    <script>
        $('.owl-carousel.hight').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        $('.owl-carousel.news').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        })
        $('.owl-carousel.bands').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        })
    </script>
    <!-- Script common -->
    <script src="./assets/js/homeScript.js"></script>
    <script src="./assets/js/commonscript.js"></script>
</body>

</html>