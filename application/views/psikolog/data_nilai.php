<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Nilai Pelamar</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Nilai Pelamar</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_update')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_update') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_hapus')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_hapus') ?>
            </div>
          <?php endif; ?>
        </div>
        <?php
        $cfit = $this->db->query("SELECT nama_ujian from tb_ujian")->result();
        $holland = $this->db->query("SELECT nama_ujian from tb_ujian_holland")->result();
        $papikostik = $this->db->query("SELECT nama_ujian from tb_ujian_papi")->result();
        $leadership = $this->db->query("SELECT nama_ujian from tb_ujian_leadership")->result();
        $msdt = $this->db->query("SELECT nama_ujian from tb_ujian_msdt")->result();
        $epps = $this->db->query("SELECT nama_ujian from tb_ujian_epps")->result();
        $ist = $this->db->query("SELECT nama_ujian from tb_ujian_msdt")->result();
        $disc = $this->db->query("SELECT nama_ujian from tb_ujian_disc")->result();
        ?>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr align="center">
                  <th>Nama Pelamar</th>
                  <th>Posisi Jabatan</th>
                  <th>Nama Perusahaan</th>
                  <th>CFIT - <?= $cfit[0]->nama_ujian ?></th>
                  <th>Holland - <?= $holland[0]->nama_ujian ?></th>
                  <th>Papikostik - <?= $papikostik[0]->nama_ujian ?></th>
                  <th>Leadership - <?= $leadership[0]->nama_ujian ?></th>
                  <th>MSDT - <?= $msdt[0]->nama_ujian ?></th>
                  <th>EPPS - <?= $epps[0]->nama_ujian ?></th>
                  <th>IST - <?= $ist[0]->nama_ujian ?></th>
                  <th>DISC - <?= $disc[0]->nama_ujian ?></th>
                  <th>Hasil Wawancara</th>
                  <th>Kesimpulan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $modal = 0;
                foreach ($array as $key) {
                  $id_pelamar = $key['id_pelamar'];
                  $lowongan = $key['id_lowongan'];
                  $nmLowongan = $this->db->query("SELECT * FROM tb_lowongan");
                  $namaPer = $this->db->query("SELECT * FROM tb_perusahaan");

                  foreach ($nmLowongan->result() as $key_per) {
                    $idLowong = $key_per->id_lowongan;
                    $idPerus = $key_per->id_perusahaan;
                    if ($idLowong == $key['id_lowongan']) {
                      $namaJabatan = $key_per->nama_jabatan;
                      foreach ($namaPer->result() as $keyNama) {
                        if ($idPerus == $keyNama->id_perusahaan) {
                          $nmPerusahaan =  $keyNama->nama_perusahaan;
                        }
                      }
                    }
                  }

                  $dataDiri = $this->db->query("SELECT * FROM tb_data_diri");
                  foreach ($dataDiri->result() as $key_diri) {
                    if ($id_pelamar == $key_diri->id_pelamar) {
                      $nama_pelamar = $key_diri->nama_pelamar;
                    }
                  }
                ?>
                  <tr>
                    <td><?php echo $nama_pelamar ?></td>
                    <td><?php echo $namaJabatan ?></td>
                    <td><?php echo $nmPerusahaan ?></td>
                    <td><?php echo $key['cfit_kategori'] == '' ? '-' : $key['cfit_kategori']; ?></td>
                    <td><?php echo $key['holland_kategori'] == '' ? '-' : $key['holland_kategori']; ?></td>
                    <td><?php echo $key['papi_kategori'] == '' ? '-' : $key['papi_kategori']; ?></td>
                    <td><?php echo $key['leadership_kategori'] == '' ? '-' : $key['leadership_kategori']; ?></td>
                    <td><?php echo $key['msdt_kategori'] == '' ? '-' : $key['msdt_kategori']; ?></td>
                    <td><?php echo $key['epps_kategori'] == '' ? '-' : $key['epps_kategori']; ?></td>
                    <td><?php echo $key['ist_kategori'] == '' ? '-' : $key['ist_kategori']; ?></td>
                    <td><?php echo $key['disc_m_kategori'] == '' ? '-' : $key['disc_m_kategori']; ?></td>
                    <td><?php echo $key['hasil_wawancara'] == '' ? '-' : $key['hasil_wawancara']; ?></td>
                    <td><?php echo $key['kesimpulan'] == '' ? '-' : $key['kesimpulan']; ?></td>
                    <td>
                      <a href="<?php echo base_url('Psikolog/Data_nilai/detail_nilai/' . $key['id_nilai']) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                      <form method="post" action="<?php echo base_url('Administrator/Data_nilai/papigram/' . $lowongan . '/' . $id_pelamar) ?>">
                        <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
                        <input type="hidden" name="id_lowongan" value="<?php echo $lowongan ?>">
                        <button data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lihat Pelamar" type="submit" class="btn btn-dark"><i class="fa fa-eye"></i>Papigram</button>
                      </form>
                    </td>
                  </tr>
                <?php $modal++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>