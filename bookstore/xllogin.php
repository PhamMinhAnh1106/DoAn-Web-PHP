<?php
    session_start();
    include_once("config/config.php");
    include_once("classes/Db.class.php");
    include_once("classes/Khachhang.class.php");
    $khDB=new Khachhang;
    

    if($khDB->login($_POST['email'],$_POST['pass']))
    {
        $_SESSION['user']=$_POST['email'];
        echo 1;
        
    }else
        echo 0;
