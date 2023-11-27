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
                    <td>1. Jelaskan  secara  singkat   terkait   pemahaman   anda  mengenai  gambaran  dari  Deskripsi  Pekerjaan saat  ini?</td>

                    <td><?php echo $key['jawaban1'] ?></td>
                  </tr>
                  <tr>
                    <td>2. Jelaskan permasalahan  internal  maupun  lapangan  yang  sering  muncul  pada  posisi  jabatan saat  ini sekaligus bagaimana solusinya?</td>
                    <td><?php echo $key['jawaban2'] ?></td>
                  </tr>
                  <tr>
                    <td>3. Apa   yang  anda  sukai   pada  tugas   dari  pekerjaan   yang  anda miliki   saat  ini?.   Kemudian jelaskan  mengapa?</td>
                    <td><?php echo $key['jawaban3'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>4. Sebutkan  kompetensi  teknis  dan   karakter  apa   yang  anda miliki   sesuai  dengan  peran   dan  wewenang  pada  posisi  jabatan anda  saat  ini?</td>
                    <td><?php echo $key['jawaban4'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>5a. Apa yang  anda  maknai  tentang integritas? </td>
                    <td><?php echo $key['jawaban5'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>5b. Bagaimana  cara  anda  menciptakan   situasi   kerja yang  mampu   menampilkan integritas  dan profesionalitas kerja? </td>
                    <td><?php echo $key['jawaban5b'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>5c. Bagaimana cara  anda  untuk mengingatkan/mengajak rekan kerja maupun  bawahan dalam bertindak sesuai  dengan  nilai,  norma dan etika perusahaan?</td>
                    <td><?php echo $key['jawaban5c'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>6. Apakah  anda  pernah  terlibat  dalam sebuah  tim kerja?  Ceritakan situasi/kejadian, sekaligus peran apa yang  anda  lakukan dalam kegiatan  tersebut?</td>
                    <td><?php echo $key['jawaban6'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>7. Dalam   mencapai  target  atas  deskripsi   pekerjaan   yang  dituntut  pada  posisi saat   ini, sebutkan  langkah apa saja  yang  akan  anda  lakukan untuk memenuhi  tuntutan  perusahaan atas  kinerja anda?</td>
                    <td><?php echo $key['jawaban7'] ?></td>
                  </tr>
                  <tr>
                    
                    <td>8. Menurut   pengalaman anda, apakah  anda   pernah memimpin   sebuah  tim   kerja/kelompok.  Apabila  iya,  silahkan  berikan   penjelasan  singkat   mengenai  tugas   yang  anda  miliki  pada posisi   tersebut  sekaligus   bagaimana   cara  anda  untuk   mengarahkan   tim   sekaligus mengevaluasi  setiap  progress  kerja dan permasalahan  yang  timbul?</td>
                    <td><?php echo $key['jawaban8'] ?></td>
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