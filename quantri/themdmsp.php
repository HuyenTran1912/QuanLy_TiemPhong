<?php
$sqlDmm="SELECT * FROM qly_dmvaccine";
$queryDmm= mysql_query($sqlDmm);
if(isset($_POST['submit'])){
	// Bẫy lỗi để trống trường dữ liệu trong Form
	if($_POST['Ten_DM'] == ''){
		$error_Ten_DM = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ten_DM = $_POST['Ten_DM'];	
	}	
	//Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
	if(isset($Ten_DM)){
		// Upload Ảnh Mô tả
		$sql = "INSERT INTO qly_dmvaccine(Ten_DM) 
				VALUES('$Ten_DM')";
		$query = mysql_query($sql);
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=danhmucsp');	
	}
}
?>
<h2>thêm mới Vaccine</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên Danh Mục Vaccine</label><br /><input type="text" name="Ten_DM" /> <?php if(isset($error_Ten_DM)){echo $error_Ten_DM;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>