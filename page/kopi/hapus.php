<?php
include 'koneksi.php';
print_r('kesini');exit;
if (isset($_GET['hapus'])){
    $SQL=$connect->query("DELETE FROM kopi WHERE id=".$_GET['hapus']);
    if($SQL){
        echo "sukses";
    }else
    echo "gagal";
}
?>