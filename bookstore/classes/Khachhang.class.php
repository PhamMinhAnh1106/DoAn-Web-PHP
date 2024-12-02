<?php
class Khachhang extends Db
{
    public function login($email,$pass)
    {
        $sql="select count(*) from khachhang where email=? and matkhau=md5(?)";
        $kq =$this->exeQuery($sql,array($email,$pass),PDO::FETCH_NUM);
        if($kq[0][0]>0)
        return true;
        else
        return false;
    }
    public function create($email,$pass)
    {
        $sql="insert into khachhang(email,matkhau) value(?,?)";
        return $this->exeNoneQuery($sql,array($email,md5($pass)));

    }
    public function checkEmail($email)
    {
        $sql="select count(email) from khachhang where email=?";
        $kq =$this->exeQuery($sql,array($email),PDO::FETCH_NUM);
        if($kq[0][0]>0)
        return true;
        else
        return false;
    }
}