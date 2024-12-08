<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">

    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Bạn có chắc muốn xóa hay không</h2>
        </div>
        <div class="card-body">
            <p><strong>Tiêu đề:</strong> <?php echo htmlspecialchars($news['title']); ?></p>
            <p><strong>Nội dung:</strong> <?php echo htmlspecialchars($news['content']); ?></p>
            <p><strong>Thời gian tạo:</strong> <?php echo htmlspecialchars($news['created_at']); ?></p>

            <div class="text-center">
                <a href="index.php?controller=news&action=destroy&id=<?php echo $news['id']; ?>" class="btn btn-danger">Có</a>
                <a href="index.php?controller=admin&action=index" class="btn btn-secondary">Không</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
