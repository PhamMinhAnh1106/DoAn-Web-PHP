<?php
function catChuoi($s,$n)
{
    if(strlen($s)<=$n)
    return $s;
    $a=explode(" ",$s);
    $kq="";
    foreach ($a as $value) {
        if(strlen($kq.$value)>$n)
            break;
        $kq = $kq." ".$value;
    }
    return substr($kq,1)." ...";
}