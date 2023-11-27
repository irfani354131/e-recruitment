<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Data Motivation Letter</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Motivation Letter</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Administrator/Data_motlet/tambahdata') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Data</a>
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
                  <th>Perusahaan</th>
                  <th>Jenis Motivation Letter</th>
                  <th>Soal</th>
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
                          <p>Ingin hapus soal <?php echo $key['soal_motlet'] ?>?</p>
                          <a href="<?php echo base_url('Administrator/Data_motlet/hapus_motlet/'.$key['id_soal']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div> 
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <?php $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
                    foreach ($perusahaan->result() as $key_perusahaan) {
                      if ($key_perusahaan->id_perusahaan==$key['id_perusahaan']) { ?>
                        <td><?php echo $key_perusahaan->nama_perusahaan ?></td>
                      <?php } ?>
                    <?php } ?>
                    <!-- <td><?php echo $key['jenis_motlet'] ?></td> -->
                    <?php $jenis = $this->db->query("SELECT * FROM tb_jenis_motlet");
                    foreach ($jenis->result() as $key_jenis) {
                      if ($key_jenis->id_jenis_motlet==$key['id_jenis_motlet']) { ?>
                        <td><?php echo $key_jenis->jenis_motlet ?></td>
                      <?php } ?>
                    <?php } ?>
                    <td><?php echo $key['soal_motlet'] ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example"> 
                       <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" type="button" class="btn btn-warning"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_motlet/edit_lowongan/'.$key['id_soal']) ?>"><i class="fa fa-edit"></i></a></button>
                       <button data-placement="bottom" data-original-title="Hapus" data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                     </div>
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