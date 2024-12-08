<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <nav class="nav justify-content-center">
        <div class="position-absolute top-0 end-0 p-2">
            <a class="btn btn-primary" href="index.php?controller=admin&action=logout" role="logout">Đăng xuất</a>
        </div>
    </nav>


    <div class="container my-5">
        <h1 class="text-center text-primary">Quản lý các bài viết</h1>
        <a href="index.php?controller=news&action=add" class="btn btn-success mb-3">Thêm bài viết mới</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Hình ảnh</th>
                    <th>Phân loại</th>
                    <th>Ngày tạo</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['content']; ?></td>
                    <td>
                        <?php if (!empty($item['image'])): ?>
                            <img src="images/<?php echo $item['image']; ?>" alt="News Image" width="70" height="70">
                        <?php else: ?>
                            <p>No Image</p>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $item['category_name']; ?></td>
                    <td><?php echo $item['created_at']; ?></td>
                    <td>
                    <td><a href="index.php?controller=news&action=detail&id=<?php echo $item['id']; ?>"><i class="bi bi-eye"></i></a></td>
                    <td><a href="index.php?controller=news&action=edit&id=<?php echo $item['id']; ?>"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="index.php?controller=news&action=delete&id=<?php echo $item['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');"> <i class="bi bi-trash"></i> </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                    <a class="page-link" href="index.php?controller=news&action=index&page=<?php echo $currentPage - 1; ?>">Trước</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?controller=news&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php echo $currentPage == $totalPages ? 'disabled' : ''; ?>">
                    <a class="page-link" href="index.php?controller=news&action=index&page=<?php echo $currentPage + 1; ?>">Sau</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
