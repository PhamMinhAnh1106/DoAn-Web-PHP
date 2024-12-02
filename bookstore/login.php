<?php
if(isset($_POST['btnLogin'])) //Xu ly dang nhap
{
    include_once("classes/Khachhang.class.php");
    $khDB=new Khachhang;
    if($khDB->login($_POST['txtEmail'],$_POST['txtPass']))
    {
        $_SESSION['user']=$_POST['txtEmail'];
        ?>
            <script>
                location.href="index.php";
            </script>
        <?php
        
    }else
        echo "Thong tin dang nhap sai";
        
}
?>
<form action="index.php" method="post">
    <input type="hidden" name="mo" value="login">
    
    <table>
        <tr>
            <td>Email</td>
            <td><input type="email" name="txtEmail"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="txtPass" ></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnLogin" value="Dang nhap">
            </td>
        </tr>
    </table>

</form>