<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>

<?php $id_pelamar = $this->session->userdata('ses_id'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-user color-amber"></em>
				</a></li>
			<li class="active">Profil Saya</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Profil Saya</h1>
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
	</div>

	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12">
			<h3><b>Data Diri</b></h3>
			<?php
			$data_diri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
			foreach ($data_diri->result() as $key_diri) {
				$nik = $key_diri->nik;
				$id_pelamar = $key_diri->id_pelamar;
				$nama_pelamar = $key_diri->nama_pelamar;
				$alamat_ktp = $key_diri->alamat_ktp;
				$alamat = $key_diri->alamat;
				$status_perkawinan = $key_diri->status_perkawinan;
				$agama = $key_diri->agama;
				$anak_ke = $key_diri->anak_ke;
				$dari_x_sdr = $key_diri->dari_x_sdr;
				$tempat_lahir = $key_diri->tempat_lahir;
				$tanggal_lahir = $key_diri->tanggal_lahir;
				$jk = $key_diri->jenis_kelamin;
				$no_hp = $key_diri->no_hp;
				$facebook = $key_diri->facebook;
				$instagram = $key_diri->instagram;
				$twitter = $key_diri->twitter;
				$linkedin = $key_diri->linkedin;
				// $foto = $key_diri->foto == '' ? base_url('./upload/logo_perusahaan/user.png') : base_url('./upload/logo_perusahaan/' . $key_diri->foto);
			}
			?>
			<?php if ($data_diri->num_rows() > 0) : ?>


				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th width="300">NIK</th>
							<td><?php echo $nik ?></td>
						</tr>
						<tr>
							<th>Nama Lengkap</th>
							<td><?php echo $nama_pelamar ?></td>
						</tr>
						<tr>
							<th>Tempat, Tanggal Lahir</th>
							<td><?php echo $tempat_lahir ?> , <?php echo $tanggal_lahir ?></td>
						</tr>
						<tr>
							<th>Usia</th>
							<?php
							$tgl = strtotime($tanggal_lahir);
							$current_time = time();

							$age_years = date('Y', $current_time) - date('Y', $tgl);
							$age_months = date('m', $current_time) - date('m', $tgl);
							$age_days = date('d', $current_time) - date('d', $tgl);
							if ($age_days < 0) {
								$days_in_month = date('t', $current_time);
								$age_months--;
								$age_days = $days_in_month + $age_days;
							}

							if ($age_months < 0) {
								$age_years--;
								$age_months = 12 + $age_months;
							}

							?>
							<td><?php echo $age_years ?> tahun, <?php echo $age_months ?> bulan, <?php echo $age_days ?> hari</td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td><?php echo $jk ?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<td><?php echo $agama ?></td>
						</tr>
						<tr>
							<th>Alamat Sesuai KTP</th>
							<td><?php echo $alamat_ktp ?></td>
						</tr>
						<tr>
							<th>Alamat Domisili</th>
							<td><?php echo $alamat ?></td>
						</tr>
						<tr>
							<th>Status Perkawinan</th>
							<td><?php echo $status_perkawinan ?></td>
						</tr>
						<tr>
							<th>Anak ke</th>
							<td><?php echo $anak_ke ?> dari <?php echo $dari_x_sdr ?> bersaudara</td>
						</tr>
						<tr>
							<th>Nomor WA Aktif</th>
							<td><?php echo $no_hp ?></td>
						</tr>
						<tr>
							<th>Nama Pengguna Facebook</th>
							<td><?php echo $facebook ?></td>
						</tr>
						<tr>
							<th>Nama Pengguna Instagram</th>
							<td><?php echo $instagram ?></td>
						</tr>
						<tr>
							<th>Nama Pengguna Twitter</th>
							<td><?php echo $twitter ?></td>
						</tr>
						<tr>
							<th>Nama Pengguna Linkedln</th>
							<td><?php echo $linkedin ?></td>
						</tr>
						<!-- <tr>	
						<th>Foto</th>
						<td><img width="100" src="<?php echo $foto ?>"></td>
					</tr> -->
					</table>
				</div>
			<?php endif ?>

			<?php
			if ($data_diri->num_rows() > 0) { ?>
				<div style="text-align: right">
					<a href="<?php echo base_url('Pelamar/Pelamar/ubahdatadiri/' . $id_pelamar) ?>" type="button" class="btn btn-primary mr-2 mb-2" style="text-align: right;"><em class="fa fa-edit color-white"></em> Ubah Data</a>
				</div>
			<?php } else { ?>
				<div style="text-align: right">
					<a href="<?php echo base_url('Pelamar/Pelamar/tambahdatadiri/') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				</div>
			<?php }
			?>

		</div>
	</div>

	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12">
			<h3><b>Data Keluarga</b></h3>
			<?php
			$keluarga = $this->db->query("SELECT * FROM tb_data_keluarga WHERE id_pelamar = $id_pelamar");
			foreach ($keluarga->result() as $key_keluarga) {
				$nama_ayah = $key_keluarga->nama_ayah;
				$pekerjaan_ayah = $key_keluarga->pekerjaan_ayah;
				$nama_ibu = $key_keluarga->nama_ibu;
				$pekerjaan_ibu = $key_keluarga->pekerjaan_ibu;
				$nama_pasangan = $key_keluarga->nama_pasangan;
				$pekerjaan_pasangan = $key_keluarga->pekerjaan_pasangan;
			}
			?>

			<?php if ($keluarga->num_rows() > 0) : ?>


				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th width="300">Nama Ayah</th>
							<td><?php echo $nama_ayah ?></td>
						</tr>
						<tr>
							<th>Pekerjaan Ayah</th>
							<td><?php echo $pekerjaan_ayah ?></td>
						</tr>
						<tr>
							<th>Nama Ibu</th>
							<td><?php echo $nama_ibu ?></td>
						</tr>
						<tr>
							<th>Pekerjaan Ibu</th>
							<td><?php echo $pekerjaan_ibu ?></td>
						</tr>
						<tr>
							<th>Nama Suami/Istri</th>
							<td><?php echo $nama_pasangan ?></td>
						</tr>
						<tr>
							<th>Pekerjaan Suami/Istri</th>
							<td><?php echo $pekerjaan_pasangan ?></td>
						</tr>
					</table>
				</div>
			<?php endif ?>
			<?php
			if ($keluarga->num_rows() > 0) { ?>
				<div style="text-align: right">
					<a href="<?php echo base_url('Pelamar/Pelamar/ubahdatakeluarga/' . $id_pelamar) ?>" class="btn btn-primary mr-2 mb-2"><em class="fa fa-edit color-white"></em> Ubah Data</a>
				</div>
			<?php } else { ?>
				<div style="text-align: right">
					<a href="<?php echo base_url('Pelamar/Pelamar/tambahdatakeluarga') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				</div>
			<?php }
			?>
		</div>
	</div>

	<div class="col-sm-12" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12">
			<h3><b>Data Riwayat Pendidikan</b></h3>
		</div>
		<div class="col-sm-12">
			<h4><b>Riwayat Pendidikan Formal Terakhir</b></h4>
			<!-- KHUSUS REKRUTAN RSUD KRIAN -->
			<!-- <h4><b>Riwayat Pendidikan Formal</b></h4> -->
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Jenjang Pendidikan</th>
							<th>Institusi</th>
							<th>Jurusan</th>
							<th>Tahun Masuk</th>
							<th>Tahun Keluar</th>
							<th>Nilai AKhir</th>
							<th>Aksi</th>
						</tr>
						<?php
						$pendidikan = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar=$id_pelamar");
						$modal = 0;
						foreach ($pendidikan->result() as $key_pendidikan) {
							$id_pendidikan = $key_pendidikan->id_pendidikan;
							$jenjang = $key_pendidikan->jenjang_pendidikan;
							$institusi = $key_pendidikan->nama_institusi;
							$jurusan = $key_pendidikan->jurusan;
							$masuk = $key_pendidikan->tahun_masuk;
							$keluar = $key_pendidikan->tahun_keluar;
							$akhir = $key_pendidikan->nilai_akhir;
						?>
							<div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Hapus</h4>
										</div>
										<div class="modal-body">
											<p>Ingin hapus pendidikan <b><?php echo $jenjang ?></b> </p>
											<a href="<?php echo base_url('Pelamar/Pelamar/hapus_pendidikan/' . $id_pendidikan) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>

							<tr>
								<td><?php echo $jenjang ?></td>
								<td><?php echo $institusi ?></td>
								<td><?php echo $jurusan ?></td>
								<td><?php echo $masuk ?></td>
								<td><?php echo $keluar ?></td>
								<td><?php echo $akhir ?></td>
								<td>
									<a href="<?php echo base_url('Pelamar/Pelamar/ubahpendidikan/' . $id_pendidikan) ?>" class="btn btn-primary">Edit</a>
									<button data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger">Hapus</button>
								</td>
							</tr>
						<?php $modal++;
						} ?>
					</thead>
				</table>
			</div>
			<!-- <div style="text-align: right">
					<a href="<?php echo base_url('Pelamar/Pelamar/tambahpendidikan') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				</div> -->
			<!-- UNTUK REKRUTMEN RSUD KRIAN -->
			<?php if ($pendidikan->num_rows() <= 0) { ?>
				<div style="text-align: right">
					<a href="<?php echo base_url('Pelamar/Pelamar/tambahpendidikan') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				</div>
			<?php } ?>
		</div>
		<div class="col-sm-12">
			<h4><b>Riwayat Pendidikan Non Formal</b></h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Kursus/Pelatihan</th>
							<th>Tujuan Kursus/Pelatihan</th>
							<th>Nomor Sertifikat</th>
							<th>Tahun</th>
						</tr>
						<?php
						$pendidikannonformal = $this->db->query("SELECT * FROM tb_data_pendidikan_nonformal WHERE id_pelamar=$id_pelamar");
						$modal = 0;
						foreach ($pendidikannonformal->result() as $key_pendidikan_nonformal) {
							$id_pendidikan_nonformal = $key_pendidikan_nonformal->id_pendidikan_nonformal;
							$nama_pendidikan_nonformal = $key_pendidikan_nonformal->nama_pendidikan_nonformal;
							$tujuan_pendidikan_nonformal = $key_pendidikan_nonformal->tujuan_pendidikan_nonformal;
							$tahun_pendidikan_nonformal = $key_pendidikan_nonformal->tahun_pendidikan_nonformal;
							$nomor_sertifikat = $key_pendidikan_nonformal->nomor_sertifikat;
						?>
							<div class="modal fade" id="myModal3<?php echo $modal ?>" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Hapus</h4>
										</div>
										<div class="modal-body">
											<p>Ingin hapus pendidikan non formal <b><?php echo $nama_pendidikan_nonformal ?></b></p>
											<a href="<?php echo base_url('Pelamar/Pelamar/hapus_pendidikan_nonformal/' . $id_pendidikan_nonformal) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
										</div>
										<div class="modal-footer">
										</div>
									</div>
								</div>
							</div>

							<tr>
								<td><?php echo $nama_pendidikan_nonformal ?></td>
								<td><?php echo $tujuan_pendidikan_nonformal ?></td>
								<td><?php echo $nomor_sertifikat ?></td>
								<td><?php echo $tahun_pendidikan_nonformal ?></td>
								<td>
									<a href="<?php echo base_url('Pelamar/Pelamar/ubahpendidikannonformal/' . $id_pendidikan_nonformal) ?>" class="btn btn-primary">Edit</a>
									<button data-toggle="modal" data-target="#myModal3<?php echo $modal ?>" type="button" class="btn btn-danger">Hapus</button>
								</td>
							</tr>
						<?php $modal++;
						} ?>
					</thead>
				</table>
			</div>
			<div style="text-align: right">
				<a href="<?php echo base_url('Pelamar/Pelamar/tambahpendidikannonformal') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
			</div>
		</div>
	</div>

	<div class="col-sm-12" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
		<div class="col-sm-12">
			<h3><b>Data Pengalaman Kerja</b></h3>
			<hr color="black">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nama Perusahaan</th>
							<th>Periode</th>
							<th>Jabatan Akhir</th>
							<th>Alasan Keluar</th>
							<th>Nama Referensi</th>
							<th>NO Hp Referensi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$pengalaman = $this->db->query("SELECT * FROM tb_data_pengalaman_kerja WHERE id_pelamar = $id_pelamar");
						$modal = 0;
						foreach ($pengalaman->result() as $key_pengalaman) { ?>
							<div class="modal fade" id="myModal2<?php echo $modal ?>" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Hapus</h4>
										</div>
										<div class="modal-body">
											<p>Ingin hapus pengalaman di <b><?php echo $key_pengalaman->nama_perusahaan ?></b> </p>
											<a href="<?php echo base_url('Pelamar/Pelamar/hapus_pengalaman/' . $key_pengalaman->id_pengalaman) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
										</div>
										<div class="modal-footer">

										</div>
									</div>
								</div>
							</div>

							<tr>
								<td><?php echo $key_pengalaman->nama_perusahaan ?></td>
								<td><?php echo $key_pengalaman->periode ?></td>
								<td><?php echo $key_pengalaman->jabatan_akhir ?></td>
								<td><?php echo $key_pengalaman->alasan_keluar ?></td>
								<td><?php echo $key_pengalaman->nama_referensi ?></td>
								<td><?php echo $key_pengalaman->no_hp_referensi ?></td>
								<td>
									<a href="<?php echo base_url('Pelamar/Pelamar/ubahdatapengalamankerja/' . $key_pengalaman->id_pengalaman) ?>" class="btn btn-primary">Edit</a>
									<a data-toggle="modal" data-target="#myModal2<?php echo $modal ?>" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php $modal++;
						} ?>
					</tbody>
				</table>
			</div>
			<div style="text-align: right;">
				<a href="<?php echo base_url('Pelamar/Pelamar/tambahdatapengalamankerja') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
			</div>
		</div>
	</div>

	<!-- <div class="col-sm-12" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">
	<div class="col-sm-12">
		<h3><b>Upload Kelengkapan Berkas</b></h3>
		<hr color="black">
		<div class="form-group">
			<p>Kelengkapan berkas yang wajib diunggah:</p>
			<li>Scan Kartu Tanda Penduduk</li>
			<li>Pas foto berwarna terbaru</li>
			<li>Scan ijazah terakhir</li>
			<li>Scan transkrip nilai</li>
			<li>Scan sertifikat pendukung</li>
			<p>Semua berkas file dijadikan dalam satu file pdf</p>
			<input type="file">
		</div>
	</div>
</div> -->

</div>
<!--/.main-->

<?php $this->load->view('layout3/footer') ?>