<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Edit Data</h1>
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
          <form action="<?php echo base_url('Soal/Soal_cfit/edit_cfit/'.$data[0]['id_soal']) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="id_soal" value="<?php echo $data[0]['id_soal'] ?>">
              <label style="font-weight: bold" class="control-label">Soal</label>
              <label style="color:redd;font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['soal'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['soal']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="250">
              <input class="form-control" name="soal" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi A</label>
              <label style="color:redd;font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['opsi_a'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['opsi_a']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="100" height="100">
              <input class="form-control" name="opsi_a" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi B</label>
              <label style="color:red; font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['opsi_b'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['opsi_b']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="100" height="100">
              <input class="form-control" name="opsi_b" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi C</label>
              <label style="color:red; font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['opsi_c'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['opsi_c']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="100" height="100">
              <input class="form-control" name="opsi_c" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi D</label>
              <label style="color:redd;font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['opsi_d'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['opsi_d']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="100" height="100">
              <input class="form-control" name="opsi_d" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi E</label>
              <label style="color:red; font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['opsi_e'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['opsi_e']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="100" height="100">
              <input class="form-control" name="opsi_e" type="file">
            </div>

            <div class="form-group">
              <label style="font-weight: bold" class="control-label">Opsi F</label>
              <label style="color:red; font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 3MB)</label>
              <br>
              <img style="margin-bottom: 1%" src="<?php echo ($data[0]['opsi_f'] != '' ? base_url('./upload/bank_soal/cfit/' . $data[0]['opsi_f']) : base_url('./upload/bank_soal/img_default.png')); ?>" alt="Gambar Soal" width="100" height="100">
              <input class="form-control" name="opsi_f" type="file">
            </div>

            <div class="form-group">
              <label class="control-label">Subtes Ke</label>
              <select class="form-control" name="subtes" id="subtes">
                <?php echo $type = $data[0]['subtes'] ?>
                <option value="zero">--== PILIH SUB TES ==--</option>
                <option value="1" <?php echo ($type == "1" ? "selected":"") ?>>1</option>
                <option value="2" <?php echo ($type == "2" ? "selected":"") ?>>2</option>
                <option value="3" <?php echo ($type == "3" ? "selected":"") ?>>3</option>
                <option value="4" <?php echo ($type == "4" ? "selected":"") ?>>4</option>
              </select>
            </div>

             <div class="form-group">
              <label class="control-label">Jawaban Benar</label>
              <select class="form-control" name="jawaban">
                <?php $jawaban = $data[0]['jawaban']; ?>
                <option value="zero">--== PILIH JAWABAN YANG BENAR ==--</option>
                <option value="A" <?php echo ($jawaban == "A" ? "selected":"") ?>>A</option>
                <option value="B" <?php echo ($jawaban == "B" ? "selected":"") ?>>B</option>
                <option value="C" <?php echo ($jawaban == "C" ? "selected":"") ?>>C</option>
                <option value="D" <?php echo ($jawaban == "D" ? "selected":"") ?>>D</option>
                <option value="E" <?php echo ($jawaban == "E" ? "selected":"") ?>>E</option>
                <option value="F" <?php echo ($jawaban == "F" ? "selected":"") ?>>F</option>
              </select>
            </div>

            <div class="form-group" id="answer-2">
              <label class="control-label">Jawaban Benar Ke 2</label>
              <select class="form-control" name="jawaban2">
                <?php $jawaban = $data[0]['jawaban2']; ?>
                <option value="">--== PILIH JAWABAN BENAR KE 2 ==--</option>
                <option value="A" <?php echo ($jawaban == "A" ? "selected":"") ?>>A</option>
                <option value="B" <?php echo ($jawaban == "B" ? "selected":"") ?>>B</option>
                <option value="C" <?php echo ($jawaban == "C" ? "selected":"") ?>>C</option>
                <option value="D" <?php echo ($jawaban == "D" ? "selected":"") ?>>D</option>
                <option value="E" <?php echo ($jawaban == "E" ? "selected":"") ?>>E</option>
                <option value="F" <?php echo ($jawaban == "F" ? "selected":"") ?>>F</option>
              </select>
            </div>

             <div class="form-group">
              <label class="control-label">Type Saal</label>
              <select class="form-control" name="type_soal">
                <?php echo $type = $data[0]['type_soal'] ?>
                <option value="zero">--== PILIH TYPE SOAL ==--</option>
                <option value="Contoh" <?php echo ($type == "Contoh" ? "selected":"") ?>>Contoh</option>
                <option value="Ujian" <?php echo ($type == "Ujian" ? "selected":"") ?>>Ujian</option>
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