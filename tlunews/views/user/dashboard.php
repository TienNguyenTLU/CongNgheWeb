<?php
// Kết nối CSDL sử dụng PDO
$host = 'localhost';  // Tên máy chủ CSDL
$dbname = 'tintuc';  // Tên CSDL
$username = 'root';  // Tên người dùng CSDL
$password = '';  // Mật khẩu CSDL

try {
    // Tạo kết nối PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Thiết lập chế độ báo lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Nếu kết nối thất bại, hiển thị thông báo lỗi
    die("Kết nối thất bại: " . $e->getMessage());
}

// Kiểm tra xem có giá trị tìm kiếm trong URL hay không
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Truy vấn dữ liệu từ bảng news với điều kiện tìm kiếm theo title
$sql = "SELECT * FROM news WHERE title LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->execute(['search' => '%' . $search . '%']);  // Tìm kiếm bài viết có title chứa từ khóa

// Lấy tất cả dữ liệu dưới dạng mảng
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center mb-4">Danh sách bài viết</h1>
        
        <!-- Form tìm kiếm -->
        <form action="" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tiêu đề..." value="<?php echo htmlspecialchars($search); ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <div class="row">
            <?php 
            // Kiểm tra xem có bài viết nào hay không
            if (!empty($news)): 
                foreach ($news as $article): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <!-- Kiểm tra nếu bài viết có ảnh -->
                            <img src="<?php echo $article['image']; ?>" class="card-img-top" alt="Hình ảnh bài viết">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $article['title']; ?></h5>
                                <p class="card-text"><?php echo $article['content']; ?></p>
                                <!-- Thêm link dẫn đến chi tiết bài viết -->
                                <a href="index.php?controller=home&action=detail&id=<?php echo $article['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; 
            else: ?>
                <p class="text-center">Không có bài viết nào phù hợp với từ khóa tìm kiếm.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
