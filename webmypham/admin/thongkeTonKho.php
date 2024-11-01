<link rel="stylesheet" href="tonkho.css">

<?php
include 'inc/header.php';

?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- Noi dung -->

                    <div class="row mb-3"></div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row float-left" style="font-size: 20px;">
                                    <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a></li>
                                              <li class="breadcrumb-item active" aria-current="page">Thống kê tồn kho</li>
        <!-- Tìm kiếm -->
<form method="GET" action="search.php">
    <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm" style ="margin:-30px 0 0 680px;width:300px">
    <input type="submit" value="Tìm kiếm" class="btn btn-primary" style ="margin-left: 990px;margin-top: -35px;height: 37px;">
</form>
                            
                                                    </ol>
                                                </nav>
                                            </div>
                        <!-- <div class="table table-reponsive"> -->
                            
                                <div class="row table-responsive mx-auto" style="font-size: 16px">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Mã sản phẩm</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Loại sản phẩm</th>
                                                <th scope="col">Số lượng tồn</th>                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
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
            $sql = " SELECT * FROM sanpham a , loaihang b
            WHERE a.L_MA = b.L_MA";
                
               
			$result = mysqli_query($conn, $sql);

			$data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
                'SP_MA' => $row['SP_MA'],
                'SP_TEN' => $row['SP_TEN'],
                'L_TEN' => $row['L_TEN'],
                'SP_SOLUONGTON' => $row['SP_SOLUONGTON'],
            );
            $rowNum++;
        }


            ?>
                                         <?php foreach ($data as $row) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $row['rowNum']; ?></td>

                                            <td><?php echo $row['SP_MA']; ?></td>
                                            <td><?php echo $row['SP_TEN']; ?></td>
                                            <td><?php echo $row['L_TEN']; ?></td>
                                            <td><?php echo $row['SP_SOLUONGTON']; ?></td>
                                         </tr>
                                         <?php endforeach; ?>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Scripts/jquery-1.10.2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <!-- jquery 3.3.1 -->
    <script src="Content/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="Content/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="Content/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="Content/assets/libs/js/main-js.js"></script>

    <!-- sparkline js -->
    <script src="Content/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="Content/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <!-- chart c3 js -->
    <script src="Content/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/C3chartjs.js"></script>

</body>

</html>