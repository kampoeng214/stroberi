<?php
  include "../config/config.php";
  session_start();
  if(empty($_SESSION)){
  header("Location: ../index.php");
  }
?>

<!doctype html>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/admin.css">
    <link rel="stylesheet" type="text/css" href="../fonta/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand">WEB BUAH STROBERI</a>
      <form class="form-inline my-2 my-lg-0 ml-auto"></form>
      <div class="icon ml-6">
        <a href="logout.php" class="btn btn-dark square-btn-adjust">Logout <a>
        </h5>
        </div>
      </div>
    </nav>
    <div class="row no-gutters mt-0">
      <div class="col-md-2 bg-secondary mt-0 pr-3 pt-3">
        <ul class="nav flex-column ml-3 mb-5">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php"> <i class="fas fa-th-list mr-2"></i>Buah Stroberi</a>
            <hr class="bg-primary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="laporan.php"> <i class="fas fa-th-list mr-2"></i>Laporan</a>
            <hr class="bg-primary">
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="admin.php"> <i class="fas fa-th-list mr-2"></i>Admin</a>
            <hr class="bg-primary">
          </li>
        </ul>
      </div>
    <div class="col-md-10 p-3 pt-2">
      <form align="center" method="POST" action="">
        <select name="bulan">
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="12">November</option>
          <option value="12">Desember</option>
        </select>
        <select name='tahun' >";
          <?php
            $query=mysqli_query($koneksi, "SELECT * FROM tabel_buah GROUP BY year(tanggal)");
            while($t=mysqli_fetch_array($query)){
              $data = explode('-',$t['tanggal']);
              $tahun = $data[0];
              echo "<option value='$tahun'>$tahun</option>";
            }
           ?>
        </select>
        <input id="proses" name="submit" type="submit" value="Proses">
      </form>
          
      <table class="table" align="center">
        <thead class="table" align="center">
          <tr>
            <th><center>No</center></th>
            <th><center>Nama Buah</center></th>
            <th><center>Kategori</center></th>
            <th><center>Tanggal</center></th>
          </tr>
        </thead>
        <tbody align="center">
          <tr>
            <?php
            if (isset($_POST['submit'])){
              $bulan = $_POST['bulan'];
              $tahun = $_POST['tahun'];
              $query = mysqli_query($koneksi, "SELECT * FROM tabel_buah WHERE month(tanggal)='$bulan' AND year(tanggal)='$tahun' ORDER BY day(tanggal)");
              $no = 1;
              if (mysqli_num_rows($query) == 0) {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
              } else {
                while ($data = mysqli_fetch_array($query)){

                  $sql_jm = mysqli_query($koneksi, "SELECT * FROM tabel_buah WHERE kategori = '1'");
                  $jumlah_matang = mysqli_num_rows($sql_jm);
                  $sql_jme = mysqli_query($koneksi, "SELECT * FROM tabel_buah WHERE kategori = '0'");
                  $jumlah_mentah = mysqli_num_rows($sql_jme);
                  $sql_tot = mysqli_query($koneksi, "SELECT * FROM tabel_buah");
                  $total = mysqli_num_rows($sql_tot);

                  if ($data['kategori'] == '1'){
                    $data['kategori_buah'] = "MATANG";
                    } else {
                      $data['kategori_buah'] = "MENTAH";
                  }
              ?>
              <td><?php echo $no;?></td>
              <td><b><?php echo $data['nama_buah'];?></b></td>
              <td><p><?php echo $data['kategori_buah'];?></p></td>
              <td><p><?php echo $data['tanggal'];?></p></td>
          </tr>
            <?php
            $no++;
                }
                ?>
                <tr>
                <pre>
                  <br>
                  <b>Jumlah Buah Matang           : <?php echo $jumlah_matang;?> Buah</b>
                  <b>Jumlah Buah Mentah           : <?php echo $jumlah_mentah;?> Buah</b>
                  <b>Total Buah Mentah dan Matang : <?php echo $total;?> Buah</b>
                </pre>
              </tr>
                <?php
              }
            }
            ?>
            
          </tbody>
      </table>

      <form align="center">
              <button>
                <a href="print_laporanpdf.php?bulan=<?php echo $bulan;?>&&tahun=<?php echo $tahun?>" target="_blank">PRINT LAPORAN PDF</a>
              </button>
            </form>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>

  <div id="container" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
  </table>
    <div class="row"></div>
  </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="admin.js"></script>
  <script>
    $(document).ready(function () {
    $('#dataTables-example').dataTable();
     });
  </script>
  <!-- CUSTOM SCRIPTS -->
  <script src="../assets/js/custom.js"></script>
    
  </body>
</html>