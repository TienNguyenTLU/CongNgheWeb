<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    

</head>
<body class="contrainer mt-4">
<ul class="nav justify-content-center">

<div class="btn-group justify-content-center align-items-center" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-light">U.S</button>
  <button type="button" class="btn btn-light">INTERNATIONAL</button>
  <button type="button" class="btn btn-light">CANADA</button>
  <button type="button" class="btn btn-light">ESPANOL</button>
  <button type="button" class="btn btn-light">中文</button>
</div>
<div class="position-absolute top-0 end-0 p-2">
        <div class="d-flex align-items-end">
        <a class="btn btn-primary" href="/CongNgheWeb/tlunews/views/admins/login.php" role="logout">Đăng xuất</a>
        </div>
</nav>
</ul>
<h1 class = "text-center display-1">Báo vui lên</h1>
<ul class="nav nav-tabs justify-content-center align-items-center">

<div class="container my-5">
        <h1 class="text-center text-primary">Quản lý các bài viết</h1>
        <a href="/CongNgheWeb/tlunews/views/admins/news/add.php" class="btn btn-success">Thêm bài viết mới</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Hình ảnh</th>  
                    <th>Phân loại</th>
                    <th>Ngày tạo</th>
                    </tr>
                    <?php $i = 1 + ($page - 1) * $limit; ?>
                    <?php foreach ($news as $item): ?>
                    <tr>
                    <td><?php echo $i  ?></td>
                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                    <td><?php echo htmlspecialchars($item['content']); ?></td>
                    <td><?php echo htmlspecialchars($item['images']); ?></td>
                    <td><?php echo htmlspecialchars($item['category_id']); ?></td>
                    <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                    <td><a href="index.php?controller=news&action=detail&id=<?php echo $item['id']; ?>"><i class="bi bi-eye"></i></a></td>
                    <td><a href="index.php?controller=news&action=edit&id=<?php echo $item['id']; ?>"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="index.php?controller=news&action=delete&id=<?php echo $item['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');"> <i class="bi bi-trash"></i> </a>
                    </tr>  
                    <?php $i++; ?>      
                    <?php endforeach; ?>
            </thead>

        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . ($page - 1); } ?>">Trước</a>
                </li>
                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if($page == $i) { echo 'active'; } ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
                    <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=" . ($page + 1); } ?>">Sau</a>
                </li>
            </ul>
        </nav>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>





</html>

