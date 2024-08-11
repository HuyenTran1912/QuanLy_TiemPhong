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

$sql = "SELECT * FROM qly_vaccine WHERE Ten_VC LIKE ('$stextNew') ORDER BY Ma_VC DESC LIMIT $perRow, $rowsPerPage";
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
    <div class="pr-list">
    	<?php
		$i = 1;
        while($row = mysql_fetch_array($query)){
		?>
        <div class="prd-item">
            <a href="#"><img width="80" height="144" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></a>
            <h3><a href="#"><?php echo $row['Ten_VC'];?></a></h3>
            <p>Ghi chú: <?php echo $row['Ghichu'];?></p>
            <p>Ngày Sản Xuất: <?php echo $row['NgaySX'];?></p>
            <p>Hạn Sử Dùng: <?php echo $row['HanSuDung'];?></p>
            <p>Còn Hàng: <?php if($row['tinhtrang']==0){echo 'Còn hàng';} else {echo 'Hết hàng';}?></p>
            <p>Số Mũi Tiêm: <?php echo $row['SoMui_Tiem'];?></p>
            <p>Phòng Bệnh: <?php echo $row['PhongBenh'];?></p>
            <p class="price"><span>Giá: <?php echo $row['Gia_VC'];?> VNĐ</span></p>
        </div>
        <?php
			if($i%3==0){
				echo '<div class="clear"></div>';
			}
		}
		?>
        
    </div>
</div>

<div id="pagination"><?php echo $listPages;?></div>