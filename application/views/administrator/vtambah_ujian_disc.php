<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Tambah Data</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Ujian DISC</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ujian DISC</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Data_ujian/tambahdata_disc') ?>" method="post">

            <div class="form-group">
              <label class="control-label">Nama Ujian</label>
              <input class="form-control" name="nama_ujian" type="text">
            </div>

            <div class="form-group">
              <label class="control-label">Waktu Mulai</label>
              <input class="form-control time" name="waktu_mulai" type="text">
            </div>

            <div class="form-group">
              <label class="control-label">Waktu Berakhir</label>
              <input class="form-control time" name="waktu_akhir" type="text">
            </div>

            <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('ses_nama'); ?>">

            <input style="margin-top: 15px" type="submit" value="Kirim" class="btn btn-primary">
            <a style="margin-top: 15px" href="<?php echo base_url('Administrator/Data_ujian/ujian_disc') ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>


<?php $this->load->view('layout/footer') ?>