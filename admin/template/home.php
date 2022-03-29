 <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9">
					<div class="row" style="margin-left:1pc;margin-right:1pc;">
				  <h1>DASHBOARD</h1>
				  <hr>
				  
				  <?php 
						$sql=" select * from barang where stok <= 3";
						$row = $config -> prepare($sql);
						$row -> execute();
						$r = $row -> rowCount();
						if($r > 0){
					?>	
					<?php
							echo "
							<div class='alert alert-warning'>
								<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
								<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
							</div>
							";	
						}
					?>
				  <?php $hasil_barang = $lihat -> barang_row();?>
				  <?php $hasil_kategori = $lihat -> kategori_row();?>
				  <?php $stok = $lihat -> barang_stok_row();?>
				  <?php $jual = $lihat -> jual_row();?>
                    <div class="row">
                      <!--Banyak Nama Barang-->
					  <div class="col-md-3">
                      		<div class="panel panel-primary">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Nama Barang</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($hasil_barang);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=barang'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
                      <!-- Stok Barang -->
                      	<div class="col-md-3">
                      		<div class="panel panel-success">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Stok Barang</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($stok['jml']);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=barang'>Tabel Barang  <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
                      <!-- Barang Terjual -->
                      	<div class="col-md-3">
                      		<div class="panel panel-info">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Telah Terjual</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($jual['stok']);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;font-weight:700;"><a href='index.php?page=laporan'>Tabel laporan  <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
						  
                      	<div class="col-md-3">
                      		<div class="panel panel-danger">
                      			<div class="panel-heading">
						  			<h5><i class="fa fa-desktop"></i> Kategori Barang</h5>
                      			</div>
                      			<div class="panel-body">
									<center><h1><?php echo number_format($hasil_kategori);?></h1></center>
								</div>
								<div class="panel-footer">
									<h4 style="font-size:15px;font-weight:700;"><a href='index.php?page=kategori'>Tabel Kategori  <i class='fa fa-angle-double-right'></i></a></h4>
								</div>
	                      	</div><!--/grey-panel -->
                      	</div><!-- /col-md-3-->
					</div>
					           	<!-- chart -->
<div class="col-lg-6 ds">
	<h4>Data Transaksi Barang</h4>
	           <canvas id="myChart"></canvas>
    <?php
    // Koneksikan ke database
    $kon = mysqli_connect("localhost","root","","toko_db");
    //Inisialisasi nilai variabel awal
    $bulan= "";
    $jumlah=null;
    //Query SQL
    $sql="select bulan,COUNT(*) as 'total' from nota GROUP by bulan;";
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
      type: 'doughnut',
        data: {
            labels:[<?php echo $bulan; ?>],
            datasets: [{
                label:'Data Transaksi Barang ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]

            }]
        },

    });
</script>
</div>
<div class="col-lg-6 ds">
	<h4>Data Barang</h4>
 <canvas id="myChart2"></canvas>
    <?php
    // Koneksikan ke database
    $kon = mysqli_connect("localhost","root","","toko_db");
    //Inisialisasi nilai variabel awal
    $barang= "";
    $jumlah=null;
    //Query SQL
    $sql="select nota.*, count(nota.id_barang) as barang, barang.nama_barang from nota INNER JOIN barang on barang.id_barang = nota.id_barang group by id_barang order by jumlah desc;";
    $hasil=mysqli_query($kon,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        //Mengambil nilai jurusan dari database
        $brg=$data['nama_barang'];
        $barang .= "'$brg'". ", ";
        //Mengambil nilai total dari database
        $jum=$data['barang'];
        $jumlah .= "$jum". ", ";

    }
    ?>
<script>
var cty = document.getElementById("myChart2").getContext('2d');
  var myChart = new Chart(cty, {
      type: 'doughnut',
        data: {
            labels: [<?php echo $barang; ?>],
            datasets: [{
                label:'Data Transaksi Barang ',
                backgroundColor: 
                ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)','rgb(255,0,0)', 'rgb(60, 179, 113)','rgb(175, 238, 239)', 'rgb(0,255,0)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]

            }]
        },

        // Configuration options go here

    });
</script>
</div>
				</div>
           </div><!--  /col-lg-9 END SECTION-->


                  
      <!-- RIGHT SIDEBAR CONTENT -->                  
                  
			<div class="col-lg-3 ds">
				<div id="calendar" class="mb">
					<div class="panel green-panel no-margin">
						<div class="panel-body">
							<div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
								<div class="arrow"></div>
								<h3 class="popover-title" style="disadding: none;"></h3>
								<div id="date-popover-content" class="popover-content"></div>
							</div>
							<div id="my-calendar"></div>
						</div>
					</div>
				</div><!-- / calendar -->
			  </div><!-- /col-lg-3 -->
		  </div> <!--/row -->
		 <div class="clearfix" style="padding-top:18%;"></div>
	  </section>
  </section>

