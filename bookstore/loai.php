<div class="templatemo_content_left_section">
    <h1>Loại sách</h1>
    <ul>
        <?php 
        $loaiDb=new Loai();
        $loais=$loaiDb->tatCa();
        foreach ($loais as $loai) {
            
        ?>
        
        <li><a href="index.php?mod=sach&ac=sach1loai&ml=<?php echo $loai['maloai'] ?>"><?php echo $loai['tenloai'] ?></a></li>
        <?php } ?>  
    </ul>
</div>