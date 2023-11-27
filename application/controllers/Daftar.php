<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_home');
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
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('email', 'Nama', 'trim|required');
		$this->form_validation->set_rules('pass', 'Nama', 'trim|required');
		$this->form_validation->set_rules('repass', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('daftar1', $data);
		} else {

			$emailW = $this->input->post('email');

			$query = $this->db->query("SELECT * FROM tb_pelamar WHERE email = '$emailW'");


			if ($query->num_rows() >= 1) {
				echo '<script language="javascript"> alert("Email sudah terdaftar, silahkan verifikasi email");document.location.href = "../Daftar";</script>';
			} else {


				$send['id_pelamar'] = '';
				$send['id_level'] = 5;
				$send['username'] = $this->input->post('username');
				$send['email'] = $this->input->post('email');
				$send['password'] = md5($this->input->post('pass'));
				$send['confirm_password'] = $this->input->post('repass');

				$send['encrypt_email']		= md5($this->input->post('email'));

				$kembalian['jumlah'] = $this->Mdl_home->register($send);


				$this->load->view('daftar1', $kembalian);
				$this->session->set_flashdata('msg', 'Pendaftaran berhasil dilakukan!!! Silahkan verifikasi akun anda melalui email');

				/*Kirim email*/

				$encrypted_id = md5($this->input->post('email'));

				$pesan_ = '
				Terimakasih telah melakukan pendaftaran, untuk verifikasi akun silahkan klik tautan dibawah ini :<br><br>
				<a href=' . site_url() . 'daftar/verification/' . $encrypted_id . '>' . site_url() . 'daftar/verification/' . $encrypted_id . '</a><br><br>
				Jika ada kendala atau hal yang ingin ditanyakan silahkan hubungi kami :<br>
				E-mail : adm@chaakraconsulting.com<br>
				Telepon / WhatsApp : +62 856-4820-0701
				';
				$to_ = $this->input->post('email');

				// Load library email dan konfigurasinya
				$this->load->library('email');

				// Email dan nama pengirim
				$this->email->from('chaakraconsulting@gmail.com', 'Chaakra Consulting');

				// Email penerima
				$this->email->to($to_); // Ganti dengan email tujuan

				// Lampiran email, isi dengan url/path file
				// $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

				// Subject email
				$this->email->subject('Verifikasi Akun Choise Chaakra Consulting');

				// Isi email
				$this->email->message($pesan_);

				// Tampilkan pesan sukses atau error
				$this->email->send();


				redirect('Login_pelamar/');
			}
		}
	}

	public function verification($key)
	{
		$this->Mdl_home->changeActiveState($key);

		$this->load->view('verifikasi');
	}
	public function send_m()
	{
		// Load library email dan konfigurasinya
		$this->load->library('email');

		// Email dan nama pengirim
		$this->email->from('adm@chaakraconsulting.com', 'Chaakra Consulting');

		// Email penerima
		$this->email->to('tisuwajah1708@gmail.com'); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
		// $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

		// Subject email
		$this->email->subject('Verifikasi Akun Choise Chaakra Consulting');

		// Isi email
		$this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/kirim-email-codeigniter/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

		// Tampilkan pesan sukses atau error
		$this->email->send();
	}
}
