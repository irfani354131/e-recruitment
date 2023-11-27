<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_tkb_bussiness_development extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_soal');
		// $this->load->model('mdl_data_nilai');
		// $this->load->model('mdl_data_pelamar');
		$this->load->library('form_validation');
		$this->load->database();
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login', 'refresh');
		}
	}

	public function index()
	{
		// echo 'A';
		$paket['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_bussinessdevelopmentstaff")->result_array();
		$this->load->view('soal/tkb_bussiness_development/soal_tkb_bussiness_development', $paket);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('no_soal', 'No Soal', 'trim|required');
		$no_soal = $this->input->post('no_soal');
		$id_soal = $this->input->post('id_soal');
		$soal = $this->input->post('soal');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$jawaban = $this->input->post('jawaban');

		if ($this->form_validation->run() == FALSE || $no_soal == 'zero') {

			// $this->session->set_flashdata('msg_error', 'Isi Seluruh Data.');
			$this->load->view('soal/tkb_bussiness_development/vtambah_tkb_bussiness_development');
		} else {
			$cek_no_soal = $this->db->query("SELECT * FROM tb_soal_tkb_bussinessdevelopmentstaff WHERE no_soal=$no_soal")->result_array();
			if (count($cek_no_soal) > 0) {
				$this->session->set_flashdata('msg_error', 'Nomor Soal Sudah Ada.');
				$this->load->view('soal/tkb_bussiness_development/vtambah_tkb_bussiness_development');
			} else {
				$send['id_soal'] = $id_soal;
				$send['no_soal'] = $no_soal;
				$send['soal'] = $soal;
				$send['opsi_a'] = $opsi_a;
				$send['opsi_b'] = $opsi_b;
				$send['opsi_c'] = $opsi_c;
				$send['opsi_d'] = $opsi_d;
				$send['opsi_e'] = $opsi_e;
				$send['jawaban'] = $jawaban;

				// $kembalian['jumlah'] = $this->Mdl_soal->tambahdata_inggris($send);
				$this->db->insert('tb_soal_tkb_bussinessdevelopmentstaff', $send);

				$this->load->view('soal/tkb_bussiness_development/soal_tkb_bussiness_development');
				$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
				redirect('Soal/Soal_tkb_bussiness_development/');
			}
		}
	}

	public function edit()
	{
		$id_soal = $this->input->post('id_soal');
		$no_soal = $this->input->post('no_soal');
		$soal = $this->input->post('soal');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$jawaban = $this->input->post('jawaban');
		$data = array(
			'no_soal' => $no_soal,
			'soal' => $soal,
			'opsi_a' => $opsi_a,
			'opsi_b' => $opsi_b,
			'opsi_c' => $opsi_c,
			'opsi_d' => $opsi_d,
			'opsi_e' => $opsi_e,
			'jawaban' => $jawaban
		);

		$where = array(
			'id_soal' => $id_soal
		);

		$this->Mdl_soal->update_data($where, $data, 'tb_soal_tkb_bussinessdevelopmentstaff');
		$this->session->set_flashdata('msg_update', 'Data Berhasil Diedit');
		redirect('Soal/Soal_tkb_bussiness_development/');
	}

	public function hapus($id)
	{
		$where = array('id_soal' => $id);
		$this->Mdl_soal->do_delete($where, 'tb_soal_tkb_bussinessdevelopmentstaff');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Soal/Soal_tkb_bussiness_development/');
	}
}
