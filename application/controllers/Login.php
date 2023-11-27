<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_login');
		$this->load->library('form_validation');
		$this->load->database();
		// if($this->session->userdata('masuk') == FALSE){
		//redirect('Login_user','refresh');
		//}		
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

	public function index()
	{
		$this->load->view('login');
	}

	public function do_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));


		$cek_administrator = $this->Mdl_login->auth_administrator($username,$password);
		$cek_admin_sdm = $this->Mdl_login->auth_admin_sdm($username,$password);
		$cek_psikologi = $this->Mdl_login->auth_psikologi($username,$password);
		$cek_perusahaan = $this->Mdl_login->auth_perusahaan($username,$password);


		if ($cek_administrator->num_rows()>0) {
			$data=$cek_administrator->row_array();
			$level = $this->db->query("SELECT * FROM tb_level");
					foreach ($level->result() as $key_level) {
						if ($key_level->id_level==$data['id_level']) {
							$this->session->set_userdata('ses_idLevel', $key_level->nama_level);
						}
					}

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_nama',$data['nama_admin']);	
			$this->session->set_userdata('ses_id',$data['id_admin']);	
			// $this->session->set_userdata('ses_idLevel',$level);	
			redirect(base_url('Administrator/Welcome'));
		}
		else if ($cek_admin_sdm->num_rows()>0) {
			$data=$cek_admin_sdm->row_array();
			$level = $this->db->query("SELECT * FROM tb_level");
					foreach ($level->result() as $key_level) {
						if ($key_level->id_level==$data['id_level']) {
							$this->session->set_userdata('ses_idLevel', $key_level->nama_level);
						}
					}

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_nama',$data['nama_admin']);	
			$this->session->set_userdata('ses_id',$data['id_admin']);
			// $this->session->set_userdata('ses_idLevel',$data['id_level']);
			// echo 'hahal bos';	
			redirect(base_url('Administrator/Welcome'));
		}
		else if ($cek_psikologi->num_rows()>0) {
			$data=$cek_psikologi->row_array();
			$level = $this->db->query("SELECT * FROM tb_level");
					foreach ($level->result() as $key_level) {
						if ($key_level->id_level==$data['id_level']) {
							$this->session->set_userdata('ses_idLevel', $key_level->nama_level);
						}
					}

			// echo 'hahal bos';	
			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_nama',$data['nama_psikolog']);	
			$this->session->set_userdata('ses_id',$data['id_psikolog']);
			// $this->session->set_userdata('ses_idLevel',$data['id_level']);
			redirect(base_url('Administrator/Welcome'));
		}
		else if ($cek_perusahaan->num_rows()>0) {
			$data=$cek_perusahaan->row_array();
			$level = $this->db->query("SELECT * FROM tb_level");
					foreach ($level->result() as $key_level) {
						if ($key_level->id_level==$data['id_level']) {
							$this->session->set_userdata('ses_idLevel', $key_level->nama_level);
						}
					}

			// echo 'hahal bos';	
			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_nama',$data['nama_perusahaan']);	
			$this->session->set_userdata('ses_id',$data['id_perusahaan']);
			// $this->session->set_userdata('ses_idLevel',$data['id_level']);
			redirect(base_url('Perusahaan/Dashboard'));
		}
		
		else{
			$this->session->set_flashdata('msg_gagal','Username dan Password Salah');
			redirect(base_url('Login'));
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}
