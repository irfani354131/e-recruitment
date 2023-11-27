<?php
$this->load->view('layout/header');
$this->load->view('layout/sidebar');
$controller = 'Soal_tkb_bussiness_development';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Bank Soal TKB Bussiness Development Staff</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Bank Soal TKB Bussiness Development Staff</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Soal/' . $controller . '/tambah') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Soal</a>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_update')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_update') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_hapus')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_hapus') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr align="center">
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Opsi A</th>
                  <th>Opsi B</th>
                  <th>Opsi C</th>
                  <th>Opsi D</th>
                  <th>Opsi E</th>
                  <th>Kunci Jawaban</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                foreach ($array as $key) { ?>
                  <!-- HAPUS -->
                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ingin hapus pernyataan ini?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Soal/' . $controller . '/hapus/' . $key['id_soal']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="myModalEdit<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('Soal/' . $controller . '/edit/' . $key['id_soal']) ?>" method="POST">
                            <div class="form-group">
                              <label class="control-label">No Soal</label>
                              <input type="hidden" name="id_soal" value="<?php echo $key['id_soal'] ?>">
                              <input class="form-control" name="no_soal" type="number" required="required" value="<?php echo $key['no_soal'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Soal</label>
                              <textarea name="soal" class="ckeditor" id="ckeditor" rows="3"><?php echo $key['soal'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi A</label>
                              <input class="form-control" name="opsi_a" type="text" required="required" autocomplete="off" value="<?php echo $key['opsi_a'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi B</label>
                              <input class="form-control" name="opsi_b" type="text" required="required" autocomplete="off" value="<?php echo $key['opsi_b'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi C</label>
                              <input class="form-control" name="opsi_c" type="text" required="required" autocomplete="off" value="<?php echo $key['opsi_c'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi D</label>
                              <input class="form-control" name="opsi_d" type="text" required="required" autocomplete="off" value="<?php echo $key['opsi_d'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Opsi E</label>
                              <input class="form-control" name="opsi_e" type="text" required="required" autocomplete="off" value="<?php echo $key['opsi_e'] ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Jawaban</label>
                              <select class="form-control" name="jawaban" required="required">
                                <option value="A" <?php echo ($key['jawaban'] == 'A' ? 'selected="selected"' : ''); ?>>A</option>
                                <option value="B" <?php echo ($key['jawaban'] == 'B' ? 'selected="selected"' : ''); ?>>B</option>
                                <option value="C" <?php echo ($key['jawaban'] == 'C' ? 'selected="selected"' : ''); ?>>C</option>
                                <option value="D" <?php echo ($key['jawaban'] == 'D' ? 'selected="selected"' : ''); ?>>D</option>
                                <option value="D" <?php echo ($key['jawaban'] == 'E' ? 'selected="selected"' : ''); ?>>E</option>
                              </select>
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Edit" class="btn btn-primary">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['soal'] ?></td>
                    <td><?php echo $key['opsi_a'] ?></td>
                    <td><?php echo $key['opsi_b'] ?></td>
                    <td><?php echo $key['opsi_c'] ?></td>
                    <td><?php echo $key['opsi_d'] ?></td>
                    <td><?php echo $key['opsi_e'] ?></td>
                    <td><?php echo $key['jawaban'] ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="modal" data-target="#myModalEdit<?php echo $modal ?>" title="Edit" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        <button data-placement="bottom" title="Hapus" data-original-title="Hapus" data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                <?php $modal++;
                } ?>
              </tbody>
              <tfoot>
                <tr align="center">
                  <th>No</th>
                  <th>Pertanyaan </th>
                  <th>Opsi A</th>
                  <th>Opsi B</th>
                  <th>Opsi C</th>
                  <th>Opsi D</th>
                  <th>Opsi E</th>
                  <th>Kunci Jawaban</th>
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