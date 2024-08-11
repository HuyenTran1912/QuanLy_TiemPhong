<?php
error_reporting(0);
ini_set('display_errors', 0);
$sqlDm="SELECT * FROM qly_dmvaccine";
$queryDm= mysql_query($sqlDm);
if(isset($_POST['submit'])){
	// Bẫy lỗi để trống trường dữ liệu trong Form
	//1 Tên Sản phẩm
	if($_POST['Ten_VC'] == ''){
		$error_Ten_VC = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ten_VC = $_POST['Ten_VC'];	
	}	
	//2 Giá Sản phẩm
	if($_POST['Gia_VC'] == ''){
		$error_Gia_VC = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Gia_VC = $_POST['Gia_VC'];	
	}
	//3Ghichu
	if($_POST['Ghichu'] == ''){
		$error_Ghichu = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ghichu = $_POST['Ghichu'];	
	}
	//4Somui_Tiem
	if($_POST['SoMui_Tiem'] == ''){
		$error_SoMui_Tiem = '<span style="color:red;">(*)<span>';	
	}
	else{
		$SoMui_Tiem = $_POST['SoMui_Tiem'];	
	}
	//5 diachisx
	if($_POST['DiaChiSX'] == ''){
		$error_DiaChiSX = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChiSX = $_POST['DiaChiSX'];	
	}
	// 6ngaysx
	if($_POST['NgaySX'] == ''){
		$error_NgaySX = '<span style="color:red;">(*)<span>';	
	}
	else{
		$NgaySX = $_POST['NgaySX'];	
	}
	//7 hsd
	if($_POST['HanSuDung'] == ''){
		$error_HanSuDung = '<span style="color:red;">(*)<span>';	
	}
	else{
		$HanSuDung = $_POST['HanSuDung'];	
	}
	// 8Chi tiết Sản phẩm
	if($_POST['ChiTiet_VC'] == ''){
		$error_ChiTiet_VC = '<span style="color:red;">(*)<span>';	
	}
	else{
		$ChiTiet_VC = $_POST['ChiTiet_VC'];	
	}
	//9lieu luong
	if($_POST['PhongBenh'] == ''){
		$error_PhongBenh='<span style="color:red;">(*)<span>';
	}
	else{
		$PhongBenh= $_POST['PhongBenh'];
	}
	//10 Ảnh mô tả Sản phẩm
	if($_FILES['Anh_VC']['name'] == ''){
		$error_Anh_VC = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Anh_VC = $_FILES['Anh_VC']['name'];
		$tmp = 	$_FILES['Anh_VC']['tmp_name'];
	}	
	// 11Danh mục Sản phẩm
	if($_POST['Ma_DM'] == 'unselect'){
		$error_Ma_DM = '<span style="color:red;">(*)<span>';
	}
	else{
		$Ma_DM = $_POST['Ma_DM'];	
	}
	//12 Trạng thái
	$tinhtrang = $_POST['tinhtrang'];
	//Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
	if(isset($Ten_VC) && isset($Gia_VC) && isset($DiaChiSX) && isset($NgaySX) && isset($HanSuDung) && isset($PhongBenh) && isset($ChiTiet_VC) && isset($Anh_VC) && isset($Ma_DM)&& isset($Ghichu)&& isset($SoMui_Tiem)){
		// Upload Ảnh Mô tả
		$uploaded_file = move_uploaded_file($tmp, 'anh/'.$Anh_VC);
		// Thêm Thông tin Sản phẩm vào CSDL
		$sql = "INSERT INTO qly_vaccine(Ten_VC, Gia_VC, DiaChiSX, NgaySX, HanSuDung, PhongBenh, ChiTiet_VC, Anh_VC, Ma_DM, Ghichu, SoMui_Tiem) 
				VALUES('$Ten_VC', '$Gia_VC', '$DiaChiSX', '$NgaySX', '$HanSuDung', '$PhongBenh', '$ChiTiet_VC', '$Anh_VC', '$Ma_DM', '$Ghichu', '$SoMui_Tiem')";
		$query = mysql_query($sql);
		// Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
		header('location:quantri.php?page_layout=danhsachsp');	
	}
}
?>
<h2>thêm mới Vaccine</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên Vaccine</label><br /><input type="text" name="Ten_VC" /> <?php if(isset($error_Ten_VC)){echo $error_Ten_VC;}?></td>
        </tr>
        <tr>
            <td><label>Ảnh mô tả</label><br /><input type="file" name="Anh_VC" /> <?php if(isset($error_Anh_VC)){echo $error_Anh_VC;}?></td></td>
        </tr>
        <tr>
            <td><label>Loại Vaccine</label><br />
                <select name="Ma_DM">
                    <option value="unselect" selected="selected">Lựa chọn loại vaccine</option>
                    <?php
					while($rowDm= mysql_fetch_array($queryDm)){
                    ?>
                    <option value=<?php echo $rowDm['Ma_DM'];?>><?php echo $rowDm['Ten_DM'];?>
                    </option>
                    <?php
                    }
                    ?>
                </select>	
            </td>
        </tr>
        <tr>
            <td><label>Giá Vaccine</label><br /><input type="text" name="Gia_VC" /> VNĐ <?php if(isset($error_Gia_VC)){echo $error_Gia_VC;}?></td>
        </tr>
        <tr>
            <td><label>Địa Chỉ Sản Xuất</label><br /><input type="text" name="DiaChiSX" /> <?php if(isset($error_DiaChiSX)){echo $error_DiaChiSX;}?></td>
        </tr>
        <tr>
            <td><label>Ngày Sản Xuất</label><br /><input type="date" name="NgaySX"  /><?php if(isset($error_NgaySX)){echo $error_NgaySX;}?></td>
        </tr>
         <tr>
            <td><label>Hạn Sử Dụng</label><br /><input type="date" name="HanSuDung"  /><?php if(isset($error_HanSuDung)){echo $error_HanSuDung;}?></td>
        </tr>
         <tr>
            <td><label>Ghi chú</label><br /><input type="text" name="Ghichu"  /> <?php if(isset($error_Ghichu)){echo $error_Ghichu;}?></td>
        </tr> 
        <tr>
            <td><label>Số Mũi Tiêm</label><br /><input type="text" name="SoMui_Tiem"  /> <?php if(isset($error_SoMui_Tiem)){echo $error_SoMui_Tiem;}?></td>
        </tr>
        <tr>
            <td><label>Phòng Bệnh</label><br /><input type="text" name="PhongBenh"  /> <?php if(isset($error_PhongBenh)){echo $error_PhongBenh;}?></td>
        </tr>
        <tr>
            <td><label>Còn Vaccine</label><br /> Không <input type="radio" name="tinhtrang" value=1 /> Có <input checked="checked" type="radio" name="tinhtrang" value=0 /></td>
        </tr>
        <tr>
            <td><label>Thông Tin Chi Tiết Vaccine</label><br />
            <?php
            include("fckeditor/fckeditor.php");
            $sBasePath = $_SERVER ['PHP_SELF'];
            $sBasePath = substr($sBasePath, 0, strpos($sBasePath, "quantri.php"));
            $sBasePath = $sBasePath."fckeditor/";
            $oFCKeditor = new FCKeditor ('ChiTiet_VC');
            $oFCKeditor->BasePath = $sBasePath;
            if (isset($_POST["ChiTiet_VC"])) {
            	$oFCKeditor->value = $_POST["ChiTiet_VC"];	# code...
            }
            else{
            	$oFCKeditor->value = $row["ChiTiet_VC"];
            }
            $oFCKeditor->Create();
            ?>
            <?php if(isset($error_ChiTiet_VC)){echo $error_ChiTiet_VC;}?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>