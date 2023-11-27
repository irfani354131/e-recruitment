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

			<li class="active">Upload Berkas</li>

		</ol>

	</div>
	<!--/.row-->



	<div class="row">

		<div class="col-lg-12">

			<h1 class="page-header">Upload Berkas</h1>

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

			<b style="color: red">"PASTIKAN ANDA SUDAH MENGISI DATA DIRI"</b><br><br>


			<b>Kelengkapan berkas yang wajib diunggah:</b><br><br>

			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>1.</td>
						<td>Scan Kartu Tanda Penduduk (.pdf)</td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='ktp'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocKTP') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="ktp" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
					<tr>
						<td>2.</td>
						<td>Pas Foto Berwarna Terbaru 3x4 (.pdf)</td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='foto'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocFOTO') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="foto" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
					<tr>
						<td>3.</td>
						<td>Scan Ijasah Terakhir (.pdf)</td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='ijasah'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocIJASAH') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="ijasah" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
					<tr>
						<td>4.</td>
						<td>Scan Transkip Nilai Terakhir (.pdf)</td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='transkip'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocTRANSKIP') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="transkip" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
					<tr>
						<td>5.</td>
						<td>Scan Sertifikat Pendukung (.pdf)</td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='sertifikat'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocSERTIFIKAT') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="sertifikat" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
					<tr>
						<td>6.</td>
						<td>Surat Referensi Kerja (Bila Ada) (.pdf)</td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='referensi'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocREFERENSI') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="referensi" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
					<tr>
						<td>7.</td>
						<td>Berkas Yang Telah Di Download dan Sudah Ter-Isi (Jadikan dalam satu file dengan format pdf) <br><a href="<?php echo base_url('./Pelamar/Pelamar/vdownload_doc') ?>">Klik Disini Untuk Download Berkas Pendukung</a></td>
						<?php $query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='berkaschaakra'");
						foreach ($query->result() as $key) {
							$berkas = $key->berkas;
						}
						if ($query->num_rows() > 0) { ?>
							<td><a target="blank" href="<?php echo base_url('./upload/berkas_pelamar/' . $berkas) ?>">
									<p style="color: blue"><?php echo $berkas; ?></p>
								</a></td>
						<?php } ?>
						<form action="<?php echo base_url('Pelamar/Pelamar/uploadDocBERKASCHAAKRA') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
							<td><input type="file" name="berkaschaakra" class="form-control" id="berkas"></td>
							<td><input type="submit" value="Upload" class="btn btn-block btn-blue"></td>
						</form>
					</tr>
				</table>
			</div>

			<!-- UNTUK RSDU KRIAN -->

			<!-- <b>Kelengkapan berkas yang wajib diunggah :</b><br><br>

			<p>1. Surat permohonan kerja (sesuai form terlampir)</p>
			<p>2. Daftar Riwayat Hidup ( sesuai form terlampir)</p>
			<p>3. Copy ijazah (terlegalisir basah)</p>
			<p>4. Copy transkrip nilai (terlegalisir basah)</p>
			<p>5. Copy/Print screen Surat Akreditasi Universitas</p>
			<p>6. Copy SKCK yang masih berlaku (terlegalisir)</p>
			<p>7. Copy Kartu Pengenal Elektronik (KTP-el) atau surat keterangan telah melakukan perekaman KTP-el yang dikeluarkan Dukcapil</p>
			<p>8. Pas Foto terbaru ukuran 4x6 background merah</p>
			<p>9. Print screen sertifikat vaksin dosis 1 dan dosis 2 COVID 19 (tuntas)</p>
			<p>10. STR (Surat Tanda Registrasi) yang masih berlaku untuk tenaga kesehatan kecuali Sarjana Kesehatan Masyarakat</p>
			<p>11. Surat keterangan sehat dan bebas narkoba yang dikeluarkan oleh Puskesmas/Rumah Sakit Pemerintah/ TNI/Polri yang masih berlaku</p>
			<p>12. Surat Pengalaman yang dikeluarkan oleh instansi kerja (opsional)</p>
			<p>13. Copy sertifikat pelatihan PPGD/BCLS/BLS untuk formasi perawat</p>
			<p>14. Copy SIM A untuk formasi Driver dan Driver Ambulans</p>
			<p>15. Pelamar wajib menandatangani surat pernyataan bermaterai Rp. 10.000 (sesuai form terlampir)</p></br> -->

			<p style="color: red">*maks size 2mb</p>
			<b style="color: red">"PESERTA AKAN DINYATAKAN GUGUR APABILA TIDAK MELENGKAPI BERKAS YANG WAJIB DI UNGGAH"</b><br><br>


		</div>

	</div>



</div>
<!--/.main-->



<?php $this->load->view('layout3/footer') ?>





<script type="text/javascript">
	$("input[type='file']").on("change", function() {



		var val = $(this).val().toLowerCase(),

			regex = new RegExp("(.*?)\.(pdf)$");



		if (this.files[0].size > 2000000) {

			alert("Mohon unggah ukuran dibawah 2MB. Terima Kasih");

			$(this).val('');

		} else if (!(regex.test(val))) {

			$(this).val('');

			alert('Format file salah, hanya pdf');

		}



	});
</script>