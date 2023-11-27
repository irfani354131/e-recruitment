<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <?php foreach ($array as $key ) {
        $lowongan = $this->db->query("SELECT * FROM tb_lowongan");
        foreach ($lowongan->result() as $key_lowongan) {
          if ($key_lowongan->id_lowongan==$key['id_lowongan']) { 
            $lowongan1 = $key_lowongan->nama_jabatan;?>
          <?php } ?> 
        <?php } ?>
      <?php } ?>  
            <h1><i class="fa fa-th-list"></i> Data Pelamar Lowongan</b></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Detail Lowongan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div id="notifikasi">
          <?php if($this->session->flashdata('msg')):?>
            <div class="alert alert-primary">
              <?php  echo $this->session->flashdata('msg')?>
            </div>
          <?php endif ;?>
          <?php if($this->session->flashdata('msg_update')):?>
            <div class="alert alert-primary">
              <?php  echo $this->session->flashdata('msg_update')?>
            </div>
          <?php endif ;?>
          <?php if($this->session->flashdata('msg_hapus')):?>
            <div class="alert alert-danger">
              <?php  echo $this->session->flashdata('msg_hapus')?>
            </div>
          <?php endif ;?>
        </div> 
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelamar</th>
                  <th>Status Lamaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0; $no = 1;
                foreach ($array as $key) { ?>

                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ingin hapus <?php echo $key['nama_jabatan'] ?>?</p>
                          <a href="<?php echo base_url('Administrator/Data_lowongan/hapus_lowongan/'.$key['id_lowongan']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div> 
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <?php $pelamar = $this->db->query("SELECT * FROM tb_data_diri");
                    foreach ($pelamar->result() as $key_pelamar) {
                      if ($key_pelamar->id_pelamar==$key['id_pelamar']) { ?>
                        <td><?php echo $key_pelamar->nama_pelamar ?></td>
                      <?php } ?>
                    <?php } ?>

                    <?php 
                    if ($key['status_lamaran'] == "Belum ada tindakan"){
                      $badges = 'badge badge-pill badge-warning';
                    }  
                    else if ($key['status_lamaran'] == "Tidak lolos") {
                      $badges = 'badge badge-pill badge-danger';
                    } else{
                      $badges = 'badge badge-pill badge-primary';
                    }
                    ?>

                    <td><span class="<?php echo $badges ?>"><?php echo $key['status_lamaran'] ?></span></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                       <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Data Pelamar" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Pelamar/Data_pelamar/detail_pelamar/'.$key['id_pelamar']) ?>"><i class="fa fa-eye"></i></a></button> <!-- 
                       <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Terima Lamaran" type="button" class="btn btn-success"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/terima_pelamar/'.$key['id_apply'])?>"><i class="fa fa-check"></i></a></button>
                       <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tolak Lamaran" type="button" class="btn btn-danger"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/tolak_pelamar/'.$key['id_apply'])?>"><i class="fa fa-times"></i></a></button> -->
                    </td>
                  </tr>
                  <?php $modal++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php $this->load->view('layout/footer'); ?>