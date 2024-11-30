<?php

require 'config/database.php';

if(!isset($_SESSION['user_is_admin'])){
    // Kiểm tra nếu người dùng không phải là admin, chuyển hướng đến trang logout
    header("location: " . ROOT_URL . "logout.php");
    // Hủy tất cả session và chuyển hướng người dùng đến trang đăng nhập
    session_destroy();
}

if(isset($_POST['submit'])){
    // Lấy dữ liệu từ form
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Kiểm tra tính hợp lệ của dữ liệu
    if(!$title){
        $_SESSION['add-category'] = "Nhập tiêu đề";
    } elseif(!$description){
        $_SESSION['add-category'] = "Nhập mô tả";
    }

    // Chuyển hướng lại trang thêm danh mục nếu có lỗi dữ liệu
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        // Thêm danh mục vào cơ sở dữ liệu sử dụng PDO
        try {
            $query = "INSERT INTO categories (title, description) VALUES (:title, :description)";
            $stmt = $connection->prepare($query);

            // Liên kết các tham số
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);

            // Thực thi truy vấn
            if ($stmt->execute()) {
                $_SESSION['add-category-success'] = "Danh mục $title đã được thêm thành công";
                header('location: ' . ROOT_URL . 'admin/manage-categories.php');
            } else {
                $_SESSION['add-category'] = "Không thể thêm danh mục";
                header('location: ' . ROOT_URL . 'admin/add-category.php');
            }
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối cơ sở dữ liệu
            $_SESSION['add-category'] = "Lỗi: " . $e->getMessage();
            header('location: ' . ROOT_URL . 'admin/add-category.php');
        }
    }
}
?>
