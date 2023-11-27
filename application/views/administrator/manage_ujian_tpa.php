<?php $this->load->view('layout/header2'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">

  <div class="app-title">

    <div>

      <h1><i class="fa fa-th-list"></i> Bank Soal TPA</h1>

    </div>

    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

      <li class="breadcrumb-item">User</li>

      <li class="breadcrumb-item"><a href="#">Bank Soal TPA</a></li>

    </ul>

  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="tile">

        <div id="notifikasi">

          <?php if ($this->session->flashdata('msg')) : ?>

            <div class="alert alert-primary">

              <?php echo $this->session->flashdata('msg') ?>

            </div>

          <?php endif; ?>


        </div>

        <div class="tile-body">

          <ul class="nav nav-tabs">

            <li class="active"><a data-toggle="tab" href="#seksi1"><b>Verbal</b></a></li>
            <li><a data-toggle="tab" href="#seksi2"><b>Kuantitatif</b></a></li>
            <li><a data-toggle="tab" href="#seksi3"><b>Penalaran</b></a></li>

          </ul>

          <div class="tab-content">
            <div id="seksi1" class="tab-pane fade in active">
              <br>
              <?php
              $modal = 0;
              $no = 1;
              $id_admin = $this->session->userdata('ses_id');
              foreach ($array1 as $key) {
                $nama_ujian = $key['nama_ujian'];
                $query = $this->db->query("SELECT * FROM tb_admin where id_admin = $id_admin");

              ?>

                <form action="<?php echo base_url('Administrator/Data_ujian/updatetpa1') ?>" method="post">

                  <div class="form-group">
                    <label class="control-label">Nama Ujian</label>
                    <input class="form-control" name="nama_ujian" value="<?php echo $key['nama_ujian'] ?>" type="text" required>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Waktu Mulai</label>
                    <input class="form-control time" name="waktu_mulai" value="<?php echo $key['waktu_mulai'] ?>" type="text" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Ujian (Menit)</label>
                    <input class="form-control" name="waktu_ujian" value="<?php echo (strtotime($key['waktu_akhir']) - strtotime($key['waktu_mulai'])) / 60 ?>" type="text" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Berakhir</label>
                    <input class="form-control" value="<?php echo $key['waktu_akhir'] ?>" type="text" readonly>
                  </div>
                  <div class="form-group">
                    <label class="control-label">TPA jenis panjang : </label>
                    <input class="form-input" type="checkbox" value="aktif" name="tpa_panjang" <?php if ($key['tpa_panjang'] == "aktif") {
                                                                                                  echo "checked";
                                                                                                } ?>>
                  </div>
                  <div class="form-group">
                    <label class="control-label">STATUS : </label>
                    <input class="form-input" type="checkbox" value="aktif" name="status" <?php if ($key['status'] == "aktif") {
                                                                                            echo "checked";
                                                                                          } ?>>
                  </div>
                  <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('ses_nama'); ?>">
                  <input style="margin-top: 15px" type="submit" value="Perbarui" class="btn btn-primary">
                </form>
              <?php
              } ?>
            </div>
            <div id="seksi2" class="tab-pane fade in">
              <br>
              <?php
              $modal = 0;
              $no = 1;
              $id_admin = $this->session->userdata('ses_id');
              foreach ($array2 as $key) {
                $nama_ujian = $key['nama_ujian'];
                $query = $this->db->query("SELECT * FROM tb_admin where id_admin = $id_admin");

              ?>

                <form action="<?php echo base_url('Administrator/Data_ujian/updatetpa2') ?>" method="post">

                  <div class="form-group">
                    <label class="control-label">Nama Ujian</label>
                    <input class="form-control" name="nama_ujian" value="<?php echo $key['nama_ujian'] ?>" type="text" required>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Waktu Mulai</label>
                    <input class="form-control time" name="waktu_mulai" value="<?php echo $key['waktu_mulai'] ?>" type="text" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Ujian (Menit)</label>
                    <input class="form-control" name="waktu_ujian" value="<?php echo (strtotime($key['waktu_akhir']) - strtotime($key['waktu_mulai'])) / 60 ?>" type="text" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Berakhir</label>
                    <input class="form-control" value="<?php echo $key['waktu_akhir'] ?>" type="text" readonly>
                  </div>
                  <div class="form-group">
                    <label class="control-label">TPA jenis panjang : </label>
                    <input class="form-input" type="checkbox" value="aktif" name="tpa_panjang" <?php if ($key['tpa_panjang'] == "aktif") {
                                                                                                  echo "checked";
                                                                                                } ?>>
                  </div>
                  <div class="form-group">
                    <label class="control-label">STATUS : </label>
                    <input class="form-input" type="checkbox" value="aktif" name="status" <?php if ($key['status'] == "aktif") {
                                                                                            echo "checked";
                                                                                          } ?>>
                  </div>
                  <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('ses_nama'); ?>">
                  <input style="margin-top: 15px" type="submit" value="Perbarui" class="btn btn-primary">
                </form>
              <?php
              } ?>
            </div>
            <div id="seksi3" class="tab-pane fade in">
              <br>
              <?php
              $modal = 0;
              $no = 1;
              $id_admin = $this->session->userdata('ses_id');
              foreach ($array3 as $key) {
                $nama_ujian = $key['nama_ujian'];
                $query = $this->db->query("SELECT * FROM tb_admin where id_admin = $id_admin");

              ?>

                <form action="<?php echo base_url('Administrator/Data_ujian/updatetpa3') ?>" method="post">

                  <div class="form-group">
                    <label class="control-label">Nama Ujian</label>
                    <input class="form-control" name="nama_ujian" value="<?php echo $key['nama_ujian'] ?>" type="text" required>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Waktu Mulai</label>
                    <input class="form-control time" name="waktu_mulai" value="<?php echo $key['waktu_mulai'] ?>" type="text" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Ujian (Menit)</label>
                    <input class="form-control" name="waktu_ujian" value="<?php echo (strtotime($key['waktu_akhir']) - strtotime($key['waktu_mulai'])) / 60 ?>" type="text" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Waktu Berakhir</label>
                    <input class="form-control" value="<?php echo $key['waktu_akhir'] ?>" type="text" readonly>
                  </div>
                  <div class="form-group">
                    <label class="control-label">TPA jenis panjang : </label>
                    <input class="form-input" type="checkbox" value="aktif" name="tpa_panjang" <?php if ($key['tpa_panjang'] == "aktif") {
                                                                                                  echo "checked";
                                                                                                } ?>>
                  </div>
                  <div class="form-group">
                    <label class="control-label">STATUS : </label>
                    <input class="form-input" type="checkbox" value="aktif" name="status" <?php if ($key['status'] == "aktif") {
                                                                                            echo "checked";
                                                                                          } ?>>
                  </div>
                  <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('ses_nama'); ?>">
                  <input style="margin-top: 15px" type="submit" value="Perbarui" class="btn btn-primary">
                </form>
              <?php
              } ?>
            </div>

</main>


<?php $this->load->view('layout/footer') ?>