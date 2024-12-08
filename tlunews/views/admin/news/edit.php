<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="container mt-5">
    

    <h2 class="text-center mb-4">Cập nhật bài viết</h2>

    <form method="POST" action="index.php?controller=news&action=update&id=<?php echo $news['id']; ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $news['id']; ?>">

        <div class="mb-3">
            <label for="title" class="form-label">Tên hoa</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($news['title']); ?>" required>
        </div>

   
        <div class="mb-3">
            <label for="content" class="form-label">Mô tả</label>
            <textarea name="content" id="content" class="form-control" required><?php echo htmlspecialchars($news['content']); ?></textarea>
        </div>

      
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input class="form-control" type="file" name="image" id="image">
            <small class="form-text text-muted">Nếu không muốn thay đổi hình ảnh, để trống trường này.</small>
        </div>

    
        <div class="mb-3">
            <label for="category_id" class="form-label">Phân loại</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" 
                        <?php echo $news['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

     
        <div class="mb-3">
            <label for="created_at" class="form-label">Ngày tạo</label>
            <input type="text" name="created_at" id="created_at" class="form-control" value="<?php echo htmlspecialchars($news['created_at']); ?>" required readonly>
        </div>

       
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Cập nhật</button>
            <a href="/CongNgheWeb/tlunews/views/admins/news/index.php" class="btn btn-secondary">Hủy bỏ</a>
        </div>
    </form>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
