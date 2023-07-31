<?php
// Kết nối tới cơ sở dữ liệu, thay đổi thông tin kết nối phù hợp với cấu hình của bạn
include 'connect.php';

// Truy vấn cơ sở dữ liệu để lấy danh sách mã khuyến mãi
$sql = "SELECT * FROM ma_khuyen_mai";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách mã khuyến mãi</title>
    <link rel="stylesheet" type="text/css" href="/css/add_khuyen_mai.css">
</head>
<body>
    <h2>Danh sách mã khuyến mãi</h2>
    <a href="add_khuyen_mai.php">Thêm mã khuyến mãi</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên khuyến mãi</th>
            <th>Số tiền tối thiểu</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày hết hạn</th>
            <th>Số tiền khuyến mãi</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Xuất dữ liệu từ cơ sở dữ liệu thành bảng HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_ma_khuyen_mai"] . "</td>";
                echo "<td>" . $row["ten_khuyen_mai"] . "</td>";
                echo "<td>" . $row["so_tien_toi_thieu"] . "</td>";
                echo "<td>" . $row["ngay_bat_dau"] . "</td>";
                echo "<td>" . $row["ngay_het_han"] . "</td>";
                echo "<td>" . $row["so_tien_khuyen_mai"] . "</td>";
                echo '<td><a href="edit_ma_khuyen_mai.php?id=' . $row["id_ma_khuyen_mai"] . '">Edit</a></td>';
                echo '<td><a href="/action/delete_ma_khuyen_mai.php?id=' . $row["id_ma_khuyen_mai"] . '">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Không có mã khuyến mãi.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
