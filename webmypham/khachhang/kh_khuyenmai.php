<?php
include 'inc/header.php';
?>
    <div class="main">
        <div class="grid wide">
            <div class="main__taskbar">
                <div class="main__breadcrumb">
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Trang chủ</a>
                    </div>
                    <div class="breadcrumb__item">
                        <a href="#" class="breadcrumb__link">Danh sách mã khuyến mãi</a>
                    </div>
                </div>
            </div>
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
			$sql = "select * from khuyenmai";
         
          
			$result = mysqli_query($conn, $sql);
           
			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'KM_MA' => $row['KM_MA'],
                'KM_TEN' => $row['KM_TEN'],
                'KM_HINH' => $row['KM_HINH'],
                'KM_GIATRI' => $row['KM_GIATRI'],
                'KM_NGAYBD' => $row['KM_NGAYBD'],
                'KM_NGAYKT' => $row['KM_NGAYKT'],
              
            );
            $rowNum++;
            
        }

            ?>
        <?php foreach ($data as $row) : ?>
            <div class="list-new">
                <div href="kh_tintucchitiet.php" class="new-item">
                    <a href="tintucchitiet.php" class="new-item__img">
                        <img src="../image/post/<?= $row['KM_HINH'] ?>" alt="">
                    </a>
                    <div class="new-item__body">
                   
                        
                       
       
                        <a href="kh_tintucchitiet.php" class="new-item__title">
                        <?php echo $row['KM_MA']; ?> 
                       </a>
                        <p class="new-item__time"> Ngày bắt đầu: <?= $row['KM_NGAYBD'] ?></p>
                        <p class="new-item__time"> Ngày kết thúc: <?= $row['KM_NGAYKT'] ?></p>
                        <p class="new-item__description"> <?= $row['KM_TEN'] ?> sale <?= $row['KM_GIATRI'] ?> % Trên tổng đơn hàng<br></p>
                        <a  href="kh_giohang.php" onclick="copy(' <?php echo $row['KM_MA']; ?> ')" class="btn btn--default">Copy mã khuyến mãi</a>
                            <script>
                                function copy(text) {
                                    document.body.insertAdjacentHTML("beforeend", "<div id=\"copy\" contenteditable>" + text + "</div>")
                                    document.getElementById("copy").focus();
                                    document.execCommand("selectAll");
                                    document.execCommand("copy");
                                    document.getElementById("copy").remove();
                                }
                            </script>                        
                  
                    
                    </div>
                </div>
            </div>   
        <?php endforeach; ?>  
          

              
              
<?php
include 'inc/footer.php';
?>