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
      <li class="breadcrumb-item"><a href="#">Data Level</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Data Level</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Welcome/edit_level/'.$data[0]['id_level']) ?>" method="post">
            <div class="form-group">
              <label class="control-label">Nama Level</label>
              <input type="hidden" name="id_level" value="<?php echo $data[0]['id_level'] ?>">
              <input class="form-control" name="nama_level" type="text" value="<?php echo $data[0]['nama_level'] ?>">
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
            <a href="" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer') ?>