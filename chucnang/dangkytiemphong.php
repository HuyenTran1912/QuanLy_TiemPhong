<?php
include_once('../cauhinh/ketnoi.php');
// error_reporting(E_ALL & ~E_NOTICE & ~8192);
/*echo '<pre>';
var_dump($data);
echo '</pre>';*/
session_start();
//var_dump($_SESSION['dataUser']);
//djt cu m, mang lag vcl
//why?
if(isset($_SESSION['dataUser'])){
    $dataUser = $_SESSION['dataUser'];
    $Ma_Tk = $dataUser->Ma_Tk;
    header('location:dangkytiemphong1.php');
}
else{
    header("location:dangnhap.php");
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
<span style="margin-left:450px;color:blue;font-weight:bold">
<?php 
if(isset($_SESSION['tk'])){
    echo 'Xin Chao '.$_SESSION['t1k'];
    echo '||<a href="chucnang/dangxuat.php">Đăng xuất</a>';
}
?>
</span>
<div id= "main">
<form method="post" enctype="multipart/form-data">
<div id="form-login">
    <h2>Đăng Ký Tiêm Phòng</h2>
    // <ul>
    //     <li><span style="margin-left:100px;color:blue;font-weight:bold;font-size:14px;"><a href="dangky.php"></a></span></li>

    //     <li><span style="margin-left:200px;color:blue;font-weight:bold;font-size:14px;"><a href="dangky.php"></a></span></li>
    // </ul>
    ?>
</div>
</form>
</div>
</body>
</html>