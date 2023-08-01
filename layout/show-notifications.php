<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương trình khuyến mãi</title>
    <link rel="stylesheet" href="/css/show-notifications.css">
</head>
<body>
<header><?php include 'header.php'; ?></header>
<?php
// Kết nối tới cơ sở dữ liệu MySQL
include 'connect.php';

// Xác định số lượng chương trình khuyến mãi hiển thị trên mỗi trang
$itemsPerPage = 10;

// Xác định trang hiện tại dựa trên tham số 'page' trong URL
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Tính vị trí bắt đầu của chương trình khuyến mãi trong cơ sở dữ liệu
$start = ($page - 1) * $itemsPerPage;

// Truy vấn cơ sở dữ liệu để lấy thông tin chương trình khuyến mãi
$sql = "SELECT `id_promotions`, `image_path`, `start_date`, `end_date`, `title` FROM `promotions` LIMIT $start, $itemsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị thông tin chương trình khuyến mãi vắn tắt
    while ($row = $result->fetch_assoc()) {?>
       <!-- Inside the PHP while loop -->
    <div class='show-notification'>
        <a href='promotion_details.php?id=<?= $row['id_promotions'] ?>'>
            <div class="notification-content">
                <div class="image-container">
                    <img src='/action/<?= $row['image_path'] ?>' alt='<?= $row['title'] ?>' style='max-width: 200px;'>
                </div>
                <div class="notification-details">
                    <h1 class='title'>Tiêu đề: <?= $row['title'] ?></h1>
                    <h1 class='start-date-notifi'>Ngày bắt đầu: <?= $row['start_date'] ?></h1>
                    <h1 class='end-date-notifi'>Ngày kết thúc: <?= $row['end_date'] ?></h1>
                </div>
            </div>
        </a>
    </div>

    
    <?php
    }
    // Tạo các liên kết phân trang
    $sql = "SELECT COUNT(*) AS total FROM `promotions`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalPages = ceil($row['total'] / $itemsPerPage);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            echo "<span>$i</span>";
        } else {
            echo "<a href='?page=$i'>$i</a>";
        }
    }
    echo "</div>";
} else {
    echo "Không có chương trình khuyến mãi nào.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
<footer><?php include 'footer.php'; ?></footer>

</body>
</html>
