<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_home');
		$this->load->model('Mdl_data_pelamar');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_pelamar','refresh');
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

	public function pengumuman($id)
	{
		$paket['array']=$this->Mdl_data_pelamar->ambildata_pengumuman($id);	
		$this->load->view('pengumuman',$paket);
	}

	public function pengumuman2()
	{
		// $paket['array']=$this->Mdl_data_pelamar->ambildata_pengumuman2($id);	
		$this->load->view('pengumuman2');
	}
	
	
}