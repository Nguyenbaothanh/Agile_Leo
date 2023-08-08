<?php
include 'connect.php';
// Xử lý xóa sản phẩm
if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];

    // Trước tiên, xóa khỏi bảng shopping_cart
    $sql_cart = "DELETE FROM shopping_cart WHERE laptop_id = $delete_id";
    if ($conn->query($sql_cart) === TRUE) {
        // Sau khi xóa khỏi bảng shopping_cart, xóa khỏi bảng laptops
        $sql_laptop = "DELETE FROM laptops WHERE id = $delete_id";
        if ($conn->query($sql_laptop) === TRUE) {
            echo "Xóa sản phẩm thành công.";
            header("Location: /layout/display_laptop.php");
        } else {
            echo "Lỗi khi xóa sản phẩm từ bảng laptops: " . $sql_laptop . "<br>" . $conn->error;
            header("Location: /layout/display_laptop.php");
        }
    } else {
        echo "Lỗi khi xóa sản phẩm từ bảng shopping_cart: " . $sql_cart . "<br>" . $conn->error;
        header("Location: /layout/display_laptop.php");
    }
}
?>
