<!DOCTYPE html>
<html lang="en">
<!-- https://cocoshop.vn/ -->
<!-- http://mauweb.monamedia.net/vanihome/ -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng mỹ phẩm</title>
    <!-- Font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Icon fontanwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Reset css & grid sytem -->
    <link rel="stylesheet" href="./assets/css/library.css">
    <link href="./assets/owlCarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <!-- Layout -->
    <link rel="stylesheet" href="./assets/css/common.css">
    <!-- index -->
    <!-- <link href="./assets/css/home.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="./assets/css/cart.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/contact.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/new.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/product.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/pay.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/hot.css">
    <link rel="stylesheet" href="./assets/css/hotline.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl caroucel Js-->
    <script src="./assets/owlCarousel/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <script src="assets/owlCarousel/owl.carousel.min.js"></script>
    <!-- Owl Slider css -->
    <link rel="stylesheet" href="assets/owlCarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlCarousel/assets/owl.theme.default.min.css">



</head>
<body>
                <div class="main__slice">
                    <div class="slider">
                        <div class="slide active" style="background-image:url(image/background1.PNG)">
                            <div class="container">
                            
                            </div>
                        </div>
                        <div class="slide active" style="background-image:url(image/background2.PNG)">
                            <div class="container">
                            
                            </div>
                        </div>
                        <div class="slide active" style="background-image:url(image/background3.PNG)">
                            <div class="container">
                            
                            </div>
                        </div>
                    </div>
                    <!-- controls  -->
                    <div class="controls">
                        <div class="prev">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="next">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <!-- indicators -->
                    <div class="indicator">
                    </div>
                </div>
            
    <div class="header scrolling" id="myHeader">
        <div class="grid wide">
            <div class="header__top">
                <div class="navbar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="index.php" class="header__logo">
                    <img src="./image/logonew.png" width="250px" alt="">
                </a>
                <div class="header__search">
                    <div class="header__search-wrap">
                        <input type="text" class="header__search-input" placeholder="Tìm kiếm">
                        <a class="header__search-icon" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="header__account">
                    <a href="#my-Login" class="header__account-login">Đăng Nhập</a>
                    <a href="#my-Register" class="header__account-register">Đăng Kí</a>
                </div>
                
                <div class="header__cart have" href="#my-Login">
                    <i class="fas fa-shopping-basket"></i>
                 
                </div>
            </div>
        </div>
       <!-- Menu -->
        <div class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item nav__search">
                    <div class="nav__search-wrap">
                        <input class="nav__search-input" type="text" name="" id="" placeholder="Tìm sản phẩm...">
                    </div>
                    <div class="nav__search-btn">
                    <a href="#my-Login" class="header__account-login"> <i class="fas fa-search"></i></a>
                       
                    </div>
                </li>
                <li class="header__nav-item authen-form">
                    <a href="#" class="header__nav-link">Tài Khoản</a>
                    <ul class="sub-nav">
                        <li class="sub-nav__item">
                            <a href="#my-Login" class="sub-nav__link">Đăng Nhập</a>
                        </li>
                        <li class="sub-nav__item">
                            <a href="#my-Register" class="sub-nav__link">Đăng Kí</a>
                        </li>
                    </ul>
                </li>
                <li class="header__nav-item index">
                    <a href="index.php" class="header__nav-link">Trang chủ</a>
                </li>
                <li class="header__nav-item">
                    <a href="gioithieu.php" class="header__nav-link">Giới Thiệu</a>
                </li>
                <li class="header__nav-item">
                    <a href="sanpham.php" class="header__nav-link">Sản Phẩm</a>
                        <?php
                        
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "mypham";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        
                        $sql = "select * from loaihang ";


                        
                        $result = mysqli_query($conn, $sql);

                        $data = [];
                        $rowNum = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $data[] = array(
                                'rowNum' => $rowNum, 
                                'L_MA' => $row['L_MA'],
                                'L_TEN' => $row['L_TEN'],
                                

                            );
                            $rowNum++;
                        }
                        ?>
                    <div class="sub-nav-wrap grid wide">
                        <?php foreach ($data as $row) : ?>
                            <ul class="sub-nav">
                                <li class="sub-nav__item">
                                    <a href="listProduct.php?L_MA=<?php echo $row['L_MA']; ?>" class="sub-nav__link heading"><?php echo $row['L_TEN']; ?></a>
                                </li>
                            </ul>
                        <?php endforeach; ?>    
                        
                    </div>
                </li>
                
                <li class="header__nav-item">
                    <a href="tintuc.php" class="header__nav-link">Tin Tức</a>
                </li>
                <li class="header__nav-item">
                    <a href="contact.php" class="header__nav-link">Liên Hệ</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="float-contact">
            <button class="chat-zalo">
                <a href="http://zalo.me/01296140483"><img src="./image/hotline/zalo.png" width="40px" alt=""></a>
            </button>
            <button class="chat-face">
                <a href="https://www.facebook.com/250501nganne/"><img src="./image/hotline/mess.png" width="40px" alt=""></a>
            </button>
            <button class="hotline">
                <a href="tel:0909999999"><img src="./image/hotline/call.png" width="40px" alt=""></a>
            </button>
        </div>
    <link rel="stylesheet" href="./assets/css/hot.css">