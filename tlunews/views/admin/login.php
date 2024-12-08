<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>

<h2>Đăng nhập quản trị viên</h2>

<form method="POST" action="index.php?controller=admin&action=login">
    <div>
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Đăng nhập</button>
</form>

<?php
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>

</body>
</html>
