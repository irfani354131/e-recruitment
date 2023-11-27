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
  
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
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
                  <th>Tanggal Pelatihan</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telp</th>
                  <th>Pendidikan</th>
                  <th>Minat</th>
                  <th>Sekolah/Instansi</th>
                  <th>Waktu Mendaftar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                $no = 1;
                $array = $this->db->query("SELECT * FROM tb_pendaftar_pelatihan a left join tb_pelatihan b on a.id_pelatihan=b.id_pelatihan")->result_array();
                foreach ($array as $key) {
                ?>
                  <div class="modal fade" id="ModalHapus<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus <b><?php echo $key['nama_pendaftar_pelatihan'] ?> </b>?</p>
                          <p>Menghapus pendaftar pelatihan / talent test ini akan menghapus semua data yang berkaitan dengan data tersebut.</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Data_Pelatihan/hapuspendaftar/' . $key['id_pendaftar_pelatihan']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $key['nama_pelatihan'] ?></td>
                    <td><?php if($key['jenis']!='talent'){echo $key['tanggal_pelatihan'];} ?></td>
                    <td><?php echo $key['nama_pendaftar_pelatihan'] ?></td>
                    <td><?php echo $key['email_pendaftar'] ?></td>
                    <td><?php echo $key['no_telp'] ?></td>
                    <td><?php echo $key['pendidikan'] ?></td>
                    <td><?php echo $key['minat'] ?></td>
                    <td><?php echo $key['sekolah'] ?></td>
                    <td><?php echo $key['waktu'] ?></td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
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