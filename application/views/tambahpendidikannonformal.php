<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<?php $id_pelamar = $this->session->userdata('ses_id'); ?>
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

		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px">
			<div class="col-sm-12">
				<h4 style="margin-bottom: 2%;"><b>Tambah Riwayat Pendidikan Nonformal</b></h4>
				<form action="<?php echo base_url('Pelamar/Pelamar/tambahpendidikannonformal') ?>" method="post">
				  <div class="form-row">
				  	<div class="form-group col-sm-12">
				      <label for="inputnamapendidikannonformal">Nama Kursus/Pelatihan</label>
				      <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
				      <input required="required" type="text" class="form-control" name="nama_pendidikan_nonformal" placeholder="Nama Kurus/Pelatihan">
				    </div>
				    <div class="form-group col-sm-12">
				      <label for="inputtujuanpendidikannonformal">Tujuan Kursus/Pelatihan</label>
				      <input required="required" type="text" class="form-control" name="tujuan_pendidikan_nonformal" placeholder="Tujuan Kursus/Pelatihan">
				    </div>
				    <div class="form-group col-sm-12">
				      <label for="inputnomorsertifikat">Nomor Sertifikat <label style="color:red">*Isi dengan "-" (tanpa petik) Jika tidak ada</label></label>
				      <input type="text" class="form-control" name="nomor_sertifikat" placeholder="Nomor Sertifikat">
				    </div>
				    <div class="form-group col-sm-12">
				      <label for="inputtahunpendidikannonformal">Tahun</label>
				      <input required="required" type="number" class="form-control" name="tahun_pendidikan_nonformal" placeholder="Tahun">
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