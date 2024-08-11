<?php
// Lấy Tham số id_sp trên URL
$Ma_DM = $_GET['Ma_DM'];
// Lấy thông tin Danh mục Sản phẩm Selectbox
$sqlDmm = "SELECT * FROM qly_dmvaccine";
$queryDmm = mysql_query($sqlDmm);

// Lấy Thông tin của ản phẩm trong CSDL
$sql = "SELECT * FROM qly_dmvaccine WHERE Ma_DM = $Ma_DM";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
// Bẫy lỗi để trống trường dữ liệu trong Form
if(isset($_POST['submit']))
{
	// Tên vaccine
	if($_POST['Ten_DM'] == ''){
		$error_Ten_DM = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ten_DM = $_POST['Ten_DM'];	
	}
	if(isset($Ten_DM))
	{
		// Xử lý Upload Thông tin Sản phẩm vào CSDL
		$sql = "UPDATE qly_dmvaccine SET Ten_DM = '$Ten_DM'  WHERE Ma_DM = '$Ma_DM'";
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=danhmucsp');	
	}	
}
?>
<h2>sửa thông tin Vaccine</h2>
<div id="main">
<form method="post" enctype="multipart/form-data">
<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên Danh Mục Vaccine</label><br /><input type="text" name="Ten_DM" value="<?php if(isset($_POST['Ten_DM'])){echo $_POST['Ten_DM'];}else{echo $row['Ten_DM'];}?>" /> <?php if(isset($error_Ten_DM)){echo $error_Ten_DM;}?></td>
        </tr>
    <form method="post" enctype="multipart/form-data">
    
        <tr>
            <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>