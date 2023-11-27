<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Tambah Data</h1>
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
        <h3 class="tile-title">Data Perusahaan</h3>
        <div id="notifikasi">
          <?php if($this->session->flashdata('pesan_error')):?>
            <div class="alert alert-danger">
              <?php  echo $this->session->flashdata('pesan_error')?>
            </div>
          <?php endif ;?> 
        </div>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Welcome/tambahdata_perusahaan') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label">Nama Perusahaan</label>
              <input class="form-control" name="nama_perusahaan" type="text" placeholder="Enter nama perusahaan">
            </div>
            <div class="form-group">
              <label class="control-label">Jenis Usaha</label>
              <input class="form-control" name="jenis_usaha" type="text" placeholder="Masukkan jenis usaha">
            </div>
            <div class="form-group">
              <label class="control-label">Alamat</label>
              <textarea name="alamat" class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input class="form-control" name="email" type="text" type="email" placeholder="Example@example.com">
            </div>
            <div class="form-group">
              <label class="control-label">Logo Perusahaan</label>
              <label style="font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <input class="form-control" name="berkas" type="file">
            </div>
            <div class="form-group">
              <label class="control-label">Username</label>
              <input class="form-control" name="username" type="text" placeholder="Masukkan username">
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input class="form-control" name="password" type="text" >
            </div>
            <div class="form-group">
              <label class="control-label">No Hp</label>
              <input class="form-control" name="no_hp" type="text" >
            </div>
            <div class="form-group">
              <label class="control-label">Website</label>
              <input class="form-control" name="website" type="text" placeholder="Example : www.chaakraconsulting.com">
            </div>
            <div class="form-group">
              <label class="control-label">Facebook</label>
              <input class="form-control" name="facebook" type="text" placeholder="Masukkan nama facebook">
            </div>
            <div class="form-group">
              <label class="control-label">Instagram</label>
              <input class="form-control" name="instagram" type="text" placeholder="Masukkan id instagram">
            </div>
            <div class="form-group">
              <label class="control-label">Twitter</label>
              <input class="form-control" name="twitter" type="text" placeholder="Masukkan id twitter">
            </div>
            <div class="form-group">
              <label class="control-label">Level</label>
              <select class="form-control" name="id_level">
                <option value="zero">--== Pilih Level ==--</option>
                <?php 
                $level = $this->db->query("SELECT * FROM tb_level where id_level=3");
                foreach($level->result() as $row_lev)  { ?>
                  <option value="<?php echo $row_lev->id_level?>"><?php echo $row_lev->nama_level; ?></option>
                <?php } ?>
              </select>
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
            <a href="<?php echo base_url('Administrator/Welcome/data_perusahaan') ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer') ?>