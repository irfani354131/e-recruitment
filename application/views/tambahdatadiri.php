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



    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px">

        <div class="col-sm-12">

            <h4 style="margin-bottom: 2%;"><b>Isi Data Diri</b></h4>

            <form action="<?php echo base_url('Pelamar/Pelamar/tambahdatadiri/') ?>" method="post">

                <div class="form-row">

                    <div class="form-group col-sm-12">

                        <label for="inputNama">Nama Lengkap</label>

                        <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">

                        <input type="text" class="form-control" name="nama_pelamar">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="inputNik">NIK</label>

                        <input type="number" class="form-control" name="nik" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="inputTempatlahir">Tempat Lahir</label>

                        <input type="text" class="form-control" name="tempat_lahir" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="calendar">Tanggal Lahir</label>

                        <input type="text" id="datepicker" class="form-control" autocomplete="off" name="tgl_lahir" required="required">

                    </div>

                    <div class="form-check form-check-inline col-sm-12 form-check">

                        <div class="col-12">

                            <label for="jenisKelamin">Jenis Kelamin</label>

                        </div>

                        <input class="form-check-input" type="radio" name="gender" value="L"> Laki-Laki

                        <input class="form-check-input" type="radio" name="gender" value="P"> Perempuan

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="agama">Agama</label>

                        <select name="agama" class="form-control form-control-lg" required="required">

                            <option value="">--== Pilih Agama ==--</option>

                            <option value="Islam">Islam</option>

                            <option value="Hindu">Hindu</option>

                            <option value="Budha">Budha</option>

                            <option value="Kristen Protestan">Kristen Protestan</option>

                            <option value="Katolik">Katolik</option>

                            <option value="Kong Hu Cu">Kong Hu Cu</option>

                            <option value="Lainnya">Lainnya</option>

                        </select>

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="alamat_ktp">Alamat Sesuai KTP</label>

                        <input type="text" class="form-control" name="alamat_ktp" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="alamat">Alamat Domisili</label>

                        <input type="text" class="form-control" name="alamat" required="required">

                    </div>

                    <!-- RSUD KRIAN -->

                    <!-- <div class="form-group col-sm-12">

						<label for="alamat">Alamat Domisili</label>

						<select name="alamat" class="form-control form-control-lg" required="required">

							<option value="">--== Pilih Domisili ==--</option>

							<option value="Kec. Krian">Kec. Krian</option>

							<option value="Luar Kec. Krian">Luar Kec. Krian (Kab. Sidoarjo)</option>

							<option value="Diluar Kab. Sidoarjo">Diluar Kab. Sidoarjo</option>

						</select>

					</div> -->

                    <!-- 			    <div class="form-group col-sm-12">

			      <label for="status_perkawinan">Status Perkawinan</label>

			      <input type="text" class="form-control" name="status_perkawinan" >

			    </div> -->

                    <div class="form-group col-sm-12">

                        <label for="status_perkawinan">Status Perkawinan</label>

                        <select name="status_perkawinan" class="form-control form-control-lg" required="required">

                            <option value="">--== Pilih Status Perkawinan ==--</option>

                            <option value="Belum Menikah">Belum Menikah</option>

                            <option value="Sudah Menikah">Sudah Menikah</option>

                        </select>

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="anak_ke">Anak ke</label>

                        <input type="number" class="form-control" name="anak_ke" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="dari_x_sdr">Dari berapa bersaudara</label>

                        <input type="number" class="form-control" name="dari_x_sdr" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="noHp">Nomor WA Aktif</label>

                        <input type="number" class="form-control" name="no_hp" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="akunFb">Akun Facebook (Url)<small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

                        <input type="text" class="form-control" name="facebook" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="akunIg">Akun Instagram (Url) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

                        <input type="text" class="form-control" name="instagram" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="akunTwtitter">Akun Twitter (Url) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

                        <input type="text" class="form-control" name="twitter" required="required">

                    </div>

                    <div class="form-group col-sm-12">

                        <label for="akunlkdn">Akun Linkedln (Url)<small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>

                        <input type="text" class="form-control" name="linkedin" required="required">

                    </div>

                    <!-- <div class="form-group col-sm-12">

				  <label for="foto">Upload Pas Foto</label>

				  <input type="file" class="form-control-file" name="berkas" >

				 </div> -->

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