<?php
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){
	$Ma_DK = $_GET['Ma_DK'];
	include_once('../cauhinh/ketnoi.php');
	$sql1 = "DELETE FROM qly_dangki WHERE Ma_DK = '$Ma_DK'";
	$query = mysql_query($sql1);
	header('location:quantri.php?page_layout=nguoitp');
}
else{
	header('location:index.php');
}
?>