<?php
include "config/database.php";

// Kiểm tra quyền admin
if (!isset($_SESSION['user_is_admin'])) {
    header("location: " . ROOT_URL . "logout.php");
    session_destroy(); // Hủy tất cả session và chuyển hướng về trang đăng nhập
    die();
}

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    try {
        // Cập nhật bài viết có category_id bằng id được chọn thành "uncategorized"
        $update_query = "UPDATE posts SET category_id = 2 WHERE category_id = :id";
        $stmt = $connection->prepare($update_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Kiểm tra nếu cập nhật thành công, tiến hành xóa category
        if ($stmt->rowCount() > 0) {
            $delete_query = "DELETE FROM categories WHERE id = :id LIMIT 1";
            $stmt = $connection->prepare($delete_query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $_SESSION['edit-category-success'] = "Category was deleted successfully";
            header("location: " . ROOT_URL . "admin/manage-categories.php");
            die();
        } else {
            $_SESSION['edit-category'] = "No posts found with this category.";
            header("location: " . ROOT_URL . "admin/manage-categories.php");
            die();
        }
    } catch (PDOException $e) {
        // Xử lý lỗi PDO
        $_SESSION['edit-category'] = "Error: " . $e->getMessage();
        header("location: " . ROOT_URL . "admin/manage-categories.php");
        die();
    }

} else {
    header("location: " . ROOT_URL . "admin/manage-categories.php");
    die();
}
?>
