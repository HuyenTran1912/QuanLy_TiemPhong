<?php
// Lấy Tham số id_sp trên URL
$Ma_DK = $_GET['Ma_DK'];
// Lấy thông tin Danh mục Sản phẩm Selectbox
// Lấy Thông tin của ản phẩm trong CSDL
$sql = "SELECT * FROM qly_dangki WHERE Ma_DK = $Ma_DK";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
// Bẫy lỗi để trống trường dữ liệu trong Form
if(isset($_POST['submit'])){
	// Bẫy lỗi để trống trường dữ liệu trong Form
	//1 Tên nv
	if($_POST['Tennguoi_TP'] == ''){
		$error_Tennguoi_TP = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Tennguoi_TP = $_POST['Tennguoi_TP'];	
	}	
	//2 ngaysinh
	if($_POST['NgaySinh1'] == ''){
		$error_NgaySinh1 = '<span style="color:red;">(*)<span>';	
	}
	else{
		$NgaySinh1 = $_POST['NgaySinh1'];	
	}
	//3Gcmnd
	if($_POST['CMND1'] == ''){
		$error_CMND1 = '<span style="color:red;">(*)<span>';	
	}
	else{
		$CMND1 = $_POST['CMND1'];	
	}
	// 4
	if($_POST['SDT1'] == ''){
		$error_SDT1 = '<span style="color:red;">(*)<span>';	
	}
	else{
		$SDT1 = $_POST['SDT1'];	
	}
	//5 dia chi
	if($_POST['DiaChi1'] == ''){
		$error_DiaChi1 = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChi1 = $_POST['DiaChi1'];	
	}
	//6
	$GioiTinh1 = $_POST['GioiTinh1'];
	//7
	//Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
	if(isset($Tennguoi_TP) && isset($NgaySinh1) && isset($DiaChi1) && isset($SDT1) && isset($CMND1) && isset($GioiTinh1)){
		// Thêm Thông tin Sản phẩm vào CSDL
		$sql3 = "UPDATE qly_dangki SET Tennguoi_TP = '$Tennguoi_TP', NgaySinh1 = '$NgaySinh1', DiaChi1 = '$DiaChi1',  SDT1 = '$SDT1',CMND1 ='$CMND1', GioiTinh1='$GioiTinh1' WHERE Ma_DK= '$Ma_DK'";
		$query = mysql_query($sql3);
		// var_dump($query);
		// exit();
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=nguoitp');	
	}
}
?>
<h2>sửa thông tin Tiêm</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên người tiêm phòng</label><br /><input type="text" name="Tennguoi_TP" value="<?php if(isset($_POST['Tennguoi_TP'])){echo $_POST['Tennguoi_TP'];}else{echo $row['Tennguoi_TP'];}?>" /> <?php if(isset($error_Tennguoi_TP)){echo $error_Tennguoi_TP;}?></td>
        </tr>
        <tr>
            <td><label>Ngày Sinh </label><br /><input type="date" name="NgaySinh1" value="<?php if(isset($_POST['NgaySinh1'])){echo $_POST['NgaySinh1'];}else{echo $row['NgaySinh1'];}?>" />
            <?php if(isset($error_NgaySinh1)){echo $error_NgaySinh1;}?></td></td>
        </tr>
        <tr>
            <td><label>Địa Chỉ </label><br /><input type="text" name="DiaChi1" value="<?php if(isset($_POST['DiaChi1'])){echo $_POST['DiaChi1'];}else{echo $row['DiaChi1'];}?>" /> <?php if(isset($error_DiaChi1)){echo $error_DiaChi1;}?></td>
        </tr>
         <tr>
            <td><label>Số Điện Thoại </label><br /><input type="text" name="SDT1" value="<?php if(isset($_POST['SDT1'])){echo $_POST['SDT1'];}else{echo $row['SDT1'];}?>" /> <?php if(isset($error_SDT1)){echo $error_SDT1;}?></td>
        </tr>
         <tr>
            <td><label>CMND</label><br /><input type="text" name="CMND1"  value="<?php if(isset($_POST['CMND1'])){echo $_POST['CMND1'];}else{echo $row['CMND1'];}?>" /> <?php if(isset($error_CMND1)){echo $error_CMND1;}?></td>
        </tr>
        <tr>
            <td><label>Giới tính </label><br /> Nữ <input type="radio" name="GioiTinh1" value=1 /> Nam <input checked="checked" type="radio" name="GioiTinh1" value=0 /></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập Nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>