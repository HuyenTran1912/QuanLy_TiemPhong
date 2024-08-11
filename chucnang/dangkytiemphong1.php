<?php
if (isset($_POST['submit'])) {
	if ($_POST['tinhtrang'] == 1) {
		header('location:dangkychominh.php');
	}
	else{
		header('location:dangkichonguoikhac.php');
	}
	# code...
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng - Đăng nhập hệ thống</title>
<link rel="stylesheet" type="text/css" href="../quantri/css/dangnhap.css" />
</head>
<body>
<form method="post">
<div id="form-login">
<h2>Đăng ký Tiêm Phòng</h2>
    <ul>
    	<tr><span style="margin-left:50px;color:blue;font-weight:bold;font-size:14px;"><label>Hãy chọn loại tiêm phù hợp với bạn</label></span></tr><br /> <br/>
    	<li>Tiêm cho chính bạn <input type="radio" name="tinhtrang" value=1 /> Tiêm cho người khác <input checked="checked" type="radio" name="tinhtrang" value=0 /></li>
        <!-- <li><span style="margin-left:100px;color:blue;font-weight:bold;font-size:14px;"><a href="dangkychominh.php">Đăng kí cho bạn</a></span></li>
        <li><span style="margin-left:100px;color:blue;font-weight:bold;font-size:14px;"><a href="dangkichonguoikhac.php">Đăng ký cho người khác</a></span></li> -->
    	<li><input type="submit" name="submit" value="xác nhận" /> </li>
    </ul>
</div>
</form>
</body>
</html>