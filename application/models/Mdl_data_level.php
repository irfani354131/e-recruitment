<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_level extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	// DATA LEVEL
	public function ambildata(){
		$query=$this->db->query("SELECT * FROM tb_level");
		return $query->result_array();
	}

	public function ambildata2_level($id){
		$query=$this->db->query("SELECT * FROM tb_level WHERE id_level=$id");
		return $query->result_array();
	}

	public function tambahdata_level($paket)
		{
			$this->db->insert('tb_level', $paket);
			return $this->db->affected_rows();
		}

	public function do_delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_level SET id_level = ?, nama_level = ? WHERE id_level = ?";
		$query=$this->db->query($sql, array( $send['id_level'], $send['nama_level'], $send['id_level']));
	}	
	// END DATA LEVEL

// ============================================================================================
	// Start CURD DATA ADMIN
	public function ambildata_admin(){
		$query=$this->db->query("SELECT * FROM tb_admin");
		return $query->result_array();
	}

	public function ambildata2_admin($id){
		$query=$this->db->query("SELECT * FROM tb_admin WHERE id_admin=$id");
		return $query->result_array();
	}

	public function tambahdata_admin($paket)
		{
			$this->db->insert('tb_admin', $paket);
			return $this->db->affected_rows();
	}

	public function modelupdate_admin($send){
		$sql="UPDATE tb_admin SET id_admin = ?, nama_admin = ?, username = ?, password = ?, id_level = ? WHERE id_admin = ?";
		$query=$this->db->query($sql, array( $send['id_admin'], $send['nama_admin'], $send['username'], $send['password'], $send['id_level'], $send['id_admin']));
	}	

	public function do_delete_admin($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// END CRUD ADMIN
// ===================================================================================================
	// Start CRUD PERUSAHAAN
	public function ambildata_perusahaan(){
		$query=$this->db->query("SELECT * FROM tb_perusahaan");
		return $query->result_array();
	}

	public function ambildata2_perusahaan($id){
		$query=$this->db->query("SELECT * FROM tb_perusahaan WHERE id_perusahaan=$id");
		return $query->result_array();
	}

	public function tambahdata_perusahaan($paket)
		{
			$this->db->insert('tb_perusahaan', $paket);
			return $this->db->affected_rows();
	}

	public function do_delete_perusahaan($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate_perusahaan($send){
		$sql="UPDATE tb_perusahaan SET id_perusahaan = ?, nama_perusahaan = ?, jenis_usaha = ?, alamat = ?, email = ?, logo_perusahaan = ?, username = ?, password = ?, website = ?, facebook = ?, instagram = ?, twitter = ?, no_hp = ?, id_level = ? WHERE id_perusahaan = ?";
		$query=$this->db->query($sql, array( $send['id_perusahaan'], $send['nama_perusahaan'], $send['jenis_usaha'], $send['alamat'], $send['email'], $send['logo_perusahaan'], $send['username'], $send['password'], $send['website'], $send['facebook'], $send['instagram'], $send['twitter'], $send['no_hp'], $send['id_level'], $send['id_perusahaan']));
	}	
	// END CRUD PERUSAHAAN
// ================================================================================================
	// START CRUD PSIKOLOG
	public function ambildata_psikolog(){
		$query=$this->db->query("SELECT * FROM tb_psikolog");
		return $query->result_array();
	}

	public function ambildata2_psikolog($id){
		$query=$this->db->query("SELECT * FROM tb_psikolog WHERE id_psikolog=$id");
		return $query->result_array();
	}

	public function tambahdata_psikolog($paket)
		{
			$this->db->insert('tb_psikolog', $paket);
			return $this->db->affected_rows();
	}

	public function do_delete_psikolog($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate_psikolog($send){
		$sql="UPDATE tb_psikolog SET id_psikolog = ?, no_hp = ?, nama_psikolog = ?, username = ?, password = ?, id_level = ? WHERE id_psikolog = ?";
		$query=$this->db->query($sql, array( $send['id_psikolog'], $send['no_hp'], $send['nama_psikolog'], $send['username'], $send['password'], $send['id_level'], $send['id_psikolog']));
	}	
}