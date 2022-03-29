<?php 
session_start();
if(!empty($_SESSION['admin'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}

	if(!empty($_GET['customer'])){
		$id = $_POST['id'];
		$nama = $_POST['nama_pelanggan'];
		$alamat = $_POST['alamat_pelanggan'];
		$data[] = $id;
		$data[] = $nama;
		$data[] = $alamat;
		$sql = 'INSERT INTO customer (id_pelanggan,nama_pelanggan, alamat_pelanggan) VALUES(?,?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=customer&&success=tambah-data"</script>';
	}

	if(!empty($_GET['diskon'])){
		$id = $_POST['id'];
		$pelanggan = $_POST['customer'];
		$persen = $_POST['persen'];
		$tgl = $_POST['tgl'];
var_dump($pelanggan);
var_dump($persen);

		$data[] = $id;
		$data[] = $pelanggan;
		$data[] = $persen;
		$data[] = $tgl;
		$sql = 'INSERT INTO diskon (id_diskon,customer_id,persen,tanggal_input) 
				VALUES(?,?,?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		// var_dump($row);

		// echo '<script>window.location="../../index.php?page=diskon&&success=tambah-data"</script>';
	}

	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		var_dump($row);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
	$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();

		if($hsl['stok'] > 0)
		{
			$kasir =  $_GET['id_kasir'];
			$jumlah = 1;
			$total = $hsl['harga_jual'];
			$tgl = date("j F Y, G:i");
			
			$data1[] = $id;
			$data1[] = $kasir;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $tgl;
		$data1[]= $pelanggan;
		// $data1[] = $diskon;\
		$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,pelanggan,tanggal_input) VALUES (?,?,?,?,?,?)';
		$row1 = $config -> prepare($sql1);
		$row1 -> execute($data1);
 		echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
	}else{
			echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}}

