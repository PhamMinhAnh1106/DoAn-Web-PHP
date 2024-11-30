<?php
require "config/database.php";

// Kiểm tra quyền admin
if (!isset($_SESSION['user_is_admin'])) {
    header("location: " . ROOT_URL . "logout.php");
    session_destroy(); // Hủy tất cả session và chuyển hướng về trang đăng nhập
    die();
}

if (isset($_POST['submit'])) {
    // Lọc và làm sạch dữ liệu từ form
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Kiểm tra nếu title hoặc description bị thiếu
    if (!$title || !$description) {
        $_SESSION['edit-category'] = "Invalid form input on edit category page";
    } else {
        try {
            // Cập nhật danh mục
            $query = "UPDATE categories SET title = :title, description = :description WHERE id = :id LIMIT 1";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Kiểm tra nếu cập nhật thành công
            if ($stmt->rowCount() > 0) {
                $_SESSION['edit-category-success'] = "$title Category was updated successfully";
            } else {
                $_SESSION['edit-category'] = "No changes made to the category";
            }
        } catch (PDOException $e) {
            // Xử lý lỗi PDO
            $_SESSION['edit-category'] = "Couldn't update category: " . $e->getMessage();
        }
    }
}

// Chuyển hướng về trang quản lý danh mục
header('location: ' . ROOT_URL . "admin/manage-categories.php");
die();
?>
