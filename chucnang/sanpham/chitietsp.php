<?php
ini_set('display_errors', '0');
?>    
<?php
$Ma_VC = $_GET['Ma_VC'];
session_start();
$sql = "SELECT * FROM qly_vaccine INNER JOIN qly_dmvaccine ON qly_vaccine.Ma_DM = qly_dmvaccine.Ma_DM WHERE Ma_VC = '$Ma_VC'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
$VC =mysql_fetch_object($query);
$_SESSION['Ma_VC'] = $_GET['Ma_VC'];
// var_dump($_SESSION['VC']);exit();
?>
<div class="prd-block">  
    <div class="prd-only">
        <div class="prd-img"><img width="50%" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></div>	
        <div class="prd-intro">
            <h3><?php echo $row['Ten_VC'];?></h3>
            <p>Giá vaccine: <span><?php echo $row['Gia_VC'];?> VNĐ</span></p>
            <table>
                <tr>
                    <td width="30%"><span>Ghi chú:</span></td>
                    <td>• <?php echo $row['GhiChu'];?></td>
                </tr>
                <tr>
                    <td><span>Ngày Sản Xuất:</span></td>
                    <td>• <?php echo $row['NgaySX'];?></td>
                </tr>
                <tr>
                    <td><span>Hạn sử dụng:</span></td>
                    <td>• <?php echo $row['HanSuDung'];?></td>
                </tr>
                <tr>
                    <td><span>Địa chỉ SX:</span></td>
                    <td>• <?php echo $row['DiaChiSX'];?></td>
                </tr>
                <tr>
                    <td><span>Còn hàng:</span></td>
                    <td>• <?php if($tinhtrang==0){echo 'Còn hàng';} elseif($tinhtrang==1){echo 'Hết hàng';}?></td>
                </tr>
                </tr>
                <tr>
                    <td><span>Số Mũi Tiêm:</span></td>
                    <td>• <?php echo $row['SoMui_Tiem'];?></td>
                </tr>
                <tr>
                    <td><span>Phòng Bệnh:</span></td>
                    <td>• <?php echo $row['PhongBenh'];?></td>
                </tr>
            </table>
            <p class="add-cart"><a href="chucnang/giohang/themhang.php?Ma_VC=<?php echo $row['Ma_VC'];?>"><span>Đăng Kí Tiêm Ngay</span></a></p>
        </div>
        
        <div class="clear"></div>
        
        <div class="prd-details">
        <p><?php echo $row['ChiTiet_VC'];?></p>
        </div>
    </div>
</div>
