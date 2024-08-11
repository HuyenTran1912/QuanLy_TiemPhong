<script language="javascript">
function xoabacsi(){
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
$sql = "SELECT * FROM qly_bacsi
 				 LIMIT $firstRow, $rowsPerPage";
$query = mysql_query($sql);

// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_bacsi"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++){
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=bacsi&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>
<h2>quản lý Bác Sĩ</h2>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=thembacsi"><span>thêm thành viên mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="15%">Họ và tên</td>
            <td width="10%">SĐT</td>
            <td width="10%">Địa chỉ</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_BS'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suabacsi&Ma_BS=<?php echo $row['Ma_BS'];?>"><?php echo $row['Ten_BS'];?></a></td>
            <td class="l5"><?php echo $row['SDT_BS'];?></td>
            <td class="l5"><?php echo $row['DiaChi_BS'];?></td>
            <td><a href="quantri.php?page_layout=suabacsi&Ma_BS=<?php echo $row['Ma_BS'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoabacsi();" href="xoabacsi.php?Ma_BS=<?php echo $row['Ma_BS'];?>"><span>Xóa</span></a></td>
        </tr>
<?php }?>        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>