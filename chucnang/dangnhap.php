<?php
ob_start();
session_start();
if(isset($_SESSION['tk']) && isset($_SESSION['mk'])){
	
	//phan quyen
}
include_once('../cauhinh/ketnoi.php');
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
if(isset($_POST['submit'])){
	$error = NULL;
	// Bẫy lỗi để trống cho trường nhập tên Tài khoản
	if($_POST['tk'] == ''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';	
	}
	else{
		$tk = $_POST['tk'];	
	}
	
	// Bẫy lỗi để trống cho trường nhập Mật khẩu
	if($_POST['mk'] == ''){
		$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';	
	}
	else{
		$mk = $_POST['mk'];	
	}
	
	// Dữ liệu được nhập đầy đủ thì mới xử lý Đăng nhập
	if(isset($tk) && isset($mk)){
		
		// Kiểm tra Tài khoản với các thông tin nhận được ở trên trong CSDL
		$sql = "SELECT * FROM qly_tk WHERE Ten_DN = '$tk' AND Mk_DN = '$mk'";
		$query = mysql_query($sql);	
		$totalRows = mysql_num_rows($query);
		
		// Không ó kết quả thì báo lỗi ngược lại Tạo phiên Đăng nhập cho Tài khoản
		if($totalRows <= 0){
			$error = 'Tài khoản hoặc Mật khẩu không hợp lệ!';	
		}
		else{
			$_SESSION['tk'] = $tk;
			$_SESSION['mk'] = $mk;
			$dataUser = mysql_fetch_object($query);
			$_SESSION['dataUser'] = $dataUser;
			header('location:../index.php');	
		}
	}
}
?>
<form method="post">
<div id="form-login">
	<h2><?php if(isset($error)){echo "<span>$error</span>";}else{echo 'đăng nhập hệ thống quản trị';}?></h2>
    <ul>
        <li><label>tài khoản</label><input type="text" name="tk" /></li>
        <li><label>mật khẩu</label><input type="password" name="mk" /></li>
        <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
        <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
        <li><span style="margin-left:200px;color:blue;font-weight:bold;font-size:14px;"><a href="dangky.php">Đăng ký tài khoản</a></span></li>
    	<li><span style="margin-left:200px;color:blue;font-weight:bold;font-size:14px;"><a href="../index.php">Homepage</a></span></li>
    </ul>
</div>
</form>
</body>
</html>