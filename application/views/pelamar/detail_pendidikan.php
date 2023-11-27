<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <?php

      if(!$array)
      {

        ?>
        <h1><i class="fa fa-th-list"></i> Detail Pendidikan </h1>

      <?php } 
      else
      {

       foreach ($array as $key ) {
        $pelamar = $this->db->query("SELECT * FROM tb_data_diri");
        foreach ($pelamar->result() as $key_pelamar) {
          if ($key_pelamar->id_pelamar==$key['id_pelamar']) { 
            $pelamar = $key_pelamar->nama_pelamar;
            ?>
          <?php } } } } ?> 
          <h1><i class="fa fa-th-list"></i> Detail Pendidikan <b><?php echo $pelamar ?></b></h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item"><a href="#">Data Detail Pendidikan</a></li>
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
             {
              $no = 1;
              foreach ($array as $key)
              {
                ?>
                <div style="margin-bottom: 3%;">
                 <!-- ?> -->
                 <!-- $sessionLowongan = $this->session->userdata('ses_lowongan'); -->
                 <!-- <a href="<?php echo base_url('Administrator/Data_lowongan/detail_lowongan/'.$sessionLowongan) ?>" class="btn btn-danger">Kembali</a> -->
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pelamar/'.$key['id_pelamar']) ?>" class="btn btn-primary">Data Diri</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pendidikan</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan_non/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pendidikan Non Formal</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_keluarga/'.$key['id_pelamar']) ?>" class="btn btn-primary">Data Keluarga</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pengalaman/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pengalaman Kerja</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_motlet/'.$key['id_pelamar']) ?>" class="btn btn-primary">Motivation Letter</a>
                 <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_berkas/'.$key['id_pelamar']) ?>" class="btn btn-primary">Berkas</a>
               </div>
               <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenjang Pendidikan</th>
                      <th>Nama Institusi</th>
                      <th>Jurusan</th>
                      <th>Tahun Masuk</th>
                      <th>Tahun Keluar</th>
                      <th>Nilai Akhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $key['jenjang_pendidikan'] ?></td>
                      <td><?php echo $key['nama_institusi'] ?></td>
                      <td><?php echo $key['jurusan'] ?></td>
                      <td><?php echo $key['tahun_masuk'] ?></td>
                      <td><?php echo $key['tahun_keluar'] ?></td>
                      <td><?php echo $key['nilai_akhir'] ?></td>
                    </tr>

                  <?php }} ?>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php $this->load->view('layout/footer'); ?>