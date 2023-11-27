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
      <li class="breadcrumb-item"><a href="#">Jadwal Seleksi</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Jadwal Seleksi</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Data_jadwal/tambahdata') ?>" method="post">
            <div class="form-group">
              <label class="control-label">Lowongan / Jabatan</label>
              <select class="form-control" name="id_lowongan" id="id_lowongan">
                <option value="zero">--== Pilih Lowongan ==--</option>
                <?php 
                // $jadwal = $this->db->query("SELECT * FROM tb_jadwal");
                $lowongan = $this->db->query("SELECT * FROM tb_lowongan");
                $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

                foreach ($lowongan->result() as $key_low) {
                  $idLowong = $key_low->id_lowongan;
                  $idPerus = $key_low->id_perusahaan;
                  $nama_lowongan = $key_low->nama_jabatan;

                  $namaPer = $this->db->query("SELECT * FROM tb_perusahaan");
                  foreach ($namaPer->result() as $keyNama) {
                    if ($idPerus == $keyNama->id_perusahaan) {
                      # code...
                      $nmPerusahaan =  $keyNama->nama_perusahaan;?>
                      <option value="<?php echo $idLowong?>" data-idperusahaan="<?php echo $idPerus?>"><?php echo $nama_lowongan; ?> (<?php echo $nmPerusahaan ?>)</option>

                    <?php } } }  ?>

                  </select>


                </div>
                <input class="form-control" type=hidden name=idperusahaan id=idperusahaan />

                <div class="form-group">
                  <label class="control-label">Jadwal Tes Tulis</label>
                  <input class="form-control" name="tes_tulis" type="date">
                </div>
                <div class="form-group">
                  <label class="control-label">Jadwal Tes Wawancara</label>
                  <input class="form-control" name="tes_wawancara" type="date">
                </div>
                <div class="form-group">
                  <label class="control-label">Jadwal Tes FGD</label>
                  <input class="form-control" name="tes_fgd" type="date">
                </div>

                
                <input type="submit" value="Kirim" class="btn btn-primary">
                <a href="<?php echo base_url('Administrator/Data_jadwal') ?>" class="btn btn-secondary"> Cancel</a>
              </form>
            </div>

          </div>
        </div>
      </div>
    </main>


    <?php $this->load->view('layout/footer') ?>