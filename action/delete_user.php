<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];

    // Xóa người dùng từ các bảng liên quan dựa trên ID
    $sql_delete_user = "DELETE FROM users WHERE user_id = $user_id";
    $sql_delete_orders = "DELETE FROM orders WHERE user_id = $user_id";
    // Thêm các truy vấn xóa từ các bảng khác ở đây...

    if ($conn->query($sql_delete_user) === TRUE && $conn->query($sql_delete_orders) === TRUE) {
        // Thêm kiểm tra cho các truy vấn xóa từ các bảng khác ở đây...

        echo "<script>alert('Đã xóa người dùng và dữ liệu liên quan thành công');</script>";
        echo "<script>window.location = '/layout/display_users_controller.php';</script>";
    } else {
        echo "<script>alert('Đã xóa người dùng và dữ liệu liên quan thất bại');</script>";
        echo "<script>window.location = '/layout/display_users_controller.php';</script>";
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>
