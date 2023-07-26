<!DOCTYPE html>
<html>
<head>
    <title>Sửa người dùng</title>
    <link rel="stylesheet" href="/css/edit_user.css">
</head>
<body>
    <?php
    // Kết nối đến cơ sở dữ liệu (giữ nguyên đoạn kết nối đã sử dụng ở trang display_users.php)
    include_once 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $user_id = $_GET["id"];

        // Lấy thông tin người dùng từ cơ sở dữ liệu dựa trên ID
        $sql = "SELECT * FROM users WHERE id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
    ?>
            <h1>Sửa người dùng</h1>

            <form action="/action/process_edit_user.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                <br>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password">
                <br>
                <label for="full_name">Họ và tên:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>">
                <br>
                <label for="sex">Giới tính:</label>
                <select id="sex" name="sex">
                    <option value="Male" <?php if ($row['sex'] == 'Male') echo 'selected'; ?>>Nam</option>
                    <option value="Female" <?php if ($row['sex'] == 'Female') echo 'selected'; ?>>Nữ</option>
                </select>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                <br>
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>">
                <br>
                <input type="submit" value="Lưu">
            </form>

            <br>
            <a href="/layout/display_users.php">Quay lại danh sách người dùng</a>
    <?php
        } else {
            echo "Không tìm thấy người dùng.";
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
    ?>
</body>
</html>
