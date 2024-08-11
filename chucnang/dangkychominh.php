<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once('../cauhinh/ketnoi.php');
error_reporting(E_ALL & ~E_NOTICE & ~8192); 
$sqlm="SELECT * FROM qly_dangki";
$querysqlm = mysql_query($sqlm);
$sqln="SELECT* FROM qly_tk";
$querysqln = mysql_query($sqln);
$row = mysql_fetch_array($querysqln);
$sqlvc = "SELECT * FROM qly_vaccine";
$querysqlvc = mysql_query($sqlvc);
// $datatk = mysql_fetch_object($querysqla);
session_start();
$dataUser =$_SESSION['dataUser'];
if(isset($_POST['submit']))
{	
	//1
	$Ma_DK =$_POST['Ma_DK'];
	//2
	// $Manguoi_TP = $_POST['Manguoi_TP'];
	//3
	if($_POST['Ma_VC'] == ''){
		$error_Ma_VC = '<span style="color:red;">(*)<span>';	
	}
			# code...
	else{
		$Ma_VC = $_POST['Ma_VC'];	
	}
	
	//4
	if($_POST['Ngay_TP'] == ''){
		$error_Ngay_TP = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Ngay_TP = $_POST['Ngay_TP'];	
	}
	//5
	if($_POST['Tennguoi_TP'] == ''){
		$error_Tennguoi_TP = '<span style="color:red;">(*)<span>';	
	}
	else{
		$Tennguoi_TP = $_POST['Ten_DN'];	
	}
	//6
	if($_POST['NgaySinh'] == ''){
		$error_NgaySinh = '<span style="color:red;">(*)<span>';	
	}
	else{
		$NgaySinh = $_POST['NgaySinh'];	
	}
	//7
	if($_POST['CMND'] == ''){
		$error_CMND = '<span style="color:red;">(*)<span>';	
	}
	else{
		$CMND = $_POST['CMND'];	
	}
	//8
	if($_POST['GioiTinh'] == ''){
		$error_GioiTinh= '<span style="color:red;">(*)<span>';	
	}
	else{
		$GioiTinh = $_POST['GioiTinh'];	
	}
	//9
	if($_POST['DiaChi'] == ''){
		$error_DiaChi = '<span style="color:red;">(*)<span>';	
	}
	else{
		$DiaChi = $_POST['DiaChi'];	
	}
	//10
	if($_POST['SDT'] == ''){
		$error_SDT = '<span style="color:red;">(*)<span>';	
	}
	else{
		$SDT = $_POST['SDT'];	
	}
	//11
	$XacNhan = 0;
	//12
	$Ho_Ten=$dataUser->Ho_Ten;
	//17
	$Ma_Tk= $dataUser->Ma_Tk;
	//18
	$Ten_DN =$_POST['Ten_DN'];
	//19
	$Mk_DN = $_POST['Mk_DN'];
	$phanbiet = 0;
	// var_dump(
	// $Ma_DK,
	// $Ma_VC,
	// $Ngay_TP,
	// $Tennguoi_TP,
	// $NgaySinh,
	// $CMND,
	// $GioiTinh,
	// $DiaChi,
	// $SDT,
	// $XacNhan,
	// $Ho_Ten,
	// $Ma_Tk,
	// $Ten_DN,
	// $phanbiet);exit();

	if(isset($NgaySinh) && isset($CMND) && isset($DiaChi) && isset($SDT) && isset($phanbiet))
	{	
		$sql2 = "INSERT INTO qly_dangki(Ma_DK, Ma_VC, Ngay_TP, Tennguoi_TP, CMND, NgaySinh,
			GioiTinh, SDT, DiaChi, XacNhan, Ho_Ten, Ten_DN, phanbiet)
				VALUES('$Ma_DK', '$Ma_VC', '$Ngay_TP', '$Tennguoi_TP', '$CMND', '$NgaySinh',
			'$GioiTinh', '$SDT', '$DiaChi', '$XacNhan', '$Ho_Ten', '$Ten_DN','$phanbiet')
				";
	   	$query = mysql_query($sql2);
		header('location:../index.php'); 	
    }
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
<form method="post">
<div id="form-login">
	<h2>Đăng ký Tiêm Cho Chính Bạn</h2>
    <ul>
    	<li><label>Họ tên</label><input type="hidden" name="Ho_Ten" value="<?php echo $dataUser->Ho_Ten;?>" /><?php echo $dataUser->Ho_Ten;?></li>
        <li><label>tài khoản</label><input type="hidden" name="Ten_DN" value="<?php echo $dataUser->Ten_DN;?>" /><?php echo $dataUser->Ten_DN;?></li>
        <li><label>Ngày sinh</label><input type="hidden" name="NgaySinh" value="<?php echo $dataUser->NgaySinh;?>" /><?php echo $dataUser->NgaySinh;?></li>
        <li><label>Giới tính</label><input type="hidden" name="GioiTinh" value="<?php echo $dataUser->GioiTinh;?>" /><?php if ($dataUser->GioiTinh == 0){echo "nam";} else {echo "Nữ";};?></li>
        <li><label>CMND</label><input type="hidden" name="CMND" value="<?php echo $dataUser->CMND;?>" /><?php echo $dataUser->CMND;?></li>
        <li><label>Địa chỉ</label><input type="hidden" name="DiaChi" value="<?php echo $dataUser->DiaChi;?>" /><?php echo $dataUser->DiaChi;?></li>
        <li><label>Số điện thoại</label><input type="hidden" name="SDT" value="<?php echo $dataUser->SDT;?>" /><?php echo $dataUser->SDT;?></li>
        <!-- thong tin nguoi khac -->
    
        <li><label>Loại Vaccine</label>
                <select name="Ma_VC">
                    <option value="unselect" selected="selected">Lựa chọn loại vaccine</option>
                    <?php
					while($rowDmvc= mysql_fetch_array($querysqlvc)){
                    ?>
                    <option value=<?php echo $rowDmvc['Ma_VC'];?> <?php if($rowDmvc['Ma_VC'] == $_SESSION['Ma_VC']){echo 'selected="selected"';} ?> > <?php echo $rowDmvc['Ten_VC'];?>
                    </option>
                    <?php
                    }
                    ?>
                </select>	
        </li>
        <li><label>Ngày Tiêm Phòng</label><input type="date" name="Ngay_TP" /><?php if(isset($error_Ngay_TP)){echo $error_Ngay_TP;}?></li>
        
        <li><input type="submit" name="submit" value="Đăng ký" style="margin-left:100px" /> <input type="reset" name="resset" value="Làm mới" /></li>
    </ul>
</div>
</form>
</body>
</html>