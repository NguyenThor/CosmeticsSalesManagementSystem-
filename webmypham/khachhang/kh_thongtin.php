<?php
include 'inc/header_chitiet.php';
//include 'inc/slider.php';
?>
    <div class="main">
        <div class="grid wide">
            <div class="main__breadcrumb">
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Trang chủ</a>
                </div>
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Giới thiệu</a>
                </div>
            </div>


                    
            <?php
       
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "mypham";
       $conn = new mysqli($servername, $username, $password, $dbname);

       $kh_ma = $_COOKIE['kh_ma'];
       $sql = "select * from khachhang where kh_ma = '$kh_ma'";
      
       $result = mysqli_query($conn, $sql);

       $data = [];
       $rowNum = 1;
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $data[] = array(
            'rowNum' => $rowNum, 
            'KH_MA' => $row['KH_MA'],
            'KH_TEN' => $row['KH_TEN'],
            'KH_SDT' => $row['KH_SDT'],
            'KH_EMAIL' => $row['KH_EMAIL'],
            'KH_DIACHI' => $row['KH_DIACHI'],
            'KH_MATKHAU' => $row['KH_MATKHAU'],
              
               
           );
           $rowNum++;
       }
       ?>

            <div class="row">
               
                <div class="col l-6 m-17 s-12">
                    <div class="about-us">
                        <div class="about-us__heading">Thông tin cá nhân</div>
                        <form method="POST" action="kh_thongtinsua.php">
                        
                            <div class="form__group"><?php foreach ($data as $row) : ?>
                                <div>
                                    <label for="name">Họ và tên</label>
                                    <input type="text"  id="kh_ten" name="kh_ten" class="form-control" value="<?php echo $row['KH_TEN'];?>">
                                </div>
                                <div>
                                    <label for="email" >Email</label>
                                    <input type="text"  id="kh_email" name="kh_email" class="form-control" value="<?php echo $row['KH_EMAIL']; ?>">
                                </div>
                                <div>
                                    <label for="address">Địa chỉ</label>
                                    <input type="text"  id="kh_diachi" name="kh_diachi" class="form-control" value="<?php echo $row['KH_DIACHI']; ?>">
                                </div>
                                <div>
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text"  id="kh_sdt" name="kh_sdt" class="form-control" value="<?php echo $row['KH_SDT']; ?>">
                                </div>
                                <div>
                                    <label for="phone">Mật khẩu</label>
                                    <input type="text"  id="kh_matkhau" name="kh_matkhau" class="form-control" value="<?php echo $row['KH_MATKHAU']; ?>"/>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn--default">Cập nhật</button>
                            <?php endforeach; ?></div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
include 'inc/footer.php';
?>