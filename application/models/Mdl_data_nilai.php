<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Mdl_data_nilai extends CI_Model {



	public function __construct()

		{

			parent::__construct();

			$this->load->database();

		}



	// DATA 

	public function ambildata_nilai(){

		$query=$this->db->query("SELECT * FROM tb_nilai");

		return $query->result_array();

	}

	
	public function ambildata_nilai_perusahaan($id){
		$query=$this->db->query("SELECT * FROM tb_nilai");

		return $query->result_array();
	}



	public function get_apply($id){

		$query=$this->db->query("SELECT * FROM tb_apply WHERE id_lowongan = $id AND status_lamaran = 'Diterima'");

		return $query->result_array();

	}



	public function get_essay($id){

		$query=$this->db->query("SELECT * FROM tb_jawaban_essay WHERE id_pelamar = $id");

		return $query->result_array();

	}



	public function get_studi($id){

		$query=$this->db->query("SELECT * FROM tb_jawaban_studi WHERE id_pelamar = $id");

		return $query->result_array();

	}



	public function ambil_cfit($id_lowongan, $id_pelamar){

		$query=$this->db->query("SELECT * FROM tb_nilai_cfit WHERE id_lowongan = $id_lowongan AND id_pelamar = $id_pelamar");

		return $query->result_array();

	}



	public function ambil_cfit_lowongan($id_lowongan){

		$query=$this->db->query("SELECT * FROM tb_nilai_cfit WHERE id_lowongan = $id_lowongan");

		return $query->result_array();

	}



	public function ambildata_nilai2($id){

		$query=$this->db->query("SELECT * FROM tb_nilai WHERE id_nilai=$id");

		return $query->result_array();

	}



	public function modelupdate_nilai($send){

		$sql="UPDATE tb_nilai SET id_nilai = ?, nilai_wawancara = ?, nilai_fgd = ? WHERE id_nilai = ?";

		$query=$this->db->query($sql, array( $send['id_nilai'], $send['nilai_wawancara'], $send['nilai_fgd'], $send['id_nilai']));

	}



	public function modelupdate_deskripsi($send){

		$sql="UPDATE tb_nilai SET id_nilai = ?, gambaran_kepribadian = ?, kesimpulan = ? WHERE id_nilai = ?";

		$query=$this->db->query($sql, array( $send['id_nilai'], $send['gambaran_kepribadian'], $send['kesimpulan'], $send['id_nilai']));

	}	



	// public function ambildata2_motlet($id){

	// 	$query=$this->db->query("SELECT * FROM tb_soal_motlet WHERE id_soal=$id");

	// 	return $query->result_array();

	// }



	public function input_nilai($paket)

		{

			$this->db->insert('tb_nilai_cfit', $paket);

			return $this->db->affected_rows();

		}



	// public function do_delete($where,$table){

	// 	$this->db->where($where);

	// 	$this->db->delete($table);

	// }



	//

	// END DATA LEVEL



// ============================================================================================

	

}