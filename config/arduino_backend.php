<?php
	include_once '../config/config.php';
	
	$kategori	 	= $_GET['kategori'];

	mysqli_query($koneksi, "INSERT INTO tabel_buah VALUES ('', 'Buah Stroberi', $kategori, NOW() )");
	
?>