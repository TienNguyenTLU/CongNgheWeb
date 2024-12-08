<!DOCTYPE html>
<<<<<<< HEAD
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
        <a class="btn btn-primary" href="index.php?controller=admin&action=logout" role="logout">Đăng xuất</a>
        </div>
</nav>
</ul>
<h1 class = "text-center display-1">Báo vui lên</h1>
<ul class="nav nav-tabs justify-content-center align-items-center">

<div class="container my-5">
        <h1 class="text-center text-primary">Quản lý các bài viết</h1>
        <a href="index.php?controller=news&action=add" class="btn btn-success">Thêm bài viết mới</a>
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

                    <?php
                    $i = 1;
                     foreach ($news as $item): ?>
                    <tr>
                    <td><?php echo $i  ?></td>
                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                    <td><?php echo htmlspecialchars($item['content']); ?></td>
                    <td><?php echo htmlspecialchars($item['image']); ?></td>
                    <td><?php echo htmlspecialchars($item['category_id']); ?></td>
                    <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                    <td><a href="#"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="index.php?controller=news&action=detail&id=<?php echo $item['id']; ?>"><i class="bi bi-eye"></i></a></td>
                    <td><a href="index.php?controller=news&action=edit&id=<?php echo $item['id']; ?>"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="index.php?controller=news&action=delete&id=<?php echo $item['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');"> <i class="bi bi-trash"></i> </a>
                    </tr>  
                    <?php $i++; ?>      
                    <?php endforeach; ?>
            </thead>

        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>





</html>
=======
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">News Detail</h2>
        <?php if (isset($news)): ?>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <!-- Title: 30% width -->
                        <div class="col-md-4">
                            <strong>Title:</strong>
                        </div>
                        <!-- Title Content: 70% width -->
                        <div class="col-md-8">
                            <?php echo $news['title']; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Category:</strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $news['category_name']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Created At:</strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $news['created_at']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Content:</strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $news['content']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Image:</strong>
                        </div>
                        <div class="col-md-8">
                        <?php if (!empty($news['image'])): ?>
                            <img src="images/<?php echo $news['image']; ?>" alt="News Image" class="img-fluid" width="100" height="100">
                        <?php else: ?>
                            <p>No Image</p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="index.php?controller=news&action=index" class="btn btn-secondary btn-sm">Back to News List</a>
                    <a href="index.php?controller=news&action=edit&id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3" role="alert">
                News not found!
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> origin/Trong
