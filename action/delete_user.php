<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];

    // Xóa người dùng từ cơ sở dữ liệu dựa trên ID
    $sql = "DELETE FROM users WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: /layout/display_users.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
