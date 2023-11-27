<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-clipboard"></i> Manajemen FAQ</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Administrator</li>
      <li class="breadcrumb-item"><a href="#">FAQ</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Administrator/Welcome/tambahdata_faq') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Data</a>
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
                <tr>
                  <th>No</th>
                  <th>Pertanyaan FAQ</th>
                  <th>Jawaban FAQ</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                $id_admin = $this->session->userdata('ses_id');
                foreach ($data as $key) {
                ?>

                  <div class="modal fade" id="myModal2<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ingin hapus FAQ ini ?</p>
                        </div>
                        <div>
                          <a href="<?php echo base_url('Administrator/Welcome/hapus_faq/' . $key['id_faq']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;"><i class="fa fa-trash"></i> Hapus</button></a>
                          <br>&nbsp;
                        </div>
                      </div>
                    </div>
                  </div>

                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $key['pertanyaan'] ?></td>
                    <td><?php echo $key['jawaban'] ?></td>
                    <td><?php echo $key['status'] ?></td>

                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo base_url('Administrator/Welcome/edit_faq/' . $key['id_faq']) ?>" title="Hapus Data"><button type="button" class="btn btn-warning"><i class="fa fa-trash"></i> Edit</button></a>
                        <button data-toggle="modal" data-target="#myModal2<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
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