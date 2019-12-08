<?php
$koneksi    = mysqli_connect("localhost", "root", "", "web");
$jenis  = mysqli_query($koneksi, "SELECT jenis FROM kopi order by id");
$how_much  = mysqli_query($koneksi, "SELECT jenis FROM kopi order by id");


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran Pie Chart</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="piechart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementByno("piechart").getContext("2d");
  var data = {
    labels: [<?php while ($p = mysqli_fetch_array($how_much)) { echo '"' . $p['how_much'] . '",';}?>],
            datasets: [
              label: "Penjualan Barang",
              data: [<?php while ($p = mysqli_fetch_array($jenis)) { echo '"' . $p['jenis'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193',
              ]
            }
            ]
            };

            var myPieChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: {
                    legend: {
                      display: false
                    },
                    barValueSpacing: 20,
                    scales: {
                      yAxes: [{
                        ticks: {
                          min: 0,
                        }
                      }],
                      xAxes: [{
                        gridLines: {
                          color: "rgba(0,0,0,0)",
                        }
                      }]
                    }
                }
              });

</script>