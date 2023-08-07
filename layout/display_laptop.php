<!DOCTYPE html>
<html>
<head>
    <title>Trang quản lí sản phẩm</title>
    <link rel="stylesheet" href="/css/display_laptop.css">
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

    <div class="content">

        <?php
        // Kết nối đến cơ sở dữ liệu (sử dụng thông tin đăng nhập của bạn ở đây)
        include 'connect.php';
        // Hiển thị danh sách sản phẩm
        $sql = "SELECT `id`,`laptop_name`,`brand`,`processor`,`screen_size`,`graphics_card`,`ram`,`storage_capacity`,`operating_system`,`weight`,`status`,`price_range`,`image_url` FROM `laptops` WHERE 1";
        $result = $conn->query($sql);
        echo "<h1>Danh sách sản phẩm</h1>";
        include 'add_laptop.php';
        if ($result->num_rows > 0) {

            echo "<table border='1'>
                    <tr> 
                        <th class='hidden'>ID</th>
                        <th>Tên laptop</th>
                        <th>Thương hiệu</th>
                        <th>Bộ vi xử lý</th>
                        <th>Kích thước màn hình</th>
                        <th>Card đồ họa</th>
                        <th>RAM</th>
                        <th>Dung lượng</th>
                        <th>Hệ điều hành</th>
                        <th>Trọng lượng</th>
                        <th>Tình trạng</th>
                        <th>Khoảng giá</th>
                        <th>URL hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td class='hidden'>".$row["id"]."</td>
                        <td>".$row["laptop_name"]."</td>
                        <td>".$row["brand"]."</td>
                        <td>".$row["processor"]."</td>
                        <td>".$row["screen_size"]."</td>
                        <td>".$row["graphics_card"]."</td>
                        <td>".$row["ram"]."</td>
                        <td>".$row["storage_capacity"]."</td>
                        <td>".$row["operating_system"]."</td>
                        <td>".$row["weight"]."</td>
                        <td>".$row["status"]."</td>
                        <td>".$row["price_range"]."</td>
                        <td>".$row["image_url"]."</td>
                        <td>
                            <a class='link-edit' href='/action/delete_laptop.php?delete_id=".$row["id"]."'>Xóa</a> |
                            <a class='link-delete' href='update_laptop.php?id=".$row["id"]."'>Sửa</a></td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "Không có sản phẩm nào.";
        }

        $conn->close();
        ?>

        
    </div>
</body>
</html>
