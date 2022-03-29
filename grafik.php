<?php
$koneksi     = mysqli_connect("localhost", "root", "", "toko_db");
$bulan       = mysqli_query($koneksi, "SELECT bulan FROM nota WHERE tahun='2022' order by id asc");
$penghasilan = mysqli_query($koneksi, "SELECT bulan, SUM(total) AS total FROM `nota` GROUP BY bulan WITH ROLLUP;");
?>
<!DOCTYPE html>
<html>
<head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body>
    <br>
    <h4>Chart.js</h4>
    <canvas id="myChart"></canvas>
    <?php
    // Koneksikan ke database
    $kon = mysqli_connect("localhost","root","","toko_db");
    //Inisialisasi nilai variabel awal
    $bulan= "";
    $jumlah=null;
    //Query SQL
    $sql="select ,COUNT(*) as 'total' from nota GROUP by bulan;";
    $hasil=mysqli_query($kon,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        //Mengambil nilai jurusan dari database
        $bln=$data['bulan'];
        $bulan .= "'$bln'". ", ";
        //Mengambil nilai total dari database
        $jum=$data['total'];
        $jumlah .= "$jum". ", ";

    }
    ?>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
        data: {
            labels: [<?php echo $bulan; ?>],
            datasets: [{
                label:'data ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</body>