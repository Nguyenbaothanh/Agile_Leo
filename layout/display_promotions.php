<!DOCTYPE html>
<html>
<head>
    <title>Danh sách chương trình khuyến mãi</title>
    <link rel="stylesheet" href="/css/display_promotions.css">
</head>
<body>
    <nav class="vertical navigation">
        <h2 style=color:#fff;>Menu</h2>
        <ul>
            <li><a href="/index.php">Trang chủ </a></li>
            <li><a href="display_users.php">Quản lí người dùng</a></li>
            <li><a href="display_laptop.php">Quản lí sản phẩm</a></li>
            <li><a href="display_order.php">Quản lí đơn hàng</a></li>
            <li><a href="display_khuyen_mai.php">Quản lí mã khuyến mãi</a></li>
            <li><a href="display_promotions.php">Quản lí chương trình khuyến mãi</a></li>
        </ul>
    </nav>
    <h1>Danh sách chương trình khuyến mãi</h1>

<a class="add_promotions" href="add_promotions.php">Thêm chương trình khuyến mãi</a>

    <table border="1">
        <tr>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Hình ảnh</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Thao tác</th>
        </tr>
        <?php
        // Kết nối đến cơ sở dữ liệu MySQL
        include 'connect.php';
        // Truy vấn dữ liệu từ bảng promotions
        $sql = "SELECT * FROM promotions";
        $result = $conn->query($sql);

        // Hiển thị dữ liệu trong bảng
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_promotions'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['content'] . "</td>";
                echo "<td><img src='/action/" . $row['image_path'] . "' height='100' width='100'></td>";
                echo "<td>" . $row['start_date'] . "</td>";
                echo "<td>" . $row['end_date'] . "</td>";
                echo "<td><a class='link-edit' href='edit_promotions.php?id=" . $row['id_promotions'] . "'>Sửa</a> | <a class='link-delete' href='/action/delete_promotions.php?id=" . $row['id_promotions'] . "'>Xóa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>
</body>
</html>
