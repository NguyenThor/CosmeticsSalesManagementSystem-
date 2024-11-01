</div>
    <div class="footer">
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
        <div class="modal" id="my-Register">
            <a href="#" class="overlay-close"></a>
            <div class="authen-modal register">
                <h3 class="authen-modal__title">Đăng Kí</h3>
                <form action="dangky.php" method="post" >
                <div class="form-group">
                    <label for="account" class="form-label">Họ Tên</label>
                    <input id="kh_ten" name="kh_ten" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="kh_sdt" class="form-label">Số Điện Thoại*</label>
                    <input id="kh_sdt" name="kh_sdt" type="text" class="form-control">
              
                </div>
                <div class="form-group">
                    <label for="kh_email" class="form-label">Email*</label>
                    <input id="kh_email" name="kh_email" type="text" class="form-control">
                   
                </div>
                <div class="form-group">
                    <label for="kh_diachi" class="form-label">Địa Chỉ *</label>
                    <input id="kh_diachi" name="kh_diachi" type="text" class="form-control">
               
                </div>
                <div class="form-group">
                    <label for="kh_matkhau" class="form-label">Mật khẩu *</label>
                    <input id="kh_matkhau" name="kh_matkhau" type="password" class="form-control">
                   
                </div>
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