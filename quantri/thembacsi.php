<?php
include_once('../cauhinh/ketnoi.php');
$sqlDm="SELECT * FROM qly_bacsi";
$queryDm= mysql_query($sqlDm);
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
	//Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
	if(isset($Ten_BS) && isset($SDT_BS) && isset($DiaChi_BS)){
		// Thêm Thông tin Sản phẩm vào CSDL
		$sql2 = "INSERT INTO qly_bacsi(Ten_BS, DiaChi_BS, SDT_BS) 
				VALUES('$Ten_BS', '$DiaChi_BS', '$SDT_BS')";
		$query = mysql_query($sql2);
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=bacsi');	
	}
}
?>
<h2>thêm mới Bác Sĩ</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên Bác Sĩ</label><br /><input type="text" name="Ten_BS" /> <?php if(isset($error_Ten_BS)){echo $error_Ten_BS;}?></td>
        </tr>
        <tr>
            <td><label>Địa Chỉ </label><br /><input type="text" name="DiaChi_BS" /> <?php if(isset($error_DiaChi_BS)){echo $error_DiaChi_BS;}?></td>
        </tr>
         <tr>
            <td><label>Số Điện Thoại </label><br /><input type="text" name="SDT_BS" /> <?php if(isset($error_SDT_BS)){echo $error_SDT_BS;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>