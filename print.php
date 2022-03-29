<?php 
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl=$lihat->penjualan();
// 	var_dump($hsl['nama_pelanggan']);
// ?>
<html>
	<head>
		<title>NOTA</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<style>
			@page {
				size: auto; margin: 6mm;
			}
		</style>
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<!-- <div class="col-sm-4"></div> -->
				<div class="col-sm-4">
					<center>
						<p><?php echo $toko['nama_toko'];?></p>
						<p><?php echo $toko['alamat_toko'];?></p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Kasir : <?php  echo $_GET['nm_member'];?></p>
						<p>Nama Pelanggan : <?php echo $_GET['nama_pelanggan'];?></p>

					</center>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td style="width: 30px;">No.</td>
							<td>Barang</td>
							<td>Jumlah</td>
							<td>Total</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td style="width: 30px;"><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
						<?php $hasil = $lihat -> jumlah(); ?>
						Total : Rp.<?php echo number_format($hasil['bayar']);?>,-
						<br/>
						Bayar : Rp.<?php echo number_format($_GET['bayar']);?>,-
						<br/>
						Kembali : Rp.<?php echo number_format($_GET['kembali']);?>,-
					</div>
					<div class="clearfix"></div>
					<center>
						<p>Terima Kasih Telah berbelanja di toko kami !</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>