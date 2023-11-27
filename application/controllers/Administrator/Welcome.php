<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_data_level');
		$this->load->model('Mdl_data_nilai');
		$this->load->model('Mdl_data_pelamar');
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



	public function index()
	{

		$this->load->view('administrator/dashboard');
	}
	public function data_pelamar()
	{
		// $paket['array'] = $this->Mdl_data_pelamar->ambildata_pelamar_();
		$paket['array'] = $this->db->query("SELECT *,a.id_pelamar as id FROM tb_pelamar a LEFT JOIN tb_data_diri b ON a.`id_pelamar`=b.`id_pelamar`")->result_array();
		$this->load->view('administrator/data_pelamar', $paket);
	}
	public function verifikasi_pelamar($id)
	{
		$this->db->query("UPDATE tb_pelamar SET status='1' where id_pelamar=$id");
		$this->session->set_flashdata('msg', 'Verifikasi Akun Berhasil!!!');
		redirect('Administrator/Welcome/data_pelamar');
	}

	// CRUD Level
	public function data_level()
	{
		$paket['array'] = $this->Mdl_data_level->ambildata();
		$this->load->view('administrator/data_level', $paket);
	}

	public function tambahdata()
	{
		$this->form_validation->set_rules('nama_level', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_level', $data);
		} else {
			$send['id_level'] = '';
			$send['nama_level'] = $this->input->post('nama_level');

			$kembalian['jumlah'] = $this->Mdl_data_level->tambahdata_level($send);

			$this->load->view('administrator/data_level', $kembalian);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Welcome/data_level');
		}
	}

	public function do_delete($id)
	{
		$where = array('id_level' => $id);
		$this->Mdl_data_level->do_delete($where, 'tb_level');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Administrator/Welcome/data_level');
	}

	public function edit_level($id_update)
	{
		$this->form_validation->set_rules('nama_level', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->Mdl_data_level->ambildata2_level($id_update);
			$this->load->view('administrator/vedit_level', $indexrow);
		} else {
			$send['id_level'] = $this->input->post('id_level');
			$send['nama_level'] = $this->input->post('nama_level');
			// var_dump($send);
			$kembalian['jumlah'] = $this->Mdl_data_level->modelupdate($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Welcome/data_level');
		}
	}

	// END CRUD Level
	// ============================================================================================
	// CRUD DATA Admin
	public function data_admin()
	{
		$paket['array'] = $this->Mdl_data_level->ambildata_admin();
		$this->load->view('administrator/data_admin', $paket);
	}

	public function tambahdata_admin()
	{
		$this->form_validation->set_rules('nama_admin', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_level', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_admin', $data);
		} else {
			$send['id_admin'] = '';
			$send['nama_admin'] = $this->input->post('nama_admin');
			$send['username'] = $this->input->post('username');
			$send['password'] = md5($this->input->post('password'));
			$send['id_level'] = $this->input->post('id_level');

			var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_data_level->tambahdata_admin($send);

			$this->load->view('administrator/data_admin', $kembalian);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Welcome/data_admin');
		}
	}

	public function edit_admin($id_update)
	{
		$this->form_validation->set_rules('nama_admin', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_level', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->Mdl_data_level->ambildata2_admin($id_update);
			$this->load->view('administrator/vedit_admin', $indexrow);
		} else {
			$send['id_admin'] = $this->input->post('id_admin');
			$send['nama_admin'] = $this->input->post('nama_admin');
			$send['username'] = $this->input->post('username');
			$send['password'] = $this->input->post('password');
			$send['id_level'] = $this->input->post('id_level');
			// var_dump($send);
			$kembalian['jumlah'] = $this->Mdl_data_level->modelupdate_admin($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Welcome/data_admin');
		}
	}

	public function hapus_admin($id)
	{
		$where = array('id_admin' => $id);
		$this->Mdl_data_level->do_delete_admin($where, 'tb_admin');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Administrator/Welcome/data_admin');
	}
	// END CRUD DATA ADMIN
	// ===============================================================================================
	// CRUD DATA PERUSAHAAN
	public function data_perusahaan()
	{
		$paket['array'] = $this->Mdl_data_level->ambildata_perusahaan();
		$this->load->view('administrator/data_perusahaan', $paket);
	}

	public function tambahdata_perusahaan()
	{
		$this->form_validation->set_rules('nama_perusahaan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_perusahaan', $data);
		} else {
			$send['id_perusahaan'] = '';
			$send['nama_perusahaan'] = $this->input->post('nama_perusahaan');
			$send['jenis_usaha'] = $this->input->post('jenis_usaha');
			$send['alamat'] = $this->input->post('alamat');
			$send['email'] = $this->input->post('email');
			$send['username'] = $this->input->post('username');
			$send['password'] = md5($this->input->post('password'));
			$send['website'] = $this->input->post('website');
			$send['facebook'] = $this->input->post('facebook');
			$send['instagram'] = $this->input->post('instagram');
			$send['twitter'] = $this->input->post('twitter');
			$send['no_hp'] = $this->input->post('no_hp');
			$send['id_level'] = $this->input->post('id_level');

			if ($_FILES["berkas"]["name"] != "") {
				$config['upload_path']          = './upload/logo_perusahaan/';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['file_name'] = "Logo" . date('ymd') . "_" . $send['id_perusahaan'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('berkas')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('administrator/vtambah_perusahaan');
				} else {
					$data = $this->upload->data();
					$send['logo_perusahaan'] = $data['file_name'];
				}
			}
			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_data_level->tambahdata_perusahaan($send);

			$this->load->view('administrator/data_perusahaan', $kembalian);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Welcome/data_perusahaan');
		}
	}

	public function hapus_perusahaan($id)
	{
		$where = array('id_perusahaan' => $id);

		$query_cekFoto = $this->db->query("SELECT * FROM tb_perusahaan");

		foreach ($query_cekFoto->result() as $key) {
			if ($key->id_perusahaan == $id) {
				$file_foto = $key->logo_perusahaan;
			}
		}
		if ($file_foto != "") {
			$target = "upload/logo_perusahaan/" . $file_foto;
			unlink($target);
		}

		$this->Mdl_data_level->do_delete_perusahaan($where, 'tb_perusahaan');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Administrator/Welcome/data_perusahaan');
	}

	public function edit_perusahaan($id_update)
	{
		$this->form_validation->set_rules('nama_perusahaan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->Mdl_data_level->ambildata2_perusahaan($id_update);
			$this->load->view('administrator/vedit_perusahaan', $indexrow);
		} else {
			$send['id_perusahaan'] = $this->input->post('id_perusahaan');
			$send['nama_perusahaan'] = $this->input->post('nama_perusahaan');
			$send['jenis_usaha'] = $this->input->post('jenis_usaha');
			$send['alamat'] = $this->input->post('alamat');
			$send['email'] = $this->input->post('email');
			$send['username'] = $this->input->post('username');
			$send['password'] = md5($this->input->post('password'));
			$send['website'] = $this->input->post('website');
			$send['facebook'] = $this->input->post('facebook');
			$send['instagram'] = $this->input->post('instagram');
			$send['twitter'] = $this->input->post('twitter');
			$send['no_hp'] = $this->input->post('no_hp');
			$send['id_level'] = $this->input->post('id_level');


			$current = $this->input->post('id_perusahaan');
			$query = $this->db->query("SELECT * FROM tb_perusahaan WHERE id_perusahaan=$current")->result_array();

			if ($_FILES["berkas"]["name"] != "" && $_FILES["berkas"]["name"] != $query[0]['logo_perusahaan']) {
				$config['upload_path']          = './upload/logo_perusahaan/';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['file_name'] = "Logo" . date('ymd') . "_" . $send['id_perusahaan'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('berkas')) {
					$error = $this->upload->display_errors();
					// // var_dump($error);
					$this->session->set_flashdata('msg_error', $error);
					$indexrow['data'] = $this->Mdl_data_level->ambildata2_perusahaan($id_update);
					$this->load->view('administrator/vedit_perusahaan', $indexrow);
				} else {
					$target = "./upload/logo_perusahaan/" . $query[0]['logo_perusahaan'];
					unlink($target);
					$data = $this->upload->data();
					$send['logo_perusahaan'] = $data['file_name'];
				}
			} else {
				$send['logo_perusahaan'] = $query[0]['logo_perusahaan'];
			}
			// var_dump($send);
			$kembalian['jumlah'] = $this->Mdl_data_level->modelupdate_perusahaan($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Welcome/data_perusahaan');
		}
	}
	// END CRUD PERUSAHAAN
	// =============================================================================================
	// START CRUD PSIKOLOG

	public function data_psikolog()
	{
		$paket['array'] = $this->Mdl_data_level->ambildata_psikolog();
		$this->load->view('administrator/data_psikolog', $paket);
	}

	public function tambahdata_psikolog()
	{
		$this->form_validation->set_rules('nama_psikolog', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_level', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_psikolog', $data);
		} else {
			$send['id_psikolog'] = '';
			$send['nama_psikolog'] = $this->input->post('nama_psikolog');
			$send['no_hp'] = $this->input->post('no_hp');
			$send['username'] = $this->input->post('username');
			$send['password'] = md5($this->input->post('password'));
			$send['id_level'] = $this->input->post('id_level');

			var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_data_level->tambahdata_psikolog($send);

			$this->load->view('administrator/data_psikolog', $kembalian);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Welcome/data_psikolog');
		}
	}

	public function hapus_psikolog($id)
	{
		$where = array('id_psikolog' => $id);
		$this->Mdl_data_level->do_delete_psikolog($where, 'tb_psikolog');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Administrator/Welcome/data_psikolog');
	}

	public function edit_psikolog($id_update)
	{
		$this->form_validation->set_rules('nama_psikolog', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id_level', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->Mdl_data_level->ambildata2_psikolog($id_update);
			$this->load->view('administrator/vedit_psikolog', $indexrow);
		} else {
			$send['id_psikolog'] = $this->input->post('id_psikolog');
			$send['nama_psikolog'] = $this->input->post('nama_psikolog');
			$send['no_hp'] = $this->input->post('no_hp');
			$send['username'] = $this->input->post('username');
			$send['password'] = md5($this->input->post('password'));
			$send['id_level'] = $this->input->post('id_level');
			// var_dump($send);
			$kembalian['jumlah'] = $this->Mdl_data_level->modelupdate_psikolog($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Welcome/data_psikolog');
		}
	}
	// END CRUD PSIKOLOG
	// =============================================================================================
	// START CRUD FAQ

	public function data_faq()
	{
		$paket['data'] = $this->db->query("SELECT * FROM tb_faq")->result_array();
		$this->load->view('administrator/data_faq', $paket);
	}

	public function tambahdata_faq()
	{
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_faq', $data);
		} else {
			$pertanyaan = $this->input->post('pertanyaan');
			$jawaban = $this->input->post('jawaban');
			$status = $this->input->post('status');
			$this->db->query("INSERT INTO tb_faq (pertanyaan,jawaban,status) values ('$pertanyaan','$jawaban','$status')");
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Welcome/data_faq');
		}
	}

	public function hapus_faq($id)
	{
		$this->db->query("DELETE FROM tb_faq WHERE id_faq = $id");
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Administrator/Welcome/data_faq');
	}

	public function edit_faq($id_update)
	{
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$indexrow['data'] = $this->db->query("SELECT * FROM tb_faq WHERE id_faq=$id_update")->result_array();
			$this->load->view('administrator/vedit_faq', $indexrow);
		} else {
			$id = $this->input->post('id_faq');
			$pertanyaan = $this->input->post('pertanyaan');
			$jawaban = $this->input->post('jawaban');
			$status = $this->input->post('status');
			$this->db->query("UPDATE tb_faq SET pertanyaan='$pertanyaan',jawaban='$jawaban',status='$status' where id_faq=$id");
			echo "UPDATE tb_faq SET pertanyaan='$pertanyaan',jawaban='$jawaban',status='$status' where id_faq=$id";
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Welcome/data_faq');
		}
	}
	// END CRUD FAQ
	// =============================================================================================

}
