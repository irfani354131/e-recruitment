<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_lowongan extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	// DATA LEVEL
	public function ambildata_lowongan(){
		$query=$this->db->query("SELECT * FROM tb_lowongan");
		return $query->result_array();
	}

	public function ambildata_lowongan_perusahaan($id){
		$query=$this->db->query("SELECT * FROM tb_lowongan WHERE id_perusahaan=$id");
		return $query->result_array();
	}

	public function ambildata_apply($id=FALSE){

		if($id==TRUE){

			$this->db->from('tb_apply');  

			$this->db->where('id_lowongan',$id);

			$query = $this->db->get();

		}else{

			$this->db->from('tb_lowongan');

			$this->db->where('id_lowongan',$id);

			$query = $this->db->get();

		}

		return $query->result_array();

		// $query=$this->db->query("SELECT * FROM tb_apply where id_lowongan=$id");
		// return $query->result_array();
	}

	public function ambildata2_lowongan($id){
		$query=$this->db->query("SELECT * FROM tb_lowongan WHERE id_lowongan=$id");
		return $query->result_array();
	}

	public function tambahdata_lowongan($paket)
		{
			$this->db->insert('tb_lowongan', $paket);
			return $this->db->affected_rows();
		}

	public function do_delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_lowongan SET id_lowongan = ?, nama_jabatan = ?, id_perusahaan = ?, id_jenis_motlet = ?, jadwal_seleksi = ?, kota_penempatan = ?, persyaratan = ?, gaji = ? WHERE id_lowongan = ?";
		$query=$this->db->query($sql, array( $send['id_lowongan'], $send['nama_jabatan'], $send['id_perusahaan'], $send['id_jenis_motlet'], $send['jadwal_seleksi'], $send['kota_penempatan'], $send['persyaratan'], $send['gaji'], $send['id_lowongan']));
	}	

	public function modelupdate_sembunyi($send){
		$sql="UPDATE tb_lowongan SET id_lowongan = ?, status = ? WHERE id_lowongan = ?";
		$query=$this->db->query($sql, array( $send['id_lowongan'], $send['status'], $send['id_lowongan']));
	}	
	// END DATA LEVEL

// ============================================================================================
	
}