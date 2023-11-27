<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelamar extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_login');
		$this->load->library('form_validation');
		$this->load->database();
		// if($this->session->userdata('masuk') == FALSE){
		// 	redirect('Login_user','refresh');
		// }		
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
		$this->load->view('login2');
	}

	public function do_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));


		$cek_pelamar = $this->Mdl_login->auth_pelamar($username,$password);


		if ($cek_pelamar->num_rows()>0) {
			$data=$cek_pelamar->row_array();
			$level = $this->db->query("SELECT * FROM tb_level");
					foreach ($level->result() as $key_level) {
						if ($key_level->id_level==$data['id_level']) {
							$this->session->set_userdata('ses_idLevel', $key_level->nama_level);
						}
					}

			if ($data['status']==0) {
				$this->session->set_flashdata('msg_email','Email belum diaktivasi, jika belum menerima email silahkan cek spam email anda');
				redirect('Login_pelamar');
			}

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_user',$data['username']);	
			$this->session->set_userdata('ses_id',$data['id_pelamar']);	
			// $this->session->set_userdata('ses_idLevel',$level);	
			redirect(base_url('Pelamar/Pelamar/Dashboard'));
		}
		else{
			$this->session->set_flashdata('msg_gagal','Username dan Password Salah');
			redirect(base_url('Login_pelamar'));
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login_pelamar'));
	}
}
