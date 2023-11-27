<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Data_nilai extends CI_Controller
{



	public function __construct() //MEMPERSIAPKAN

	{

		parent::__construct();

		$this->load->helper('url', 'form');

		$this->load->model('Mdl_data_nilai');

		$this->load->library('form_validation');

		$this->load->database();

		if ($this->session->userdata('masuk') == FALSE) {

			redirect('Login', 'refresh');
		}
	}



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */



	public function nilai_pelamar($id_lowongan)
	{
		$a = $this->db->query("SELECT * FROM tb_nilai WHERE id_lowongan=$id_lowongan")->result_array();
		// var_dump($a);
		// $paket['array'] = $this->Mdl_data_nilai->ambildata_nilai();
		$paket['array'] = $a;
		$this->load->view('perusahaan/data_nilai', $paket);
	}




	// CRUD Motlet

	public function data_lowongan_nilai($id_perusahaan)
	{
		// $paket['array'] = $this->Mdl_data_lowongan->ambildata_lowongan();
		// echo $id_perusahaan;
		$paket['array'] = $this->db->query("SELECT * FROM tb_lowongan WHERE id_perusahaan=$id_perusahaan")->result_array();
		$this->load->view('perusahaan/data_lowongan_nilai', $paket);
	}



	public function detail_nilai($id_detail)
	{
		// $paket['array'] = $this->Mdl_data_nilai->ambildata_nilai2($id_detail);
		$paket['array'] = $this->db->query("SELECT * FROM tb_nilai WHERE id_nilai=$id_detail")->result_array();
//var_dump($paket['array']);
		$this->load->view('perusahaan/detail_nilai', $paket);
	}




	// END CRUD Motlet

	// ============================================================================================





}
