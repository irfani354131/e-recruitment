<?php $this->load->view('layout3/header') ?>

<?php $this->load->view('layout3/navbar') ?>

<?php $this->load->view('layout3/sidebar') ?>



<?php $id_pelamar = $this->session->userdata('ses_id'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="row">

		<ol class="breadcrumb">

			<li><a href="#">

					<em class="fa fa-paperclip color-amber"></em>

				</a></li>

			<li class="active">Download Dokumen</li>

		</ol>

	</div>
	<!--/.row-->



	<div class="row">

		<div class="col-lg-12">

			<h1 class="page-header">Download Dokumen</h1>

		</div>

	</div>
	<!--/.row-->



	<div id="notifikasi">

		<?php if ($this->session->flashdata('msg')) : ?>

			<div class="alert bg-info">

				<?php echo $this->session->flashdata('msg') ?>

			</div>

		<?php endif; ?>

		<?php if ($this->session->flashdata('msg_update')) : ?>

			<div class="alert bg-info">

				<?php echo $this->session->flashdata('msg_update') ?>

			</div>

		<?php endif; ?>

		<?php if ($this->session->flashdata('msg_hapus')) : ?>

			<div class="alert bg-danger">

				<?php echo $this->session->flashdata('msg_hapus') ?>

			</div>

		<?php endif; ?>

		<?php if ($this->session->flashdata('pesan_error')) : ?>

			<div class="alert bg-danger">

				<?php echo $this->session->flashdata('pesan_error') ?>

			</div>

		<?php endif; ?>

	</div>



	<div class="col-sm-12" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">

		<div class="form-group col-sm-12">


			<?php
			$cek = 0;
			$datamotlet = array();
			$data = array();
			$array = $this->db->query("SELECT * FROM tb_lowongan WHERE jadwal_seleksi >= CURRENT_DATE()")->result_array();;
			foreach ($array as $key) {
				$id_lowongan = $key['id_lowongan'];
				$id_perusahaan = $key['id_perusahaan'];

				$perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

				foreach ($perusahaan->result() as $key_perusahaan) {
					if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {
						array_push($data, $key['id_perusahaan']);
						array_push($datamotlet, $key['id_jenis_motlet']);
						// $nama_perusahaan = $key_perusahaan->nama_perusahaan;
						// $logo_perusahaan = $key_perusahaan->logo_perusahaan;
					}
				}
			}
			?>

			<?php if (in_array('6', $data)) {
				$cek = 1; ?>

				<!--<b style="color: red">"KHUSUS UNTUK KARYAWAN PT ITS TEKNO SAINS"</b><br><br>-->
				<b style="color: red">"KHUSUS UNTUK KARYAWAN PT. CITICON NUSANTARA INDUSTRIES"</b><br><br>

				<b>Kelengkapan berkas yang wajib diunduh:</b><br><br>

				<!--<p>1.<a href="<?php echo base_url('upload/dokumen/ESSAY_KOMPETENSI_TEKNO_ITS.pdf') ?>" download="ESSAY_KOMPETENSI_TEKNO_ITS.pdf"> Essay Kompetensi Tekno ITS</a></p>-->

				<p>1.<a href="<?php echo base_url('upload/dokumen/ESSAY KOMPETENSI CITICON.pdf') ?>" download="ESSAY KOMPETENSI CITICON.pdf"> Essay Kompetensi Citicon Nusantara Industries</a></p>

				<p>2. <a href="<?php echo base_url('upload/dokumen/SELF ASSESSMENT CC_2021 .pdf') ?>" download="SELF_ASSESSMENT&BIODATA .pdf">Self Assesment & Biodata</a></p>

				<p>3. <a href="<?php echo base_url('upload/dokumen/Informed Consent.pdf') ?>" download="Informed Consent.pdf">Informed Consent</a></p></br>
				<hr />
			<?php }
			if (in_array('7', $data)) {
				$cek = 1; ?>

				<b style="color: red">"KHUSUS UNTUK KARYAWAN BANK SYARIAH INDONESIA"</b><br><br>


				<b>Kelengkapan berkas yang wajib diunduh:</b><br><br>

				<p>1.<a href="<?php echo base_url('upload/dokumen/Esai Kompetensi BSI.pdf') ?>" download="Esai Kompetensi BSI.pdf"> Essay Kompetensi Bank Syariah Indonesia</a></p>

				<p>2. <a href="<?php echo base_url('upload/dokumen/SELF ASSESSMENT CC_2021 .pdf') ?>" download="SELF_ASSESSMENT&BIODATA .pdf">Self Assesment & Biodata</a></p>

				<p>3. <a href="<?php echo base_url('upload/dokumen/Informed Consent.pdf') ?>" download="Informed Consent.pdf">Informed Consent</a></p></br>
				<hr />
			<?php }
			if (in_array('3', $datamotlet)) {
				$cek = 1; ?>

				<b style="color: red">"UNTUK TALENT TES"</b><br><br>

				<b>Kelengkapan berkas yang wajib diunduh:</b><br><br>

				<p>1. <a href="<?php echo base_url('upload/dokumen/SELF ASSESSMENT TALENT TEST.doc') ?>" download="SELF ASSESSMENT TALENT TEST.doc">Self Assesment & Biodata</a></p></br>
				<hr />
			<?php }
			if (in_array('8', $data) || in_array('9', $data) || in_array('10', $data)) {
				$cek = 1; ?>

				<b style="color: red">"UNTUK PELAMAR RSUD KRIAN, DINKES SIDOARJO, DAN PUSKESMAS SE-KABUPATEN SIDOARJO"</b><br><br>

				<b>Kelengkapan berkas yang wajib diunduh:</b><br><br>

				<p>1. <a href="<?php echo base_url('upload/dokumen/Surat permohonan kerja.docx') ?>" download="Surat permohonan kerja.docx">Surat Permohonan Kerja</a></p>

				<p>2. <a href="<?php echo base_url('upload/dokumen/Daftar Riwayat-hidup.docx') ?>" download="Daftar Riwayat-hidup.docx">Daftar Riwayat Hidup</a></p>

				<p>3. <a href="<?php echo base_url('upload/dokumen/Surat Pernyataan D3, D4, S1, Spesialis.docx') ?>" download="Surat Pernyataan D3, D4, S1, Spesialis.docx">Surat Pernyataan Khusus D3/D4/S1/Spesialis</a></p>

				<p>4. <a href="<?php echo base_url('upload/dokumen/Surat Pernyataan SMASMK.docx') ?>" download="Surat Pernyataan SMASMK.docx">Surat Pernyataan Khusus SMA/SMK</a></p></br>
				<hr />
			<?php }
			if (in_array('3', $data)) {
				$cek = 1; ?>
				<b style="color: red">"UNTUK PELAMAR PT. TEKNO SAINS ITS"</b><br><br>

				<b>Kelengkapan berkas yang wajib diunduh:</b><br><br>

				<!-- <p>1. <a href="<?php echo base_url('upload/dokumen/ESAI KOMPETENSI.docx') ?>" download="ESAI KOMPETENSI.docx">Essay Kompetensi</a></p> -->

				<p>1. <a href="<?php echo base_url('upload/dokumen/ESSAY KOMPETENSI PT TEKNO ITS.docx') ?>" download="ESSAY KOMPETENSI PT TEKNO ITS.docx">Essay Kompetensi</a></p>


				<p>2. <a href="<?php echo base_url('upload/dokumen/SELF ASSESSMENT PT. ITS TEKNO.docx') ?>" download="SELF ASSESSMENT PT. ITS TEKNO.docx">Self Assesment & Biodata</a></p>
				<!-- <p>2. <a href="<?php echo base_url('upload/dokumen/SELF ASSESSMENT CC_2021 .pdf') ?>" download="SELF_ASSESSMENT&BIODATA .pdf">Self Assesment & Biodata</a></p> -->

				<p>3. <a href="<?php echo base_url('upload/dokumen/Informed Consent.pdf') ?>" download="Informed Consent.pdf">Informed Consent</a></p></br>


				<!--<p>4. <a href="<?php echo base_url('upload/dokumen/Tes Kemampuan Teknis .docx') ?>" download="Tes Kemampuan Teknis .docx">Tes Kemampuan Teknis</a></p></br>-->
				<hr />
			<?php }
			if (in_array('1', $data) || in_array('2', $data) || in_array('4', $data) || in_array('5', $data) || in_array('11', $data) || in_array('12', $data)) {
				$cek = 1; ?>
				<b style="color: red">"UNTUK PELAMAR UMUM"</b><br><br>

				<b>Kelengkapan berkas yang wajib diunduh:</b><br><br>

				<p>1. <a href="<?php echo base_url('upload/dokumen/ESAI KOMPETENSI.docx') ?>" download="ESAI KOMPETENSI.docx">Essay Kompetensi</a></p>

				<p>2. <a href="<?php echo base_url('upload/dokumen/SELF ASSESSMENT CC_2021 .pdf') ?>" download="SELF_ASSESSMENT&BIODATA .pdf">Self Assesment & Biodata</a></p>

				<p>3. <a href="<?php echo base_url('upload/dokumen/Informed Consent.pdf') ?>" download="Informed Consent.pdf">Informed Consent</a></p></br>

				<!--<p>4. <a href="<?php echo base_url('upload/dokumen/Tes Kemampuan Teknis .docx') ?>" download="Tes Kemampuan Teknis .docx">Tes Kemampuan Teknis</a></p></br>-->
			<?php }
			if ($cek > 0) { ?>
				<b>Silahkan Upload Berkas Pada Menu "<b style="color: red">Upload Berkas</b>" Sesuai Dengan Ketentuan.</b><br><br>
			<?php } else { ?>
				<b style="color: red">Tidak ada berkas untuk didownload.</b><br><br> <?php } ?>

		</div>

	</div>



</div>
<!--/.main-->



<?php $this->load->view('layout3/footer') ?>