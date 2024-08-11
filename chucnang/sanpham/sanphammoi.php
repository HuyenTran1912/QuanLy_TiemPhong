<?php
$sql = "SELECT * FROM qly_vaccine ORDER BY Ma_VC DESC LIMIT 3";
$query = mysql_query($sql);
?>
<div class="prd-block">
    <h2>Vaccine mới về</h2>
    <div class="pr-list">
    	<?php
		$j = 1;
        while($row = mysql_fetch_array($query)){
		?>
        <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></h3>
            <p>Tình Trạng:<?php if($row['tinhtrang'] == 0){ echo "còn hàng";} else {echo "Hết hàng";};?></p>  
             <p>Phòng Bệnh:<?php echo $row['PhongBenh'];?></p>          
            <p class="price"><span>Giá: <?php echo $row['Gia_VC'];?>VNĐ</span></p>

        </div>                
        <?php
			if($j%3==0){
				echo '<div class="clear"></div>';
			}
			$j++;
		}
		?>
    </div>
</div>