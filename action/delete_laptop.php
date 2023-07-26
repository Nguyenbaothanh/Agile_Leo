<?php
include 'connect.php' ;
 // Xử lý xóa sản phẩm
 if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];

    // Thực hiện câu truy vấn để xóa sản phẩm khỏi cơ sở dữ liệu
    $sql = "DELETE FROM laptops WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công.";
        header("Location: /layout/display_laptop.php");

    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
        header("Location: /layout/display_laptop.php");
    }
}
?>