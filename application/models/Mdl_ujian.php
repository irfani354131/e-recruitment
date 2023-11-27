<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Mdl_ujian extends CI_Model
{



	public function __construct()

	{

		parent::__construct();

		$this->load->database();
	}



	// DATA 

	public function get_questions_subtes_1($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_cfit WHERE subtes = 1 AND type_soal = 'Ujian' AND id_soal='$rdr' ");

		return $query->row();
	}



	public function get_answer_subtes_1()
	{

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 1 ");

		return $query->row_array();
	}



	public function get_questions_subtes_2($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_cfit WHERE subtes = 2 AND type_soal = 'Ujian' AND nomor_soal='$rdr' ");

		return $query->row();
	}



	public function get_questions_subtes_3($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_cfit WHERE subtes = 3 AND type_soal = 'Ujian' AND nomor_soal='$rdr' ");

		return $query->row();
	}



	public function get_questions_subtes_4($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_cfit WHERE subtes = 4 AND type_soal = 'Ujian' AND nomor_soal='$rdr' ");

		return $query->row();
	}



	public function insert_jawaban($paket)

	{

		$this->db->insert('tb_data_jawaban_cfit', $paket);

		return $this->db->affected_rows();
	}

	// DATA IST

	public function get_questions_ist_subtes_1($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 1 AND id_soal='$rdr' ");
		//$query=$this->db->query("SELECT * FROM tb_soal_ist WHERE nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_answer_ist_subtes_1()
	{
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE subtes = 1 ");
		return $query->row_array();
	}

	public function get_questions_ist_subtes_2($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 2 AND nomor_soal='$rdr' ");
		//$query=$this->db->query("SELECT * FROM tb_soal_ist WHERE nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_3($rdr)
	{
		//$query=$this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 3 AND nomor_soal='$rdr' ");
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 3 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_4($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 4 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_5($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 5 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_6($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 6 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_7($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 7 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_8($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 8 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_ist_subtes_9($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_ist WHERE subtes = 9 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function insert_jawaban_ist($paket)
	{
		$this->db->insert('tb_data_jawaban_ist', $paket);
		return $this->db->affected_rows();
	}



	public function jawaban_holland($paket)

	{

		$this->db->insert('tb_data_jawaban_holland', $paket);

		return $this->db->affected_rows();
	}

	//Data Rmib
	public function jawaban_rmib_pria($paket)

	{

		$this->db->insert('tb_jawaban_rmib_pria', $paket);

		return $this->db->affected_rows();
	}

	public function jawaban_rmib_wanita($paket)

	{

		$this->db->insert('tb_jawaban_rmib_wanita', $paket);

		return $this->db->affected_rows();
	}



	public function jawaban_essay($paket)

	{

		$this->db->insert('tb_jawaban_essay', $paket);

		return $this->db->affected_rows();
	}



	public function jawaban_studi($paket)

	{

		$this->db->insert('tb_jawaban_studi', $paket);

		return $this->db->affected_rows();
	}



	public function update($where, $data, $table)
	{

		if ($this->db->update($table, $data, $where)) {

			return true;
		} else {

			return false;
		}
	}




	//Data Papikostik

	public function get_questions_papi($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_papi WHERE id_soal='$rdr' ");

		return $query->row();
	}

	public function insert_jawaban_papi($paket)

	{

		$this->db->insert('tb_data_jawaban_papi', $paket);

		return $this->db->affected_rows();
	}

	//Data EPPS

	public function get_questions_epps($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_epps WHERE id_soal='$rdr' ");

		return $query->row();
	}

	public function insert_jawaban_epps($paket)

	{

		$this->db->insert('tb_data_jawaban_epps', $paket);

		return $this->db->affected_rows();
	}

	//Data Inggris

	public function get_questions_inggris($rdr)
	{

		$query = $this->db->query("SELECT * FROM tb_soal_inggris WHERE id_soal='$rdr' ");

		return $query->row();
	}

	public function insert_jawaban_inggris($paket)

	{

		$this->db->insert('tb_data_jawaban_inggris', $paket);

		return $this->db->affected_rows();
	}

	//Data Studi Kasus Manajerial

	public function insert_jawaban_studi_manajerial($paket)
	{
		$this->db->insert('tb_jawaban_studi_manajerial', $paket);
		return $this->db->affected_rows();
	}

	public function jawaban_studi_manajerial($paket)

	{

		$this->db->insert('tb_jawaban_studi_manajerial', $paket);

		return $this->db->affected_rows();
	}
    
    //Data Studi Kasus LDG

	public function insert_jawaban_studi_ldg($paket)
	{
		$this->db->insert('tb_jawaban_studi_ldg', $paket);
		return $this->db->affected_rows();
	}

	public function jawaban_studi_ldg($paket)

	{

		$this->db->insert('tb_jawaban_studi_ldg', $paket);

		return $this->db->affected_rows();
	}

	//Data Talent
	public function jawaban_talent($paket)

	{

		$this->db->insert('tb_jawaban_talent', $paket);

		return $this->db->affected_rows();
	}

	//Data Studi Kasus Bank
	public function jawaban_studibank($paket)
	{

		$this->db->insert('tb_jawaban_studibank', $paket);

		return $this->db->affected_rows();
	}

	//Data Hitung

	public function insert_jawaban_hitung($paket)
	{
		$this->db->insert('tb_jawaban_hitung', $paket);
		return $this->db->affected_rows();
	}

	public function jawaban_hitung($paket)

	{

		$this->db->insert('tb_jawaban_hitung', $paket);

		return $this->db->affected_rows();
	}

	//Data disc

	public function get_questions_disc($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_disc WHERE id_soal='$rdr' ");
		return $query->row();
	}

	public function insert_jawaban_disc($paket)
	{
		$this->db->insert('tb_data_jawaban_disc', $paket);
		return $this->db->affected_rows();
	}


	//Data msdt

	public function get_questions_msdt($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_msdt WHERE id_soal='$rdr' ");
		return $query->row();
	}


	public function insert_jawaban_msdt($paket)
	{
		$this->db->insert('tb_data_jawaban_msdt', $paket);
		return $this->db->affected_rows();
	}

	// Data Leadership

	public function insert_jawaban_leadership($paket)
	{
		$this->db->insert('tb_data_jawaban_leadership', $paket);
		return $this->db->affected_rows();
	}

	public function get_questions_leadership($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_leadership WHERE subtes = 1 AND id_soal='$rdr' ");
		return $query->row();
	}
	// Belbin Tes


	public function get_questions_belbin_subtes_1($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 1 AND id_soal='$rdr' ");
		//$query=$this->db->query("SELECT * FROM tb_soal_ist WHERE nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_answer_belbin_subtes_1()
	{
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE subtes = 1 ");
		return $query->row_array();
	}

	public function get_questions_belbin_subtes_2($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 2 AND nomor_soal='$rdr' ");
		//$query=$this->db->query("SELECT * FROM tb_soal_ist WHERE nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_belbin_subtes_3($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 3 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_belbin_subtes_4($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 4 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_belbin_subtes_5($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 5 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_belbin_subtes_6($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 6 AND nomor_soal='$rdr' ");
		return $query->row();
	}

	public function get_questions_belbin_subtes_7($rdr)
	{
		$query = $this->db->query("SELECT * FROM tb_soal_belbin WHERE subtes = 7 AND nomor_soal='$rdr' ");
		return $query->row();
	}
	public function insert_jawaban_belbin($paket)
	{
		$this->db->insert('tb_data_jawaban_belbin', $paket);
		return $this->db->affected_rows();
	}
	// ============================================================================================
}
