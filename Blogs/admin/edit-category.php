<?php
include "partials/header.php";

// Kiểm tra quyền admin
if (!isset($_SESSION['user_is_admin'])) {
    header("location: " . ROOT_URL . "logout.php");
    session_destroy(); // Hủy tất cả session và chuyển hướng về trang đăng nhập
    die();
}

if (isset($_GET['id'])) {
    // Lọc và làm sạch ID từ URL
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    try {
        // Lấy danh mục từ cơ sở dữ liệu
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Kiểm tra xem có kết quả trả về không
        if ($stmt->rowCount() == 1) {
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Nếu không tìm thấy danh mục, chuyển hướng về trang quản lý danh mục
            header("location: " . ROOT_URL . "admin/manage-categories.php");
            die();
        }
    } catch (PDOException $e) {
        // Xử lý lỗi PDO nếu có
        $_SESSION['edit-category'] = "Error fetching category: " . $e->getMessage();
        header("location: " . ROOT_URL . "admin/manage-categories.php");
        die();
    }
} else {
    header("location: " . ROOT_URL . "admin/manage-categories.php");
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?= $category['description'] ?></textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>

<?php
include "../partials/footer.php";
?>
