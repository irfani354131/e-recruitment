<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_data_pelamar extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ambildata_pelamar($id)
	{
		$query = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar=$id");
		return $query->result_array();
	}

	public function ambildata_pengumuman($id)
	{
		$query = $this->db->query("SELECT * FROM tb_apply WHERE id_apply=$id");
		return $query->result_array();
	}

	// public function ambildata_pengumuman2($id){
	// 	$query=$this->db->query("SELECT * FROM tb_apply WHERE id_pelamar=$id");
	// 	return $query->result_array();
	// }

	public function modelupdate($send)
	{
		$sql = "UPDATE tb_data_diri SET id_pelamar = ?, nik = ?, nama_pelamar = ?, tempat_lahir = ? , tanggal_lahir = ? , jenis_kelamin = ?, alamat_ktp = ?, status_perkawinan = ?, agama = ?, anak_ke = ?, dari_x_sdr = ?, no_hp = ?, facebook = ?, instagram = ?, alamat = ?, twitter = ?, linkedin = ? WHERE id_pelamar = ?";
		$query = $this->db->query($sql, array($send['id_pelamar'], $send['nik'], $send['nama_pelamar'], $send['tempat_lahir'], $send['tanggal_lahir'], $send['jenis_kelamin'], $send['alamat_ktp'], $send['status_perkawinan'], $send['agama'], $send['anak_ke'], $send['dari_x_sdr'], $send['no_hp'], $send['facebook'], $send['instagram'], $send['alamat'], $send['twitter'], $send['linkedin'], $send['id_pelamar']));
	}

	public function uploadImage($send)
	{
		$sql = "UPDATE tb_pelamar SET id_pelamar = ?,foto = ? WHERE id_pelamar = ?";
		$query = $this->db->query($sql, array($send['id_pelamar'], $send['foto'], $send['id_pelamar']));
	}

	public function updateBerkas($send)
	{
		$sql = "UPDATE tb_berkas SET berkas = ?  WHERE kategori = ? and id_pelamar = ? ";
		$query = $this->db->query($sql, array($send['berkas'], $send['kategori'], $send['id_pelamar']));
	}

	public function inputBerkas($paket)
	{
		$this->db->insert('tb_berkas', $paket);
		return $this->db->affected_rows();
	}

	public function modelupdate_profile($send)
	{
		$sql = "UPDATE tb_pelamar SET id_pelamar = ?, username = ?, password = ?, confirm_password = ? WHERE id_pelamar = ?";
		$query = $this->db->query($sql, array($send['id_pelamar'], $send['username'], $send['password'],  $send['confirm_password'], $send['id_pelamar']));
	}

	public function ambildata_pelamar_()
	{
		$query = $this->db->query("SELECT * FROM tb_data_diri");
		return $query->result_array();
	}

	public function ambildata_pendidikan_()
	{
		$query = $this->db->query("SELECT * FROM tb_data_pendidikan");
		return $query->result_array();
	}

	public function ambildata_pendidikan_non_()
	{
		$query = $this->db->query("SELECT * FROM tb_data_pendidikan_nonformal");
		return $query->result_array();
	}

	public function ambildata_pengalaman_()
	{
		$query = $this->db->query("SELECT * FROM tb_data_pengalaman_kerja");
		return $query->result_array();
	}

	public function ambildata_mot()
	{
		$query = $this->db->query("SELECT * FROM tb_motivation_letter");
		return $query->result_array();
	}

	public function ambildata_pendidikan($id = FALSE)
	{

		if ($id == TRUE) {

			$this->db->from('tb_data_pendidikan');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		} else {

			$this->db->from('tb_data_diri');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		}

		return $query->result_array();
	}

	public function ambildata_pendidikan_non($id = FALSE)
	{

		if ($id == TRUE) {

			$this->db->from('tb_data_pendidikan_nonformal');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		} else {

			$this->db->from('tb_data_diri');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		}

		return $query->result_array();
	}

	public function ambildata_berkas($id = FALSE)
	{

		if ($id == TRUE) {

			$this->db->from('tb_berkas');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		} else {

			$this->db->from('tb_data_diri');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		}

		return $query->result_array();
	}

	public function ambildata_keluarga($id = FALSE)
	{

		if ($id == TRUE) {

			$this->db->from('tb_data_keluarga');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		} else {

			$this->db->from('tb_data_diri');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		}

		return $query->result_array();
	}

	public function ambildata_pengalaman($id = FALSE)
	{

		if ($id == TRUE) {

			$this->db->from('tb_data_pengalaman_kerja');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		} else {

			$this->db->from('tb_data_diri');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		}

		return $query->result_array();
	}

	public function ambildata_motlet($id = FALSE)
	{

		if ($id == TRUE) {

			$this->db->from('tb_motivation_letter');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		} else {

			$this->db->from('tb_data_diri');

			$this->db->where('id_pelamar', $id);

			$query = $this->db->get();
		}

		return $query->result_array();
	}

	public function terima_pelamar($where, $table)
	{
		$this->db->where($where);
		$this->db->SET('status_lamaran', 'Diterima');
		$this->db->update($table);
	}

	public function tolak_pelamar($where, $table)
	{
		$this->db->where($where);
		$this->db->SET('status_lamaran', 'Tidak lolos');
		$this->db->update($table);
	}

	// END DATA LEVEL

	// ============================================================================================

}
