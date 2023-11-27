<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_data_ujian extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// DATA LEVEL
	public function ambildata_ujian()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian");
		return $query->result_array();
	}

	public function ambildata_ujian_ist()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_ist");
		return $query->result_array();
	}
	
	public function ambildata_ujian_holland()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_holland");
		return $query->result_array();
	}

	public function ambildata_ujian_kontrak_psikologis()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_kontrak_psikologis");
		return $query->result_array();
	}

	public function ambildata_ujian_essay()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_essay");
		return $query->result_array();
	}

	public function ambildata_ujian_talent()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_talent");
		return $query->result_array();
	}

	public function ambildata_ujian_studibank()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_studibank");
		return $query->result_array();
	}

	public function ambildata_ujian_rmib_pria()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_rmib_pria");
		return $query->result_array();
	}

	public function ambildata_ujian_rmib_wanita()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_rmib_wanita");
		return $query->result_array();
	}

	public function ambildata_ujian_studi()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_kasus");
		return $query->result_array();
	}

	public function ambildata_ujian_studi_manajerial()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_kasus_manajerial");
		return $query->result_array();
	}
	public function ambildata_ujian_studi_ldg()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_kasus_ldg");
		return $query->result_array();
	}

	public function ambildata_ujian_hitung()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_hitung");
		return $query->result_array();
	}

	public function ambildata_ujian_msdt()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_msdt");
		return $query->result_array();
	}

	public function ambildata_ujian_disc()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_disc");
		return $query->result_array();
	}

	public function ambildata_ujian_papi()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_papi");
		return $query->result_array();
	}

	public function ambildata_ujian_belbin()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_belbin");
		return $query->result_array();
	}
	public function ambildata_ujian_grafis()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_grafis");
		return $query->result_array();
	}
	public function ambildata_ujian_grafis2()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_grafis2");
		return $query->result_array();
	}


	public function ambildata_ujian_epps_sma()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_epps where kategori=2");
		return $query->result_array();
	}

	public function ambildata_ujian_epps_s1()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_epps where kategori=1");
		return $query->result_array();
	}
	
	public function ambildata_ujian_inggris()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_inggris");
		return $query->result_array();
	}

	public function ambildata_ujian2($id)
	{
		$query = $this->db->query("SELECT * FROM tb_ujian WHERE id_ujian=$id");
		return $query->result_array();
	}

	public function ambildata_ujian_leader()
	{
		$query = $this->db->query("SELECT * FROM tb_ujian_leadership");
		return $query->result_array();
	}

	public function tambahdata_ujian($paket)
	{
		$this->db->insert('tb_ujian', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdata_ujian_ist($paket)
	{
		$this->db->insert('tb_ujian_ist', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdata_ujian_belbin($paket)
	{
		$this->db->insert('tb_ujian_belbin', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_grafis($paket)
	{
		$this->db->insert('tb_ujian_grafis', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_grafis2($paket)
	{
		$this->db->insert('tb_ujian_grafis2', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdata_ujian_holland($paket)
	{
		$this->db->insert('tb_ujian_holland', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_disc($paket)
	{
		$this->db->insert('tb_ujian_disc', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_essay($paket)
	{
		$this->db->insert('tb_ujian_essay', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_hitung($paket)
	{
		$this->db->insert('tb_ujian_hitung', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_studi($paket)
	{
		$this->db->insert('tb_ujian_kasus', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_studi_manajerial($paket)
	{
		$this->db->insert('tb_ujian_kasus_manajerial', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_studi_ldg($paket)
	{
		$this->db->insert('tb_ujian_kasus_ldg', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_leader($paket)
	{
		$this->db->insert('tb_ujian_leadership', $paket);
		return $this->db->affected_rows();
	}
	
	public function tambahdata_ujian_msdt($paket)
	{
		$this->db->insert('tb_ujian_msdt', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_papi($paket)
	{
		$this->db->insert('tb_ujian_papi', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdata_ujian_rmib_pria($paket)
	{
		$this->db->insert('tb_ujian_rmib_pria', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_rmib_wanita($paket)
	{
		$this->db->insert('tb_ujian_rmib_wanita', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_studibank($paket)
	{
		$this->db->insert('tb_ujian_studibank', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_ujian_talent($paket)
	{
		$this->db->insert('tb_ujian_talent', $paket);
		return $this->db->affected_rows();
	}
	public function stop_ujian($where, $data, $table)
	{
		if ($this->db->update($table, $data, $where)) {
			return true;
		} else {
			return false;
		}
	}

	public function do_delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


	// ============================================================================================

}
