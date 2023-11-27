<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_inggris extends CI_Controller
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
		$paket['inggris'] = $this->Mdl_soal->ambildata_inggris();
		$this->load->view('soal/inggris/soal_inggris', $paket);
	}

	public function tambahdata()
	{
		$this->form_validation->set_rules('nomor_soal', 'Nomor Soal', 'trim|required');
		$no_soal = $this->input->post('nomor_soal');
		$id_soal = $this->input->post('id_soal');
		$keterangan_soal = $this->input->post('keterangan_soal');
		$soal = $this->input->post('soal');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$jawaban = $this->input->post('jawaban');

		if ($this->form_validation->run() == FALSE || $no_soal == 'zero') {

			// $this->session->set_flashdata('msg_error', 'Isi Seluruh Data.');
			$this->load->view('soal/inggris/vtambah_inggris');
		} else {
			$cek_no_soal = $this->db->query("SELECT * FROM tb_soal_inggris WHERE nomor_soal=$no_soal")->result_array();
			if (count($cek_no_soal) > 0) {
				$this->session->set_flashdata('msg_error', 'Nomor Soal Sudah Ada.');
				$this->load->view('soal/inggris/vtambah_inggris');
			} else {
				$send['id_soal'] = $id_soal;
				$send['nomor_soal'] = $no_soal;
				$send['keterangan_soal'] = $keterangan_soal;
				$send['soal'] = $soal;
				$send['opsi_a'] = $opsi_a;
				$send['opsi_b'] = $opsi_b;
				$send['opsi_c'] = $opsi_c;
				$send['opsi_d'] = $opsi_d;
				$send['jawaban'] = $jawaban;

				$kembalian['jumlah'] = $this->Mdl_soal->tambahdata_inggris($send);

				$this->load->view('soal/inggris/vtambah_inggris');
				$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
				redirect('Soal/Soal_inggris/');
			}
		}
	}

	public function edit_inggris()
	{
		$id_soal = $this->input->post('id_soal');
		$no_soal = $this->input->post('nomor_soal');
		$keterangan_soal = $this->input->post('keterangan_soal');
		$soal = $this->input->post('soal');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$jawaban = $this->input->post('jawaban');
		$data = array(
			'nomor_soal' => $no_soal,
			'keterangan_soal' => $keterangan_soal,
			'soal' => $soal,
			'opsi_a' => $opsi_a,
			'opsi_b' => $opsi_b,
			'opsi_c' => $opsi_c,
			'opsi_d' => $opsi_d,
			'jawaban' => $jawaban
		);

		$where = array(
			'id_soal' => $id_soal
		);

		$this->Mdl_soal->update_data($where, $data, 'tb_soal_inggris');
		$this->session->set_flashdata('msg_update', 'Data Berhasil Diedit');
		redirect('Soal/Soal_inggris/');
	}

	public function hapus_inggris($id)
	{
		$where = array('id_soal' => $id);
		$this->Mdl_soal->do_delete($where, 'tb_soal_inggris');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Soal/Soal_inggris/');
	}
}
