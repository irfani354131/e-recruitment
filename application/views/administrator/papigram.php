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
                <?php
                $dataDiri = $this->db->query("SELECT * FROM tb_data_diri where id_pelamar=$id_pelamar");
                $dataPerusahaan = $this->db->query("SELECT nama_jabatan, nama_perusahaan FROM tb_lowongan a LEFT JOIN tb_perusahaan b ON a.id_perusahaan=b.id_perusahaan WHERE a.id_lowongan=$id_lowongan")->result();
                foreach ($dataDiri->result() as $key_diri) {
                    if ($id_pelamar == $key_diri->id_pelamar) {
                        $nama_pelamar = $key_diri->nama_pelamar;
                        $tgl_lhr = $key_diri->tanggal_lahir;

                        $from = new DateTime($tgl_lhr);
                        $to   = new DateTime('today');
                        $umur = $from->diff($to)->y;
                    }
                    $pt = $key_diri->id_pelamar;
                    $pendidikan = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar = $pt AND tahun_keluar = (SELECT MAX(tahun_keluar) AS a FROM tb_data_pendidikan WHERE id_pelamar=$pt)")->result();
                }
                foreach ($dataPerusahaan as $key_perus) {
                    $namaJabatan = $key_perus->nama_jabatan;
                    $nmPerusahaan = $key_perus->nama_perusahaan;
                }
                ?>
                <p>Nama Pelamar : <b><?php echo $nama_pelamar ?></b></p>
                <p>Posisi Jabatan / Lowongan : <b><?php echo $namaJabatan ?></b></p>
                <p>Perusahaan : <b><?php echo $nmPerusahaan ?></b></p>
                <p>Umur : <b><?php echo $umur; ?></b></p>
                <p>Pendidikan Terakhir : <b><?php echo $pendidikan[0]->jenjang_pendidikan; ?></b></p>
                <div class="chart-container" style="position: responsive;">
                    <canvas id="papigram">
                        <!--<div class="chart-container">
                    //<canvas id="papigram" style="margin: 0 auto;">-->
                    </canvas>
                </div>
                <a class="btn btn-primary" href="<?php echo base_url('Administrator/Data_nilai/data_nilai/' . $id_lowongan) ?>">Kembali</a>
                <?php

                function papi($a, $low, $pel, $hrf)
                {
                    $papi = $a->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE id_lowongan = $low AND id_pelamar=$pel AND jawaban='$hrf'")->result_array();
                    return $papi[0]['jumlah'];
                }
                $g = intval(papi($this->db, $id_lowongan, $id_pelamar, 'G'));
                $n = intval(papi($this->db, $id_lowongan, $id_pelamar, 'N'));
                $a = intval(papi($this->db, $id_lowongan, $id_pelamar, 'A'));
                $l = intval(papi($this->db, $id_lowongan, $id_pelamar, 'L'));
                $p = intval(papi($this->db, $id_lowongan, $id_pelamar, 'P'));
                $i = intval(papi($this->db, $id_lowongan, $id_pelamar, 'I'));
                $t = intval(papi($this->db, $id_lowongan, $id_pelamar, 'T'));
                $v = intval(papi($this->db, $id_lowongan, $id_pelamar, 'V'));
                $o = intval(papi($this->db, $id_lowongan, $id_pelamar, 'O'));
                $b = intval(papi($this->db, $id_lowongan, $id_pelamar, 'B'));
                $s = intval(papi($this->db, $id_lowongan, $id_pelamar, 'S'));
                $x = intval(papi($this->db, $id_lowongan, $id_pelamar, 'X'));
                $c = intval(papi($this->db, $id_lowongan, $id_pelamar, 'C'));
                $d = intval(papi($this->db, $id_lowongan, $id_pelamar, 'D'));
                $r = intval(papi($this->db, $id_lowongan, $id_pelamar, 'R'));
                $z = intval(papi($this->db, $id_lowongan, $id_pelamar, 'Z'));
                $e = intval(papi($this->db, $id_lowongan, $id_pelamar, 'E'));
                $k = intval(papi($this->db, $id_lowongan, $id_pelamar, 'K'));
                $f = intval(papi($this->db, $id_lowongan, $id_pelamar, 'F'));
                $w = intval(papi($this->db, $id_lowongan, $id_pelamar, 'W'));
                ?>
                <script>
                    var marksCanvas = document.getElementById("papigram");
                    var marksData = {
                        labels: ['Hard intense worked (G)', 'Need to achieve (A)', 'Leadership role (L)', 'Need to control others (P)', 'Ease in decision making (I)', 'Pace (T)', 'Vigorous type (V)', 'Need to be noticed (X)', 'Social extension (S)', 'Need to belong to groups (B)', 'Need for closeness and affection (O)', 'Theoretical type (R)', 'Interest in working with details (D)', 'Organized type (C)', 'Need for change (Z)', 'Emotional resistant (E)', 'Need to be forceful (K)', 'Need to support authority (F)', 'Need for rules and supervision (W)', 'Need to finish task (N)'],
                        datasets: [{
                            //     label: 'FULL',
                            //     data: [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100],
                            //     fill: true,
                            //     backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            //     borderColor: 'rgb(255, 99, 132)',
                            //     pointBackgroundColor: 'rgb(255, 99, 132)',
                            //     pointBorderColor: '#fff',
                            //     pointHoverBackgroundColor: '#fff',
                            //     pointHoverBorderColor: 'rgb(255, 99, 132)'
                            // }, {
                            // label: '<?= $nama_pelamar; ?>',
                            data: [<?= "$g,$a,$l,$p,$i,$t,$v,$x,$s,$b,$o,$r,$d,$c,$z,$e,$k,$f,$w,$n" ?>],
                            // data: [5, 5, 4, 3, 7, 2, 7, 2, 6, 4, 7, 6, 6, 6, 7, 2, 3, 5, 2, 0],
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        }]
                    };

                    var radarChart = new Chart(marksCanvas, {
                        type: 'radar',
                        data: marksData,
                        options: {
                            scales: {
                                r: {
                                    angleLines: {
                                        display: true
                                    },
                                    suggestedMin: 1,
                                    suggestedMax: 10
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property
                                        font: {
                                            size: 14
                                        }
                                    },
                                    display: false
                                }
                            }
                        },
                    });
                </script>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('layout/footer'); ?>