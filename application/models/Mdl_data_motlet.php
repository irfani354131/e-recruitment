<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_motlet extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	// DATA LEVEL
	public function ambildata_motlet(){
		$query=$this->db->query("SELECT * FROM tb_soal_motlet");
		return $query->result_array();
	}

	public function ambildata2_motlet($id){
		$query=$this->db->query("SELECT * FROM tb_soal_motlet WHERE id_soal=$id");
		return $query->result_array();
	}

	public function tambahdata_motlet($paket)
		{
			$this->db->insert('tb_soal_motlet', $paket);
			return $this->db->affected_rows();
		}

	public function do_delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_soal_motlet SET id_soal = ?, id_perusahaan = ?, jenis_motlet = ?, soal_motlet = ? WHERE id_soal = ?";
		$query=$this->db->query($sql, array( $send['id_soal'], $send['id_perusahaan'], $send['jenis_motlet'], $send['soal_motlet'], $send['id_soal']));
	}	
	// END DATA LEVEL

// ============================================================================================
	
}