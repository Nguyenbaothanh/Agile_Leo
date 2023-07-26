<link rel="stylesheet" href="/css/update_laptop.css">
<?php
// update_product.php

// Kết nối đến cơ sở dữ liệu (sử dụng thông tin đăng nhập của bạn ở đây)
include 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $laptop_id = $_GET['id'];

    // Kiểm tra xem sản phẩm có tồn tại trong cơ sở dữ liệu hay không
    $sql_check = "SELECT * FROM `laptops` WHERE `id` = $laptop_id";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $row = $result_check->fetch_assoc();

        // Xử lý dữ liệu khi người dùng nhấn nút "Lưu"
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy thông tin từ form sau khi người dùng đã chỉnh sửa
            $laptop_name = $_POST['laptop_name'];
            $brand = $_POST['brand'];
            $processor = $_POST['processor'];
            $screen_size = $_POST['screen_size'];
            $graphics_card = $_POST['graphics_card'];
            $ram = $_POST['ram'];
            $storage_capacity = $_POST['storage_capacity'];
            $operating_system = $_POST['operating_system'];
            $weight = $_POST['weight'];
            $status = $_POST['status'];
            $price_range = $_POST['price_range'];
            $image_url = $_POST['image_url'];

            // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
            $sql_update = "UPDATE `laptops` SET 
                           `laptop_name` = '$laptop_name',
                           `brand` = '$brand',
                           `processor` = '$processor',
                           `screen_size` = '$screen_size',
                           `graphics_card` = '$graphics_card',
                           `ram` = '$ram',
                           `storage_capacity` = '$storage_capacity',
                           `operating_system` = '$operating_system',
                           `weight` = '$weight',
                           `status` = '$status',
                           `price_range` = '$price_range',
                           `image_url` = '$image_url'
                           WHERE `id` = $laptop_id";

            if ($conn->query($sql_update) === TRUE) {
                echo "Thông tin laptop có ID $laptop_id đã được cập nhật thành công.";
                header("Location: /layout/display_laptop.php");
            } else {
                echo "Lỗi khi cập nhật thông tin laptop: " . $conn->error;
            }
        }
        // Hiển thị form để chỉnh sửa thông tin sản phẩm
        echo "<h1>Chỉnh sửa thông tin sản phẩm</h1>";
        echo "<form method='POST'>
            <label>Tên laptop:</label>
            <input type='text' name='laptop_name' value='".$row['laptop_name']."'><br>

            <label>Thương hiệu:</label>
            <input type='text' name='brand' value='".$row['brand']."'><br>

            <label>Bộ vi xử lý:</label>
            <input type='text' name='processor' value='".$row['processor']."'><br>

            <label>Kích thước màn hình:</label>
            <input type='text' name='screen_size' value='".$row['screen_size']."'><br>

            <label>Card đồ họa:</label>
            <input type='text' name='graphics_card' value='".$row['graphics_card']."'><br>

            <label>RAM:</label>
            <input type='text' name='ram' value='".$row['ram']."'><br>

            <label>Dung lượng:</label>
            <input type='text' name='storage_capacity' value='".$row['storage_capacity']."'><br>

            <label>Hệ điều hành:</label>
            <input type='text' name='operating_system' value='".$row['operating_system']."'><br>

            <label>Trọng lượng:</label>
            <input type='text' name='weight' value='".$row['weight']."'><br>

            <label>Tình trạng:</label>
            <input type='text' name='status' value='".$row['status']."'><br>

            <label>Khoảng giá:</label>
            <input type='text' name='price_range' value='".$row['price_range']."'><br>

            <label>URL hình ảnh:</label>
            <input type='text' name='image_url' value='".$row['image_url']."'><br>

            <input type='submit' value='Lưu'>
        </form>";
    } else {
        echo "Không tìm thấy sản phẩm có ID $laptop_id.";
    }
} else {
    echo "Không có ID hợp lệ được cung cấp.";
}

$conn->close();
?>
