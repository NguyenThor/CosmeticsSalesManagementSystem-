<link rel="stylesheet" href="tonkho.css">
<?php
include 'inc/header.php';

// Kết nối với cơ sở dữ liệu của bạn
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mypham";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy từ khóa tìm kiếm từ URL
$keyword = $_GET["keyword"];

// Tạo câu truy vấn SQL
$sql = "SELECT * FROM sanpham a, loaihang b  WHERE SP_MA LIKE '%$keyword%' OR SP_TEN LIKE '%$keyword%'
AND a.L_MA = b.L_MA";

// Thực thi câu truy vấn
$result = $conn->query($sql);

// Kiểm tra và hiển thị kết quả
if ($result->num_rows > 0) {
    echo'<div class="dashboard-wrapper">
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
<form method="GET" action="search.php" >
    <input type="text" name="keyword" placeholder="Nhập sản phẩm cần tìm  " style=" margin-left: 495px;">
    <input type="submit" value="Tìm kiếm">
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
                                        <th scope="col">Loại sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Số lượng tồn</th>                                                 
                                    </tr>
                                </thead>
                                <tbody>
                                ';
                                $count = 1;
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<th scope='row'>" . $count . "</th>";
        echo "<td>" . $row["SP_MA"] . "</td>";
      
        echo "<td>" . $row["L_TEN"] . "</td>";
        echo "<td>" . $row["SP_TEN"] . "</td>";
        echo "<td>" . $row["SP_SOLUONGTON"] . "</td>";
        echo "</tr>";
        $count++;
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
    echo "Không tìm thấy kết quả.";
}

// Đóng kết nối với cơ sở dữ liệu
$conn->close();
?>
