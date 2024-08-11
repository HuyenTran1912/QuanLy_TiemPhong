<?php
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){
	$Ma_VC = $_GET['Ma_VC'];
	include_once('ketnoi.php');
	$sql = "DELETE FROM qly_vaccine WHERE Ma_VC = '$Ma_VC'";
	$query = mysql_query($sql);
	header('location:quantri.php?page_layout=danhsachsp');
}
else{
	header('location:index.php');
}
?>