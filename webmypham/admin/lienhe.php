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
$sql = "SELECT * FROM khachhang";
$result = $conn->query($sql);
//tìm kiếm
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM khachhang WHERE KH_MA = '$keyword' OR KH_TEN LIKE '%$keyword%'";    $result = $conn->query($sql);
} else {
   
    $sql = "SELECT * FROM khachhang";
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
                                    <li class="breadcrumb-item active" aria-current="page">Quản lý liên hệ </li>

                                    <form action="#" method="POST">
                                        <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" style="margin-left: 319px;
                                    }">
                                        <input type="submit" value="Tìm kiếm">
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
                                        <th scope="col">Mã khách hàng</th>
                                        <th scope="col">Họ Tên</th>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Gmail</th>
                                        <th scope="col">Địa chỉ khách hàng</th>
                                        <th scope="col">Lời nhắn</th>
                                        <th scope="col">Trạng thái</th>
                                    </tr>     
                                    </th>
                                </thead>
                                <tbody>';
    
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='row'>" . $count . "</th>";
        echo "<td>" . $row["KH_MA"] . "</td>";
        echo "<td>" . $row["KH_TEN"] . "</td>";
        echo "<td>" . $row["KH_SDT"] . "</td>";
        echo "<td>" . $row["KH_EMAIL"] . "</td>";
        echo "<td>" . $row["KH_DIACHI"] . "</td>";
        echo "<td>" . $row["loi_nhan"] . "</td>";
        
        echo "</tr>";
        $count++;
        
    }

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
