<?php
include_once('../cauhinh/ketnoi.php');
$sqlDm="SELECT * FROM qly_tk";
$queryDm= mysql_query($sqlDm);
if(isset($_POST['submit'])){
	// Bẫy lỗi để trống trường dữ liệu trong Form
	//1 Tên nv
	if($_POST['Ho_Ten'] == ''){
		$error_Ho_Ten = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ho_Ten = $_POST['Ho_Ten'];	
	}	
	//2 ngaysinh
	if($_POST['NgaySinh'] == ''){
		$error_NgaySinh = '<span style="color:red;">(*)<span>';	
	}
	else{
		$NgaySinh = $_POST['NgaySinh'];	
	}
	//3Gcmnd
	if($_POST['CMND'] == ''){
		$error_CMND = '<span style="color:red;">(*)<span>';	
	}
	else{
		$CMND = $_POST['CMND'];	
	}
	// 4
	if($_POST['SDT'] == ''){
		$error_SDT = '<span style="color:red;">(*)<span>';	
	}
	else{
		$SDT = $_POST['SDT'];	
	}
	// 5
	if($_POST['Ten_DN'] == 'unselect'){
		$error_Ten_DN = '<span style="color:red;">(*)<span>';
	}
	else{
		$Ten_DN = $_POST['Ten_DN'];	
	}
	//6 dia chi
	if($_POST['DiaChi'] == ''){
		$error_DiaChi = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChi = $_POST['DiaChi'];	
	}
	//7
	$GioiTinh = $_POST['GioiTinh'];
	//8 mk
	if($_POST['Mk_DN'] == 'unselect'){
		$error_Mk_DN = '<span style="color:red;">(*)<span>';
	}
	else{
		$Mk_DN = $_POST['Mk_DN'];	
	}
	//Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
		$QuyenSuDung = 1;
	if(isset($Ho_Ten) && isset($NgaySinh) && isset($DiaChi) && isset($CMND)&& isset($Ten_DN) && isset($SDT) && isset($Mk_DN) && isset($GioiTinh)){
		// Thêm Thông tin Sản phẩm vào CSDL
		$sql2 = "INSERT INTO qly_tk(Ho_Ten, NgaySinh, DiaChi, CMND, SDT, Ten_DN, Mk_DN, QuyenSuDung, GioiTinh) 
				VALUES('$Ho_Ten', '$NgaySinh', '$DiaChi', '$CMND', '$SDT', '$Ten_DN', '$Mk_DN', '$QuyenSuDung', '$GioiTinh')";
		$query = mysql_query($sql2);
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=nhanvien');	
	}
}
?>
<h2>thêm mới thành viên</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên thành Viên</label><br /><input type="text" name="Ho_Ten" /> <?php if(isset($error_Ten_NV)){echo $error_Ten_NV;}?></td>
        </tr>
        <tr>
            <td><label>Ngày Sinh </label><br /><input type="date" name="NgaySinh" />
            <?php if(isset($error_NgaySinh)){echo $error_NgaySinh;}?></td></td>
        </tr>
		 <tr>
            <td><label>Tên Đăng Nhập </label><br /><input type="text" name="Ten_DN" /> <?php if(isset($error_Ten_DN)){echo $error_Ten_DN;}?></td>
        </tr>
        <tr>
            <td><label>Mật Khẩu </label><br /><input type="text" name="Mk_DN" /> <?php if(isset($error_Mk_DN)){echo $error_Mk_DN;}?></td>
        </tr>
        <tr>
            <td><label>Địa Chỉ </label><br /><input type="text" name="DiaChi" /> <?php if(isset($error_DiaChi)){echo $error_DiaChi;}?></td>
        </tr>
         <tr>
            <td><label>Số Điện Thoại </label><br /><input type="text" name="SDT" /> <?php if(isset($error_SDT)){echo $error_SDT;}?></td>
        </tr>
         <tr>
            <td><label>CMND</label><br /><input type="text" name="CMND"  /> <?php if(isset($error_CMND)){echo $error_CMND;}?></td>
        </tr>
        <tr>
            <td><label>Giới tính </label><br /> Nữ <input type="radio" name="GioiTinh" value=1 /> Nam <input checked="checked" type="radio" name="GioiTinh" value=0 /></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>