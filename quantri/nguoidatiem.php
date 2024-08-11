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
$sqldt = "SELECT QLVC.*,qly_bacsi.Ten_BS FROM qly_bacsi INNER JOIN (SELECT QLSO.*, qly_vaccine.Ten_VC FROM qly_vaccine
                 INNER JOIN (SELECT chitiet_sotp.*, qly_ttnguoitp.Manguoi_TP, qly_ttnguoitp.Tennguoi_TP FROM qly_ttnguoitp INNER JOIN chitiet_sotp ON qly_ttnguoitp.Maso_TP = chitiet_sotp.Maso_TP) as QLSO
                 ON qly_vaccine.Ma_VC = QLSO.Ma_VC)as QLVC ON qly_bacsi.Ma_BS = QLVC.Ma_BS
				 ORDER BY Manguoi_TP DESC
				 LIMIT $firstRow, $rowsPerPage";
$querydt = mysql_query($sqldt);
// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_ttnguoitp"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++){
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=nguoidatiem&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>
<h2>quản lý vaccine</h2>
<div id="main">
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="10%">ID</td>
            <td width="20%">Tên Người tiêm</td>
            <td width="15%">Vaccine tiêm</td>
            <td width="20%">Bác sĩ tiêm</td>
            <td width="15%">Ngày Tiêm</td>
            <td width="20%">Phản Ứng Phụ</td>
            
            
        </tr>
<?php while($row = mysql_fetch_array($querydt)){?>        
        <tr>
            <td><span><?php echo $row['Manguoi_TP'];?></span></td>
            <td><span><?php echo $row['Tennguoi_TP'];?></span></td>
            <td><span><?php echo $row['Ten_VC'];?></span></td>
            <td><span><?php echo $row['Ten_BS']?></span></td>
            <td><span><?php echo $row['Ngay_TP'];?></span></td>
            <td><span><?php echo $row['PhanUngPhu'];?></span></td>
        </tr>
<?php }?>       
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>