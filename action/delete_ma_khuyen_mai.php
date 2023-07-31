<?php
include 'connect.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Thực hiện truy vấn để xóa mã khuyến mãi dựa trên ID
    $sql = "DELETE FROM ma_khuyen_mai WHERE id_ma_khuyen_mai=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../layout/display_khuyen_mai.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Lỗi: Không tìm thấy ID mã khuyến mãi.";
}

// Đóng kết nối
$conn->close();
?>
