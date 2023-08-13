<!-- views/promotions.php -->
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
    <div class="promotion-list">
        <?php foreach ($promotions as $promotion): ?>
            <div class='show-notification'>
                <a href='promotion_details.php?id=<?= $promotion['id_promotions'] ?>'>
                    <div class="notification-content">
                        <div class="image-container">
                        <img src='<?=  $promotion['image_path'] ?>' alt='<?= $promotion['title'] ?>' style='max-width: 200px;'>
                        </div>
                        <div class="notification-details">
                            <h1 class='title'>Tiêu đề: <?= $promotion['title'] ?></h1>
                            <h1 class='start-date-notifi'>Ngày bắt đầu: <?= $promotion['start_date'] ?></h1>
                            <h1 class='end-date-notifi'>Ngày kết thúc: <?= $promotion['end_date'] ?></h1>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i == $page): ?>
                <span><?= $i ?></span>
            <?php else: ?>
                <a href='?page=<?= $i ?>'><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <footer><?php include 'footer.php'; ?></footer>
</body>
</html>
