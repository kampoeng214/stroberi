<?php
if(isset($_POST['simpan'])){
    $rfid = $_POST ['rfid'];
    $jenis = $_POST ['jenis'];

    $sql = $koneksi->query("insert into ngopi (rfid, jenis) values('$rfid', '$jenis')");
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert ("Data Berhasil Di Simpan");
            window.location.href="?page=kopi"; 
        </script>
        <?php
    }
}
?>
