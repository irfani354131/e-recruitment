<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>

<?php
$id_pelamar = $this->session->userdata('ses_id');
$id_lowongan = $this->session->userdata('sesIdLowongan');
$tb_apply = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar=$id_pelamar AND id_lowongan=$id_lowongan")->result();
$tb_lowongan = $this->db->query("SELECT * FROM tb_lowongan WHERE id_lowongan=$id_lowongan")->result();
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
          <em class="fa fa-envelope color-amber"></em>
        </a></li>
      <li class="active">Tes Tulis dan Tes Psikotes</li>
    </ol>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tes Tulis dan Tes Psikotes</h1>
    </div>
  </div>
  <!--/.row-->

  <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
    <div class="col-sm-12">
      <h3><b>Daftar Ujian</b></h3>
      <hr color="black">
    </div>
    <div class="col-sm-12" style="margin-bottom: 5px;">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td><b>No</b></td>
            <td><b>Jenis Tes</b></td>
            <td><b>Tanggal Dibuka</b></td>
            <td><b>Tanggal Ditutup</b></td>
            <td><b>Aksi</b></td>
          </tr>
          <tr>
            <?php
            $no = 1;
            foreach ($array as $key) {
              if ($key['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
                <td><?php echo $no++; ?></td>
                <td><?php echo $key['nama_ujian']; ?></td>
                <td><?php echo date('d F Y H:i:s', strtotime($key['waktu_dimulai'])) ?> WIB</td>
                <td><?php echo date('d F Y H:i:s', strtotime($key['waktu_berakhir'])) ?> WIB</td>
                <td>

                  <?php
                  date_default_timezone_set("Asia/Jakarta");
                  if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key['waktu_dimulai']))) {
                    echo "belum dimulai";
                  } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key['waktu_dimulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key['waktu_berakhir']))) { ?>
                    <a href="<?php echo base_url('Pelamar/Pelamar/cfit/' . $id_pelamar . '/' . $key['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
                  <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key['waktu_berakhir']))) {
                    echo "Ujian sudah berakhir";
                  } ?>
                </td>
          </tr>

      <?php }
            } ?>
      <!-- ist -->
      <tr>
        <?php
        $cek_khusus = $this->db->query("SELECT * FROM tb_ujian_ist")->result();
        $khusus = $cek_khusus[0]->khusus;
        foreach ($ist as $key_ist) {
          if ($key_ist['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
            <td><?php echo $no++; ?></td>
            <td><?php echo $key_ist['nama_ujian']; ?></td>
            <?php if ($khusus == 'aktif') { ?>
              <td><?php
                  $wkt_start = date('d F Y H:i:s', strtotime($cek_khusus[0]->start_lat_sub5));
                  echo date('d F Y H:i:s', strtotime($cek_khusus[0]->start_lat_sub5));
                  ?> WIB</td>
              <td><?php
                  $wkt_stop = date('d F Y H:i:s', strtotime($cek_khusus[0]->end_uji_sub6));
                  echo date('d F Y H:i:s', strtotime($cek_khusus[0]->end_uji_sub6));
                  ?> WIB</td>
            <?php } else { ?>
              <td><?php
                  $wkt_start = date('d F Y H:i:s', strtotime($key_ist['waktu_dimulai']));
                  echo date('d F Y H:i:s', strtotime($key_ist['waktu_dimulai']));
                  ?> WIB</td>
              <td><?php
                  $wkt_stop = date('d F Y H:i:s', strtotime($key_ist['waktu_berakhir']));
                  echo date('d F Y H:i:s', strtotime($key_ist['waktu_berakhir']));
                  ?> WIB</td>
            <?php } ?>
            <td>

              <?php
              date_default_timezone_set("Asia/Jakarta");
              if (date('d F Y H:i:s') < $wkt_start) {
                echo "belum dimulai";
              } elseif (date('d F Y H:i:s') >= $wkt_start && date('d F Y H:i:s') <= $wkt_stop) { ?>
                <?php if ($khusus == 'aktif') {
                  $this->session->set_userdata('ses_ujian', $key_ist['id_ujian']);
                ?>
                  <a href="<?php echo base_url('Pelamar/Ujian/latihan_ist5_2/') ?>" class="btn btn-primary">Kerjakan Sekarang</a>
                <?php } else { ?>
                  <a href="<?php echo base_url('Pelamar/Pelamar/ist/' . $id_pelamar . '/' . $key_ist['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
                <?php } ?>
              <?php } elseif (date('d F Y H:i:s') > $wkt_stop) {
                echo "Ujian sudah berakhir";
              } ?>
            </td>
      </tr>
  <?php }
        } ?>

 <!-- Papi -->
  <tr>
    <?php
    foreach ($papi as $key_papi) {
      if ($key_papi['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
        <td><?php echo $no++; ?></td>
        <td><?php echo $key_papi['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_papi['waktu_mulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_papi['waktu_akhir'])) ?> WIB</td>
        <td>

          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_papi['waktu_mulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_papi['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_papi['waktu_akhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Ujian/panduan_papi/' . $id_pelamar . '/' . $key_papi['id_ujian_papi']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_papi['waktu_akhir']))) {
            echo "Ujian sudah berakhir";
          } ?>
        </td>
  </tr>
<?php   }
    } ?>

<!-- holland -->
<tr>
  <?php
  foreach ($holland as $key_holland) {
    if ($key_holland['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_holland['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_holland['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_holland['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_holland['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_holland['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_holland['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_holland/' . $id_pelamar . '/' . $key_holland['id_ujian_holland']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_holland['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>


<!--disc-->

<tr>
  <?php
  foreach ($disc as $key_disc) {
    if ($key_disc['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_disc['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_disc['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_disc['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_disc['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_disc['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_disc['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_disc/' . $id_pelamar . '/' . $key_disc['id_ujian_disc']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_disc['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>


<!-- Essay -->
<tr>
  <?php
  foreach ($essay as $key_essay) {
    if ($key_essay['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_essay['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_essay['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_essay['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_essay['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_essay['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_essay['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_essay/' . $id_pelamar . '/' . $key_essay['id_ujian_essay']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_essay['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- Hitung -->
<tr>
  <?php
  foreach ($hitung as $key_hitung) {
    if ($key_hitung['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_hitung['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_hitung['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_hitung['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_hitung['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_hitung['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_hitung['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_hitung/' . $id_pelamar . '/' . $key_hitung['id_ujian_hitung']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_hitung['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- Studi -->
<tr>
  <?php
  foreach ($studi as $key_studi) {
    if ($key_studi['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_studi['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studi['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studi['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_studi['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_studi['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_studi['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_studi/' . $id_pelamar . '/' . $key_studi['id_ujian_studi']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_studi['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>


<!-- Studi Manajerial -->
<tr>
  <?php
  foreach ($studi_manajerial as $key_studi_manajerial) {
    if ($key_studi_manajerial['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_studi_manajerial['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studi_manajerial['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studi_manajerial['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_studi_manajerial['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_studi_manajerial['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_studi_manajerial['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_studi_manajerial/' . $id_pelamar . '/' . $key_studi['id_ujian_studi']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_studi_manajerial['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>
  
  <!-- Studi LDG -->
<tr>
  <?php
  foreach ($studi_ldg as $key_studi_ldg) {
    if ($key_studi_ldg['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_studi_ldg['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studi_ldg['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studi_ldg['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_studi_ldg['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_studi_ldg['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_studi_ldg['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_studi_ldg/' . $id_pelamar . '/' . $key_studi['id_ujian_studi']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_studi_ldg['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- Leadership -->

<tr>
  <?php
  foreach ($leader as $key_leader) {
    if ($key_leader['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_leader['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_leader['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_leader['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_leader['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_leader['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_leader['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_leadership/' . $id_pelamar . '/' . $key_leader['id_ujian_leadership']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_leader['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>


<!-- Msdt -->

<tr>
  <?php
  foreach ($msdt as $key_msdt) {
    if ($key_msdt['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_msdt['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_msdt['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_msdt['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_msdt['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_msdt['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_msdt['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/panduan_msdt/' . $id_pelamar . '/' . $key_msdt['id_ujian_msdt']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_msdt['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<?php $jk = $this->db->query("SELECT * FROM tb_data_diri where id_pelamar=$id_pelamar")->result();
if ($jk[0]->jenis_kelamin == "L") {
?>
  <!-- rmib_pria -->
  <tr>
    <?php
    foreach ($rmib_pria as $key_rmib_pria) {
      if ($key_rmib_pria['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
        <td><?php echo $no++; ?></td>
        <td><?php echo $key_rmib_pria['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_rmib_pria['waktu_mulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_rmib_pria['waktu_akhir'])) ?> WIB</td>
        <td>

          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_rmib_pria['waktu_mulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_rmib_pria['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_rmib_pria['waktu_akhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Ujian/ujian_rmib_pria/' . $id_pelamar . '/' . $key_rmib_pria['id_ujian_rmib_pria']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_rmib_pria['waktu_akhir']))) {
            echo "Ujian sudah berakhir";
          } ?>
        </td>
  </tr>
<?php   }
    } ?>
<?php } else { ?>
  <!-- rmib_wanita -->
  <tr>
    <?php
    foreach ($rmib_wanita as $key_rmib_wanita) {
      if ($key_rmib_wanita['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
        <td><?php echo $no++; ?></td>
        <td><?php echo $key_rmib_wanita['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_rmib_wanita['waktu_mulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_rmib_wanita['waktu_akhir'])) ?> WIB</td>
        <td>

          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_rmib_wanita['waktu_mulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_rmib_wanita['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_rmib_wanita['waktu_akhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Ujian/ujian_rmib_wanita/' . $id_pelamar . '/' . $key_rmib_wanita['id_ujian_rmib_wanita']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_rmib_wanita['waktu_akhir']))) {
            echo "Ujian sudah berakhir";
          } ?>
        </td>
  </tr>
<?php   }
    } ?>
<?php } ?>
<!-- Studi Kasus Bank -->
<tr>
  <?php
  foreach ($studibank as $key_studibank) {
    if ($key_studibank['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_studibank['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studibank['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_studibank['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_studibank['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_studibank['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_studibank['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_studibank/' . $id_pelamar . '/' . $key_studibank['id_ujian_studibank']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_studibank['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- Talent -->
<tr>
  <?php
  foreach ($talent as $key_talent) {
    if ($key_talent['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_talent['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_talent['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_talent['waktu_akhir'])) ?> WIB</td>
      <td>

        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_talent['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_talent['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_talent['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_talent/' . $id_pelamar . '/' . $key_talent['id_ujian_talent']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_talent['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- Bahasa Inggris -->
<tr>
  <?php
  $inggris = $this->db->query("SELECT * FROM tb_ujian_inggris")->result_array();
  foreach ($inggris as $key_inggris) {
    if ($key_inggris['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_inggris['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_inggris['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_inggris['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_inggris['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_inggris['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_inggris['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/panduan_inggris/' . $id_pelamar . '/' . $key_inggris['id_ujian_inggris']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_inggris['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- TKB Accounting Staff -->
<tr>
  <?php
  $tkb_accounting = $this->db->query("SELECT * FROM tb_ujian_tkb_accountingstaff")->result_array();
  foreach ($tkb_accounting as $key_tkb_accounting) {
    if ($key_tkb_accounting['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tkb_accounting['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_accounting['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_accounting['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tkb_accounting['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tkb_accounting['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tkb_accounting['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tkb_accounting/' . $id_pelamar . '/' . $key_tkb_accounting['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tkb_accounting['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>
<!-- TKB Bussiness Development Staff -->
<tr>
  <?php
  $tkb_bussinessdevelopment = $this->db->query("SELECT * FROM tb_ujian_tkb_bussinessdevelopmentstaff")->result_array();
  foreach ($tkb_bussinessdevelopment as $key_tkb_bussinessdevelopment) {
    if ($key_tkb_bussinessdevelopment['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tkb_bussinessdevelopment['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_bussinessdevelopment['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_bussinessdevelopment['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tkb_bussinessdevelopment['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tkb_bussinessdevelopment['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tkb_bussinessdevelopment['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tkb_bussinessdevelopment/' . $id_pelamar . '/' . $key_tkb_bussinessdevelopment['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tkb_bussinessdevelopment['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- TKB Training Operation Staff -->
<tr>
  <?php
  $tkb_trainingoperation = $this->db->query("SELECT * FROM tb_ujian_tkb_trainingoperationstaff")->result_array();
  foreach ($tkb_trainingoperation as $key_tkb_trainingoperation) {
    if ($key_tkb_trainingoperation['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tkb_trainingoperation['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_trainingoperation['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_trainingoperation['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tkb_trainingoperation['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tkb_trainingoperation['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tkb_trainingoperation['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tkb_trainingoperation/' . $id_pelamar . '/' . $key_tkb_trainingoperation['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tkb_trainingoperation['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>
<!-- TKB Bussiness Development Staff -->
<tr>
  <?php
  $tkb_projectadministration = $this->db->query("SELECT * FROM tb_ujian_tkb_projectadministrationstaff")->result_array();
  foreach ($tkb_projectadministration as $key_tkb_projectadministration) {
    if ($key_tkb_projectadministration['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tkb_projectadministration['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_projectadministration['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_projectadministration['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tkb_projectadministration['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tkb_projectadministration['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tkb_projectadministration['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tkb_projectadministration/' . $id_pelamar . '/' . $key_tkb_projectadministration['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tkb_projectadministration['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>
  <!-- TKB Frontliner Staff -->
<tr>
  <?php
  $tkb_frontliner = $this->db->query("SELECT * FROM tb_ujian_tkb_frontlinerstaff")->result_array();
  foreach ($tkb_frontliner as $key_tkb_frontliner) {
    if ($key_tkb_frontliner['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tkb_frontliner['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_frontliner['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tkb_frontliner['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tkb_frontliner['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tkb_frontliner['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tkb_frontliner['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/start_ujian_tkb_frontliner/' . $id_pelamar . '/' . $key_tkb_frontliner['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tkb_frontliner['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- TPA VERBAL-->
<tr>
  <?php
  $tpa = $this->db->query("SELECT * FROM tb_ujian_tpa_verbal")->result_array();
  foreach ($tpa as $key_tpa) {
    if ($key_tpa['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tpa['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/panduan_tpa1/' . $id_pelamar . '/' . $key_tpa['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- TPA Kuantitatif-->
<tr>
  <?php
  $tpa = $this->db->query("SELECT * FROM tb_ujian_tpa_kuantitatif")->result_array();
  foreach ($tpa as $key_tpa) {
    if ($key_tpa['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tpa['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/panduan_tpa2/' . $id_pelamar . '/' . $key_tpa['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- TPA Penalaran-->
<tr>
  <?php
  $tpa = $this->db->query("SELECT * FROM tb_ujian_tpa_penalaran")->result_array();
  foreach ($tpa as $key_tpa) {
    if ($key_tpa['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_tpa['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_tpa['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/panduan_tpa3/' . $id_pelamar . '/' . $key_tpa['id_ujian']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_tpa['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- Kontrak Psikologis-->
<tr>
  <?php
  $kontrak_psikologis = $this->db->query("SELECT * FROM tb_ujian_kontrak_psikologis")->result_array();
  foreach ($kontrak_psikologis as $key_kontrak_psikologis) {
    if ($key_kontrak_psikologis['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
      <td><?php echo $no++; ?></td>
      <td><?php echo $key_kontrak_psikologis['nama_ujian']; ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_kontrak_psikologis['waktu_mulai'])) ?> WIB</td>
      <td><?php echo date('d F Y H:i:s', strtotime($key_kontrak_psikologis['waktu_akhir'])) ?> WIB</td>
      <td>
        <?php
        date_default_timezone_set("Asia/Jakarta");
        if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_kontrak_psikologis['waktu_mulai']))) {
          echo "belum dimulai";
        } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_kontrak_psikologis['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_kontrak_psikologis['waktu_akhir']))) { ?>
          <a href="<?php echo base_url('Pelamar/Ujian/ujian_kontrak_psikologis/' . $id_pelamar . '/' . $key_kontrak_psikologis['id_ujian_kontrak_psikologis']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
        <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_kontrak_psikologis['waktu_akhir']))) {
          echo "Ujian sudah berakhir";
        } ?>
      </td>
</tr>
<?php   }
  } ?>

<!-- BELBIN -->
    <tr>
        <?php
        $belbin = $this->db->query("SELECT * FROM tb_ujian_belbin")->result_array();
        foreach ($belbin as $key_belbin) {
          if ($key_belbin['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
            <td><?php echo $no++; ?></td>
        <td><?php echo $key_belbin['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_belbin['waktu_dimulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_belbin['waktu_berakhir'])) ?> WIB</td>
        <td>

          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_belbin['waktu_dimulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_belbin['waktu_dimulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_belbin['waktu_berakhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Pelamar/belbin/' . $id_pelamar . '/' . $key_belbin['id_ujian_belbin']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_belbin['waktu_berakhir']))) {
            echo "Ujian sudah berakhir";
          } ?>                            
        </td>
  </tr>
<?php   }
    } ?>
    <!-- GRAFIS 1-->
  <tr>
        <?php
        $grafis = $this->db->query("SELECT * FROM tb_ujian_grafis")->result_array();
        foreach ($grafis as $key_grafis) {
          if ($key_grafis['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
            <td><?php echo $no++; ?></td>
        <td><?php echo $key_grafis['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_grafis['waktu_dimulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_grafis['waktu_berakhir'])) ?> WIB</td>
        <td>

          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_grafis['waktu_dimulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_grafis['waktu_dimulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_grafis['waktu_berakhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Pelamar/grafis/' . $id_pelamar . '/' . $key_grafis['id_ujian_grafis']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_grafis['waktu_berakhir']))) {
            echo "Ujian sudah berakhir";
          } ?>                            
        </td>
  </tr>
<?php   }
    } ?>

 <!-- GRAFIS 2-->
  <tr>
        <?php
        $grafis = $this->db->query("SELECT * FROM tb_ujian_grafis2")->result_array();
        foreach ($grafis2 as $key_grafis2) {
          if ($key_grafis2['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
            <td><?php echo $no++; ?></td>
        <td><?php echo $key_grafis2['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_grafis2['waktu_dimulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key_grafis2['waktu_berakhir'])) ?> WIB</td>
        <td>

          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key_grafis2['waktu_dimulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key_grafis2['waktu_dimulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key_grafis2['waktu_berakhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Pelamar/grafis2/' . $id_pelamar . '/' . $key_grafis2['id_ujian_grafis']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key_grafis2['waktu_berakhir']))) {
            echo "Ujian sudah berakhir";
          } ?>                            
        </td>
  </tr>
<?php   }
    } ?>
 

<!-- EPPS -->
<tr>
  <?php
  $datadiri = $this->db->query("SELECT * FROM tb_data_pendidikan where id_pelamar='$id_pelamar'")->result();
  $a = $datadiri[0]->jenjang_pendidikan;
  // echo $a;
  $epps1 = $this->db->query("SELECT * FROM tb_ujian_epps where kategori=2")->result_array();
  $epps2 = $this->db->query("SELECT * FROM tb_ujian_epps where kategori=1")->result_array();
  if ($a == "D3" || $a == "D4/S1" || $a == "S2" || $a == "S3") {
    foreach ($epps2 as $key) {
      if ($key['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
        <td><?php echo $no++; ?></td>
        <td><?php echo $key['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key['waktu_mulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key['waktu_akhir'])) ?> WIB</td>
        <td>
          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key['waktu_mulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key['waktu_akhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Ujian/panduan_epps/' . $id_pelamar . '/' . $key['id_ujian_epps']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key['waktu_akhir']))) {
            echo "Ujian sudah berakhir";
          } ?>
        </td>
      <?php   }
    }
  } else {
    foreach ($epps1 as $key) {
      if ($key['status'] == "aktif" && $tb_lowongan[0]->status == "tersedia" && $tb_apply[0]->status_lamaran == 'Diterima' && $tb_apply[0]->status_ujian == 'aktif') { ?>
        <td><?php echo $no++; ?></td>
        <td><?php echo $key['nama_ujian']; ?></td>
        <td><?php echo date('d F Y H:i:s', strtotime($key['waktu_mulai'])) ?> WIB</td>
        <td><?php echo date('d F Y H:i:s', strtotime($key['waktu_akhir'])) ?> WIB</td>
        <td>
          <?php
          date_default_timezone_set("Asia/Jakarta");
          if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key['waktu_mulai']))) {
            echo "belum dimulai";
          } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key['waktu_mulai'])) && date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key['waktu_akhir']))) { ?>
            <a href="<?php echo base_url('Pelamar/Ujian/panduan_epps/' . $id_pelamar . '/' . $key['id_ujian_epps']) ?>" class="btn btn-primary">Kerjakan Sekarang</a>
          <?php } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key['waktu_akhir']))) {
            echo "Ujian sudah berakhir";
          } ?>
        </td>
  <?php   }
    }
  } ?>
</tr>

        </tbody>
      </table>
    </div>
  </div>

</div>
<!--/.main-->

<?php $this->load->view('layout3/footer') ?>