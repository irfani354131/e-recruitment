<?php $this->load->view('layout/header'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">

  <div class="app-title">

    <div>

      <h1><i class="fa fa-th-list"></i> Detail Nilai Pelamar</h1>

    </div>

    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

      <li class="breadcrumb-item">User</li>

      <li class="breadcrumb-item"><a href="#">Detail Nilai Pelamar</a></li>

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

        <div class="tile-body">

          <div class="table-responsive">

            <table class="table table-hover table-bordered" id="sampleTable" border="0">

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

                  <!-- Modal 2 -->

                  <div class="modal fade" id="myModal2" role="dialog">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title">Update Hasil</h4>

                        </div>

                        <div class="modal-body">
                          <?php if ($admin == 1) { ?>
                            <form action="<?php echo base_url('Administrator/Data_nilai/update_deskripsi/' . $key['id_nilai']) ?>" method="post">
                              <input type="hidden" name="id_lowongan" value="<?php echo $id_lowongan ?>">
                              <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
                            <?php } else {; ?>
                              <form action="<?php echo base_url('Psikolog/Data_nilai/update_deskripsi/' . $key['id_nilai']) ?>" method="post">
                              <?php } ?>
                              <input type="hidden" name="id_nilai" value="<?php echo $key['id_nilai'] ?>">
                              <div class="form-group">
                                <label class="control-label">CFIT Kategori</label>
                                <select class="form-control" name="cfit_kategori">
                                  <option value="Intellectual deficient" <?= $key['cfit_kategori'] == "Intellectual deficient" ? 'selected' : ''; ?>>Intellectual deficient</option>
                                  <option value="Borderline" <?= $key['cfit_kategori'] == "Borderline" ? 'selected' : ''; ?>>Borderline</option>
                                  <option value="Dibawah rata-rata" <?= $key['cfit_kategori'] == "Dibawah rata-rata" ? 'selected' : ''; ?>>Dibawah rata-rata</option>
                                  <option value="Rata-rata" <?= $key['cfit_kategori'] == "Rata-rata" ? 'selected' : ''; ?>>Rata-rata</option>
                                  <option value="Diatas rata-rata" <?= $key['cfit_kategori'] == "Diatas rata-rata" ? 'selected' : ''; ?>>Diatas rata-rata</option>
                                  <option value="Superior" <?= $key['cfit_kategori'] == "Superior" ? 'selected' : ''; ?>>Superior</option>
                                  <option value="Sangat superior" <?= $key['cfit_kategori'] == "Sangat superior" ? 'selected' : ''; ?>>Sangat superior</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Holland Kategori</label>
                                <input class="form-control" type="text" name="holland_kategori" value="<?php echo $key['holland_kategori'] == '' || $key['holland_kategori'] == ' ' ? '-' : $key['holland_kategori'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Essay Nilai</label>
                                <input class="form-control" type="text" name="essay_nilai" value="<?php echo $key['essay_nilai'] == '' || $key['essay_nilai'] == ' ' ? 0 : $key['essay_nilai'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Papikostik Kategori</label>
                                <input class="form-control" type="text" name="papi_kategori" value="<?php echo $key['papi_kategori'] == '' || $key['papi_kategori'] == ' ' ? '-' : $key['papi_kategori'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Studi Kasus Nilai</label>
                                <input class="form-control" type="text" name="studikasus_nilai" value="<?php echo $key['studikasus_nilai'] == '' || $key['studikasus_nilai'] == ' ' ? 0 : $key['studikasus_nilai'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Studi Kasus Bank Nilai</label>
                                <input class="form-control" type="text" name="studikasusbank_nilai" value="<?php echo $key['studikasusbank_nilai'] == '' || $key['studikasusbank_nilai'] == ' ' ? 0 : $key['studikasusbank_nilai'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Studi Kasus Manajerial Nilai</label>
                                <input class="form-control" type="text" name="studikasusmanajerial_nilai" value="<?php echo $key['studikasusmanajerial_nilai'] == '' || $key['studikasusmanajerial_nilai'] == ' ' ? 0 : $key['studikasusmanajerial_nilai'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Hitung Nilai</label>
                                <input class="form-control" type="text" name="hitung_nilai" value="<?php echo $key['hitung_nilai'] == '' || $key['hitung_nilai'] == ' ' ? 0 : $key['hitung_nilai'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Leadership Kategori</label>
                                <input class="form-control" type="text" name="leadership_kategori" value="<?php echo $key['leadership_kategori'] == '' || $key['leadership_kategori'] == ' ' ? '-' : $key['leadership_kategori'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">MSDT Kategori</label>
                                <select class="form-control" name="msdt_kategori">
                                  <option value="Deserter" <?= $key['msdt_kategori'] == "Deserter" ? 'selected' : ''; ?>>Deserter</option>
                                  <option value="Bureaucrat" <?= $key['msdt_kategori'] == "Bureaucrat" ? 'selected' : ''; ?>>Bureaucrat</option>
                                  <option value="Missionary" <?= $key['msdt_kategori'] == "Missionary" ? 'selected' : ''; ?>>Missionary</option>
                                  <option value="Developer" <?= $key['msdt_kategori'] == "Developer" ? 'selected' : ''; ?>>Developer</option>
                                  <option value="Autocrat" <?= $key['msdt_kategori'] == "Autocrat" ? 'selected' : ''; ?>>Autocrat</option>
                                  <option value="Benevolent Autocrat" <?= $key['msdt_kategori'] == "Benevolent Autocrat" ? 'selected' : ''; ?>>Benevolent Autocrat</option>
                                  <option value="Compromiser" <?= $key['msdt_kategori'] == "Compromiser" ? 'selected' : ''; ?>>Compromiser</option>
                                  <option value="Executive" <?= $key['msdt_kategori'] == "Executive" ? 'selected' : ''; ?>>Executive</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label class="control-label">EPPS Kategori</label>
                                <input class="form-control" type="text" name="epps_kategori" value="<?php echo $key['epps_kategori'] == '' || $key['epps_kategori'] == ' ' ? '-' : $key['epps_kategori'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">IST Kategori</label>
                                <select class="form-control" name="ist_kategori">
                                  <option value="Intellectual Deficient" <?= $key['ist_kategori'] == "Intellectual Deficient" ? 'selected' : ''; ?>>Intellectual Deficient</option>
                                  <option value="Borderline" <?= $key['ist_kategori'] == "Borderline" ? 'selected' : ''; ?>>Borderline</option>
                                  <option value="Di Bawah Rata-Rata" <?= $key['ist_kategori'] == "Di Bawah Rata-Rata" ? 'selected' : ''; ?>>Di Bawah Rata-Rata</option>
                                  <option value="Rata-Rata" <?= $key['ist_kategori'] == "Rata-Rata" ? 'selected' : ''; ?>>Rata-Rata</option>
                                  <option value="Di Atas Rata-Rata" <?= $key['ist_kategori'] == "Di Atas Rata-Rata" ? 'selected' : ''; ?>>Di Atas Rata-Rata</option>
                                  <option value="Superior" <?= $key['ist_kategori'] == "Superior" ? 'selected' : ''; ?>>Superior</option>
                                  <option value="Sangat Superior" <?= $key['ist_kategori'] == "Sangat Superior" ? 'selected' : ''; ?>>Sangat Superior</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label class="control-label">DISC MOST Kategori</label>
                                <select class="form-control" name="disc_m_kategori">
                                  <option value="-" <?= $key['disc_m_kategori'] == "" || $key['disc_m_kategori'] == " " ? 'selected' : ''; ?>>Pilih . . . </option>
                                  <option value="Dominance" <?= $key['disc_m_kategori'] == "Dominance" ? 'selected' : ''; ?>>Dominance</option>
                                  <option value="Influence" <?= $key['disc_m_kategori'] == "Influence" ? 'selected' : ''; ?>>Influence</option>
                                  <option value="Steadiness" <?= $key['disc_m_kategori'] == "Steadiness" ? 'selected' : ''; ?>>Steadiness</option>
                                  <option value="Compliance" <?= $key['disc_m_kategori'] == "Compliance" ? 'selected' : ''; ?>>Compliance</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label class="control-label">DISC LEST Kategori</label>
                                <select class="form-control" name="disc_l_kategori">
                                  <option value="-" <?= $key['disc_l_kategori'] == "" || $key['disc_l_kategori'] == " " ? 'selected' : ''; ?>>Pilih . . . </option>
                                  <option value="Dominance" <?= $key['disc_l_kategori'] == "Dominance" ? 'selected' : ''; ?>>Dominance</option>
                                  <option value="Influence" <?= $key['disc_l_kategori'] == "Influence" ? 'selected' : ''; ?>>Influence</option>
                                  <option value="Steadiness" <?= $key['disc_l_kategori'] == "Steadiness" ? 'selected' : ''; ?>>Steadiness</option>
                                  <option value="Compliance" <?= $key['disc_l_kategori'] == "Compliance" ? 'selected' : ''; ?>>Compliance</option>
                                </select>
                              </div>

                              <br>
                              <hr />

                              <div class="form-group">
                                <label class="control-label">Nilai Kemampuan Teknis</label>
                                <input class="form-control" type="text" name="kemampuan_teknis" value="<?php echo $key['kemampuan_teknis'] == '' || $key['kemampuan_teknis'] == ' ' ? '-' : $key['kemampuan_teknis'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Nilai Perhatian Terhadap Ketidakjelasan Intruksi</label>
                                <input class="form-control" type="text" name="perhatian_terhadap_ketidakjelasan_intruksi" value="<?php echo $key['perhatian_terhadap_ketidakjelasan_intruksi'] == '' || $key['perhatian_terhadap_ketidakjelasan_intruksi'] == ' ' ? '-' : $key['perhatian_terhadap_ketidakjelasan_intruksi'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Nilai Inisiatif</label>
                                <input class="form-control" type="text" name="inisiatif" value="<?php echo $key['inisiatif'] == '' || $key['inisiatif'] == ' ' ? '-' : $key['inisiatif'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Nilai Kerjasama</label>
                                <input class="form-control" type="text" name="kerjasama" value="<?php echo $key['kerjasama'] == '' || $key['kerjasama'] == ' ' ? '-' : $key['kerjasama'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Nilai Komitmen</label>
                                <input class="form-control" type="text" name="komitmen" value="<?php echo $key['komitmen'] == '' || $key['komitmen'] == ' ' ? '-' : $key['komitmen'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Nilai Kepemimpinan (Khusus Manajerial)</label>
                                <input class="form-control" type="text" name="kepemimpinan" value="<?php echo $key['kepemimpinan'] == '' || $key['kepemimpinan'] == ' ' ? '-' : $key['kepemimpinan'] ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label">Hasil Wawacara</label>
                                <select class="form-control" name="hasil_wawancara">
                                  <option value="-" <?= $key['hasil_wawancara'] == " " || $key['hasil_wawancara'] == "" ? 'selected' : ''; ?>>Pilih . . . </option>
                                  <option value="DIREKOMENDASIKAN" <?= $key['hasil_wawancara'] == "DIREKOMENDASIKAN" ? 'selected' : ''; ?>>DIREKOMENDASIKAN</option>
                                  <option value="DIPERTIMBANGKAN" <?= $key['hasil_wawancara'] == "DIPERTIMBANGKAN" ? 'selected' : ''; ?>>DIPERTIMBANGKAN</option>
                                  <option value="BELUM DIREKOMENDASIKAN" <?= $key['hasil_wawancara'] == "Dibawah rata-rata" ? 'selected' : ''; ?>>BELUM DIREKOMENDASIKAN</option>
                                </select>
                              </div>

                              <br>
                              <hr />

                              <div class="form-group">
                                <label class="control-label">Kesimpulan</label>
                                <select class="form-control" name="kesimpulan">
                                  <option value=" " <?= $key['kesimpulan'] == " " || $key['kesimpulan'] == "" ? 'selected' : ''; ?>>Pilih . . . </option>
                                  <option value="DIREKOMENDASIKAN" <?= $key['kesimpulan'] == "DIREKOMENDASIKAN" ? 'selected' : ''; ?>>DIREKOMENDASIKAN</option>
                                  <option value="DIPERTIMBANGKAN" <?= $key['kesimpulan'] == "DIPERTIMBANGKAN" ? 'selected' : ''; ?>>DIPERTIMBANGKAN</option>
                                  <option value="BELUM DIREKOMENDASIKAN" <?= $key['kesimpulan'] == "Dibawah rata-rata" ? 'selected' : ''; ?>>BELUM DIREKOMENDASIKAN</option>
                                </select>
                              </div>
                        </div>

                        <div class="modal-footer">

                          <input type="submit" value="Update Deskripsi" class="btn btn-primary">

                        </div>

                        </form>

                      </div>

                    </div>

                  </div>

                  <p>Nama Pelamar : <b><?php echo $nama_pelamar ?></b></p>

                  <p>Posisi Jabatan / Lowongan : <b><?php echo $namaJabatan ?></b></p>

                  <p>Perusahaan : <b><?php echo $nmPerusahaan ?></b></p>


                  <a style="margin-left: 86%; margin-bottom: 3%" data-toggle="modal" data-target="#myModal2" align="right" href="" class="btn btn-primary">Update Deskripsi</a>


                  <tr>
                    <th>CFIT : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Nilai</th>
                          <th>IQ</th>
                          <th>Kategori</th>
                        </tr>
                        <tr>
                          <td><?= $key['cfit_nilai']; ?></td>
                          <td><?= $key['cfit_iq']; ?></td>
                          <td><?= $key['cfit_kategori']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <th>HOLLAND : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>R</th>
                          <th>I</th>
                          <th>A</th>
                          <th>S</th>
                          <th>E</th>
                          <th>K</th>
                          <th>Kategori</th>
                        </tr>
                        <tr>
                          <td><?= $key['holland_r']; ?></td>
                          <td><?= $key['holland_i']; ?></td>
                          <td><?= $key['holland_a']; ?></td>
                          <td><?= $key['holland_s']; ?></td>
                          <td><?= $key['holland_e']; ?></td>
                          <td><?= $key['holland_k']; ?></td>
                          <td><?= $key['holland_kategori'] == "" ? '-' : $key['holland_kategori'] ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <th>ESSAY : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                          <th>Nilai</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td><?= $key['essay_1'] == ' ' || $key['essay_1'] == '' ? '-' : $key['essay_1']; ?></td>
                          <td><?= $key['essay_nilai'] == ' ' || $key['essay_nilai'] == '' ? '-' : $key['essay_nilai']; ?></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><?= $key['essay_2'] == ' ' || $key['essay_2'] == '' ? '-' : $key['essay_2']; ?></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td><?= $key['essay_3'] == ' ' || $key['essay_3'] == '' ? '-' : $key['essay_3']; ?></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td><?= $key['essay_4'] == ' ' || $key['essay_4'] == '' ? '-' : $key['essay_4']; ?></td>
                        </tr>
                        <tr>
                          <td>5A</td>
                          <td><?= $key['essay_5a'] == ' ' || $key['essay_5a'] == '' ? '-' : $key['essay_5a']; ?></td>
                        </tr>
                        <tr>
                          <td>5B</td>
                          <td><?= $key['essay_5b'] == ' ' || $key['essay_5b'] == '' ? '-' : $key['essay_5b']; ?></td>
                        </tr>
                        <tr>
                          <td>5C</td>
                          <td><?= $key['essay_5c'] == ' ' || $key['essay_5c'] == '' ? '-' : $key['essay_5c']; ?></td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td><?= $key['essay_6'] == ' ' || $key['essay_6'] == '' ? '-' : $key['essay_7']; ?></td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td><?= $key['essay_7'] == ' ' || $key['essay_7'] == '' ? '-' : $key['essay_7']; ?></td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td><?= $key['essay_8'] == ' ' || $key['essay_8'] == '' ? '-' : $key['essay_8']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>

                    <th>PAPIKOSTIK : </th>

                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Keterangan Aspek</th>
                          <th>Aspek</th>
                          <th>Nilai</th>
                          <th>Kategori</th>
                        </tr>
                        <tr>
                          <td rowspan="3">Work Direction</td>
                          <td>G</td>
                          <td><?= $key['papi_g']; ?></td>
                          <td rowspan="20"><?= $key['papi_kategori'] == '' ? '-' : $key['papi_kategori']; ?></td>
                        </tr>
                        <tr>
                          <td>N</td>
                          <td><?= $key['papi_n']; ?></td>
                        </tr>
                        <tr>
                          <td>A</td>
                          <td><?= $key['papi_a']; ?></td>
                        </tr>
                        <tr>
                          <td rowspan="3">Leadership</td>
                          <td>L</td>
                          <td><?= $key['papi_l']; ?></td>
                        </tr>
                        <tr>
                          <td>P</td>
                          <td><?= $key['papi_p']; ?></td>
                        </tr>
                        <tr>
                          <td>I</td>
                          <td><?= $key['papi_i']; ?></td>
                        </tr>
                        <tr>
                          <td rowspan="2">Activity</td>
                          <td>T</td>
                          <td><?= $key['papi_t']; ?></td>
                        </tr>
                        <tr>
                          <td>V</td>
                          <td><?= $key['papi_v']; ?></td>
                        </tr>
                        <tr>
                          <td rowspan="4">Social Nature</td>
                          <td>O</td>
                          <td><?= $key['papi_o']; ?></td>
                        </tr>
                        <tr>
                          <td>B</td>
                          <td><?= $key['papi_b']; ?></td>
                        </tr>
                        <tr>
                          <td>S</td>
                          <td><?= $key['papi_s']; ?></td>
                        </tr>
                        <tr>
                          <td>X</td>
                          <td><?= $key['papi_x']; ?></td>
                        </tr>
                        <tr>
                          <td rowspan="3">Work Style</td>
                          <td>C</td>
                          <td><?= $key['papi_c']; ?></td>
                        </tr>
                        <tr>
                          <td>D</td>
                          <td><?= $key['papi_d']; ?></td>
                        </tr>
                        <tr>
                          <td>R</td>
                          <td><?= $key['papi_r']; ?></td>
                        </tr>
                        <tr>
                          <td rowspan="3">Temperament</td>
                          <td>Z</td>
                          <td><?= $key['papi_z']; ?></td>
                        </tr>
                        <tr>
                          <td>E</td>
                          <td><?= $key['papi_e']; ?></td>
                        </tr>
                        <tr>
                          <td>K</td>
                          <td><?= $key['papi_k']; ?></td>
                        </tr>
                        <tr>
                          <td rowspan="2">Followership</td>
                          <td>F</td>
                          <td><?= $key['papi_f']; ?></td>
                        </tr>
                        <tr>
                          <td>W</td>
                          <td><?= $key['papi_w']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>TALENT : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                        </tr>
                        <tr>
                          <td>Kelebihan</td>
                          <td><?= $key['talent_1'] == '' || $key['talent_1'] == ' ' ? '-' : $key['talent_1']; ?></td>
                        </tr>
                        <tr>
                          <td>Kekurangan</td>
                          <td><?= $key['talent_2'] == '' || $key['talent_2'] == ' ' ? '-' : $key['talent_2']; ?></td>
                        </tr>
                        <tr>
                          <td>Gambaran 5 Tahun Kedepan</td>
                          <td><?= $key['talent_3'] == '' || $key['talent_3'] == ' ' ? '-' : $key['talent_3']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>Studi Kasus : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                          <th>Nilai</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td><?= $key['studikasus_1'] == '' || $key['studikasus_1'] == ' ' ? '-' : $key['studikasus_1']; ?></td>
                          <td rowspan="2"><?= $key['studikasus_nilai'] == '' || $key['studikasus_nilai'] == ' ' ? '-' : $key['studikasus_nilai']; ?></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><?= $key['studikasus_2'] == '' || $key['studikasus_2'] == ' ' ? '-' : $key['studikasus_2']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>Studi Kasus Bank : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                          <th>Nilai</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td><?= $key['studikasusbank_1'] == '' || $key['studikasusbank_1'] == ' ' ? '-' : $key['studikasusbank_1']; ?></td>
                          <td rowspan="2"><?= $key['studikasusbank_nilai'] == '' || $key['studikasusbank_nilai'] == ' ' ? '-' : $key['studikasusbank_nilai']; ?></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><?= $key['studikasusbank_2'] == '' || $key['studikasusbank_2'] == ' ' ? '-' : $key['studikasusbank_2']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>Studi Kasus Manajerial : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                          <th>Nilai</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td><?= $key['studikasusmanajerial'] == '' || $key['studikasusmanajerial'] == ' ' ? '-' : $key['studikasusmanajerial']; ?></td>
                          <td rowspan="2"><?= $key['studikasusmanajerial'] == '' || $key['studikasusmanajerial'] == ' ' ? '-' : $key['studikasusmanajerial']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>Hitung : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                          <th>Nilai</th>
                        </tr>
                        <tr>
                          <td>1A</td>
                          <td><?= $key['hitung_1a'] == '' || $key['hitung_1a'] == ' ' ? '-' : $key['hitung_1a']; ?></td>
                          <td rowspan="2"><?= $key['hitung_nilai'] == '' || $key['hitung_nilai'] == ' ' ? '-' : $key['hitung_nilai']; ?></td>
                        </tr>
                        <tr>
                          <td>1B</td>
                          <td><?= $key['hitung_1b'] == '' || $key['hitung_1b'] == ' ' ? '-' : $key['hitung_1b']; ?></td>
                        </tr>
                        <tr>
                          <td>1C</td>
                          <td><?= $key['hitung_1c'] == '' || $key['hitung_1c'] == ' ' ? '-' : $key['hitung_1c']; ?></td>
                        </tr>
                        <tr>
                          <td>1D</td>
                          <td><?= $key['hitung_1d'] == '' || $key['hitung_1d'] == ' ' ? '-' : $key['hitung_1d']; ?></td>
                        </tr>
                        <tr>
                          <td>2A</td>
                          <td><?= $key['hitung_2a'] == '' || $key['hitung_2a'] == ' ' ? '-' : $key['hitung_2a']; ?></td>
                        </tr>
                        <tr>
                          <td>2B</td>
                          <td><?= $key['hitung_2b'] == '' || $key['hitung_2b'] == ' ' ? '-' : $key['hitung_2b']; ?></td>
                        </tr>
                        <tr>
                          <td>2C</td>
                          <td><?= $key['hitung_2c'] == '' || $key['hitung_2c'] == ' ' ? '-' : $key['hitung_2c']; ?></td>
                        </tr>
                        <tr>
                          <td>3A</td>
                          <td><?= $key['hitung_3a'] == '' || $key['hitung_3a'] == ' ' ? '-' : $key['hitung_3a']; ?></td>
                        </tr>
                        <tr>
                          <td>3B</td>
                          <td><?= $key['hitung_3b'] == '' || $key['hitung_3b'] == ' ' ? '-' : $key['hitung_3b']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>LEADERSHIP : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Pertanyaan</th>
                          <th>Jawaban</th>
                          <th>Kategori</th>
                        </tr>
                        <?php for ($i = 1; $i <= 22; $i++) { ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $key['leadership_' . $i] == '' || $key['leadership_' . $i] == ' ' ? '-' : $key['leadership_' . $i]; ?></td>
                            <?php if ($i == 1) { ?>
                              <td><?= $key['leadership_kategori'] == '' || $key['leadership_kategori'] == ' ' ? '-' : $key['leadership_kategori']; ?></td>
                            <?php
                            } ?>
                          </tr>
                        <?php } ?>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>RMIB : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>&nbsp;</th>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                        </tr>
                        <tr>
                          <th>Paling Disukai</th>
                          <td><?= $key['rmib_pd_1'] == '' || $key['rmib_pd_1'] == ' ' ? '-' : $key['rmib_pd_1']; ?></td>
                          <td><?= $key['rmib_pd_2'] == '' || $key['rmib_pd_2'] == ' ' ? '-' : $key['rmib_pd_2']; ?></td>
                          <td><?= $key['rmib_pd_3'] == '' || $key['rmib_pd_3'] == ' ' ? '-' : $key['rmib_pd_3']; ?></td>
                        </tr>
                        <tr>
                          <th>Paling Tidak Disukai</th>
                          <td><?= $key['rmib_ptd_1'] == '' || $key['rmib_ptd_1'] == ' ' ? '-' : $key['rmib_ptd_1']; ?></td>
                          <td><?= $key['rmib_ptd_2'] == '' || $key['rmib_ptd_2'] == ' ' ? '-' : $key['rmib_ptd_2']; ?></td>
                          <td><?= $key['rmib_ptd_3'] == '' || $key['rmib_ptd_3'] == ' ' ? '-' : $key['rmib_ptd_3']; ?></td>
                        </tr>
                        <tr>
                          <th>Form Profesi</th>
                          <td><?= $key['rmib_fp_1'] == '' || $key['rmib_fp_1'] == ' ' ? '-' : $key['rmib_fp_1']; ?></td>
                          <td><?= $key['rmib_fp_2'] == '' || $key['rmib_fp_2'] == ' ' ? '-' : $key['rmib_fp_2']; ?></td>
                          <td><?= $key['rmib_fp_3'] == '' || $key['rmib_fp_3'] == ' ' ? '-' : $key['rmib_fp_3']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>MSDT : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>TO</th>
                          <th>RO</th>
                          <th>E</th>
                          <th>Kategori</th>
                        </tr>
                        <tr>
                          <td><?= $key['msdt_to'] == '' || $key['msdt_to'] == ' ' ? '-' : $key['msdt_to']; ?></td>
                          <td><?= $key['msdt_ro'] == '' || $key['msdt_ro'] == ' ' ? '-' : $key['msdt_ro']; ?></td>
                          <td><?= $key['msdt_e'] == '' || $key['msdt_e'] == ' ' ? '-' : $key['msdt_e']; ?></td>
                          <td><?= $key['msdt_kategori'] == '' || $key['msdt_kategori'] == ' ' ? '-' : $key['msdt_kategori']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>EPPS : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th rowspan="2">Konsistensi</th>
                          <th rowspan="2">Keterangan Aspek</th>
                          <th rowspan="2">Aspek</th>
                          <th colspan="2">S</th>
                          <th colspan="2">NEED</th>
                          <th rowspan="2">Kategori</th>
                        </tr>
                        <tr>
                          <th>Nilai</th>
                          <th>Total</th>
                          <th>Nilai</th>
                          <th>Total</th>
                        </tr>
                        <tr>
                          <td rowspan="15"><?= $key['epps_cons'] == '' || $key['epps_cons'] == ' ' ? '-' : $key['epps_cons']; ?></td>
                          <td rowspan="5">Sikap Kerja</td>
                          <td>END</td>
                          <td><?= $key['epps_s_end'] ?></td>
                          <td rowspan="5"><?= $key['epps_s_end'] + $key['epps_s_chg'] + $key['epps_s_ach'] + $key['epps_s_ord'] + $key['epps_s_aut'] ?></td>
                          <td><?= $key['epps_n_end'] ?></td>
                          <td rowspan="5"><?= $key['epps_n_end'] + $key['epps_n_chg'] + $key['epps_n_ach'] + $key['epps_n_ord'] + $key['epps_n_aut'] ?></td>
                          <td rowspan="15"><?= $key['epps_kategori'] == '' || $key['epps_kategori'] == ' ' ? '-' : $key['epps_kategori']; ?></td>
                        </tr>
                        <tr>
                          <td>CHG</td>
                          <td><?= $key['epps_s_chg'] ?></td>
                          <td><?= $key['epps_n_chg'] ?></td>
                        </tr>
                        <tr>
                          <td>ACH</td>
                          <td><?= $key['epps_s_ach'] ?></td>
                          <td><?= $key['epps_n_ach'] ?></td>
                        </tr>
                        <tr>
                          <td>ORD</td>
                          <td><?= $key['epps_s_ord'] ?></td>
                          <td><?= $key['epps_n_ord'] ?></td>
                        </tr>
                        <tr>
                          <td>AUT</td>
                          <td><?= $key['epps_s_aut'] ?></td>
                          <td><?= $key['epps_n_aut'] ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>AFF</td>
                          <td><?= $key['epps_s_aff'] ?></td>
                          <td><?= $key['epps_s_aff'] ?></td>
                          <td><?= $key['epps_n_aff'] ?></td>
                          <td><?= $key['epps_n_aff'] ?></td>
                        </tr>
                        <tr>
                          <td rowspan="5"> Sikap Sosial</td>
                          <td>INT</td>
                          <td><?= $key['epps_s_int'] ?></td>
                          <td rowspan="5"><?= $key['epps_s_int'] + $key['epps_s_def'] + $key['epps_s_nur'] + $key['epps_s_suc'] + $key['epps_s_dom'] ?></td>
                          <td><?= $key['epps_s_int'] ?></td>
                          <td rowspan="5"><?= $key['epps_n_int'] + $key['epps_n_def'] + $key['epps_n_nur'] + $key['epps_n_suc'] + $key['epps_n_dom'] ?></td>
                        </tr>
                        <tr>
                          <td>DEF</td>
                          <td><?= $key['epps_s_def'] ?></td>
                          <td><?= $key['epps_n_def'] ?></td>
                        </tr>
                        <tr>
                          <td>NUR</td>
                          <td><?= $key['epps_s_nur'] ?></td>
                          <td><?= $key['epps_n_nur'] ?></td>
                        </tr>
                        <tr>
                          <td>SUC</td>
                          <td><?= $key['epps_s_suc'] ?></td>
                          <td><?= $key['epps_n_suc'] ?></td>
                        </tr>
                        <tr>
                          <td>DOM</td>
                          <td><?= $key['epps_s_dom'] ?></td>
                          <td><?= $key['epps_n_dom'] ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>ABA</td>
                          <td><?= $key['epps_s_aba'] ?></td>
                          <td><?= $key['epps_s_aba'] ?></td>
                          <td><?= $key['epps_n_aba'] ?></td>
                          <td><?= $key['epps_n_aba'] ?></td>
                        </tr>
                        <tr>
                          <td rowspan="3">Sikap Diri</td>
                          <td>EXH</td>
                          <td><?= $key['epps_s_exh'] ?></td>
                          <td rowspan="3"><?= $key['epps_s_exh'] + $key['epps_s_het'] + $key['epps_s_agg'] ?></td>
                          <td><?= $key['epps_s_exh'] ?></td>
                          <td rowspan="3"><?= $key['epps_n_exh'] + $key['epps_n_het'] + $key['epps_n_agg'] ?></td>
                        </tr>
                        <tr>
                          <td>HET</td>
                          <td><?= $key['epps_s_het'] ?></td>
                          <td><?= $key['epps_n_het'] ?></td>
                        </tr>
                        <tr>
                          <td>AGG</td>
                          <td><?= $key['epps_s_agg'] ?></td>
                          <td><?= $key['epps_n_agg'] ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>

                  <tr>
                    <th>IST : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Aspek</th>
                          <th>Nilai RS</th>
                          <th>Nilai SS</th>
                          <th>Kategori</th>
                        </tr>
                        <tr>
                          <td>SE</td>
                          <td><?= $key['ist_rs_se'] ?></td>
                          <td><?= $key['ist_ss_se'] ?></td>
                          <td rowspan="10"><?= $key['ist_kategori'] == '' || $key['ist_kategori'] == ' ' ? '-' : $key['ist_kategori']; ?></td>
                        </tr>
                        <tr>
                          <td>WA</td>
                          <td><?= $key['ist_rs_wa'] ?></td>
                          <td><?= $key['ist_ss_wa'] ?></td>
                        </tr>
                        <tr>
                          <td>AN</td>
                          <td><?= $key['ist_rs_an'] ?></td>
                          <td><?= $key['ist_ss_an'] ?></td>
                        </tr>
                        <tr>
                          <td>GE</td>
                          <td><?= $key['ist_rs_ge'] ?></td>
                          <td><?= $key['ist_ss_ge'] ?></td>
                        </tr>
                        <tr>
                          <td>RA</td>
                          <td><?= $key['ist_rs_ra'] ?></td>
                          <td><?= $key['ist_ss_ra'] ?></td>
                        </tr>
                        <tr>
                          <td>ZR</td>
                          <td><?= $key['ist_rs_zr'] ?></td>
                          <td><?= $key['ist_ss_zr'] ?></td>
                        </tr>
                        <tr>
                          <td>FA</td>
                          <td><?= $key['ist_rs_fa'] ?></td>
                          <td><?= $key['ist_ss_fa'] ?></td>
                        </tr>
                        <tr>
                          <td>WU</td>
                          <td><?= $key['ist_rs_wu'] ?></td>
                          <td><?= $key['ist_ss_wu'] ?></td>
                        </tr>
                        <tr>
                          <td>ME</td>
                          <td><?= $key['ist_rs_me'] ?></td>
                          <td><?= $key['ist_ss_me'] ?></td>
                        </tr>
                        <tr>
                          <td>GESAMT</td>
                          <td><?= $key['ist_rs_gesamt'] ?></td>
                          <td><?= $key['ist_ss_gesamt'] ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>DISC : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th rowspan="2">&nbsp;</th>
                          <th colspan="2">MOST</th>
                          <th colspan="2">LEST</th>
                        </tr>
                        <tr>
                          <th>Nilai</th>
                          <th>Konvert</th>
                          <th>Nilai</th>
                          <th>Konvert</th>
                        </tr>
                        <tr>
                          <td>D</td>
                          <td><?= $key['disc_m_n_d'] == '' || $key['disc_m_n_d'] == ' ' ? '-' : $key['disc_m_n_d']; ?></td>
                          <td><?= $key['disc_m_k_d'] == '' || $key['disc_m_k_d'] == ' ' ? '-' : $key['disc_m_k_d']; ?></td>
                          <td><?= $key['disc_l_n_d'] == '' || $key['disc_l_n_d'] == ' ' ? '-' : $key['disc_l_n_d']; ?></td>
                          <td><?= $key['disc_l_k_d'] == '' || $key['disc_l_k_d'] == ' ' ? '-' : $key['disc_l_k_d']; ?></td>
                        </tr>
                        <tr>
                          <td>I</td>
                          <td><?= $key['disc_m_n_i'] == '' || $key['disc_m_n_i'] == ' ' ? '-' : $key['disc_m_n_i']; ?></td>
                          <td><?= $key['disc_m_k_i'] == '' || $key['disc_m_k_i'] == ' ' ? '-' : $key['disc_m_k_i']; ?></td>
                          <td><?= $key['disc_l_n_i'] == '' || $key['disc_l_n_i'] == ' ' ? '-' : $key['disc_l_n_i']; ?></td>
                          <td><?= $key['disc_l_k_i'] == '' || $key['disc_l_k_i'] == ' ' ? '-' : $key['disc_l_k_i']; ?></td>
                        </tr>
                        <tr>
                          <td>S</td>
                          <td><?= $key['disc_m_n_s'] == '' || $key['disc_m_n_s'] == ' ' ? '-' : $key['disc_m_n_s']; ?></td>
                          <td><?= $key['disc_m_k_s'] == '' || $key['disc_m_k_s'] == ' ' ? '-' : $key['disc_m_k_s']; ?></td>
                          <td><?= $key['disc_l_n_s'] == '' || $key['disc_l_n_s'] == ' ' ? '-' : $key['disc_l_n_s']; ?></td>
                          <td><?= $key['disc_l_k_s'] == '' || $key['disc_l_k_s'] == ' ' ? '-' : $key['disc_l_k_s']; ?></td>
                        </tr>
                        <tr>
                          <td>C</td>
                          <td><?= $key['disc_m_n_c'] == '' || $key['disc_m_n_c'] == ' ' ? '-' : $key['disc_m_n_c']; ?></td>
                          <td><?= $key['disc_m_k_c'] == '' || $key['disc_m_k_c'] == ' ' ? '-' : $key['disc_m_k_c']; ?></td>
                          <td><?= $key['disc_l_n_c'] == '' || $key['disc_l_n_c'] == ' ' ? '-' : $key['disc_l_n_c']; ?></td>
                          <td><?= $key['disc_l_k_c'] == '' || $key['disc_l_k_c'] == ' ' ? '-' : $key['disc_l_k_c']; ?></td>
                        </tr>
                        <tr>
                          <td>X</td>
                          <td><?= $key['disc_m_n_x'] == '' || $key['disc_m_n_x'] == ' ' ? '-' : $key['disc_m_n_x']; ?></td>
                          <td><?= $key['disc_m_k_x'] == '' || $key['disc_m_k_x'] == ' ' ? '-' : $key['disc_m_k_x']; ?></td>
                          <td><?= $key['disc_l_n_x'] == '' || $key['disc_l_n_x'] == ' ' ? '-' : $key['disc_l_n_x']; ?></td>
                          <td><?= $key['disc_l_k_x'] == '' || $key['disc_l_k_x'] == ' ' ? '-' : $key['disc_l_k_x']; ?></td>
                        </tr>
                        <tr>
                          <td>Kategori</td>
                          <td colspan="2"><?= $key['disc_m_kategori'] == '' || $key['disc_m_kategori'] == ' ' ? '-' : $key['disc_m_kategori']; ?></td>
                          <td colspan="2"><?= $key['disc_l_kategori'] == '' || $key['disc_l_kategori'] == ' ' ? '-' : $key['disc_l_kategori']; ?></td>
                        </tr>

                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>Nilai Wawancara : </th>
                    <td>
                      <table class="table table-success table-striped">
                        <tr>
                          <th>Kemampuan Teknis</th>
                          <th>Perhatian Terhadap Ketidakjelasan Intruksi</th>
                          <th>Inisiatif</th>
                          <th>Kerjasama</th>
                          <th>Komitmen</th>
                          <th>Kepemimpinan (Khusus Manajerial)</th>
                          <th>Kesimpuan Wawancara</th>
                        </tr>
                        <tr>
                          <td rowspan="10"><?= $key['kemampuan_teknis'] == '' || $key['kemampuan_teknis'] == ' ' ? '-' : $key['kemampuan_teknis']; ?></td>
                          <td rowspan="10"><?= $key['perhatian_terhadap_ketidakjelasan_intruksi'] == '' || $key['perhatian_terhadap_ketidakjelasan_intruksi'] == ' ' ? '-' : $key['perhatian_terhadap_ketidakjelasan_intruksi']; ?></td>
                          <td rowspan="10"><?= $key['inisiatif'] == '' || $key['inisiatif'] == ' ' ? '-' : $key['inisiatif']; ?></td>
                          <td rowspan="10"><?= $key['kerjasama'] == '' || $key['kerjasama'] == ' ' ? '-' : $key['kerjasama']; ?></td>
                          <td rowspan="10"><?= $key['komitmen'] == '' || $key['komitmen'] == ' ' ? '-' : $key['komitmen']; ?></td>
                          <td rowspan="10"><?= $key['kepemimpinan'] == '' || $key['kepemimpinan'] == ' ' ? '-' : $key['kepemimpinan']; ?></td>
                          <td rowspan="10"><?= $key['hasil_wawancara'] == '' || $key['hasil_wawancara'] == ' ' ? '-' : $key['hasil_wawancara']; ?></td>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <th>Kesimpulan Keseluruhan: </th>
                    <td><b><?= $key['kesimpulan'] == '' ? '-' : $key['kesimpulan'] ?></b></td>
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