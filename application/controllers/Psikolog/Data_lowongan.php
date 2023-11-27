<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_lowongan extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_data_lowongan');
		$this->load->model('Mdl_data_pelamar');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login','refresh');
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

	// CRUD Lowongan
	public function index()
	{
		$paket['array']=$this->Mdl_data_lowongan->ambildata_lowongan();	
		$this->load->view('psikolog/data_lowongan',$paket);
	}

	// END CRUD Lowongan
// ============================================================================================
	// detail lowongan
	public function detail_lowongan($id_detail)
	{
		$paket['array']=$this->Mdl_data_lowongan->ambildata_apply($id_detail);	
		$this->load->view('psikolog/detail_lowongan',$paket);
	}

	//detail pelamar
	

	public function terima_pelamar($id){
		$where = array('id_apply' => $id);
		$this->Mdl_data_pelamar->terima_pelamar($where,'tb_apply');
		$this->session->set_flashdata('msg_success','Pelamar diterima');
		redirect('Administrator/Data_lowongan/');
	}

	public function tolak_pelamar($id){
		$where = array('id_apply' => $id);
		$this->Mdl_data_pelamar->tolak_pelamar($where,'tb_apply');
		$this->session->set_flashdata('msg_success','Pelamar ditolak');
		redirect('Administrator/Data_lowongan/');
	}


 
}
