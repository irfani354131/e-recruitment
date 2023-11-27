<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Mdl_home extends CI_Model
{



	public function __construct()

	{

		parent::__construct();

		$this->load->database();
	}



	// DATA LEVEL
	// Updated by Tobi 3 Feb 2021
	// Menampilkan data di home sampai waktu yg di tentukan
	public function ambildata()
	{
		$query = $this->db->query("SELECT * FROM tb_lowongan WHERE jadwal_seleksi >= CURRENT_DATE()");
		return $query->result_array();
	}

	public function ambildata_persyaratan($id)
	{

		$query = $this->db->query("SELECT * FROM tb_lowongan WHERE id_lowongan = $id");

		return $query->result_array();
	}



	public function ambildata_pendidikan($id)
	{

		$query = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar = $id");

		return $query->result_array();
	}



	public function ambildata_pendidikan2($id)
	{

		$query = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pendidikan = $id");

		return $query->result_array();
	}



	public function modelupdate_pendidikan($send)
	{

		$sql = "UPDATE tb_data_pendidikan SET id_pendidikan = ?, id_pelamar = ?, jenjang_pendidikan = ?, nama_institusi = ?, jurusan = ? , tahun_masuk = ?, tahun_keluar = ?, nilai_akhir = ? WHERE id_pendidikan = ?";

		$query = $this->db->query($sql, array($send['id_pendidikan'], $send['id_pelamar'], $send['jenjang_pendidikan'], $send['nama_institusi'], $send['jurusan'], $send['tahun_masuk'], $send['tahun_keluar'], $send['nilai_akhir'], $send['id_pendidikan']));
	}



	public function ambildata_pendidikan_nonformal($id)
	{

		$query = $this->db->query("SELECT * FROM tb_data_pendidikan_nonformal WHERE id_pelamar = $id");

		return $query->result_array();
	}





	public function ambildata_pendidikan_nonformal2($id)
	{

		$query = $this->db->query("SELECT * FROM tb_data_pendidikan_nonformal WHERE id_pendidikan_nonformal = $id");

		return $query->result_array();
	}



	public function modelupdate_pendidikan_nonformal($send)
	{

		$sql = "UPDATE tb_data_pendidikan_nonformal SET id_pendidikan_nonformal = ?, id_pelamar = ?, nama_pendidikan_nonformal = ?, tujuan_pendidikan_nonformal = ?, nomor_sertifikat = ? , tahun_pendidikan_nonformal = ? WHERE id_pendidikan_nonformal = ?";

		$query = $this->db->query($sql, array($send['id_pendidikan_nonformal'], $send['id_pelamar'], $send['nama_pendidikan_nonformal'], $send['tujuan_pendidikan_nonformal'], $send['nomor_sertifikat'], $send['tahun_pendidikan_nonformal'], $send['id_pendidikan_nonformal']));
	}



	public function register($paket)
	{

		$this->db->insert('tb_pelamar', $paket);

		return $this->db->affected_rows();
	}



	public function isi_data_diri($paket)
	{

		$this->db->insert('tb_data_diri', $paket);

		return $this->db->affected_rows();
	}



	public function isi_data_keluarga($paket)
	{

		$this->db->insert('tb_data_keluarga', $paket);

		return $this->db->affected_rows();
	}



	public function isi_data_pendidikan($paket)
	{

		$this->db->insert('tb_data_pendidikan', $paket);

		return $this->db->affected_rows();
	}



	public function isi_data_pendidikan_nonformal($paket)
	{

		$this->db->insert('tb_data_pendidikan_nonformal', $paket);

		return $this->db->affected_rows();
	}



	public function ambil_data_keluarga($id)
	{

		$query = $this->db->query("SELECT * FROM tb_data_keluarga WHERE id_pelamar = $id");

		return $query->result_array();
	}



	public function modelupdate_keluarga($send)
	{

		$sql = "UPDATE tb_data_keluarga SET id_pelamar = ?, nama_ayah = ?, pekerjaan_ayah = ?, nama_ibu = ? , pekerjaan_ibu = ?, nama_pasangan = ?, pekerjaan_pasangan = ? WHERE id_pelamar = ?";

		$query = $this->db->query($sql, array($send['id_pelamar'], $send['nama_ayah'], $send['pekerjaan_ayah'], $send['nama_ibu'], $send['pekerjaan_ibu'], $send['nama_pasangan'], $send['pekerjaan_pasangan'], $send['id_pelamar']));
	}



	public function do_delete($where, $table)
	{

		$this->db->where($where);

		$this->db->delete($table);
	}



	public function isi_data_pengalaman($paket)
	{

		$this->db->insert('tb_data_pengalaman_kerja', $paket);

		return $this->db->affected_rows();
	}



	public function ambil_data_pengalaman($id)
	{

		$query = $this->db->query("SELECT * FROM tb_data_pengalaman_kerja WHERE id_pengalaman = $id");

		return $query->result_array();
	}



	public function modelupdate_pengalaman($send)
	{

		$sql = "UPDATE tb_data_pengalaman_kerja SET id_pengalaman = ?, id_pelamar = ?, nama_perusahaan = ?, periode = ?, jabatan_akhir = ? , alasan_keluar = ?, nama_referensi = ?, no_hp_referensi = ? WHERE id_pengalaman = ?";

		$query = $this->db->query($sql, array($send['id_pengalaman'], $send['id_pelamar'], $send['nama_perusahaan'], $send['periode'], $send['jabatan_akhir'], $send['alasan_keluar'], $send['nama_referensi'], $send['no_hp_referensi'], $send['id_pengalaman']));
	}



	function changeActiveState($key)

	{



		$data = array(

			'status' => 1

		);



		$this->db->where('encrypt_email', $key);

		$this->db->update('tb_pelamar', $data);



		return true;
	}



	public function send_mail($subject_, $pesan_, $to_)



	{

		$this->load->library('email');



		$this->email



			->from('adm@chaakraconsulting.com', 'Admin Choise')



			->to($to_)



			->subject($subject_)



			->set_mailtype("html")



			->message($pesan_)



			->send();



		return TRUE;
	}
}
