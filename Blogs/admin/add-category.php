<?php
include "partials/header.php";

// Kiểm tra xem người dùng có phải là admin không, nếu không thì đăng xuất
if (!isset($_SESSION['user_is_admin'])) {
    header("location: " . ROOT_URL . "logout.php");
    // Huỷ tất cả session và chuyển hướng người dùng về trang đăng nhập
    session_destroy();
}

// Lấy dữ liệu đã nhập vào form từ session (nếu có)
$title = $_SESSION["add-category-data"]['title'] ?? null;
$description = $_SESSION["add-category-data"]['description'] ?? null;

// Xóa dữ liệu đã lưu trong session để tránh hiện lại khi refresh trang
unset($_SESSION['add-category-data']);
?>

<section class="form__section">

    <div class="container form__section-container">
        <h2>Add Category</h2>

        <?php if (isset($_SESSION['add-category'])): ?>
        <div class="alert__message error">
            <p>
                <?php 
                    echo $_SESSION['add-category'];
                    unset($_SESSION['add-category']); // Xóa thông báo lỗi sau khi hiển thị
                ?>
            </p>
        </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
            <input type="text" name="title" value="<?=$title?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?=$description?></textarea>

            <button type="submit" name="submit" class="btn">Add Category</button>
        </form>
    </div>

</section>

<?php
include "../partials/footer.php";
?>
