<?php
include 'inc/header.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mypham";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT * FROM sanpham";
$result = $conn->query($sql);
//tìm kiếm
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];

    $sql = "SELECT * FROM sanpham WHERE SP_MA = '$keyword' OR SP_TEN LIKE '%$keyword%'";    $result = $conn->query($sql);
} else {
   
    $sql = "SELECT * FROM sanpham";
//     $result = $conn->query($sql);
}
// Kiểm tra và hiển thị kết quả
if ($result->num_rows > 0) {
    echo '
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <div class="row mb-3"></div>
                <div class="card">
                    <div class="card-header">
                        <div class="row float-left" style="font-size: 20px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thống kê doanh thu</li>
                                    
                                    <form action="#" method="POST">
                                        <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm" style ="margin:-30px 0 0 700px;width:300px">
                                        <input type="submit" value="Tìm kiếm" class="btn btn-primary" style ="margin-left: 1010px;margin-top: -70px;height: 37px;">
                                    </form>
                                    
                       
                                </ol>
                            </nav>
                        </div>
                        <div class="row float-right mr-3">
                            <div id="custom-search" class="top-search-bar">
                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row table-responsive mx-auto" style="font-size: 16px">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Trọng lượng</th>
                                        <th scope="col">Đơn vị tính</th>
                                        <th scope="col">Giá bán</th>
                                        <th scope="col">Số lượng tồn</th>
                                        <th scope="col">Số lượng đã bán</th>
                                        <th scope="col">Tổng tiền</th>
                                    </tr>     
                                    </th>
                                </thead>
                                <tbody>';
    $totalAmount = 0; // Biến để tích lũy tổng tiền
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'>" . $count . "</th>";
        echo "<td>" . $row["SP_MA"] . "</td>";
        echo "<td>" . $row["SP_TEN"] . "</td>";
        echo "<td><img  width=60 height=60 src='../image/addsp/".$row["SP_HINH"] . "' ></td>";
        echo "<td>" . $row["SP_TRONGLUONG"] . "</td>";
        echo "<td>" . $row["SP_DVT"] . "</td>";
        echo "<td>" . number_format($row["SP_GIABAN"]) . "</td>";
        echo "<td>" . $row["SP_SOLUONGTON"] .
        "</td>";
        echo "<td>" . $row["SP_SOLUONGDABAN"] . "</td>";
        $subtotal = $row["SP_SOLUONGDABAN"] * $row["SP_GIABAN"]; // Tính tổng tiền của sản phẩm hiện tại

    echo "<td>" . number_format($subtotal) . "</td>"; // Hiển thị tổng tiền của sản phẩm hiện tại
    $totalAmount += $subtotal; // Cộng tổng tiền của sản phẩm hiện tại vào tổng tiền tổng cộng
    echo "</tr>";
    $count++;
        echo "</tr>";
        $count++;
        
    }
    echo '<tfoot><tr><td colspan="10" class="text-right">
    <strong>Tổng doanh thu:</strong></td><td>' .number_format( $totalAmount ). ' VNĐ </td></tr></tfoot>';

    echo '</tbody>
    
        </table>
        
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

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
    <!-- chart chartist js -->
    <script src="Content/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="Content/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="Content/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="Content/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="Content/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="Content/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="Content/assets/libs/js/dashboard-ecommerce.js"></script>

</body>

</html>';
} else {
    echo "Không tìm thấy kết quả";
}
$conn->close();
?>
