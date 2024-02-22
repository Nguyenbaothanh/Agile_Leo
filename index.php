<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/bootstrap_dropdown.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="/js/script.js"></script>
</head>

<body>
    <header>
        <div id="t-header">
            <a href="/index.php" class="logo"><img src="/img/WebLogo.png" style="width:70px"></a>
            <div class="parent-container">
                <div class="search-bar">
                    <form action="/layout/search_laptop.php" method="post">
                        <?php
                        $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';
                        ?>
                        <input type="text" placeholder="Tìm kiếm..." name="search_term"
                            value="<?php echo htmlspecialchars($search_term); ?>">
                        <button type="submit" name="search">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="notifications">
                <a href="/layout/PromotionController.php" style="color:#fff;">Chương trình khuyến mãi</a>
            </div>
            <div class="fiter">
                <a href="/layout/filter.php" style="color:#fff;">Bộ lọc tìm kiếm</a>
            </div>
            <div class="user-info">
                <?php
                session_start();
                if (isset($_SESSION['user_id'])) {
                    // Đã đăng nhập, hiển thị dropdown menu cho người dùng đã đăng nhập
                    ?>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tên
                            người dùng <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/layout/profile.php">Thông tin người dùng</a></li>
                            <?php if ($_SESSION['type'] === 'user'): ?>
                                <li><a href="/layout/cart.php">Giỏ hàng</a></li>
                                <li><a href="/layout/order-user.php">Đơn hàng đã đặt</a></li>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] === 'admin'): ?>
                                <li><a href="/layout/view/admin_dashboard.php">Dashboard Admin</a></li>
                                <li><a href="/layout/cart.php">Giỏ hàng</a></li>
                                <li><a href="/layout/order-user.php">Đơn hàng đã đặt</a></li>
                            <?php endif; ?>
                            <li><a href="/layout/logout.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <?php
                } else {
                    // Chưa đăng nhập, hiển thị liên kết đăng nhập và đăng ký dưới dạng button
                    echo '<button class="auth-btn" onclick="openModal(\'login\')">Đăng nhập</button>';
                    echo '<button class="auth-btn" onclick="openModal(\'register\')">Đăng ký</button>';
                }
                ?>
                <div id="modal-login" class="modal">
                    <div class="modal-content">
                        <?php include 'layout/login.html'; ?>
                    </div>
                </div>

                <!-- Modal for register -->
                <div id="modal-register" class="modal">
                    <div class="modal-content">
                        <?php include 'layout/register.html'; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?php include 'slide-image.php'; ?>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'Agile');

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the laptop data (laptop_name, price_range, and image_url) from the database
        $sql = "SELECT laptop_name, price_range, image_url,id FROM laptops";
        $result = $conn->query($sql);
        $productsArray = array();
        while ($row = $result->fetch_assoc()) {
            $productsArray[] = $row;
        }
        include_once 'ProductController.php';
        define('SERVER_PATH', 'action/');
        $productController = new ProductController($productsArray);
        $totalProducts = $productController->getTotalProducts();
        if ($totalProducts > 0) {
            $productsToDisplay = $productController->getProductsForCurrentPage();

            foreach ($productsToDisplay as $row) {
                echo "<div class='laptop'>";
                echo "<a href='/layout/product_details.php?id=" . $row['id'] . "'>"; // Link to product details page
                // Hiển thị thông tin ảnh sản phẩm
                if (!empty($row['image_url'])) {
                    echo "<img src='" . SERVER_PATH . $row['image_url'] . "' alt='Laptop Image'>";
                } else {
                    echo "<img src='img/laptop.png' alt='Default Image'>";
                }
                $formatted_price_range = number_format($row['price_range'], 0, '.', ',');
                echo "<p>" . $formatted_price_range . " đ</p>";
                echo "<p><strong>" . $row['laptop_name'] . "</strong></p>";

                echo "</a>";
                echo "</div>";
            }

            $totalPages = $productController->getTotalPages();
            echo "<div class='clearfix'></div>";
            // Hiển thị page links
            echo "<div class='pagination'>";
            $currentPage = $productController->getCurrentPage();
            if ($currentPage > 1) {
                echo "<a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a> ";
            }

            for ($page = 1; $page <= $totalPages; $page++) {
                echo "<a class='page-link' href='?page=" . $page . "'>" . $page . "</a> ";
            }

            if ($currentPage < $totalPages) {
                echo "<a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a>";
            }
            echo "</div>";
        } else {
            echo "<p>Hiện không có Laptop Nào</p>";
        }
        ?>
        </div>
    </main>
    <footer>
        <div class="copy-right">
            <p class="footer-index"><a class="footer-index" href="index.html">LDD Phone Store</a> - All rights reserved
                © 2021 - Designed by
                <span class="footer-index">group US</span>
            </p>
        </div>
    </footer>
</body>

</html>