<?php
if(isset($_SESSION['giohang'])){
	$arrId = array();
	foreach($_SESSION['giohang'] as $Ma_VC=>$sl){
		$arrId[] = $Ma_VC;
	}
	$strId = implode(', ', $arrId);
	$sql = "SELECT * FROM qly_vaccine WHERE Ma_VC IN($strId) ORDER BY Ma_VC DESC";
	$query = mysql_query($sql);	
}
?>
<div class="prd-block"> 
    <h2>xác nhận hóa đơn thanh toán</h2>
	<div class="payment">
		<table border="0px" cellpadding="0px" cellspacing="0px" width="100%">
			<tr id="invoice-bar">
				<td width="45%">Tên Vaccine</td>
				<td width="20%">Giá Vaccine</td>
				<td width="15%">Số lượng</td>
				<td width="20%">Thành tiền</td>
			</tr>
            
			<?php
			$totalPriceAll = 0;
            while($row = mysql_fetch_array($query)){
				$totalPrice = $row['Gia_VC']*$_SESSION['giohang'][$row['Gia_VC']];
			?>
			<tr>
				<td class="prd-name"><?php echo $row['Ten_VC'];?></td>
				<td class="prd-price"><?php echo $row['Gia_VC'];?> VNĐ</td>
				<td class="prd-number"><?php echo $_SESSION['giohang'][$row['Ma_VC']];?></td>
				<td class="prd-total"><?php echo $totalPrice;?> VNĐ</td>
			</tr>
            <?php
				$totalPriceAll += $totalPrice;
			}
			?>
            
			<tr>
				<td class="prd-name">Tổng giá trị hóa đơn là:</td>
				<td colspan="2"></td>
				<td class="prd-total"><span><?php echo $totalPriceAll;?> VNĐ</span></td>
			</tr>
		</table>
	
	</div>
	
    <?php
    if(isset($_POST['submit'])){
		if($_POST['ten'] == ''){
			$error_ten = '<span>(*)</span>';
		}
		else{
			$ten = 	$_POST['ten'];
		}
		
		if($_POST['mail'] == ''){
			$error_mail = '<span>(*)</span>';
		}
		else{
			$mail = 	$_POST['mail'];
		}
		
		if($_POST['dt'] == ''){
			$error_dt = '<span>(*)</span>';
		}
		else{
			$dt = 	$_POST['dt'];
		}
		
		if($_POST['dc'] == ''){
			$error_dc = '<span>(*)</span>';
		}
		else{
			$dc = 	$_POST['dc'];
		}
		
		// Xử lý mua hàng và gửi mail xác nhận
		if(isset($ten) && isset($mail) && isset($dt) && isset($dc)){
			
			if(isset($_SESSION['giohang'])){
				$arrId = array();
				foreach($_SESSION['giohang'] as $Ma_VC=>$sl){
					$arrId[] = $Ma_VC;
				}
				$strId = implode(', ', $arrId);
				$sql = "SELECT * FROM qly_vaccine WHERE Ma_VC IN($strId) ORDER BY Ma_VC DESC";
				$query = mysql_query($sql);	
			}
						
			$strBody = '';
			// Thông tin Khách hàng
			$strBody = '<p>
							<b>Khách hàng:</b> '.$ten.'<br />
							<b>Email:</b> '.$mail.'<br />
							<b>Điện thoại:</b> '.$dt.'<br />
							<b>Địa chỉ:</b> '.$dc.'
						</p>';
			// Danh sách Sản phẩm đã mua
			$strBody .= '	<table border="1px" cellpadding="10px" cellspacing="1px" width="100%">
								<tr>
									<td align="center" bgcolor="#3F3F3F" colspan="4"><font color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
								</tr>
								<tr id="invoice-bar">
									<td width="45%"><b>Tên Vaccine</b></td>
									<td width="20%"><b>Giá</b></td>
									<td width="15%"><b>Số lượng</b></td>
									<td width="20%"><b>Thành tiền</b></td>
								</tr>';
			
			$totalPriceAll = 0;
			while($row = mysql_fetch_array($query)){
				$totalPrice = $row['Gia_VC']*$_SESSION['giohang'][$row['Ma_VC']];
					
					$strBody .= '<tr>
									<td class="prd-name">'.$row['Ten_VC'].'</td>
									<td class="prd-price"><font color="#C40000">'.$row['Gia_VC'].' VNĐ</font></td>
									<td class="prd-number">'.$_SESSION['giohang'][$row['Ma_VC ']].'</td>
									<td class="prd-total"><font color="#C40000">'.$totalPrice.' VNĐ</font></td>
								</tr>';
			
			$totalPriceAll += $totalPrice;
			}
			
					$strBody .= '<tr>
									<td class="prd-name">Tổng giá trị hóa đơn là:</td>
									<td colspan="2"></td>
									<td class="prd-total"><b><font color="#C40000">'.$totalPriceAll.' VNĐ</font></b></td>
								</tr>
							</table>';
					
					$strBody .= '<p align="justify">
									<b>Quý khách đã đặt hàng thành công!</b><br />
									• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
									• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
									<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
								</p>';
			
			// Thiết lập SMTP Server
			require("class.phpmailer.php"); // nạp thư viện
			$mailer = new PHPMailer(); // khởi tạo đối tượng
			$mailer->IsSMTP(); // gọi class smtp để đăng nhập
			$mailer->CharSet="utf-8"; // bảng mã unicode
			
			//Đăng nhập Gmail
			$mailer->SMTPAuth = true; // Đăng nhập
			$mailer->SMTPSecure = "ssl"; // Giao thức SSL
			$mailer->Host = "smtp.gmail.com"; // SMTP của GMAIL
			$mailer->Port = 465; // cổng SMTP
			
			// Phải chỉnh sửa lại
			$mailer->Username = "www.dinhtienduc93@gmail.com"; // GMAIL username
			$mailer->Password = "ductrung"; // GMAIL password
			$mailer->AddAddress($mail, $ten); //email người nhận
			$mailer->AddCC("sirtuanhoang@gmail.com", "Admin Vietpro Shop"); // gửi thêm một email cho Admin
			 
			// Chuẩn bị gửi thư nào
			$mailer->FromName = 'Trung tâm tư vấn tiêm phòng tiêm chủng'; // tên người gửi
			$mailer->From = 'www.dinhtienduc93@gmail.com'; // mail người gửi
			$mailer->Subject = 'Hóa đơn xác nhận mua hàng từ Trung tâm tư vấn tiêm phòng tiêm chủng';
			$mailer->IsHTML(TRUE); //Bật HTML không thích thì false
			 
			// Nội dung lá thư
			$mailer->Body = $strBody;
			 
			// Gửi email 
			if(!$mailer->Send()){
				// Gửi không được, đưa ra thông báo lỗi
			 	echo "Lỗi gửi Email: " . $mailer->ErrorInfo;
			}
			else{	 
				// Gửi thành công
				header('location:index.php?page_layout=hoanthanh'); 
			}
		}	
	}
	?>
        
	<div class="form-payment">
		<form method="post">
		<ul>
			<li class="info-cus"><label>Tên khách hàng</label><br /><input type="text" name="ten" /> <?php if(isset($error_ten)){echo $error_ten;}?></li>
			<li class="info-cus"><label>Địa chỉ Email</label><br /><input type="text" name="mail" /> <?php if(isset($error_mail)){echo $error_mail;}?></li>
			<li class="info-cus"><label>Số Điện thoại</label><br /><input type="text" name="dt" /> <?php if(isset($error_dt)){echo $error_dt;}?></li>
			<li class="info-cus"><label>Địa chỉ nhận hàng</label><br /><input type="text" name="dc" /> <?php if(isset($error_dc)){echo $error_dc;}?></li>
			<li><input type="submit" name="submit" value="Xác nhận mua hàng" /> <input type="reset" name="reset" value="Làm lại" /></li>
		</ul>
		</form>
	</div>
</div>    