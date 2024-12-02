<?php
session_start();
//include_once("classes/Sach.class.php");
//$sachDB=new Sach;
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
echo count($_SESSION['cart']);
?>