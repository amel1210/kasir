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
							$sql = "SELECT * FROM diskon WHERE id_diskon = ?";
							$row = $config->prepare($sql);
							$row->execute(array($_GET['uid']));
							$edit = $row->fetch();
						?>
                        <!-- <button class="btn btn-default" onclick="return window.history.back()"><i class="fas fa-backward"></i> Batal</button></td> -->
						<a href="index.php?page=diskon"><button class="btn btn-warning">batal</button></a>
              <form method="POST" action="fungsi/edit/edit.php?diskon=edit">
								<table>
									<tr>
										<td style="width:15pc;">
										<select class="form-control" required name="customer_id" >
											<option value="<?= $edit['customer_id'];?>"><?php echo $edit['customer_id']?></option>
												<?php  $idcus = $lihat -> customer(); foreach($idcus as $ganti){?>
												<option value="<?php echo $ganti['id_pelanggan'];?>"><?php echo $ganti['nama_pelanggan'];?></option>
												<?php }?>
										</select>
										</td>
                  	<td style="width:15pc;">
                  		<input type="text" class="form-control" value="<?= $edit['persen'];?>" required name="persen" placeholder="Masukan diskon persen">

										</td>
										<td style="width:15pc;"><input type="text" readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>" required name="tgl_update"><input type="hidden" name="id" value="<?= $edit['id_diskon'];?>"></td>
										<td style="padding-left:10px;">
                      <button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button>
                   	</td>      
									</tr>
							</table>
							</form>
						<?php }else{?>

                            <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
						<a href="index.php?page=diskon" style="margin-right :0.5pc;" 
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
									<th>ID Pelanggan</th>
									<th>Diskon</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$hasil = $lihat -> diskon();
								$no=1;
								foreach($hasil as $isi){
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $isi['nama_pelanggan'];?></td>
									<td><?php echo $isi['persen'];?></td>
									<td>
										<a href="index.php?page=diskon&uid=<?php echo $isi['id_diskon'];?>"><button class="btn btn-warning">Edit</button></a>
										<a href="fungsi/hapus/hapus.php?diskon=hapus&id=<?php echo $isi['id_diskon'];?>" onclick="javascript:return confirm('Hapus Data Dsikon ?');"><button class="btn btn-danger">Hapus</button></a>
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
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
								</div>	
						<form method="POST" action="fungsi/tambah/tambah.php?diskon=tambah">
                        <div class="modal-body">
                <table class="table table-striped bordered">
                  <tr>
										<td>ID Pelanggan</td>
										<td>
											<select name="customer" class="form-control" required>
											<option value="#">Pilih nama pelangan</option>
												<?php  $idcus = $lihat -> customer(); foreach($idcus as $isi){?>
												<option value="<?php echo $isi['id_pelanggan'];?>"><?php echo $isi['nama_pelanggan'];?></option>
												<?php }?>
											</select>
										</td>
								</tr>
								<tr>
										<td>Diskon(persen)</td>
										<td><input type="text" placeholder="Diskon (desimal)" required class="form-control"  name="persen"></td>
								</tr>
								<tr>
										<td>Tanggal Input</td>
										<td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
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
	
