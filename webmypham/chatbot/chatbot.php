<?php

// Xử lý các truy vấn từ người dùng và trả về phản hồi tương ứng
function processMessage($message) {
    $message = strtolower($message);

    // Các câu hỏi và phản hồi tương ứng
    if (strpos($message, 'xin chào') !== false) {
        return "Xin chào! Chào mừng bạn đến với cửa hàng mỹ phẩm của chúng tôi.";
    } elseif (strpos($message, 'sản phẩm chống nắng') !== false) {
        return "Chúng tôi có nhiều loại sản phẩm chống nắng khác nhau. Bạn có thể tham khảo [tên sản phẩm] hoặc [tên sản phẩm].";
    } elseif (strpos($message, 'da dầu') !== false) {
        return "Đối với da dầu, chúng tôi khuyến nghị sử dụng [tên sản phẩm] hoặc [tên sản phẩm]. Đây là các sản phẩm đã được thiết kế đặc biệt để kiểm soát dầu và làm dịu da.";
    } else {
        return "Xin lỗi, tôi không hiểu câu hỏi của bạn. Vui lòng thử lại.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $response = processMessage($message);
    echo $response;
    exit();
}
?>
