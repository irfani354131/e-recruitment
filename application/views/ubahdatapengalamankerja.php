<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user color-amber"></em>
				</a></li>
				<li class="active">Profil Saya</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Profil Saya</h1>
			</div>
		</div><!--/.row-->

		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h4 style="margin-bottom: 2%;"><b>Ubah Data Pengalaman Kerja</b></h4>
				<form action="<?php echo base_url('Pelamar/Pelamar/ubahdatapengalamankerja/'.$data[0]['id_pengalaman']) ?>" method="post">
				  <div class="form-row">
				  	<div class="form-group col-md-6 col-sm-12">
				      <label for="nama_perusahaan">Nama Perusahaan</label>
				      <input type="hidden" name="id_pelamar" value="<?php echo $data[0]['id_pelamar'] ?>"><input type="hidden" name="id_pengalaman" value="<?php echo $data[0]['id_pengalaman'] ?>">
				      <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $data[0]['nama_perusahaan'] ?>">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="periode">Lama Bekerja (Dalam Tahun)</label>
				      <input type="number" class="form-control" name="periode" placeholder="Lama Bekerja (Dalam Tahun)" value="<?php echo $data[0]['periode'] ?>">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="jabatan_akhir">Jabatan Terakhir</label>
				      <input type="text" class="form-control" name="jabatan_akhir" placeholder="Jabatan Terakhir" value="<?php echo $data[0]['jabatan_akhir'] ?>">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="alasan_keluar">Alasan Keluar</label>
				      <input type="text" class="form-control" name="alasan_keluar" placeholder="Alasan Keluar" value="<?php echo $data[0]['alasan_keluar'] ?>">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="nama_referensi">Nama Referensi</label><small style="color: red">*isi dengan "-"(tanpa petik jika tidak ada)</small>
				      <input type="text" class="form-control" name="nama_referensi" placeholder="Nama Referensi" value="<?php echo $data[0]['nama_referensi'] ?>">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="no_hp_referensi">Nomor HP Referensi</label><small style="color: red">*isi dengan "-"(tanpa petik jika tidak ada)</small>
				      <input type="number" class="form-control" name="no_hp_referensi" placeholder="Alasan Keluar" value="<?php echo $data[0]['no_hp_referensi'] ?>">
				    </div>
				  </div>
				  <div class="col-sm-12">
		            <input type="submit" value="Simpan" class="btn btn-blue">
		            <a href="<?php echo base_url('Pelamar/Pelamar/profilawal') ?>" class="btn btn-danger mr-2 mb-2">Batal</a>
		          </div>
				</form>
			</div>
		</div>

	</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>