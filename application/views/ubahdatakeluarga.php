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

		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
			<div class="col-sm-12">
				<h4 style="margin-bottom: 2%;"><b>Ubah Data Keluarga</b></h4>
				<form action="<?php echo base_url('Pelamar/Pelamar/ubahdatakeluarga/'.$data[0]['id_pelamar']) ?>"method="post">
				  <div class="form-row">
				  	<div class="form-group col-md-6 col-sm-12">
				      <label for="inputNamaAyah">Nama Ayah</label>
				      <input type="hidden" name="id_pelamar" value="<?php echo $data[0]['id_pelamar'] ?>">
				      <input type="text" class="form-control" name="nama_ayah" value="<?php echo $data[0]['nama_ayah'] ?>" placeholder="Nama Ayah">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="inputPekerjaanAyah">Pekerjaan Ayah</label>
				      <input required="required" type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo $data[0]['pekerjaan_ayah'] ?>" placeholder="Pekerjaan Ayah">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="inputNamaIbu">Nama Ibu</label>
				      <input required="required" type="text" class="form-control" name="nama_ibu" value="<?php echo $data[0]['nama_ibu'] ?>" placeholder="Nama Ibu">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="inputPekerjaanIbu">Pekerjaan Ibu</label>
				      <input required="required" type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo $data[0]['pekerjaan_ibu'] ?>" placeholder="Pekerjaan Ibu">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="inputNamaPasangan">Nama Suami/Istri</label>
				      <input type="text" class="form-control" name="nama_pasangan" value="<?php echo $data[0]['nama_pasangan'] ?>" placeholder="Nama Suami/Istri">
				    </div>
				    <div class="form-group col-md-6 col-sm-12">
				      <label for="inputPekerjaanPasangan">Pekerjaan Suami/Istri</label>
				      <input type="text" class="form-control" name="pekerjaan_pasangan" value="<?php echo $data[0]['pekerjaan_pasangan'] ?>" placeholder="Pekerjaan Suami/Istri">
				    </div>
				  </div>
				  <div class="col-sm-12">
		            <input type="submit" value="Simpan" class="btn btn-blue">
		            <a href="<?php echo base_url('Pelamar/Pelamar/profilawal') ?>" class="btn btn-danger mr-2 mb-2">Batal</a>
		          </div>
				</form>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>