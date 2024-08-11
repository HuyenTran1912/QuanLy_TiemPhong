<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once('../cauhinh/ketnoi.php');
error_reporting(E_ALL & ~E_NOTICE & ~8192); 
$sqla="SELECT * FROM qly_tk";
$querysqla = mysql_query($sqla);
// $datatk = mysql_fetch_object($querysqla);

if(isset($_POST['submit']))
{	
	//1
	if($_POST['Mk_DN'] == ''){
		$error_Mk_DN = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Mk_DN = $_POST['Mk_DN'];	
	}
	//2
	if($_POST['Ten_DN'] == ''){
		$error_Ten_DN = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ten_DN = $_POST['Ten_DN'];	
	}	
	//3 csdl 2
	if($_POST['Ho_Ten'] == ''){
		$error_Ho_Ten = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ho_Ten = $_POST['Ho_Ten'];	
	}
	//4
	if($_POST['NgaySinh'] == ''){
		$error_NgaySinh = '<span style="color:red;">(*)<span>';	
	}
	else{
		$NgaySinh = $_POST['NgaySinh'];	
	}
	//5
	if($_POST['CMND'] == ''){
		$error_CMND = '<span style="color:red;">(*)<span>';	
	}
	else{
		$CMND = $_POST['CMND'];	
	}
	//6
	if($_POST['GioiTinh'] == ''){
		$error_GioiTinh= '<span style="color:red;">(*)<span>';	
	}
	else{
		$GioiTinh = $_POST['GioiTinh'];	
	}
	//7
	if($_POST['DiaChi'] == ''){
		$error_DiaChi = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChi = $_POST['DiaChi'];	
	}
	//8
	if($_POST['SDT'] == ''){
		$error_SDT = '<span style="color:red;">(*)<span>';	
	}
	else{
		$SDT = $_POST['SDT'];	
	}
	//9
	$Ma_Tk = $_POST['Ma_Tk'];
	//10
	$QuyenSuDung = 1;
	if(isset($Ten_DN) && isset($Mk_DN) && isset($Ho_Ten) && isset($NgaySinh) && isset($CMND) && isset($GioiTinh)  && isset($DiaChi) && isset($SDT))
	{		
	$sql2 = "INSERT INTO qly_tk(Ho_Ten, NgaySinh, CMND, GioiTinh, DiaChi, SDT, Ma_Tk, Ten_DN, Mk_DN, QuyenSuDung)
			VALUES('$Ho_Ten', '$NgaySinh', '$CMND', '$GioiTinh', '$DiaChi', '$SDT', '$Ma_Tk', '$Ten_DN' , '$Mk_DN', '$QuyenSuDung')
			";
	if (mysql_num_rows(mysql_query("SELECT Ten_DN FROM qly_tk WHERE Ten_DN='$Ten_DN'")) > 0)
	{
        echo "Tài Khoản đã tồn tại.<a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    else
   	{
   	$query = mysql_query($sql2);
	header('location:../chucnang/dangnhap.php');
	break;	
   	}
	// foreach ($datatk as $key => $value) 
	// {
	// 	if($datatk->Ten_DN == $Ten_DN){
	// 		echo "<script>alert('Tai Khoan da ton tai')</script>";
	// 		break;
	// 	}
	// 	else{
	// 		$query = mysql_query($sql2);
	// 		header('location:../chucnang/dangnhap.php');
	// 		break;
	// 	}
	// }
	
	
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng - Đăng nhập hệ thống</title>
<link rel="stylesheet" type="text/css" href="../quantri/css/dangnhap.css" />
</head>
<body>
<?php

?>
<form method="post">
<div id="form-login">
	<h2>Đăng ký tài khoản</h2>
    <ul>
    	<li><label>Họ tên</label><input type="text" name="Ho_Ten" /><?php if(isset($error_Ho_Ten)){echo $error_Ho_Ten;}?></li>
        <li><label>tài khoản</label><input type="text" name="Ten_DN" /><?php if(isset($error_Ten_DN)){echo $error_Ten_DN;}?></li>
        <li><label>mật khẩu</label><input type="password" name="Mk_DN" /><?php if(isset($error_Mk_DN)){echo $error_Mk_DN;}?></li>
        <li><label>Ngày sinh</label><input type="date" name="NgaySinh" /><?php if(isset($error_NgaySinh)){echo $error_NgaySinh;}?></li>
        <li><label>Giới tính</label><input type="radio" name="GioiTinh" value="0" />Nam <input type="radio" name="GioiTinh" value="1"/>Nữ</li>
        <li><label>CMND</label><input type="text" name="CMND" /><?php if(isset($error_CMND)){echo $error_CMND;}?></li>
        <li><label>Địa chỉ</label><input type="text" name="DiaChi" /><?php if(isset($error_DiaChi)){echo $error_DiaChi;}?></li>
        <li><label>Số điện thoại</label><input type="text" name="SDT" /><?php if(isset($error_STD)){echo $error_SDT;}?></li>
        
        <input type="hidden" name="QuyenSuDung" value="1" />
        <li><input type="submit" name="submit" value="Đăng ký" style="margin-left:100px" /> <input type="reset" name="resset" value="Làm mới" /></li>
    </ul>
</div>
</form>
</body>
</html>