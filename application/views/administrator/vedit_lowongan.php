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
      <li class="breadcrumb-item"><a href="#">Data Lowongan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Data Lowongan</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Data_lowongan/edit_lowongan/'.$data[0]['id_lowongan']) ?>" method="post">
            <div class="form-group">
              <label class="control-label">Nama Lowongan</label>
              <input type="hidden" name="id_lowongan" value="<?php echo $data[0]['id_lowongan'] ?>">
              <input class="form-control" name="nama_lowongan" type="text" value="<?php echo $data[0]['nama_jabatan'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Perusahaan</label>
              <select class="form-control" name="id_perusahaan">
                <option value="zero">--== Pilih Perusahaan ==--</option>
                <?php 
                $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
                foreach($perusahaan->result() as $row_perusahaan)  { ?>
                  <option value="<?php echo $row_perusahaan->id_perusahaan?>"<?php echo ($row_perusahaan->id_perusahaan == $data[0]['id_perusahaan'] ? 'selected="selected"' : ''); ?>><?php echo $row_perusahaan->nama_perusahaan; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Jenis</label>
              <select class="form-control" name="id_jenis_motlet">
                <option value="zero">--== Pilih Jenis Lowongan ==--</option>
                <?php 
                $jenis = $this->db->query("SELECT * FROM tb_jenis_motlet");
                foreach($jenis->result() as $row_jen)  { ?>
                  <option value="<?php echo $row_jen->id_jenis_motlet?>"<?php echo ($row_jen->id_jenis_motlet == $data[0]['id_jenis_motlet'] ? 'selected="selected"' : ''); ?>><?php echo $row_jen->jenis_motlet; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Jadwal Seleksi</label>
              <input class="form-control" name="jadwal_seleksi" type="date" value="<?php echo $data[0]['jadwal_seleksi'] ?>">
            </div>
            <div class="form-group">
              <label class="control-label">Kota Penempatan</label>
              <input class="form-control" name="kota_penempatan" type="text" value="<?php echo $data[0]['kota_penempatan'] ?>" >
            </div>
            <div class="form-group">
              <label class="control-label">Persyaratan</label>
              <textarea name="persyaratan" class="ckeditor" id="ckeditor" rows="3"><?php echo $data[0]['persyaratan'] ?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Gaji</label>
              <input class="form-control" name="gaji" type="text" value="<?php echo $data[0]['gaji'] ?>" >
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