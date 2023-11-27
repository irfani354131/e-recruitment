<?php



defined('BASEPATH') or exit('No direct script access allowed');



class Home extends CI_Controller

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

		$paket['yoman'] = $this->Mdl_home->ambildata();

		$paket['faq'] = $this->db->query("SELECT * FROM tb_faq where status='aktif'")->result_array();

		$this->load->view('home', $paket);

	}



	public function login2()

	{

		$this->load->view('login2');

	}



	public function lowonganlainnyahome()

	{

		$this->load->view('lowonganlainnyahome');

	}



	public function inputpelatihan()

	{

		$this->form_validation->set_rules('pelatihan', 'Pelatihan', 'trim|required');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');

		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');

		$this->form_validation->set_rules('bidang', 'Bidang', 'trim|required');

		$this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('msg_error', 'Harap Isi Semua Kolom.');

			redirect('Home/');

		} else {
date_default_timezone_set('Asia/Jakarta');
			$data = array(

				'id_pendaftar_pelatihan' => '',

				'id_pelatihan' => $this->input->post('pelatihan'),

				'nama_pendaftar_pelatihan' => $this->input->post('nama'),

				'email_pendaftar' => $this->input->post('email'),

				'no_telp' => $this->input->post('telp'),

				'pendidikan' => $this->input->post('pendidikan'),

				'minat' => $this->input->post('bidang'),

				'sekolah' => $this->input->post('sekolah'),
'waktu' => date("Y-m-d H:i:s")

			);



			$this->db->insert('tb_pendaftar_pelatihan', $data);

			$this->session->set_flashdata('msg_home', 'Berhasil Mendaftar Pelatihan / Talent Test!!!');

			redirect('Home/');

		}

	}

}

