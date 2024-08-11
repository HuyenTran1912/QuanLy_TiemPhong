<script language="javascript">
function xoanguoitp(){
	var conf = confirm('Bạn chắc chắn muốn xóa Vaccine này không?');
	return conf;	
}
</script>
<?php
// Nhận biến Page(Số thứ tự của Trang)
if(isset($_GET['page'])){
	$page = $_GET['page'];	
}
else{
	$page = 1;	
}

// Hiển thị số Sản phẩm trên một trang
$rowsPerPage = 10;

// Tính vị trí mẩu tin đầu tiên của mỗi trang
$firstRow = $page*$rowsPerPage - $rowsPerPage;

// Liệt kê Danh sách dữ liệu trên mỗi trang
$sql = "SELECT * FROM qly_dangki
				 INNER JOIN qly_vaccine
				 ON qly_dangki.Ma_VC = qly_vaccine.Ma_VC 
				 ORDER BY Ma_DK DESC
				 LIMIT $firstRow, $rowsPerPage";
$query = mysql_query($sql);
// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_dangki"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++){
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=nguoitp&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>
<h2>quản lý người tiêm phòng</h2>
<div id="main">
    <!-- <p id="add-prd"><a href="quantri.php?page_layout=themnguoitp"><span>quản lý sổ tiêm</span></a></p> -->
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="12%">Người Tiêm</td>
            <td width="12%">Người đăng kí</td>
            <td width="10%">CMND</td>
            <td width="12%">Địa Chỉ</td>
            <td width="8%">Giới Tính</td>
            <td width="10%">SĐT</td>
            <!-- <td width="10%">Ngày Tiêm</td>
            <td width="10%">Vaccine </td> -->
            <td width="10%">Ngày Sinh</td>
            <td width="10%">Loại DK</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
            <td width="5%">QL Sổ</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_DK'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suanguoitp&Ma_DK=<?php echo $row['Ma_DK'];?>"><?php if($row['Tennguoi_TP']==''){echo $row['Ho_Ten'];}else {echo $row['Tennguoi_TP'];}?></a></td>
            <td class="l5"><?php echo $row['Ho_Ten'];?></td>
            <td class="l5"><?php if ($row['CMND1'] == 0){echo $row['CMND'];} else {echo $row['CMND1'];}?></td>
            <td class="l5"><?php if ($row['DiaChi1']== ''){echo $row['DiaChi'];} else {echo $row['DiaChi1'];}?></td>
            <td class="l5"><?php if($row['GioiTinh1']==0) {echo "Nam";} else {echo "nữ";};?></td>
            <td class="l5"><?php if($row['SDT1']==0) {echo "0".$row['SDT'];} else {echo "0".$row['SDT1'];};?></td>
            <!-- <td class="l5"><?php echo $row['Ngay_TP'];?></td>
            <td class="l5"><?php echo $row['Ten_VC'];?></td> -->
            <td class="l5"><?php if($row['NgaySinh1']==0){echo $row['NgaySinh'];}else{echo $row['NgaySinh1'];}?></td>
            <td class="l5"><?php if($row['phanbiet'] ==0){echo "Cho mình";} else {echo " Người khác";};?></td>
            <td><?php if($row['phanbiet']== 1) {?><a href="quantri.php?page_layout=suanguoitp&Ma_DK=<?php echo $row['Ma_DK'];?>"><span>Sửa</span></a><?php }?></td>
            <td><a onclick="return xoanguoitp();" href="xoanguoitp.php?Ma_DK=<?php echo $row['Ma_DK'];?>"><span>Xóa</span></a></td>
            <td><?php if($row['XacNhan']== 0) {?><a href="quantri.php?page_layout=themnguoitp&Ma_DK=<?php echo $row['Ma_DK'];?>"><span>Quản Lý</span></a><?php }?></td>
        </tr>
<?php }?>        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>