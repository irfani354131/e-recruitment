<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-suitcase color-amber"></em>
                </a></li>
            <li class="active">Lowongan Tersedia</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lowongan Tersedia</h1>
        </div>
    </div>
    <!--/.row-->
    <!-- <div class="row align-items-stretch"> -->
    <?php
    $id_pelamar = $this->session->userdata('ses_id');
    $apply = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar");


    foreach ($array as $key) {
        $id_lowongan = $key['id_lowongan'];
        $id_perusahaan = $key['id_perusahaan'];

        $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

        foreach ($perusahaan->result() as $key_perusahaan) {
            if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {
                $nama_perusahaan = $key_perusahaan->nama_perusahaan;
                $logo_perusahaan = $key_perusahaan->logo_perusahaan;
            }
        }
    ?>
        <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">
            <div class="unit-4 d-block">
                <div class="card-img-block">
                    <img style="width: 130px" class="card-img-top" src="<?php echo ($logo_perusahaan != '' ? base_url('./upload/logo_perusahaan/' . $logo_perusahaan) : base_url('./upload/logo_perusahaan/img_default.jpg')); ?>">
                </div><br>
                <h3><?php echo $key['nama_jabatan'] ?></h3>
                <p><?php echo $nama_perusahaan ?></p>
                <div>
                    <a href="<?php echo base_url('Pelamar/Lamaran/lamarlowongan/' . $id_lowongan) ?>" class="btn btn-primary mr-2 mb-2">Lihat Lowongan</a>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- KEBUTUHAN REKRUTMEN RSUD KRIAN SIDOARJO -->

    <!-- <div class="row">
    <div class="col-lg-4">
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th class="text-center">RSUD KRIAN</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $id_pelamar = $this->session->userdata('ses_id');
            $data = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar");
            $i = 1;
            foreach ($array as $key) {
                $id_lowongan = $key['id_lowongan'];
                $id_perusahaan = $key['id_perusahaan'];

                $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

                foreach ($perusahaan->result() as $key_perusahaan) {
                    if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {
                        if ($key_perusahaan->id_perusahaan == "8") {
                            echo "<tr>";

                            if ($key['nama_jabatan'] == "Dokter Spesialis Anak") {
                                $n_lowo = "A1";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Obstetri dan Gynecologi") {
                                $n_lowo = "A2";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Bedah Umum") {
                                $n_lowo = "A3";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Penyakit Dalam") {
                                $n_lowo = "A4";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Anestesi") {
                                $n_lowo = "A5";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Radiologi") {
                                $n_lowo = "A6";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Patologi Klinik") {
                                $n_lowo = "A7";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Ortopedi dan Traumatologi") {
                                $n_lowo = "A8";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Forensik dan Medikolegal") {
                                $n_lowo = "A9";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Jantung") {
                                $n_lowo = "A10";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Kedokteran Fisik dan Rehabilitasi") {
                                $n_lowo = "A11";
                            } elseif ($key['nama_jabatan'] == "Dokter Gigi Spesialis Prosto") {
                                $n_lowo = "A12";
                            } elseif ($key['nama_jabatan'] == "Dokter Umum Ahli Pertama") {
                                $n_lowo = "A13";
                            } elseif ($key['nama_jabatan'] == "Dokter Gigi Ahli Pertama") {
                                $n_lowo = "A14";
                            } elseif ($key['nama_jabatan'] == "Apoteker") {
                                $n_lowo = "A15";
                            } elseif ($key['nama_jabatan'] == "Perawat Ahli (PNS)") {
                                $n_lowo = "A16";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil") {
                                $n_lowo = "A17";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil (Instrumen)") {
                                $n_lowo = "A18";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil (Sirkuler)") {
                                $n_lowo = "A19";
                            } elseif ($key['nama_jabatan'] == "Penata Anestesi") {
                                $n_lowo = "A20";
                            } elseif ($key['nama_jabatan'] == "Bidan Ahli") {
                                $n_lowo = "A21";
                            } elseif ($key['nama_jabatan'] == "Bidan Terampil") {
                                $n_lowo = "A22";
                            } elseif ($key['nama_jabatan'] == "Asisten Apoteker") {
                                $n_lowo = "A23";
                            } elseif ($key['nama_jabatan'] == "Pranata Lab") {
                                $n_lowo = "A24";
                            } elseif ($key['nama_jabatan'] == "Radiografer") {
                                $n_lowo = "A25";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis Ahli") {
                                $n_lowo = "A26";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis Pelaksana") {
                                $n_lowo = "A27";
                            } elseif ($key['nama_jabatan'] == "Perekam Medis Pelaksana") {
                                $n_lowo = "A28";
                            } elseif ($key['nama_jabatan'] == "Terapis Gigi dan Mulut Terampil") {
                                $n_lowo = "A29";
                            } elseif ($key['nama_jabatan'] == "Elektromedis Pelaksana") {
                                $n_lowo = "A30";
                            } elseif ($key['nama_jabatan'] == "Sanitarian Pelaksana") {
                                $n_lowo = "A31";
                            } elseif ($key['nama_jabatan'] == "Fisioterapi Terampil") {
                                $n_lowo = "A32";
                            } elseif ($key['nama_jabatan'] == "Administrator Kesehatan Ahli Pertama") {
                                $n_lowo = "A33";
                            } elseif ($key['nama_jabatan'] == "Analis Anggaran") {
                                $n_lowo = "A34";
                            } elseif ($key['nama_jabatan'] == "Analis Kebijakan Kesehatan") {
                                $n_lowo = "A35";
                            } elseif ($key['nama_jabatan'] == "Analis Kepegawaian") {
                                $n_lowo = "A36";
                            } elseif ($key['nama_jabatan'] == "Analis Keuangan") {
                                $n_lowo = "A37";
                            } elseif ($key['nama_jabatan'] == "Analis Pembiayaan") {
                                $n_lowo = "A38";
                            } elseif ($key['nama_jabatan'] == "Auditor (SPI)") {
                                $n_lowo = "A39";
                            } elseif ($key['nama_jabatan'] == "Bendahara Penerimaan") {
                                $n_lowo = "A40";
                            } elseif ($key['nama_jabatan'] == "Bendahara Pengeluaran") {
                                $n_lowo = "A41";
                            } elseif ($key['nama_jabatan'] == "Epidemiolog") {
                                $n_lowo = "A42";
                            } elseif ($key['nama_jabatan'] == "Pembimbing Kesehatan Kerja") {
                                $n_lowo = "A43";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan") {
                                $n_lowo = "A44";
                            } elseif ($key['nama_jabatan'] == "Pengelola Barang dan Jasa") {
                                $n_lowo = "A45";
                            } elseif ($key['nama_jabatan'] == "Penyuluh Kesmas") {
                                $n_lowo = "A46";
                            } elseif ($key['nama_jabatan'] == "Pengelola Sarana dan Prasarana Kantor") {
                                $n_lowo = "A47";
                            } elseif ($key['nama_jabatan'] == "Perencana") {
                                $n_lowo = "A48";
                            } elseif ($key['nama_jabatan'] == "Pranata humas ahli") {
                                $n_lowo = "A49";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasian Umum") {
                                $n_lowo = "A50";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer") {
                                $n_lowo = "A51";
                            } elseif ($key['nama_jabatan'] == "Teknik Sipil") {
                                $n_lowo = "A52";
                            } elseif ($key['nama_jabatan'] == "Teknik Elektro") {
                                $n_lowo = "A53";
                            } elseif ($key['nama_jabatan'] == "Juru Cuci") {
                                $n_lowo = "A54";
                            } elseif ($key['nama_jabatan'] == "Pemulasara Jenazah") {
                                $n_lowo = "A55";
                            } elseif ($key['nama_jabatan'] == "Juru Masak") {
                                $n_lowo = "A56";
                            } elseif ($key['nama_jabatan'] == "Pramubakti") {
                                $n_lowo = "A57";
                            } elseif ($key['nama_jabatan'] == "Pramusaji") {
                                $n_lowo = "A58";
                            } elseif ($key['nama_jabatan'] == "Driver Ambulans") {
                                $n_lowo = "A59";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Prambon)") {
                                $n_lowo = "B1";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Kedungsolo)") {
                                $n_lowo = "B2";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis (Puskesmas Kepadangan)") {
                                $n_lowo = "B3";
                            } elseif ($key['nama_jabatan'] == "Promosi Kesehatan (Puskesmas Wonoayu)") {
                                $n_lowo = "B4";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Wonoayu)") {
                                $n_lowo = "B5";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Wonoayu)") {
                                $n_lowo = "B6";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Wonoayu)") {
                                $n_lowo = "B7";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Sukodono)") {
                                $n_lowo = "B8";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Sukodono)") {
                                $n_lowo = "B9";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Sedati)") {
                                $n_lowo = "B10";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Gedangan)") {
                                $n_lowo = "B11";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Ganting)") {
                                $n_lowo = "B12";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Taman)") {
                                $n_lowo = "B13";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Krian)") {
                                $n_lowo = "B14";
                            } elseif ($key['nama_jabatan'] == "Perawat (Puskesmas Balongbendo)") {
                                $n_lowo = "B15";
                            } elseif ($key['nama_jabatan'] == "Promosi Kesehatan (Puskesmas Candi)") {
                                $n_lowo = "B16";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Candi)") {
                                $n_lowo = "B17";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Candi)") {
                                $n_lowo = "B18";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Candi)") {
                                $n_lowo = "B19";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Jabon)") {
                                $n_lowo = "B20";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Jabon)") {
                                $n_lowo = "B21";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Buduran)") {
                                $n_lowo = "B22";
                            } elseif ($key['nama_jabatan'] == "Administrator Kesehatan") {
                                $n_lowo = "C1";
                            } elseif ($key['nama_jabatan'] == "Pranata Hubungan Masyarakat") {
                                $n_lowo = "C2";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum") {
                                $n_lowo = "C3";
                            } elseif ($key['nama_jabatan'] == "Pengelola Layanan Kehumasan") {
                                $n_lowo = "C4";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum") {
                                $n_lowo = "C5";
                            } elseif ($key['nama_jabatan'] == "Tenaga Kesehatan Tradisional") {
                                $n_lowo = "C6";
                            } elseif ($key['nama_jabatan'] == "Perawat PSC") {
                                $n_lowo = "C7";
                            } elseif ($key['nama_jabatan'] == "Driver Sekretariat") {
                                $n_lowo = "C8";
                            } else {
                                // $n_lowo = $nama_lowo;
                                // echo "-";
                            }

                            echo "<td>" ?>
                    <a href="<?php echo base_url('Pelamar/Lamaran/lamarlowongan/' . $id_lowongan) ?>" class="text"><?php echo $i . ". " . $key['nama_jabatan'] . " (KODE: <font style='color: red'>" . $n_lowo . "</font>)" ?></a>
            <?php

                            echo "</td></tr>";
                            $i = $i + 1;
                        }
                    }
                }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th class="text-center">Puskesmas Se-Kabupaten Sidoarjo</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $id_pelamar = $this->session->userdata('ses_id');
            $data = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar");
            $iii = 1;
            foreach ($array as $key) {
                $id_lowongan = $key['id_lowongan'];
                $id_perusahaan = $key['id_perusahaan'];

                $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

                foreach ($perusahaan->result() as $key_perusahaan) {
                    if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {
                        if ($key_perusahaan->id_perusahaan == "10") {
                            echo "<tr>";

                            if ($key['nama_jabatan'] == "Dokter Spesialis Anak") {
                                $n_lowo = "A1";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Obstetri dan Gynecologi") {
                                $n_lowo = "A2";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Bedah Umum") {
                                $n_lowo = "A3";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Penyakit Dalam") {
                                $n_lowo = "A4";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Anestesi") {
                                $n_lowo = "A5";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Radiologi") {
                                $n_lowo = "A6";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Patologi Klinik") {
                                $n_lowo = "A7";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Ortopedi dan Traumatologi") {
                                $n_lowo = "A8";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Forensik dan Medikolegal") {
                                $n_lowo = "A9";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Jantung") {
                                $n_lowo = "A10";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Kedokteran Fisik dan Rehabilitasi") {
                                $n_lowo = "A11";
                            } elseif ($key['nama_jabatan'] == "Dokter Gigi Spesialis Prosto") {
                                $n_lowo = "A12";
                            } elseif ($key['nama_jabatan'] == "Dokter Umum Ahli Pertama") {
                                $n_lowo = "A13";
                            } elseif ($key['nama_jabatan'] == "Dokter Gigi Ahli Pertama") {
                                $n_lowo = "A14";
                            } elseif ($key['nama_jabatan'] == "Apoteker") {
                                $n_lowo = "A15";
                            } elseif ($key['nama_jabatan'] == "Perawat Ahli (PNS)") {
                                $n_lowo = "A16";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil") {
                                $n_lowo = "A17";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil (Instrumen)") {
                                $n_lowo = "A18";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil (Sirkuler)") {
                                $n_lowo = "A19";
                            } elseif ($key['nama_jabatan'] == "Penata Anestesi") {
                                $n_lowo = "A20";
                            } elseif ($key['nama_jabatan'] == "Bidan Ahli") {
                                $n_lowo = "A21";
                            } elseif ($key['nama_jabatan'] == "Bidan Terampil") {
                                $n_lowo = "A22";
                            } elseif ($key['nama_jabatan'] == "Asisten Apoteker") {
                                $n_lowo = "A23";
                            } elseif ($key['nama_jabatan'] == "Pranata Lab") {
                                $n_lowo = "A24";
                            } elseif ($key['nama_jabatan'] == "Radiografer") {
                                $n_lowo = "A25";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis Ahli") {
                                $n_lowo = "A26";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis Pelaksana") {
                                $n_lowo = "A27";
                            } elseif ($key['nama_jabatan'] == "Perekam Medis Pelaksana") {
                                $n_lowo = "A28";
                            } elseif ($key['nama_jabatan'] == "Terapis Gigi dan Mulut Terampil") {
                                $n_lowo = "A29";
                            } elseif ($key['nama_jabatan'] == "Elektromedis Pelaksana") {
                                $n_lowo = "A30";
                            } elseif ($key['nama_jabatan'] == "Sanitarian Pelaksana") {
                                $n_lowo = "A31";
                            } elseif ($key['nama_jabatan'] == "Fisioterapi Terampil") {
                                $n_lowo = "A32";
                            } elseif ($key['nama_jabatan'] == "Administrator Kesehatan Ahli Pertama") {
                                $n_lowo = "A33";
                            } elseif ($key['nama_jabatan'] == "Analis Anggaran") {
                                $n_lowo = "A34";
                            } elseif ($key['nama_jabatan'] == "Analis Kebijakan Kesehatan") {
                                $n_lowo = "A35";
                            } elseif ($key['nama_jabatan'] == "Analis Kepegawaian") {
                                $n_lowo = "A36";
                            } elseif ($key['nama_jabatan'] == "Analis Keuangan") {
                                $n_lowo = "A37";
                            } elseif ($key['nama_jabatan'] == "Analis Pembiayaan") {
                                $n_lowo = "A38";
                            } elseif ($key['nama_jabatan'] == "Auditor (SPI)") {
                                $n_lowo = "A39";
                            } elseif ($key['nama_jabatan'] == "Bendahara Penerimaan") {
                                $n_lowo = "A40";
                            } elseif ($key['nama_jabatan'] == "Bendahara Pengeluaran") {
                                $n_lowo = "A41";
                            } elseif ($key['nama_jabatan'] == "Epidemiolog") {
                                $n_lowo = "A42";
                            } elseif ($key['nama_jabatan'] == "Pembimbing Kesehatan Kerja") {
                                $n_lowo = "A43";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan") {
                                $n_lowo = "A44";
                            } elseif ($key['nama_jabatan'] == "Pengelola Barang dan Jasa") {
                                $n_lowo = "A45";
                            } elseif ($key['nama_jabatan'] == "Penyuluh Kesmas") {
                                $n_lowo = "A46";
                            } elseif ($key['nama_jabatan'] == "Pengelola Sarana dan Prasarana Kantor") {
                                $n_lowo = "A47";
                            } elseif ($key['nama_jabatan'] == "Perencana") {
                                $n_lowo = "A48";
                            } elseif ($key['nama_jabatan'] == "Pranata humas ahli") {
                                $n_lowo = "A49";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasian Umum") {
                                $n_lowo = "A50";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer") {
                                $n_lowo = "A51";
                            } elseif ($key['nama_jabatan'] == "Teknik Sipil") {
                                $n_lowo = "A52";
                            } elseif ($key['nama_jabatan'] == "Teknik Elektro") {
                                $n_lowo = "A53";
                            } elseif ($key['nama_jabatan'] == "Juru Cuci") {
                                $n_lowo = "A54";
                            } elseif ($key['nama_jabatan'] == "Pemulasara Jenazah") {
                                $n_lowo = "A55";
                            } elseif ($key['nama_jabatan'] == "Juru Masak") {
                                $n_lowo = "A56";
                            } elseif ($key['nama_jabatan'] == "Pramubakti") {
                                $n_lowo = "A57";
                            } elseif ($key['nama_jabatan'] == "Pramusaji") {
                                $n_lowo = "A58";
                            } elseif ($key['nama_jabatan'] == "Driver Ambulans") {
                                $n_lowo = "A59";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Prambon)") {
                                $n_lowo = "B1";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Kedungsolo)") {
                                $n_lowo = "B2";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis (Puskesmas Kepadangan)") {
                                $n_lowo = "B3";
                            } elseif ($key['nama_jabatan'] == "Promosi Kesehatan (Puskesmas Wonoayu)") {
                                $n_lowo = "B4";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Wonoayu)") {
                                $n_lowo = "B5";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Wonoayu)") {
                                $n_lowo = "B6";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Wonoayu)") {
                                $n_lowo = "B7";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Sukodono)") {
                                $n_lowo = "B8";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Sukodono)") {
                                $n_lowo = "B9";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Sedati)") {
                                $n_lowo = "B10";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Gedangan)") {
                                $n_lowo = "B11";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Ganting)") {
                                $n_lowo = "B12";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Taman)") {
                                $n_lowo = "B13";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Krian)") {
                                $n_lowo = "B14";
                            } elseif ($key['nama_jabatan'] == "Perawat (Puskesmas Balongbendo)") {
                                $n_lowo = "B15";
                            } elseif ($key['nama_jabatan'] == "Promosi Kesehatan (Puskesmas Candi)") {
                                $n_lowo = "B16";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Candi)") {
                                $n_lowo = "B17";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Candi)") {
                                $n_lowo = "B18";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Candi)") {
                                $n_lowo = "B19";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Jabon)") {
                                $n_lowo = "B20";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Jabon)") {
                                $n_lowo = "B21";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Buduran)") {
                                $n_lowo = "B22";
                            } elseif ($key['nama_jabatan'] == "Administrator Kesehatan") {
                                $n_lowo = "C1";
                            } elseif ($key['nama_jabatan'] == "Pranata Hubungan Masyarakat") {
                                $n_lowo = "C2";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum") {
                                $n_lowo = "C3";
                            } elseif ($key['nama_jabatan'] == "Pengelola Layanan Kehumasan") {
                                $n_lowo = "C4";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum") {
                                $n_lowo = "C5";
                            } elseif ($key['nama_jabatan'] == "Tenaga Kesehatan Tradisional") {
                                $n_lowo = "C6";
                            } elseif ($key['nama_jabatan'] == "Perawat PSC") {
                                $n_lowo = "C7";
                            } elseif ($key['nama_jabatan'] == "Driver Sekretariat") {
                                $n_lowo = "C8";
                            } else {
                                // $n_lowo = $nama_lowo;
                                // echo "-";
                            }

                            echo "<td>" ?>
                    <a href="<?php echo base_url('Pelamar/Lamaran/lamarlowongan/' . $id_lowongan) ?>" class="text"><?php echo $iii . ". " . $key['nama_jabatan'] . " (KODE: <font style='color: red'>" . $n_lowo . "</font>)" ?></a>
            <?php

                            echo "</td></tr>";
                        }
                    }
                }
                $iii = $iii + 1;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th class="text-center">Dinas Kesehatan Sidoarjo</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $id_pelamar = $this->session->userdata('ses_id');
            $data = $this->db->query("SELECT * FROM tb_apply WHERE id_pelamar = $id_pelamar");
            $ii = 1;
            foreach ($array as $key) {
                $id_lowongan = $key['id_lowongan'];
                $id_perusahaan = $key['id_perusahaan'];

                $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");

                foreach ($perusahaan->result() as $key_perusahaan) {
                    if ($key_perusahaan->id_perusahaan == $key['id_perusahaan']) {
                        if ($key_perusahaan->id_perusahaan == "9") {
                            echo "<tr>";

                            if ($key['nama_jabatan'] == "Dokter Spesialis Anak") {
                                $n_lowo = "A1";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Obstetri dan Gynecologi") {
                                $n_lowo = "A2";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Bedah Umum") {
                                $n_lowo = "A3";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Penyakit Dalam") {
                                $n_lowo = "A4";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Anestesi") {
                                $n_lowo = "A5";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Radiologi") {
                                $n_lowo = "A6";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Patologi Klinik") {
                                $n_lowo = "A7";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Ortopedi dan Traumatologi") {
                                $n_lowo = "A8";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Forensik dan Medikolegal") {
                                $n_lowo = "A9";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Jantung") {
                                $n_lowo = "A10";
                            } elseif ($key['nama_jabatan'] == "Dokter Spesialis Kedokteran Fisik dan Rehabilitasi") {
                                $n_lowo = "A11";
                            } elseif ($key['nama_jabatan'] == "Dokter Gigi Spesialis Prosto") {
                                $n_lowo = "A12";
                            } elseif ($key['nama_jabatan'] == "Dokter Umum Ahli Pertama") {
                                $n_lowo = "A13";
                            } elseif ($key['nama_jabatan'] == "Dokter Gigi Ahli Pertama") {
                                $n_lowo = "A14";
                            } elseif ($key['nama_jabatan'] == "Apoteker") {
                                $n_lowo = "A15";
                            } elseif ($key['nama_jabatan'] == "Perawat Ahli (PNS)") {
                                $n_lowo = "A16";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil") {
                                $n_lowo = "A17";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil (Instrumen)") {
                                $n_lowo = "A18";
                            } elseif ($key['nama_jabatan'] == "Perawat Terampil (Sirkuler)") {
                                $n_lowo = "A19";
                            } elseif ($key['nama_jabatan'] == "Penata Anestesi") {
                                $n_lowo = "A20";
                            } elseif ($key['nama_jabatan'] == "Bidan Ahli") {
                                $n_lowo = "A21";
                            } elseif ($key['nama_jabatan'] == "Bidan Terampil") {
                                $n_lowo = "A22";
                            } elseif ($key['nama_jabatan'] == "Asisten Apoteker") {
                                $n_lowo = "A23";
                            } elseif ($key['nama_jabatan'] == "Pranata Lab") {
                                $n_lowo = "A24";
                            } elseif ($key['nama_jabatan'] == "Radiografer") {
                                $n_lowo = "A25";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis Ahli") {
                                $n_lowo = "A26";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis Pelaksana") {
                                $n_lowo = "A27";
                            } elseif ($key['nama_jabatan'] == "Perekam Medis Pelaksana") {
                                $n_lowo = "A28";
                            } elseif ($key['nama_jabatan'] == "Terapis Gigi dan Mulut Terampil") {
                                $n_lowo = "A29";
                            } elseif ($key['nama_jabatan'] == "Elektromedis Pelaksana") {
                                $n_lowo = "A30";
                            } elseif ($key['nama_jabatan'] == "Sanitarian Pelaksana") {
                                $n_lowo = "A31";
                            } elseif ($key['nama_jabatan'] == "Fisioterapi Terampil") {
                                $n_lowo = "A32";
                            } elseif ($key['nama_jabatan'] == "Administrator Kesehatan Ahli Pertama") {
                                $n_lowo = "A33";
                            } elseif ($key['nama_jabatan'] == "Analis Anggaran") {
                                $n_lowo = "A34";
                            } elseif ($key['nama_jabatan'] == "Analis Kebijakan Kesehatan") {
                                $n_lowo = "A35";
                            } elseif ($key['nama_jabatan'] == "Analis Kepegawaian") {
                                $n_lowo = "A36";
                            } elseif ($key['nama_jabatan'] == "Analis Keuangan") {
                                $n_lowo = "A37";
                            } elseif ($key['nama_jabatan'] == "Analis Pembiayaan") {
                                $n_lowo = "A38";
                            } elseif ($key['nama_jabatan'] == "Auditor (SPI)") {
                                $n_lowo = "A39";
                            } elseif ($key['nama_jabatan'] == "Bendahara Penerimaan") {
                                $n_lowo = "A40";
                            } elseif ($key['nama_jabatan'] == "Bendahara Pengeluaran") {
                                $n_lowo = "A41";
                            } elseif ($key['nama_jabatan'] == "Epidemiolog") {
                                $n_lowo = "A42";
                            } elseif ($key['nama_jabatan'] == "Pembimbing Kesehatan Kerja") {
                                $n_lowo = "A43";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan") {
                                $n_lowo = "A44";
                            } elseif ($key['nama_jabatan'] == "Pengelola Barang dan Jasa") {
                                $n_lowo = "A45";
                            } elseif ($key['nama_jabatan'] == "Penyuluh Kesmas") {
                                $n_lowo = "A46";
                            } elseif ($key['nama_jabatan'] == "Pengelola Sarana dan Prasarana Kantor") {
                                $n_lowo = "A47";
                            } elseif ($key['nama_jabatan'] == "Perencana") {
                                $n_lowo = "A48";
                            } elseif ($key['nama_jabatan'] == "Pranata humas ahli") {
                                $n_lowo = "A49";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasian Umum") {
                                $n_lowo = "A50";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer") {
                                $n_lowo = "A51";
                            } elseif ($key['nama_jabatan'] == "Teknik Sipil") {
                                $n_lowo = "A52";
                            } elseif ($key['nama_jabatan'] == "Teknik Elektro") {
                                $n_lowo = "A53";
                            } elseif ($key['nama_jabatan'] == "Juru Cuci") {
                                $n_lowo = "A54";
                            } elseif ($key['nama_jabatan'] == "Pemulasara Jenazah") {
                                $n_lowo = "A55";
                            } elseif ($key['nama_jabatan'] == "Juru Masak") {
                                $n_lowo = "A56";
                            } elseif ($key['nama_jabatan'] == "Pramubakti") {
                                $n_lowo = "A57";
                            } elseif ($key['nama_jabatan'] == "Pramusaji") {
                                $n_lowo = "A58";
                            } elseif ($key['nama_jabatan'] == "Driver Ambulans") {
                                $n_lowo = "A59";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Prambon)") {
                                $n_lowo = "B1";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Kedungsolo)") {
                                $n_lowo = "B2";
                            } elseif ($key['nama_jabatan'] == "Nutrisionis (Puskesmas Kepadangan)") {
                                $n_lowo = "B3";
                            } elseif ($key['nama_jabatan'] == "Promosi Kesehatan (Puskesmas Wonoayu)") {
                                $n_lowo = "B4";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Wonoayu)") {
                                $n_lowo = "B5";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Wonoayu)") {
                                $n_lowo = "B6";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Wonoayu)") {
                                $n_lowo = "B7";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Sukodono)") {
                                $n_lowo = "B8";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Sukodono)") {
                                $n_lowo = "B9";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Sedati)") {
                                $n_lowo = "B10";
                            } elseif ($key['nama_jabatan'] == "Apoteker (Puskesmas Gedangan)") {
                                $n_lowo = "B11";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Ganting)") {
                                $n_lowo = "B12";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Taman)") {
                                $n_lowo = "B13";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Krian)") {
                                $n_lowo = "B14";
                            } elseif ($key['nama_jabatan'] == "Perawat (Puskesmas Balongbendo)") {
                                $n_lowo = "B15";
                            } elseif ($key['nama_jabatan'] == "Promosi Kesehatan (Puskesmas Candi)") {
                                $n_lowo = "B16";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Candi)") {
                                $n_lowo = "B17";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Candi)") {
                                $n_lowo = "B18";
                            } elseif ($key['nama_jabatan'] == "Sanitarian (Puskesmas Candi)") {
                                $n_lowo = "B19";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum (Puskesmas Jabon)") {
                                $n_lowo = "B20";
                            } elseif ($key['nama_jabatan'] == "Pengelola Keuangan (Puskesmas Jabon)") {
                                $n_lowo = "B21";
                            } elseif ($key['nama_jabatan'] == "Pranata Komputer (Puskesmas Buduran)") {
                                $n_lowo = "B22";
                            } elseif ($key['nama_jabatan'] == "Administrator Kesehatan") {
                                $n_lowo = "C1";
                            } elseif ($key['nama_jabatan'] == "Pranata Hubungan Masyarakat") {
                                $n_lowo = "C2";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum") {
                                $n_lowo = "C3";
                            } elseif ($key['nama_jabatan'] == "Pengelola Layanan Kehumasan") {
                                $n_lowo = "C4";
                            } elseif ($key['nama_jabatan'] == "Pengadministrasi Umum") {
                                $n_lowo = "C5";
                            } elseif ($key['nama_jabatan'] == "Tenaga Kesehatan Tradisional") {
                                $n_lowo = "C6";
                            } elseif ($key['nama_jabatan'] == "Perawat PSC") {
                                $n_lowo = "C7";
                            } elseif ($key['nama_jabatan'] == "Driver Sekretariat") {
                                $n_lowo = "C8";
                            } else {
                                // $n_lowo = $nama_lowo;
                                // echo "-";
                            }

                            echo "<td>" ?>
                    <a href="<?php echo base_url('Pelamar/Lamaran/lamarlowongan/' . $id_lowongan) ?>" class="text"><?php echo $ii . ". " . $key['nama_jabatan'] . " (KODE: <font style='color: red'>" . $n_lowo . "</font>)" ?></a>
            <?php

                            echo "</td></tr>";
                        }
                    }
                }
                $ii = $ii + 1;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div> -->

    <!-- BATAS RSUD KRIAN SIDOARJO -->

</div> -->
<!-- <nav class="justify-content-center text-center col-sm-12" aria-label="Page navigation example">
 <ul class="pagination">
   <li class="page-item">
     <a class="page-link" href="#" aria-label="Previous">
       <span aria-hidden="true">&laquo;</span>
       <span class="sr-only">Previous</span>
     </a>
   </li>
   <li class="page-item active"><a class="page-link" href="#">1</a></li>
   <li class="page-item"><a class="page-link" href="#">2</a></li>
   <li class="page-item"><a class="page-link" href="#">3</a></li>
   <li class="page-item">
     <a class="page-link" href="#" aria-label="Next">
       <span aria-hidden="true">&raquo;</span>
       <span class="sr-only">Next</span>
     </a>
   </li>
 </ul>
</nav>
</div>
</div>
<!--/.row-->
</div>
<!--/.main-->

<?php $this->load->view('layout3/footer') ?>