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


	public function coba()

	{
		$benaring = 0;
		$datajing = $this->db->query("SELECT * FROM tb_data_jawaban_inggris WHERE id_pelamar=5276 AND id_lowongan =281")->result();
		$datasoaling = $this->db->query("SELECT * FROM tb_soal_inggris")->result();
		if (count($datajing) != 0) {
			for ($i = 0; $i < count($datajing); $i++) {
				if ($datajing[$i]->jawaban == $datasoaling[$i]->jawaban) {
					$benaring = $benaring + 1;
				}
			}
		}
		$benaracc = 0;
		$datajacc = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_accountingstaff WHERE id_pelamar=5276 AND id_lowongan =281")->result();
		$datasoalacc = $this->db->query("SELECT * FROM tb_soal_tkb_accountingstaff")->result();
		if (count($datajacc) != 0) {
			for ($i = 0; $i < count($datajacc); $i++) {
				if ($datajacc[$i]->jawaban == $datasoalacc[$i]->jawaban) {
					$benaracc = $benaracc + 1;
				}
			}
		}
		$benarbisdev = 0;
		$datajbisdev = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_bussinessdevelopmentstaff WHERE id_pelamar=5276 AND id_lowongan =281")->result();
		$datasoalbisdev = $this->db->query("SELECT * FROM tb_soal_tkb_bussinessdevelopmentstaff")->result();
		if (count($datajbisdev) != 0) {
			for ($i = 0; $i < count($datajbisdev); $i++) {
				if ($datajbisdev[$i]->jawaban == $datasoalbisdev[$i]->jawaban) {
					$benarbisdev = $benarbisdev + 1;
				}
			}
		}
		$benarproad = 0;
		$datajproad = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_projectadministrationstaff WHERE id_pelamar=5276 AND id_lowongan =281")->result();
		$datasoalproad = $this->db->query("SELECT * FROM tb_soal_tkb_projectadministrationstaff")->result();
		if (count($datajproad) != 0) {
			for ($i = 0; $i < count($datajproad); $i++) {
				if ($datajproad[$i]->jawaban == $datasoalproad[$i]->jawaban) {
					$benarproad = $benarproad + 1;
				}
			}
		}
		$benartrain = 0;
		$datajtrain = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_trainingoperationstaff WHERE id_pelamar=5276 AND id_lowongan =281")->result();
		$datasoaltrain = $this->db->query("SELECT * FROM tb_soal_tkb_trainingoperationstaff")->result();
		if (count($datajtrain) != 0) {
			for ($i = 0; $i < count($datajtrain); $i++) {
				if ($datajtrain[$i]->jawaban == $datasoaltrain[$i]->jawaban) {
					$benartrain = $benartrain + 1;
				}
			}
		}
		$benarfront = 0;
		$datajfront = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_frontlinerstaff WHERE id_pelamar=5276 AND id_lowongan =281")->result();
		$datasoalfront = $this->db->query("SELECT * FROM tb_soal_tkb_frontlinerstaff")->result();
		if (count($datajfront) != 0) {
			for ($i = 0; $i < count($datajfront); $i++) {
				if ($datajfront[$i]->jawaban == $datasoalfront[$i]->jawaban) {
					$benarfront = $benarfront + 1;
					}
				}
			}
		echo "NILAI Bahasa Inggris: " . $benaring * 2 . "<br>";
		echo "NILAI TKB Accounting Staff: " . $benaracc * 2 . "<br>";
		echo "NILAI TKB Bussiness Development Staff: " . $benarbisdev * 2 . "<br>";
		echo "NILAI TKB Project Administration Staff: " . $benarproad * 2 . "<br>";
		echo "NILAI TKB Training Operation: " . $benartrain * 2 . "<br>";
		echo "NILAI TKB Frontliner: " . $benarfront * 2 . "<br>";
	}

	public function nilai_pelamar()

	{

		$paket['array'] = $this->Mdl_data_nilai->ambildata_nilai();

		$this->load->view('administrator/data_nilai', $paket);
	}



	public function data_nilai($id)

	{

		$paket['array'] = $this->Mdl_data_nilai->get_apply($id);

		$this->load->view('administrator/data_nilai', $paket);
	}

	public function papigram()
	{
		$data = [
			'id_lowongan' => $this->input->post('id_lowongan'),
			'id_pelamar' => $this->input->post('id_pelamar')
		];
		$this->load->view('administrator/papigram', $data);
	}

	public function index()

	{

		$paket['array'] = $this->Mdl_data_lowongan->ambildata_lowongan();

		$this->load->view('administrator/data_nilai_home', $paket);
	}



	public function jawaban_essay($id)

	{

		$paket['array'] = $this->Mdl_data_nilai->get_essay($id);

		$this->load->view('administrator/data_essay', $paket);
	}



	public function jawaban_studi($id)

	{

		$paket['array'] = $this->Mdl_data_nilai->get_studi($id);

		$this->load->view('administrator/data_studi', $paket);
	}





	public function detail_nilai2($id_lowongan, $id_pelamar)

	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');



		$send['id_nilai_cfit'] = '';

		$send['id_pelamar'] = $this->input->post('id_pelamar');

		$send['id_lowongan'] = $this->input->post('id_lowongan');

		$send['nilai_cfit'] = $this->input->post('nilai_cfit');

		$send['iq'] = $this->input->post('iq');

		$send['kategori'] = $this->input->post('kategori');



		$check = $this->db->query("SELECT * FROM tb_nilai_cfit WHERE id_pelamar= $id_pelamar AND id_lowongan= $id_lowongan");



		if ($check->num_rows() < 1) {

			# code...

			$kembalian['jumlah'] = $this->Mdl_data_nilai->input_nilai($send);
		}



		$paket['cfit'] = $this->Mdl_data_nilai->ambil_cfit($id_lowongan, $id_pelamar);

		$this->load->view('administrator/detail_nilai', $paket);
	}





	public function update_nilai($id_update)
	{

		$this->form_validation->set_rules('nilai_wawancara', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nilai_fgd', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$indexrow['data'] = $this->Mdl_data_nilai->ambildata2_nilai($id_update);

			$this->load->view('administrator/detail_nilai', $indexrow);
		} else {

			$send['id_nilai'] = $this->input->post('id_nilai');

			$send['nilai_wawancara'] = $this->input->post('nilai_wawancara');

			$send['nilai_fgd'] = $this->input->post('nilai_fgd');

			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_data_nilai->modelupdate_nilai($send);

			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');

			redirect('Administrator/Data_nilai/detail_nilai/' . $id_update);
		}
	}



	public function update_deskripsi2($id_update)
	{

		$this->form_validation->set_rules('gambaran_kepribadian', 'Nama', 'trim|required');

		$this->form_validation->set_rules('kesimpulan', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$indexrow['data'] = $this->Mdl_data_nilai->ambildata2_nilai($id_update);

			$this->load->view('administrator/detail_nilai', $indexrow);
		} else {

			$send['id_nilai'] = $this->input->post('id_nilai');

			$send['gambaran_kepribadian'] = $this->input->post('gambaran_kepribadian');

			$send['kesimpulan'] = $this->input->post('kesimpulan');

			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_data_nilai->modelupdate_deskripsi($send);

			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');

			redirect('Administrator/Data_nilai/detail_nilai/' . $id_update);
		}
	}



	// END CRUD Motlet

	// ============================================================================================



	public function download_nilai($id)
	{

		$paket['lowongan'] = $id;


		$this->load->view('administrator/export_nilai', $paket);
	}

	public function savenilaipelamar($id)
	{

		$paket['lowongan'] = $id;


		$this->load->view('administrator/save_nilai_pelamar', $paket);
	}
	public function detail_nilai($low, $pel)
	{
		// $paket['array'] = $this->Mdl_data_nilai->ambildata_nilai2($id_detail);
		$paket['array'] = $this->db->query("SELECT * FROM tb_nilai WHERE id_lowongan=$low and id_pelamar=$pel")->result_array();
		$paket['admin'] = 1;
		$paket['id_lowongan'] = $low;
		$paket['id_pelamar'] = $pel;
		$this->load->view('psikolog/detail_nilai', $paket);
	}
	public function update_deskripsi($id_update)
	{
		$id_nilai = $this->input->post('id_nilai');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_pelamar = $this->input->post('id_pelamar');
		$cfit = $this->input->post('cfit_kategori');
		$holland = $this->input->post('holland_kategori');
		$essay = $this->input->post('essay_nilai');
		$papi = $this->input->post('papi_kategori');
		$leadership = $this->input->post('leadership_kategori');
		$studikasus = $this->input->post('studikasus_nilai');
		$studikasusbank = $this->input->post('studikasusbank_nilai');
		$studikasusmanajerial = $this->input->post('studikasusmanajerial_nilai');
		$studikasusldg = $this->input->post('studikasusldg_nilai');
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
		studikasusldg_nilai = $studikasusldg,
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
		WHERE id_nilai=$id_nilai");
		// var_dump($send);
		$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
		redirect("Administrator/Data_nilai/detail_nilai/$id_lowongan/$id_pelamar");
	}
}
