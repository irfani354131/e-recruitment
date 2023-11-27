<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Perusahaan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Perusahaan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo base_url('Administrator/Welcome/tambahdata_perusahaan') ?>" class="btn btn-primary" style="margin-bottom: 2%;">Tambah Data</a>
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
                  <th>Nama Perusahaan</th>
                  <th>Jenis Usaha</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Logo Perusahaan</th>
                  <th>Level</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Website</th>
                  <th>Facebook</th>
                  <th>Instagram</th>
                  <th>Twitter</th>
                  <th>No HP</th>
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
                          <p>Ingin hapus <?php echo $key['nama_perusahaan'] ?>?</p>
                          <a href="<?php echo base_url('Administrator/Welcome/hapus_perusahaan/'.$key['id_perusahaan']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div> 
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['nama_perusahaan'] ?></td>
                    <td><?php echo $key['jenis_usaha'] ?></td>
                    <td><?php echo $key['alamat'] ?></td>
                    <td><?php echo $key['email'] ?></td>
                    <td><img width="100" src="<?php echo ($key['logo_perusahaan'] != '' ? base_url('./upload/logo_perusahaan/' . $key['logo_perusahaan']) : base_url('./upload/logo_perusahaan/img_default.jpg')); ?>"></td>
                    <?php $level = $this->db->query("SELECT * FROM tb_level");
                    foreach ($level->result() as $key_level) {
                      if ($key_level->id_level==$key['id_level']) { ?>
                        <td><?php echo $key_level->nama_level ?></td>
                      <?php } ?>
                    <?php } ?>
                    <td><?php echo $key['username'] ?></td>
                    <td><?php echo $key['password'] ?></td>
                    <td><?php echo $key['website'] ?></td>
                    <td><?php echo $key['facebook'] ?></td>
                    <td><?php echo $key['instagram'] ?></td>
                    <td><?php echo $key['twitter'] ?></td>
                    <td><?php echo $key['no_hp'] ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" type="button" class="btn btn-warning"><a style="color: #fff" href="<?php echo base_url('Administrator/Welcome/edit_perusahaan/'.$key['id_perusahaan']) ?>"><i class="fa fa-edit"></i></a></button>
                        <button data-placement="bottom" title="" data-original-title="Hapus" data-toggle="modal" data-target="#myModal<?php echo $modal ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </div>
                    </td>
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