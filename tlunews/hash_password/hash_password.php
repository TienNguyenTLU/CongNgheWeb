<?php
    require_once '../models/Database.php';

    $db = new Database();
    $con = $db->getCon();
    $sql = "SELECT id, password FROM users";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
        $updateSql = "UPDATE users SET password = :password WHERE id = :id";
        $updateStmt = $con->prepare($updateSql);
        $updateStmt->bindParam(':password', $hashedPassword);
        $updateStmt->bindParam(':id', $user['id']);
        $updateStmt->execute();
    }
    echo "Mật khẩu đã được mã hóa thành công!";
?>