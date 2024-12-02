<?php
session_start();
$_SESSION['cart']=array();
unset($_SESSION['user']);
echo  1;
