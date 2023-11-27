<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_nilai extends CI_Controller
{

	public function __construct() //MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Mdl_data_nilai');
		$this->load->model('Mdl_data_lowongan');
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

	public function nilai_pelamar($id_lowongan)
	{
		$a = $this->db->query("SELECT * FROM tb_nilai WHERE id_lowongan=$id_lowongan")->result_array();
		// var_dump($a);
		// $paket['array'] = $this->Mdl_data_nilai->ambildata_nilai();
		$paket['array'] = $a;
		$this->load->view('psikolog/data_nilai', $paket);
	}

	// CRUD Motlet
	// public function index()
	// {
	// 	$paket['array']=$this->Mdl_data_nilai->ambildata_nilai();	
	// 	$this->load->view('psikolog/data_nilai',$paket);
	// }
	public function index()
	{
		$paket['array'] = $this->Mdl_data_lowongan->ambildata_lowongan();
		$this->load->view('psikolog/data_lowongan_nilai', $paket);
	}

	public function detail_nilai($id_detail)
	{
		// $paket['array'] = $this->Mdl_data_nilai->ambildata_nilai2($id_detail);
		$paket['array'] = $this->db->query("SELECT * FROM tb_nilai WHERE id_nilai=$id_detail")->result_array();
		$paket['admin'] = 0;
		$this->load->view('psikolog/detail_nilai', $paket);
	}


	public function update_deskripsi($id_update)
	{
		$id_nilai = $this->input->post('id_nilai');
		$cfit = $this->input->post('cfit_kategori');
		$holland = $this->input->post('holland_kategori');
		$essay = $this->input->post('essay_nilai');
		$papi = $this->input->post('papi_kategori');
		$leadership = $this->input->post('leadership_kategori');
		$studikasus = $this->input->post('studikasus_nilai');
		$studikasusbank = $this->input->post('studikasusbank_nilai');
		$studikasusmanajerial = $this->input->post('studikasusmanajerial_nilai');
		$hitung = $this->input->post('hitung_nilai');
		$msdt = $this->input->post('msdt_kategori');
		$epps = $this->input->post('epps_kategori');
		$ist = $this->input->post('ist_kategori');
		$disc_m = $this->input->post('disc_m_kategori');
		$disc_l = $this->input->post('disc_l_kategori');
		$kemampuan_teknis = $this->input->post('kemampuan_teknis');
		$perhatian_terhadap_ketidakjelasan_intruksi = $this->input->post('perhatian_terhadap_ketidakjelasan_intruksi');
		$inisiatif = $this->input->post('inisiatif');
		$kerjasama = $this->input->post('kerjasama');
		$komitmen = $this->input->post('komitmen');
		$kepemimpinan = $this->input->post('kepemimpinan');
		$hasil_wawancara = $this->input->post('hasil_wawancara');
		$kesimpulan = $this->input->post('kesimpulan');
		$this->db->query("UPDATE tb_nilai
		SET 
		cfit_kategori = '$cfit',
		holland_kategori = '$holland',
		essay_nilai = $essay,
		papi_kategori = '$papi',
		leadership_kategori = '$leadership',
		studikasus_nilai = $studikasus,
		studikasusbank_nilai = $studikasusbank,
		studikasusmanajerial_nilai = $studikasusmanajerial,
		hitung_nilai = $hitung,
		msdt_kategori ='$msdt',
		epps_kategori ='$epps',
		ist_kategori ='$ist',
		disc_m_kategori ='$disc_m',
		disc_l_kategori ='$disc_l',
		kemampuan_teknis = '$kemampuan_teknis',
		perhatian_terhadap_ketidakjelasan_intruksi ='$perhatian_terhadap_ketidakjelasan_intruksi',
		inisiatif ='$inisiatif',
		kerjasama ='$kerjasama',
		komitmen = '$komitmen',
		kepemimpinan ='$kepemimpinan',
		hasil_wawancara ='$hasil_wawancara',
		kesimpulan ='$kesimpulan'
		WHERE id_nilai=$id_nilai ");
		// var_dump($send);
		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
		redirect('Psikolog/Data_nilai/detail_nilai/' . $id_update);
	}

	// END CRUD Motlet
	// ============================================================================================


}
