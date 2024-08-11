<script language="javascript">
function xoadmSanpham(){
	var conf = confirm('Bạn chắc chắn muốn xóa danh mục Vaccine này không?');
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
$sql = "SELECT * FROM qly_dmvaccine order by Ma_DM desc";
$query = mysql_query($sql);

// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_dmvaccine"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++){
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhmucsp&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>
<h2>quản lý danh mục vaccine</h2>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themdmsp"><span>thêm danh muc Vaccine mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="10%">ID</td>
            <td width="60%">Tên danh mục Vaccine</td>
            <td width="10%">Sửa</td>
            <td width="10%">Xóa</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_DM'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suadmsp&Ma_DM=<?php echo $row['Ma_DM'];?>"><?php echo $row['Ten_DM'];?></a></td>
            <td><a href="quantri.php?page_layout=suadmsp&Ma_DM=<?php echo $row['Ma_DM'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoadmSanpham();" href="xoadmsp.php?Ma_DM=<?php echo $row['Ma_DM'];?>"><span>Xóa</span></a></td>
        </tr>
<?php }?>        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>