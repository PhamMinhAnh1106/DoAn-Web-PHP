<?php
try {
    $pdo = new PDO("mysql:host=localhost; dbname=bookstore", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
    //die("Co loi xay ra");
}
$sql="select * from loai";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $loai) {
    echo $loai['maloai'], " - ", $loai['tenloai'], "<br>";
    // $sql="select masach,tensach from sach where maloai='".$loai['maloai']."'";
    $sql="select masach,tensach from sach where maloai=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($loai['maloai']));
    $sachs=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($sachs as $sach)
    {
        echo "&nbsp;&nbsp;&nbsp;";
        echo implode("-",$sach),"<br>";
    }
}