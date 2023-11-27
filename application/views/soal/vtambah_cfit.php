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
      <li class="breadcrumb-item"><a href="#">Bank Soal CFIT</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Bank Soal CFIT</h3>
        <div id="notifikasi">
          <?php if($this->session->flashdata('pesan_error')):?>
            <div class="alert alert-danger">
              <?php  echo $this->session->flashdata('pesan_error')?>
            </div>
          <?php endif ;?> 
        </div>
        <div class="tile-body">
          <form action="<?php echo base_url('Soal/Soal_cfit/tambahdata') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Soal</label>
              <label style="font-size:12px; padding-left:5px; color:red;">(Format JPG/JPEG/PNG maks 3MB)*</label>
              <input class="form-control" name="soal" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi A</label>
              <label style="font-size:12px; padding-left:5px; color:red;">(Format JPG/JPEG/PNG maks 3MB)*</label>
              <input class="form-control" name="opsi_a" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi B</label>
              <label style="font-size:12px; padding-left:5px; color:red;">(Format JPG/JPEG/PNG maks 3MB)*</label>
              <input class="form-control" name="opsi_b" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi C</label>
              <label style="font-size:12px; padding-left:5px; color:red;">(Format JPG/JPEG/PNG maks 3MB)*</label>
              <input class="form-control" name="opsi_c" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi D</label>
              <label style="font-size:12px; padding-left:5px; color:red;">(Format JPG/JPEG/PNG maks 3MB)*</label>
              <input class="form-control" name="opsi_d" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi E</label>
              <label style="font-weight: bold; font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <input class="form-control" name="opsi_e" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi F</label>
              <label style="font-size:12px; padding-left:5px; color:red;">(Format JPG/JPEG/PNG maks 3MB)*</label>
              <input class="form-control" name="opsi_f" type="file">
            </div>

            <div class="form-group">
              <label class="control-label">Subtes Ke</label>
              <select class="form-control" name="subtes" id="subtes">
                <option value="zero">--== PILIH SUB TES ==--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban Benar</label>
              <select class="form-control" name="jawaban">
                <option value="zero">--== PILIH JAWABAN YANG BENAR ==--</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
              </select>
            </div>

            <div class="form-group" style="display: none" id="answer-2">
              <label class="control-label" >Jawaban Benar Ke 2</label>
              <select class="form-control" name="jawaban2">
                <option value="">--== PILIH JAWABAN YANG BENAR KE 2 ==--</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Type Soal</label>
              <select class="form-control" name="type_soal">
                <option value="zero">--== PILIH TYPE SOAL ==--</option>
                <option value="Contoh">Contoh</option>
                <option value="Ujian">Ujian</option>
              </select>
            </div>

            
            <input type="submit" value="Kirim" class="btn btn-primary">
            <a href="<?php echo base_url('Soal/Soal_cfit') ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer') ?>