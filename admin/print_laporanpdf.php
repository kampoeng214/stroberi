<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url");  // Refresh the webpage every 20 seconds
$ttd_tgl=date('d-m-Y');

$tahun_h = $_GET['tahun'];
$tanggal_bulan = $_GET['bulan'];
if ($tanggal_bulan = '01') {
	$tanggal_bulan = 'JANUARI';
} elseif ($tanggal_bulan = '02') {
	$tanggal_bulan = 'FEBRUARI';
} elseif ($tanggal_bulan = '03') {
	$tanggal_bulan = 'MARET';
} elseif ($tanggal_bulan = '04') {
	$tanggal_bulan = 'APRIL';
} elseif ($tanggal_bulan = '05') {
	$tanggal_bulan = 'MEI';
} elseif ($tanggal_bulan = '06') {
	$tanggal_bulan = 'JUNI';
} elseif ($tanggal_bulan = '07') {
	$tanggal_bulan = 'JULI';
} elseif ($tanggal_bulan = '08') {
	$tanggal_bulan = 'AGUSTUS';
} elseif ($tanggal_bulan = '09') {
	$tanggal_bulan = 'SEPTEMBER';
} elseif ($tanggal_bulan = '10') {
	$tanggal_bulan = 'OKTOBER';
} elseif ($tanggal_bulan = '11') {
	$tanggal_bulan = 'NOVEMBER';
} elseif ($tanggal_bulan = '12') {
	$tanggal_bulan = 'DESEMBER';
}
?>

<html> 
<head>
<style>
table {
	background-color: #FFFFFF;
	-webkit-box-shadow: 0px 0px #FBFBFB;
	box-shadow: 0px 0px #FBFBFB;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:hover{background-color:#badffb}

th {
    background-color: #0CF;
    color: white;
}
.button {
    background-color: #6e300a;
    border: none;
    border-radius: 10px;
    color: white;
    padding: 4px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block; 
    margin: 50px 500px;
    cursor: pointer;
    float: right;
}

.button1 {font-size: 15px;
}
</style>
</head>
   <h3 align="center">LAPORAN DATA SORTIR BUAH STROBERI BULAN <?php echo $tanggal_bulan;?></h3>
   <h3 align="center">TAHUN <?php echo $tahun_h;?></h3>
	<table width="100%" border="1" align='center'>
		<tr align='center'>
			<th width="50px"><b>No</b></th>
			<th width="50px"><b>Nama Buah</b></th>
			<th width="200px"><b>Kategori</b></th>
			<th width="50px"><b>Tanggal</b></th>
		</tr>
		<?php
		include "../config/config.php";
		session_start();

		$sql_jm = mysqli_query($koneksi, "SELECT * FROM tabel_buah WHERE kategori = '1'");
                  $jumlah_matang = mysqli_num_rows($sql_jm);
                  $sql_jme = mysqli_query($koneksi, "SELECT * FROM tabel_buah WHERE kategori = '0'");
                  $jumlah_mentah = mysqli_num_rows($sql_jme);
                  $sql_tot = mysqli_query($koneksi, "SELECT * FROM tabel_buah");
                  $total = mysqli_num_rows($sql_tot);

		if(isset($_GET['bulan']) && empty($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$result = "SELECT * FROM tabel_buah WHERE month(tanggal)='$bulan'";
		} else if (isset($_GET['bulan']) && isset($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$result = "SELECT * FROM tabel_buah WHERE month(tanggal)='$bulan' AND year(tanggal)='$tahun' ORDER BY day(tanggal)";
		}
		$result1=mysqli_query($koneksi, $result); 
		$no = 1;
		while($data=mysqli_fetch_array($result1)){
		if ($data['kategori'] == '1'){
                    $data['kategori_buah'] = "MATANG";
                    } else {
                      $data['kategori_buah'] = "MENTAH";
                  } 
		echo ("<tr [align='center'>
				<td>".$no."</td>
				<td>".$data['nama_buah']."</td>
				<td>".$data['kategori_buah']."</td>
				<td>".$data['tanggal']."</td>
			</tr>");
		$no++;	
		}
		?>
	</table>

	<pre>
		<br>
        <b>Jumlah Buah Matang           : <?php echo $jumlah_matang;?> Buah</b>
        <b>Jumlah Buah Mentah           : <?php echo $jumlah_mentah;?> Buah</b>
        <b>Total Buah Mentah dan Matang : <?php echo $total;?> Buah</b>
    </pre>
	
</html>
<script>
window.print();
</script>
