<?php
session_start();
if($_SESSION['tk'] == 'phamhuyentran' && $_SESSION['mk'] == '123456789'){
	session_unset($_SESSION['tk']);
	session_unset($_SESSION['mk']);
}
header('location:index.php');
?>