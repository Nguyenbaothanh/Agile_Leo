<!-- Cập nhật file -->
<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];

    // Xóa người dùng từ cơ sở dữ liệu dựa trên ID
    $sql = "DELETE FROM users WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đã xóa người dùng thành công');</script>";
        echo "<script>window.location = '/layout/display_users.php';</script>";
    } else {
        echo "<script>alert('Đã xóa người dùng thất bại');</script>";
        echo "<script>window.location = '/layout/display_users.php';</script>";
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
