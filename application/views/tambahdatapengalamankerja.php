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

		<?php $id_pelamar=$this->session->userdata('ses_id') ?>
		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h4 style="margin-bottom: 2%;"><b>Tambah Data Pengalaman Kerja</b></h4>
				<form action="<?php echo base_url('Pelamar/Pelamar/tambahdatapengalamankerja/') ?>" method="post">
				  <div class="form-row">
				  	<div class="form-group col-md-6 col-sm-12">
				      <label for="nama_perusahaan">Nama Perusahaan</label>
				      <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
				      <input required="required" type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="periode">Lama Bekerja (Dalam Tahun)</label>
				      <input required="required" type="number" class="form-control" name="periode" placeholder="Lama Bekerja (Dalam Tahun)">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="jabatan_akhir">Jabatan Terakhir</label>
				      <input required="required" type="text" class="form-control" name="jabatan_akhir" placeholder="Jabatan Terakhir">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="alasan_keluar">Alasan Keluar</label>
				      <input required="required" type="text" class="form-control" name="alasan_keluar" placeholder="Alasan Keluar">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="nama_referensi">Nama Referensi</label><small style="color: red">*isi dengan "-"(tanpa petik jika tidak ada)</small>
				      <input required="required" type="text" class="form-control" name="nama_referensi" placeholder="Alasan Keluar">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="no_hp_referensi">Nomor HP Referensi</label><small style="color: red">*isi dengan "-"(tanpa petik jika tidak ada)</small>
				      <input required="required" type="number" class="form-control" name="no_hp_referensi" placeholder="Alasan Keluar">
				    </div>
				  </div>
				  <div class="col-sm-12">
		            <input type="submit" value="Simpan" class="btn btn-blue">
		            <a href="#" class="btn btn-danger mr-2 mb-2">Batal</a>
		          </div>
				</form>
			</div>
		</div><br>

	</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>