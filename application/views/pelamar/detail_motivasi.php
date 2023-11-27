<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <?php

      if(!$array)
      {

        ?>
        <h1><i class="fa fa-th-list"></i> Data Pengalaman </h1>

      <?php } 
      else
      {

       foreach ($array as $key ) {
        $id = $key['id_pelamar'];
        $pelamar = $this->db->query("SELECT * FROM tb_data_diri");
        foreach ($pelamar->result() as $key_pelamar) {
          if ($key_pelamar->id_pelamar==$key['id_pelamar']) { 
            $pelamar = $key_pelamar->nama_pelamar;
            ?>
          <?php } } } } ?> 
          <h1><i class="fa fa-th-list"></i> Detail Pengalaman <b><?php echo $pelamar ?></b></h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item"><a href="#">Data Detail Pengalaman</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php

              if(!$array)

              {
            //the value is null
               echo "Data belum diisi oleh pelamar";
             }
             else
               { ?>
                <div style="margin-bottom: 3%;">
                 
<!-- 
                 $sessionLowongan = $this->session->userdata('ses_lowongan');
                 <a href="<?php echo base_url('Administrator/Data_lowongan/detail_lowongan/'.$sessionLowongan) ?>" class="btn btn-danger">Kembali</a> -->
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pelamar/'.$key['id_pelamar']) ?>" class="btn btn-primary">Data Diri</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pendidikan</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan_non/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pendidikan Non Formal</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_keluarga/'.$key['id_pelamar']) ?>" class="btn btn-primary">Data Keluarga</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pengalaman/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pengalaman Kerja</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_motlet/'.$key['id_pelamar']) ?>" class="btn btn-primary">Motivation Letter</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_berkas/'.$key['id_pelamar']) ?>" class="btn btn-primary">Berkas</a>
               </div>
               <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <!-- <th>No</th> -->
                    <th>Soal</th>
                    <th>Jawaban</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($array as $key)
                  {
                    $jawaban1 = $key['jawaban_soal'];
                    $jawaban2 = $key['jawaban_soal2'];
                  }
                  ?>
                  <div class="table-responsive">
                    <tr>
                      <td>1. Jelaskan secara rinci mengenai impian dan target yang Anda miliki khususnya terkait dengan pencapaian karir dan kehidupan pribadi Anda pada JANGKA PENDEK (1 tahun kedepan)</td>
                      <td><?php echo $jawaban1 ?></td>
                    </tr>

                    <tr>
                      <td>2. Jelaskan secara rinci mengenai impian dan target yang Anda miliki khususnya terkait dengan pencapaian karir dan kehidupan pribadi Anda pada JANGKA MENENGAH (3 tahun mendatang)</td>
                      <td><?php echo $jawaban2 ?></td>
                    </tr>
                  </tbody>
                </table>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php $this->load->view('layout/footer'); ?>