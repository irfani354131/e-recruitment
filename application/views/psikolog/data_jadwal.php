<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-calendar-check-o"></i> Jadwal Seleksi</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Jadwal Seleksi</a></li>
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
                  <th>Posisi Jabatan</th>
                  <th>Nama Perusahaan</th>
                  <th>Jadwal Tes Tulis</th>
                  <th>Jadwal Tes Wawancara</th>
                  <th>Jadwal Tes FGD</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0; $no = 1;
                foreach ($array as $key) {
                  $lowongan = $key['id_lowongan'];
                  $nmLowongan = $this->db->query("SELECT * FROM tb_lowongan");
                  $namaPer = $this->db->query("SELECT * FROM tb_perusahaan");

                  foreach ($nmLowongan->result() as $key_per) {
                    $idLowong = $key_per->id_lowongan;
                    $idPerus = $key_per->id_perusahaan;
                    if ($idLowong==$key['id_lowongan']) {
                      $namaJabatan = $key_per->nama_jabatan;
                      foreach ($namaPer->result() as $keyNama) {
                        if ($idPerus==$keyNama->id_perusahaan) {
                          $nmPerusahaan =  $keyNama->nama_perusahaan;
                        }
                      } 
                    }
                  } ?>

                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ingin hapus jadwal tes lowongan <b><?php echo $namaJabatan ?></b> pada perusahaan <b><?php echo $nmPerusahaan ?></b>?</p>
                          <a href="<?php echo base_url('Administrator/Data_jadwal/hapus_jadwal/'.$key['id_jadwal']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div> 
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $namaJabatan ?></td>
                    <td><?php echo $nmPerusahaan ?></td>
                    <td><?php echo date('d F Y', strtotime($key['tes_tulis'])) ?></td>
                    <td><?php echo date('d F Y', strtotime($key['tes_wawancara'])) ?></td>
                    <td><?php echo date('d F Y', strtotime($key['test_fgd'])) ?></td>
                    
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