<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Pelamar Keseluruhan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Pelamar Keseluruhan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-success">
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
                  <th>Nama Pelamar</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>No Hp</th>
                  <th>E-mail</th>
                  <th>Facebook</th>
                  <th>Instagram</th>
                  <th>Twitter</th>
                  <th>Username</th>
                  <th>Passsord</th>
                  <th>Status Akun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                foreach ($array as $key) { ?>

                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ingin hapus <?php echo $key['nama_psikolog'] ?>?</p>
                          <a href="<?php echo base_url('Administrator/Welcome/hapus_psikolog/' . $key['id_psikolog']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['nama_pelamar'] ?></td>
                    <td><?php echo $key['alamat'] ?></td>
                    <td><?php echo $key['tempat_lahir'] ?></td>
                    <td><?php echo $key['tanggal_lahir'] ?></td>
                    <td><?php echo $key['jenis_kelamin'] ?></td>
                    <td><?php echo $key['no_hp'] ?></td>
                    <td><?php echo $key['email'] ?></td>
                    <td><?php echo $key['facebook'] ?></td>
                    <td><?php echo $key['instagram'] ?></td>
                    <td><?php echo $key['twitter'] ?></td>
                    <td><?php echo $key['username'] ?></td>
                    <td><?php echo $key['confirm_password'] ?></td>
                    <td><?php echo $key['status'] == 0 ? 'Tidak Aktif' : 'Aktif' ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <?php if ($key['status'] == 0) {; ?>
                          &nbsp; <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Verifikasi Akun" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Administrator/Welcome/verifikasi_pelamar/' . $key['id']) ?>">Verifikasi Akun</a></button>
                        <?php } else {
                          echo ' ';
                        } ?>
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