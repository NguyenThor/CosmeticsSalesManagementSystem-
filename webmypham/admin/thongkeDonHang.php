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
$thongke = isset($_POST['thongke']) ? $_POST['thongke'] : '';

// Truy vấn dữ liệu đơn hàng
if ($thongke === 'ngay') {
    $sql = "SELECT * FROM donhang WHERE DATE(DH_NGAYDAT) = CURDATE()";
    $title = 'Thống kê theo Ngày';
} elseif ($thongke === 'tuan') {
    $sql = "SELECT * FROM donhang WHERE WEEK(DH_NGAYDAT) = WEEK(CURDATE())";
    $title = 'Thống kê theo Tuần';
} elseif ($thongke === 'thang') {
    $sql = "SELECT * FROM donhang WHERE MONTH(DH_NGAYDAT) = MONTH(CURDATE())";
    $title = 'Thống kê theo Tháng';
} elseif ($thongke === 'nam') {
    $sql = "SELECT * FROM donhang WHERE YEAR(DH_NGAYDAT) = YEAR(CURDATE())";
    $title = 'Thống kê theo Năm';
} else {
    $sql = "SELECT * FROM donhang";
    $title = 'Thống kê Đơn hàng';
}
$result = $conn->query($sql);


?>

<!-- ============================================================= -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <!-- Noi dung -->

            <div class="row mb-3"></div>
            <div class="card">
                <div class="card-header">
                    <div class="row float-left" style="font-size: 20px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thống kê đơn hàng</li> 
                            </ol>
                        </nav>

                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm" style ="margin:10px 0 0 700px;width:300px;">
                            <div class="input-group-append" style ="margin-left:1010px;">
                                <button type="submit" class="btn btn-primary" style="margin-top: -35px;height: 37px;">Tìm kiếm</button>
                            </div>
                            </form>
                        </div>

                    </div>

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group">
        <select name="thongke" class="form-control">
            <option value="ngay" <?php echo ($thongke === 'ngay') ? 'selected' : ''; ?>>Theo Ngày</option>
            <option value="tuan" <?php echo ($thongke === 'tuan') ? 'selected' : ''; ?>>Theo Tuần</option>
            <option value="thang" <?php echo ($thongke === 'thang') ? 'selected' : ''; ?>>Theo Tháng</option>
            <option value="nam" <?php echo ($thongke === 'nam') ? 'selected' : ''; ?>>Theo Năm</option>
        </select>
        <div class="input-group-append">
    <?php if ($thongke === 'nam') { ?>
        <select name="nam" class="form-control">
            <?php
            $currentYear = date('Y');
            for ($i = $currentYear; $i >= ($currentYear - 5); $i--) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
    <?php } elseif ($thongke === 'thang') { ?>
        <select name="thang" class="form-control">
            <?php
            $currentMonth = date('m');
            for ($i = 1; $i <= 12; $i++) {
                $month = str_pad($i, 2, '0', STR_PAD_LEFT);
                echo '<option value="' . $month . '" ' . ($thang === $month ? 'selected' : '') . '>' . $month . '</option>';
            }
            ?>
        </select>
        <select name="nam" class="form-control">
            <?php
            $currentYear = date('Y');
            for ($i = $currentYear; $i >= ($currentYear - 5); $i--) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
    <?php }  elseif ($thongke === 'tuan') {
    $currentWeek = date('Y-\WW');
    $currentWeekStartDate = date('Y-m-d', strtotime($currentWeek));
    ?>
    <div class="input-group">
        <input type="week" name="tuan" class="form-control" value="<?php echo isset($tuan) ? $tuan : ''; ?>" placeholder="Tuần">
        <input type="date" name="ngay" class="form-control" value="<?php echo isset($ngay) ? $ngay : $currentWeekStartDate; ?>" placeholder="Ngày">
        <select name="nam" class="form-control">
            <?php
            $currentYear = date('Y');
            for ($i = $currentYear; $i >= ($currentYear - 5); $i--) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
    </div>
    <?php } elseif ($thongke === 'ngay') { ?>
        <input type="date" name="ngay" class="form-control" value="<?php echo isset($ngay) ? $ngay : ''; ?>">
    <?php } ?>
    <button type="submit" class="btn btn-primary" style="height: 38px;">Xem thống kê</button>
    </div> 
    </div>
</form>
<?php
// YEAR(DH_NGAYDAT) AS Nam, COUNT(DH_MA) AS SoDonHang, SUM(DH_TONGTHANHTOAN) AS TongDoanhThu
//thống kê theo năm
if ($thongke === 'nam') {
    $selectedYear = $_POST["nam"];
    $sqlTK = "SELECT  YEAR(a.DH_NGAYDAT) AS Nam, 
    COUNT(a.DH_MA) AS SoDonHang, 
    SUM(a.DH_TONGTHANHTOAN) AS TongDoanhThu,
    b.KH_TEN,b.KH_MA,a.dh_ma
    FROM donhang a, khachhang b
    WHERE YEAR(a.DH_NGAYDAT) = '$selectedYear' 
    AND a.KH_MA = b.KH_MA
    GROUP BY YEAR(a.DH_NGAYDAT)";

    $resultTK = $conn->query($sqlTK);
   
  
    if ($resultTK->num_rows > 0) {
        echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
        echo '<table class="table table-striped">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">Năm</th>';
        echo '<th scope="col">Mã khách hàng</th>';
        echo '<th scope="col">Tên khách hàng</th>';
        echo '<th scope="col">Số Đơn Hàng</th>';
        echo '<th scope="col">Tổng Doanh Thu</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($rowTK = $resultTK->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $rowTK["Nam"] . '</td>';
            echo '<td>' . $rowTK["KH_MA"] . '</td>';
            echo '<td>' . $rowTK["KH_TEN"] . '</td>';
            echo '<td>' . $rowTK["SoDonHang"] . '</td>';
            echo '<td>' . number_format( $rowTK["TongDoanhThu"]) . ' VNĐ </td>';
            echo '</tr>';
            
            
        }
        

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo 'Không có kết quả';
    }
    if ($result->num_rows > 0) {
        echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
        echo '<h3>Kết quả thống kê cho năm ' . $selectedYear . '</h3>'; // Thêm dòng thông báo cho người dùng
        echo '<table class="table table-striped">';
    } else {
        echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
        echo '<h3>Không có kết quả thống kê cho năm ' . $selectedYear . '</h3>'; // Thêm dòng thông báo cho người dùng
    }
}
//-----------------------------------------thong ke theo tháng
if ($thongke === 'thang') {
    if (isset($_POST['thang']) && isset($_POST['nam'])) {
    $selectedMonth = $_POST['thang'];
    $selectedYear = $_POST['nam'];    $sql = "SELECT DATE_FORMAT(DH_NGAYDAT, '%Y-%m') AS ThangNam, COUNT(*) AS SoDonHang, SUM(DH_TONGTHANHTOAN) AS TongDoanhThu 
    FROM donhang 
    WHERE YEAR(DH_NGAYDAT) = '$selectedYear' AND MONTH(DH_NGAYDAT) = '$selectedMonth'
    GROUP BY DATE_FORMAT(DH_NGAYDAT, '%Y-%m')";
    $result = $conn->query($sql);
    // Kiểm tra và hiển thị kết quả
    if ($result->num_rows > 0) {
        echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
        echo '<table class="table table-striped">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th scope="col">Tháng/Năm</th>';
        echo '<th scope="col">Số Đơn Hàng</th>';
        echo '<th scope="col">Tổng Doanh Thu</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["ThangNam"] . '</td>';
            echo '<td>' . $row["SoDonHang"] . '</td>';
            echo '<td>' . number_format($row["TongDoanhThu"]) . 'VNĐ</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
        echo '<h3>Không có kết quả thống kê cho tháng ' . $selectedMonth . '/' . $selectedYear . '</h3>'; // Thêm dòng thông báo cho người dùng
        echo '</div>';
    }
    echo '<h3>Kết quả thống kê cho tháng ' . $selectedMonth . '/' . $selectedYear . '</h3>'; // Thêm dòng thông báo cho người dùng
} else {
    echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
    echo '<h3>Vui lòng chọn tháng và năm để xem thống kê</h3>'; // Thêm dòng thông báo cho người dùng
    echo '</div>';
   }
}
//Thống kê theo tuần
if ($thongke === 'tuan') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tuan']) && isset($_POST['nam'])) {
        $selectedWeek = $_POST['tuan'];
        $selectedYear = $_POST['nam'];

        // Tính toán ngày bắt đầu và ngày kết thúc của 7 ngày đầu tiên trong tháng
        $firstDayOfMonth = date('Y-m-01', strtotime($selectedYear . '-W' . $selectedWeek));
        $seventhDayOfMonth = date('Y-m-d', strtotime($firstDayOfMonth . ' + 6 days'));

        $sql = "SELECT YEAR(DH_NGAYDAT) AS Nam, WEEK(DH_NGAYDAT) AS Tuan, COUNT(*) AS SoDonHang, SUM(DH_TONGTHANHTOAN) AS TongDoanhThu 
        FROM donhang 
        WHERE DH_NGAYDAT BETWEEN '$firstDayOfMonth' AND '$seventhDayOfMonth'
        GROUP BY YEAR(DH_NGAYDAT), WEEK(DH_NGAYDAT)";
        $result = $conn->query($sql);

        // Kiểm tra và hiển thị kết quả
        if ($result->num_rows > 0) {
            echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
            echo '<h3>Kết quả thống kê cho 7 ngày đầu tiên của tháng</h3>'; // Thêm dòng thông báo cho người dùng
            echo '<table class="table table-striped">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">Năm</th>';
            echo '<th scope="col">Tuần</th>';
            echo '<th scope="col">Số Đơn Hàng</th>';
            echo '<th scope="col">Tổng Doanh Thu</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["Nam"] . '</td>';
                echo '<td>' . $row["Tuan"] . '</td>';
                echo '<td>' . $row["SoDonHang"] . '</td>';
                echo '<td>' . number_format($row["TongDoanhThu"] ). ' VNĐ </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
            echo '<h3>Không có kết quả thống kê cho 7 ngày đầu tiên của tháng</h3>'; // Thêm dòng thông báo cho người dùng
            echo '</div>';
        }
    }
}

//thống kê theo ngày
if ($thongke === 'ngay') {
    if (isset($_POST['ngay'])) {
        $selectedDate = $_POST['ngay'];
        $sql = "SELECT DATE(DH_NGAYDAT) AS NgayDat, COUNT(*) AS SoDonHang, SUM(DH_TONGTHANHTOAN) AS TongDoanhThu 
        FROM donhang 
        WHERE DATE(DH_NGAYDAT) = '$selectedDate'
        GROUP BY DATE(DH_NGAYDAT)";
        $result = $conn->query($sql);
        // Kiểm tra và hiển thị kết quả
        if ($result->num_rows > 0) {
            echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
            echo '<table class="table table-striped">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">Ngày</th>';
            echo '<th scope="col">Số Đơn Hàng</th>';
            echo '<th scope="col">Tổng Doanh Thu</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["NgayDat"] . '</td>';
                echo '<td>' . $row["SoDonHang"] . '</td>';
                echo '<td>' . number_format($row["TongDoanhThu"]) . ' VNĐ </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '<h3>Kết quả thống kê cho ngày ' . $selectedDate . '</h3>'; // Thêm dòng thông báo cho người dùng

        } else {
            echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
            echo '<h3>Không có kết quả thống kê cho ngày ' . $selectedDate . '</h3>'; // Thêm dòng thông báo cho người dùng
            echo '</div>';
        }
    } else {
        echo '<div class="row table-responsive mx-auto" style="font-size: 16px">';
        echo '<h3>Vui lòng chọn ngày để xem thống kê</h3>'; // Thêm dòng thông báo cho người dùng
        echo '</div>';
    }
}
?>
            </div>
                <div class="card-body">
                    <div class="row table-responsive mx-auto" style="font-size: 16px">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã đơn</th>
                                    <th scope="col">Mã khách hàng</th>
                                    <th scope="col">Mã đơn vị vận chuyển</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Mã địa chỉ nhận hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Tổng tiền hàng</th>
                                    <th scope="col">Tổng tiền vận chuyển</th>
                                    <th scope="col">Tổng thanh toán </th>
                                    <th scope="col">Phương thức thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               if (isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                            
                                $sql = "SELECT * FROM donhang a, khachhang b, phuongthucthanhtoan c,donvivanchuyen d,diachinhanhang e WHERE a.kh_ma=b.kh_ma 
                                and DH_MA and PTTT_TEN and DVVC_MA  = '$keyword' OR KH_TEN LIKE '%$keyword%' OR DH_MA LIKE '%$keyword%'";
                                $result = $conn->query($sql);
                            } else {
                                $sql = "SELECT * 
                                FROM donhang a, khachhang b,
                                 phuongthucthanhtoan c,diachinhanhang e 
                                 where a.kh_ma=b.kh_ma 
                                and a.PTTT_MA = c.PTTT_MA  and a.DCNH_MA = e.DCNH_MA";
                                
                                $result = $conn->query($sql);
                            }
                            $count = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $count . "</th>";
                                    echo "<td>" . $row["DH_MA"] . "</td>";
                                    echo "<td>" . $row["KH_MA"] . "</td>";
                                    echo "<td>" . $row["DVVC_MA"] . "</td>";
                                    echo "<td>" . $row["KH_TEN"] . "</td>";
                                    echo '<td>' . $row["DCNH_DIACHI"] .','. $row["DCNH_XA"] .',' . $row["DCNH_HUYEN"] .','. $row["DCNH_TINH"] .'</td>';
                                    echo "<td>" . $row["DH_NGAYDAT"] . "</td>";
                                    echo "<td>" .number_format( $row["DH_TONGTIENHANG"] ). "</td>";
                                    echo "<td>" .number_format( $row["DH_TONGTIENVANCHUYEN"]) . "</td>";
                                    echo "<td>" . number_format($row["DH_TONGTHANHTOAN"] ). "</td>";
                                    echo "<td>" . $row["PTTT_TEN"] . "</td>";
                                    echo "</tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td colspan='17'>Không có kết quả</td></tr>";
                            }
                            
                            ?>
                            </tbody>
                        </table>
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

