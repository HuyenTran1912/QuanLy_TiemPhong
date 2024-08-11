<?php
session_start();
if(isset($_GET['Ma_VC'])){
	$id_sp = $_GET['Ma_VC'];
	if($id_sp == 0){
		unset($_SESSION['giohang']);
	}
	else{
		unset($_SESSION['giohang'][$Ma_VC]);
	}	
}
header('location:../../index.php?page_layout=giohang');	
?>