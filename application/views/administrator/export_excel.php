<?php



header("Content-type: application/octet-stream");



header("Content-Disposition: attachment; filename=pelamar.xls");



header("Pragma: no-cache");



header("Expires: 0");



?>



<table border="1">



	<thead>



		<tr>





			<th width="35">No</th>



			<th width="238">Nama</th>



			<th>TTL</th>



			<th>Usia</th>



			<th>Jenis Kelamin</th>



			<th>Agama</th>



			<th>Domisili</th>



			<th>No Hp</th>



			<th>facebook</th>


			
			<th>Instagram</th>


			
			<th>Twitter</th>


			
			<th>Linkedln</th>



			<th>Email</th>



			<th>Gaji yang diinginkan</th>



			<th>Pendidikan Terakhir</th>



			<th>Pengalaman Kerja Terakhir</th>



			<th>Jenis Pelatihan</th>



			<th>Kelengkaan Berkas</th>



		</tr>



	</thead>



	<tbody>



		<?php

		$i = 1;



		foreach ($pelamar as $user) {

			foreach ($data_pelamar as $key_pelamar) {

				if ($user['id_pelamar'] == $key_pelamar['id_pelamar']) {

					$nama = $key_pelamar['nama_pelamar'];

					$jk = $key_pelamar['jenis_kelamin'];

					$agama = $key_pelamar['agama'];

					$alamat = $key_pelamar['alamat'];

					$no_hp = $key_pelamar['no_hp'];

					$facebook = $key_pelamar['facebook'];

					$instagram = $key_pelamar['instagram'];

					$twitter= $key_pelamar['twitter'];

					$linkedin = $key_pelamar['linkedin'];

					$ttl = $key_pelamar['tempat_lahir'] . "," . $key_pelamar['tanggal_lahir'];

					$tgl = strtotime($key_pelamar['tanggal_lahir']);

					$current_time = time();



					$age_years = date('Y', $current_time) - date('Y', $tgl);

					$age_months = date('m', $current_time) - date('m', $tgl);

					$age_days = date('d', $current_time) - date('d', $tgl);

					if ($age_days < 0) {

						$days_in_month = date('t', $current_time);

						$age_months--;

						$age_days = $days_in_month + $age_days;
					}



					if ($age_months < 0) {

						$age_years--;

						$age_months = 12 + $age_months;
					}
				}
			}

			$data_pendidikan2 = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar=" . $user['id_pelamar'] . " ORDER BY tahun_keluar DESC LIMIT 1")->result_array();

			foreach ($data_pendidikan2 as $key_pendidikan) {

				$pendAkhir = $key_pendidikan['jenjang_pendidikan'];

				$nmInst = $key_pendidikan['nama_institusi'];

				$jurusan = $key_pendidikan['jurusan'];
			}

			$data_berkas = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar=" . $user['id_pelamar'])->result_array();
			$arr_kat = ['ktp', 'foto', 'ijasah terakhir', 'berkas chaakra', 'surat referensi kerja', 'transkip nilai'];
			$arr_kat_hasil = [];
			foreach ($data_berkas as $key_berkas) {

				$kat = $key_berkas['kategori'];

				if ($kat == 'ktp') {
					array_push($arr_kat_hasil, $kat);
				} elseif ($kat == 'foto') {
					array_push($arr_kat_hasil, $kat);
				} elseif ($kat == 'ijasah') {
					array_push($arr_kat_hasil, 'ijasah terakhir');
				} elseif ($kat == 'berkaschaakra') {
					array_push($arr_kat_hasil, 'berkas chaakra');
				} elseif ($kat == 'referensi') {
					array_push($arr_kat_hasil, 'surat referensi kerja');
				} elseif ($kat == 'transkip') {
					array_push($arr_kat_hasil, 'transkip nilai');
				}
			}
			$arr_hasil_berkas = array_diff($arr_kat, $arr_kat_hasil);
			if (count($arr_kat_hasil) >= count($arr_kat)) {
				$ket_berkas = 'Lengkap';
			} else {
				$ket_berkas = 'Tidak ada ' . implode(', ', $arr_hasil_berkas);
			}

			foreach ($data_pengalaman as $key_pengalaman) {

				if ($user['id_pelamar'] == $key_pengalaman['id_pelamar']) {

					$jabatan = $key_pengalaman['jabatan_akhir'];

					$perusahaan = $key_pengalaman['nama_perusahaan'];
				}
			}



			foreach ($data_pelatihan as $key_pendidikan_non) {

				if ($user['id_pelamar'] == $key_pendidikan_non['id_pelamar']) {

					$pelatihan = $key_pendidikan_non['nama_pendidikan_nonformal'];
				}
			}



			foreach ($data_motivasi as $key_motivasi) {

				if ($user['id_pelamar'] == $key_motivasi['id_pelamar']) {

					$gaji = $key_motivasi['gaji'];
				}
			}



			$email = $this->db->query("SELECT * FROM tb_pelamar");

			foreach ($email->result() as $key_email) {

				if ($user['id_pelamar'] == $key_email->id_pelamar) {

					$emailfix = $key_email->email;
				}
			}



		?>





			<tr>



				<td><?php echo $i ?></td>

				<td><?php echo $nama ?></td>

				<td><?php echo $ttl ?></td>

				<td><?php echo $age_years ?> tahun, <?php echo $age_months ?> bulan, <?php echo $age_days ?> hari</td>

				<td><?php echo $jk ?></td>

				<td><?php echo $agama ?></td>

				<td><?php echo $alamat ?></td>

				<td><?php echo $no_hp ?></td>

				<td><?php echo $facebook ?></td>

				<td><?php echo $instagram?></td>

				<td><?php echo $twitter ?></td>

				<td><?php echo $linkedin ?></td>

				<td><?php echo $emailfix ?></td>

				<td><?php echo $gaji ?></td>

				<td><?php echo $pendAkhir ?> - <?php echo $nmInst ?> - <?php echo $jurusan ?></td>



				<td><?php

					if (!$data_pengalaman) {

						echo "-";
					} else {

						foreach ($data_pengalaman as $key_pengalaman) {

							if ($user['id_pelamar'] == $key_pengalaman['id_pelamar']) {

								echo '> ' . $key_pengalaman['jabatan_akhir'] . ' - ' . $key_pengalaman['nama_perusahaan'];

								echo "<br>";
							}
						}
					}



					?></td>



				<td><?php

					if (!$data_pelatihan) {

						echo "-";
					} else {

						foreach ($data_pelatihan as $key_pendidikan_non) {

							if ($user['id_pelamar'] == $key_pendidikan_non['id_pelamar']) {

								echo '> ' . $key_pendidikan_non['nama_pendidikan_nonformal'];

								echo "<br>";
							}
						}
					}



					?></td>
				<td><?= $ket_berkas; ?></td>





			</tr>



		<?php $i++;
		} ?>



	</tbody>



</table>