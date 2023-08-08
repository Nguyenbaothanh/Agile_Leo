<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Header</title>
  <link rel="stylesheet" href="/css/header.css">


</head>
<body>
  <header>
    <a href="/index.php" class="logo"><img src="/img/WebLogo.png" style="width:70px"></a>
    <div class="parent-container">
    <div class="search-bar">
      <form action="/layout/search_laptop.php" method="post">
          <?php
          // Kiểm tra nếu có từ khóa tìm kiếm được gửi từ form
          $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';
          ?>
          <input type="text" placeholder="Tìm kiếm..." name="search_term" value="<?php echo htmlspecialchars($search_term); ?>">
          <button type="submit" name="search">Tìm kiếm</button>
      </form>
  </div>
</div>
<div class="notifications">
        <a href="/layout/show-notifications.php" style="margin:10px;color:#fff;padding:10px;text-align:center;">Chương trình khuyến mãi</a>
  </div>
  <div class="fiter">
        <a href="/layout/filter.php" style="margin:10px;color:#fff;padding:10px;text-align:center;">Bộ lọc tìm kiếm</a>
  </div>
    <div class="user-info">
    <?php
      session_start();
      if (isset($_SESSION['user_id'])) {
        // Đã đăng nhập, hiển thị dropdown menu cho người dùng đã đăng nhập
        ?>
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tên người dùng <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a  href="/layout/profile.php">Thông tin người dùng</a></li>       
            <?php if ($_SESSION['type'] === 'user') : ?>
              <li><a href="/layout/cart.php">Giỏ hàng</a></li>
              <li><a href="/layout/order-user.php">Đơn hàng đã đặt</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['type'] === 'admin') : ?>
              <li><a href="/layout/admin_dashboard.php">Dashboard Admin</a></li>
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

    </div>
  </header>

  <!-- Modal for login -->
  <div id="modal-login" class="modal">
    <div class="modal-content">
      <?php include 'layout/login.php'; ?>
    </div>
  </div>

  <!-- Modal for register -->
  <div id="modal-register" class="modal">
    <div class="modal-content">
      <?php include 'layout/register.php'; ?>
    </div>
  </div>

  <!-- JavaScript to handle modal functionality -->
  <script src="/js/header.js" >
    
  </script>
</body>
</html>