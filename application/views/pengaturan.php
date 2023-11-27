<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<?php $id_pelamar = $this->session->userdata('ses_id'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-cog color-amber"></em>
			</a></li>
			<li class="active">Pengaturan</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Pengaturan</h1>
		</div>
	</div><!--/.row-->

	<div id="notifikasi">
		<?php if($this->session->flashdata('msg')):?>
			<div class="alert bg-info">
				<?php  echo $this->session->flashdata('msg')?>
			</div>
		<?php endif ;?>
		<?php if($this->session->flashdata('msg_update')):?>
			<div class="alert bg-info">
				<?php  echo $this->session->flashdata('msg_update')?>
			</div>
		<?php endif ;?>
		<?php if($this->session->flashdata('msg_hapus')):?>
			<div class="alert bg-danger">
				<?php  echo $this->session->flashdata('msg_hapus')?>
			</div>
		<?php endif ;?>
	</div> 
	<div class="col-sm-12" style="background-color: #fff; padding: 20px; border-radius: 5px;">
		<div class="col-md-4">
			<div class="col-sm-12">
				<?php 
				$image = $this->db->query("SELECT * FROM tb_pelamar WHERE id_pelamar = $id_pelamar");
				foreach ($image->result() as $key_user) {
					$imageUser = $key_user->foto;
				}
				?>
				<div align="center" style="margin-top: 5%">
				<h4><b>Foto Profil</b></h4>
					
					<img src="<?php echo ($imageUser != '' ? base_url('./upload/foto_pelamar/' . $imageUser) : base_url('./upload/foto_pelamar/default.png')); ?>" alt="" style="width: 60%; border-radius: 5px;">
				</div>
			</div>
			<div class="col-sm-12" style="margin-top: 5px;">
				<!-- <input type="file" name="" class="btn btn-primary mr-2 mb-2"> -->
				<div align="center" style="margin-top: 6%">
				<form action="<?php echo base_url('Pelamar/Pelamar/uploadImage/'.$id_pelamar) ?>" method="post" enctype="multipart/form-data">
					<div class="button_outer">
						<div class="btn_upload">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<input type="file" id="upload_file" name="foto">
							Upload Foto
						</div>
						<div class="processing_bar"></div>
						<div class="success_box"></div>
					</div>
					<div class="error_msg"></div>
					<div class="uploaded_file_view" id="uploaded_view">
						<span class="file_remove">X</span>
						<div style="padding: 5% 10% 10% 10%">
							<input type="submit" value="Simpan" class="btn btn-blue mr-2 mb-2">
				</form>
						</div>
					</div><hr>
				</div>
			</div>

		</div>
		<div class="col-md-8">
			<div class="col-sm-12">
				<h4><b>Username</b></h4>
				<?php
				$dataDiri = $this->db->query("SELECT * FROM tb_pelamar WHERE id_pelamar = $id_pelamar");
				foreach ($dataDiri->result() as $key) {
					$username = $key->username;
				}
				?>
				<form action="<?php echo base_url('Pelamar/Pelamar/editProfile/'.$id_pelamar) ?>" method="post">
					<div class="form-row">
						<div class="form-group">
							<input type="text" class="form-control" name="username" value="<?php echo $username ?>" required="required">
						</div>
					</div>
				<h4 style="margin-top: 7%"><b>Kata Sandi</b></h4>
					<div class="form-row">
						<div class="form-group">
							<label>Kata sandi lama</label>
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<input type="password" class="form-control" name="passOld"  required="required">
						</div>
						<div class="form-group">
							<label>Kata sandi baru</label>
							<input type="password" class="form-control" name="passNew" id="password" required="required">
						</div>
						<div class="form-group">
							<label>Ulangi kata sandi baru</label>
							<input type="password" class="form-control" name="confirmPass" id="confirm_password" required="required">
						</div>
					</div>
				<input type="submit" class="btn btn-success btn-block mr-2 mb-2" value="Simpan">
				</form>
			</div>
			<div class="col-sm-12">
			</div>
		</div>
	</div>

</div>

</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>