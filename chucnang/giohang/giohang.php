<div class="prd-block">
    <h2>giỏ hàng của bạn</h2>
    <?php
    if(isset($_SESSION['giohang'])){
		
		if(isset($_POST['sl'])){
			foreach($_POST['sl'] as $Ma_VC=>$sl){
				if($sl == 0){
					unset($_SESSION['giohang'][$Ma_VC]);	
				}
				elseif($sl > 0){
					$_SESSION['giohang'][$Ma_VC] = $sl;	
				}	
			} 		
		}
		
		$arrId = array();
		foreach($_SESSION['giohang'] as $Ma_VC=>$so_luong){
			$arrId[] = $Ma_VC;		
		}
		$strId = implode(',', $arrId);
		$sql = "SELECT * FROM qly_vaccine WHERE Gia_VC IN($strId) ORDER BY Ma_VC DESC";
		$query = mysql_query($sql);
	?>
    <div class="cart">
    	<form id="giohang" method="post">
        <?php
		$totalPriceAll = 0;
        while($row = mysql_fetch_array($query)){
			$totalPrice = $row['Gia_VC']*$_SESSION['giohang'][$row['Ma_VC']];
		?>
        <table width="100%">
            <tr>
                <td class="cart-item-img" width="25%" rowspan="4"><img width="80" height="144" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></td>
                <td width="25%">Vaccine:</td>
                <td class="cart-item-title" width="50%"><?php echo $row['Ten_VC'];?></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><span><?php echo $row['Gia_VC'];?> VNĐ</span></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="text" name="sl[<?php echo $row['Ma_VC']?>]" value="<?php echo $_SESSION['giohang'][$row['Ma_VC']];?>" /> (Bỏ mặt hàng này) <a href="chucnang/giohang/xoahang.php?Ma_VC=<?php echo $row['Ma_VC'];?>">X</a></td>
            </tr>
            <tr>
                <td>Tổng tiền:</td>
                <td><span><?php echo $totalPrice;?> VNĐ</span></td>
            </tr>
        </table>
        <?php
			$totalPriceAll += $totalPrice;
		}
		?>
        </form> 
        <p>Tổng giá trị giỏ hàng là: <span><?php echo $totalPriceAll;?> VNĐ</span></p>
        <p class="update-cart"><a onclick="document.getElementById('giohang').submit();" href="#"><span>cập nhật giỏ hàng</span></a></p>
        <p><a href="index.php">Bổ sung vaccine</a> <span>•</span> <a href="chucnang/giohang/xoahang.php?Ma_VC=0">Xóa hết vaccine</a> <span>•</span> <a href="index.php?page_layout=muahang">Dừng mua và Thanh toán</a></p>
    </div>
    <?php
	}
    else{
		echo '<script>alert("Hiện không có Sản phẩm nào trong Giỏ hàng của bạn!");</script>';	
	}
	?>
</div>   