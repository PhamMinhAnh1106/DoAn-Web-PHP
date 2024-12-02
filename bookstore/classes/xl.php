<?php
    include "config/config.php";
    include "classes/Db.class.php";
    include "classes/Khachhang.class.php";

    $kh=new Khachhang;

    if($kh->checkEmail($_GET['email'])>0)
        echo 1;
    else {
        echo 0;
    } 
    