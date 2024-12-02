<script>
function update_cart(ms)
{
  sl=$("#"+ms).val();
  location.href="index.php?mo=cart&ac=update&ms="+ms+"&sl="+sl;
}
</script>
<?php
include_once("classes/Sach.class.php");
$message="";
$sachDB=new Sach;
if(isset($_GET['ac'])&&$_GET['ac']=='add')//Them gio hang
{
  if(isset($_SESSION['cart']))
  {
    
    if(isset($_SESSION['cart'][$_GET['ms']]))//Da co
    {
      $_SESSION['cart'][$_GET['ms']]=$_SESSION['cart'][$_GET['ms']]+1;;
    }
    
    else
      $_SESSION['cart'][$_GET['ms']]=1;
  }else //Gio hang chua co
  {
    $_SESSION['cart']=array($_GET['ms']=>1);
  }
}else if(isset($_GET['ac'])&&$_GET['ac']=='update')//Them gio hang
{
  if($_GET['sl']<=0) //bo sach do ra khoi gio hang
  {
    unset($_SESSION['cart'][$_GET['ms']]);
  }else
  {
    $_SESSION['cart'][$_GET['ms']]=$_GET['sl'];
    echo "Da thay doi"; 
  }
}else if(isset($_POST['btnOrder'])) //Khi nhan nut dat hang
{
  if(isset($_SESSION['user']))
  {
    include_once("classes/Donhang.class.php");
    $donhangDB=new Donhang;
    $kq=$donhangDB->them($_SESSION['user'].time(),$_SESSION['user'],$_POST['txtTen'],$_POST['txtDiaChi'],$_POST['ngayNhan'],$_POST['txtDienThoai']);
    if($kq>0)
    {
      //echo "Đơn hàng đã được tạo<br>";
      //echo "<a href='index.php'>Tiep tuc mua hang</a>";
      $message= "Đơn hàng đã được tạo<br><a href='index.php'>Tiep tuc mua hang</a>";
      unset($_SESSION['cart']);
      ?>
        <script>
          document.getElementById("cartinfo").innerHTML="";
          $("#cartinfo").html("");
        </script>
      <?php
    }
    else
      //echo "Dat ko thanh cong";
      $message="Dat ko thanh cong";
  }else
    //echo "Vui long dang nhap truoc khi dat hang";
    $message="Vui long dang nhap truoc khi dat hang";

}
if(isset($message))
echo "<div>$message</div>";
if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{?>
<div style="text-align:right; font-style:italic">Thiết lập số lượng bằng 0 để xóa</div>
<table border="1" cellspacing="0" id="carttbl">
  <tr>
    <td>STT</td>
    <td>Tên sách</td>
    <td>Hình</td>
    <td>Giá bán</td>
    <td>Số lượng</td>
    <td>Thành tiền</td>
    <td>Cập nhật</td>
  </tr>
  <?php
  $stt=1;
$tongtien=0;
//Cach 1
/*
  foreach ($_SESSION['cart'] as $ms => $sl) {
    //Lay thong tin sach co ma sach la ms
    $sach=$sachDB->thongTin1Sach($ms);
    $sach=$sach[0];//Do ket qua tra ve la mang 2 chieu
    $tongtien+=$sl*$sach['gia'];
  ?>
  <tr>
    <td><?php echo $stt++; ?></td>
    <td><?php echo $sach['tensach'] ?></td>
    <td><img src="images/sach/<?php echo $sach['hinh'] ?>"  width="70"></td>
    <td><?php echo $sach['gia'];?></td>
    <td><?php echo $sl ?></td>
    <td><?php echo $sl*$sach['gia'] ?></td>
  </tr>
  <?php }
  */

  //Cach 2: lay thong tin nhieu sach cung 1 luc
  $arr_ms=array(); //mang chua cac ma sach da co trong gio hang
  foreach ($_SESSION['cart'] as $ms => $sl)
  $arr_ms[]=$ms;
  $tongtien=0;
  $sachs=$sachDB->thongTinNhieuSach($arr_ms);

  foreach ($sachs as $sach) {
    $tongtien+=$sach['gia']*$_SESSION['cart'][$sach['masach']];
  ?>
  <tr>
    <td><?php echo $stt++; ?></td>
    <td><?php echo $sach['tensach'] ?></td>
    <td><img src="images/sach/<?php echo $sach['hinh'] ?>"  width="70"></td>
    <td><?php echo $sach['gia'];?></td>
    <td><input type="number" value="<?php echo $_SESSION['cart'][$sach['masach']] ?>" id="<?php echo $sach['masach'] ?>" min="0" /></td>
    <td><?php echo $_SESSION['cart'][$sach['masach']]*$sach['gia'] ?></td>
    <td><a href="javascript:update_cart('<?php echo $sach['masach'] ?>')">Lưu</a></td>
  </tr>
  <?php } ?>
  <tr><td colspan="5">Tong so tien</td>
  <td colspan="2"><?php echo $tongtien ?></td>
  
</tr>
</table>
<hr>

<form action="index.php" method="post">
<input type="hidden" name="mo" value="cart">
<input type="hidden" name="ac" value="order">
<table cellspacing="10" class="orderForm">
  <tr>
    <td>Tên người nhận: </td>
    <td><input type="text" name="txtTen" class="txt" style="width:120px;" ></td>
  </tr>
  <tr>
    <td>Địa chỉ giao hàng: </td>
    <td><input type="text" name="txtDiaChi" class="txt"></td>
  </tr>
  <tr>
    <td>Ngày nhận: </td>
    <td><input type="date" name="ngayNhan" class="txt" style="width:160px;"></td>
  </tr>
  <tr>
    <td>Điện thoại người nhận: </td>
    <td><input type="text" name="txtDienThoai" class="txt"></td>
  </tr>
  <tr>
    <td ></td>
    <td>      <input type="submit" name="btnOrder" value="Đặt hàng" class="btnSubmit">
    </td>
  </tr>
</table>
</form>
  <?php 
  }else if($message==""){
    echo "Chưa có sách nào trong giỏ hàng";
  } 
  
  ?>