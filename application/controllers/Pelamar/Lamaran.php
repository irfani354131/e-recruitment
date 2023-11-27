<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_home');
		$this->load->model('Mdl_data_pelamar');
		$this->load->model('Mdl_data_jadwal');
		$this->load->model('Mdl_data_motlet');
		$this->load->library('form_validation');
		$this->load->database();
		if ($this->session->userdata('masuk') == FALSE) {
			redirect('Login_pelamar', 'refresh');
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

	public function lamaransaya()
	{
		$this->load->view('lamaransaya');
	}

	public function jadwalseleksi($id)
	{

		$paket['array'] = $this->Mdl_data_jadwal->ambildata3_jadwal($id);
		$this->load->view('jadwalseleksi', $paket);
	}


	public function lamarlowongan($id)
	{
		$paket['array'] = $this->Mdl_home->ambildata_persyaratan($id);
		$this->load->view('lamarlowongan', $paket);
	}

	public function lowongantersedia()
	{

		$id_pelamar = $this->session->userdata('ses_id');

		$queryDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$queryKeluarga = $this->db->query("SELECT * FROM tb_data_keluarga WHERE id_pelamar = $id_pelamar");
		$queryPendidikan = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar = $id_pelamar");
		$queryPendidikanNon = $this->db->query("SELECT * FROM tb_data_pendidikan_nonformal WHERE id_pelamar = $id_pelamar");
		$queryPengalaman = $this->db->query("SELECT * FROM tb_data_pengalaman_kerja WHERE id_pelamar = $id_pelamar");

		if ($queryDiri->num_rows() < 1 && $queryKeluarga->num_rows() < 1 && $queryPendidikan->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi semua data yang ada di menu Profil Saya");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} elseif ($queryDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri anda terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} elseif ($queryKeluarga->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data keluarga anda terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} elseif ($queryPendidikan->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data pendidikan anda terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		}
		$paket['array'] = $this->Mdl_home->ambildata();
		$this->load->view('lowongantersedia', $paket);
	}

	public function apply()
	{


		$dataMotelt = array(
			'id_pelamar' => $this->input->post('id_pelamar'),
			'jawaban_soal' => $this->input->post('jawaban1'),
			'jawaban_soal2' => $this->input->post('jawaban2'),
			'gaji' => $this->input->post('gaji')
		);

		$this->db->insert('tb_motivation_letter', $dataMotelt);

		$dataApply = array(
			'id_pelamar' => $this->input->post('id_pelamar'),
			'id_lowongan' => $this->input->post('id_lowongan'),
			'id_perusahaan' => $this->input->post('id_perusahaan'),
			'status_lamaran' => 'Belum ada tindakan'
		);

		$this->db->insert('tb_apply', $dataApply);

		// $this->load->view('lowongantersedia',$kembalian);
		$this->session->set_flashdata('msg', 'Lowongan Berhasil Diapply!!!');
		// redirect('Pelamar/Lamaran/lowongantersedia/');
		redirect('Pelamar/Pelamar/vdownload_doc');
	}
}
