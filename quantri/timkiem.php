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
<form method="post" name="sform" action="quantri.php?page_layout=danhsachtimkiem">
    <input type="submit" name="sbutton" value="" />
    <input onfocus="searchFocus();" onblur="searchBlur();" type="text" name="stext" value="Tìm kiếm vaccine" />
</form>
