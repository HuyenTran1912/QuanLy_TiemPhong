<?php
// Lấy Tham số id_sp trên URL
$Ma_BS = $_GET['Ma_BS'];
// Lấy thông tin Danh mục Sản phẩm Selectbox
// $sqlDm = "SELECT * FROM qly_hethong";
// $queryDm = mysql_query($sqlDm);
// Lấy Thông tin của ản phẩm trong CSDL
$sql = "SELECT * FROM qly_bacsi WHERE Ma_BS = $Ma_BS";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
// Bẫy lỗi để trống trường dữ liệu trong Form
if(isset($_POST['submit'])){
	// Bẫy lỗi để trống trường dữ liệu trong Form
	//1 Tên nv
	if($_POST['Ten_BS'] == ''){
		$error_Ten_BS = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ten_BS = $_POST['Ten_BS'];	
	}	
	//2 ngaysinh
	// 4
	if($_POST['SDT_BS'] == ''){
		$error_SDT_BS = '<span style="color:red;">(*)<span>';	
	}
	else{
		$SDT_BS = $_POST['SDT_BS'];	
	}
	// 5
	//6 dia chi
	if($_POST['DiaChi_BS'] == ''){
		$error_DiaChi_BS = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChi_BS = $_POST['DiaChi_BS'];	
	}
	if(isset($Ten_BS) && isset($SDT_BS) && isset($DiaChi_BS)){
		// Thêm Thông tin Sản phẩm vào CSDL
		$sql2 = "UPDATE qly_bacsi SET Ten_BS = '$Ten_BS', SDT_BS = '$SDT_BS', DiaChi_BS = '$DiaChi_BS' WHERE Ma_BS='$Ma_BS'";
		$query = mysql_query($sql2);
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=bacsi');	
	}
}
?>
<h2>sửa thông tin thành viên</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên Bác Sĩ</label><br /><input type="text" name="Ten_BS" value="<?php if(isset($_POST['Ten_BS'])){echo $_POST['Ten_BS'];}else{echo $row['Ten_BS'];}?>" /> <?php if(isset($error_Ten_BS)){echo $error_Ten_BS;}?></td>
        </tr>
       
            <td><label>Địa Chỉ </label><br /><input type="text" name="DiaChi_BS" value="<?php if(isset($_POST['DiaChi_BS'])){echo $_POST['DiaChi_BS'];}else{echo $row['DiaChi_BS'];}?>" /> <?php if(isset($error_DiaChi_BS)){echo $error_DiaChi_BS;}?></td>
        </tr>
         <tr>
            <td><label>Số Điện Thoại </label><br /><input type="text" name="SDT_BS" value="<?php if(isset($_POST['SDT_BS'])){echo $_POST['SDT_BS'];}else{echo $row['SDT_BS'];}?>" /> <?php if(isset($error_SDT_BS)){echo $error_SDT_BS;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập Nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>