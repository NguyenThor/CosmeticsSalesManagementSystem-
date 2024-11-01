<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $discountCode = $_POST['discount_code'];

    // Kết nối CSDL và kiểm tra mã ưu đãi
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mypham";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM khuyenmai WHERE KM_MA = '$discountCode'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Mã giảm giá hợp lệ
        $totalPrice = 140000; // Thay thế giá trị này bằng tổng thành tiền thực tế từ ứng dụng của bạn
        $discountAmount = $totalPrice * ($row['KM_GIATRI'] / 100);
        $response = array('success' => true, 'discount_amount' => $discountAmount);
    } else {
        // Mã giảm giá không hợp lệ
        $response = array('success' => false);
    }

    $conn->close();

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
