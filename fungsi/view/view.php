<?php
	/*
	 * PROSES TAMPIL  
	 */ 
	 class view {
		protected $db;
		function __construct($db){
			$this->db = $db;
		}
			
			function member(){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function member_edit($id){
				$sql = "select member.*, login.*
						from member inner join login on member.id_member = login.id_member
						where member.id_member= ?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function toko(){
				$sql = "select*from toko where id_toko='1'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function kategori(){
				$sql = "select*from kategori";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			function customer(){
				$sql = "select * from customer";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function customer_edit($id){
				$sql = "select customer.*, customer.id_pelanggan, customer.nama_pelanggan, customer.alamat_pelanggan
						from customer where  customer.id_pelanggan = customer.id_pelanggan
						where id_customer=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function diskon(){
				$sql = "select diskon.*, customer.id_pelanggan, customer.nama_pelanggan
				from diskon inner join customer on diskon.customer_id = customer.id_pelanggan";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			// function diskonTAmbah(){
			// 	$sql = "select diskon.*, customer.id_pelanggan, customer.nama_pelanggan
			// 	from diskon inner join customer on diskon.customer_id = customer.id_pelanggan";
			// 	$row = $this-> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetchAll();
			// 	return $hasil;
			// }

			function barang(){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
						ORDER BY id DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}
			
			function barang_stok(){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
						where stok <= 3 
						ORDER BY id DESC";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function barang_edit($id){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori
						where id_barang=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}


			

			function laporan_edit(){
				$sql = "SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member, member.nm_member, customer.nama_pelanggan as pelanggans from nota left join barang on barang.id_barang=nota.id_barang left join member on member.id_member=nota.id_member LEFT JOIN customer ON customer.id_pelanggan=nota.pelanggan ORDER BY nota.pelanggan AND nota.tanggal_input, nota.id_nota DESC;";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function barang_cari($cari){
				$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
						from barang inner join kategori on barang.id_kategori = kategori.id_kategori
						where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk like '%$cari%'";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function barang_id(){
				$sql = 'SELECT * FROM barang ORDER BY id DESC';
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				
				$urut = substr($hasil['id_barang'], 2, 3);
				$tambah = (int) $urut + 1;
				if(strlen($tambah) == 1){
					 $format = 'BR00'.$tambah.'';
				}else if(strlen($tambah) == 2){
					 $format = 'BR0'.$tambah.'';
				}else{
					$ex = explode('BR',$hasil['id_barang']);
					$no = (int) $ex[1] + 1;
					$format = 'BR'.$no.'';
				}
				return $format;
			}

			function kategori_edit($id){
				$sql = "select*from kategori where id_kategori=?";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($id));
				$hasil = $row -> fetch();
				return $hasil;
			}

			function kategori_row(){
				$sql = "select*from kategori";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function barang_row(){
				$sql = "select*from barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> rowCount();
				return $hasil;
			}

			function barang_stok_row(){
				$sql ="SELECT SUM(stok) as jml FROM barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function barang_beli_row(){
				$sql ="SELECT SUM(harga_beli) as beli FROM barang";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jual_row(){
				$sql ="SELECT SUM(jumlah) as stok FROM nota";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
			
			function jual(){
// 				$sql ="
// SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member, member.nm_member, customer.nama_pelanggan as pelanggans from nota left join barang on barang.id_barang=nota.id_barang left join member on member.id_member=nota.id_member LEFT JOIN customer ON customer.id_pelanggan=nota.pelanggan ORDER BY nota.pelanggan AND nota.tanggal_input, nota.id_nota DESC;";
$sql="SELECT DISTINCT nota.tanggal_input , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member, member.nm_member, customer.nama_pelanggan as pelanggans from nota LEFT join barang on barang.id_barang=nota.id_barang LEFT join member on member.id_member=nota.id_member LEFT JOIN customer ON customer.id_pelanggan=nota.pelanggan GROUP BY nota.id_nota DESC";		
$row = $this-> db -> prepare($sql);
				$row -> execute(array(date('m-Y')));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			
			function tahun_jual($periodetahun){
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member WHERE nota.tahun = ? 
					   ORDER BY id_nota ASC LIMIT 150";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($periodetahun));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function bulan_jual($periodebulan, $periodeBulans){
				$tahun = date('Y');
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					--    left join member on member.id_member=nota.id_member WHERE nota.bulan = ? AND nota.periode = '$tahun' 
					   left join member on member.id_member=nota.id_member WHERE nota.bulan BETWEEN '$periodebulan' 
						AND '$periodeBulans' AND nota.tahun = '$tahun'
					   ORDER BY id_nota ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($periodebulan, $periodeBulans));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function hari_jual($hari){
				$ex = explode('-', $hari);
				$monthNum  = $ex[1];
				$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
				if($ex[2] > 9)
				{
					$tgl = $ex[2];
				}else{
					$tgl1 = explode('0',$ex[2]);
					$tgl = $tgl1[1];
				}
				$cek = $tgl.' '.$monthName.' '.$ex[0];
				$param = "%{$cek}%";
				$sql ="SELECT nota.* , barang.id_barang, barang.nama_barang,  barang.harga_beli, member.id_member,
						member.nm_member from nota 
					   left join barang on barang.id_barang=nota.id_barang 
					   left join member on member.id_member=nota.id_member WHERE nota.tanggal_input LIKE ? 
					   ORDER BY id_nota ASC";
				$row = $this-> db -> prepare($sql);
				$row -> execute(array($param));
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function penjualan(){
				$sql ="SELECT penjualan.* , barang.id_barang, barang.nama_barang, barang.harga_jual, member.id_member, member.nm_member, customer.nama_pelanggan as pelanggans from penjualan left join barang on barang.id_barang=penjualan.id_barang left join member on member.id_member=penjualan.id_member LEFT JOIN customer ON customer.id_pelanggan=penjualan.pelanggan ORDER BY penjualan.pelanggan;";
				$row = $this-> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetchAll();
				return $hasil;
			}

			function jumlah(){
				$sql ="SELECT SUM(total) as bayar FROM penjualan";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			// function jml_dgn_diskon(){
			// 	$sql ="SELECT p.*, p.total-p.potongan as taotalAkhir FROM `potongan` as p 
			// 		   INNER JOIN `diskon` WHERE diskon.customer_id = ?";
			// 	$row = $this -> db -> prepare($sql);
			// 	$row -> execute();
			// 	$hasil = $row -> fetch();
			// 	return $hasil;
			// }
			

			function jumlah_nota(){
				$sql ="SELECT SUM(total) as bayar FROM nota";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function jml(){
				$sql ="SELECT SUM(harga_beli*stok) as byr FROM barang";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}

			function potongan(){
				$sql ="SELECT p.*, p.total*(diskon.persen/100) as Hasil FROM `penjualan` as p 
				INNER JOIN `diskon` WHERE diskon.customer_id = ?";
				$row = $this -> db -> prepare($sql);
				$row -> execute();
				$hasil = $row -> fetch();
				return $hasil;
			}
	 }
