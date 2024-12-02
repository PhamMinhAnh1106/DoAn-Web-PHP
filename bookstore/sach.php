<script>
function chonMua(masach)
{
    
    $.ajax({
        url:"<?php echo BASE_URL;?>xlcart_ajax.php",
        type:"GET",
        data:{ms:masach},
        success:function (result) {
            $("#cartinfo").html(result);
        }
    })
    
}
</script>
<?php
$sachDB=new Sach;
$sachs=$sachDB->tatca();
foreach ($sachs as $sach) {
?>
<div class="templatemo_product_box">
    <h1><?php echo $sach['tensach'] ?></h1>
    <img src="images/sach/<?php echo $sach['hinh'] ?>" alt="image" />
    <div class="product_info">
        <p><?php echo catChuoi($sach['mota'],30); ?> </p>
        <h3><?php echo $sach['gia'] ?></h3>
        <button class="buy_now_button my-btn" type="button" onclick="chonMua('<?php echo $sach['masach'] ?>')"> Mua </button>
        <div class="detail_button"><a href="index.php?mo=sach&ac=chitiet&ms=<?php echo $sach['masach'] ?>">Chi tiet ...</a></div>   
    </div>
</div>
<?php 
}
?>