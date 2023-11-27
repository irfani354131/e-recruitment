<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

    <!-- content -->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Sistem E-Recruitment</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-building-o fa-3x"></i>
            <div class="info">
              <h4>Perusahaan</h4>
              <?php 
              $query_per = $this->db->query("SELECT count(id_perusahaan) AS jumlah FROM tb_perusahaan");
              $result = $query_per->result_array();
              ?>
              <p><b><?php echo $result[0]['jumlah'] ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-file fa-3x"></i>
            <div class="info">
              <h4>Lowongan</h4>
              <?php 
              $query_low = $this->db->query("SELECT count(id_lowongan) AS jumlah FROM tb_lowongan");
              $result = $query_low->result_array();
              ?>
              <p><b><?php echo $result[0]['jumlah'] ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Pelamar</h4>
              <?php 
              $query_pel = $this->db->query("SELECT count(id_pelamar) AS jumlah FROM tb_pelamar");
              $result = $query_pel->result_array();
              ?>
              <p><b><?php echo $result[0]['jumlah'] ?></b></p>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Stars</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div> -->
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Support Requests</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- end content -->
<?php $this->load->view('layout/footer'); ?>