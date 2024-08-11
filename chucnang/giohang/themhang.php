<?php
session_start();
$Ma_VC = $_GET['Ma_VC'];
if(isset($_SESSION['giohang'][$Ma_VC])){
	$_SESSION['giohang'][$Ma_VC] = $_SESSION['giohang'][$Ma_VC] + 1;
}
else{
	$_SESSION['giohang'][$Ma_VC] = 1;	
}
header('location:../dangkytiemphong.php');
?>