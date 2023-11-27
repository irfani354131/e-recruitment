<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Bank Soal EPPS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item"><a href="#">Bank Soal EPPS</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <a href="<?php echo base_url('Soal/Soal_epps/tambahdata') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Soal</a>
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
                                    <th>Pernyataan </th>
                                    <th>Aspek</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $modal = 0;
                                $no = 1;
                                foreach ($epps as $key) { ?>
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
                                                    <a href="<?php echo base_url('Soal/Soal_epps/hapus_epps/' . $key['id_soal']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
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
                                                    <form action="<?php echo base_url('Soal/Soal_epps/edit_epps/' . $key['id_soal']) ?>" method="POST">
                                                        <div class="form-group">
                                                            <label class="control-label">No Soal</label>
                                                            <input type="hidden" name="id_soal" value="<?php echo $key['id_soal'] ?>">
                                                            <input class="form-control" name="no_soal" type="number" required="required" value="<?php echo $key['no_soal'] ?>">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Pernyataan A</label>
                                                                    <input class="form-control" name="pilihan1" type="text" required="required" autocomplete="off" value="<?php echo $key['pilihan1'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Aspek</label>
                                                                    <select class="form-control" name="aspek1" required="required">
                                                                        <option value="zero">--== Pilih Aspek ==--</option>
                                                                        <option value="A" <?php echo ($key['aspek1'] == 'A' ? 'selected="selected"' : ''); ?>>A</option>
                                                                        <option value="B" <?php echo ($key['aspek1'] == 'B' ? 'selected="selected"' : ''); ?>>B</option>
                                                                        <option value="C" <?php echo ($key['aspek1'] == 'C' ? 'selected="selected"' : ''); ?>>C</option>
                                                                        <option value="D" <?php echo ($key['aspek1'] == 'D' ? 'selected="selected"' : ''); ?>>D</option>
                                                                        <option value="E" <?php echo ($key['aspek1'] == 'E' ? 'selected="selected"' : ''); ?>>E</option>
                                                                        <option value="F" <?php echo ($key['aspek1'] == 'F' ? 'selected="selected"' : ''); ?>>F</option>
                                                                        <option value="G" <?php echo ($key['aspek1'] == 'G' ? 'selected="selected"' : ''); ?>>G</option>
                                                                        <option value="I" <?php echo ($key['aspek1'] == 'I' ? 'selected="selected"' : ''); ?>>I</option>
                                                                        <option value="K" <?php echo ($key['aspek1'] == 'K' ? 'selected="selected"' : ''); ?>>K</option>
                                                                        <option value="L" <?php echo ($key['aspek1'] == 'L' ? 'selected="selected"' : ''); ?>>L</option>
                                                                        <option value="N" <?php echo ($key['aspek1'] == 'N' ? 'selected="selected"' : ''); ?>>N</option>
                                                                        <option value="O" <?php echo ($key['aspek1'] == 'O' ? 'selected="selected"' : ''); ?>>O</option>
                                                                        <option value="P" <?php echo ($key['aspek1'] == 'P' ? 'selected="selected"' : ''); ?>>P</option>
                                                                        <option value="R" <?php echo ($key['aspek1'] == 'R' ? 'selected="selected"' : ''); ?>>R</option>
                                                                        <option value="S" <?php echo ($key['aspek1'] == 'S' ? 'selected="selected"' : ''); ?>>S</option>
                                                                        <option value="T" <?php echo ($key['aspek1'] == 'T' ? 'selected="selected"' : ''); ?>>T</option>
                                                                        <option value="V" <?php echo ($key['aspek1'] == 'V' ? 'selected="selected"' : ''); ?>>V</option>
                                                                        <option value="X" <?php echo ($key['aspek1'] == 'X' ? 'selected="selected"' : ''); ?>>X</option>
                                                                        <option value="X" <?php echo ($key['aspek1'] == 'W' ? 'selected="selected"' : ''); ?>>W</option>
                                                                        <option value="Z" <?php echo ($key['aspek1'] == 'Z' ? 'selected="selected"' : ''); ?>>Z</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Pernyataan B</label>
                                                                    <input class="form-control" name="pilihan2" type="text" required="required" autocomplete="off" value="<?php echo $key['pilihan2'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Aspek</label>
                                                                    <select class="form-control" name="aspek2" required="required">
                                                                        <option value="zero">--== Pilih Aspek ==--</option>
                                                                        <option value="A" <?php echo ($key['aspek2'] == 'A' ? 'selected="selected"' : ''); ?>>A</option>
                                                                        <option value="B" <?php echo ($key['aspek2'] == 'B' ? 'selected="selected"' : ''); ?>>B</option>
                                                                        <option value="C" <?php echo ($key['aspek2'] == 'C' ? 'selected="selected"' : ''); ?>>C</option>
                                                                        <option value="D" <?php echo ($key['aspek2'] == 'D' ? 'selected="selected"' : ''); ?>>D</option>
                                                                        <option value="E" <?php echo ($key['aspek2'] == 'E' ? 'selected="selected"' : ''); ?>>E</option>
                                                                        <option value="F" <?php echo ($key['aspek2'] == 'F' ? 'selected="selected"' : ''); ?>>F</option>
                                                                        <option value="G" <?php echo ($key['aspek2'] == 'G' ? 'selected="selected"' : ''); ?>>G</option>
                                                                        <option value="I" <?php echo ($key['aspek2'] == 'I' ? 'selected="selected"' : ''); ?>>I</option>
                                                                        <option value="K" <?php echo ($key['aspek2'] == 'K' ? 'selected="selected"' : ''); ?>>K</option>
                                                                        <option value="L" <?php echo ($key['aspek2'] == 'L' ? 'selected="selected"' : ''); ?>>L</option>
                                                                        <option value="N" <?php echo ($key['aspek2'] == 'N' ? 'selected="selected"' : ''); ?>>N</option>
                                                                        <option value="O" <?php echo ($key['aspek2'] == 'O' ? 'selected="selected"' : ''); ?>>O</option>
                                                                        <option value="P" <?php echo ($key['aspek2'] == 'P' ? 'selected="selected"' : ''); ?>>P</option>
                                                                        <option value="R" <?php echo ($key['aspek2'] == 'R' ? 'selected="selected"' : ''); ?>>R</option>
                                                                        <option value="S" <?php echo ($key['aspek2'] == 'S' ? 'selected="selected"' : ''); ?>>S</option>
                                                                        <option value="T" <?php echo ($key['aspek2'] == 'T' ? 'selected="selected"' : ''); ?>>T</option>
                                                                        <option value="V" <?php echo ($key['aspek2'] == 'V' ? 'selected="selected"' : ''); ?>>V</option>
                                                                        <option value="X" <?php echo ($key['aspek2'] == 'W' ? 'selected="selected"' : ''); ?>>W</option>
                                                                        <option value="Z" <?php echo ($key['aspek2'] == 'Z' ? 'selected="selected"' : ''); ?>>Z</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" value="Edit" class="btn btn-primary">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>A. <?php echo $key['pilihan1'] ?> <br> B. <?php echo $key['pilihan2'] ?></td>
                                        <td><?php echo $key['aspek1'] ?> <br> <?php echo $key['aspek2'] ?> </td>

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
                                    <th>Pernyataan</th>
                                    <th>Aspek</th>
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