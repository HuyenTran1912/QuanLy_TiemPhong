<script language="javascript">
function searchFocus(){
	if(document.sform.stext.value == 'Tìm kiếm vaccine'){
		document.sform.stext.value = '';	
	}	
}
function searchBlur(){
	if(document.sform.stext.value == ''){
		document.sform.stext.value = 'Tìm kiếm vaccine';	
	}	
}
</script>
<form method="post" name="sform" action="index.php?page_layout=danhsachtimkiem">
    <input type="submit" name="sbutton" value="" />
    <input onfocus="searchFocus();" onblur="searchBlur();" type="text" name="stext" value="Tìm kiếm vaccine" />
</form>
<div style="float:right; margin-right:-210px;color:blue;font-weight:bold">
<span>
<?php 
if(isset($_SESSION['tk'])){
	echo 'Xin Chào '.$_SESSION['tk'].'||<a href="chucnang/dangxuat.php">Đăng xuất</a>';
}
else
{
	echo'<a href="chucnang/dangnhap.php">Đăng nhập</a>';
}
?>
</span>
</div>