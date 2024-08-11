<script language="javascript">
function xoanhanvien(){
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
$sql = "SELECT * FROM qly_tk 
 				 LIMIT $firstRow, $rowsPerPage";
$query = mysql_query($sql);

// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_tk"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++){
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=nhanvien&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>
<h2>quản lý thành viên</h2>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themnv"><span>thêm thành viên mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="15%">Họ và tên</td>
            <td width="10%">Số CMND</td>
            <td width="20%">Địa Chỉ</td>
            <td width="5%">Giới Tính</td>
            <td width="10%">Ngày sinh</td>
            <td width="10%">SĐT</td>
            <td width="15%">Tên Đăng Nhập</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_Tk'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suanv&Ma_Tk=<?php echo $row['Ma_Tk'];?>"><?php echo $row['Ho_Ten'];?></a></td>
            <td class="l5"><?php echo $row['CMND'];?></td>
            <td class="l5"><?php echo $row['DiaChi'];?></td>
            <td class="l5"><?php if($row['GioiTinh']==0){echo "nam";} else {echo "nữ";}?></td>
            <td class="l5"><?php echo $row['NgaySinh'];?></td>
            <td class="l5"><?php echo $row['SDT'];?></td>
            <td class="l5"><?php echo $row['Ten_DN'];?></td>
            <td><a href="quantri.php?page_layout=suanv&Ma_Tk=<?php echo $row['Ma_Tk'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoanhanvien();" href="xoanv.php?Ma_Tk=<?php echo $row['Ma_Tk'];?>"><span>Xóa</span></a></td>
        </tr>
<?php }?>        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>