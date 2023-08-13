<?php
// controller.php: Logic xử lý dữ liệu và gọi view

include 'connect.php';

$sql = "SELECT * FROM ma_khuyen_mai";
$result = $conn->query($sql);

include 'display_khuyen_mai.php';
?>
