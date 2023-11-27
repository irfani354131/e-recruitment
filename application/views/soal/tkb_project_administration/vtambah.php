<?php
$this->load->view('layout/header');
$this->load->view('layout/sidebar');
$controller = 'Soal_tkb_project_administration';
$database = 'tb_soal_tkb_projectadministrationstaff';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Tambah Data</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Tambah Soal TKB Project Administration Staff</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tambah Soal TKB Project Administration Staff</h3>
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg_error')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_error') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="tile-body">
          <form action="<?php echo base_url('Soal/' . $controller . '/tambah') ?>" method="post">
            <div class="form-group">
              <label class="control-label">No Soal</label>
              <?php $no_terakhir = $this->db->query("SELECT max(no_soal) as nomor_soal_terakhir FROM $database")->result();
              $id_terakhir = $this->db->query("SELECT max(id_soal) as id_soal_terakhir FROM $database")->result();
              ?>
              <input class="form-control" name="id_soal" type="hidden" required="required" value="<?= $id_terakhir[0]->id_soal_terakhir + 1 ?>">
              <input class="form-control" name="no_soal" type="number" required="required" value="<?= $no_terakhir[0]->nomor_soal_terakhir + 1 ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Soal</label>
              <textarea name="soal" class="ckeditor" id="ckeditor" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Opsi A</label>
              <input class="form-control" name="opsi_a" type="text" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">Opsi B</label>
              <input class="form-control" name="opsi_b" type="text" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">Opsi C</label>
              <input class="form-control" name="opsi_c" type="text" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">Opsi D</label>
              <input class="form-control" name="opsi_d" type="text" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">Opsi E</label>
              <input class="form-control" name="opsi_e" type="text" required="required" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">Jawaban</label>
              <select class="form-control" name="jawaban" required="required">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
              </select>
            </div>
            <input type="submit" value="Tambah" class="btn btn-primary">
            <a href="<?php echo base_url('Soal/' . $controller) ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>


<?php $this->load->view('layout/footer') ?>