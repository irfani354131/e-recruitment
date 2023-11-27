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
      <li class="breadcrumb-item"><a href="#">Tambah Soal Papiostik</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tambah Soal Papiostik</h3>
        <div id="notifikasi">
          <?php if($this->session->flashdata('msg_error')):?>
            <div class="alert alert-danger">
              <?php  echo $this->session->flashdata('msg_error')?>
            </div>
          <?php endif ;?>
        </div> 
        <div class="tile-body">
          <form action="<?php echo base_url('Soal/Soal_papi/tambahdata') ?>" method="post">
            <div class="form-group">
              <label class="control-label">No Soal</label>
              <input class="form-control" name="no_soal" type="number" required="required" autofocus>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Pernyataan A</label>
                  <input class="form-control" autocomplete="off" name="pernyataan1" type="text" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Aspek</label>
                  <select class="form-control" name="aspek" required="required">
                    <option value="zero">--== Pilih Aspek ==--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="I">I</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                    <option value="N">N</option>
                    <option value="O">O</option>
                    <option value="P">P</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                    <option value="T">T</option>
                    <option value="V">V</option>
                    <option value="X">W</option>
                    <option value="X">X</option>
                    <option value="Z">Z</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Pernyataan B</label>
                  <input class="form-control" autocomplete="off" name="pernyataan2" type="text" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Aspek</label>
                  <select class="form-control" name="aspek2" required="required">
                    <option value="zero">--== Pilih Aspek ==--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="I">I</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                    <option value="N">N</option>
                    <option value="O">O</option>
                    <option value="P">P</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                    <option value="T">T</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    <option value="Z">Z</option>
                  </select>
                </div>
              </div>
            </div>

            <input type="submit" value="Kirim" class="btn btn-primary">
            <a href="<?php echo base_url('Soal/Soal_papi') ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>


<?php $this->load->view('layout/footer') ?>