<?php
$sach1trang=10;
try
{
$pdo=new PDO("mysql:host=localhost;dbname=bookstore","root","root");
$pdo->query("set names utf8");
$sql="select count(*) from sach";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$tongsosach=$stmt->fetchColumn();
$tongsotrang=ceil($tongsosach/$sach1trang);
$page=1;
if(isset($_GET['page']))
    $page=$_GET['page'];
$bat_dau=($page-1)*$sach1trang;

$sql="select * from sach limit ".$bat_dau.", ".$sach1trang;
$stmt=$pdo->prepare($sql);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    echo $row['tensach']."<br>";

//Xuat phan trang
for($i=1;$i<=$tongsotrang;$i++)
    echo "<a href='phantrang.php?page=".$i."'>".$i."</a> ";
}catch(PDOException $e)
{
    echo $e->getMessage();
}
    