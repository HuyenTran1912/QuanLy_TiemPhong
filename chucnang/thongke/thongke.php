<?php
$fp = 'chucnang/thongke/counter.txt';
$fo = fopen($fp, 'r');
$count = fread($fo, filesize($fp));
$count++;
$fc = fclose($fo);
$fo = fopen($fp, 'w');
$fw = fwrite($fo, $count);
$fc = fclose($fo);
?>
<div class="l-sidebar">
    <h2>thống kê truy cập</h2>
    <div id="counter">
        <p>Hiện có <span><?php echo $count;?></span> người đang xem</p>
    </div>
</div>