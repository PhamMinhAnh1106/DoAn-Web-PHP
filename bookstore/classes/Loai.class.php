<?php
class Loai extends Db{
	public function tatCa()
	{
		$sql="select * from loai";
		return $this->exeQuery($sql);	
	}
	public function them($ma,$ten)
	{
		$sql="insert into loai value(?,?)";
		return $this->exeNoneQuery($sql,array($ma,$ten));
	}
	public function sua($ma,$ten)
	{
		$sql="update loai set tenloai=? where maloai=?";
		return $this->exeNoneQuery($sql,array($ten,$ma));
	}
	public function xoa($ma)
	{
		//Kiem tra co sach nao trong loai do ko?
		$sql="select count(*) as dem from sach where maloai=?";
		
		$kq=$this->exeQuery($sql,array($ma));
		if($kq[0]['dem']>0)
			return -1; //tu quy dinh -1 la ko xoa dc vi co sach
		$sql="delete from loai where maloai=? ";
		return $this->exeNoneQuery($sql,array($ma));
	}
	public function thongTin1Loai($ma)
	{
		$sql="select * from loai where maloai=?";
		return $this->exeQuery($sql, array($ma));
	}
	
}
?>