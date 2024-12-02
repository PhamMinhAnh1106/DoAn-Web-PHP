<!--Loai -->

<?php
include_once("../classes/Loai.class.php");
$loaiDB=new Loai;
if(isset($_POST['btnAdd']))
{
	if($loaiDB->them($_POST['txtMaLoai'],$_POST['txtTenLoai'])>0)
		echo "them thanh cong";
	else
		echo "Them ko thanh cong";
}
else if(isset($_POST['btnLuu']))
{
	if($loaiDB->sua($_POST['txtMaLoai'],$_POST['txtTenLoai'])>0)
		echo "Sua thanh cong";
	else
		echo "Sua ko thanh cong";
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
<div class="select-bar">
        <label>
        <input type="text" name="textfield" />
        </label>
        <label>
        <input type="submit" name="Submit" value="Search" />
        </label>
      </div>
      	<form action="" method="post">
        	<input type="hidden" name="mo" value="loai" />
                  <div class="table" > <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing form" cellpadding="0" cellspacing="0" width="400">
          <tr>
            <th class="full" colspan="2">FORM THEM LOAI MOI</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Ma loai</strong></td>
            <td class="last"><input type="text" class="text" name="txtMaLoai" id="txtMaLoai" value="<?php if(isset($loaisua[0]['maloai'])) echo $loaisua[0]['maloai']; ?>" /></td>
          </tr>
          <tr class="bg">
            <td class="first" width="172"><strong>Ten loai</strong></td>
            <td class="last"><input type="text" class="text" name="txtTenLoai" id="txtTenLoai" value="<?php if(isset($loaisua[0]['maloai'])) echo $loaisua[0]['tenloai']; ?>" /></td>
          </tr>
          <tr>
            <td class="first" colspan="2"><input type="submit"  
            name="<?php if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua") echo "btnLuu"; else
			 echo "btnAdd" ?>" value="<?php if(isset($_REQUEST['ac']) && $_REQUEST['ac']=="sua") echo "Luu"; else
			 echo "Them" ?>" /></td>

          </tr>
 			</table>
            </div>	
      </form>
      <div id="ketqua"></div>
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th class="first" >Mã loại</th>
            <th>Tên loại</th>
            <th>Thêm</th>
            <th>Xóa</th>
            <th>Sửa</th>
          </tr>
          <?php
		  $i=1;
		  foreach($dsloai as $loai)
		  {
		  ?>
          <tr <?php if($i%2==0) echo 'class="bg"' ?>>
            <td ><?php echo $loai['maloai'] ?></td>
            <td><?php echo $loai['tenloai'] ?></td>
            <td><img src="img/add-icon.gif" width="16" height="16" alt="" /></td>
            <td><a href="javascript:xoa('<?php echo $loai['maloai'] ?>')"><img src="img/hr.gif" width="16" height="16" alt="" /></a></td>
            
            <td><a href="index.php?mo=loai&ac=sua&ml=<?php echo $loai['maloai'] ?>"><img src="img/edit-icon.gif" width="16" height="16" alt="" /></a></td>
            
          </tr>
          <?php 
		  	$i++;
		  } ?>
          <!--
          <tr class="bg">
            <td >- Lorem Ipsum </td>
            <td></td>
            <td><img src="img/add-icon.gif" width="16" height="16" alt="add" /></td>
            <td><img src="img/hr.gif" width="16" height="16" alt="" /></td>
      
            <td><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></td>
      
          </tr>
      		-->
        </table>
        <div class="select"> <strong>Other Pages: </strong>
          <select>
            <option>1</option>
          </select>
        </div>
      </div>
<!--end loai -->