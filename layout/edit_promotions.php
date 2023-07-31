<!DOCTYPE html>
<html>
<head>
    <title>Sửa chương trình khuyến mãi</title>
    <link rel="stylesheet" href="/css/edit_promotions.css">
</head>
<body>
    <h1>Sửa chương trình khuyến mãi</h1>
    <?php
    // Kết nối đến cơ sở dữ liệu MySQL
    include 'connect.php';

    // Lấy ID chương trình khuyến mãi cần sửa từ URL
    $id = $_GET['id'];

    // Truy vấn dữ liệu của chương trình khuyến mãi cần sửa
    $sql = "SELECT * FROM promotions WHERE id_promotions = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
    <form method="post" action="/action/process_edit.php">
        <input type="hidden" name="id" value="<?php echo $row['id_promotions']; ?>">
        <label>Tiêu đề:</label><br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
        <label>Nội dung:</label><br>
        <textarea name="content" required><?php echo $row['content']; ?></textarea><br><br>
        <label>Hình ảnh (đường dẫn):</label><br>
        <input type="text" name="image_path" disabled value="<?php echo $row['image_path']; ?>" required><br><br>
        <label>Ngày bắt đầu:</label><br>
        <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" required><br><br>
        <label>Ngày kết thúc:</label><br>
        <input type="date" name="end_date" value="<?php echo $row['end_date']; ?>" required><br><br>
        <input  type="submit" value="Lưu">
        <a href="display_promotions.html">Quay lại danh sách</a>

    </form>
    <?php
    } else {
        echo "Không tìm thấy chương trình khuyến mãi có ID = $id";
    }
    $conn->close();
    ?>
    <br>
</body>
</html>
