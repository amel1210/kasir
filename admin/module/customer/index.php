 <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Customer</h3>
						<br/>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success-edit'])){?>
						<div class="alert alert-success">
							<p>Update Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<?php 
							if(!empty($_GET['uid'])){
							$sql = "SELECT * FROM customer WHERE id_pelanggan = ?";
							$row = $config->prepare($sql);
							$row->execute(array($_GET['uid']));
							$edit = $row->fetch();
						?>
                                                <button class="btn btn-default" onclick=" window.history.back()"><i class="fas fa-backward"></i> Batal</button></td>
						<form method="POST" action="fungsi/edit/edit.php?customer=edit">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['nama_pelanggan'];?>" required name="nama_pelanggan" placeholder="Masukan Customer Baru">
										<input type="hidden" name="id" value="<?= $edit['id_pelanggan'];?>">
									</td>
                                    <td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['alamat_pelanggan'];?>" required name="alamat_pelanggan" placeholder="Masukan Customer Baru">
									</td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
                                    
								</tr>
							</table>
						</form>
						<?php }else{?>

                            <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
						<a href="index.php?page=customer" style="margin-right :0.5pc;" 
							class="btn btn-success btn-md pull-right">
							<i class="fa fa-refresh"></i> Refresh Data</a>
						<div class="clearfix"></div>
						<br/>
						<?php }?>
						<br/>

						<!-- <table class="table table-bordered"> -->
						<table class="table table-bordered" id="example1">
							<thead>
								<tr style="background:#DFF0D8;color:#333;">
									<th>No.</th>
									<th>Id Pelanggan</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$hasil = $lihat -> customer();
								$no=1;
								foreach($hasil as $isi){
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $isi['id_pelanggan'];?></td>
									<td><?php echo $isi['nama_pelanggan'];?></td>
									<td><?php echo $isi['alamat_pelanggan'];?></td>
									<td>
										<a href="index.php?page=customer&uid=<?php echo $isi['id_pelanggan'];?>"><button class="btn btn-warning">Edit</button></a>
										<a href="fungsi/hapus/hapus.php?customer=hapus&id=<?php echo $isi['id_pelanggan'];?>" onclick="javascript:return confirm('Hapus Data Customer ?');"><button class="btn btn-danger">Hapus</button></a>
									</td>
								</tr>
							<?php $no++; }?>
							</tbody>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
                        <div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								Modal content
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
								</div>	
						<form method="POST" action="fungsi/tambah/tambah.php?customer=tambah">
                        <div class="modal-body">
                                <table class="table table-striped bordered">
                                <tr>
										<td>Nama Pelanggan</td>
										<td><input type="text" placeholder="Nama Pelanggan" required class="form-control" name="nama_pelanggan"></td>
								</tr>
								<tr>
										<td>Alamat Pelanggan</td>
										<td><input type="text" placeholder="Alamat Pelanggan" required class="form-control"  name="alamat_pelanggan"></td>
								</tr>
							</table>
                        </div>
                        <div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
						</form>
				  </div>
              </div>
          </section>
      </section>
	
