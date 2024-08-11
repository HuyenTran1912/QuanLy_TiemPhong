<script language="javascript">
function xoaSanpham(){
	var conf = confirm('Bạn chắc chắn muốn xóa Vaccine này không?');
	return conf;	
}
</script>
<?php
// Nhận biến Page(Số thứ tự của Trang)
if(isset($_GET['page'])){
	$page = $_GET['page'];	
}
else{
	$page = 1;	
}

// Hiển thị số Sản phẩm trên một trang
$rowsPerPage = 10;

// Tính vị trí mẩu tin đầu tiên của mỗi trang
$firstRow = $page*$rowsPerPage - $rowsPerPage;

// Liệt kê Danh sách dữ liệu trên mỗi trang
$sql = "SELECT * FROM qly_vaccine
				 INNER JOIN qly_dmvaccine
				 ON qly_vaccine.Ma_DM = qly_dmvaccine.Ma_DM 
				 ORDER BY Ma_VC DESC
				 LIMIT $firstRow, $rowsPerPage";
$query = mysql_query($sql);

// Tổng số Sản phẩm trong CSDL
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM qly_vaccine"));

// Tính tổng số trang
$totalPage = ceil($totalRow/$rowsPerPage);

// Tạo Thanh phân trang
$listPage = '';
for($i=1; $i <= $totalPage; $i++){
		
		if($i == $page){
			$listPage .= '<span>'.$i.'</span> ';	
		}
		else{
			$listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&page='.$i.'">'.$i.'</a> ';	
		}	
}
?>

<?php 
$get = "SELECT * FROM qly_vaccine";
$query_get = mysql_query($get);
while($result = mysql_fetch_array($query_get))
{
    $array[] = $result;
    foreach($array as $result)
    {
        $a = $result['Ma_VC'];
        $b = $result['Ma_DM'];
        $c = $result['Ten_VC'];
        $d = $result['Gia_VC'];
        $e = $result['Ghichu'];
        $f = $result['NgaySX'];
        $g = $result['HanSuDung'];
        $h = $result['DiaChiSX'];
        $j = $result['SoMui_Tiem'];
        $k = $result['tinhtrang'];
        $l = $result['PhongBenh'];
        $m = $result['ChiTiet_VC'];
        $n = $result['Tong_SL'];
        $z = $result['Hang_Conlai'];
    }
    $data[] = array('a' => $a, 'b' =>  $b, 'c' =>  $c, 'd' => $d, 'e' => $e, 'f' =>  $f, 'g' =>  $g, 'h' => $h, 
    'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m, 'n' => $n, 'z' => $z); 
    //header('Content-Type: application/json');
}
$data_json = json_encode($data);
?>
<h2>quản lý vaccine</h2>
<div id="main">
    <div id="search-bar">
            <?php include_once('timkiem.php');?>
    </div>
    <p id="add-prd"><a href="quantri.php?page_layout=themsp"><span>thêm Vaccine mới</span></a></p>
    <p id="add-prd"><button id="in_ds"><span>In danh sách</span></button></p>
    <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar">
            <td width="5%">ID</td>
            <td width="20%">Tên Vaccine</td>
            <td width="15%">Giá Vaccine</td>
            <td width="20%">Loai vaccine</td>
            <td width="10%">Ảnh mô tả</td>
            <td width="10%">Số lượng nhập</td>
            <td width="10%">Số lượng còn</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
<?php while($row = mysql_fetch_array($query)){?>        
        <tr>
            <td><span><?php echo $row['Ma_VC'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suasp&Ma_VC=<?php echo $row['Ma_VC'];?>"><?php echo $row['Ten_VC'];?></a></td>
            <td class="l5"><span class="price"><?php echo $row['Gia_VC'];?>  VNĐ</span></td>
            <td class="l5"><?php echo $row['Ten_DM'];?></td>
            <td><span class="thumb"><img width="60" src="anh/<?php echo $row['Anh_VC'];?>" /></span></td>
             <td class="l5"><?php echo $row['Tong_SL'];?></td>
            <td class="l5"><?php echo $row['Hang_Conlai'];?></td>
            <td><a href="quantri.php?page_layout=suasp&Ma_VC=<?php echo $row['Ma_VC'];?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoaSanpham();" href="xoasp.php?Ma_VC=<?php echo $row['Ma_VC'];?>"><span>Xóa</span></a></td>
        </tr>
<?php }?>        
    </table>
    <p id="pagination"><?php echo $listPage;?></p>
</div>

<script>
    const objectToCsv = function(data_map)
	{
		const csvRows = [];
		//headers
		const headers = Object.keys(data_map[0]);
		csvRows.push(headers.join(','));

		// console.log(headers);

		//lặp data_map
		for (const row of data_map)
		{
			const value = headers.map(header => 
			{
				const escaped = (''+row[header]).replace(/"/g, '\\"');
				return `"${escaped}"`;
			});
			csvRows.push(value.join(','));
		}
		// console.log(csvRows);
		//bỏ dấu "" dư đi
		return csvRows.join('\n');
	}

	const download = function(data)
	{
		const date = new Date();

		let day = date.getDate();
		let month = date.getMonth() + 1;
		let year = date.getFullYear();

		var ten = 'Danh Sách Vắc Xin';
		var xls=".xls";
		var xlsfile=ten+xls;
		const BOM = '\uFEFF';

		const blob = new Blob([BOM + data], { type: 'text/csv;charset=utf-8' });
		const url = window.URL.createObjectURL(blob);
		const a = document.createElement('a');
		a.href = url;
		a.setAttribute('download', xlsfile);
		a.click();
	};
</script>

<script>
    document.getElementById('in_ds').addEventListener("click", function(e){
        var data = <?php echo $data_json?>  
        //console.log(data);
      const data_map = data.map(row => ({
					'Mã Vắc-Xin': row.a,
					'Mã Danh Mục': row.b,
					'Tên Vắc-Xin': row.c,
					'Giá Vắc-Xin': row.d,
					'Ghi Chú': row.e,
					'Ngày Sản Xuất': row.f,
					'Hạn Sử Dụng': row.g,
                    'Địa Chỉ Sản Xuất': row.h,
                    'Số Mũi Tiêm': row.j,
                    'Tình Trạng': row.k,
                    'Phòng Bệnh': row.l,
                    'Chi Tiết Vắc Xin': row.m,
                    'Tổng Số Lượng': row.n,
                    'Hàng Còn Lại': row.z,
				}));
				 //console.log(data_map);
				const csvData = objectToCsv(data_map);
				// console.log(csvData);
				download(csvData);
    })
</script>

<style>
    #main p#add-prd button{
	text-decoration:none;
	color:red;
	background-color:#665412;
	padding: 10px;
    position: relative;
    top: -48px;
    right: 230px;
	}
</style>