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
			<h4 style="margin-bottom: 2%;"><b>Tambah Riwayat Pendidikan</b></h4>
			<form action="<?php echo base_url('Pelamar/Pelamar/tambahpendidikan') ?>" method="post">
			  <div class="form-row">
			  	<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
			  	<div class="form-group col-md-6 col-sm-12">
			      <label for="inputJenjang">Jenjang Pendidikan</label>
			      <select name="jenjang_pendidikan" class="form-control form-control-lg" required="required">
					<option value="">--== Pilih Jenjang Pendidikan ==--</option>
					<option value="SMP">SMP</option>
			        <option value="SMA/SMK">SMA/SMK</option>
			        <option value="D3">D3</option>
			        <option value="D4/S1">D4/S1</option>
			        <option value="S2">S2</option>
			        <option value="S3">S3</option>
			      </select>
			    </div>
			  	<div class="form-group col-md-6 col-sm-12">
			      <label for="inputNamaInstitusi">Nama Institusi</label>
			      <input required="required" type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi">
			    </div>
			    <div class="form-group col-md-6 col-sm-12">
			      <label for="inputJurusan">Jurusan</label>
			      <small>isi dengan tanda "-" (tanpa tanda petik) jika tidak ada</small>
			      <input required="required" type="text" class="form-control" name="jurusan" placeholder="Jurusan">
			    </div>

			    <div class="form-group col-md-6 col-sm-12">
			      <label for="nilaiAkhir">Nilai Akhir/IPK <small style="color:red">*gunakan tanda titik (.) untuk mengganti tanda koma (,)</small></label>
			      <input required="required" pattern="^\d*(\.\d{0,2})?$" class="form-control" name="nilai_akhir" placeholder="NEM/IPK">
			    </div>
			    <div class="form-group col-md-6 col-sm-12">
			      <label for="tanggal">Tahun Masuk</label>
			      <input required="required" type="number" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk">
			    </div>
			    <div class="form-group col-md-6 col-sm-12">
			      <label for="tanggal">Tahun Lulus</label>
			      <input required="required" type="number" class="form-control" name="tahun_keluar" placeholder="Tahun Lulus">
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