<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="container mt-5">
 
    <h2 class="text-center text-primary mb-4">Thêm Tin Tức Mới</h2>


    <form method="POST" action="index.php?controller=news&action=store" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" id="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $title ?? '' ?>" required>
            <?php if (isset($errors['title'])): ?>
                <div class="invalid-feedback"><?= $errors['title'] ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea name="content" id="content" class="form-control <?= isset($errors['content']) ? 'is-invalid' : '' ?>" required><?= $content ?? '' ?></textarea>
            <?php if (isset($errors['content'])): ?>
                <div class="invalid-feedback"><?= $errors['content'] ?></div>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control <?= isset($errors['image']) ? 'is-invalid' : '' ?>" required>
            <?php if (isset($errors['image'])): ?>
                <div class="invalid-feedback"><?= $errors['image'] ?></div>
            <?php endif; ?>
        </div>

  
        <div class="mb-3">
            <label for="category_id" class="form-label">Phân loại</label>
            <select name="category_id" id="category_id" class="form-select <?= isset($errors['category_id']) ? 'is-invalid' : '' ?>" required>
                <?php 
                $categories = [
                    '1' => 'Chính trị',
                    '2' => 'Kinh tế',
                    '3' => 'Văn hóa',
                    '4' => 'Khoa học',
                    '5' => 'Giải trí',
                    '6' => 'Thể thao',
                    '7' => 'Giáo dục',
                    '8' => 'Sức khỏe',
                    '9' => 'Công nghệ',
                    '10' => 'Môi trường'
                ];
                ?>
                <?php foreach ($categories as $id => $name): ?>
                    <option value="<?= $id ?>" <?= ($category_id ?? '') == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['category_id'])): ?>
                <div class="invalid-feedback"><?= $errors['category_id'] ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Ngày tạo</label>
            <input type="date" name="created_at" id="created_at" class="form-control <?= isset($errors['created_at']) ? 'is-invalid' : '' ?>" value="<?= $created_at ?? '' ?>" required>
            <?php if (isset($errors['created_at'])): ?>
                <div class="invalid-feedback"><?= $errors['created_at'] ?></div>
            <?php endif; ?>
        </div>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="index.php?controller=admin&action=index" class="btn btn-secondary">Hủy bỏ</a>
        </div>
    </form>
</body>
</html>
