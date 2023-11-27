<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> CFIT</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Manage CFIT</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Manage CFIT</h3>
        <div class="tile-body">
          <div id="notifikasi">
            <?php if ($this->session->flashdata('msg')) : ?>
              <div class="alert alert-primary">
                <?php echo $this->session->flashdata('msg') ?>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('msg_update')) : ?>
              <div class="alert alert-primary">
                <?php echo $this->session->flashdata('msg_update') ?>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('msg_hapus')) : ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('msg_hapus') ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="tile-body">

            <?php
            $modal = 0;
            $no = 1;
            $id_admin = $this->session->userdata('ses_id');
            foreach ($array as $key) {
              $nama_ujian = $key['nama_ujian'];
              $query = $this->db->query("SELECT * FROM tb_admin where id_admin = $id_admin");

            ?>

              <form action="<?php echo base_url('Administrator/Data_ujian/updatecfit') ?>" method="post">

                <div class="form-group">
                  <label class="control-label">Nama Ujian</label>
                  <input class="form-control" name="nama_ujian" value="<?php echo $key['nama_ujian'] ?>" type="text" required>
                </div>

                <div class="form-group">
                  <label class="control-label">Waktu Mulai</label>
                  <input class="form-control time" name="waktu_mulai" value="<?php echo $key['waktu_dimulai'] ?>" type="text" required>
                </div>

                <div class="form-group">
                  <label class="control-label">Waktu Seluruh Latihan (Sub tes 1 - Sub tes 4) Menit</label>
                  <input class="form-control" name="waktu_latihan" value="<?php echo (strtotime($key['end_lat_sub1']) - strtotime($key['start_lat_sub1'])) / 60 ?>" type="text" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Waktu Ujian Sub Tes 1 (Menit)</label>
                  <input class="form-control" name="waktu_ujiansubtes1" value="<?php echo (strtotime($key['end_uji_sub1']) - strtotime($key['start_uji_sub1'])) / 60 ?>" type="text" required>
                  <?php echo date("H:i:s", strtotime($key['start_uji_sub1'])) ?> - <?php echo date("H:i:s", strtotime($key['end_uji_sub1'])) ?>
                </div>
                <div class="form-group">
                  <label class="control-label">Waktu Ujian Sub Tes 2 (Menit)</label>
                  <input class="form-control" name="waktu_ujiansubtes2" value="<?php echo (strtotime($key['end_uji_sub2']) - strtotime($key['start_uji_sub2'])) / 60 ?>" type="text" required>
                  <?php echo date("H:i:s", strtotime($key['start_uji_sub2'])) ?> - <?php echo date("H:i:s", strtotime($key['end_uji_sub2'])) ?>
                </div>
                <div class="form-group">
                  <label class="control-label">Waktu Ujian Sub Tes 3 (Menit)</label>
                  <input class="form-control" name="waktu_ujiansubtes3" value="<?php echo (strtotime($key['end_uji_sub3']) - strtotime($key['start_uji_sub3'])) / 60 ?>" type="text" required>
                  <?php echo date("H:i:s", strtotime($key['start_uji_sub3'])) ?> - <?php echo date("H:i:s", strtotime($key['end_uji_sub3'])) ?>
                </div>
                <div class="form-group">
                  <label class="control-label">Waktu Ujian Sub Tes 4 (Menit)</label>
                  <input class="form-control" name="waktu_ujiansubtes4" value="<?php echo (strtotime($key['end_uji_sub4']) - strtotime($key['start_uji_sub4'])) / 60 ?>" type="text" required>
                  <?php echo date("H:i:s", strtotime($key['start_uji_sub4'])) ?> - <?php echo date("H:i:s", strtotime($key['end_uji_sub4'])) ?>
                </div>
                <div class="form-group">
                  <label class="control-label">Waktu Berakhir</label>
                  <input class="form-control" value="<?php echo $key['waktu_berakhir'] ?>" type="text" readonly>
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

        </div>
      </div>
    </div>
</main>


<?php $this->load->view('layout/footer') ?>