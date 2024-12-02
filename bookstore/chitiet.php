
<?php 
$sach_db=new Sach;
$chitiet=$sach_db->thongTin1Sach($_GET['ms']);
if(count($chitiet)>0)
    $chitiet=$chitiet[0];
?>
<h1><?php echo $chitiet['tensach'];?></h1>
<div class="image_panel"><img src="images/sach/<?php echo $chitiet['hinh'];?>" alt="CSS Template" width="100" height="150" /></div>
<?php echo $chitiet['mota'];?>
<div class="cleaner_with_height">&nbsp;</div>
<a href="index.html"><img src="images/templatemo_ads.jpg" alt="css template ad" /></a>