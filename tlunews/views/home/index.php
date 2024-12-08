<!-- views/home/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <h1>Danh sách tin tức</h1>
    <ul>
        <?php foreach ($news as $item): ?>
            <li><?php echo htmlspecialchars($item['title']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
