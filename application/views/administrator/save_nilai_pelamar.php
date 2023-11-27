<?php
$nilai = $this->db->query("SELECT nama_jabatan,nama_perusahaan FROM tb_lowongan a LEFT JOIN tb_perusahaan b ON a.`id_perusahaan`=b.`id_perusahaan` WHERE id_lowongan=$lowongan")->result_array();


function papi($a, $low, $pel, $hrf)
{
	$papi = $a->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_papi WHERE id_lowongan = $low AND id_pelamar=$pel AND jawaban='$hrf'")->result_array();
	return $papi[0]['jumlah'];
}

function rmibfunction($pel, $a, $rmibp, $rmibl)
{
	if ($pel == "L") {
		asort($rmibp);
		$indexrmib = 1;
		// echo "RMIB PRIA — \n";
		foreach ($rmibp as $k => $v) {
			// echo "$indexrmib. ";
			if ($indexrmib == $a) {
				// echo $k . " = " . $v . ", ";
				return $k;
			}
			$indexrmib++;
		}
		// echo "<br>";
	} else {
		$indexrmibw = 1;
		asort($rmibl);
		// echo "RMIB WANITA — \n";
		foreach ($rmibl as $k => $v) {
			// echo "$indexrmibw. ";
			if ($indexrmibw == $a) {
				// echo $k . " = " . $v . ", ";
				return $k;
			}
			$indexrmibw++;
		}
		// echo "<br>";
	}
}
$no = 1;
$a = $this->db->query("SELECT * FROM tb_apply WHERE id_lowongan=$lowongan AND status_lamaran='Diterima'")->result();
foreach ($a as $key) {
	$id_pelamars = $key->id_pelamar;
	$pelamar = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar=$id_pelamars")->result_array();

	// $cfit = $this->db->query("SELECT * FROM tb_nilai_cfit WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_nilai_cfit DESC LIMIT 1")->result_array();
	//PERHITUNGAN NILAI CFIT
	$jawaban_sub1 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 1 AND id_lowongan = $lowongan AND id_pelamar = $id_pelamars");
	$jawaban_sub2 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 2 AND id_lowongan = $lowongan AND id_pelamar = $id_pelamars");
	$jawaban_sub3 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 3 AND id_lowongan = $lowongan AND id_pelamar = $id_pelamars");
	$jawaban_sub4 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 4 AND id_lowongan = $lowongan AND id_pelamar = $id_pelamars");

	$nilai_sub1 = 0;
	$nilai_sub2 = 0;
	$nilai_sub3 = 0;
	$nilai_sub4 = 0;

	foreach ($jawaban_sub1->result() as $jawsub1) {
		$nomor_soal = $jawsub1->nomor_soal;
		if ($jawsub1->jawaban == $jawsub1->jawaban_kunci) {
			$nilai_sub1 = $nilai_sub1 + 1;
		}
	}

	foreach ($jawaban_sub2->result() as $jawsub2) {
		$nomor_soal = $jawsub2->nomor_soal;
		if ($jawsub2->jawaban == $jawsub2->jawaban_kunci && $jawsub2->jawaban2 == $jawsub2->jawaban_kunci2) {
			$nilai_sub2 = $nilai_sub2 + 1;
		}
	}

	foreach ($jawaban_sub3->result() as $jawsub3) {
		$nomor_soal = $jawsub3->nomor_soal;
		if ($jawsub3->jawaban == $jawsub3->jawaban_kunci) {
			$nilai_sub3 = $nilai_sub3 + 1;
		}
	}

	foreach ($jawaban_sub4->result() as $jawsub4) {
		$nomor_soal = $jawsub4->nomor_soal;
		if ($jawsub4->jawaban == $jawsub4->jawaban_kunci) {
			$nilai_sub4 = $nilai_sub4 + 1;
		}
	}

	$total_nilai_sub = $nilai_sub1 + $nilai_sub2 + $nilai_sub3 + $nilai_sub4;

	if ($total_nilai_sub == 0) {
		$iqcfit = 38;
	} else if ($total_nilai_sub == 1) {
		$iqcfit = 40;
	} else if ($total_nilai_sub == 2) {
		$iqcfit = 43;
	} else if ($total_nilai_sub == 3) {
		$iqcfit = 45;
	} else if ($total_nilai_sub == 4) {
		$iqcfit = 47;
	} else if ($total_nilai_sub == 5) {
		$iqcfit = 48;
	} else if ($total_nilai_sub == 6) {
		$iqcfit = 52;
	} else if ($total_nilai_sub == 7) {
		$iqcfit = 55;
	} else if ($total_nilai_sub == 8) {
		$iqcfit = 57;
	} else if ($total_nilai_sub == 9) {
		$iqcfit = 60;
	} else if ($total_nilai_sub == 10) {
		$iqcfit = 63;
	} else if ($total_nilai_sub == 11) {
		$iqcfit = 67;
	} else if ($total_nilai_sub == 12) {
		$iqcfit = 70;
	} else if ($total_nilai_sub == 13) {
		$iqcfit = 72;
	} else if ($total_nilai_sub == 14) {
		$iqcfit = 75;
	} else if ($total_nilai_sub == 15) {
		$iqcfit = 78;
	} else if ($total_nilai_sub == 16) {
		$iqcfit = 81;
	} else if ($total_nilai_sub == 17) {
		$iqcfit = 85;
	} else if ($total_nilai_sub == 18) {
		$iqcfit = 88;
	} else if ($total_nilai_sub == 19) {
		$iqcfit = 91;
	} else if ($total_nilai_sub == 20) {
		$iqcfit = 94;
	} else if ($total_nilai_sub == 21) {
		$iqcfit = 96;
	} else if ($total_nilai_sub == 22) {
		$iqcfit = 100;
	} else if ($total_nilai_sub == 23) {
		$iqcfit = 103;
	} else if ($total_nilai_sub == 24) {
		$iqcfit = 106;
	} else if ($total_nilai_sub == 25) {
		$iqcfit = 109;
	} else if ($total_nilai_sub == 26) {
		$iqcfit = 113;
	} else if ($total_nilai_sub == 27) {
		$iqcfit = 116;
	} else if ($total_nilai_sub == 28) {
		$iqcfit = 119;
	} else if ($total_nilai_sub == 29) {
		$iqcfit = 121;
	} else if ($total_nilai_sub == 30) {
		$iqcfit = 124;
	} else if ($total_nilai_sub == 31) {
		$iqcfit = 128;
	} else if ($total_nilai_sub == 32) {
		$iqcfit = 131;
	} else if ($total_nilai_sub == 33) {
		$iqcfit = 133;
	} else if ($total_nilai_sub == 34) {
		$iqcfit = 137;
	} else if ($total_nilai_sub == 35) {
		$iqcfit = 140;
	} else if ($total_nilai_sub == 36) {
		$iqcfit = 142;
	} else if ($total_nilai_sub == 37) {
		$iqcfit = 145;
	} else if ($total_nilai_sub == 38) {
		$iqcfit = 149;
	} else if ($total_nilai_sub == 39) {
		$iqcfit = 152;
	} else if ($total_nilai_sub == 40) {
		$iqcfit = 155;
	} else if ($total_nilai_sub == 41) {
		$iqcfit = 157;
	} else if ($total_nilai_sub == 42) {
		$iqcfit = 161;
	} else if ($total_nilai_sub == 43) {
		$iqcfit = 165;
	} else if ($total_nilai_sub == 44) {
		$iqcfit = 167;
	} else if ($total_nilai_sub == 45) {
		$iqcfit = 169;
	} else if ($total_nilai_sub == 46) {
		$iqcfit = 173;
	} else if ($total_nilai_sub == 47) {
		$iqcfit = 176;
	} else if ($total_nilai_sub == 48) {
		$iqcfit = 179;
	} else if ($total_nilai_sub == 49) {
		$iqcfit = 183;
	}

	if ($iqcfit >= 130) {
		$katecfit = 'Sangat Superior';
	} elseif ($iqcfit >= 120 && $iqcfit <= 129) {
		$katecfit = 'Superior';
	} elseif ($iqcfit >= 110 && $iqcfit <= 119) {
		$katecfit = 'Diatas rata-rata';
	} elseif ($iqcfit >= 90 && $iqcfit <= 109) {
		$katecfit = 'Rata-rata';
	} elseif ($iqcfit >= 80 && $iqcfit <= 89) {
		$katecfit = 'Dibawah rata-rata';
	} elseif ($iqcfit >= 70 && $iqcfit <= 79) {
		$katecfit = 'Borderline';
	} elseif ($iqcfit <= 69) {
		$katecfit = 'Intellectual deficient';
	}

	$holland = $this->db->query("SELECT * FROM tb_data_jawaban_holland WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban_holland DESC LIMIT 1")->result_array();
	$essay = $this->db->query("SELECT * FROM tb_jawaban_essay WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban DESC LIMIT 1")->result_array();
	$kasusstaff = $this->db->query("SELECT * FROM tb_jawaban_studi WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban DESC LIMIT 1")->result_array();
	$talent = $this->db->query("SELECT * FROM tb_jawaban_talent WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban DESC LIMIT 1")->result_array();
	$studibank = $this->db->query("SELECT * FROM tb_jawaban_studibank WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban DESC LIMIT 1")->result_array();
	$kasusmanajerial = $this->db->query("SELECT * FROM tb_jawaban_studi_manajerial WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban DESC LIMIT 1")->result_array();
	$hitung = $this->db->query("SELECT * FROM tb_jawaban_hitung WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ORDER BY id_jawaban DESC LIMIT 1")->result_array();
	$leadership = $this->db->query("SELECT * FROM tb_data_jawaban_leadership WHERE id_lowongan = $lowongan AND id_pelamar=$id_pelamars ")->result_array();
	$rmibpria = $this->db->query("SELECT * FROM tb_jawaban_rmib_pria WHERE id_pelamar= " . $id_pelamars . " AND id_lowongan = " . $lowongan . "")->result_array();
	$rmibwanita = $this->db->query("SELECT * FROM tb_jawaban_rmib_wanita WHERE id_pelamar= " . $id_pelamars . " AND id_lowongan = " . $lowongan . "")->result_array();


	// RMIB OUT
	$outpria = [];
	$outwanita = [];
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b12']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c11']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d10']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e9']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f8']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g7']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h6']);
	array_push($outpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i5']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b12']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c11']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d10']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e9']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f8']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g7']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h6']);
	array_push($outwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i5']);

	$hasilrmibpria["Outdoor"] = array_sum($outpria);
	$hasilrmibwanita["Outdoor"] = array_sum($outwanita);
	// echo "cowok = " . array_sum($outpria) . "<br>";
	// echo "cewek = " . array_sum($outwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// RMIB ME
	$mepria = [];
	$mewanita = [];
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a2']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c12']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d11']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e10']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f9']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g8']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h7']);
	array_push($mepria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i6']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a2']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c12']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d11']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e10']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f9']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g8']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h7']);
	array_push($mewanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i6']);
	$hasilrmibpria["Mechanical"] = array_sum($mepria);
	$hasilrmibwanita["Mechanical"] = array_sum($mewanita);
	// echo "cowok = " . array_sum($mepria) . "<br>";
	// echo "cewek = " . array_sum($mewanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// COMP
	$comppria = [];
	$compwanita = [];
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a3']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b2']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d12']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e11']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f10']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g9']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h8']);
	array_push($comppria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i7']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a3']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b2']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d12']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e11']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f10']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g9']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h8']);
	array_push($compwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i7']);
	$hasilrmibpria["Computational"] = array_sum($comppria);
	$hasilrmibwanita["Computational"] = array_sum($compwanita);
	// echo "cowok = " . array_sum($comppria) . "<br>";
	// echo "cewek = " . array_sum($compwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// SCI
	$scipria = [];
	$sciwanita = [];
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a4']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b3']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c2']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e12']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f11']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g10']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h9']);
	array_push($scipria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i8']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a4']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b3']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c2']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e12']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f11']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g10']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h9']);
	array_push($sciwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i8']);
	$hasilrmibpria["Scientific"] = array_sum($scipria);
	$hasilrmibwanita["Scientific"] = array_sum($sciwanita);
	// echo "cowok = " . array_sum($scipria) . "<br>";
	// echo "cewek = " . array_sum($sciwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// PERS
	$perspria = [];
	$perswanita = [];
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a5']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b4']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c3']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d2']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f12']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g11']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h10']);
	array_push($perspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i9']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a5']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b4']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c3']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d2']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f12']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g11']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h10']);
	array_push($perswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i9']);
	$hasilrmibpria["Personal Contact"] = array_sum($perspria);
	$hasilrmibwanita["Personal Contact"] = array_sum($perswanita);
	// echo "cowok = " . array_sum($perspria) . "<br>";
	// echo "cewek = " . array_sum($perswanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// AESTH
	$aesthpria = [];
	$aesthwanita = [];
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a6']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b5']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c4']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d3']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e2']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g12']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h11']);
	array_push($aesthpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i10']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a6']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b5']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c4']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d3']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e2']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g12']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h11']);
	array_push($aesthwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i10']);
	$hasilrmibpria["Aesthetic"] = array_sum($aesthpria);
	$hasilrmibwanita["Aesthetic"] = array_sum($aesthwanita);
	// echo "cowok = " . array_sum($aesthpria) . "<br>";
	// echo "cewek = " . array_sum($aesthwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// LIT
	$litpria = [];
	$litwanita = [];
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a7']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b6']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c5']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d4']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e3']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f2']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h12']);
	array_push($litpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i11']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a7']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b6']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c5']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d4']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e3']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f2']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h12']);
	array_push($litwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i11']);
	$hasilrmibpria["Literary"] = array_sum($litpria);
	$hasilrmibwanita["Literary"] = array_sum($litwanita);
	// echo "cowok = " . array_sum($litpria) . "<br>";
	// echo "cewek = " . array_sum($litwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// MUS
	$muspria = [];
	$muswanita = [];
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a8']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b7']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c6']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d5']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e4']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f3']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g2']);
	array_push($muspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i12']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a8']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b7']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c6']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d5']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e4']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f3']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g2']);
	array_push($muswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i12']);
	$hasilrmibpria["Musical"] = array_sum($muspria);
	$hasilrmibwanita["Musical"] = array_sum($muswanita);
	// echo "cowok = " . array_sum($muspria) . "<br>";
	// echo "cewek = " . array_sum($muswanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// S.S
	$sspria = [];
	$sswanita = [];
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a9']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b8']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c7']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d6']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e5']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f4']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g3']);
	array_push($sspria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h2']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a9']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b8']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c7']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d6']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e5']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f4']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g3']);
	array_push($sswanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h2']);
	$hasilrmibpria["Social Service"] = array_sum($sspria);
	$hasilrmibwanita["Social Service"] = array_sum($sswanita);
	// echo "cowok = " . array_sum($sspria) . "<br>";
	// echo "cewek = " . array_sum($sswanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// CLER
	$clerpria = [];
	$clerwanita = [];
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a10']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b9']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c8']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d7']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e6']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f5']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g4']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h3']);
	array_push($clerpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i2']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a10']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b9']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c8']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d7']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e6']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f5']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g4']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h3']);
	array_push($clerwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i2']);
	$hasilrmibpria["Clerical"] = array_sum($clerpria);
	$hasilrmibwanita["Clerical"] = array_sum($clerwanita);
	// echo "cowok = " . array_sum($clerpria) . "<br>";
	// echo "cewek = " . array_sum($clerwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// PRAC
	$precpria = [];
	$precwanita = [];
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a11']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b10']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c9']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d8']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e7']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f6']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g5']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h4']);
	array_push($precpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i3']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a11']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b10']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c9']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d8']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e7']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f6']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g5']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h4']);
	array_push($precwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i3']);
	$hasilrmibpria["Practical"] = array_sum($precpria);
	$hasilrmibwanita["Practical"] = array_sum($precwanita);
	// echo "cowok = " . array_sum($precpria) . "<br>";
	// echo "cewek = " . array_sum($precwanita) . "<br>";
	// echo "----------------------------------------------<br>";

	// MED
	$medpria = [];
	$medwanita = [];
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['a12']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['b11']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['c10']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['d9']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['e8']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['f7']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['g6']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['h5']);
	array_push($medpria, count($rmibpria) == 0 ? 0 : $rmibpria[0]['i4']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['a12']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['b11']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['c10']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['d9']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['e8']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['f7']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['g6']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['h5']);
	array_push($medwanita, count($rmibwanita) == 0 ? 0 : $rmibwanita[0]['i4']);
	$hasilrmibpria["Medical"] = array_sum($medpria);
	$hasilrmibwanita["Medical"] = array_sum($medwanita);
	// echo "cowok = " . array_sum($medpria) . "<br>";
	// echo "cewek = " . array_sum($medwanita) . "<br>";
	// echo "================================================<br>";

	// echo rmibfunction($pelamar[0]['jenis_kelamin'], 4, $hasilrmibpria, $hasilrmibwanita);

	// echo "================================================<br>";

	// MSDT PERHITUNGAN-----------------------------------------------------------------------

	$array_nilaia = [];
	$array_nilaib = [];

	for ($i = 1; $i < 64; $i = $i + 8) {
		$array = [];
		for ($ii = $i; $ii <= ($i + 7); $ii++) {
			array_push($array, $ii);
		}
		// echo implode(", ", $array) . "<br>";
		$nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (" . implode(", ", $array) . ") AND id_lowongan = $lowongan AND id_pelamar=$id_pelamars")->result_array();
		$nilai_a = $nilai[0]['jumlah'];
		// echo "SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='A' AND no_soal IN (" . implode(", ", $array) . ") AND id_lowongan = $lowongan AND id_pelamar=$id_pelamars ->";
		// echo $nilai_a . "<br>";
		array_push($array_nilaia, $nilai_a);
	}
	// echo "------------------------------------<br>";
	for ($a = 1; $a <= 8; $a++) {
		$arrayy = [];
		for ($aa = $a; $aa <= 64; $aa = $aa + 8) {
			array_push($arrayy, $aa);
		}
		$nilai = $this->db->query("SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (" . implode(", ", $arrayy) . ") AND id_lowongan = $lowongan AND id_pelamar=$id_pelamars")->result_array();
		$nilai_b = $nilai[0]['jumlah'];
		// echo "SELECT count(jawaban) AS jumlah FROM tb_data_jawaban_msdt WHERE jawaban='B' AND no_soal IN (" . implode(", ", $arrayy) . ") AND id_lowongan = $lowongan AND id_pelamar=$id_pelamars ->";
		// echo $nilai_b . "<br>";
		array_push($array_nilaib, $nilai_b);
		// echo implode(", ", $arrayy) . "<br>";
	}
	// echo "====================================<br>";

	$array_total_nilai = [];
	for ($z = 0; $z < count($array_nilaia); $z++) {
		if ($z == 0) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] + 1));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "+ 1 = " . ($array_nilaia[$z] + $array_nilaib[$z] + 1);
		} elseif ($z == 1) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] + 2));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "+ 2 = " . ($array_nilaia[$z] + $array_nilaib[$z] + 2);
		} elseif ($z == 2) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] + 1));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "+ 1 = " . ($array_nilaia[$z] + $array_nilaib[$z] + 1);
		} elseif ($z == 3) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] + 0));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "+ 0 = " . ($array_nilaia[$z] + $array_nilaib[$z] + 0);
		} elseif ($z == 4) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] + 3));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "+ 3 = " . ($array_nilaia[$z] + $array_nilaib[$z] + 3);
		} elseif ($z == 5) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] - 1));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "- 1 = " . ($array_nilaia[$z] + $array_nilaib[$z] - 1);
		} elseif ($z == 6) {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] + 0));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "+ 0 = " . ($array_nilaia[$z] + $array_nilaib[$z] + 0);
		} else {
			array_push($array_total_nilai, ($array_nilaia[$z] + $array_nilaib[$z] - 4));
			// echo $array_nilaia[$z] . " + " . $array_nilaib[$z] . "- 4 = " . ($array_nilaia[$z] + $array_nilaib[$z] - 4);
		}
		// echo "<br>";
	}
	// var_dump($array_total_nilai);
	$TO = $array_total_nilai[2] + $array_total_nilai[3] + $array_total_nilai[6] + $array_total_nilai[7];

	$RO = $array_total_nilai[1] + $array_total_nilai[3] + $array_total_nilai[5] + $array_total_nilai[7];
	$E = $array_total_nilai[4] + $array_total_nilai[5] + $array_total_nilai[6] + $array_total_nilai[7];

	if ($TO >= 38) {
		$convTo = 4.0;
	} elseif ($TO >= 36 && $TO <= 37) {
		$convTo = 3.6;
	} elseif ($TO == 35) {
		$convTo = 3.0;
	} elseif ($TO == 34) {
		$convTo = 2.4;
	} elseif ($TO == 33) {
		$convTo = 1.8;
	} elseif ($TO == 32) {
		$convTo = 1.2;
	} elseif ($TO >= 30 && $TO <= 31) {
		$convTo = 0.6;
	} else {
		$convTo = 0;
	}

	if ($RO >= 38) {
		$convRo = 4.0;
	} elseif ($RO >= 36 && $RO <= 37) {
		$convRo = 3.6;
	} elseif ($RO == 35) {
		$convRo = 3.0;
	} elseif ($RO == 34) {
		$convRo = 2.4;
	} elseif ($RO == 33) {
		$convRo = 1.8;
	} elseif ($RO == 32) {
		$convRo = 1.2;
	} elseif ($RO >= 30 && $RO <= 31) {
		$convRo = 0.6;
	} else {
		$convRo = 0;
	}

	if ($E >= 38) {
		$convE = 4.0;
	} elseif ($E >= 36 && $E <= 37) {
		$convE = 3.6;
	} elseif ($E == 35) {
		$convE = 3.0;
	} elseif ($E == 34) {
		$convE = 2.4;
	} elseif ($E == 33) {
		$convE = 1.8;
	} elseif ($E == 32) {
		$convE = 1.2;
	} elseif ($E >= 30 && $E <= 31) {
		$convE = 0.6;
	} else {
		$convE = 0;
	}

	if ($convTo > 2 && $convRo > 2 && $convE > 2) {
		$kategoriMSDT = "Executive";
	} elseif ($convTo > 2 && $convRo > 2 && $convE < 2) {
		$kategoriMSDT = "Compcon$convRomiser";
	} elseif ($convTo > 2 && $convRo < 2 && $convE > 2) {
		$kategoriMSDT = "Benevolent Autocrat";
	} elseif ($convTo > 2 && $convRo < 2 && $convE < 2) {
		$kategoriMSDT = "Autocrat";
	} elseif ($convTo < 2 && $convRo > 2 && $convE > 2) {
		$kategoriMSDT = "Developer";
	} elseif ($convTo < 2 && $convRo > 2 && $convE < 2) {
		$kategoriMSDT = "Missionary";
	} elseif ($convTo < 2 && $convRo < 2 && $convE > 2) {
		$kategoriMSDT = "Bureaucrat";
	} else {
		$kategoriMSDT = "Deserter";
	}

	// IST PERHITUNGAN-----------------------------------------------------------------------
	$umurdb = $this->db->query("SELECT tanggal_lahir as tgl_lhr FROM tb_data_diri WHERE id_pelamar = $id_pelamars")->result_array();
	$from = new DateTime($umurdb[0]['tgl_lhr']);
	$to   = new DateTime('today');
	$umur = $from->diff($to)->y;
	// echo "Lahir = " . $umurdb[0]['tgl_lhr'] . "<br>";
	// echo "UMUR = " . $umur . "<br>";
	// echo "-----------------------<br>";

	$arrayrs = [];
	$arrayss = [];
	$gesamtrs = 0;
	$gesamtss = 0;
	$iqist = 0;
	$kategoriist = "";
	for ($i = 1; $i <= 9; $i++) {
		// echo "<br>";
		// echo "SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=$i AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $lowongan AND tb_data_jawaban_ist.id_pelamar = $id_pelamars";
		// echo "<br>";
		$nilai = $this->db->query("SELECT count(tb_data_jawaban_ist.nilai) AS jumlah,tb_data_diri.tanggal_lahir as tgl_lhr FROM tb_data_jawaban_ist INNER JOIN tb_data_diri ON tb_data_jawaban_ist.id_pelamar=tb_data_diri.id_pelamar WHERE tb_data_jawaban_ist.subtes=$i AND tb_data_jawaban_ist.nilai=1 AND tb_data_jawaban_ist.id_lowongan = $lowongan AND tb_data_jawaban_ist.id_pelamar = $id_pelamars")->result_array();
		$nilaipersubtes = $nilai[0]['jumlah'];
		if ($umur >= 21 && $umur <= 25) {
			if ($i == 1) {
				$arrayconvert = [68, 71, 74, 76, 79, 82, 85, 88, 91, 94, 97, 100, 103, 106, 109, 112, 115, 118, 121, 124, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [63, 66, 70, 74, 77, 81, 84, 88, 91, 95, 99, 102, 106, 109, 113, 116, 120, 124, 127, 131, 134];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {

				// echo $nilaipersubtes . "aaaa<br>";
				$arrayconvert = [76, 78, 81, 83, 86, 88, 91, 93, 96, 98, 101, 103, 106, 108, 111, 113, 116, 118, 121, 123, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [69, 72, 75, 78, 81, 83, 86, 89, 92, 94, 97, 100, 103, 106, 108, 111, 114, 117, 119, 122, 125];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [74, 77, 79, 82, 85, 88, 91, 94, 97, 99, 102, 105, 108, 111, 114, 117, 119, 122, 125, 128, 131];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [77, 80, 82, 84, 87, 89, 91, 94, 96, 99, 101, 103, 106, 108, 110, 113, 115, 118, 120, 122, 125];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [70, 73, 76, 79, 81, 84, 87, 90, 93, 96, 99, 101, 104, 107, 110, 113, 116, 119, 121, 124, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [72, 75, 77, 80, 83, 86, 89, 92, 95, 97, 100, 103, 106, 109, 112, 115, 117, 120, 123, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [75, 77, 80, 82, 84, 87, 89, 91, 94, 96, 98, 101, 103, 105, 108, 110, 112, 115, 117, 119, 122];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [67, 70, 74, 78, 82, 86, 90, 93, 97, 101, 105, 109, 113, 117, 120, 124, 128, 132];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		} elseif ($umur >= 25 && $umur <= 30) {
			if ($i == 1) {
				$arrayconvert = [66, 69, 72, 75, 78, 81, 84, 87, 90, 93, 96, 99, 102, 105, 108, 112, 115, 118, 121, 124, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [66, 69, 73, 76, 79, 83, 86, 89, 93, 96, 99, 103, 106, 109, 113, 116, 119, 123, 126, 129, 133];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {
				$arrayconvert = [78, 80, 83, 85, 87, 90, 92, 95, 97, 99, 102.104, 106, 109, 111, 114, 116, 118, 121, 123, 125];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [69, 71, 74, 77, 80, 83, 85, 88, 91, 94, 96, 99, 102, 105, 108, 110, 113, 116, 119, 121, 124];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [74, 77, 79, 82, 85, 88, 91, 94, 97, 99, 102, 105, 108, 111, 114, 117, 119, 122, 125, 128, 131];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [79, 81, 83, 86, 88, 90, 93, 95, 97, 100, 102, 104, 107, 109, 111, 113, 116, 118, 120, 123, 125];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [71, 73, 76, 79, 82, 85, 88, 91, 93, 96, 99, 102, 105, 108, 111, 113, 116, 119, 122, 125, 128];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [72, 75, 78, 81, 84, 87, 90, 93, 96, 99, 101, 104, 107, 110, 113, 116, 119, 122, 125, 128, 131];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [77, 80, 82, 84, 86, 89, 91, 93, 95, 98, 100, 102, 105, 107, 109, 111, 114, 116, 118, 120, 123];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [67, 71, 75, 79, 83, 87, 90, 94, 98, 102, 106, 110, 113, 117, 121, 125, 129, 133];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		} elseif ($umur >= 19 && $umur <= 20) {
			if ($i == 1) {
				$arrayconvert = [70, 73, 76, 78, 81, 84, 87, 89, 92, 95, 98, 101, 103, 106, 109, 112, 114, 117, 120, 123, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [65, 68, 71, 75, 78, 81, 85, 88, 91, 95, 98, 101, 105, 108, 111, 115, 118, 121, 125, 128, 131];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {
				$arrayconvert = [74, 77, 79, 82, 85, 87, 90, 92, 95, 97, 100, 103, 105, 108, 110, 113, 115, 118, 121, 123, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [73, 75, 78, 81, 83, 86, 88, 91, 93, 96, 98, 101, 104, 106, 109, 111, 114, 116, 119, 122, 124];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [74, 77, 80, 83, 85, 88, 91, 94, 96, 99, 102, 105, 108, 110, 113, 116, 119, 121, 124, 127, 130];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [76, 78, 81, 83, 85, 88, 90, 92, 95, 97, 99, 102, 104, 106, 109, 111, 113, 116, 118, 120, 123];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [72, 75, 78, 80, 83, 86, 88, 91, 94, 96, 99, 102, 105, 107, 110, 113, 115, 118, 121, 124, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [72, 75, 78, 81, 83, 86, 89, 92, 95, 98, 101, 103, 106, 109, 112, 115, 118, 121, 123, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [74, 77, 79, 81, 83, 86, 88, 90, 92, 94, 97, 99, 101, 103, 106, 108, 110, 112, 114, 117, 119];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [67, 71, 75, 79, 82, 86, 90, 93, 97, 101, 104, 108, 112, 116, 119, 123, 127, 130];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		} elseif ($umur >= 31 && $umur <= 35) {
			if ($i == 1) {
				$arrayconvert = [68, 71, 74, 77, 80, 83, 86, 89, 91, 94, 97, 100, 103, 106, 109, 112, 115, 118, 121, 124, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [67, 71, 74, 77, 81, 84, 87, 91, 94, 97, 101, 104, 107, 111, 114, 117, 121, 124, 127, 131, 134];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {
				$arrayconvert = [80, 83, 85, 87, 89, 92, 94, 96, 98, 101, 103, 105, 108, 110, 112, 114, 117, 119, 121, 123, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [69, 72, 75, 77, 80, 83, 86, 89, 92, 95, 97, 100, 103, 106, 109, 112, 115, 117, 120, 123, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [75, 78, 81, 83, 86, 89, 91, 94, 97, 99, 102, 105, 108, 110, 113, 116, 118, 121, 124, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [79, 82, 84, 86, 89, 91, 94, 96, 98, 101, 103, 105, 108, 110, 113, 115, 117, 120, 122, 125, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [73, 76, 79, 81, 84, 87, 90, 93, 95, 98, 101, 103, 105, 108, 110, 113, 115, 117, 120, 123, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [74, 77, 80, 83, 86, 88, 91, 94, 97, 99, 102, 105, 108, 111, 113, 116, 119, 122, 124, 127, 130];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [78, 81, 83, 85, 88, 90, 92, 94, 97, 99, 101, 103, 106, 108, 110, 113, 115, 117, 119, 122, 124];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [70, 73, 77, 81, 84, 88, 92, 96, 99, 103, 107, 110, 114, 118, 121, 125, 129, 133];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		} elseif ($umur >= 41 && $umur <= 45) {
			if ($i == 1) {
				$arrayconvert = [71, 74, 77, 80, 83, 86, 89, 91, 94, 97, 100, 103, 106, 109, 111, 114, 117, 120, 123, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [75, 77, 80, 83, 86, 89, 92, 95, 97, 100, 103, 106, 109, 112, 115, 117, 120, 123, 126, 129, 132];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {
				$arrayconvert = [83, 85, 87, 90, 92, 94, 96, 98, 101, 103, 105, 107, 110, 112, 114, 116, 118, 121, 123, 125, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [71, 74, 77, 80, 83, 86, 89, 91, 94, 97, 100, 103, 106, 109, 111, 114, 117, 120, 123, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [76, 79, 82, 85, 87, 90, 93, 96, 99, 102, 105, 107, 110, 113, 116, 119, 122, 125, 127, 130, 133];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [81, 83, 86, 88, 90, 93, 95, 98, 100, 102, 105, 107, 110, 112, 114, 117, 119, 121, 124, 126, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [78, 81, 83, 86, 88, 91, 94, 96, 99, 101, 104, 106, 109, 112, 114, 117, 119, 122, 124, 127, 129];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [78, 80, 83, 86, 88, 91, 94, 96, 99, 102, 105, 107, 110, 113, 115, 118, 121, 124, 126, 129, 132];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [81, 83, 86, 88, 90, 93, 95, 97, 99, 102, 104, 106, 108, 111, 113, 115, 118, 120, 122, 124, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [75, 78, 82, 85, 89, 92, 96, 99, 102, 106, 109, 113, 116, 120, 123, 127, 130, 133];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		} elseif ($umur >= 36 && $umur <= 40) {
			if ($i == 1) {
				$arrayconvert = [69, 72, 75, 78, 81, 84, 87, 90, 93, 96, 99, 101, 104, 107, 110, 113, 116, 119, 122, 125, 128];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [71, 74, 77, 80, 83, 86, 89, 93, 96, 99, 102, 105, 108, 111, 114, 118, 121, 124, 127, 130, 133];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {
				$arrayconvert = [81, 84, 86, 88, 90, 93, 95, 97, 100, 102, 104, 106, 109, 111, 113, 115, 118, 120, 122, 125, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [69, 72, 75, 78, 81, 84, 87, 90, 93, 96, 99, 101, 104, 107, 110, 113, 116, 119, 122, 125, 128];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [75, 78, 80, 83, 86, 89, 91, 94, 97, 100, 103, 105, 108, 111, 114, 116, 119, 122, 125, 128, 131];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [81, 84, 86, 88, 90, 92, 95, 97, 99, 101, 104, 106, 108, 110, 112, 115, 117, 119, 121, 124, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [77, 79, 82, 85, 87, 90, 92, 95, 97, 100, 103, 105, 108, 110, 113, 115, 118, 121, 123, 126, 128];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [76, 79, 82, 84, 87, 90, 93, 96, 98, 101, 104, 107, 109, 112, 115, 118, 121, 123, 126, 129, 132];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [78, 80, 83, 85, 88, 90, 93, 95, 98, 100, 102, 105, 107, 110, 112, 115, 117, 120, 122, 124, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [73, 77, 80, 83, 87, 90, 94, 97, 101, 104, 108, 111, 114, 118, 121, 125, 128, 132];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		} elseif ($umur == 18) {
			if ($i == 1) {
				$arrayconvert = [70, 73, 76, 79, 81, 84, 87, 90, 93, 96, 99, 101, 104, 107, 110, 113, 116, 119, 121, 124, 127];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 2) {
				$arrayconvert = [64, 68, 71, 74, 78, 81, 85, 88, 92, 95, 99, 102, 106, 109, 112, 116, 119, 123, 126, 130, 133];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 3) {
				$arrayconvert = [75, 78, 80, 83, 85, 88, 91, 93, 96, 98, 101, 103, 106, 108, 111, 114, 116, 119, 121, 124, 126];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 4) {
				$arrayconvert = [75, 77, 80, 82, 85, 87, 90, 92, 95, 97, 100, 102, 105, 107, 110, 112, 115, 117, 120, 122, 125];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 5) {
				$arrayconvert = [74, 77, 79, 82, 85, 88, 91, 94, 97, 99, 102, 105, 108, 111, 114, 117, 119, 122, 125, 128, 131];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 6) {
				$arrayconvert = [76, 79, 81, 84, 86, 88, 91, 93, 95, 98, 100, 103, 105, 107, 110, 112, 115, 117, 119, 122, 124];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 7) {
				$arrayconvert = [71, 74, 77, 80, 83, 86, 89, 92, 95, 98, 101, 104, 106, 109, 112, 115, 118, 121, 124, 127, 130];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} elseif ($i == 8) {
				$arrayconvert = [71, 74, 77, 80, 83, 86, 89, 92, 95, 98, 101, 104, 106, 109, 112, 115, 118, 121, 124, 127, 130];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			} else {
				$arrayconvert = [73, 75, 78, 80, 83, 85, 87, 90, 92, 95, 97, 99, 102, 104, 106, 109, 111, 114, 116, 118, 121];
				if ($nilaipersubtes == 0) {
					$convert = $arrayconvert[0];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 1) {
					$convert = $arrayconvert[1];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 2) {
					$convert = $arrayconvert[2];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 3) {
					$convert = $arrayconvert[3];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 4) {
					$convert = $arrayconvert[4];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 5) {
					$convert = $arrayconvert[5];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 6) {
					$convert = $arrayconvert[6];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 7) {
					$convert = $arrayconvert[7];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 8) {
					$convert = $arrayconvert[8];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 9) {
					$convert = $arrayconvert[9];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 10) {
					$convert = $arrayconvert[10];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 11) {
					$convert = $arrayconvert[11];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 12) {
					$convert = $arrayconvert[12];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 13) {
					$convert = $arrayconvert[13];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 14) {
					$convert = $arrayconvert[14];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 15) {
					$convert = $arrayconvert[15];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 16) {
					$convert = $arrayconvert[16];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 17) {
					$convert = $arrayconvert[17];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 18) {
					$convert = $arrayconvert[18];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 19) {
					$convert = $arrayconvert[19];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} elseif ($nilaipersubtes == 20) {
					$convert = $arrayconvert[20];
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				} else {
					$convert = 0;
					array_push($arrayss, $convert);
					array_push($arrayrs, $nilaipersubtes);
				}
			}
			$totalrs = array_sum($arrayrs);
			$arraynilaigesamtss = [64, 68, 73, 77, 81, 85, 89, 93, 98, 102, 106, 110, 114, 118, 123, 127, 131, 135];
			$gesamtrs = $totalrs;
			if ($totalrs >= 1 && $totalrs <= 10) {
				$gesamtss = $arraynilaigesamtss[0];
			} elseif ($totalrs >= 11 && $totalrs <= 20) {
				$gesamtss = $arraynilaigesamtss[1];
			} elseif ($totalrs >= 21 && $totalrs <= 30) {
				$gesamtss = $arraynilaigesamtss[2];
			} elseif ($totalrs >= 31 && $totalrs <= 40) {
				$gesamtss = $arraynilaigesamtss[3];
			} elseif ($totalrs >= 41 && $totalrs <= 50) {
				$gesamtss = $arraynilaigesamtss[4];
			} elseif ($totalrs >= 51 && $totalrs <= 60) {
				$gesamtss = $arraynilaigesamtss[5];
			} elseif ($totalrs >= 61 && $totalrs <= 70) {
				$gesamtss = $arraynilaigesamtss[6];
			} elseif ($totalrs >= 71 && $totalrs <= 80) {
				$gesamtss = $arraynilaigesamtss[7];
			} elseif ($totalrs >= 81 && $totalrs <= 90) {
				$gesamtss = $arraynilaigesamtss[8];
			} elseif ($totalrs >= 91 && $totalrs <= 100) {
				$gesamtss = $arraynilaigesamtss[9];
			} elseif ($totalrs >= 101 && $totalrs <= 110) {
				$gesamtss = $arraynilaigesamtss[10];
			} elseif ($totalrs >= 111 && $totalrs <= 120) {
				$gesamtss = $arraynilaigesamtss[11];
			} elseif ($totalrs >= 121 && $totalrs <= 130) {
				$gesamtss = $arraynilaigesamtss[12];
			} elseif ($totalrs >= 131 && $totalrs <= 140) {
				$gesamtss = $arraynilaigesamtss[13];
			} elseif ($totalrs >= 141 && $totalrs <= 150) {
				$gesamtss = $arraynilaigesamtss[14];
			} elseif ($totalrs >= 151 && $totalrs <= 160) {
				$gesamtss = $arraynilaigesamtss[15];
			} elseif ($totalrs >= 161 && $totalrs <= 170) {
				$gesamtss = $arraynilaigesamtss[16];
			} elseif ($totalrs >= 171 && $totalrs <= 180) {
				$gesamtss = $arraynilaigesamtss[17];
			} else {
				$gesamtss = 0;
			}
		}
	}
	// var_dump($arrayrs);
	// echo "=" . $gesamtrs;
	// echo "<br>";
	// var_dump($arrayss);
	// echo "=" . $gesamtss;
	// echo "<br>";
	if ($gesamtss >= 140) {
		$iqist = 160;
	} elseif ($gesamtss == 139) {
		$iqist = 158;
	} elseif ($gesamtss == 138) {
		$iqist = 157;
	} elseif ($gesamtss == 137) {
		$iqist = 155;
	} elseif ($gesamtss == 136) {
		$iqist = 154;
	} elseif ($gesamtss == 135) {
		$iqist = 152;
	} elseif ($gesamtss == 134) {
		$iqist = 151;
	} elseif ($gesamtss == 133) {
		$iqist = 149;
	} elseif ($gesamtss == 132) {
		$iqist = 145;
	} elseif ($gesamtss == 131) {
		$iqist = 146;
	} elseif ($gesamtss == 130) {
		$iqist = 145;
	} elseif ($gesamtss == 129) {
		$iqist = 143;
	} elseif ($gesamtss == 128) {
		$iqist = 142;
	} elseif ($gesamtss == 127) {
		$iqist = 140;
	} elseif ($gesamtss == 126) {
		$iqist = 139;
	} elseif ($gesamtss == 125) {
		$iqist = 137;
	} elseif ($gesamtss == 124) {
		$iqist = 136;
	} elseif ($gesamtss == 123) {
		$iqist = 134;
	} elseif ($gesamtss == 122) {
		$iqist = 133;
	} elseif ($gesamtss == 121) {
		$iqist = 131;
	} elseif ($gesamtss == 120) {
		$iqist = 130;
	} elseif ($gesamtss == 119) {
		$iqist = 128;
	} elseif ($gesamtss == 118) {
		$iqist = 127;
	} elseif ($gesamtss == 117) {
		$iqist = 125;
	} elseif ($gesamtss == 116) {
		$iqist = 124;
	} elseif ($gesamtss == 115) {
		$iqist = 122;
	} elseif ($gesamtss == 114) {
		$iqist = 121;
	} elseif ($gesamtss == 113) {
		$iqist = 120;
	} elseif ($gesamtss == 112) {
		$iqist = 118;
	} elseif ($gesamtss == 111) {
		$iqist = 116;
	} elseif ($gesamtss == 110) {
		$iqist = 115;
	} elseif ($gesamtss == 109) {
		$iqist = 113;
	} elseif ($gesamtss == 108) {
		$iqist = 112;
	} elseif ($gesamtss == 107) {
		$iqist = 110;
	} elseif ($gesamtss == 106) {
		$iqist = 109;
	} elseif ($gesamtss == 105) {
		$iqist = 107;
	} elseif ($gesamtss == 104) {
		$iqist = 106;
	} elseif ($gesamtss == 103) {
		$iqist = 104;
	} elseif ($gesamtss == 102) {
		$iqist = 103;
	} elseif ($gesamtss == 101) {
		$iqist = 101;
	} elseif ($gesamtss == 100) {
		$iqist = 100;
	} elseif ($gesamtss == 99) {
		$iqist = 98;
	} elseif ($gesamtss == 98) {
		$iqist = 97;
	} elseif ($gesamtss == 97) {
		$iqist = 96;
	} elseif ($gesamtss == 96) {
		$iqist = 94;
	} elseif ($gesamtss == 95) {
		$iqist = 92;
	} elseif ($gesamtss == 94) {
		$iqist = 91;
	} elseif ($gesamtss == 93) {
		$iqist = 90;
	} elseif ($gesamtss == 92) {
		$iqist = 88;
	} elseif ($gesamtss == 91) {
		$iqist = 87;
	} elseif ($gesamtss == 90) {
		$iqist = 85;
	} elseif ($gesamtss == 89) {
		$iqist = 84;
	} elseif ($gesamtss == 88) {
		$iqist = 82;
	} elseif ($gesamtss == 87) {
		$iqist = 81;
	} elseif ($gesamtss == 86) {
		$iqist = 79;
	} elseif ($gesamtss == 85) {
		$iqist = 78;
	} elseif ($gesamtss == 84) {
		$iqist = 76;
	} elseif ($gesamtss == 83) {
		$iqist = 75;
	} elseif ($gesamtss == 82) {
		$iqist = 73;
	} elseif ($gesamtss == 81) {
		$iqist = 71;
	} elseif ($gesamtss == 80) {
		$iqist = 70;
	} elseif ($gesamtss == 79) {
		$iqist = 68;
	} elseif ($gesamtss == 78) {
		$iqist = 67;
	} elseif ($gesamtss == 77) {
		$iqist = 66;
	} elseif ($gesamtss == 76) {
		$iqist = 64;
	} elseif ($gesamtss == 75) {
		$iqist = 62;
	} elseif ($gesamtss == 74) {
		$iqist = 61;
	} elseif ($gesamtss == 73) {
		$iqist = 59;
	} elseif ($gesamtss == 72) {
		$iqist = 58;
	} elseif ($gesamtss == 71) {
		$iqist = 56;
	} elseif ($gesamtss == 70) {
		$iqist = 55;
	} elseif ($gesamtss == 69) {
		$iqist = 53;
	} elseif ($gesamtss == 68) {
		$iqist = 52;
	} elseif ($gesamtss == 67) {
		$iqist = 50;
	} elseif ($gesamtss == 66) {
		$iqist = 49;
	} elseif ($gesamtss == 65) {
		$iqist = 47;
	} elseif ($gesamtss == 64) {
		$iqist = 46;
	} elseif ($gesamtss == 63) {
		$iqist = 44;
	} elseif ($gesamtss == 62) {
		$iqist = 43;
	} elseif ($gesamtss == 61) {
		$iqist = 41;
	} elseif ($gesamtss == 60) {
		$iqist = 40;
	} elseif ($gesamtss == 59) {
		$iqist = 39;
	} elseif ($gesamtss == 58) {
		$iqist = 37;
	} else {
		$iqist = 0;
	}
	if ($iqist >= 130) {
		$kategoriist = "Sangat Superior";
	} elseif ($iqist >= 120 && $iqist <= 129) {
		$kategoriist = "Superior";
	} elseif ($iqist >= 110 && $iqist <= 119) {
		$kategoriist = "Di Atas Rata-Rata";
	} elseif ($iqist >= 90 && $iqist <= 109) {
		$kategoriist = "Rata-Rata";
	} elseif ($iqist >= 80 && $iqist <= 89) {
		$kategoriist = "Di Bawah Rata-Rata";
	} elseif ($iqist >= 70 && $iqist <= 79) {
		$kategoriist = "Borderline";
	} elseif ($iqist <= 69) {
		$kategoriist = "Intellectual Deficient";
	}

	// echo "=======================<br>";

	//EPPS
	//menghitung consistensi epps
	$garismerah1 = [1, 7, 13, 19, 25];
	$garisbiru1 = [151, 157, 163, 169, 175];
	$garismerah2 = [101, 107, 113, 119, 125];
	$garisbiru2 = [26, 32, 38, 44, 50];
	$garismerah3 = [201, 207, 213, 219, 225];
	$garisbiru3 = [51, 57, 63, 69, 75];
	$hasilcons = [];
	for ($i = 0; $i < count($garisbiru1); $i++) {
		$jgmerah1 = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garismerah1[$i] . "")->result_array();
		$jgmerah2 = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garismerah2[$i] . "")->result_array();
		$jgmerah3 = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garismerah2[$i] . "")->result_array();
		$jgbiru1 = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garisbiru1[$i] . "")->result_array();
		$jgbiru2 = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garisbiru2[$i] . "")->result_array();
		$jgbiru3 = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garisbiru3[$i] . "")->result_array();
		// echo "SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $garismerah1[$i] . "<br>";
		// echo $jgmerah1[0]['jawaban'];
		if (isset($jgmerah1[0]['jawaban']) && isset($jgbiru1[0]['jawaban'])) {
			if ($jgmerah1[0]['jawaban'] == $jgbiru1[0]['jawaban']) {
				array_push($hasilcons, 1);
			} else {
				array_push($hasilcons, 0);
			}
		} else {
			array_push($hasilcons, 0);
		}
		if (isset($jgmerah2[0]['jawaban']) && isset($jgbiru2[0]['jawaban'])) {
			if ($jgmerah2[0]['jawaban'] == $jgbiru2[0]['jawaban']) {
				array_push($hasilcons, 1);
			} else {
				array_push($hasilcons, 0);
			}
		} else {
			array_push($hasilcons, 0);
		}
		if (isset($jgmerah3[0]['jawaban']) && isset($jgbiru3[0]['jawaban'])) {
			if ($jgmerah3[0]['jawaban'] == $jgbiru3[0]['jawaban']) {
				array_push($hasilcons, 1);
			} else {
				array_push($hasilcons, 0);
			}
		} else {
			array_push($hasilcons, 0);
		}
	}
	$benar = 0;
	$salah = 0;
	for ($i = 0; $i < count($hasilcons); $i++) {
		if ($hasilcons[$i] == 1) {
			$benar = $benar + 1;
		} else {
			$salah = $salah + 1;
		}
	}
	// echo "Cons benar = $benar <br>";
	// echo "Cons salah = $salah <br>";
	// echo "--------------------------";

	//menghitung verbal epps
	$ach = [6, 11, 16, 21, 26, 31, 36, 41, 46, 51, 56, 61, 66, 71];
	$dev = [2, 12, 17, 22, 27, 32, 37, 41, 47, 52, 57, 62, 67, 72];
	$ord = [3, 8, 18, 23, 28, 33, 38, 43, 48, 53, 58, 63, 68, 73];
	$exh = [4, 9, 14, 24, 29, 34, 39, 44, 49, 54, 59, 64, 69, 74];
	$aut = [5, 10, 15, 20, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75];
	$aff = [76, 81, 86, 91, 96, 106, 111, 116, 121, 126, 131, 136, 141, 146];
	$int = [77, 82, 87, 92, 97, 102, 112, 117, 122, 127, 132, 137, 142, 147];
	$suc = [78, 83, 88, 93, 98, 103, 108, 118, 123, 128, 133, 138, 143, 148];
	$dom = [79, 84, 89, 94, 99, 104, 109, 114, 124, 129, 134, 139, 144, 149];
	$aba = [80, 85, 90, 95, 100, 105, 110, 115, 120, 130, 135, 140, 145, 150];
	$nur = [151, 156, 161, 166, 171, 176, 181, 186, 191, 196, 206, 211, 216, 221];
	$chg = [152, 157, 162, 167, 172, 177, 182, 187, 192, 197, 202, 212, 217, 222];
	$end = [153, 158, 163, 168, 173, 178, 183, 188, 193, 198, 203, 208, 218, 223];
	$het = [154, 159, 164, 169, 174, 179, 184, 189, 194, 199, 204, 209, 214, 224];
	$agg = [155, 160, 165, 170, 175, 180, 185, 190, 195, 200, 205, 210, 215, 220];
	$r = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	$c = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	$s = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	for ($i = 0; $i < count($ach); $i++) {
		$j_ach = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $ach[$i] . "")->result_array();
		$j_dev = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $dev[$i] . "")->result_array();
		$j_ord = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $ord[$i] . "")->result_array();
		$j_exh = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $exh[$i] . "")->result_array();
		$j_aut = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $aut[$i] . "")->result_array();
		$j_aff = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $aff[$i] . "")->result_array();
		$j_int = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $int[$i] . "")->result_array();
		$j_suc = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $suc[$i] . "")->result_array();
		$j_dom = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $dom[$i] . "")->result_array();
		$j_aba = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $aba[$i] . "")->result_array();
		$j_nur = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $nur[$i] . "")->result_array();
		$j_chg = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $chg[$i] . "")->result_array();
		$j_end = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $end[$i] . "")->result_array();
		$j_het = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $het[$i] . "")->result_array();
		$j_agg = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $agg[$i] . "")->result_array();
		if (isset($j_ach[0]['jawaban'])) {
			if ($j_ach[0]['jawaban'] == "A") {
				$r[0] = $r[0] + 1;
			} else {
				$c[0] = $c[0] + 1;
			}
		}
		if (isset($j_dev[0]['jawaban'])) {
			if ($j_dev[0]['jawaban'] == "A") {
				$r[1] = $r[1] + 1;
			} else {
				$c[1] = $c[1] + 1;
			}
		}
		if (isset($j_ord[0]['jawaban'])) {
			if ($j_ord[0]['jawaban'] == "A") {
				$r[2] = $r[2] + 1;
			} else {
				$c[2] = $c[2] + 1;
			}
		}
		if (isset($j_exh[0]['jawaban'])) {
			if ($j_exh[0]['jawaban'] == "A") {
				$r[3] = $r[3] + 1;
			} else {
				$c[3] = $c[3] + 1;
			}
		}
		if (isset($j_ach[0]['jawaban'])) {
			if ($j_ach[0]['jawaban'] == "A") {
				$r[4] = $r[4] + 1;
			} else {
				$c[4] = $c[4] + 1;
			}
		}
		if (isset($j_aff[0]['jawaban'])) {
			if ($j_aff[0]['jawaban'] == "A") {
				$r[5] = $r[5] + 1;
			} else {
				$c[5] = $c[5] + 1;
			}
		}
		if (isset($j_int[0]['jawaban'])) {
			if ($j_int[0]['jawaban'] == "A") {
				$r[6] = $r[6] + 1;
			} else {
				$c[6] = $c[6] + 1;
			}
		}
		if (isset($j_suc[0]['jawaban'])) {
			if ($j_suc[0]['jawaban'] == "A") {
				$r[7] = $r[7] + 1;
			} else {
				$c[7] = $c[7] + 1;
			}
		}
		if (isset($j_dom[0]['jawaban'])) {
			if ($j_dom[0]['jawaban'] == "A") {
				$r[8] = $r[8] + 1;
			} else {
				$c[8] = $c[8] + 1;
			}
		}
		if (isset($j_aba[0]['jawaban'])) {
			if ($j_aba[0]['jawaban'] == "A") {
				$r[9] = $r[9] + 1;
			} else {
				$c[9] = $c[9] + 1;
			}
		}
		if (isset($j_nur[0]['jawaban'])) {
			if ($j_nur[0]['jawaban'] == "A") {
				$r[10] = $r[10] + 1;
			} else {
				$c[10] = $c[10] + 1;
			}
		}
		if (isset($j_chg[0]['jawaban'])) {
			if ($j_chg[0]['jawaban'] == "A") {
				$r[11] = $r[11] + 1;
			} else {
				$c[11] = $c[11] + 1;
			}
		}
		if (isset($j_end[0]['jawaban'])) {
			if ($j_end[0]['jawaban'] == "A") {
				$r[12] = $r[12] + 1;
			} else {
				$c[12] = $c[12] + 1;
			}
		}
		if (isset($j_het[0]['jawaban'])) {
			if ($j_het[0]['jawaban'] == "A") {
				$r[13] = $r[13] + 1;
			} else {
				$c[13] = $c[13] + 1;
			}
		}
		if (isset($j_agg[0]['jawaban'])) {
			if ($j_agg[0]['jawaban'] == "A") {
				$r[14] = $r[14] + 1;
			} else {
				$c[14] = $c[14] + 1;
			}
		}
	}
	for ($ii = 0; $ii < count($s); $ii++) {
		$s[$ii] = $r[$ii] + $c[$ii];
	}
	// echo "<br>";
	// var_dump($r);
	// echo "<br>";
	// var_dump($c);
	// echo "<br>";
	// var_dump($s);
	// echo "<br>--------------------------";

	//menghitung need
	$needA = $r;
	$ach = [2, 3, 4, 5, 76, 77, 78, 79, 80, 151, 152, 153, 154, 155];
	$dev = [6, 8, 9, 10, 81, 82, 83, 84, 85, 156, 157, 158, 159, 160];
	$ord = [11, 12, 14, 15, 86, 87, 88, 89, 90, 161, 162, 163, 164, 165];
	$exh = [16, 17, 18, 20, 91, 92, 93, 94, 95, 166, 167, 168, 169, 170];
	$aut = [21, 22, 23, 24, 96, 97, 98, 99, 100, 171, 172, 173, 174, 175];
	$aff = [26, 27, 28, 29, 30, 102, 103, 104, 105, 176, 177, 178, 179, 180];
	$int = [31, 32, 33, 34, 35, 106, 108, 109, 110, 181, 182, 183, 184, 185];
	$suc = [36, 37, 38, 39, 40, 111, 112, 114, 115, 186, 187, 188, 189, 190];
	$dom = [41, 42, 43, 44, 45, 116, 117, 118, 120, 191, 192, 193, 194, 195];
	$aba = [46, 47, 48, 49, 50, 121, 122, 123, 124, 196, 197, 198, 199, 200];
	$nur = [51, 52, 53, 54, 55, 126, 127, 128, 129, 130, 202, 203, 204, 205];
	$chg = [56, 57, 58, 59, 60, 131, 132, 133, 134, 135, 206, 208, 209, 210];
	$end = [61, 62, 63, 64, 65, 136, 137, 138, 139, 140, 211, 212, 214, 215];
	$het = [66, 67, 68, 69, 70, 141, 142, 143, 144, 145, 216, 217, 218, 220];
	$agg = [71, 72, 73, 74, 75, 146, 147, 148, 149, 150, 221, 222, 223, 224];
	$needB = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	$needS = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	for ($i = 0; $i < count($ach); $i++) {
		$j_ach = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $ach[$i] . "")->result_array();
		$j_dev = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $dev[$i] . "")->result_array();
		$j_ord = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $ord[$i] . "")->result_array();
		$j_exh = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $exh[$i] . "")->result_array();
		$j_aut = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $aut[$i] . "")->result_array();
		$j_aff = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $aff[$i] . "")->result_array();
		$j_int = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $int[$i] . "")->result_array();
		$j_suc = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $suc[$i] . "")->result_array();
		$j_dom = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $dom[$i] . "")->result_array();
		$j_aba = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $aba[$i] . "")->result_array();
		$j_nur = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $nur[$i] . "")->result_array();
		$j_chg = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $chg[$i] . "")->result_array();
		$j_end = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $end[$i] . "")->result_array();
		$j_het = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $het[$i] . "")->result_array();
		$j_agg = $this->db->query("SELECT jawaban FROM tb_data_jawaban_epps WHERE id_lowongan = " . $lowongan . " AND id_pelamar=" . $id_pelamars . " AND no_soal=" . $agg[$i] . "")->result_array();
		//needA
		if (isset($j_ach[0]['jawaban'])) {
			if ($j_ach[0]['jawaban'] == "A") {
				$needB[0] = $needB[0] + 1;
			}
		}
		if (isset($j_dev[0]['jawaban'])) {
			if ($j_dev[0]['jawaban'] == "A") {
				$needB[1] = $needB[1] + 1;
			}
		}
		if (isset($j_ord[0]['jawaban'])) {
			if ($j_ord[0]['jawaban'] == "A") {
				$needB[2] = $needB[2] + 1;
			}
		}
		if (isset($j_exh[0]['jawaban'])) {
			if ($j_exh[0]['jawaban'] == "A") {
				$needB[3] = $needB[3] + 1;
			}
		}
		if (isset($j_aut[0]['jawaban'])) {
			if ($j_aut[0]['jawaban'] == "A") {
				$needB[4] = $needB[4] + 1;
			}
		}
		if (isset($j_aff[0]['jawaban'])) {
			if ($j_aff[0]['jawaban'] == "A") {
				$needB[5] = $needB[5] + 1;
			}
		}
		if (isset($j_int[0]['jawaban'])) {
			if ($j_int[0]['jawaban'] == "A") {
				$needB[6] = $needB[6] + 1;
			}
		}
		if (isset($j_suc[0]['jawaban'])) {
			if ($j_suc[0]['jawaban'] == "A") {
				$needB[7] = $needB[7] + 1;
			}
		}
		if (isset($j_dom[0]['jawaban'])) {
			if ($j_dom[0]['jawaban'] == "A") {
				$needB[8] = $needB[8] + 1;
			}
		}
		if (isset($j_aba[0]['jawaban'])) {
			if ($j_aba[0]['jawaban'] == "A") {
				$needB[9] = $needB[9] + 1;
			}
		}
		if (isset($j_nur[0]['jawaban'])) {
			if ($j_nur[0]['jawaban'] == "A") {
				$needB[10] = $needB[10] + 1;
			}
		}
		if (isset($j_chg[0]['jawaban'])) {
			if ($j_chg[0]['jawaban'] == "A") {
				$needB[11] = $needB[11] + 1;
			}
		}
		if (isset($j_end[0]['jawaban'])) {
			if ($j_end[0]['jawaban'] == "A") {
				$needB[12] = $needB[12] + 1;
			}
		}
		if (isset($j_het[0]['jawaban'])) {
			if ($j_het[0]['jawaban'] == "A") {
				$needB[13] = $needB[13] + 1;
			}
		}
		if (isset($j_agg[0]['jawaban'])) {
			if ($j_agg[0]['jawaban'] == "A") {
				$needB[14] = $needB[14] + 1;
			}
		}
	}
	for ($ii = 0; $ii < count($s); $ii++) {
		$needS[$ii] = $needA[$ii] + $needB[$ii];
	}

	// // DISC
	$data = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE id_lowongan = $lowongan AND id_pelamar = $id_pelamars ORDER BY no_soal LIMIT 24")->result();
	$arrayJ1 = [];
	$arrayJ2 = [];
	foreach ($data as $key) {
		if ($key->jawaban == "dM") {
			$j1 = "D";
		} elseif ($key->jawaban == "iM") {
			$j1 = "I";
		} elseif ($key->jawaban == "sM") {
			$j1 = "S";
		} elseif ($key->jawaban == "cM") {
			$j1 = "C";
		} else {
			$j1 = "X";
		}
		if ($key->jawaban2 == "dL") {
			$j2 = "D";
		} elseif ($key->jawaban2 == "iL") {
			$j2 = "I";
		} elseif ($key->jawaban2 == "sL") {
			$j2 = "S";
		} elseif ($key->jawaban2 == "cL") {
			$j2 = "C";
		} else {
			$j2 = "X";
		}
		// echo $key->no_soal . " | " . ($j1) . " | " . $j2;
		// echo "<br>";
		array_push($arrayJ1, $j1);
		array_push($arrayJ2, $j2);
	}
	// echo "===========MOST============";
	$keyj1 = [];
	$sumDM = 0;
	$sumIM = 0;
	$sumSM = 0;
	$sumCM = 0;
	$sumXM = 0;
	foreach ($arrayJ1 as $karrayJ1) {
		if ($karrayJ1 == 'D') {
			$sumDM++;
		} elseif ($karrayJ1 == 'I') {
			$sumIM++;
		} elseif ($karrayJ1 == 'S') {
			$sumSM++;
		} elseif ($karrayJ1 == 'C') {
			$sumCM++;
		} else {
			$sumXM++;
		}
	}
	$keyj1['D'] = $sumDM;
	$keyj1['I'] = $sumIM;
	$keyj1['S'] = $sumSM;
	$keyj1['C'] = $sumCM;
	$keyj1['X'] = $sumXM;
	$hasilkonveksiM = [];
	// $keyj1 = array_count_values($arrayJ1);
	// echo "<br>";
	//MOST D
	$notind = [17, 18, 19];
	$valuekonD = [3, 15, 24, 33, 38, 43, 48, 53, 59, 65, 73, 76, 79, 83, 95, 93, 97, 100];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notind)) {
			if ($keyj1['D'] == false) {
				array_push($hasilkonveksiM, $valuekonD[0]);
			} else {
				if ($i == 20) {
					if ($keyj1['D'] == $i) {
						// echo $i . " | " . $valuekonD[17] . "<br>";
						array_push($hasilkonveksiM, $valuekonD[17]);
					}
				} else {
					if ($keyj1['D'] == $i) {
						// echo $i . " | " . $valuekonD[$i] . "<br>";
						array_push($hasilkonveksiM, $valuekonD[$i]);
					}
				}
			}
		}
	}
	//MOST I
	$notini = [18, 19, 20];
	$valuekonI = [8, 20, 35, 43, 56, 68, 73, 83, 88, 92, 97, 100, 100, 100, 100, 100, 100, 100];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notini)) {
			if ($i == 17) {
				if ($keyj1['I'] == $i) {
					// echo $i . " | " . $valuekonI[17] . "<br>";
					array_push($hasilkonveksiM, $valuekonI[17]);
				}
			} else {
				if ($keyj1['I'] == $i) {
					// echo $i . " | " . $valuekonI[$i] . "<br>";
					array_push($hasilkonveksiM, $valuekonI[$i]);
				}
			}
		}
	}
	//MOST S
	$notins = [17, 18, 20];
	$valuekonS = [11, 22, 30, 28, 45, 55, 61, 67, 74, 78, 85, 89, 97, 100, 100, 100, 100, 100];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notins)) {
			if ($i == 19) {
				if ($keyj1['S'] == $i) {
					// echo $i . " | " . $valuekonS[17] . "<br>";
					array_push($hasilkonveksiM, $valuekonS[17]);
				}
			} else {
				if ($keyj1['S'] == $i) {
					// echo $i . " | " . $valuekonS[$i] . "<br>";
					array_push($hasilkonveksiM, $valuekonS[$i]);
				}
			}
		}
	}
	//MOST C
	$notinc = [16, 17, 18, 19, 20];
	$valuekonC = [0, 16, 29, 40, 54, 66, 73, 84, 89, 96, 100, 100, 100, 100, 100, 100];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notinc)) {
			if ($i == 15) {
				if ($keyj1['C'] == $i) {
					// echo $i . " | " . $valuekonC[14] . "<br>";
					array_push($hasilkonveksiM, $valuekonC[14]);
				}
			} else {
				if ($keyj1['C'] == $i) {
					// echo $i . " | " . $valuekonC[$i] . "<br>";
					array_push($hasilkonveksiM, $valuekonC[$i]);
				}
			}
		}
	}
	//MOST X
	// echo $keyj1['X'] . " | <br>";

	//MOST Rangking
	$hasilrangkingM = [];
	$ordered_values = $hasilkonveksiM;
	rsort($ordered_values);
	$no = 1;
	foreach ($hasilkonveksiM as $key => $value) {
		if ($no == 1) {
			$kat = "D";
		} elseif ($no == 2) {
			$kat = "I";
		} elseif ($no == 3) {
			$kat = "S";
		} else {
			$kat = "C";
		}
		foreach ($ordered_values as $ordered_key => $ordered_value) {
			if ($value === $ordered_value) {
				$key = $ordered_key;
				break;
			}
		}
		// echo $value . ' - Rank: ' . ((int) $key + 1);
		if ($value > 50) {
			// echo " | H" . $kat;
			if (((int) $key + 1) == 1) {
				$hasilrangkingM['1'] = "H" . $kat;
			} elseif (((int) $key + 1) == 2) {
				$hasilrangkingM['2'] = "H" . $kat;
			} elseif (((int) $key + 1) == 3) {
				$hasilrangkingM['3'] = "H" . $kat;
			} else {
				$hasilrangkingM['4'] = "H" . $kat;
			}
		} else {
			// echo " | L" . $kat;
			if (((int) $key + 1) == 1) {
				$hasilrangkingM['1'] = "L" . $kat;
			} elseif (((int) $key + 1) == 2) {
				$hasilrangkingM['2'] = "L" . $kat;
			} elseif (((int) $key + 1) == 3) {
				$hasilrangkingM['3'] = "L" . $kat;
			} else {
				$hasilrangkingM['4'] = "L" . $kat;
			}
		}
		// echo "<br>";
		$no++;
	}
	$codeM = "";
	for ($i = 1; $i <= 4; $i++) {
		$codeM = $codeM . $hasilrangkingM[$i];
	}
	// echo "<br>";
	if ($hasilrangkingM['1'] == "HD") {
		$kategoriM = "Dominance";
	} elseif ($hasilrangkingM['1'] == "HI") {
		$kategoriM = "Influence";
	} elseif ($hasilrangkingM['1'] == "HS") {
		$kategoriM = "Steadiness";
	} else {
		$kategoriM = "Compliance";
	}

	$keyj2 = [];
	$sumDL = 0;
	$sumIL = 0;
	$sumSL = 0;
	$sumCL = 0;
	$sumXL = 0;
	foreach ($arrayJ2 as $karrayJ2) {
		if ($karrayJ2 == 'D') {
			$sumDL++;
		} elseif ($karrayJ2 == 'I') {
			$sumIL++;
		} elseif ($karrayJ2 == 'S') {
			$sumSL++;
		} elseif ($karrayJ2 == 'C') {
			$sumCL++;
		} else {
			$sumXL++;
		}
	}
	$keyj2['D'] = $sumDL;
	$keyj2['I'] = $sumIL;
	$keyj2['S'] = $sumSL;
	$keyj2['C'] = $sumCL;
	$keyj2['X'] = $sumXL;
	$hasilkonveksiL = [];
	$hasilrangkingL = [];

	//LEST D
	$notind = [17, 18, 19, 20];
	$valuekonD = [100, 87, 75, 67, 59, 53, 48, 42, 38, 31, 28, 25, 21, 15, 11, 8, 5, 1];
	for ($i = 0; $i <= 21; $i++) {
		if (!in_array($i, $notind)) {
			if ($i == 21) {
				if ($keyj2['D'] == $i) {
					// echo $i . " | " . $valuekonD[17] . "<br>";
					array_push($hasilkonveksiL, $valuekonD[14]);
				}
			} else {
				if ($keyj2['D'] == $i) {
					// echo $i . " | " . $valuekonD[$i] . "<br>";
					array_push($hasilkonveksiL, $valuekonD[$i]);
				}
			}
		}
	}
	//LEST I
	$notini = [12, 13, 14, 15, 16, 17, 18, 20];
	$valuekonI = [100, 86, 75, 67, 55, 46, 37, 28, 22, 15, 10, 7, 0];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notini)) {
			if ($i == 19) {
				if ($keyj2['I'] == $i) {
					// echo $i . " | " . $valuekonI[12] . "<br>";
					array_push($hasilkonveksiL, $valuekonI[12]);
				}
			} else {
				if ($keyj2['I'] == $i) {
					// echo $i . " | " . $valuekonI[$i] . "<br>";
					array_push($hasilkonveksiL, $valuekonI[$i]);
				}
			}
		}
	}
	//LEST S
	$notins = [14, 15, 16, 17, 18, 20];
	$valuekonS = [100, 96, 85, 75, 67, 59, 53, 42, 37, 29, 23, 15, 8, 4, 1];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notins)) {
			if ($i == 19) {
				if ($keyj2['S'] == $i) {
					// echo $i . " | " . $valuekonS[14] . "<br>";
					array_push($hasilkonveksiL, $valuekonS[14]);
				}
			} else {
				if ($keyj2['S'] == $i) {
					// echo $i . " | " . $valuekonS[$i] . "<br>";
					array_push($hasilkonveksiL, $valuekonS[$i]);
				}
			}
		}
	}
	//LEST C
	$notinc = [14, 15, 17, 18, 19, 20];
	$valuekonC = [100, 95, 82, 74, 65, 58, 52, 47, 39, 33, 23, 14, 7, 3, 0];
	for ($i = 0; $i <= 20; $i++) {
		if (!in_array($i, $notinc)) {
			if ($i == 16) {
				if ($keyj2['C'] == $i) {
					// echo $i . " | " . $valuekonC[14] . "<br>";
					array_push($hasilkonveksiL, $valuekonC[14]);
				}
			} else {
				if ($keyj2['C'] == $i) {
					// echo $i . " | " . $valuekonC[$i] . "<br>";
					array_push($hasilkonveksiL, $valuekonC[$i]);
				}
			}
		}
	}
	$ordered_values = $hasilkonveksiL;
	rsort($ordered_values);
	$no = 1;
	foreach ($hasilkonveksiL as $key => $value) {
		if ($no == 1) {
			$kat = "D";
		} elseif ($no == 2) {
			$kat = "I";
		} elseif ($no == 3) {
			$kat = "S";
		} else {
			$kat = "C";
		}
		foreach ($ordered_values as $ordered_key => $ordered_value) {
			if ($value === $ordered_value) {
				$key = $ordered_key;
				break;
			}
		}
		if ($value > 50) {
			if (((int) $key + 1) == 1) {
				$hasilrangkingL['1'] = "H" . $kat;
			} elseif (((int) $key + 1) == 2) {
				$hasilrangkingL['2'] = "H" . $kat;
			} elseif (((int) $key + 1) == 3) {
				$hasilrangkingL['3'] = "H" . $kat;
			} else {
				$hasilrangkingL['4'] = "H" . $kat;
			}
		} else {
			if (((int) $key + 1) == 1) {
				$hasilrangkingL['1'] = "L" . $kat;
			} elseif (((int) $key + 1) == 2) {
				$hasilrangkingL['2'] = "L" . $kat;
			} elseif (((int) $key + 1) == 3) {
				$hasilrangkingL['3'] = "L" . $kat;
			} else {
				$hasilrangkingL['4'] = "L" . $kat;
			}
		}
		$no++;
	}
	$codeL = "";
	for ($i = 1; $i <= 4; $i++) {
		$codeL = $codeL . $hasilrangkingL[$i];
	}
	// echo "<br>";
	if ($hasilrangkingL['1'] == "HD") {
		$kategoriL = "Dominance";
	} elseif ($hasilrangkingL['1'] == "HI") {
		$kategoriL = "Influence";
	} elseif ($hasilrangkingL['1'] == "HS") {
		$kategoriL = "Steadiness";
	} else {
		$kategoriL = "Compliance";
	}


	$perusahaan = $this->db->query("SELECT * FROM tb_lowongan where id_lowongan = $lowongan")->result();
	$send['id_pelamar'] = $id_pelamars;
	$send['id_lowongan'] = $lowongan;
	$send['id_perusahaan'] = $perusahaan[0]->id_perusahaan;
	$send['tgl_seleksi'] = $perusahaan[0]->jadwal_seleksi;
	// $send['']= $pelamar[0]['nama_pelamar'];
	$send['cfit_nilai'] = $total_nilai_sub;
	$send['cfit_iq'] = $iqcfit;
	$send['cfit_kategori'] = $katecfit;
	$send['holland_r'] = count($holland) == 0 ? 0 : $holland[0]['nilai_r'];
	$send['holland_i'] = count($holland) == 0 ? 0 : $holland[0]['nilai_i'];
	$send['holland_a'] = count($holland) == 0 ? 0 : $holland[0]['nilai_a'];
	$send['holland_s'] = count($holland) == 0 ? 0 : $holland[0]['nilai_s'];
	$send['holland_e'] = count($holland) == 0 ? 0 : $holland[0]['nilai_e'];
	$send['holland_k'] = count($holland) == 0 ? 0 : $holland[0]['nilai_k'];
	$send['holland_kategori'] = '';
	$send['essay_1'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban1'];
	$send['essay_2'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban2'];
	$send['essay_3'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban3'];
	$send['essay_4'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban4'];
	$send['essay_5a'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban5'];
	$send['essay_5b'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban5b'];
	$send['essay_5b'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban5c'];
	$send['essay_6'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban6'];
	$send['essay_7'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban7'];
	$send['essay_8'] = count($essay) == 0 ? ' ' : $essay[0]['jawaban8'];
	$send['papi_g'] = papi($this->db, $lowongan, $id_pelamars, 'G');
	$send['papi_n'] = papi($this->db, $lowongan, $id_pelamars, 'N');
	$send['papi_a'] = papi($this->db, $lowongan, $id_pelamars, 'A');
	$send['papi_l'] = papi($this->db, $lowongan, $id_pelamars, 'L');
	$send['papi_p'] = papi($this->db, $lowongan, $id_pelamars, 'P');
	$send['papi_i'] = papi($this->db, $lowongan, $id_pelamars, 'I');
	$send['papi_t'] = papi($this->db, $lowongan, $id_pelamars, 'T');
	$send['papi_v'] = papi($this->db, $lowongan, $id_pelamars, 'V');
	$send['papi_o'] = papi($this->db, $lowongan, $id_pelamars, 'O');
	$send['papi_b'] = papi($this->db, $lowongan, $id_pelamars, 'B');
	$send['papi_s'] = papi($this->db, $lowongan, $id_pelamars, 'S');
	$send['papi_x'] = papi($this->db, $lowongan, $id_pelamars, 'X');
	$send['papi_c'] = papi($this->db, $lowongan, $id_pelamars, 'C');
	$send['papi_d'] = papi($this->db, $lowongan, $id_pelamars, 'D');
	$send['papi_r'] = papi($this->db, $lowongan, $id_pelamars, 'R');
	$send['papi_z'] = papi($this->db, $lowongan, $id_pelamars, 'Z');
	$send['papi_e'] = papi($this->db, $lowongan, $id_pelamars, 'E');
	$send['papi_k'] = papi($this->db, $lowongan, $id_pelamars, 'K');
	$send['papi_f'] = papi($this->db, $lowongan, $id_pelamars, 'F');
	$send['papi_w'] = papi($this->db, $lowongan, $id_pelamars, 'W');
	$send['papi_kategori'] = '';
	$send['talent_1'] = count($talent) == 0 ? ' ' : $talent[0]['jawaban1'];
	$send['talent_2'] = count($talent) == 0 ? ' ' : $talent[0]['jawaban2'];
	$send['talent_3'] = count($talent) == 0 ? ' ' : $talent[0]['jawaban3'];
	$send['studikasus_1'] = count($kasusstaff) == 0 ? ' ' : $essay[0]['jawaban1'];
	$send['studikasus_2'] = count($kasusstaff) == 0 ? ' ' : $essay[0]['jawaban2'];
	$send['studikasusbank_1'] = count($studibank) == 0 ? ' ' : $studibank[0]['jawaban1'];
	$send['studikasusbank_2'] = count($studibank) == 0 ? ' ' : $studibank[0]['jawaban2'];
	$send['studikasusmanajerial'] = count($kasusmanajerial) == 0 ? ' ' : $kasusmanajerial[0]['jawaban1'];
	$send['hitung_1a'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban1a'];
	$send['hitung_1b'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban1b'];
	$send['hitung_1c'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban1c'];
	$send['hitung_1d'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban1d'];
	$send['hitung_2a'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban2a'];
	$send['hitung_2b'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban2b'];
	$send['hitung_2c'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban2c'];
	$send['hitung_3a'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban3a'];
	$send['hitung_3b'] = count($hitung) == 0 ? ' ' : $hitung[0]['jawaban3b'];
	$send['leadership_1'] = count($leadership) == 0 ? ' ' : $leadership[0]['jawaban'];
	$send['leadership_2'] = count($leadership) == 0 ? ' ' : $leadership[1]['jawaban'];
	$send['leadership_3'] = count($leadership) == 0 ? ' ' : $leadership[2]['jawaban'];
	$send['leadership_4'] = count($leadership) == 0 ? ' ' : $leadership[3]['jawaban'];
	$send['leadership_5'] = count($leadership) == 0 ? ' ' : $leadership[4]['jawaban'];
	$send['leadership_6'] = count($leadership) == 0 ? ' ' : $leadership[5]['jawaban'];
	$send['leadership_7'] = count($leadership) == 0 ? ' ' : $leadership[6]['jawaban'];
	$send['leadership_8'] = count($leadership) == 0 ? ' ' : $leadership[7]['jawaban'];
	$send['leadership_9'] = count($leadership) == 0 ? ' ' : $leadership[8]['jawaban'];
	$send['leadership_10'] = count($leadership) == 0 ? ' ' : $leadership[9]['jawaban'];
	$send['leadership_11'] = count($leadership) == 0 ? ' ' : $leadership[10]['jawaban'];
	$send['leadership_12'] = count($leadership) == 0 ? ' ' : $leadership[11]['jawaban'];
	$send['leadership_13'] = count($leadership) == 0 ? ' ' : $leadership[12]['jawaban'];
	$send['leadership_14'] = count($leadership) == 0 ? ' ' : $leadership[13]['jawaban'];
	$send['leadership_15'] = count($leadership) == 0 ? ' ' : $leadership[14]['jawaban'];
	$send['leadership_16'] = count($leadership) == 0 ? ' ' : $leadership[15]['jawaban'];
	$send['leadership_17'] = count($leadership) == 0 ? ' ' : $leadership[16]['jawaban'];
	$send['leadership_18'] = count($leadership) == 0 ? ' ' : $leadership[17]['jawaban'];
	$send['leadership_19'] = count($leadership) == 0 ? ' ' : $leadership[18]['jawaban'];
	$send['leadership_20'] = count($leadership) == 0 ? ' ' : $leadership[19]['jawaban'];
	$send['leadership_21'] = count($leadership) == 0 ? ' ' : $leadership[20]['jawaban'];
	$send['leadership_22'] = count($leadership) == 0 ? ' ' : $leadership[21]['jawaban'];
	$send['leadership_kategori'] = '';
	$send['rmib_pd_1'] = rmibfunction($pelamar[0]['jenis_kelamin'], 12, $hasilrmibpria, $hasilrmibwanita);
	$send['rmib_pd_2'] = rmibfunction($pelamar[0]['jenis_kelamin'], 11, $hasilrmibpria, $hasilrmibwanita);
	$send['rmib_pd_3'] = rmibfunction($pelamar[0]['jenis_kelamin'], 10, $hasilrmibpria, $hasilrmibwanita);
	$send['rmib_ptd_1'] = rmibfunction($pelamar[0]['jenis_kelamin'], 1, $hasilrmibpria, $hasilrmibwanita);
	$send['rmib_ptd_2'] = rmibfunction($pelamar[0]['jenis_kelamin'], 2, $hasilrmibpria, $hasilrmibwanita);
	$send['rmib_ptd_3'] = rmibfunction($pelamar[0]['jenis_kelamin'], 3, $hasilrmibpria, $hasilrmibwanita);
	if ($pelamar[0]['jenis_kelamin'] == "L") {
		$send['rmib_fp_1'] = count($rmibpria) == 0 ? ' ' : $rmibpria[0]['jawaban1'];
		$send['rmib_fp_2'] = count($rmibpria) == 0 ? ' ' : $rmibpria[0]['jawaban2'];
		$send['rmib_fp_3'] = count($rmibpria) == 0 ? ' ' : $rmibpria[0]['jawaban3'];
	} else {
		$send['rmib_fp_1'] = count($rmibwanita) == 0 ? ' ' : $rmibwanita[0]['jawaban1'];
		$send['rmib_fp_2'] = count($rmibwanita) == 0 ? ' ' : $rmibwanita[0]['jawaban2'];
		$send['rmib_fp_2'] = count($rmibwanita) == 0 ? ' ' : $rmibwanita[0]['jawaban3'];
	}
	$send['msdt_to'] = $convTo;
	$send['msdt_ro'] = $convRo;
	$send['msdt_e'] = $convE;
	$send['msdt_kategori'] = $kategoriMSDT;
	$send['epps_cons'] = $benar . " : " . $salah;
	$send['epps_s_end'] = $s[12];
	$send['epps_s_chg'] = $s[11];
	$send['epps_s_ach'] = $s[0];
	$send['epps_s_ord'] = $s[2];
	$send['epps_s_aut'] = $s[4];
	$send['epps_s_aff'] = $s[5];
	$send['epps_s_int'] = $s[6];
	$send['epps_s_def'] = $s[1];
	$send['epps_s_nur'] = $s[10];
	$send['epps_s_suc'] = $s[7];
	$send['epps_s_dom'] = $s[8];
	$send['epps_s_aba'] = $s[9];
	$send['epps_s_exh'] = $s[3];
	$send['epps_s_het'] = $s[13];
	$send['epps_s_agg'] = $s[14];
	if (count($arrayrs) == 0) {
		$send['ist_rs_se'] = 0;
		$send['ist_rs_wa'] = 0;
		$send['ist_rs_an'] = 0;
		$send['ist_rs_ge'] = 0;
		$send['ist_rs_ra'] = 0;
		$send['ist_rs_zr'] = 0;
		$send['ist_rs_fa'] = 0;
		$send['ist_rs_wu'] = 0;
		$send['ist_rs_me'] = 0;
	} else {
		$send['ist_rs_se'] = $arrayrs[0];
		$send['ist_rs_wa'] = $arrayrs[1];
		$send['ist_rs_an'] = $arrayrs[2];
		$send['ist_rs_ge'] = $arrayrs[3];
		$send['ist_rs_ra'] = $arrayrs[4];
		$send['ist_rs_zr'] = $arrayrs[5];
		$send['ist_rs_fa'] = $arrayrs[6];
		$send['ist_rs_wu'] = $arrayrs[7];
		$send['ist_rs_me'] = $arrayrs[8];
	}

	$send['ist_rs_gesamt'] = $gesamtrs;
	$send['ist_kategori'] = $kategoriist;
	$send['epps_n_end'] = $needS[12];
	$send['epps_n_chg'] = $needS[11];
	$send['epps_n_ach'] = $needS[0];
	$send['epps_n_ord'] = $needS[2];
	$send['epps_n_aut'] = $needS[4];
	$send['epps_n_aff'] = $needS[5];
	$send['epps_n_int'] = $needS[6];
	$send['epps_n_def'] = $needS[1];
	$send['epps_n_nur'] = $needS[10];
	$send['epps_n_suc'] = $needS[7];
	$send['epps_n_dom'] = $needS[8];
	$send['epps_n_aba'] = $needS[9];
	$send['epps_n_exh'] = $needS[3];
	$send['epps_n_het'] = $needS[13];
	$send['epps_n_agg'] = $needS[14];
	$send['epps_kategori'] = '';
	if (count($arrayss) == 0) {
		$send['ist_ss_se'] = 0;
		$send['ist_ss_wa'] = 0;
		$send['ist_ss_an'] = 0;
		$send['ist_ss_ge'] = 0;
		$send['ist_ss_ra'] = 0;
		$send['ist_ss_zr'] = 0;
		$send['ist_ss_fa'] = 0;
		$send['ist_ss_wu'] = 0;
		$send['ist_ss_me'] = 0;
	} else {
		$send['ist_ss_se'] = $arrayss[0];
		$send['ist_ss_wa'] = $arrayss[1];
		$send['ist_ss_an'] = $arrayss[2];
		$send['ist_ss_ge'] = $arrayss[3];
		$send['ist_ss_ra'] = $arrayss[4];
		$send['ist_ss_zr'] = $arrayss[5];
		$send['ist_ss_fa'] = $arrayss[6];
		$send['ist_ss_wu'] = $arrayss[7];
		$send['ist_ss_me'] = $arrayss[8];
	}
	$send['ist_ss_gesamt'] = $gesamtss;

	$send['disc_m_n_d'] = $keyj1['D'];
	$send['disc_m_n_i'] = $keyj1['I'];
	$send['disc_m_n_s'] = $keyj1['S'];
	$send['disc_m_n_c'] = $keyj1['C'];
	$send['disc_m_n_x'] = $keyj1['X'];
	$send['disc_m_k_d'] = $hasilkonveksiM[0];
	$send['disc_m_k_i'] = $hasilkonveksiM[1];
	$send['disc_m_k_s'] = $hasilkonveksiM[2];
	$send['disc_m_k_c'] = $hasilkonveksiM[3];
	$send['disc_m_k_x'] = '-';
	$send['disc_l_n_d'] = $keyj2['D'];
	$send['disc_l_n_i'] = $keyj2['I'];
	$send['disc_l_n_s'] = $keyj2['S'];
	$send['disc_l_n_c'] = $keyj2['C'];
	$send['disc_l_n_x'] = $keyj2['X'];
	$send['disc_l_k_d'] = $hasilkonveksiL[0];
	$send['disc_l_k_i'] = $hasilkonveksiL[1];
	$send['disc_l_k_s'] = $hasilkonveksiL[2];
	$send['disc_l_k_c'] = $hasilkonveksiL[3];
	$send['disc_l_k_x'] = '-';
	$send['disc_m_kategori'] = $kategoriM;
	$send['disc_l_kategori'] = $kategoriL;

	$cekdatanilai = $this->db->query("SELECT * FROM tb_nilai WHERE id_pelamar=$id_pelamars AND id_lowongan=$lowongan")->result();
	if (count($cekdatanilai) == 0) {

		$send['id_nilai'] = '';
		$this->db->insert('tb_nilai', $send);
	} else {
		$where = array(
			'id_pelamar' => $id_pelamars,
			'id_lowongan' => $lowongan
		);
		$this->db->where($where);
		$this->db->update('tb_nilai', $send);
	}
	$no++;
}
redirect('Administrator/Data_nilai');
