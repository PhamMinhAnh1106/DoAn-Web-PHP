<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>CMS Admin</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "css/all.css";
</style>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
</head>
<body>
<?php
include_once("../config/config.php");
include_once("../classes/Db.class.php");
?>
<div id="main">
<div id="header"> 
    <a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
    <ul id="top-navigation">
      <li class="active"><span><span>Trang chủ</span></span></li>
      <li><span><span><a href="#">Loại sách </a></span></span></li>
      <li><span><span><a href="#">Sách</a></span></span></li>
      <li><span><span><a href="#">Khách hàng</a></span></span></li>
      <li><span><span><a href="#">Đơn hàng</a></span></span></li>
      
    </ul>
  </div>
  <div id="middle">
    <div id="left-column">
      <h3>Header</h3>
      <ul class="nav">
        <li><a href="#">Lorem Ipsum dollar</a></li>
        <li><a href="#">Dollar</a></li>
        <li><a href="#">Lorem dollar</a></li>
        <li><a href="#">Ipsum dollar</a></li>
        <li><a href="#">Lorem Ipsum dollar</a></li>
        <li class="last"><a href="#">Dollar Lorem Ipsum</a></li>
      </ul>
     </div>
    <div id="center-column">
      <div class="top-bar"> 
        <h1>Quản lý loại sách</a></h1>
        <div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Contents</a></div>
      </div>
      <br />
      
     
      <?php 
	  $mo="loai";
	  if(isset($_REQUEST['mo']))
	  	$mo=$_REQUEST['mo'];
		switch($mo){
			case "loai":
				include "loai.php";
				break;
					
		};
	  
	  ?>
        <!-- 
            <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Header Here</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>Lorem Ipsum</strong></td>
            <td class="last"><input type="text" class="text" /></td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Lorem Ipsum</strong></td>
            <td class="last"><input type="text" class="text" /></td>
          </tr>
          <tr>
            <td class="first"><strong>Lorem Ipsum</strong></td>
            <td class="last"><input type="text" class="text" /></td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Lorem Ipsum</strong></td>
            <td class="last"><input type="text" class="text" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </div>
      -->
    </div>
    
    </div>
  </div>
  <div id="footer"></div>
</div>



<div class="modal" id="myModal">
<form action="xllogin.php" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">FORM LOGIN</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Email: <input type="text" name="txtEmail" /><br />
          Pass <input type="password" name="txtPass" />
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" value="Login">
        </div>
        
      </div>
    </div>
    </form>
  </div>
</body>
</html>


 