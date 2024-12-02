<?php
session_start();
include_once("../config/config.php");
include_once("../classes/Db.class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>CMS Admin</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "css/all.css";
@import "css/jquery.dataTables.min.css";
</style>
</head>
<body>
<div id="main">
  <div id="header"> <a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
    <ul id="top-navigation">
      <li class="active"><span><span>Loại</span></span></li>
      <li><span><span><a href="#">Sách</a></span></span></li>
      <li><span><span><a href="#">Settings</a></span></span></li>
      <li><span><span><a href="#">Statistics</a></span></span></li>
      <li><span><span><a href="#">Design</a></span></span></li>
      <li><span><span><a href="#">Contents</a></span></span></li>
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
      <a href="#" class="link">Link here</a> <a href="#" class="link">Link here</a> </div>
    <div id="center-column">
      <div class="top-bar" style="border-bottom:2px solid #f70;padding-bottom: 10px;"> 
        <h1>Contents</h1>
        <div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Contents</a></div>
      </div>
      <br />
      <!--<div class="select-bar">
        <label>
        <input type="text" name="textfield" />
        </label>
        <label>
        <input type="submit" name="Submit" value="Search" />
        </label>
      </div>-->
      <!--Noi dung -->
      <?php include "loai2.php" ?>
      <!--Ket thuc noi dung -->
      
    </div>
   
    <div id="right-column"> <strong class="h">INFO</strong>
      <div class="box">Detect and eliminate viruses and Trojan horses, even new and unknown ones. Detect and eliminate viruses and Trojan horses, even new and </div>
    </div>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
<script src="js/myfuncs.js"></script>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>