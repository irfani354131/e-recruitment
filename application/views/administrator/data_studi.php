<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Jawaban Essay</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Jawaban Essay</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th width="50">Pertanyaan</th>
                  <th width="50">Jawaban</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0; $no = 1;
                foreach ($array as $key) {  ?>
                  <tr>
                    <td>1. Menurut anda, apakah penyebab dari permasalahan tersebut?</td>

                    <td><?php echo $key['jawaban1'] ?></td>
                  </tr>
                  <tr>
                    <td>2. Bagaimana upaya yang perlu diterapkan untuk menyelesaikan masalah tersebut dilihat dari pemahaman anda mengenai pelayanan prima perbankan? </td>
                    <td><?php echo $key['jawaban2'] ?></td>
                  </tr>
                 
                  <?php $modal++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php $this->load->view('layout/footer'); ?>