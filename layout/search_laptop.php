<!DOCTYPE html>
<html>
<head>
    <title>Kết quả tìm kiếm</title>
  <link rel="stylesheet" href="/css/search_laptop.css">

</head>
<body>
    <header>
        <?php include_once 'header.php'; ?>
        
    </header>

    <?php
    // Kết nối đến cơ sở dữ liệu
    include_once 'connect.php';

    // Xử lý tìm kiếm khi nhấn nút Tìm kiếm
    if (isset($_POST['search'])) {
        $search_term = $_POST['search_term'];
        $sql = "SELECT * FROM laptops WHERE laptop_name LIKE '%$search_term%'";
        $result = mysqli_query($conn, $sql);

        // Lấy toàn bộ dữ liệu từ cơ sở dữ liệu và lưu vào một mảng
        $productsArray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $productsArray[] = $row;
        }

        $totalProducts = count($productsArray);

        if ($totalProducts > 0) {
            echo "<div class='laptop-container'>"; // Thêm container cho tất cả sản phẩm
            // Xử lý việc chỉ hiển thị các sản phẩm
            foreach ($productsArray as $key => $row) {
                $displayStyle = ($key < 20) ? "block" : "none"; // Hiển thị 20 sản phẩm đầu tiên
                echo "<div class='laptop' style='display: $displayStyle;'>";
                echo "<a href='/layout/product_details.php?id=" . $row['id'] . "'>"; // Link to product details page

                // Hiển thị thông tin ảnh sản phẩm
                if (!empty($row['image_url'])) {
                    echo "<img src='/action/" . $row['image_url'] . "' alt='Laptop Image'>";
                } else {
                    echo "<img src='/img/laptop.png' alt='Default Image'>";
                }
                echo "<p> <strong>" . $row['laptop_name'] . "</strong></p>";
                echo "<p>" . $row['price_range'] . " </p>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";

            if ($totalProducts > 20) {
                // Add a "Xem thêm" button
                echo "<button id='loadMoreBtn'>Xem thêm</button>";
            } else {
                echo "<p class='show_all'>Đã hiển thị tất cả kết quả.</p>";
            }
        } else {
            echo "<p class='result'>Không tìm thấy kết quả.</p>";
        }
    } else {
        echo "<p class='result'>Vui lòng nhập từ khóa tìm kiếm.</p>";
    }

    // Đóng kết nối
    mysqli_close($conn);
    ?>
    <footer><?php include_once 'footer.php'; ?></footer>
    <script src="/js/search.js" >

    </script>
</body>
</html>
