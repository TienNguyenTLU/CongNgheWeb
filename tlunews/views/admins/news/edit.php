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
<ul class="nav nav-tabs justify-content-center align-items-center">

<form method="POST" action="index.php?controller=news&action=update&id=<?php echo $news['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $flower['id']; ?>">

            <div class="mb-3">
                <label for="inputTitle" class="form-label">Tên hoa</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $news['title']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="inputContent" class="form-label">Mô tả</label>
                <textarea name="content" id="content" class="form-control" required><?php echo $news['content']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" type="file" name="image" id="image">
                <small class="form-text text-muted">Nếu không muốn thay đổi hình ảnh, để trống trường này.</small>
            </div>

            <div class="mb-3">
            <label for="category_id">Phân loại:</label>
            <select name="category_id" required>
            <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" 
                    <?php echo $news['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                <?php echo $category['id']; ?>
                </option>
            <?php endforeach; ?><br>
            </select>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Tên hoa</label>
                <input type="text" name="created_at" id="created_at" class="form-control" value="<?php echo $news['created_at']; ?>" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary btn-custom" type="submit">Cập nhật</button>
                <a href="/CongNgheWeb/tlunews/views/admins/news/index.php" class="btn btn-secondary btn-custom" id="cancel">Hủy bỏ</a>
            </div>
         

        </form>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>





</html>