<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Bank Soal IST</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Bank Soal IST</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <!-- Tambah -->
        <div class="modal fade" id="modalTambah" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('Soal/soal_ist/tambahdata2') ?>" method="post">
                  <div class="form-group">
                    <label class="control-label">No Soal</label>
                    <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" >
                  </div>
                  <div class="form-group">
                    <label class="control-label">Soal IST</label>
                    <input type="text" name="soal_ist class="form-control" autocomplete="off" >
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 1</label>
                    <input type="text" name="opsi_1" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 2</label>
                    <input type="text" name="opsi_2" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 3</label>
                    <input type="text" name="opsi_3" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 4</label>
                    <input type="text" name="opsi_4" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 5</label>
                    <input type="text" name="opsi_5" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 6</label>
                    <input type="text" name="opsi_6" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 7</label>
                    <input type="text" name="opsi_7" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 8</label>
                    <input type="text" name="opsi_8" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 9</label>
                    <input type="text" name="opsi_9" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Opsi 10</label>
                    <input type="text" name="opsi_10" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Jawaban</label>
                    <input type="text" name="jawaban" class="form-control" required="required" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Subtes</label>
                    <input type="text" name="subtes" class="form-control" required="required" autocomplete="off">
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div> 

        <button style="margin-bottom: 2%; margin-top: 2%" data-toggle="modal" data-target="#modalTambah" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>

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
                  <th>Opsi 1</th>
                  <th>Opsi 2</th>
                  <th>Opsi 3</th>
                  <th>Opsi 4</th>
                  <th>Opsi 5</th>
                  <th>Opsi 6</th>
                  <th>Opsi 7</th>
                  <th>Opsi 8</th>
                  <th>Opsi 9</th>
                  <th>Opsi 10</th>
                  <th>Jawaban</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0; $no = 1;
                foreach ($ist as $key) { ?>
                  <!-- Edit -->

                  <!-- Tambah -->
                  <div class="modal fade" id="myModalEdit<?php echo $modal?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('Soal/soal_ist/editist2/'.$key['id_soal']) ?>" method="post">
                            <div class="form-group">
                              <label class="control-label">No Soal</label>
                              <input type="hidden" name="id_soal" value="<?php echo $key
                              ['id_soal'] ?>">
                              <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?php echo $key['nomor_soal'] ?>" readonly>
                            </div>
                           <div class="form-group">
                              <label class="control-label">Soal IST</label>
                              <input type="text" name="soal_ist" class="form-control" autocomplete="off" value="<?php echo $key['soal'] ?>" >
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 1</label>
                              <input type="text" name="opsi_a" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_1'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 2</label>
                              <input type="text" name="opsi_b" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_2'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 3</label>
                              <input type="text" name="opsi_c" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_3'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 4</label>
                              <input type="text" name="opsi_d" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_4'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 5</label>
                              <input type="text" name="opsi_e" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_5'] ?>">
                            </div>
                             <div class="form-group">
                              <label class="control-label">Opsi 6</label>
                              <input type="text" name="opsi_a" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_6'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 7</label>
                              <input type="text" name="opsi_b" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_7'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 8</label>
                              <input type="text" name="opsi_c" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_8'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 9</label>
                              <input type="text" name="opsi_d" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_9'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi 10</label>
                              <input type="text" name="opsi_e" class="form-control" required="required" autocomplete="off" value="<?php echo $key['opsi_10'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Jawaban</label>
                              <input type="text" name="jawaban" class="form-control" required="required" autocomplete="off" value="<?php echo $key['jawaban'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Subtes</label>
                              <input type="text" name="subtes" class="form-control" required="required" autocomplete="off" value="<?php echo $key['subtes'] ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                          </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div> 

                  <!-- Hapus -->
                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ingin hapus Soal Ini?</p>
                          <a href="<?php echo base_url('Soal/soal_ist/hapus/'.$key['id_soal']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END HAPUS -->



                  <tr>
                    <td><?php echo $no++ ?></td>
                    <!-- soal -->
                    <td><?php echo $key['soal'] ?></td>
                    <td><?php echo $key['subtes'] ?></td>
                    <!-- jawaban -->
                    <td><?php echo $key['opsi_1'] ?></td>
                    <td><?php echo $key['opsi_2'] ?></td>
                    <td><?php echo $key['opsi_3'] ?></td>
                    <td><?php echo $key['opsi_4'] ?></td>
                    <td><?php echo $key['opsi_5'] ?></td>
                    <td><?php echo $key['opsi_6'] ?></td>
                    <td><?php echo $key['opsi_7'] ?></td>
                    <td><?php echo $key['opsi_8'] ?></td>
                    <td><?php echo $key['opsi_9'] ?></td>
                    <td><?php echo $key['opsi_10'] ?></td>


                    <td><?php echo $key['jawaban'] ?></td>
                    
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-placement="bottom" title="" data-original-title="Hapus" data-toggle="modal" data-target="#myModalEdit<?php echo $modal ?>" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button>

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
                    <th>Opsi 1</th>
                    <th>Opsi 2</th>
                    <th>Opsi 3</th>
                    <th>Opsi 4</th>
                    <th>Opsi 5</th>
                    <th>Opsi 6</th>
                    <th>Opsi 7</th>
                    <th>Opsi 8</th>
                    <th>Opsi 9</th>
                    <th>Opsi 10</th>
                    <th>Jawaban</th>
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