<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Lowongan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Lowongan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Administrator/Data_lowongan/tambahdata') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Data</a>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg_success')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_success') ?>
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
                  <th>Posisi Jabatan</th>
                  <th>Perusahaan</th>
                  <th>Jenis Lowongan</th>
                  <th>Jadwal Seleksi</th>
                  <th>Kota Penempatan</th>
                  <th>Persyaratan</th>
                  <th>Gaji</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                foreach ($array as $key) {

                  $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan WHERE id_perusahaan=" . $key['id_perusahaan'])->result();
                ?>


                  <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus lowongan <b><?php echo $key['nama_jabatan'] ?></b> dari perusahaan <b><?= $perusahaan[0]->nama_perusahaan ?></b>?</p>
                          <p>Menghapus lowongan ini akan menghapus semua data yang berkaitan dengan lowongan</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Data_lowongan/hapus_lowongan/' . $key['id_lowongan']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="myModal2<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menyembunyikan lowongan <b><?php echo $key['nama_jabatan'] ?></b> perusahaan <b><?= $perusahaan[0]->nama_perusahaan ?></b>? dari front end?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Data_lowongan/sembunyikan_lowongan/' . $key['id_lowongan']) ?>" title="Sembunyikan Data"><button type="button" class="btn btn-danger">Sembunyikan <i class="fa fa-eye-slash"></i></button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                        </div>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['nama_jabatan'] ?></td>
                    <?php $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
                    foreach ($perusahaan->result() as $key_perusahaan) {
                      if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) { ?>
                        <td><?php echo $name_company = $key_perusahaan->nama_perusahaan ?></td>
                      <?php } ?>
                    <?php } ?>

                    <?php $jenis = $this->db->query("SELECT * FROM tb_jenis_motlet");
                    foreach ($jenis->result() as $key_jenis) {
                      if ($key_jenis->id_jenis_motlet == $key['id_jenis_motlet']) { ?>
                        <td><?php echo $key_jenis->jenis_motlet ?></td>
                      <?php } ?>
                    <?php } ?>


                    <td><?php echo $key['jadwal_seleksi'] ?></td>
                    <td><?php echo $key['kota_penempatan'] ?></td>
                    <td><?php echo $key['persyaratan'] ?></td>
                    <td><?php echo $key['gaji'] ?></td>
                    <td><?php if ($key['status'] == "tersedia") {
                          echo "Aktif";
                        } else {
                          echo "Tidak Aktif";
                        } ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download Pelamar" type="button" class="btn btn-dark"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/download_pelamar/' . $key['id_lowongan']) ?>"><i class="fa fa-download"></i></a></button> &nbsp;

                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Pelamar" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/detail_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-table" aria-hidden="true"></i></a></button>
                        &nbsp; <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tampilkan Lowongan" type="button" class="btn btn-primary"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/tampilkan_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-eye"></i></a></button>

                        &nbsp; <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Sembunyikan Lowongan" type="button" class="btn btn-secondary"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/sembunyikan_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-eye-slash"></i></a></button>


                        &nbsp;<button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" type="button" class="btn btn-warning"><a style="color: #fff" href="<?php echo base_url('Administrator/Data_lowongan/edit_lowongan/' . $key['id_lowongan']) ?>"><i class="fa fa-edit"></i></a></button>

                        &nbsp;<button data-placement="bottom" data-original-title="Hapus" data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>


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