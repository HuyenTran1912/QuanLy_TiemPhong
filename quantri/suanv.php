<?php
// Lấy Tham số id_sp trên URL
$Ma_Tk = $_GET['Ma_Tk'];
// Lấy thông tin Danh mục Sản phẩm Selectbox
// $sqlDm = "SELECT * FROM qly_hethong";
// $queryDm = mysql_query($sqlDm);
// Lấy Thông tin của ản phẩm trong CSDL
$sql = "SELECT * FROM qly_tk WHERE Ma_Tk = $Ma_Tk";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
// Bẫy lỗi để trống trường dữ liệu trong Form
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
	//5 dia chi
	if($_POST['DiaChi'] == ''){
		$error_DiaChi = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChi = $_POST['DiaChi'];	
	}
	//6
	$GioiTinh = $_POST['GioiTinh'];
	//7
	if($_POST['Mk_DN'] == 'unselect'){
		$error_Mk_DN = '<span style="color:red;">(*)<span>';
	}
	else{
		$Mk_DN = $_POST['Mk_DN'];	
	}
	//8
	$QuyenSuDung =1;
	//Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
	// if(isset($ID) && isset($QuyenSuDung) && isset($Ten_DN))
	// {
	// 	$sql1 = "UPDATE qly_hethong SET Mk_DN = '$Mk_DN', QuyenSuDung = '$QuyenSuDung'";
	// 	$query = mysql_query($sql1);
	// }
	if(isset($Ho_Ten) && isset($NgaySinh) && isset($DiaChi) && isset($CMND)&& isset($SDT) && isset($Mk_DN) && isset($GioiTinh)){
		// Thêm Thông tin Sản phẩm vào CSDL
		$sql2 = "UPDATE qly_tk SET Ho_Ten = '$Ho_Ten', NgaySinh = '$NgaySinh', DiaChi = '$DiaChi', CMND ='$CMND', SDT = '$SDT', GioiTinh = '$GioiTinh'
		, Mk_DN = '$Mk_DN', QuyenSuDung = '$QuyenSuDung' WHERE Ma_Tk='$Ma_Tk'";
		$query = mysql_query($sql2);
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=nhanvien');	
	}
}
?>
<h2>sửa thông tin thành viên</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên thành Viên</label><br /><input type="text" name="Ho_Ten" value="<?php if(isset($_POST['Ho_Ten'])){echo $_POST['Ho_Ten'];}else{echo $row['Ho_Ten'];}?>" /> <?php if(isset($error_Ho_Ten)){echo $error_Ho_Ten;}?></td>
        </tr>
        <tr>
            <td><label>Ngày Sinh </label><br /><input type="date" name="NgaySinh" value="<?php if(isset($_POST['NgaySinh'])){echo $_POST['NgaySinh'];}else{echo $row['NgaySinh'];}?>" />
            <?php if(isset($error_NgaySinh)){echo $error_NgaySinh;}?></td></td>
        </tr>
         <tr>
            <td><label>Mật Khẩu Đăng Nhập</label><br /><input type="text" name="Mk_DN" value="<?php if(isset($_POST['Mk_DN'])){echo $_POST['Mk_DN'];}else{echo $row['Mk_DN'];}?>" /> <?php if(isset($error_Mk_DN)){echo $error_Mk_DN;}?></td>
        </tr>
        <tr>
            <td><label>Địa Chỉ </label><br /><input type="text" name="DiaChi" value="<?php if(isset($_POST['DiaChi'])){echo $_POST['DiaChi'];}else{echo $row['DiaChi'];}?>" /> <?php if(isset($error_DiaChi)){echo $error_DiaChi;}?></td>
        </tr>
         <tr>
            <td><label>Số Điện Thoại </label><br /><input type="text" name="SDT" value="<?php if(isset($_POST['SDT'])){echo $_POST['SDT'];}else{echo $row['SDT'];}?>" /> <?php if(isset($error_SDT)){echo $error_SDT;}?></td>
        </tr>
         <tr>
            <td><label>CMND</label><br /><input type="text" name="CMND"  value="<?php if(isset($_POST['CMND'])){echo $_POST['CMND'];}else{echo $row['CMND'];}?>" /> <?php if(isset($error_CMND)){echo $error_CMND;}?></td>
        </tr>
        <tr>
            <td><label>Giới tính </label><br /> Gái <input type="radio" name="GioiTinh" value=1 /> Trai <input checked="checked" type="radio" name="GioiTinh" value=0 /></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập Nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>