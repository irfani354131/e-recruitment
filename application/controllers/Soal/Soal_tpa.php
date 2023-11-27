<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Soal_tpa extends CI_Controller
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



	// Soal tpa 1

	public function index()
	{

		$paket['tpa1'] = $this->db->query('SELECT * FROM tb_soal_tpa where seksi=1 ORDER BY nomor_soal ASC')->result_array();
		$paket['tpa2'] = $this->db->query('SELECT * FROM tb_soal_tpa where seksi=2 ORDER BY nomor_soal ASC')->result_array();
		$paket['tpa3'] = $this->db->query('SELECT * FROM tb_soal_tpa where seksi=3 ORDER BY nomor_soal ASC')->result_array();


		$this->load->view('soal/tpa/soal_tpa', $paket);
	}

	// Tambah Data 1

	public function tambahdata_1()
	{
		$send['id_soal_tpa'] = '';
		$send['soal_cerita'] = $this->input->post('soal_cerita');
		$send['jenis_soal'] = $this->input->post('jenis_soal');
		$send['jenis_tpa'] = $this->input->post('jenis_tpa');
		$send['soal'] = $this->input->post('soal');
		$send['opsi_a'] = $this->input->post('opsi_a');
		$send['opsi_b'] = $this->input->post('opsi_b');
		$send['opsi_c'] = $this->input->post('opsi_c');
		$send['opsi_d'] = $this->input->post('opsi_d');
		$send['opsi_e'] = $this->input->post('opsi_e');
		$send['jawaban'] = $this->input->post('jawaban');
		$send['nomor_soal'] = $this->input->post('nomor_soal');
		$send['seksi'] = 1;
		$kembalian['jumlah'] = $this->Mdl_soal->tambahdata_tpa1($send);
		redirect('Soal/Soal_tpa/');
		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
	}

	// Tambah Data 2
	public function tambahdata_2()
	{
		$send['id_soal_tpa'] = '';
		$send['soal_cerita'] = $this->input->post('soal_cerita');
		$send['jenis_soal'] = $this->input->post('jenis_soal');
		$send['jenis_tpa'] = $this->input->post('jenis_tpa');
		$send['soal'] = $this->input->post('soal');
		$send['opsi_a'] = $this->input->post('opsi_a');
		$send['opsi_b'] = $this->input->post('opsi_b');
		$send['opsi_c'] = $this->input->post('opsi_c');
		$send['opsi_d'] = $this->input->post('opsi_d');
		$send['opsi_e'] = $this->input->post('opsi_e');
		$send['jawaban'] = $this->input->post('jawaban');
		$send['nomor_soal'] = $this->input->post('nomor_soal');
		$send['seksi'] = 2;
		$kembalian['jumlah'] = $this->Mdl_soal->tambahdata_tpa1($send);
		redirect('Soal/Soal_tpa');
		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
	}



	// Tambah Data 3

	public function tambahdata_3()
	{
		$send['id_soal_tpa'] = '';
		$send['soal_cerita'] = $this->input->post('soal_cerita');
		$send['jenis_soal'] = $this->input->post('jenis_soal');
		$send['jenis_tpa'] = $this->input->post('jenis_tpa');
		$send['soal'] = $this->input->post('soal');
		$send['opsi_a'] = $this->input->post('opsi_a');
		$send['opsi_b'] = $this->input->post('opsi_b');
		$send['opsi_c'] = $this->input->post('opsi_c');
		$send['opsi_d'] = $this->input->post('opsi_d');
		$send['opsi_e'] = $this->input->post('opsi_e');
		$send['jawaban'] = $this->input->post('jawaban');
		$send['nomor_soal'] = $this->input->post('nomor_soal');
		$send['seksi'] = 3;
		$kembalian['jumlah'] = $this->Mdl_soal->tambahdata_tpa1($send);
		redirect('Soal/Soal_tpa');
		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
	}

	// Edit Delete Soal 1

	public function editdata($id)
	{

		$id_soal_tpa = $id;

		$soal = $this->input->post('soal');

		$opsi_a = $this->input->post('opsi_a');

		$opsi_b = $this->input->post('opsi_b');

		$opsi_c = $this->input->post('opsi_c');

		$opsi_d = $this->input->post('opsi_d');

		$opsi_e = $this->input->post('opsi_e');

		$jawaban = $this->input->post('jawaban');


		$data = array(
			'nomor_soal' => $this->input->post('nomor_soal'),

			'jenis_tpa' =>  $this->input->post('jenis_tpa'),

			'jenis_soal' => $this->input->post('jenis_soal'),

			'soal_cerita' => $this->input->post('soal_cerita'),

			'soal' => $soal,

			'opsi_a' => $opsi_a,

			'opsi_b' => $opsi_b,

			'opsi_c' => $opsi_c,

			'opsi_d' => $opsi_d,

			'opsi_e' => $opsi_e,

			'jawaban' => $jawaban

		);



		$where = array(

			'id_soal_tpa' => $id_soal_tpa

		);



		$this->Mdl_soal->update_data($where, $data, 'tb_soal_tpa');

		$this->session->set_flashdata('msg', 'Data Berhasil Diedit');

		redirect('Soal/Soal_tpa/');
	}



	public function hapus($id)
	{

		$where = array('id_soal_tpa' => $id);

		$this->Mdl_soal->do_delete($where, 'tb_soal_tpa');

		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');

		redirect('Soal/Soal_tpa/');
	}
}
