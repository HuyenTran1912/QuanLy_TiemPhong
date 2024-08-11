<?php
ob_start();
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){	
	include_once('ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng - Trang chủ quản trị</title>
<link rel="stylesheet" type="text/css" href="css/quantri.css" />
<?php
	if(isset($_GET['page_layout'])){
    switch($_GET['page_layout']){
        case 'danhsachtimkiem': echo '<link rel="stylesheet" type="text/css" href="css/danhsachtimkiem.css" />';
        break;
    
        //
        case 'bacsi': echo '<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />';
        break;
        
        case 'thembacsi': echo '<link rel="stylesheet" type="text/css" href="css/themsp.css" />';
        break;  
        
        case 'suabacsi': echo '<link rel="stylesheet" type="text/css" href="css/suasp.css" />';
        break;
//

		case 'danhsachsp': echo '<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />';
		break;
		
		case 'themsp': echo '<link rel="stylesheet" type="text/css" href="css/themsp.css" />';
		break;	
		
		case 'suasp': echo '<link rel="stylesheet" type="text/css" href="css/suasp.css" />';
		break;
//
        case 'danhmucsp': echo '<link rel="stylesheet" type="text/css" href="css/danhmucsp.css" />';
        break;
        
        case 'themdmsp': echo '<link rel="stylesheet" type="text/css" href="css/themdmsp.css" />';
        break;  
        
        case 'suadmsp': echo '<link rel="stylesheet" type="text/css" href="css/suadmsp.css" />';
        break;
//
         case 'nhanvien': echo '<link rel="stylesheet" type="text/css" href="css/nhanvien.css" />';
        break;
        
        case 'themnv': echo '<link rel="stylesheet" type="text/css" href="css/themnv.css" />';
        break;  

        case 'suanv': echo '<link rel="stylesheet" type="text/css" href="css/suanv.css" />';
        break;
//
         case 'nguoitp': echo '<link rel="stylesheet" type="text/css" href="css/nguoitp.css" />';
        break;
        
        case 'themnguoitp': echo '<link rel="stylesheet" type="text/css" href="css/themnguoitp.css" />';
        break;  
        
        case 'suanguoitp': echo '<link rel="stylesheet" type="text/css" href="css/suanguoitp.css" />';
        break;

        case 'nguoidatiem': echo '<link rel="stylesheet" type="text/css" href="css/nguoitp.css" />';
        break;
	}
}
?>
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="navbar">
        	<ul>
            	<li><a href="quantri.php?page_layout=bacsi">Quản lí bác sĩ</a></li>
                <li><a href="quantri.php?page_layout=nhanvien">thành viên</a></li>
                <li><a href="quantri.php?page_layout=nguoitp">Người Tiêm Phòng</a></li>
                <!-- <ul class="sub-menu">
                    <a href="quantri.php?page_layout=nguoidatiem">Quản lí sổ tiêm1</a>
                </ul> -->
                <li><a href="quantri.php?page_layout=danhmucsp">danh mục Vaccine</li>
                <li><a href="quantri.php?page_layout=danhsachsp">Vaccine</a></li>
                <li><a href="quantri.php?page_layout=nguoidatiem">Quản lí sổ tiêm</a></li>
                <!-- <li><a target="_blank" href="chucnang/index.php">xem website</a></li> -->
            </ul>
            <div id="user-info">
            	<p>Xin chào <span><?php echo $_SESSION['tk']?></span> đã đăng nhập vào hệ thống</p>
                <p><a href="dangxuat.php">Đăng xuất</a></p>
            </div>
        </div>
        <div id="banner">
        <h4 style="text-align: center; font-size: 250%; margin-top: 30px; color: #13C5DD;">Trung Tâm Tư Vấn Tiêm Chủng</h4>
        <style>
            div#logo {
            margin-top: -74px;
}

        </style>
        <div id="logo">
            <a href="#">
                <a>
                    <img src="anh/logo001.png" />
                    
                </a> 
                
        </div>
            
            
        </div>
    
    </div>
    <div id="body">
        
        <?php
    if(isset($_GET['page_layout'])){
    switch($_GET['page_layout']){
                case 'danhsachtimkiem': include_once('danhsachtimkiem.php');
                break;
                    
        //
                case 'bacsi': include_once('bacsi.php');
                break;
                
                case 'thembacsi': include_once('thembacsi.php');
                break;  
                
                case 'suabacsi': include_once('suabacsi.php');
                break;

                default: include_once('gioithieu.php');
//
				case 'danhsachsp': include_once('danhsachsp.php');
				break;
				
				case 'themsp': include_once('themsp.php');
				break;	
				
				case 'suasp': include_once('suasp.php');
				break;

                default: include_once('gioithieu.php');
 //               
                case 'danhmucsp': include_once('danhmucsp.php');
                break;
                
                case 'themdmsp': include_once('themdmsp.php');
                break;  
                
                case 'suadmsp': include_once('suadmsp.php');
                break;  	

				default: include_once('gioithieu.php');
//
                case 'nhanvien': include_once('nhanvien.php');
                break;
                
                case 'themnv': include_once('themnv.php');
                break;  
                
                case 'suanv': include_once('suanv.php');
                break;      

                default: include_once('gioithieu.php');
 //               
                case 'nguoitp': include_once('nguoitp.php');
                break;
                
                case 'themnguoitp': include_once('themnguoitp.php');
                break;  
                
                case 'suanguoitp': include_once('suanguoitp.php');
                break;      

                default: include_once('gioithieu.php');
 //
                case 'nguoidatiem': include_once('nguoidatiem.php');
                break;
                
                // case 'themnguoitp': include_once('themnguoitp.php');
                // break;  
                
                // case 'suanguoitp': include_once('suanguoitp.php');
                // break;      

                default: include_once('gioithieu.php');
			}
        }
		?>
        
    </div>
    <style>

#footer #footer-info {
    width: 1000px;
    height: auto;
    /* background: #000; */
    background-color: #354F8E;
    border-top: 20px solid #354F8E;
    padding: 20px 0px;
    text-align: center;
}

    </style>
    <div id="footer">
    	<div id="footer-info" style="" type="background: #354f8E">
        	<h4>Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng - Mrs.Tran</h4>
            <p><span>Địa chỉ:</span> 68/26 Bùi Thị Xuân Phường 2 Quận Tân Bình | <span>Phone</span> 0362668983</p>
            <p><span>Trụ sở 2:</span>1317/AT Thị trấn Ba Tri Thành phố Bến Tre | <span>Hotline</span> 0968 511 155</p>
            <!-- <p>Bản quyền thuộc Vietpro Education</p> -->
            <p>Bản quyền thuộc Trung Tâm Tư Vấn Tiêm Phòng Tiêm Chủng- Mrs.Tran</p>
        </div>
    </div>
</div>
</body>
</html>
<?php
}
else{
	header('location:index.php');	
}
?>