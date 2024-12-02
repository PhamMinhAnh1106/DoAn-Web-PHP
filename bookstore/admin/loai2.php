<?php
include_once("../classes/Loai.class.php");
$loaiDB=new Loai;
if(isset($_POST['btnAdd']))
{
	if($loaiDB->them($_POST['txtMaLoai'],$_POST['txtTenLoai'])>0)
		//echo "them thanh cong";
        $message="them thanh cong";
	else
		//echo "Them ko thanh cong";
        $message="Them ko thanh cong";
}
else if(isset($_POST['btnLuu']))
{
	if($loaiDB->sua($_POST['txtMaLoai'],$_POST['txtTenLoai'])>0)
		//echo "Sua thanh cong";
        $message="Sua thanh cong";
	else
		//echo "Sua ko thanh cong";
        $message="Sua ko thanh cong";
}
else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="xoa") //thuc hien xoa
{
	if($loaiDB->xoa($_GET['ml'])>0) //xoa thanh cong
	{
	?>
    	<script>alert("Xoa thanh cong");</script>
    <?php
	}else
	{
	?>
    <script>alert("Khong duoc xoa vi co sach");</script>
    <?php
	}
}else if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua")
{
	$loaisua=$loaiDB->thongTin1Loai($_GET['ml']);
}
$dsloai=$loaiDB->tatCa();
?>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Ma loại</th>
            <th>Tên loại</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dsloai as  $loai) {
        ?>
        <tr>
            <td><?php echo $loai['maloai'] ?></td>
            <td><?php echo $loai['tenloai'] ?></td>
            <td><img src="img/edit-icon.gif" width="16" height="16" alt="" /></td>
            <td><img src="img/hr.gif" width="16" height="16" alt="add" /></td>
        </tr>
        <?php } ?>
    </tbody>    
</table>
<br>
<div id="message"><?php if(isset($message)) echo $message; ?></div>
<div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
<form action="" method="post">
        	<input type="hidden" name="mo" value="loai" />    
    <table class="listing form" cellpadding="0" cellspacing="0">
        <tr>
            <th class="full" colspan="2">Thêm loại mới</th>
        </tr>
        <tr>
        <td class="first" width="172"><strong>Mã loại</strong></td>
        <td class="last"><input type="text" class="text" name="txtMaLoai" /></td>
        </tr>
        <tr class="bg">
        <td class="first"><strong>Tên loại</strong></td>
        <td class="last"><input type="text" class="text" name="txtTenLoai" /></td>
        </tr>
        
        <tr class="bg">
        <td class="first"></td>
        <td class="last">
            <input type="submit" value="Thêm" name="btnAdd">
        </td>
        
        </tr>
    </table>
</form>
    <p>&nbsp;</p>
</div>