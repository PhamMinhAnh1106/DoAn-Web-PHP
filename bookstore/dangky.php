<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.js"></script>
</head>
<body>
    <?php
    include "config/config.php";
    include "classes/Db.class.php";
    include "classes/Khachhang.class.php";
    if(isset($_POST['btnSubmit']))
    {
        $kh=new Khachhang;
        if($kh->create($_POST['email'],$_POST['pass'])>0)
            echo "Dang ky thanh cong";
        else
            echo "Dang ky khong thanh cong";
    }
    ?>
    <form action="dangky.php" method="post">
    Email: <input type="email" name="email" id="email" onblur="kiemtra(this.value)"><br>
    <div id="ketqua"></div>
    Mat khau: <input type="password" name="pass" > 
    <br>
    <input type="submit" value="Đăng ký" name="btnSubmit">
    </form>
    <script>
        function kiemtra(email)
        {
            $.ajax({
            url:"http://localhost/book-store/xlKhachhang.php",
            type:"GET",
            data:{'email':email},
            success:function (result) {
                
                if(result=="1")
                $("#ketqua").html("Email nay da co");
                else
                $("#ketqua").html("Email nay hop le");
                }
            })
        }
    </script>
</body>
</html>