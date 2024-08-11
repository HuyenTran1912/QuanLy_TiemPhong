<?php
$Ma_DM = $_GET['Ma_DM'];

if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;	
}

$rowsPerPage = 6;
$perRow = $page*$rowsPerPage - $rowsPerPage;

$sql = "SELECT * FROM qly_vaccine WHERE Ma_DM = $Ma_DM ORDER BY Ma_VC DESC LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_vaccine WHERE Ma_DM = $Ma_DM"));
$pageNum = ceil($totalRow/$rowsPerPage);

$listPages = '';
// Tạo nút Trng cuối và Trang sau >>
if($page > 1){
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&Ma_DM='.$Ma_DM.'&page=1">Trang đầu</a> ';
	$pagePrev = $page - 1;
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&Ma_DM='.$Ma_DM.'&page='.$pagePrev.'"><<</a> ';
}
// Tạo Danh sách trang
for($j=1; $j<=$pageNum; $j++){
	
	if($j==$page){
		$listPages .= '<span>'.$j.'</span> ';	
	}
	else{
		$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&Ma_DM='.$Ma_DM.'&page='.$j.'">'.$j.'</a> ';	
	}	
}
// Tạo nút Trang đầu và Trang trước <<
if($page < $pageNum){
	$pageNext = $page + 1;
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&Ma_DM='.$Ma_DM.'&page='.$pageNext.'">>></a> ';
	$listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&Ma_DM='.$Ma_DM.'&page='.$pageNum.'">Trang cuối</a> ';
}

$sqlDm = "SELECT * FROM qly_dmvaccine WHERE Ma_DM = $Ma_DM";
$queryDm = mysql_query($sqlDm);
$rowDm = mysql_fetch_array($queryDm);
?>
<div class="prd-block">
    <h2><?php echo $rowDm['Ten_DM'];?></h2>
    <div class="pr-list">
        <?php
        $i=1;
        while($row = mysql_fetch_array($query)){
        ?>
        <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></h3>
           <p>Phòng Bệnh: <?php echo $row['PhongBenh'];?></p>
            <p>Ngày Sản Xuất: <?php echo $row['NgaySX'];?></p>
            <p>Hạn Sử Dụng: <?php echo $row['HanSuDung'];?></p>
            <p class="price"><span>Giá: <?php echo $row['Gia_VC'];?> VNĐ</span></p>
            
        </div>
        <?php
            if($i%3==0){
                echo '<div class="clear"></div>';	
            }
            $i++;
        }
        ?>
    </div>
</div>    
    
<div id="pagination"><?php echo $listPages;?></div>    