<?php
session_start();
session_destroy();
// if(isset($_SESSION['tk']) && isset($_SESSION['mk'])){
// 	session_destroy($_SESSION['tk']);
// 	session_destroy($_SESSION['mk']);
// }
header('location:dangnhap.php');
?>