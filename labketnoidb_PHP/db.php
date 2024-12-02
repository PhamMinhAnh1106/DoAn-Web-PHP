<?php
//buoc 1
try {
    $pdo = new PDO("mysql:host=localhost; dbname=bookstore", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
    //die("Co loi xay ra");
}

//echo "Ket noi thanh cong";

//Buoc 2: Cau truy van
// $sql="select * from loai where maloai='th'";

$ma = 'th';
// $sql="select * from loai where maloai=:ma";
$sql = "select * from sach where gia>=? and gia<=?";
// $sql="select * from sach where gia>=:gia1 and gia<=:gia2";
//Buoc 3: Thuc thi cau truy van
//Cach 1
// $stmt=$pdo->query($sql);

//Cach 2
$stmt = $pdo->prepare($sql);
// $stmt->bindValue("ma",$ma);
// $stmt->bindParam("ma",'th');
// $stmt->bindValue(1,100000);
// $stmt->bindValue(2,200000);
$ma = 'td';
// $stmt->execute();
$stmt->execute(array(50000, 2000000));

//Buoc 4: Xu ly ket qua tra ve
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $loai) {
    echo $loai['masach'], " - ", $loai['tensach'], "<br>";
}
