<?php
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){
	$Ma_Tk = $_GET['Ma_Tk'];
	include_once('ketnoi.php');
	$sql = "DELETE FROM qly_tk WHERE Ma_Tk = '$Ma_Tk'";
	$query = mysql_query($sql);
	header('location:quantri.php?page_layout=nhanvien');
}
else{
	header('location:index.php');
}
?>