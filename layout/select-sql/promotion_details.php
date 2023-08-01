<?php
    // Kết nối đến cơ sở dữ liệu
    include 'connect.php';

    // Lấy thông tin chương trình khuyến mãi từ cơ sở dữ liệu
    $promotion_id = $_GET['id']; // Lấy id_promotions từ URL
    $sql = "SELECT * FROM promotions WHERE id_promotions = $promotion_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $title = $row['title'];
      $content = $row['content'];
      $image_path = $row['image_path'];
      $start_date = $row['start_date'];
      $end_date = $row['end_date'];
    } else {
      echo "Không tìm thấy chương trình khuyến mãi.";
      exit;
    }

    $conn->close();
  ?>