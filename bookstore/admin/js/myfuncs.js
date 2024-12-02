function xoa(ml)
{
	con=confirm("Ban co chac muon xoa khong?");
	if(con)
	{
		location.href="index.php?mo=loai&ac=xoa&ml="+ml;
	}
}