<?php $this->load->view('layout/header2'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">

  <div class="app-title">

    <div>

      <h1><i class="fa fa-th-list"></i> Bank Soal TPA</h1>

    </div>

    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

      <li class="breadcrumb-item">User</li>

      <li class="breadcrumb-item"><a href="#">Bank Soal TPA</a></li>

    </ul>

  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="tile">

        <div id="notifikasi">

          <?php if ($this->session->flashdata('msg') != '') : ?>

            <div class="alert alert-primary">

              <?php echo $this->session->flashdata('msg') ?>

            </div>

          <?php endif; ?>

          <?php if ($this->session->flashdata('msg_hapus') != '') : ?>

            <div class="alert alert-danger">

              <?php echo $this->session->flashdata('msg_hapus') ?>

            </div>

          <?php endif; ?>

        </div>
        <div class="tile-body">

          <ul class="nav nav-tabs">

            <li class="active"><a data-toggle="tab" href="#seksi1"><b>Soal Seksi 1</b></a></li>
            <li><a data-toggle="tab" href="#seksi2"><b>Soal Seksi 2</b></a></li>
            <li><a data-toggle="tab" href="#seksi3"><b>Soal Seksi 3</b></a></li>

          </ul>
          <div class="tab-content">
            <div id="seksi1" class="tab-pane fade in active">
              <!-- Tambah -->
              <div class="modal fade" id="modalTambah1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo base_url('Soal/Soal_tpa/tambahdata_1') ?>" method="post">
                        <div class="form-group">
                          <label class="control-label">Nomor Soal</label>
                          <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?= count($tpa1) + 1 ?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Soal Cerita</label>
                          <textarea name="soal_cerita" class="ckeditor" id="ckeditor" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Soal</label>
                          <textarea name="soal" class="ckeditor" id="ckeditor" rows="3" required="required"></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi A</label>
                          <input type="text" name="opsi_a" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi B</label>
                          <input type="text" name="opsi_b" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi C</label>
                          <input type="text" name="opsi_c" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi D</label>
                          <input type="text" name="opsi_d" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi E</label>
                          <input type="text" name="opsi_e" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jawaban</label>
                          <input type="text" name="jawaban" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jenis Soal</label>
                          <input type="text" name="jenis_soal" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jenis TPA</label>
                          <select class="form-control" name="jenis_tpa">
                            <option value="pendek">Pendek</option>
                            <option value="panjang">Panjang</option>
                          </select>
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

              <button style="margin-bottom: 2%; margin-top: 2%" data-toggle="modal" data-target="#modalTambah1" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>

              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Soal Cerita</th>
                      <th>Soal</th>
                      <th>Opsi A</th>
                      <th>Opsi B</th>
                      <th>Opsi C</th>
                      <th>Opsi D</th>
                      <th>Opsi E</th>
                      <th>Jawaban</th>
                      <th>Jenis Soal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $modal = 0;
                    $no = 1;
                    foreach ($tpa1 as $key_s1) { ?>
                      <!-- Edit -->
                      <div class="modal fade" id="modalEdit1<?php echo $modal ?>" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Soal</h4>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo base_url('Soal/Soal_tpa/editdata/' . $key_s1['id_soal_tpa']) ?>" method="post">
                                <input type="hidden" name="id_soal_tpa" value="<?php echo $key_s1['id_soal_tpa'] ?>">
                                <div class="form-group">
                                  <label class="control-label">Nomor Soal</label>
                                  <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?php echo $key_s1['nomor_soal'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Soal Cerita</label>
                                  <textarea name="soal_cerita" class="ckeditor" id="ckeditor" rows="3" required="required"><?php echo $key_s1['soal_cerita'] ?></textarea>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Soal</label>
                                  <textarea name="soal" class="ckeditor" id="ckeditor" rows="3" required="required"><?php echo $key_s1['soal'] ?></textarea>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi A</label>
                                  <input type="text" name="opsi_a" class="form-control" value="<?php echo $key_s1['opsi_a'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi B</label>
                                  <input type="text" name="opsi_b" class="form-control" value="<?php echo $key_s1['opsi_b'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi C</label>
                                  <input type="text" name="opsi_c" class="form-control" value="<?php echo $key_s1['opsi_c'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi D</label>
                                  <input type="text" name="opsi_d" class="form-control" value="<?php echo $key_s1['opsi_d'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi E</label>
                                  <input type="text" name="opsi_e" class="form-control" value="<?php echo $key_s1['opsi_e'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jawaban</label>
                                  <input type="text" name="jawaban" class="form-control" value="<?php echo $key_s1['jawaban'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis Soal</label>
                                  <input type="text" name="jenis_soal" class="form-control" value="<?php echo $key_s1['jenis_soal'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis TPA</label>
                                  <select class="form-control" name="jenis_tpa">
                                    <option value="pendek" <?php if ($key_s1['jenis_tpa'] == 'pendek') {
                                                              echo "selected";
                                                            } ?>>Pendek</option>
                                    <option value="panjang" <?php if ($key_s1['jenis_tpa'] == 'panjang') {
                                                              echo "selected";
                                                            } ?>>Panjang</option>
                                  </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Edit" class="btn btn-warning">
                              </form>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="myModal1<?php echo $modal ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                              <p>Ingin hapus pernyataan ini? <b><?php echo $key_s1['soal'] ?></b></p>
                            </div>
                            <div class="modal-footer">
                              <a href="<?php echo base_url('Soal/Soal_tpa/hapus/' . $key_s1['id_soal_tpa']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key_s1['soal_cerita'] ?></td>
                        <td><?= $key_s1['soal'] ?></td>
                        <td><?= $key_s1['opsi_a'] ?></td>
                        <td><?= $key_s1['opsi_b'] ?></td>
                        <td><?= $key_s1['opsi_c'] ?></td>
                        <td><?= $key_s1['opsi_d'] ?></td>
                        <td><?= $key_s1['opsi_e'] ?></td>
                        <td><b><?= $key_s1['jawaban'] ?></b></td>
                        <td><?= $key_s1['jenis_soal'] ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button data-toggle="modal" data-target="#modalEdit1<?php echo $modal ?>" title="Edit" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                            <button data-placement="bottom" title="Hapus" data-original-title="Hapus" data-toggle="modal" data-target="#myModal1<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          </div>
                        </td>
                      </tr>
                    <?php $modal++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="seksi2" class="tab-pane fade">
              <!-- Tambah -->
              <div class="modal fade" id="modalTambah2" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo base_url('Soal/Soal_tpa/tambahdata_2') ?>" method="post">
                        <div class="form-group">
                          <label class="control-label">Nomor Soal</label>
                          <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?= count($tpa2) + 1 ?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Soal Cerita</label>
                          <textarea name="soal_cerita" class="ckeditor" id="ckeditor" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Soal</label>
                          <textarea name="soal" class="ckeditor" id="ckeditor" rows="3" required="required"></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi A</label>
                          <input type="text" name="opsi_a" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi B</label>
                          <input type="text" name="opsi_b" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi C</label>
                          <input type="text" name="opsi_c" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi D</label>
                          <input type="text" name="opsi_d" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi E</label>
                          <input type="text" name="opsi_e" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jawaban</label>
                          <input type="text" name="jawaban" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jenis Soal</label>
                          <input type="text" name="jenis_soal" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jenis TPA</label>
                          <select class="form-control" name="jenis_tpa">
                            <option value="pendek">Pendek</option>
                            <option value="panjang">Panjang</option>
                          </select>
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

              <button style="margin-bottom: 2%; margin-top: 2%" data-toggle="modal" data-target="#modalTambah2" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>

              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable2">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Soal Cerita</th>
                      <th>Soal</th>
                      <th>Opsi A</th>
                      <th>Opsi B</th>
                      <th>Opsi C</th>
                      <th>Opsi D</th>
                      <th>Opsi E</th>
                      <th>Jawaban</th>
                      <th>Jenis Soal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $modal2 = 0;
                    $no2 = 1;
                    foreach ($tpa2 as $key_s2) { ?>
                      <!-- Edit -->
                      <div class="modal fade" id="modalEdit2<?php echo $modal2 ?>" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Soal</h4>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo base_url('Soal/Soal_tpa/editdata/' . $key_s2['id_soal_tpa']) ?>" method="post">
                                <input type="hidden" name="id_soal_tpa" value="<?php echo $key_s2['id_soal_tpa'] ?>">
                                <div class="form-group">
                                  <label class="control-label">Nomor Soal</label>
                                  <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?php echo $key_s2['nomor_soal'] ?>">
                                </div>
                                <div class="form-group">
                                  <div class="form-group">
                                    <label class="control-label">Soal Cerita</label>
                                    <textarea name="soal_cerita" class="ckeditor" id="ckeditor" rows="3" required="required"><?php echo $key_s2['soal_cerita'] ?></textarea>
                                  </div>
                                  <label class="control-label">Soal</label>
                                  <textarea name="soal" class="ckeditor" id="ckeditor" rows="3" required="required"><?php echo $key_s2['soal'] ?></textarea>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi A</label>
                                  <input type="text" name="opsi_a" class="form-control" value="<?php echo $key_s2['opsi_a'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi B</label>
                                  <input type="text" name="opsi_b" class="form-control" value="<?php echo $key_s2['opsi_b'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi C</label>
                                  <input type="text" name="opsi_c" class="form-control" value="<?php echo $key_s2['opsi_c'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi D</label>
                                  <input type="text" name="opsi_d" class="form-control" value="<?php echo $key_s2['opsi_d'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi E</label>
                                  <input type="text" name="opsi_e" class="form-control" value="<?php echo $key_s2['opsi_e'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jawaban</label>
                                  <input type="text" name="jawaban" class="form-control" value="<?php echo $key_s2['jawaban'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis Soal</label>
                                  <input type="text" name="jenis_soal" class="form-control" value="<?php echo $key_s2['jenis_soal'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis TPA</label>
                                  <select class="form-control" name="jenis_tpa">
                                    <option value="pendek" <?php if ($key_s2['jenis_tpa'] == 'pendek') {
                                                              echo "selected";
                                                            } ?>>Pendek</option>
                                    <option value="panjang" <?php if ($key_s2['jenis_tpa'] == 'panjang') {
                                                              echo "selected";
                                                            } ?>>Panjang</option>
                                  </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Edit" class="btn btn-warning">
                              </form>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="myModal2<?php echo $modal2 ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                              <p>Ingin hapus pernyataan ini? <b><?php echo $key_s2['soal'] ?></b></p>
                            </div>
                            <div class="modal-footer">
                              <a href="<?php echo base_url('Soal/Soal_tpa/hapus/' . $key_s2['id_soal_tpa']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <tr>
                        <td><?php echo $no2++ ?></td>
                        <td><?php echo $key_s2['soal_cerita'] ?></td>
                        <td><?php echo $key_s2['soal'] ?></td>
                        <td><?php echo $key_s2['opsi_a'] ?></td>
                        <td><?php echo $key_s2['opsi_b'] ?></td>
                        <td><?php echo $key_s2['opsi_c'] ?></td>
                        <td><?php echo $key_s2['opsi_d'] ?></td>
                        <td><?php echo $key_s2['opsi_e'] ?></td>
                        <td><b><?php echo $key_s2['jawaban'] ?></b></td>
                        <td><?php echo $key_s2['jenis_soal'] ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button data-toggle="modal" data-target="#modalEdit2<?php echo $modal2 ?>" title="Edit" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                            <button data-placement="bottom" title="Hapus" data-original-title="Hapus" data-toggle="modal" data-target="#myModal2<?php echo $modal2 ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          </div>
                        </td>
                      </tr>
                    <?php $modal2++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="seksi3" class="tab-pane fade">
              <!-- Tambah -->
              <div class="modal fade" id="modalTambah3" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo base_url('Soal/Soal_tpa/tambahdata_3') ?>" method="post">
                        <div class="form-group">
                          <label class="control-label">Nomor Soal</label>
                          <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?= count($tpa3) + 1 ?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Soal Cerita</label>
                          <textarea name="soal_cerita" class="ckeditor" id="ckeditor" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Soal</label>
                          <textarea name="soal" class="ckeditor" id="ckeditor" rows="3" required="required"></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi A</label>
                          <input type="text" name="opsi_a" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi B</label>
                          <input type="text" name="opsi_b" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi C</label>
                          <input type="text" name="opsi_c" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi D</label>
                          <input type="text" name="opsi_d" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Opsi E</label>
                          <input type="text" name="opsi_e" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jawaban</label>
                          <input type="text" name="jawaban" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jenis Soal</label>
                          <input type="text" name="jenis_soal" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Jenis TPA</label>
                          <select class="form-control" name="jenis_tpa">
                            <option value="pendek">Pendek</option>
                            <option value="panjang">Panjang</option>
                          </select>
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

              <button style="margin-bottom: 2%; margin-top: 2%" data-toggle="modal" data-target="#modalTambah3" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>

              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable3">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Soal Cerita</th>
                      <th>Soal</th>
                      <th>Opsi A</th>
                      <th>Opsi B</th>
                      <th>Opsi C</th>
                      <th>Opsi D</th>
                      <th>Opsi E</th>
                      <th>Jawaban</th>
                      <th>Jenis Soal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $modal3 = 0;
                    $no3 = 1;
                    foreach ($tpa3 as $key_s3) { ?>
                      <!-- Edit -->
                      <div class="modal fade" id="modalEdit3<?php echo $modal3 ?>" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Soal</h4>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo base_url('Soal/Soal_tpa/editdata/' . $key_s3['id_soal_tpa']) ?>" method="post">
                                <input type="hidden" name="id_soal_tpa" value="<?php echo $key_s3['id_soal_tpa'] ?>">
                                <div class="form-group">
                                  <label class="control-label">Nomor Soal</label>
                                  <input type="text" name="nomor_soal" class="form-control" required="required" autocomplete="off" value="<?php echo $key_s3['nomor_soal'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Soal Cerita</label>
                                  <textarea name="soal_cerita" class="ckeditor" id="ckeditor" rows="3" required="required"><?php echo $key_s3['soal_cerita'] ?></textarea>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Soal</label>
                                  <textarea name="soal" class="ckeditor" id="ckeditor" rows="3" required="required"><?php echo $key_s3['soal'] ?></textarea>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi A</label>
                                  <input type="text" name="opsi_a" class="form-control" value="<?php echo $key_s3['opsi_a'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi B</label>
                                  <input type="text" name="opsi_b" class="form-control" value="<?php echo $key_s3['opsi_b'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi C</label>
                                  <input type="text" name="opsi_c" class="form-control" value="<?php echo $key_s3['opsi_c'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi D</label>
                                  <input type="text" name="opsi_d" class="form-control" value="<?php echo $key_s3['opsi_d'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Opsi E</label>
                                  <input type="text" name="opsi_e" class="form-control" value="<?php echo $key_s3['opsi_e'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jawaban</label>
                                  <input type="text" name="jawaban" class="form-control" value="<?php echo $key_s3['jawaban'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis Soal</label>
                                  <input type="text" name="jenis_soal" class="form-control" value="<?php echo $key_s3['jenis_soal'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Jenis TPA</label>
                                  <select class="form-control" name="jenis_tpa">
                                    <option value="pendek" <?php if ($key_s3['jenis_tpa'] == 'pendek') {
                                                              echo "selected";
                                                            } ?>>Pendek</option>
                                    <option value="panjang" <?php if ($key_s3['jenis_tpa'] == 'panjang') {
                                                              echo "selected";
                                                            } ?>>Panjang</option>
                                  </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <input type="submit" value="Edit" class="btn btn-warning">
                              </form>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="myModal3<?php echo $modal3 ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                              <p>Ingin hapus pernyataan ini? <b><?php echo $key_s3['soal'] ?></b></p>
                            </div>
                            <div class="modal-footer">
                              <a href="<?php echo base_url('Soal/Soal_tpa/hapus/' . $key_s3['id_soal_tpa']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <tr>
                        <td><?php echo $no3++ ?></td>
                        <td><?php echo $key_s3['soal_cerita'] ?></td>
                        <td><?php echo $key_s3['soal'] ?></td>
                        <td><?php echo $key_s3['opsi_a'] ?></td>
                        <td><?php echo $key_s3['opsi_b'] ?></td>
                        <td><?php echo $key_s3['opsi_c'] ?></td>
                        <td><?php echo $key_s3['opsi_d'] ?></td>
                        <td><?php echo $key_s3['opsi_e'] ?></td>
                        <td><b><?php echo $key_s3['jawaban'] ?></b></td>
                        <td><?php echo $key_s3['jenis_soal'] ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button data-toggle="modal" data-target="#modalEdit3<?php echo $modal3 ?>" title="Edit" type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                            <button data-placement="bottom" title="Hapus" data-original-title="Hapus" data-toggle="modal" data-target="#myModal3<?php echo $modal3 ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          </div>
                        </td>
                      </tr>
                    <?php $modal3++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
</main>

<?php $this->load->view('layout/footer'); ?>