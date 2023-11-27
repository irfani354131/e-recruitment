<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Detail Berkas Pelamar <b><?php echo $pelamar ?></b></h1>

    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Detail Berkas Pelamar</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <?php

          if (!$array2) {
            //the value is null
            echo "Data belum diisi oleh pelamar";
          } else {
            // foreach ($array as $key) {
            //   $berkas = $key['berkas'];

          ?>


            <div style="margin-bottom: 3%;">
              <!-- ?> -->
              <!-- 
                 $sessionLowongan = $this->session->userdata('ses_lowongan');
                 <a href="<?php echo base_url('Administrator/Data_lowongan/detail_lowongan/' . $sessionLowongan) ?>" class="btn btn-danger">Kembali</a> -->
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pelamar/' . $id_pelamar) ?>" class="btn btn-primary">Data Diri</a>
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan/' . $id_pelamar) ?>" class="btn btn-primary">Pendidikan</a>
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan_non/' . $id_pelamar) ?>" class="btn btn-primary">Pendidikan Non Formal</a>
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_keluarga/' . $id_pelamar) ?>" class="btn btn-primary">Data Keluarga</a>
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pengalaman/' . $id_pelamar) ?>" class="btn btn-primary">Pengalaman Kerja</a>
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_motlet/' . $id_pelamar) ?>" class="btn btn-primary">Motivation Letter</a>
              <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_berkas/' . $id_pelamar) ?>" class="btn btn-primary">Berkas</a>
            </div>
            <div align="center">
              <embed type="application/pdf" width="90%" height="600" src="<?php echo base_url('./upload/berkas_pelamar/merge-' . $nama_pelamar . '.pdf') ?>"></embed>
            </div>
          <?php
            // }
          } ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>