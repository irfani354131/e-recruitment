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
      <li class="breadcrumb-item"><a href="#">Data Motivation Letter</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Data Motivation Letter</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Data_motlet/tambahdata') ?>" method="post">
            <div class="form-group">
              <label class="control-label">Perusahaan</label>
              <select class="form-control" name="id_perusahaan">
                <option value="zero">--== Pilih Perusahaan ==--</option>
                <?php 
                $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
                foreach($perusahaan->result() as $row_lev)  { ?>
                  <option value="<?php echo $row_lev->id_perusahaan?>"><?php echo $row_lev->nama_perusahaan; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Jenis Motivation Letter</label>
              <select class="form-control" name="jenis_motlet">
                <option value="zero">--== Pilih Motivation Letter ==--</option>
                <option value="Lowongan Kerja">Lowongan Kerja</option>
                <option value="Promosi Jabatan">Promosi Jabatan</option>

              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Soal Motivation Letter</label>
              <textarea name="soal_motlet" class="ckeditor" id="ckeditor" rows="3"></textarea>
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