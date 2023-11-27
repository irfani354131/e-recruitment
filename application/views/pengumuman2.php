<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-envelope color-amber"></em>
			</a></li>
			<li class="active">Hasil Seleksi</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Hasil Seleksi</h1>
		</div>
	</div><!--/.row-->
	<?php 
	$id_pelamar = $this->session->userdata('ses_id');
	$query = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar");
	$queryPerus = $this->db->query("SELECT * FROM tb_perusahaan");
	$queryLow = $this->db->query("SELECT * FROM tb_lowongan");
	foreach ($query->result_array() as $key) {
		$status = $key['status_lamaran'];
		$idPel = $key['id_pelamar'];
		$idLow = $key['id_lowongan'];
		$idPerus = $key['id_perusahaan'];

		foreach ($queryPerus->result() as $keyPerus) {
			if ($idPerus == $keyPerus->id_perusahaan) {
				$namaPerus = $keyPerus->nama_perusahaan;
			}
		}

		foreach ($queryLow->result() as $keyLow) {
			if ($idLow == $keyLow->id_lowongan) {
				$namaLowongan = $keyLow->nama_jabatan;
			}
		}

	if ($status == "Diterima") { ?>
		<div class="alert bg-info" >
			<h3><em class="fa fa-bullhorn" style="color: #fff"> <?php echo $namaPerus ?></em></h3>
			<!-- <p class="card-text" style="color: #fff"><b>Selamat!</b> Anda dinyatakan lolos seleksi administrasi. Silahkan mempersiapkan diri untuk mengikuti rangkaian seleksi sesuai jadwal yang sudah ditentukan. Terima kasih.</p> -->
			<p class="card-text" style="color: #fff"><b>Selamat!</b> Anda dinyatakan lolos seleksi administrasi pada lowongan <b><?php echo $namaLowongan ?></b>. Silahkan mempersiapkan diri untuk mengikuti tahap selanjutnya.</p>
		</div><br>

	<?php } else if($status == "Belum ada tindakan") { ?>
		<div class="alert bg-warning">
			<h3><em class="fa fa-bullhorn" style="color: #fff"> <?php echo $namaPerus ?></em></h3>
			<p class="card-text" style="color: #fff">Lamaran anda sedang kami proses...
		</div><br>

	<?php } else { ?>
		<div class="alert bg-danger">
			<h3><em class="fa fa-bullhorn" style="color: #fff"> <?php echo $namaPerus ?></em></h3>
			<p class="card-text" style="color: #fff"><b>Mohon maaf</b>, anda dinyatakan gugur dalam seleksi tes administrasi pada lowongan <b><?php echo $namaLowongan ?></b>. Tetap semangat ya! Terima kasih.
		</div><br>

	<?php }} ?>
		</div>	<!--/.main-->

		<?php   $this->load->view('layout3/footer') ?>