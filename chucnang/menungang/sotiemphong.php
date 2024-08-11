<?php
error_reporting(0);
ini_set('display_errors', 0);
include_once('../cauhinh/ketnoi.php');
session_start();
if(isset($_SESSION['dataUser'])){
    $dataUser = $_SESSION['dataUser'];
    $Ma_Tk = $dataUser->Ma_Tk;

    
    header('href="index.php?page_layout=sotiemphong');
}
else{
    header("location:chucnang/dangnhap.php");
}
?>
<?php
$dataUser = $_SESSION['dataUser'];
$Ma_Tk = $dataUser->Ma_Tk;
error_reporting(E_ALL & ~E_NOTICE & ~8192); 
$sqldt = "SELECT QLSO.*, qly_ttnguoitp.Tennguoi_TP FROM qly_ttnguoitp
                 INNER JOIN (SELECT chitiet_sotp.*, qly_vaccine.Ten_VC, qly_vaccine.Gia_VC,qly_vaccine.SoMui_Tiem , qly_vaccine.PhongBenh, qly_vaccine.Ma_DM FROM qly_vaccine
                INNER JOIN chitiet_sotp ON qly_vaccine.Ma_VC = chitiet_sotp.Ma_VC) as QLSO
                 ON qly_ttnguoitp.Maso_TP = QLSO.Maso_TP WHERE Ma_Tk ='$Ma_Tk'";
$querydt = mysql_query($sqldt);
// var_dump($row);exit();


// $sql = "SELECT * FROM chitiet_sotp";
// $query = mysql_query($sql);
// // $row1 = mysql_fetch_array($query);
//  var_dump($row);exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng - Đăng nhập hệ thống</title>
<link rel="stylesheet" type="text/css" href="sotiemphong.css" />
</head>
<body>
<h2>Thông tin hồ sơ Tiêm Phòng</h2>
<div id="main">
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="15%">Tên người tiêm</td>
            <td width="15%">Phòng bệnh</td>
            <td width="15%">Ngày Tiêm</td>
            <td width="15%">Số mũi tiêm</td>
            <td width="18%">Vaccine đã Tiêm</td>
            <td width="20%">Vaccine chưa tiêm</td>
        </tr>
        <?php  while($row = mysql_fetch_array($querydt)){ ?>
        <tr>
            <td height="30px"><span><?php echo $row['Tennguoi_TP'];?></span></td>
            <td><span><?php echo $row['PhongBenh'];?></span></td>
            <td><span><?php echo $row['Ngay_TP'];?></td>
            <td><span><?php echo $row['SoMui_Tiem'];?></td>
            <td bgcolor="blue"><span><?php echo $row['Ten_VC'];?></td>
            <td bgcolor="red"><a href="index.php?page_layout=danhsachsp&Ma_DM=<?php echo $row['Ma_DM']+1;?>">Vaccine tiêm tiếp theo</a></td>
        </tr>
        <?php }?>    
    </table>
</div>
</form>
</body>
</html>