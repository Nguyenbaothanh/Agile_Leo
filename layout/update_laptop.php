<link rel="stylesheet" href="/css/edit_laptop.css">
<?php
// edit_laptop.php

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
                echo "Lỗi khi cập nhật thông tin laptop: " . $conn-> error;
            }
        }
        // Hiển thị form để chỉnh sửa thông tin sản phẩm
        echo "<h1>Chỉnh sửa thông tin sản phẩm</h1>";
        echo "<form method='POST'>
            <label>Tên laptop:</label>
            <input type='text' name='laptop_name' value='".$row['laptop_name']."'><br>

            <label>Thương hiệu:</label>
            <select name='brand' required>
                <option value='Asus' " . ($row['brand'] == 'Asus' ? 'selected' : '') . ">Asus</option>
                <option value='Acer' " . ($row['brand'] == 'Acer' ? 'selected' : '') . ">Acer</option>
                <option value='Dell' " . ($row['brand'] == 'Dell' ? 'selected' : '') . ">Dell</option>
                <option value='Asus' " . ($row['brand'] == 'Gigabyte' ? 'selected' : '') . ">Gigabyte</option>
                <option value='Acer' " . ($row['brand'] == 'HP' ? 'selected' : '') . ">HP</option>
                <option value='Dell' " . ($row['brand'] == 'Lenovo' ? 'selected' : '') . ">Lenovo</option>
                <option value='Asus' " . ($row['brand'] == 'LG' ? 'selected' : '') . ">LG</option>
                <option value='Acer' " . ($row['brand'] == 'MSI' ? 'selected' : '') . ">MSI</option>
                <option value='Dell' " . ($row['brand'] == 'Macbook' ? 'selected' : '') . ">Macbook</option>
                <option value='Acer' " . ($row['brand'] == 'Samsung' ? 'selected' : '') . ">Samsung</option>
                <option value='Acer' " . ($row['brand'] == 'Huawei' ? 'selected' : '') . ">Huawei</option>
            </select><br>

            <label>Bộ vi xử lý:</label>
            <select name='processor' required>
                <option value='Intel Celeron' " . ($row['processor'] == 'Intel Celeron' ? 'selected' : '') . ">Intel Celeron</option>
                <option value='Intel Pentium' " . ($row['processor'] == 'Intel Pentium' ? 'selected' : '') . ">Intel Pentium</option>
                <option value='Core i3' " . ($row['processor'] == 'Core i3' ? 'selected' : '') . ">Core i3</option>
                <option value='Core i5' " . ($row['processor'] == 'Core i5' ? 'selected' : '') . ">Core i5</option>
                <option value='Core i7' " . ($row['processor'] == 'Core i7' ? 'selected' : '') . ">Core i7</option>
                <option value='Core i9' " . ($row['processor'] == 'Core i9' ? 'selected' : '') . ">Core i9</option>
                <option value='Ryzen 3' " . ($row['processor'] == 'Ryzen 3' ? 'selected' : '') . ">Ryzen 3</option>
                <option value='Ryzen 5' " . ($row['processor'] == 'Ryzen 5' ? 'selected' : '') . ">Ryzen 5</option>
                <option value='Ryzen 7' " . ($row['processor'] == 'Ryzen 7' ? 'selected' : '') . ">Ryzen 7</option>
                <option value='Ryzen 9' " . ($row['processor'] == 'Ryzen 9' ? 'selected' : '') . ">Ryzen 9</option>
                <option value='Apple M1' " . ($row['processor'] == 'Apple M1' ? 'selected' : '') . ">Apple M1</option>
                <option value='Apple M2' " . ($row['processor'] == 'Apple M2' ? 'selected' : '') . ">Apple M2</option>
                <option value='Apple M2 Max' " . ($row['processor'] == 'Apple M2 Max' ? 'selected' : '') . ">Apple M2 Max</option>
                <option value='Apple M2 Pro' " . ($row['processor'] == 'Apple M2 Pro' ? 'selected' : '') . ">Apple M2 Pro</option>
                <option value='SQ3' " . ($row['processor'] == 'SQ3' ? 'selected' : '') . ">SQ3</option>
            </select><br>
            <label>Screen Size:</label>
            <select name='screen_size' required>
                <option value='10.5 inch' " . ($row['screen_size'] == '10.5 inch' ? 'selected' : '') . ">10.5 inch</option>
                <option value='11.6 inch' " . ($row['screen_size'] == '11.6 inch' ? 'selected' : '') . ">11.6 inch</option>
                <option value='12.3 inch' " . ($row['screen_size'] == '12.3 inch' ? 'selected' : '') . ">12.3 inch</option>
                <option value='12.5 inch' " . ($row['screen_size'] == '12.5 inch' ? 'selected' : '') . ">12.5 inch</option>
                <option value='13 inch' " . ($row['screen_size'] == '13 inch' ? 'selected' : '') . ">13 inch</option>
                <option value='13.3 inch' " . ($row['screen_size'] == '13.3 inch' ? 'selected' : '') . ">13.3 inch</option>
                <option value='13.4 inch' " . ($row['screen_size'] == '13.4 inch' ? 'selected' : '') . ">13.4 inch</option>
                <option value='13.5 inch' " . ($row['screen_size'] == '13.5 inch' ? 'selected' : '') . ">13.5 inch</option>
                <option value='13.6 inch' " . ($row['screen_size'] == '13.6 inch' ? 'selected' : '') . ">13.6 inch</option>
                <option value='14.0 inch' " . ($row['screen_size'] == '14.0 inch' ? 'selected' : '') . ">14.0 inch</option>
                <option value='14.2 inch' " . ($row['screen_size'] == '14.2 inch' ? 'selected' : '') . ">14.2 inch</option>
                <option value='14.5 inch' " . ($row['screen_size'] == '14.5 inch' ? 'selected' : '') . ">14.5 inch</option>
                <option value='15 inch' " . ($row['screen_size'] == '15 inch' ? 'selected' : '') . ">15 inch</option>
                <option value='15.6 inch' " . ($row['screen_size'] == '15.6 inch' ? 'selected' : '') . ">15.6 inch</option>
                <option value='16 inch' " . ($row['screen_size'] == '16 inch' ? 'selected' : '') . ">16 inch</option>
                <option value='16.1 inch' " . ($row['screen_size'] == '16.1 inch' ? 'selected' : '') . ">16.1 inch</option>
                <option value='17.0 inch' " . ($row['screen_size'] == '17.0 inch' ? 'selected' : '') . ">17.0 inch</option>
                <option value='17.3 inch' " . ($row['screen_size'] == '17.3 inch' ? 'selected' : '') . ">17.3 inch</option>
                <option value='16.2 inch' " . ($row['screen_size'] == '16.2 inch' ? 'selected' : '') . ">16.2 inch</option>
                <option value='18 inch' " . ($row['screen_size'] == '18 inch' ? 'selected' : '') . ">18 inch</option>
            </select><br>
            <label>Graphics Card:</label>
            <select name='processor' required>
                <option value='Intel Celeron' " . ($row['processor'] == 'Intel Celeron' ? 'selected' : '') . ">Intel Celeron</option>
                <option value='Intel Pentium' " . ($row['processor'] == 'Intel Pentium' ? 'selected' : '') . ">Intel Pentium</option>
                <option value='Core i3' " . ($row['processor'] == 'Core i3' ? 'selected' : '') . ">Core i3</option>
                <option value='Core i5' " . ($row['processor'] == 'Core i5' ? 'selected' : '') . ">Core i5</option>
                <option value='Core i7' " . ($row['processor'] == 'Core i7' ? 'selected' : '') . ">Core i7</option>
                <option value='Core i9' " . ($row['processor'] == 'Core i9' ? 'selected' : '') . ">Core i9</option>
                <option value='Ryzen 3' " . ($row['processor'] == 'Ryzen 3' ? 'selected' : '') . ">Ryzen 3</option>
                <option value='Ryzen 5' " . ($row['processor'] == 'Ryzen 5' ? 'selected' : '') . ">Ryzen 5</option>
                <option value='Ryzen 7' " . ($row['processor'] == 'Ryzen 7' ? 'selected' : '') . ">Ryzen 7</option>
                <option value='Ryzen 9' " . ($row['processor'] == 'Ryzen 9' ? 'selected' : '') . ">Ryzen 9</option>
                <option value='Apple M1' " . ($row['processor'] == 'Apple M1' ? 'selected' : '') . ">Apple M1</option>
                <option value='Apple M2' " . ($row['processor'] == 'Apple M2' ? 'selected' : '') . ">Apple M2</option>
                <option value='Apple M2 Max' " . ($row['processor'] == 'Apple M2 Max' ? 'selected' : '') . ">Apple M2 Max</option>
                <option value='Apple M2 Pro' " . ($row['processor'] == 'Apple M2 Pro' ? 'selected' : '') . ">Apple M2 Pro</option>
                <option value='SQ3' " . ($row['processor'] == 'SQ3' ? 'selected' : '') . ">SQ3</option>
            </select><br>
            <label >Graphics Card:</label>
            <select name='graphics_card' required>
                <option value='Intel HD Graphics'". ($row['graphics_card'] == 'Intel HD Graphics' ? 'selected' : '') . ">Intel HD Graphics</option>
                <option value='Intel UHD Graphics' " .  ($row['graphics_card'] == 'Intel UHD Graphics' ? 'selected' : '') .">Intel UHD Graphics</option>
                <option value='Iris Xe Graphics'" .  ($row['graphics_card'] == 'Iris Xe Graphics' ? 'selected' : '') .">Iris Xe Graphics</option>
                <option value='GeForce MX550'" .  ($row['graphics_card'] == 'GeForce MX550' ? 'selected' : '') .">GeForce MX550</option>
                <option value='GeForce MX570'" .  ($row['graphics_card'] == 'GeForce MX570' ? 'selected' : '') .">GeForce MX570</option>
                <option value='GeForce MX350'" .  ($row['graphics_card'] == 'GeForce MX350' ? 'selected' : '') .">GeForce MX350</option>
                <option value='GTX 1650'" .  ($row['graphics_card'] == 'GTX 1650' ? 'selected' : '') .">GTX 1650</option>
                <option value='RTX 3050'" .  ($row['graphics_card'] == 'RTX 3050' ? 'selected' : '') .">RTX 3050</option>
                <option value='RTX 3050 Ti'" .  ($row['graphics_card'] == 'RTX 3050 Ti' ? 'selected' : '') .">RTX 3050 Ti</option>
                <option value='RTX 3060'" .  ($row['graphics_card'] == 'RTX 3060' ? 'selected' : '') .">RTX 3060</option>
                <option value='RTX 3070'" .  ($row['graphics_card'] == 'RTX 3070' ? 'selected' : '') .">RTX 3070</option>
                <option value='RTX 3070Ti'" .  ($row['graphics_card'] == 'RTX 3070Ti' ? 'selected' : '') .">RTX 3070Ti</option>
                <option value='RTX 3080 8GB'" .  ($row['graphics_card'] == 'RTX 3080 8GB' ? 'selected' : '') .">RTX 3080 8GB</option>
                <option value='Quadro RTX A2000'" .  ($row['graphics_card'] == 'Quadro RTX A2000' ? 'selected' : '') .">Quadro RTX A2000</option>
                <option value='RTX 3080Ti'" .  ($row['graphics_card'] == 'RTX 3080Ti' ? 'selected' : '') .">RTX 3080Ti</option>
                <option value='RTX 4070'" .  ($row['graphics_card'] == 'RTX 4070' ? 'selected' : '') .">RTX 4070</option>
                <option value='RTX 4080'" .  ($row['graphics_card'] == 'RTX 4080' ? 'selected' : '') .">RTX 4080</option>
                <option value='RTX 4090'" .  ($row['graphics_card'] == 'RTX 4090' ? 'selected' : '') .">RTX 4090</option>
                <option value='AMD Radeon'" .  ($row['graphics_card'] == 'AMD Radeon' ? 'selected' : '') .">AMD Radeon</option>
                <option value='AMD Radeon HD'" .  ($row['graphics_card'] == 'AMD Radeon HD' ? 'selected' : '') .">AMD Radeon HD</option>
                <option value='Quadro T550 4GB'" .  ($row['graphics_card'] == 'Quadro T550 4GB' ? 'selected' : '') .">Quadro T550 4GB</option>
                <option value='Quadro T550 2GB'" .  ($row['graphics_card'] == 'Quadro T550 2GB' ? 'selected' : '') .">Quadro T550 2GB</option>
                <option value='RTX 4050 6GB'" .  ($row['graphics_card'] == 'RTX 4050 6GB' ? 'selected' : '') .">RTX 4050 6GB/option>
                <option value='AMD Radeon 680M'" .  ($row['graphics_card'] == 'AMD Radeon 680M' ? 'selected' : '') .">AMD Radeon 680M</option>
                <option value='RTX 3070Ti 8GB 30 core 4GB'" .  ($row['graphics_card'] == 'RTX 3070Ti 8GB 30 core 4GB' ? 'selected' : '') .">RTX 3070Ti 8GB 30 core 4GB</option>
                <option value='RTX 4060 8GB t500'" .  ($row['graphics_card'] == 'RTX 4060 8GB t500' ? 'selected' : '') .">RTX 4060 8GB t500</option>
                <option value='RTX3050 Max Q NVIDIA GeForce'" .  ($row['graphics_card'] == 'RTX3050 Max Q NVIDIA GeForce' ? 'selected' : '') .">RTX3050 Max Q NVIDIA GeForce</option>
                <option value='RTX 3050 4GB'" .  ($row['graphics_card'] == 'RTX 3050 4GB' ? 'selected' : '') .">RTX 3050 4GB</option>
                <option value='RTX 3050 Ti 4GB'" .  ($row['graphics_card'] == 'RTX 3050 Ti 4GB' ? 'selected' : '') .">RTX 3050 Ti 4GB</option>
                <option value='RTX 4070 8GB'" .  ($row['graphics_card'] == 'RTX 4070 8GB' ? 'selected' : '') .">RTX 4070 8GB</option>
                <option value='Microsoft SQ3 Adreno™ 8CX Gen 3 16GB'" .  ($row['graphics_card'] == 'Microsoft SQ3 Adreno™ 8CX Gen 3 16GB' ? 'selected' : '') .">Microsoft SQ3 Adreno™ 8CX Gen 3 16GB</option>
                <option value='GeForce MX450 10 CORE 4GB GDDR6'" .  ($row['graphics_card'] == 'GeForce MX450 10 CORE 4GB GDDR6' ? 'selected' : '') .">GeForce MX450 10 CORE 4GB GDDR6</option>
                <option value='Quadro T500 4GB'" .  ($row['graphics_card'] == 'Quadro T500 4GB' ? 'selected' : '') .">Quadro T500 4GB</option>
                <option value='Intel Iris Plus Geforce'" .  ($row['graphics_card'] == 'Intel Iris Plus Geforce' ? 'selected' : '') .">Intel Iris Plus Geforce</option>
                <option value='RTX 2050 6GB'" .  ($row['graphics_card'] == 'RTX 2050 6GB' ? 'selected' : '') .">RTX 2050 6GB</option>
                <option value='AMD Radeon 660M'" .  ($row['graphics_card'] == 'AMD Radeon 660M' ? 'selected' : '') .">AMD Radeon 660M</option>
                <option value='RTX 3060 6GB'" .  ($row['graphics_card'] == 'RTX 3060 6GB' ? 'selected' : '') .">RTX 3060 6GB</option>
            </select>

            <label for='ram'>RAM:</label>
                <select name='ram' required>
                    <option value='4GB'" .  ($row['ram'] == '4GB' ? 'selected' : '') .">4GB</option>
                    <option value='8GB'" .  ($row['ram'] == '8GB' ? 'selected' : '') .">8GB</option>
                    <option value='16GB'" .  ($row['ram'] == '16GB' ? 'selected' : '') .">16GB</option>
                    <option value='24GB'" .  ($row['ram'] == '24GB' ? 'selected' : '') .">24GB</option>
                    <option value='32GB'" .  ($row['ram'] == '32GB' ? 'selected' : '') .">32GB</option>
                    <option value='64GB'" .  ($row['ram'] == '64GB' ? 'selected' : '') .">64GB</option>
                </select><br>

            <label for='storage_capacity'>Storage Capacity:</label>
                <select name='storage_capacity' required>
                <option value='2 TB' " . ($row['storage_capacity'] == '2 TB' ? 'selected' : ''). ">2 TB</option>
                <option value='1 TB' " . ($row['storage_capacity'] == '1 TB' ? 'selected' : ''). ">1 TB</option>
                <option value='256GB SSD' " . ($row['storage_capacity'] == '256GB SSD' ? 'selected' : ''). ">256GB SSD</option>
                <option value='1TB SSD' " . ($row['storage_capacity'] == '1TB SSD' ? 'selected' : ''). ">1TB SSD</option>
                <option value='512GB SSD' " . ($row['storage_capacity'] == '512GB SSD' ? 'selected' : ''). ">512GB SSD</option>
                <option value='32GB eMMC' " . ($row['storage_capacity'] == '32GB eMMC' ? 'selected' : ''). ">32GB eMMC</option>
                <option value='4 TB' " . ($row['storage_capacity'] == '4 TB' ? 'selected' : ''). ">4 TB</option>
                <option value='64GB eMMC' " . ($row['storage_capacity'] == '64GB eMMC' ? 'selected' : ''). ">64GB eMMC</option>
                <option value='1TB + 1TB SSD' " . ($row['storage_capacity'] == '1TB + 1TB SSD' ? 'selected' : ''). ">1TB + 1TB SSD</option>
                <option value='128GB SSD' " . ($row['storage_capacity'] == '128GB SSD' ? 'selected' : ''). ">128GB SSD</option>
            </select><br>
            <label for='operating_system'>Operating System:</label>
            <select name='operating_system' required>
                <option value='Windows 10' " . ($row['operating_system'] == 'Windows 10' ? 'selected' : ''). ">Windows 10</option>
                <option value='Mac OS' " . ($row['operating_system'] == 'Mac OS' ? 'selected' : ''). ">Mac OS</option>
                <option value=''Windows 11' " . ($row['operating_system'] == 'Windows 11' ? 'selected' : ''). ">Windows 11</option>
                <option value='Ubuntu' " . ($row['operating_system'] == 'Ubuntu' ? 'selected' : ''). ">Ubuntu</option>
                <option value='Non-OS' " . ($row['operating_system'] == 'Non-OS' ? 'selected' : ''). ">Non-OS</option>
                <option value='Fedora' " . ($row['operating_system'] == 'Fedora' ? 'selected' : ''). ">Fedora</option>
                <option value='Windows 11 Pro' " . ($row['operating_system'] == 'Windows 11 Pro' ? 'selected' : ''). ">Windows 11 Pro</option>
                <option value='Linux' " . ($row['operating_system'] == 'Linux' ? 'selected' : ''). ">Linux</option>
                <option value='FreeDos' " . ($row['operating_system'] == 'FreeDos' ? 'selected' : ''). ">FreeDos</option>
                <option value='OFFICE HOME' " . ($row['operating_system'] == 'OFFICE HOME' ? 'selected' : ''). ">OFFICE HOME</option>
            </select><br>

            <select name='status' required>
                <option value='Còn hàng' " . ($row['status'] == 'Còn hàng' ? 'selected' : ''). ">Còn hàng</option>
                <option value='Liên hệ' " . ($row['status'] == 'Liên hệ' ? 'selected' : ''). ">Liên hệ</option>
            </select><br>

            <label>Trọng lượng (kg):</label>
            <input type='number' name='weight' step='0.1' value='" . $row['weight'] . "' required><br>
            
            <label>Tình trạng:</label>
            <input type='text' name='status' value='" . $row['status'] . "' required><br>
            
            <label>Khoảng giá:</label>
            <input type='number' name='price_range' step='1000' value='" . $row['price_range'] . "' required ><br>
            
            <input type='text' name='image_url' value='" . $row['image_url'] . "' required hidden ><br>
            
            <input type='submit' value='Lưu'>
            <a class='back-edit-display-laptop' href='display_laptop.php'>Quay lại trang quản lí sản phẩm  </a>
        </form>";
    } else {
        echo "Không tìm thấy sản phẩm có ID $laptop_id.";
    }
} else {
    echo "Không có ID hợp lệ được cung cấp.";
}

$conn->close();
?>
