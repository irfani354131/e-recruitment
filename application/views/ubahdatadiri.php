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



	<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px;">

		<div class="col-sm-12">

			<h4 style="margin-bottom: 2%;"><b>Ubah Data Diri</b></h4>

			<form action="<?php echo base_url('Pelamar/Pelamar/ubahdatadiri/' . $data[0]['id_pelamar']) ?>" method="post">

				<div class="form-row">

					<div class="form-group col-sm-12">

						<label for="inputNama">Nama Lengkap</label>

						<input type="hidden" name="id_pelamar" value="<?php echo $data[0]['id_pelamar'] ?>">

						<input required="required" type="text" class="form-control" name="nama_pelamar" value="<?php echo $data[0]['nama_pelamar'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="inputNik">NIK</label>

						<input type="number" class="form-control" name="nik" value="<?php echo $data[0]['nik'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="inputTempatlahir">Tempat Lahir</label>

						<input required="required" type="text" class="form-control" name="tempat_lahir" value="<?php echo $data[0]['tempat_lahir'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="calendar">Tanggal Lahir</label>

						<input required="required" type="text" id="datepicker" class="form-control" name="tgl_lahir" value="<?php echo $data[0]['tanggal_lahir'] ?>">

					</div>

					<div class="form-check form-check-inline col-sm-12 form-check">

						<div class="col-12">

							<label for="jenisKelamin">Jenis Kelamin</label>

						</div>

						<input required="required" class="form-check-input" type="radio" name="gender" value="L" <?php if ($data[0]['jenis_kelamin'] == "L") { ?> checked="checked" <?php } ?>> Laki-Laki

						<input required="required" class="form-check-input" type="radio" name="gender" value="P" <?php if ($data[0]['jenis_kelamin'] == "P") { ?> checked="checked" <?php } ?>> Perempuan

					</div>

					<div class="form-group col-sm-12">

						<label for="agama">Agama</label>

						<select name="agama" class="form-control form-control-lg" required="required">

							<?php $agama = $data[0]['agama'] ?>

							<option value="">--== Pilih Agama ==--</option>

							<option value="Islam" <?php echo ($agama == "Islam" ? "selected" : "") ?>>Islam</option>

							<option value="Hindu" <?php echo ($agama == "Hindu" ? "selected" : "") ?>>Hindu</option>

							<option value="Budha" <?php echo ($agama == "Budha" ? "selected" : "") ?>>Budha</option>

							<option value="Kristen Protestan" <?php echo ($agama == "Kristen Protestan" ? "selected" : "") ?>>Kristen Protestan</option>

							<option value="Katolik" <?php echo ($agama == "Katolik" ? "selected" : "") ?>>Katolik</option>

							<option value="Kong Hu Cu" <?php echo ($agama == "Kong Hu Cu" ? "selected" : "") ?>>Kong Hu Cu</option>

							<option value="Lainnya" <?php echo ($agama == "Lainnya" ? "selected" : "") ?>>Lainnya</option>

						</select>

					</div>

					<div class="form-group col-sm-12">

						<label for="alamat_ktp">Alamat Sesuai KTP</label>

						<input required="required" type="text" class="form-control" name="alamat_ktp" value="<?php echo $data[0]['alamat_ktp'] ?>">

					</div>

					<div class="form-group col-sm-12">

			      <label for="alamat">Alamat Domisili</label>

			      <input required="required" type="text" class="form-control" name="alamat" value="<?php echo $data[0]['alamat'] ?>">

			    </div>

                 <!-- RSUD KRIAN -->

					<!-- <div class="form-group col-sm-12">

						<label for="alamat">Alamat Domisili</label>

						<select name="alamat" class="form-control form-control-lg" required="required">

							<?php $alamat = $data[0]['alamat'] ?>

							<option value="">--== Pilih Domisili ==--</option>

							<option value="Kec. Krian" <?php echo ($alamat == "Kec. Krian" ? "selected" : "") ?>>Kec. Krian</option>

							<option value="Luar Kec. Krian" <?php echo ($alamat == "Luar Kec. Krian" ? "selected" : "") ?>>Luar Kec. Krian (Kab. Sidoarjo)</option>

							<option value="Diluar Kab. Sidoarjo" <?php echo ($alamat == "Diluar Kab. Sidoarjo" ? "selected" : "") ?>>Diluar Kab. Sidoarjo</option>

						</select>

					</div> -->

								    <!-- <div class="form-group col-sm-12">

			      <label for="status_perkawinan">Status Perkawinan</label>

			      <input type="text" class="form-control" name="status_perkawinan" value="<?php echo $data[0]['status_perkawinan'] ?>">

			    </div> -->

               

					<div class="form-group col-sm-12">

						<label for="status_perkawinan">Status Perkawinan</label>

						<select required="required" name="status_perkawinan" class="form-control form-control-lg">

							<?php $status_perkawinan = $data[0]['status_perkawinan'] ?>

							<option value="">--== Pilih Status Perkawinan ==--</option>

							<option value="Belum Menikah" <?php echo ($status_perkawinan == "Belum Menikah" ? "selected" : "") ?>>Belum Menikah</option>

							<option value="Sudah Menikah" <?php echo ($status_perkawinan == "Sudah Menikah" ? "selected" : "") ?>>Sudah Menikah</option>

						</select>

					</div>

					<div class="form-group col-sm-12">

						<label for="anak_ke">Anak ke</label>

						<input required="required" type="number" class="form-control" name="anak_ke" value="<?php echo $data[0]['anak_ke'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="dari_x_sdr">Dari berapa bersaudara</label>

						<input required="required" type="number" class="form-control" name="dari_x_sdr" value="<?php echo $data[0]['dari_x_sdr'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="noHp">Nomor WA Aktif</label>

						<input required="required" type="number" class="form-control" name="no_hp" value="<?php echo $data[0]['no_hp'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="akunFb">Akun Facebook (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

						<input required="required" type="text" class="form-control" name="facebook" value="<?php echo $data[0]['facebook'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="akunIg">Akun Instagram (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

						<input required="required" type="text" class="form-control" name="instagram" value="<?php echo $data[0]['instagram'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="akunTwtitter">Akun Twitter (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

						<input required="required" type="text" class="form-control" name="twitter" value="<?php echo $data[0]['twitter'] ?>">

					</div>

					<div class="form-group col-sm-12">

						<label for="akunLkdn">Akun Linkedln (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

						<input required="required" type="text" class="form-control" name="linkedin" value="<?php echo $data[0]['linkedin'] ?>">

					</div>

				</div>

				<div class="col-sm-12">

					<input type="submit" value="Simpan" class="btn btn-blue">

					<a href="<?php echo base_url('Pelamar/Pelamar/profilawal') ?>" class="btn btn-danger mr-2 mb-2">Batal</a>

				</div>

			</form>



		</div>

	</div>



</div>

<!--/.main-->



<?php $this->load->view('layout3/footer') ?>