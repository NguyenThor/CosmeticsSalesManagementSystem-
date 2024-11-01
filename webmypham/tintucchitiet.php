<?php
include 'inc/header.php';
?>
    
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
            $BV_MA = $_GET['BV_MA'];
			$sql = "select * from baiviet WHERE BV_MA= '$BV_MA'";
         
          
			$result = mysqli_query($conn, $sql);
           
			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'BV_MA' => $row['BV_MA'],
                'BV_TEN' => $row['BV_TEN'],
                'BV_MOTANGAN' => $row['BV_MOTANGAN'],
                'BV_NOIDUNG' => $row['BV_NOIDUNG'],
                'BV_NGAYDANG' => $row['BV_NGAYDANG'],
                'BV_HINH' => $row['BV_HINH'],
              
            );
            $rowNum++;
            
        }

            ?>
          <?php
        foreach ($data as $row => $value) { ?>
        <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Chi Tiết Bài Viết :" <?= $value['BV_TEN'] ?>"</a>
                    </div>
                </div>
            </div>
            <div>
                <div href="#" class="new-item">
                    <a href="#" class="new-item__img">
                        <img src="./image/post/<?= $value['BV_HINH'] ?>" alt="">
                    </a>
                    <div class="new-item__body">
                        <a href="#" class="new-item__title">
                        <?= $value['BV_TEN'] ?>
                       </a>
                        <p class="new-item__time"> Ngày đăng: <?= $value['BV_NGAYDANG'] ?></p>
                        <p class="new-item__description"> <?= $value['BV_MOTANGAN'] ?> <br>
                       
                        <br>
                       
                      
                    </div>
                </div>
                <div class="new-item__noidung"> <?= $value['BV_NOIDUNG'] ?> </div><br>
                <div><a href="tintuc.php" class="btn btn--default">Trở về</a> </div><br>
        </div>
        
                <?php }
        ?>

              
       
<?php
include 'inc/footer.php';
?>