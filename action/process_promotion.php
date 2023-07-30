<?php
// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nếu các trường cần thiết được điền đầy đủ
    if (
        isset($_POST['title']) && isset($_POST['content']) && isset($_POST['start_date'])
        && isset($_POST['end_date']) && isset($_FILES['image']['name'])
    ) {
        // Kết nối tới cơ sở dữ liệu MySQL
    include 'connect.php';

        // Chuẩn bị các giá trị để lưu vào cơ sở dữ liệu (chúng ta sẽ xử lý đường dẫn hình ảnh sau)
        $title = $_POST['title'];
        $content = $_POST['content'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Xử lý hình ảnh
        $image_path = "img/"; // Thư mục lưu trữ hình ảnh
        $target_file = $image_path . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem tệp tin là hình ảnh thực sự hay không
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("Tệp tin không phải là hình ảnh.");
        }

        // Kiểm tra nếu tệp tin đã tồn tại trong thư mục lưu trữ
        if (file_exists($target_file)) {
            die("Hình ảnh đã tồn tại.");
        }

        // Giới hạn kích thước tối đa của hình ảnh (ví dụ: 5MB)
        $max_file_size = 5 * 1024 * 1024;
        if ($_FILES["image"]["size"] > $max_file_size) {
            die("Hình ảnh quá lớn. Vui lòng chọn hình ảnh nhỏ hơn 5MB.");
        }

        // Cho phép các loại hình ảnh có phần mở rộng sau: jpeg, jpg, png, gif
        $allowed_extensions = array("jpeg", "jpg", "png", "gif");
        if (!in_array($imageFileType, $allowed_extensions)) {
            die("Chỉ cho phép tải lên các hình ảnh có định dạng JPEG, JPG, PNG hoặc GIF.");
        }

        // Di chuyển hình ảnh tải lên vào thư mục lưu trữ
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Lưu thông tin chương trình khuyến mãi vào cơ sở dữ liệu
            $sql = "INSERT INTO promotions (title, content, image_path, start_date, end_date)
                    VALUES ('$title', '$content', '$target_file', '$start_date', '$end_date')";

            if ($conn->query($sql) === true) {
                echo "Chương trình khuyến mãi đã được thêm thành công.";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
        }

        // Đóng kết nối cơ sở dữ liệu
        $conn->close();
    } else {
        echo "Vui lòng điền đầy đủ thông tin chương trình khuyến mãi.";
    }
}
?>
