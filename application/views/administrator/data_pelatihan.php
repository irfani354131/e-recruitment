<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Master Pelatihan/Talent Test</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Pelatihan/Talent Test</a></li>
    </ul>
  </div>
  <div class="modal fade" id="myModaltambah" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('Administrator/Data_Pelatihan/tambahmaster') ?>" method="post">
            <div class="mb-3">
              <label for="Inputnama" class="form-label"><b>Nama Pelatihan / Talent Test</b></label>
              <input type="text" class="form-control" id="Inputnama" aria-describedby="namaHelp" name="nama_pelatihan">
            </div>
            <div class="mb-3">
              <label for="Inputno" class="form-label"><b>Tanggal Pelaksanaan</b></label>
              <input class="form-control" id="Inputno" aria-describedby="noHelp" name="tanggal_pelatihan" type="date">
            </div>
            <div class="mb-3">
              <label for="Select" class="form-label"><b>Jenis</b></label>
              <select id="Select" class="form-control" name="jenis">
                <option value="talent">Talent</option>
                <option value="pelatihan">Pelatihan</option>
              </select>
            </div>
            <div class="form-group">
                  <label class="control-label">STATUS : </label>
                  <input class="form-input" type="checkbox" value="aktif" name="status">
                </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a data-toggle="modal" data-target="#myModaltambah" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Data</a>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg_success')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_success');
              $this->session->set_flashdata('msg_success'); ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_update')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_update');
              $this->session->set_flashdata('msg_update'); ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_delete')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_delete');
              $this->session->set_flashdata('msg_delete'); ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_error')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_error');
              $this->session->set_flashdata('msg_error'); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pelatihan / Talent Test</th>
                  <th>Tanggal Pelaksanaan</th>
                  <th>Jenis</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                $array = $this->db->query("SELECT * FROM tb_pelatihan")->result_array();
                foreach ($array as $key) {
                ?>
                  <div class="modal fade" id="ModalHapus<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus <b><?php echo $key['nama_pelatihan'] ?> </b>?</p>
                          <p>Menghapus pelatihan / talent test ini akan menghapus semua data yang berkaitan dengan data tersebut.</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Data_Pelatihan/hapusmaster/' . $key['id_pelatihan']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="ModalEdit<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('Administrator/Data_Pelatihan/editmaster')?>" method="post">
                            <div class="mb-3">
                              <label for="Inputnama" class="form-label"><b>Nama Pelatihan / Talent Test</b></label>
                              <input type="text" class="form-control" id="Inputnama" aria-describedby="namaHelp" name="nama_pelatihan" value="<?= $key['nama_pelatihan'] ?>">
                              <input type="hidden" class="form-control" aria-describedby="namaHelp" name="id_pelatihan" value="<?= $key['id_pelatihan'] ?>">
                            </div>
                            <div class="mb-3">
                              <label for="Inputno" class="form-label"><b>Tanggal Pelaksanaan</b></label>
                              <input class="form-control" id="Inputno" aria-describedby="noHelp" name="tanggal_pelatihan" type="date" value="<?= $key['tanggal_pelatihan'] ?>">
                            </div>
                            <div class="mb-3">
                              <label for="Select" class="form-label"><b>Jenis</b></label>
                              <select id="Select" class="form-control" name="jenis">
                                <option <?php if($key['jenis']=='talent'){echo 'selected';};?> value="talent">Talent</option>
                                <option <?php if($key['jenis']=='pelatihan'){echo 'selected';};?>value="pelatihan">Pelatihan</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="control-label">STATUS : </label>
                              <input class="form-input" type="checkbox" value="aktif" name="status" <?php if($key['status']=='aktif'){echo 'checked';}?>>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-warning">Edit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                          </form>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['nama_pelatihan'] ?></td>
                    <td><?php echo $key['tanggal_pelatihan'] ?></td>
                    <td><?php echo $key['jenis'] ?></td>
                    <td><?php echo $key['status'] ?></td>

                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      &nbsp;<button data-placement="bottom" data-original-title="Hapus" data-toggle="modal" data-target="#ModalEdit<?php echo $modal ?>" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                        &nbsp;<button data-placement="bottom" data-original-title="Hapus" data-toggle="modal" data-target="#ModalHapus<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>


                      </div>
                    </td>
                  </tr>
                <?php $modal++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>