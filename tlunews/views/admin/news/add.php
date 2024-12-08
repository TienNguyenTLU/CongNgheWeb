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
<div class="container">
        <h1 class="text-primary text-center">Thêm bài viết mới</h1>
        
 
        <form method="POST" action="index.php?controller=news&action=store">
            <bclass="mb-3">
                <label for="inputTitle" class="form-label">Bài viết</label>
                <input type="text" name="tiltle" placeholder="Tiêu đề" required></br>
            </div>
            <div class="mb-3">
                <label for="inputContent" class="form-label">Nội dung</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="text" name="image" placeholder="Ảnh tin tức" required></br>
            </div>
                <div class="mb-3">
                <label for="category_id">phân loại:</label>
                <select name="category_id" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select><br>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Ngày tạo</label>
                <input type="date" name="inputCreated_at" placeholder="Ngày tạo" required></br>
         
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        
                <button class="btn btn-primary btn-custom" type="submit">Thêm</button>
        
                <a href="/CongNgheWeb/tlunews/views/admins/news/index.php" class="btn btn-secondary btn-custom" id="cancel">Hủy bỏ</a>
            </div>
        </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>





</html> 