<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <?php foreach ($array as $key ) {
        $pelamar = $this->db->query("SELECT * FROM tb_data_diri");
        foreach ($pelamar->result() as $key_pelamar) {
          if ($key_pelamar->id_pelamar==$key['id_pelamar']) { 
            $pelamar = $key_pelamar->nama_pelamar;?>
            <h1><i class="fa fa-th-list"></i> Detail data diri <b><?php echo $pelamar ?></b></h1>
          <?php } ?> 
        <?php } ?>
      <?php } ?>  
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Detail Data Diri</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <?php
          foreach ($array as $key) {
            // $sessionLowongan = $this->session->userdata('ses_lowongan');
           ?>
            <!-- <a href="<?php echo base_url('Administrator/Data_lowongan/detail_lowongan/'.$sessionLowongan) ?>" class="btn btn-danger">Kembali</a> -->
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pelamar/'.$key['id_pelamar']) ?>" class="btn btn-primary">Data Diri</a>
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pendidikan</a>
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pendidikan_non/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pendidikan Non Formal</a>
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_keluarga/'.$key['id_pelamar']) ?>" class="btn btn-primary">Data Keluarga</a>
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_pengalaman/'.$key['id_pelamar']) ?>" class="btn btn-primary">Pengalaman Kerja</a>
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_motlet/'.$key['id_pelamar']) ?>" class="btn btn-primary">Motivation Letter</a>
            <a href="<?php echo base_url('Pelamar/Data_pelamar/detail_berkas/'.$key['id_pelamar']) ?>" class="btn btn-primary">Berkas</a>
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                <tbody>
                  <tr>
                    <th>NIK</th>
                    <td><?php echo $key['nik'] ?></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td><?php echo $key['nama_pelamar'] ?></td>
                  </tr>
                  <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <?php $tgl_lahir = $key['tanggal_lahir']; ?>
                    <td><?php echo $key['tempat_lahir'] ?>, <?php echo date("d F Y", strtotime($tgl_lahir)) ?></td>
                  </tr>
                  <tr>
                    <th>Usia</th>
                    <?php 
                    $tgl = strtotime($key['tanggal_lahir']);
                    // $tgl = strtotime($tanggal_lahir);
                    $current_time = time();

                    $age_years = date('Y', $current_time) - date('Y',$tgl);
                    $age_months = date('m', $current_time) - date('m',$tgl);
                    $age_days = date('d', $current_time) - date('d',$tgl);
                    if ($age_days<0) {
                      $days_in_month = date('t',$current_time);
                      $age_months--;
                      $age_days= $days_in_month+$age_days;
                    }

                    if ($age_months<0) {
                      $age_years--;
                      $age_months = 12+$age_months;
                    }

                    ?>
                    <td><?php echo $age_years ?> tahun, <?php echo $age_months ?> bulan, <?php echo $age_days ?> hari</td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $key['jenis_kelamin'] ?></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td><?php echo $key['agama'] ?></td>
                  </tr>
                  <tr>
                    <th>Alamat Sesuai KTP</th>
                    <td><?php echo $key['alamat_ktp'] ?></td>
                  </tr>
                  <tr>
                    <th>Alamat Domisili</th>
                    <td><?php echo $key['alamat'] ?></td>
                  </tr>

                  <tr>
                    <th>Status Perkawinan</th>
                    <td><?php echo $key['status_perkawinan'] ?></td>
                  </tr>
                  <tr>
                    <th>Anak Ke</th>
                    <td><?php echo $key['anak_ke'] ?> dari <?php echo $key['dari_x_sdr'] ?> bersaudara</td>
                  </tr>
                  <tr>
                    <th>No Hp</th>
                    <td><?php echo $key['no_hp'] ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <?php
                    $email = $this->db->query("SELECT * FROM tb_pelamar");
                    foreach ($email->result() as $key_email) {
                      if ($key_email->id_pelamar==$key['id_pelamar']) { 
                        $email_pelamar = $key_email->email;?>
                      <?php } ?> 
                    <?php } ?>
                    <td><?php echo $email_pelamar ?></td>
                  </tr>
                  <tr>
                    <th>Facebook (isi dengan Url)</th>
                    <td><?php echo $key['facebook'] ?></td>
                  </tr>
                  <tr>
                    <th>Instagram</th>
                    <td><?php echo $key['instagram'] ?></td>
                  </tr>
                  <tr>
                    <th>Twitter</th>
                    <td><?php echo $key['twitter'] ?></td>
                  </tr>
                   <tr>
                    <th>Linkedln </th>
                    <td><?php echo $key['linkedin'] ?></td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>