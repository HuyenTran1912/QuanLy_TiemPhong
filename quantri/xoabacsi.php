<?php
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){
	$Ma_BS = $_GET['Ma_BS'];
	include_once('ketnoi.php');
	$sql = "DELETE FROM qly_bacsi WHERE Ma_BS = '$Ma_BS'";
	$query = mysql_query($sql);
	header('location:quantri.php?page_layout=bacsi');
}
else{
	header('location:index.php');
}
?>