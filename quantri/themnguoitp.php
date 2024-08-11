<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once('../cauhinh/ketnoi.php');
error_reporting(E_ALL & ~E_NOTICE & ~8192); 
// $datatk = mysql_fetch_object($querysqla);
$sqlBS="SELECT * FROM qly_bacsi";
$queryBS= mysql_query($sqlBS);
//
$Maso_TP =$_GET['Maso_TP'];
$sqlDm="SELECT * FROM qly_sotp WHERE Maso_TP='$Maso_TP'";
$queryDm= mysql_query($sqlDm);

//
$Ma_Tk = $_GET['Ma_Tk'];
$sql2 = "SELECT * FROM qly_tk INNER JOIN qly_dangki ON qly_Tk.Ten_DN = qly_dangki.Ten_DN ORDER BY Ma_Tk";
$query2 = mysql_query($sql2);
$row3 = mysql_fetch_array($query2);

$Ma_DK = $_GET['Ma_DK'];
$sql1 = "SELECT * FROM qly_dangki INNER JOIN qly_vaccine ON qly_dangki.Ma_VC = qly_vaccine.Ma_VC WHERE Ma_DK = '$Ma_DK'";
$query1 = mysql_query($sql1);
$row = mysql_fetch_array($query1);

session_start();
$dataUser =$_SESSION['dataUser'];
if(isset($_POST['submit']))
{   
    if($_POST['Ten_sotp'] == ''){
        $Ten_sotp = $row['Ho_Ten'];  
    }
    else{
        $Ten_sotp = $row['Tennguoi_TP'];   
    }
    //
    $Ma_Tk = $row3['Ma_Tk'];
//
    if($row['Tennguoi_TP'] == ''){
        $Tennguoi_TP = $row['Ho_Ten'];  
    }
    else{
        $Tennguoi_TP = $row['Tennguoi_TP'];   
    }
    //2
    if($row['CMND1'] == 0){
        $CMND1 = $row['CMND'];  
    }
    else{
        $CMND1 = $row['CMND1'];   
    }
    //3
    if($row['NgaySinh1'] == 0){
        $NgaySinh1 = $row['NgaySinh'];  
    }
    else{
        $NgaySinh1 = $row['NgaySinh1'];   
    }
    //4gt
    $GioiTinh1 = $row['GioiTinh1'];
    //5
    if($row['SDT1'] == '0'){
        $SDT1 = $row['SDT'];  
    }
    else{
        $SDT1 = $row['SDT1'];   
    }
    //
    if($row['DiaChi1'] == ''){
        $DiaChi1 = $row['DiaChi'];  
    }
    else{
        $DiaChi1 = $row['DiaChi1'];   
    }
    //
    if($row['Ma_VC'] == ''){
        $error_Ma_VC = '<span style="color:red;">(*)<span>';  
    }
    else{
        $Ma_VC = $row['Ma_VC'];   
    }
    //
    $Ngay_TP = $row['Ngay_TP'];
    //
    if($_POST['PhanUngPhu'] == ''){
        $error_PhanUngPhu = '<span style="color:red;">(*)<span>';  
    }
    else{
        $PhanUngPhu = $_POST['PhanUngPhu'];   
    }
    //10
    if($_POST['Ma_BS'] == ''){
        $error_Ma_BS = '<span style="color:red;">(*)<span>';  
    }
    else{
        $Ma_BS = $_POST['Ma_BS'];   
    }
    $Ma_DK =$row['Ma_DK'];
    $XacNhan =$_POST['XacNhan'];
/*    var_dump($Ten_sotp,
// $Ma_Tk,
// $Tennguoi_TP,
// $CMND1,
// $NgaySinh1,
// $GioiTinh1,
// $SDT1,
// $DiaChi1,
$Ma_VC,
// $Ngay_TP,
// $PhanUngPhu,
// $Ma_BS,
// $Ma_DK ,
      $XacNhan);
        exit();*/
    
    
    if( isset($Ten_sotp)&&isset($Ma_Tk)&& isset($Tennguoi_TP) && isset($CMND1) && isset($NgaySinh1) && isset($GioiTinh1) && isset($SDT1) && isset($DiaChi1) && isset($Ma_VC) && isset($Ngay_TP)&& isset($Ma_BS) && isset($XacNhan) && isset($PhanUngPhu))
    {   
        //
        $sql15 = "INSERT INTO qly_sotp(Maso_TP,Ten_sotp) VALUES('$Maso_TP','$Ten_sotp')";
        $query15 = mysql_query($sql15);
        // var_dump($sql15);exit();
        $sqltp = "SELECT Maso_TP FROM qly_sotp ORDER BY Maso_TP DESC LIMIT 1";
        $masotp = mysql_query($sqltp);
        $masotp1 = mysql_fetch_row($masotp);
        $Maso_TP = $masotp1[0];
        //

        $sql16 ="SELECT * FROM qly_ttnguoitp INNER JOIN qly_sotp ON qly_ttnguoitp.Maso_TP = qly_sotp.Maso_TP";
        $query16 =mysql_query($query16);
        $sql12 = "INSERT INTO qly_ttnguoitp(Ma_Tk, Maso_TP, Tennguoi_TP, CMND1, NgaySinh1, GioiTinh1, SDT1, DiaChi1) 
                VALUES('$Ma_Tk', '$Maso_TP', '$Tennguoi_TP', '$CMND1', '$NgaySinh1', '$GioiTinh1', '$SDT1', '$DiaChi1')";
        $query12 = mysql_query($sql12);
        // var_dump($sql12);
        // exit(); 

        //
        $sql17 ="SELECT * FROM chitiet_sotp INNER JOIN qly_sotp ON chitiet_sotp.Maso_TP = qly_sotp.Maso_TP";
        $query17 =mysql_query($query17);
        $sql13 = "INSERT INTO chitiet_sotp(Maso_TP, Ma_VC, Ngay_TP, Ma_BS ,PhanUngPhu) 
                VALUES('$Maso_TP','$Ma_VC', '$Ngay_TP', '$Ma_BS' ,'$PhanUngPhu')";
        $query13 = mysql_query($sql13);
        // var_dump($sql13);
        // exit();
        
        $sql11 ="UPDATE qly_dangki SET XacNhan='$XacNhan' WHERE Ma_DK = '$Ma_DK'";
        $query11 = mysql_query($sql11);


        $sql19="SELECT Hang_ConLai FROM qly_vaccine WHERE Ma_VC= '$Ma_VC'";
        $query19 = mysql_fetch_row(mysql_query($sql19));
        $hangconlai = $query19[0] - 1;
        mysql_query("UPDATE qly_vaccine SET Hang_Conlai = '$hangconlai' WHERE Ma_VC = '$Ma_VC'");
        //var_dump(mysql_query("UPDATE qly_vaccine SET Hang_Conlai = '$hangconlai'"));exit();
        // Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
        header('location:quantri.php?page_layout=nguoitp');  
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng - Đăng nhập hệ thống</title>
<link rel="stylesheet" type="text/css" href="../quantri/css/quanlitiem.css" />
</head>
<body>
<?php

?>

<form method="post">
<div id="form-login">
    <h3>quản lí hồ sơ tiêm</h3>
    <ul>
        <li><label>Tên Sổ tiêm</label><input type="text" name="Maso_tp" value="<?php echo $row['Ten_sotp'];?><?php if($row['Tennguoi_TP']==''){echo $row['Ho_Ten'];} else {echo $row['Tennguoi_TP'];}?>" /></li>
        <li><label>Tên đăng nhập</label><input type="text" disabled name="Ma_Tk" value="<?php echo $row['Ten_DN'];?>" /></li>
        <li><label>Tên người tiêm</label><input type="text" disabled name="Tennguoi_TP" value="<?php if($row['Tennguoi_TP']==''){echo $row['Ho_Ten'];} else {echo $row['Tennguoi_TP'];}?>" /></li>
        
        <li><label>CMND</label><input type="text" disabled name="CMND1" value="<?php if($row['CMND1']==0){echo $row['CMND'];} else {echo $row['CMND1'];}?>" /></li>
        <li><label>Ngày sinh</label><input type="text" disabled name="NgaySinh1" value="<?php if($row['NgaySinh1']==0){echo $row['NgaySinh'];} else{echo $row['NgaySinh1'];};?>" /></li>
        <li><label>Giới Tính</label><input type="text" disabled name="GioiTinh1" value="<?php if($row['GioiTinh1']==0){echo "nam";} else{echo "Nữ";};?>" /></li>
        <li><label>Số điện thoại</label><input type="text" disabled name="SDT1" value="<?php if($row['SDT1']==0){echo"0".$row['SDT'];} else{echo"0".$row['SDT1'];};?>" /></li>
        <li><label>Địa chỉ</label><input type="text" disabled name="DiaChi1" value="<?php if($row['DiaChi1']==''){echo $row['DiaChi'];} else{echo $row['DiaChi1'];};?>" /></li>
        <!-- thong tin nguoi khac -->
        <li><label>Loại vaccine</label><input type="text" disabled name="Ma_VC" value="<?php echo $row['Ten_VC'];?>"/></li>
        <li><label>Ngày Tiêm Phòng</label><input type="date" name="Ngay_TP" value="<?php echo $row['Ngay_TP'];?>" /></li>
        <li>
            <label>Bác sĩ Tiêm</label>
                <select name="Ma_BS">
                    <option value="unselect" selected="selected">Lựa chọn Bác Sĩ</option>
                    <?php
                    while($rowBS= mysql_fetch_array($queryBS)){
                    ?>
                    <option value=<?php echo $rowBS['Ma_BS'];?>><?php echo $rowBS['Ten_BS'];?>
                    </option>
                    <?php
                    }
                    ?>
                </select>   
        </li>
        <li><label>Phản ứng phụ</label><input type="text" name="PhanUngPhu" value="Không phản ứng phụ" /><?php if(isset($error_PhanUngPhu)){echo $error_PhanUngPhu;}?></li>
        <li><label>Xác nhận đã tiêm</label> Đã tiêm <input <?php if ($row['XacNhan']==1) {echo 'checked="checked"';}?> type="radio" name="XacNhan" value=1 />Chưa Tiêm <input <?php if ($row['XacNhan']==0) {echo 'checked="checked"';}?> type="radio" name="XacNhan" value=0 /></li>
        <li><input type="submit" name="submit" value="thêm mới" style="margin-left:100px" /> <input type="reset" name="resset" value="Làm mới" /></li>
    </ul>
</div>
</form>
</body>
</html>