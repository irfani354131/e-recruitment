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
      <li class="breadcrumb-item"><a href="#">Data Psikolog</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Data Psikolog</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Welcome/tambahdata_psikolog') ?>" method="post">
            <div class="form-group">
              <label class="control-label">Nama Psikolog</label>
              <input class="form-control" name="nama_psikolog" type="text" placeholder="Masukkan full name">
            </div>
            <div class="form-group">
              <label class="control-label">No Hp</label>
              <input class="form-control" name="no_hp" type="text" placeholder="Masukkan No Hp">
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
              <label class="control-label">Level</label>
              <select class="form-control" name="id_level">
                <option value="zero">--== Pilih Level ==--</option>
                <?php 
                $level = $this->db->query("SELECT * FROM tb_level where id_level=4");
                foreach($level->result() as $row_lev)  { ?>
                  <option value="<?php echo $row_lev->id_level?>"><?php echo $row_lev->nama_level; ?></option>
                <?php } ?>
              </select>
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
            <a href="<?php echo base_url('Administrator/Welcome/data_admin') ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer') ?>