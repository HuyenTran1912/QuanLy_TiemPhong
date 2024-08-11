<?php
$sql = "SELECT * FROM qly_dmvaccine";
$query = mysql_query($sql);
?>
<div class="l-sidebar">
    <h2>Vaccine từng Thời điểm</h2>
    <ul id="main-menu">
    <?php
    while($row = mysql_fetch_array($query))
    {
	?>
        <li><a href="index.php?page_layout=danhsachsp&Ma_DM=<?php echo $row['Ma_DM'];?>"><?php echo $row['Ten_DM'];?></a></li>
	<?php
	}
	?>
    </ul>
</div>