<!DOCTYPE html>
<html>
<head>
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="/css/displayusers.css">
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
    <div class="danhsachnguoidung"><h1>Danh sách người dùng</h1>
    <button onclick="openModal()">Thêm người dùng</button>
    <?php
    include_once 'connect.php';
    // Lấy danh sách người dùng từ cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE type = 'user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['user_id']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['full_name']."</td>
                    <td>".$row['sex']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['address']."</td>
                    <td>
                    <a href='edit_user.php?id=".$row['user_id']."' onclick='openModal1()'>Sửa</a> |
                    <a href='/action/delete_user.php?id=".$row['user_id']."'>Xóa</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có người dùng nào.";
    }

    $conn->close();
    ?>
    <div id="myModal" style="display: none;">
        <div class="modal-content">
            <?php include 'add_user.php'; ?>
        </div>
    </div>
    </div>
        <script src="/js/display_user.js" >
        
    </script>
</body>
</html>
