<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="nav justify-content-center">
    <!-- Di chuyển nút đăng xuất sang bên phải bằng cách thêm lớp ms-auto (hoặc ml-auto trong Bootstrap 4) -->
    <div class="ms-auto p-2">
        <a class="btn btn-primary" href="index.php?controller=admin&action=logout" role="logout">Đăng xuất</a>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center text-primary">Thông tin bài viết</h2>
    <?php if (isset($news)): ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <!-- Title: 30% width -->
                    <div class="col-md-4">
                        <strong>Tiêu đề:</strong>
                    </div>
                    <!-- Title Content: 70% width -->
                    <div class="col-md-8">
                        <?php echo htmlspecialchars($news['title']); ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <strong>Phân loại:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo htmlspecialchars($news['category_name']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <strong>Thời gian tạo:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo htmlspecialchars($news['created_at']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <strong>Nội dung:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo nl2br(htmlspecialchars($news['content'])); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <strong>Hình ảnh:</strong>
                    </div>
                    <div class="col-md-8">
                    <?php if (!empty($news['image'])): ?>
                        <img src="images/<?php echo htmlspecialchars($news['image']); ?>" alt="News Image" class="img-fluid" width="100" height="100">
                    <?php else: ?>
                        <p>No Image</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="index.php?controller=news&action=index" class="btn btn-secondary btn-sm">Quay lại</a>
                <a href="index.php?controller=news&action=edit&id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger mt-3" role="alert">
            Bài viết không tồn tại!
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
