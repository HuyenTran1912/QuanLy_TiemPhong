 
<html>
<head>
<title>Tra Cứu Vaccine Bằng Ngày Sinh</title>
</head>
<body>
<div class="prd-block"> 
    <h2>Hãy Nhập Thông Tin Ngày Sinh Của Bạn</h2>
    <div class="about">
        <p><span>Để biết chi tiết ngày sinh các bạn hãy chọn ngày sinh của con mình</span></p>
        <p><span>Trang web sẽ hiện thông tin ngày sinh và số tuổi của con bạn</span></p>
        <p><span>Từ đó trang web sẽ đưa ra lời khuyên tiêm những loại vaccine nào cho lứa tuổi con bạn</span></p>
    </div>
</div>    
<br/>
<form name="frm" method="post" action ="">
<?php
for($i =1; $i<=31 ;$i++)
{
    $arDays[]=$i;
}
echo'<select name="day">';
foreach ($arDays as $option) {
    echo '<option value="'.$option.'">'.$option.'</option>';
}
echo '</select>';
?>
<select name="month">
<option value="01">Jan</option>
<option value="02">Fer</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<?php
$currentYear= date("Y");
for($i = $currentYear; $i >=1920; $i--)
{
    $arYears[]= $i;
}
echo '<select name ="year">';
foreach ($arYears as $option) {
    echo '<option value="'.$option.'">'.$option.'</option>';
    }
    echo '</select>';
?>
<input type="submit" name="submit" value="Calculate" />
</form>
<?php if (isset($_POST['submit'])) 
{
    $day=$_POST['day'];
    $month= $_POST['month'];
    $year = $_POST['year'];
    $birthDate = $year.'-'.$month.'-'.$day;
    $dob = new DateTime($birthDate);
    $interval = $dob-> diff(new DateTime);
    $nam = $interval -> y;
    $thang = $interval -> m;
    $ngay = $interval -> d;
    echo "</br>";
    echo "Date of Birth (yyyy-mm-dd) :".$birthDate;
    echo "</br>";
    echo "Số Tuổi Của Bạn Là: ".$nam."  Năm  ".$thang."  Tháng  ".$ngay."  Ngày  ";
    echo "</br>";   //danhsachvc
//dm1
    if ($nam ==0 && $thang == 0 && $ngay <2) {   
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=1";
        $query = mysql_query($sql);
    }
    elseif ($nam == 0 && $thang ==1) {
        echo "Bạn hãy tham khảo loại vaccine khác";
    }
    //dm2
    elseif (($nam ==0 && $thang ==0 && $ngay >2) || ($nam == 0 && $thang <2 && $ngay ==0)) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=2";
        $query = mysql_query($sql);
    }
    //dm3
    elseif ($nam ==0 && $thang >1 && $thang <7 && $ngay !=0) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=3";
        $query = mysql_query($sql);
    }
    //dm4
    elseif ($nam ==0 && $thang >5 && $thang <12) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=4";
        $query = mysql_query($sql);
    }
    //dm5
    elseif (($nam ==1 && $thang == 0) || ($nam ==1 && $thang <4)) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=5";
        $query = mysql_query($sql);
    }
    //dm6
    elseif ($nam ==1 && $thang >3 && $thang <12 ) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=6";
        $query = mysql_query($sql);
    }
    //dm7
     elseif (($nam >1 && $nam <10 )){
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=7";
        $query = mysql_query($sql);
    }
    //dm8
    elseif ($nam >8 ){
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=8";
        $query = mysql_query($sql);
    }

    ?>
    </br>
    </br>
    <div class="prd-block">
    <h2><?php echo "vaccine cần tiêm cho ngày sinh ".$nam." năm ".$thang." tháng ".$ngay." ngày là :";?></h2>
    <div class="pr-list">
        <?php
        
        $i=1;
        while($row = mysql_fetch_array($query)){
        ?>
        <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></h3>
            <p>Phòng bệnh: <?php echo $row['PhongBenh'];?></p>
            <p>Ngày Sản Xuất: <?php echo $row['NgaySX'];?></p>
            <p>Hạn Sử Dụng: <?php echo $row['HanSuDung'];?></p>
            <p class="price"><span>Giá: <?php echo $row['Gia_VC'];?> VNĐ</span></p>
            
        </div>
        <?php
            if($i%3==0){
                echo '<div class="clear"></div>';   
            }
            $i++;
        }
        ?>
        </div>
    </div>    
    <?php
}
?>
<br/>
<br/>
</body>
</html>
<html>
<?php
 if(!isset($_SESSION)) 
    { 
session_start();
}
if (isset($_SESSION['dataUser']) && !isset($_POST['submit'])) {
    $dataUser = $_SESSION['dataUser'];
    $Ten_DN = $dataUser->Ten_DN;
    $NgaySinh= $dataUser->NgaySinh;
    $dob = new DateTime($NgaySinh);
    $interval = $dob-> diff(new DateTime);
    $nam = $interval -> y;
    $thang = $interval -> m;
    $ngay = $interval -> d;
    echo "</br>";
    echo "Date of Birth (yyyy-mm-dd) :".$NgaySinh;
    echo "</br>";
    echo "Số Tuổi Của ".$Ten_DN." là: ".$nam."  Năm  ".$thang."  Tháng  ".$ngay."  Ngày  ";
    echo "</br>";
    if ($nam ==0 && $thang == 0 && $ngay <2) {   
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=1";
        $query = mysql_query($sql);
    }
    elseif ($nam == 0 && $thang ==1) {
        echo "Bạn hãy tham khảo loại vaccine khác";
    }
    //dm2
    elseif (($nam ==0 && $thang ==0 && $ngay >2) || ($nam == 0 && $thang <2 && $ngay ==0)) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=2";
        $query = mysql_query($sql);
    }
    //dm3
    elseif ($nam ==0 && $thang >1 && $thang <7 && $ngay !=0) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=3";
        $query = mysql_query($sql);
    }
    //dm4
    elseif ($nam ==0 && $thang >5 && $thang <12) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=4";
        $query = mysql_query($sql);
    }
    //dm5
    elseif (($nam ==1 && $thang == 0) || ($nam ==1 && $thang <4)) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=5";
        $query = mysql_query($sql);
    }
    //dm6
    elseif ($nam ==1 && $thang >3 && $thang <12 ) {
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=6";
        $query = mysql_query($sql);
    }
    //dm7
     elseif (($nam >1 && $nam <10 )){
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=7";
        $query = mysql_query($sql);
    }
    //dm8
    elseif ($nam >8 ){
        $sql = "SELECT *FROM qly_vaccine WHERE Ma_DM=8";
        $query = mysql_query($sql);
    }

      ?>
    </br>
    </br>
    <div class="prd-block">
    <h2>Các loại vaccine cần tiêm cho lứa tuổi bạn</h2>
    <div class="pr-list">
        <?php
        
        $i=1;
        while($row = mysql_fetch_array($query)){
        ?>
        <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><img width="80" height="144" src="quantri/anh/<?php echo $row['Anh_VC'];?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></h3>
            <p>Phòng bệnh: <?php echo $row['PhongBenh'];?></p>
            <p>Ngày Sản Xuất: <?php echo $row['NgaySX'];?></p>
            <p>Hạn Sử Dụng: <?php echo $row['HanSuDung'];?></p>
            <p class="price"><span>Giá: <?php echo $row['Gia_VC'];?> VNĐ</span></p>
            
        </div>
        <?php
            if($i%3==0){
                echo '<div class="clear"></div>';   
            }
            $i++;
        }
        ?>
        </div>
    </div>    
    <?php
}
?>
</html>