<?php
// Lấy Tham số id_sp trên URL
$Ma_VC = $_GET['Ma_VC'];
// Lấy thông tin Danh mục Sản phẩm Selectbox
$sqlDm = "SELECT * FROM qly_dmvaccine";
$queryDm = mysql_query($sqlDm);

// Lấy Thông tin của ản phẩm trong CSDL
$sql = "SELECT * FROM qly_vaccine WHERE Ma_VC = $Ma_VC";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
// Bẫy lỗi để trống trường dữ liệu trong Form
if(isset($_POST['submit']))
{
	// Tên vaccine
	if($_POST['Ten_VC'] == ''){
		$error_Ten_VC = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ten_VC = $_POST['Ten_VC'];	
	}	
	//2 Giá vaccine
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
	//9 Ảnh mô tả Sản phẩm
	if($_FILES['Anh_VC']['name'] == ''){
		$Anh_VC = $_POST['Anh_VC'];
	}
	else{
		$Anh_VC = $_FILES['Anh_VC']['name'];
		$tmp_name = $_FILES['Anh_VC']['tmpname'];
	}	
	//10 phong benh
	if($_POST['PhongBenh'] == ''){
		$error_PhongBenh = '<span style="color:red;">(*)<span>';
	}
	else{
		$PhongBenh = $_POST['PhongBenh'];
	}
	//11 Trạng thái
		$tinhtrang = $_POST['tinhtrang'];
	//12 Danh mục Sản phẩm
		$Ma_DM = $_POST['Ma_DM'];
	
	// Xử lý Sửa Thông tin Sản phẩm
	if(isset($Ten_VC) && isset($Gia_VC) && isset($DiaChiSX) && isset($NgaySX) && isset($HanSuDung) && isset($PhongBenh) && isset($ChiTiet_VC) && isset($Ghichu)&& isset($SoMui_Tiem))
	{
		// Xử lý Upload nếu Ảnh Mô Tả được thay đổi
		{
			$upload_file = move_uploaded_file($tmp_name, 'anh/'.$Anh_VC);
		}
		
		// Xử lý Upload Thông tin Sản phẩm vào CSDL
		$sql = "UPDATE qly_vaccine SET Ma_DM = '$Ma_DM' , Ten_VC = '$Ten_VC', Anh_VC = '$Anh_VC', Gia_VC = $Gia_VC, DiaChiSX = '$DiaChiSX',
		 NgaySX = '$NgaySX', HanSuDung = '$HanSuDung' , PhongBenh = '$PhongBenh', ChiTiet_VC = '$ChiTiet_VC', tinhtrang = '$tinhtrang', Ghichu = '$Ghichu', SoMui_Tiem='$SoMui_Tiem' WHERE Ma_VC = '$Ma_VC'";
		$query = mysql_query($sql);
		header('location:quantri.php?page_layout=danhsachsp');	
	}	
}
?>
<h2>sửa thông tin Vaccine</h2>
<div id="main">
    <form method="post" enctype="multipart/form-data">
    <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td><label>Tên Vaccine</label><br /><input type="text" name="Ten_VC" value="<?php if(isset($_POST['Ten_VC'])){echo $_POST['Ten_VC'];}else{echo $row['Ten_VC'];}?>" /> <?php if(isset($error_Ten_VC)){echo $error_Ten_VC;}?></td>
        </tr>
        <tr>
            <td><label>Ảnh mô tả</label><br /><input type="file" name="Anh_VC" /> <input type="hidden" name="Anh_VC" value="<?php echo $row['Anh_VC'];?>" /></td>
        </tr>
        <tr>
            <td><label>Loai Vaccine</label><br />
                <select name="Ma_DM">
                	<?php while($rowDm = mysql_fetch_array($queryDm)){
                	?>
                    <option <?php if($rowDm['Ma_DM'] == $row['Ma_DM']){echo "selected='selected'";}?> value=<?php echo $rowDm['Ma_DM'];?>><?php echo $rowDm['Ten_DM']?>
                    </option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Giá Vaccine</label><br /><input type="text" name="Gia_VC" value="<?php if(isset($_POST['Gia_VC'])){echo $_POST['Gia_VC'];}else{echo $row['Gia_VC'];}?>" /> VNĐ<?php if(isset($error_Gia_VC)){echo $error_Gia_VC;}?></td>
        </tr>
        <tr>
            <td><label>Ngày Sản Xuất</label><br /><input type="date" name="NgaySX" value="<?php if(isset($_POST['NgaySX'])){echo $_POST['NgaySX'];}else{echo $row['NgaySX'];}?>" /><?php if(isset($error_NgaySX)){echo $error_NgaySX;}?></td>
        </tr>
        <tr>
            <td><label>Hạn Sử Dùng</label><br /><input type="date" name="HanSuDung" value="<?php if(isset($_POST['HanSuDung'])){echo $_POST['HanSuDung'];}else{echo $row['HanSuDung'];}?>" /><?php if(isset($error_HanSuDung)){echo $error_HanSuDung;}?></td>
        </tr>
        <tr>
            <td><label>Phòng Bệnh</label><br /><input type="text" name="PhongBenh" value="<?php if(isset($_POST['PhongBenh'])){echo $_POST['PhongBenh'];}else{echo $row['PhongBenh'];}?>" /> <?php if(isset($error_PhongBenh)){echo $error_PhongBenh;}?></td>
        </tr>
        <tr>
            <td><label>Còn Vaccine</label><br /> Không <input <?php if ($row['tinhtrang']==1) {echo 'checked="checked"';}?> type="radio" name="tinhtrang" value=1 /> Có <input <?php if ($row['tinhtrang']==0) {echo 'checked="checked"';}?> type="radio" name="tinhtrang" value=0 /></td>
        </tr>
        <tr>
            <td><label>Địa Chỉ SX</label><br /><input type="text" name="DiaChiSX" value="<?php if(isset($_POST['DiaChiSX'])){echo $_POST['DiaChiSX'];}else{echo $row['DiaChiSX'];}?>" /> <?php if(isset($error_DiaChiSX)){echo $error_DiaChiSX;}?></td>
        </tr>
        <tr>
            <td><label>Ghi Chú</label><br /><input type="text" name="Ghichu" value="<?php if(isset($_POST['Ghichu'])){echo $_POST['Ghichu'];}else{echo $row['Ghichu'];}?>" /> <?php if(isset($error_Ghichu)){echo $error_Ghichu;}?></td>
        </tr>
        <tr>
            <td><label>Số Mũi Tiêm</label><br /><input type="text" name="SoMui_Tiem" value="<?php if(isset($_POST['SoMui_Tiem'])){echo $_POST['SoMui_Tiem'];}else{echo $row['SoMui_Tiem'];}?>" /> <?php if(isset($error_SoMui_Tiem)){echo $error_SoMui_Tiem;}?></td>
        </tr>
        <tr>
            <td><label>Thông tin chi tiết Vaccine</label><br />
            <?php
            include("fckeditor/fckeditor.php");
            $sBasePath = $_SERVER ['PHP_SELF'];
            $sBasePath = substr($sBasePath, 0, strpos($sBasePath, "quantri.php"));
            $sBasePath = $sBasePath."fckeditor/";
            $oFCKeditor = new FCKeditor ('ChiTiet_VC');
            $oFCKeditor->BasePath = $sBasePath;
            if (isset($_POST["ChiTiet_VC"])) 
            {
            	$oFCKeditor->value = $_POST["ChiTiet_VC"];	# code...
            }
            else
            {
            	$oFCKeditor->value =$row["ChiTiet_VC"];
            }
            $oFCKeditor->Create();
            ?>
            <?php if(isset($error_ChiTiet_VC)){echo $error_ChiTiet_VC;}?></td>
            
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>