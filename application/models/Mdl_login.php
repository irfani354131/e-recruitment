<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_login extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function auth_administrator($username, $password)
	{
		$query = $this->db->query('SELECT * FROM tb_admin where username="' . $username . '" AND password="' . $password . '" AND id_level=1');
		return $query;
	}

	public function auth_admin_sdm($username, $password)
	{
		$query = $this->db->query('SELECT * FROM tb_admin where username="' . $username . '" AND password="' . $password . '" AND id_level=2');
		return $query;
	}

	public function auth_psikologi($username, $password)
	{
		$query = $this->db->query('SELECT * FROM tb_psikolog where username="' . $username . '" AND password="' . $password . '" AND id_level=4');
		return $query;
	}

	public function auth_perusahaan($username, $password)
	{
		$query = $this->db->query('SELECT * FROM tb_perusahaan where username="' . $username . '" AND password="' . $password . '" AND id_level=3');
		return $query;
	}

	public function auth_pelamar($username, $password)
	{
		$query = $this->db->query('SELECT * FROM tb_pelamar where username="' . $username . '" AND password="' . $password . '" AND id_level=5');
		return $query;
	}
}
