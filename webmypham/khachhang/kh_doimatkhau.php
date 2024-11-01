<?php
include 'inc/header.php';
?>

<?php
   session_start();
   include './config/config.php';
   $KH_EMAIL = $_SESSION['kh_email'];
    $query="SELECT * FROM khachhang WHERE kh_email = '".$_SESSION['kh_email']."'";
    // $hanghoa = mysqli_query($conn, "SELECT * FROM loaihanghoa");
    $hh = mysqli_fetch_assoc($conn->query($query));
    if(isset($_POST['submit'])){
        $matkhaucu = md5($_POST["matkhaucu"]);
        $matkhaumoi = md5($_POST["matkhaumoi"]);
        $nhaplaimatkhaumoi = md5($_POST["nhaplaimatkhaumoi"]);
        $sql = "select * from khachhang where kh_email= '$KH_EMAIL' and KH_MATKHAU = '$matkhaucu'";
        $data = mysqli_query($conn,$sql);
        $query=mysqli_fetch_assoc($data);
       
        if(!$query){
            echo "<script language='javascript'>alert('Mật khẩu cũ bạn vừa nhập không đúng!')</script>";
            
        }
        else if($nhaplaimatkhaumoi!=$matkhaumoi){
            echo "<script language='javascript'>alert('Mật khẩu bạn nhập không trùng khớp')</script>";
        }
        else{
            $sql_update="UPDATE khachhang set KH_MATKHAU = '$matkhaumoi' where kh_email = '$kh_email'";
            $query1= mysqli_query($conn,$sql_update);
            if($query1){
                echo "<script language='javascript'>alert('Mật khẩu mới được cập nhật ')</script>";
                header("location:login.php");;
            }
        } 
    } 
?>


<div class="main">
   <div class="grid wide">
      <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="doimatkhau.php" class="breadcrumb__link">Thông tin cá nhân</a>
                    </div>
                </div>
            </div>
<!--        
            <div class="list-new">
                <div href="#" class="new-item">
                        <img src="./image/logonew.png" width="200px" alt="">
                    <h1>Chỉnh sửa trang cá nhân</h1>




                </div>
            </div>
        </div>
</div> -->
<?php
   // session_start();
   // include './config/config.php';
   // $KH_EMAIL = $_SESSION['KH_EMAIL'];
   //  $query="SELECT * FROM khachhang WHERE KH_EMAIL = '".$_SESSION['KH_EMAIL']."'";
   //  $hh = mysqli_fetch_assoc($conn->query($query));
   //  if(isset($_POST['submit'])){
   //      $matkhaucu = md5($_POST["matkhaucu"]);
   //      $matkhaumoi = md5($_POST["matkhaumoi"]);
   //      $nhaplaimatkhaumoi = md5($_POST["nhaplaimatkhaumoi"]);
   //      $sql = "select * from khachhang where KH_EMAIL= '$tendangnhap' and KH_MATKHAU = '$matkhaucu'";
   //      $data = mysqli_query($conn,$sql);
   //      $query=mysqli_fetch_assoc($data);
       
   //      if(!$query){
   //          echo "<script language='javascript'>alert('Mật khẩu cũ bạn vừa nhập không đúng!')</script>";
            
   //      }
   //      else if($nhaplaimatkhaumoi!=$matkhaumoi){
   //          echo "<script language='javascript'>alert('Mật khẩu bạn nhập không trùng khớp')</script>";
   //      }
   //      else{
   //          $sql_update="UPDATE khachhang set KH_MATKHAU = '$matkhaumoi' where KH_EMAIL = '$tendangnhap'";
   //          $query1= mysqli_query($conn,$sql_update);
   //          if($query1){
   //              echo "<script language='javascript'>alert('Mật khẩu mới được cập nhật ')</script>";
   //              header("location:login.php");;
   //          }
   //      }
   //  }
    
?>
<!DOCTYPE html>
<html lang="en">
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
    

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
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
                   
                        <form name="frmCreate" method="post" action="search.php" class="form">
                            <input type="text" class="header__search-input" name="keyWord"placeholder="Tìm kiếm">
                            <button style="margin-left: 150px; background-color: transparent; border: none;" name ="search" class="search"><i class="fa fa-search" style="font-size:20px ; color:white;"></i></button>
                        </from>
                     
                    </div>
                </div>
                <div class="header__account">
                    <a href="#my-Login" class="header__account-login">Đăng Nhập</a>
                    <a href="#my-Register" class="header__account-register">Đăng Ký</a>
                </div>
                <!-- Cart -->
                <div class="header__cart have" href="cart.php">
                    <i class="fas fa-shopping-basket"></i>
                    <div class="header__cart-amount">
                        3
                    </div>
                    <div class="header__cart-wrap">
                        <ul class="order__list">
                            <li class="item-order">
                                <div class="order-wrap">
                                    <a href="product.php" class="order-img">
                                        <img src="./assets/img/product/product1.jpg" alt="">
                                    </a>
                                    <div class="order-main">
                                        <a href="product.php" class="order-main-name">Áo sơ mi  caro kèm belt caro kèm belt Áo sơ mi caro kèm belt</a>
                                        <div class="order-main-price">2 x 45,000 ₫</div>
                                    </div>
                                    <a href="product.php" class="order-close"><i class="far fa-times-circle"></i></a>
                                </div>
                            </li>
                            <li class="item-order">
                                <div class="order-wrap">
                                    <a href="product.php" class="order-img">
                                        <img src="./assets/img/product/product1.jpg" alt="">
                                    </a>
                                    <div class="order-main">
                                        <a href="product.php" class="order-main-name">Áo sơ mi  caro kèm belt caro kèm belt Áo sơ mi caro kèm belt</a>
                                        <div class="order-main-price">2 x 45,000 ₫</div>
                                    </div>
                                    <a href="product.php" class="order-close"><i class="far fa-times-circle"></i></a>
                                </div>
                            </li>
                            <li class="item-order">
                                <div class="order-wrap">
                                    <a href="product.php" class="order-img">
                                        <img src="./assets/img/product/product1.jpg" alt="">
                                    </a>
                                    <div class="order-main">
                                        <a href="product.php" class="order-main-name">Áo sơ mi  caro kèm belt caro kèm belt Áo sơ mi caro kèm belt</a>
                                        <div class="order-main-price">2 x 45,000 ₫</div>
                                    </div>
                                    <a href="product.php" class="order-close"><i class="far fa-times-circle"></i></a>
                                </div>
                            </li>
                        </ul>
                        <div class="total-money">Tổng cộng: 120.000đ</div>
                        <a href="cart.php" class="btn btn--default cart-btn">Xem giỏ hàng</a>
                        <a href="pay.php" class="btn btn--default cart-btn orange">Thanh toán</a>
                        <!-- norcart -->
                        <!-- <img class="header__cart-img-nocart" src="http://www.giaybinhduong.com/images/empty-cart.png" alt=""> -->
                    </div>
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
                        <i class="fas fa-search"></i>
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

<div class="g1gd5utk swjo00u" style="--swjo00u-0:initial;--swjo00u-1:initial;--swjo00u-3:initial;--swjo00u-6:initial;--swjo00u-9:initial;--swjo00u-12:initial;--swjo00u-15:initial">
          <div class="withSpan snf9jyk" style="--snf9jyk-0:initial;--snf9jyk-1:initial;--snf9jyk-2:100%;--snf9jyk-4:initial;--snf9jyk-6:100%;--snf9jyk-8:initial;--snf9jyk-10:100%;--snf9jyk-12:initial;--snf9jyk-14:33.33333333333333%;--snf9jyk-16:initial;--snf9jyk-18:33.33333333333333%;--snf9jyk-20:initial">
          <div class="h5"><h5>Chỉnh sửa trang cá nhân</h5></div>
          <p class="trc72lf">
          <a href="user.php" rel="noreferrer"><br><img src="image/user.webp" width="16" height="16">Thông tin cá nhân</a><br>
              <a href="index.php" rel="noreferrer"><img src="image/logo.png" width="16" height="16">Thông tin mới nhất</a><br>
              <a href="doimatkhau.php" rel="noreferrer"><img src="image/key.png" width="16" height="16">Thay đổi mật khẩu</a><br>
            </p>
                     <span class="f6ete4">
            <div class="wsk6u1i" style="--wsk6u1i-0:24px;">
               <div class="t8i307c" style="--t8i307c-0:0;">
                  <div class="withGutter c29gcq6" style="--c29gcq6-0: initial; --c29gcq6-1:8px; --c29gcq6-4:-16px; --c29gcq6-5:-16px; --c29gcq6-9:16px; --c29gcq6-13: initial; --c29gcq6-14:8px; --c29gcq6-17:-16px; --c29gcq6-18:-16px; --c29gcq6-22:16px; --c29gcq6-26: initial; --c29gcq6-27:8px; --c29gcq6-30:-16px; --c29gcq6-31:-16px; --c29gcq6-35:16px; --c29gcq6-39: initial; --c29gcq6-40:8px; --c29gcq6-43:-16px; --c29gcq6-44:-16px; --c29gcq6-48:16px; --c29gcq6-52: initial; --c29gcq6-53:8px; --c29gcq6-56:-16px; --c29gcq6-57:-16px; --c29gcq6-61:16px;">
                     <div class="withRowCols swjo00u" style="--swjo00u-0:center; --swjo00u-1:flex-start; --swjo00u-3:100%; --swjo00u-6:100%; --swjo00u-9:50%; --swjo00u-12:33.3333%; --swjo00u-15:33.3333%;"></div>
                  </div>
               </div>
            </div>
         </span></div>
          <div class="withSpan snf9jyk" style="--snf9jyk-0:initial;--snf9jyk-1:initial;--snf9jyk-2:100%;--snf9jyk-4:initial;--snf9jyk-6:100%;--snf9jyk-8:initial;--snf9jyk-10:100%;--snf9jyk-12:initial;--snf9jyk-14:66.66666666666666%;--snf9jyk-16:initial;--snf9jyk-18:66.66666666666666%;--snf9jyk-20:initial">
            <div class="f1wri8l5">
               <form action="" method="post" enctype="multipart/form-data">
                  
   
   <div role="tabpanel" id="Liênhệ1" aria-labelledby="step-Liênhệ1" class="wizard-tab-container" style="">
   <div>
    <h2>THAY ĐỔI MẬT KHẨU</h2><br>
    <div class="grid-column">
            <div data-v-5d159d94="" class="form-group">
               <label data-v-5d159d94="" class="label-form">Tên Đăng Nhập <small data-v-5d159d94="" style="color: red;">*</small></label>
            <input data-v-5d159d94="" type="text" placeholder="Tên chưa cung cấp" name="name" class="form-control" disabled="" value="" fdprocessedid="kz5uz2k">
            </div>
         </div>
    <div class="grid-column">
            <div data-v-5d159d94="" class="form-group">
               <label data-v-5d159d94="" class="label-form">Nhập mật khẩu cũ <small data-v-5d159d94="" style="color: red;">*</small></label>
            <input data-v-5d159d94="" type="password" placeholder="Nhập mật khẩu cũ" name="matkhaucu" class="form-control" fdprocessedid="u4n1yf">
            </div>
         </div>
         <div class="grid-column">
            <div data-v-5d159d94="" class="form-group">
               <label data-v-5d159d94="" class="label-form">Nhập mật khẩu mới <small data-v-5d159d94="" style="color: red;">*</small></label>
            <input data-v-5d159d94="" type="password" placeholder="Nhập mật khẩu mới" name="matkhaumoi" class="form-control" fdprocessedid="rkzztq">
            </div>
         </div>
         <div class="grid-column grid-column-4 grid-xm-column-1" messages_error="[object Object]" value="[object Object]">
         <div class="form-group">
               <label class="label-form">
               Nhập lại mật khẩu mới
               </label>
               <small data-v-5d159d94="" style="color: red;">*</small>
               <input data-v-5d159d94="" type="password" placeholder="Nhập lại mật khẩu mới" name="nhaplaimatkhaumoi" class="form-control" fdprocessedid="s9w7vk">
               
            </div>
        </div>
    </div>
</div>              <br>
                  <div class="l6ks4td">
                        <div class="snf9jyk" style="--snf9jyk-0: initial; --snf9jyk-1: initial; --snf9jyk-2: initial; --snf9jyk-4: initial; --snf9jyk-6: initial; --snf9jyk-8: initial; --snf9jyk-10: initial; --snf9jyk-12: initial; --snf9jyk-14: initial; --snf9jyk-16: initial; --snf9jyk-18: initial; --snf9jyk-20: initial;"><button class="b1ek51v5 accent r-normal large w-normal i-left stretch" name="submit" id="submit" fdprocessedid="lzw6i">LƯU MẬT KHẨU</button></div>
                        </div>
                     </div>
                  </div>
         </div>
      </div>
   </div>
<?php
include 'inc/footer.php';
?>