<?php
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){
	$Ma_DM = $_GET['Ma_DM'];
	include_once('ketnoi.php');
	$sql = "DELETE FROM qly_dmvaccine WHERE Ma_DM = '$Ma_DM'";
	$query = mysql_query($sql);
	header('location:quantri.php?page_layout=danhmucsp');
}
else{
	header('location:index.php');
}
?>