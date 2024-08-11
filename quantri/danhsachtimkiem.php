<?php
if(isset($_GET['page'])){
	$page = $_GET['page'];	
}
else{
	$page = 1;	
}
$rowsPerPage = 3;
$perRow = $page*$rowsPerPage - $rowsPerPage;

// Nhận Từ khóa cần tìm
if(isset($_POST['stext'])){
	$stext = $_POST['stext'];
}
else{
	$stext = $_GET['stext'];
}
// Loại bỏ các khoảng trắng đầu và cuối chuỗi Từ khóa
$stextNew = trim($stext);

$arr_stextNew = explode(' ', $stextNew);
$stextNew = implode('%', $arr_stextNew);
$stextNew = '%'.$stextNew.'%';

$sql = "SELECT *  FROM qly_vaccine
				 INNER JOIN qly_dmvaccine
				 ON qly_vaccine.Ma_DM = qly_dmvaccine.Ma_DM  WHERE Ten_VC LIKE ('$stextNew') ORDER BY Ma_VC DESC LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);

$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_vaccine WHERE Ten_VC LIKE ('$stextNew')"));
$pageNum = ceil($totalRow/$rowsPerPage);

$listPages = '';
if($page > 1){
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$page.'">Trang đầu</a> ';
	$pagePrev = $page - 1;
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$pagePrev.'"><<</a> ';  	
}

for($j=1; $j<=$pageNum; $j++){
	if($j == $page){
		$listPages .= '<span>'.$j.'</span> ';
	}
	else{
		$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$j.'">'.$j.'</a> ';	
	}	
}

if($page < $pageNum){
	$pageNext = $page + 1;
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$pageNext.'">>></a> ';  	
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$page.'">Trang cuối</a> ';
}
?>
<div class="prd-block">
    <h2>kết quả tìm được với từ khóa <span class="skeyword">"<?php echo $stext;?>"</span></h2>
    <h2>quản lý vaccine</h2>
<div id="main">
    <div id="search-bar">
            <?php include_once('timkiem.php');?>
    </div>
    <p id="add-prd"><a href="quantri.php?page_layout=themsp"><span>thêm Vaccine mới</span></a></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="20%">Tên Vaccine</td>
            <td width="15%">Giá Vaccine</td>
            <td width="20%">Loại vaccine</td>
            <td width="10%">Ảnh mô tả</td>
            <td width="10%">Số lượng nhập</td>
            <td width="10%">Số lượng còn</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_VC'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suasp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></td>
            <td class="l5"><span class="price"><?php echo $row['Gia_VC'];?>  VNĐ</span></td>
            <td class="l5"><?php echo $row['Ten_DM'];?></td>
            <td><span class="thumb"><img width="60" src="anh/<?php echo $row['Anh_VC'];?>" /></span></td>
             <td class="l5"><?php echo $row['Tong_SL'];?></td>
            <td class="l5"><?php echo $row['Hang_Conlai'];?></td>
            <td><a href="quantri.php?page_layout=suasp&Ma_VC=<?php echo $row['Ma_VC'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoaSanpham();" href="xoasp.php?Ma_VC=<?php echo $row['Ma_VC'];?>"><span>Xóa</span></a></td>
        </tr>
<?php }?>        
    </table>
</div>
<div id="pagination"><?php echo $listPages;?></div>