<?php
require 'constants.php';

try {
    $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->exec("set names utf8");
} catch (PDOException $e) {
    // Hiển thị lỗi và dừng chương trình
    die("Connection failed! " );
}
?>
