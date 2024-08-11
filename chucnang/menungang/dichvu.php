<script language="javascript">
function xoaSanpham(){
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
$rowsPerPage = 20;

// Tính vị trí mẩu tin đầu tiên của mỗi trang
$firstRow = $page*$rowsPerPage - $rowsPerPage;

// Liệt kê Danh sách dữ liệu trên mỗi trang
$sql = "SELECT * FROM qly_vaccine
				 INNER JOIN qly_dmvaccine
				 ON qly_vaccine.Ma_DM = qly_dmvaccine.Ma_DM 
				 ORDER BY Ma_VC ASC
				 LIMIT $firstRow, $rowsPerPage";
$query = mysql_query($sql);

// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_vaccine"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++)
{
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=dichvu&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>
<h2>Bảng Giá Một Lần Tiêm Chủng</h2>
<div id="main">
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%" >
        <tr id="prd-bar">
            <td width="5%">STT</td>
            <td width="30%">Phòng Bệnh</td>
            <td width="20%">Tên Vaccine</td>
            <td width="15%">Giá Vaccine</td>
            <td width="20%">Nhà cung cấp</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_VC'];?></span></td>
            <td class="l5"><span class="PhongBenh"><?php echo $row['PhongBenh'];?></span></td>
            <td class="l5"><a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></td>
            <td class="l5"><span class="price"><?php echo $row['Gia_VC'];?>  VNĐ</span></td>
            <td class="l5"><?php echo $row['DiaChiSX'];?></td>
        </tr>
<?php }?>        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>