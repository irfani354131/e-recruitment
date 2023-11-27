<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Bank Soal CFIT</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Bank Soal CFIT</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Soal/Soal_cfit/tambahdata') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Soal</a>
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
                <tr align="center">
                  <th>No</th>
                  <th>Soal</th>
                  <th>Subtes Ke-</th>
                  <th>Opsi A</th>
                  <th>Opsi B</th>
                  <th>Opsi C</th>
                  <th>Opsi D</th>
                  <th>Opsi E</th>
                  <th>Opsi F</th>
                  <th>Jawaban</th>
                  <th>Jawaban Ke 2</th>
                  <th>Type Soal</th>
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
                          <p>Ingin hapus Soal Ini? Jika menghapus soal ini maka semua gambar jawaban akan hilang</p>
                          <a href="<?php echo base_url('Soal/Soal_cfit/hapus_cfit/'.$key['id_soal']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div> 
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <!-- soal -->
                    <td><img width="100" src="<?php echo ($key['soal'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['soal']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>

                    
                    <td><?php echo $key['subtes'] ?></td>
                    <!-- jawaban -->
                    <td><img width="100" src="<?php echo ($key['opsi_a'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['opsi_a']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>
                    <td><img width="100" src="<?php echo ($key['opsi_b'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['opsi_b']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>
                    <td><img width="100" src="<?php echo ($key['opsi_c'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['opsi_c']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>
                    <td><img width="100" src="<?php echo ($key['opsi_d'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['opsi_d']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>
                    <td><img width="100" src="<?php echo ($key['opsi_e'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['opsi_e']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>
                    <td><img width="100" src="<?php echo ($key['opsi_f'] != '' ? base_url('./upload/bank_soal/cfit/' . $key['opsi_f']) : base_url('./upload/bank_soal/img_default.png')); ?>"></td>


                    <td><?php echo $key['jawaban'] ?></td>
                    <td><?php echo $key['jawaban2'] ?></td>
                    <td><?php echo $key['type_soal'] ?></td>
                    
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" type="button" class="btn btn-warning"><a style="color: #fff" href="<?php echo base_url('Soal/Soal_cfit/edit_cfit/'.$key['id_soal']) ?>"><i class="fa fa-edit"></i></a></button>
                        <button data-placement="bottom" title="" data-original-title="Hapus" data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                  <?php $modal++; } ?>
                </tbody>
                <tfoot>
                <tr align="center">
                  <th>No</th>
                  <th>Soal</th>
                  <th>Subtes Ke-</th>
                  <th>Opsi A</th>
                  <th>Opsi B</th>
                  <th>Opsi C</th>
                  <th>Opsi D</th>
                  <th>Opsi E</th>
                  <th>Opsi F</th>
                  <th>Jawaban</th>
                  <th>Jawaban Ke 2</th>
                  <th>Type Soal</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php $this->load->view('layout/footer'); ?>