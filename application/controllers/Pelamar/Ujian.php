<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Ujian extends CI_Controller
{



	public function __construct() //MEMPERSIAPKAN

	{

		parent::__construct();

		$this->load->helper('url', 'form');

		$this->load->model('Mdl_ujian');

		$this->load->model('Mdl_data_ujian');

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



	public function index()

	{
		$this->load->view('ujian');
	}



	public function testulispsikotes()

	{

		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian();

		$paket['holland'] = $this->Mdl_data_ujian->ambildata_ujian_holland();

		$paket['kontrak_psikologis'] = $this->Mdl_data_ujian->ambildata_ujian_kontrak_psikologis();

		$paket['essay'] = $this->Mdl_data_ujian->ambildata_ujian_essay();

		$paket['leader'] = $this->Mdl_data_ujian->ambildata_ujian_leader();

		$paket['studi'] = $this->Mdl_data_ujian->ambildata_ujian_studi();

		$paket['studi_manajerial'] = $this->Mdl_data_ujian->ambildata_ujian_studi_manajerial();

		$paket['hitung'] = $this->Mdl_data_ujian->ambildata_ujian_hitung();

		$paket['papi'] = $this->Mdl_data_ujian->ambildata_ujian_papi();

		$paket['belbin'] = $this->Mdl_data_ujian->ambildata_ujian_belbin();

		$paket['ist'] = $this->Mdl_data_ujian->ambildata_ujian_ist();

		$paket['msdt'] = $this->Mdl_data_ujian->ambildata_ujian_msdt();

		$paket['disc'] = $this->Mdl_data_ujian->ambildata_ujian_disc();

		$paket['talent'] = $this->Mdl_data_ujian->ambildata_ujian_talent();

		$paket['studibank'] = $this->Mdl_data_ujian->ambildata_ujian_studibank();

		$paket['rmib_pria'] = $this->Mdl_data_ujian->ambildata_ujian_rmib_pria();

		$paket['rmib_wanita'] = $this->Mdl_data_ujian->ambildata_ujian_rmib_wanita();


		$this->load->view('testulispsikotes', $paket);
	}

	//CFIT

	public function ujian($id_lowongan)

	{
		$this->load->view('ujian');
	}

	public function frame_latihan_cfit()
	{

		$this->load->view('frame_latihan_cfit');
	}



	public function latihancfit2()
	{

		$this->load->view('pelamar/ujian/latihancfit2');
	}



	public function latihancfit3()
	{

		$this->load->view('pelamar/ujian/latihancfit3');
	}



	public function latihancfit4()
	{

		$this->load->view('pelamar/ujian/latihancfit4');
	}



	public function jawabancontoh2()
	{

		$jawaban = $this->input->post('latcfit21');



		$this->session->set_userdata('ses_jawab1', $jawaban[0]);

		$this->session->set_userdata('ses_jawab2', $jawaban[1]);

		$this->load->view('pelamar/ujian/jawabancontoh2');
	}



	public function jawabancontoh3()
	{

		$jawaban = $this->input->post('latcfit31');

		$jawaban2 = $this->input->post('latcfit32');



		$this->session->set_userdata('ses_jawab1', $jawaban);

		$this->session->set_userdata('ses_jawab2', $jawaban2);

		$this->load->view('pelamar/ujian/jawabancontoh3');
	}



	public function jawabancontoh4()
	{

		$jawaban = $this->input->post('latcfit41');

		$jawaban2 = $this->input->post('latcfit42');



		$this->session->set_userdata('ses_jawab1', $jawaban);

		$this->session->set_userdata('ses_jawab2', $jawaban2);

		$this->load->view('pelamar/ujian/jawabancontoh4');
	}

	public function frame_ujian($id_ujian, $rdr)
	{

		$id_lowongan = $this->session->userdata('sesIdLowongan');

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_subtes_1($rdr);





		if (!empty($data['soal_subtes1'])) {

			$id_soal = $data['soal_subtes1']->id_soal;

			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 1 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		$data['jawaban'] = $query->row();

		$this->load->view('pelamar/ujian/frame_ujian', $data);
	}



	public function frame_ujian_sub2($id_ujian, $rdr)
	{



		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes2'] = $this->Mdl_ujian->get_questions_subtes_2($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes2'])) {

			$id_soal = $data['soal_subtes2']->id_soal;

			$nomor_soal = $data['soal_subtes2']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 2 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		$data['jawaban2'] = $query->row();

		$this->load->view('pelamar/ujian/frame_ujian2', $data);
	}



	public function frame_ujian_sub3($id_ujian, $rdr)
	{


		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes3'] = $this->Mdl_ujian->get_questions_subtes_3($rdr);





		if (!empty($data['soal_subtes3'])) {

			$id_soal = $data['soal_subtes3']->id_soal;

			$nomor_soal = $data['soal_subtes3']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 3 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		$data['jawaban3'] = $query->row();

		$this->load->view('pelamar/ujian/frame_ujian3', $data);
	}



	public function frame_ujian_sub4($id_ujian, $rdr)
	{

		$id_lowongan = $this->session->userdata('sesIdLowongan');

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes4'] = $this->Mdl_ujian->get_questions_subtes_4($rdr);



		if (!empty($data['soal_subtes4'])) {

			$id_soal = $data['soal_subtes4']->id_soal;

			$nomor_soal = $data['soal_subtes4']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 4 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		$data['jawaban4'] = $query->row();

		$this->load->view('pelamar/ujian/frame_ujian4', $data);
	}

	public function start_ujian($id, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_subtes_1($rdr);

		if (!empty($data['soal_subtes1'])) {
			$id_soal = $data['soal_subtes1']->id_soal;
			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 1 AND id_ujian = $id");

		$data['jawaban'] = $query->row();

		$this->load->view('pengerjaan', $data);
	}



	public function start_ujian_sub2($id, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes2'] = $this->Mdl_ujian->get_questions_subtes_2($rdr);

		if (!empty($data['soal_subtes2'])) {
			$id_soal = $data['soal_subtes2']->id_soal;
			$nomor_soal = $data['soal_subtes2']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 2 AND id_ujian = $id");

		$data['jawaban'] = $query->row();


		$this->load->view('pelamar/ujian/pengerjaan2', $data);
	}



	public function start_ujian_sub3($id, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes3'] = $this->Mdl_ujian->get_questions_subtes_3($rdr);

		if (!empty($data['soal_subtes3'])) {
			$id_soal = $data['soal_subtes3']->id_soal;
			$nomor_soal = $data['soal_subtes3']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 3 AND id_ujian = $id");

		$data['jawaban'] = $query->row();


		$this->load->view('pelamar/ujian/pengerjaan3', $data);
	}



	public function start_ujian_sub4($id, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes4'] = $this->Mdl_ujian->get_questions_subtes_4($rdr);

		if (!empty($data['soal_subtes4'])) {
			$id_soal = $data['soal_subtes4']->id_soal;
			$nomor_soal = $data['soal_subtes4']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 4 AND id_ujian = $id");

		$data['jawaban'] = $query->row();


		$this->load->view('pelamar/ujian/pengerjaan4', $data);
	}



	public function masukkan_jawaban($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban = $this->input->post('kunci_jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,

			'jawaban_kunci' => $kuncijawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			redirect('Pelamar/Ujian/frame_ujian/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,

				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban,

				'jawaban_kunci' => $kuncijawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			redirect('Pelamar/Ujian/frame_ujian/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_2($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban1 = $this->input->post('kunci_jawaban1');

		$kuncijawaban2 = $this->input->post('kunci_jawaban2');



		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban[0],

			'jawaban2' => $jawaban[1],

			'jawaban_kunci' => $kuncijawaban1,

			'jawaban_kunci2' => $kuncijawaban2

		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_sub2/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban[0],

				'jawaban2' => $jawaban[1],

				'jawaban_kunci' => $kuncijawaban1,

				'jawaban_kunci2' => $kuncijawaban2

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			redirect('Pelamar/Ujian/frame_ujian_sub2/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_sub3($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban = $this->input->post('kunci_jawaban');





		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,

			'jawaban_kunci' => $kuncijawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_sub3/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban,

				'jawaban_kunci' => $kuncijawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			redirect('Pelamar/Ujian/frame_ujian_sub3/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_sub4($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban = $this->input->post('kunci_jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,

			'jawaban_kunci' => $kuncijawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_sub4/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban,

				'jawaban_kunci' => $kuncijawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			redirect('Pelamar/Ujian/frame_ujian_sub4/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_endSub1()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban = $this->input->post('kunci_jawaban');





		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,

			'jawaban_kunci' => $kuncijawaban

		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			echo '<script>window.top.location.href = "latihancfit2/";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban,

				'jawaban_kunci' => $kuncijawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			echo '<script>window.top.location.href = "latihancfit2";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		}
	}



	public function masukkan_jawaban_endSub2()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban1 = $this->input->post('kunci_jawaban1');

		$kuncijawaban2 = $this->input->post('kunci_jawaban2');





		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban[0],

			'jawaban2' => $jawaban[1],

			'jawaban_kunci' => $kuncijawaban1,

			'jawaban_kunci2' => $kuncijawaban2

		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			echo '<script>window.top.location.href = "latihancfit3/";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban[0],

				'jawaban2' => $jawaban[1],

				'jawaban_kunci' => $kuncijawaban1,

				'jawaban_kunci2' => $kuncijawaban2

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			echo '<script>window.top.location.href = "latihancfit3";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		}
	}

	public function masukkan_jawaban_endSub3()
	{

		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban = $this->input->post('kunci_jawaban');

		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,

			'jawaban_kunci' => $kuncijawaban

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			echo '<script>window.top.location.href = "latihancfit4/";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban,

				'jawaban_kunci' => $kuncijawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			echo '<script>window.top.location.href = "latihancfit4";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		}
	}

	public function masukkan_jawaban_endSub4()
	{

		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$kuncijawaban = $this->input->post('kunci_jawaban');

		$data = array(

			'id_jawaban_cfit' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,

			'jawaban_kunci' => $kuncijawaban

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban($data);
			}

			echo '<script>window.top.location.href = "testulispsikotes";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban,

				'jawaban_kunci' => $kuncijawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
			}

			echo '<script>window.top.location.href = "testulispsikotes";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		}
	}

	public function penilaian()
	{

		$jawaban_sub1 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 1");

		$jawaban_sub2 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 2");

		$jawaban_sub3 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 3");

		$jawaban_sub4 = $this->db->query("SELECT * FROM tb_data_jawaban_cfit WHERE subtes = 4");

		$nilai_sub1 = 0;

		$nilai_sub2 = 0;

		$nilai_sub3 = 0;

		$nilai_sub4 = 0;

		foreach ($jawaban_sub1->result() as $jawsub1) {

			$nomor_soal = $jawsub1->nomor_soal;

			if ($jawsub1->jawaban == $jawsub1->jawaban_kunci) {

				$nilai_sub1 = $nilai_sub1 + 1;
			}
		}

		foreach ($jawaban_sub2->result() as $jawsub2) {

			$nomor_soal = $jawsub2->nomor_soal;

			if ($jawsub2->jawaban == $jawsub2->jawaban_kunci && $jawsub2->jawaban2 == $jawsub2->jawaban_kunci2) {

				$nilai_sub2 = $nilai_sub2 + 1;
			}
		}

		foreach ($jawaban_sub3->result() as $jawsub3) {

			$nomor_soal = $jawsub3->nomor_soal;

			if ($jawsub3->jawaban == $jawsub3->jawaban_kunci) {

				$nilai_sub3 = $nilai_sub3 + 1;
			}
		}

		foreach ($jawaban_sub4->result() as $jawsub4) {

			$nomor_soal = $jawsub4->nomor_soal;

			if ($jawsub4->jawaban == $jawsub4->jawaban_kunci) {

				$nilai_sub4 = $nilai_sub4 + 1;
			}
		}

		echo "jawaban yang benar pada sub tes 1: " . $nilai_sub1 . "<br>";

		echo "jawaban yang benar pada sub tes 2: " . $nilai_sub2 . "<br>";

		echo "jawaban yang benar pada sub tes 3: " . $nilai_sub3 . "<br>";

		echo "jawaban yang benar pada sub tes 4: " . $nilai_sub4 . "<br>";
	}



	// IST - BSI

	public function latihan_ist5_2()
	{
		$this->load->view('pelamar/ujian/ist/latihanist5');
	}

	public function latihan_ist6_2()
	{
		$this->load->view('pelamar/ujian/ist/latihanist6');
	}


	public function jawabancontoh_ist5_2()
	{
		$jawaban1 = $this->input->post('jawaban_latihan1');
		$jawaban2 = $this->input->post('jawaban_latihan2');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->session->set_userdata('ses_jawab2', $jawaban2);

		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist5');
	}

	public function jawabancontoh_ist6_2()
	{
		$jawaban1 = $this->input->post('jawaban_latihan1');
		$jawaban2 = $this->input->post('jawaban_latihan2');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->session->set_userdata('ses_jawab2', $jawaban2);

		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist6');
	}


	public function frame_ujian_ist5_2($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes5'] = $this->Mdl_ujian->get_questions_ist_subtes_5($rdr);


		if (!empty($data['soal_subtes5'])) {
			$id_soal = $data['soal_subtes5']->id_soal;
			$nomor_soal = $data['soal_subtes5']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 5 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban5'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist5', $data);
	}

	public function frame_ujian_ist6_2($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes6'] = $this->Mdl_ujian->get_questions_ist_subtes_6($rdr);


		if (!empty($data['soal_subtes6'])) {
			$id_soal = $data['soal_subtes6']->id_soal;
			$nomor_soal = $data['soal_subtes6']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 6 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban6'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist6', $data);
	}


	public function start_ujian_ist5_2($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes5'] = $this->Mdl_ujian->get_questions_ist_subtes_5($rdr);
		if (!empty($data['soal_subtes5'])) {
			$id_soal = $data['soal_subtes5']->id_soal;
			$nomor_soal = $data['soal_subtes5']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 5 AND id_ujian = $id");

		$data['jawaban5'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist5', $data);
	}

	public function start_ujian_ist6_2($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes6'] = $this->Mdl_ujian->get_questions_ist_subtes_6($rdr);
		if (!empty($data['soal_subtes6'])) {
			$id_soal = $data['soal_subtes6']->id_soal;
			$nomor_soal = $data['soal_subtes6']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 6 AND id_ujian = $id");

		$data['jawaban6'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist6', $data);
	}

	public function masukkan_jawaban_ist5_2($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist5_2/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'jawaban_kunci3' => $kuncijawaban3,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist5_2/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist6_2($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai,
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist6_2/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'jawaban_kunci3' => $kuncijawaban3,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist6_2/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist_endSub5_2()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist6_2/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist6_2";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub6_2()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		}
	}

	// IST - UMUM

	// Latihan dan Jawaban soal IST

	public function latihan_ist2()
	{
		$this->load->view('pelamar/ujian/ist/latihanist2');
	}

	public function latihan_ist3()
	{
		$this->load->view('pelamar/ujian/ist/latihanist3');
	}

	public function latihan_ist4()
	{
		$this->load->view('pelamar/ujian/ist/latihanist4');
	}

	public function latihan_ist5()
	{
		$this->load->view('pelamar/ujian/ist/latihanist5');
	}

	public function latihan_ist6()
	{
		$this->load->view('pelamar/ujian/ist/latihanist6');
	}

	public function latihan_ist7()
	{
		$this->load->view('pelamar/ujian/ist/latihanist7');
	}

	public function latihan_ist8()
	{
		$this->load->view('pelamar/ujian/ist/latihanist8');
	}

	public function latihan_ist9()
	{
		$this->load->view('pelamar/ujian/ist/latihanist9');
	}


	public function jawabancontoh_ist2()
	{
		$jawaban1 = $this->input->post('jawaban_latihan');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist2');
	}

	public function jawabancontoh_ist3()
	{
		$jawaban1 = $this->input->post('jawaban_latihan');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist3');
	}

	public function jawabancontoh_ist4()
	{
		$jawaban1 = $this->input->post('jawaban_latihan');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist4');
	}

	public function jawabancontoh_ist5()
	{
		$jawaban1 = $this->input->post('jawaban_latihan1');
		$jawaban2 = $this->input->post('jawaban_latihan2');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->session->set_userdata('ses_jawab2', $jawaban2);

		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist5');
	}

	public function jawabancontoh_ist6()
	{
		$jawaban1 = $this->input->post('jawaban_latihan1');
		$jawaban2 = $this->input->post('jawaban_latihan2');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->session->set_userdata('ses_jawab2', $jawaban2);

		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist6');
	}

	public function jawabancontoh_ist7()
	{
		$jawaban1 = $this->input->post('jawaban_latihan');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist7');
	}

	public function jawabancontoh_ist9()
	{
		$jawaban1 = $this->input->post('jawaban_latihan');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->load->view('pelamar/ujian/ist/jawabancontoh_ist9');
	}

	public function frame_ujian_ist($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_ist_subtes_1($rdr);


		if (!empty($data['soal_subtes1'])) {
			$id_soal = $data['soal_subtes1']->id_soal;
			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 1 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist', $data);
	}

	public function frame_ujian_ist2($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes2'] = $this->Mdl_ujian->get_questions_ist_subtes_2($rdr);


		if (!empty($data['soal_subtes2'])) {
			$id_soal = $data['soal_subtes2']->id_soal;
			$nomor_soal = $data['soal_subtes2']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 2 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban2'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist2', $data);
	}

	public function frame_ujian_ist3($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes3'] = $this->Mdl_ujian->get_questions_ist_subtes_3($rdr);


		if (!empty($data['soal_subtes3'])) {
			$id_soal = $data['soal_subtes3']->id_soal;
			$nomor_soal = $data['soal_subtes3']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 3 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban3'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist3', $data);
	}

	public function frame_ujian_ist4($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes4'] = $this->Mdl_ujian->get_questions_ist_subtes_4($rdr);


		if (!empty($data['soal_subtes4'])) {
			$id_soal = $data['soal_subtes4']->id_soal;
			$nomor_soal = $data['soal_subtes4']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 4 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban4'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist4', $data);
	}

	public function frame_ujian_ist5($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes5'] = $this->Mdl_ujian->get_questions_ist_subtes_5($rdr);


		if (!empty($data['soal_subtes5'])) {
			$id_soal = $data['soal_subtes5']->id_soal;
			$nomor_soal = $data['soal_subtes5']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 5 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban5'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist5', $data);
	}

	public function frame_ujian_ist6($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes6'] = $this->Mdl_ujian->get_questions_ist_subtes_6($rdr);


		if (!empty($data['soal_subtes6'])) {
			$id_soal = $data['soal_subtes6']->id_soal;
			$nomor_soal = $data['soal_subtes6']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 6 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban6'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist6', $data);
	}

	public function frame_ujian_ist7($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes7'] = $this->Mdl_ujian->get_questions_ist_subtes_7($rdr);


		if (!empty($data['soal_subtes7'])) {
			$id_soal = $data['soal_subtes7']->id_soal;
			$nomor_soal = $data['soal_subtes7']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 7 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban7'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist7', $data);
	}

	public function frame_ujian_ist8($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes8'] = $this->Mdl_ujian->get_questions_ist_subtes_8($rdr);


		if (!empty($data['soal_subtes8'])) {
			$id_soal = $data['soal_subtes8']->id_soal;
			$nomor_soal = $data['soal_subtes8']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 8 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban8'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist8', $data);
	}

	public function frame_ujian_ist9($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['soal_subtes9'] = $this->Mdl_ujian->get_questions_ist_subtes_9($rdr);


		if (!empty($data['soal_subtes9'])) {
			$id_soal = $data['soal_subtes9']->id_soal;
			$nomor_soal = $data['soal_subtes9']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 9 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban9'] = $query->row();
		$this->load->view('pelamar/ujian/ist/frame_ujian_ist9', $data);
	}

	public function start_ujian_ist($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_ist_subtes_1($rdr);

		if (!empty($data['soal_subtes1'])) {
			$id_soal = $data['soal_subtes1']->id_soal;
			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 1 AND id_ujian = $id");

		$data['jawaban'] = $query->row();


		$this->load->view('pelamar/ujian/pengerjaan_ist', $data);
	}

	public function start_ujian_ist2($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes2'] = $this->Mdl_ujian->get_questions_ist_subtes_2($rdr);

		if (!empty($data['soal_subtes2'])) {
			$id_soal = $data['soal_subtes2']->id_soal;
			$nomor_soal = $data['soal_subtes2']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 2 AND id_ujian = $id");

		$data['jawaban2'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist2', $data);
	}

	public function start_ujian_ist3($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes3'] = $this->Mdl_ujian->get_questions_ist_subtes_3($rdr);
		if (!empty($data['soal_subtes3'])) {
			$id_soal = $data['soal_subtes3']->id_soal;
			$nomor_soal = $data['soal_subtes3']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 3 AND id_ujian = $id");

		$data['jawaban3'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist3', $data);
	}

	public function start_ujian_ist4($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes4'] = $this->Mdl_ujian->get_questions_ist_subtes_4($rdr);
		if (!empty($data['soal_subtes4'])) {
			$id_soal = $data['soal_subtes4']->id_soal;
			$nomor_soal = $data['soal_subtes4']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 4 AND id_ujian = $id");

		$data['jawaban4'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist4', $data);
	}


	public function start_ujian_ist5($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes5'] = $this->Mdl_ujian->get_questions_ist_subtes_5($rdr);
		if (!empty($data['soal_subtes5'])) {
			$id_soal = $data['soal_subtes5']->id_soal;
			$nomor_soal = $data['soal_subtes5']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 5 AND id_ujian = $id");

		$data['jawaban5'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist5', $data);
	}

	public function start_ujian_ist6($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes6'] = $this->Mdl_ujian->get_questions_ist_subtes_6($rdr);
		if (!empty($data['soal_subtes6'])) {
			$id_soal = $data['soal_subtes6']->id_soal;
			$nomor_soal = $data['soal_subtes6']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 6 AND id_ujian = $id");

		$data['jawaban6'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist6', $data);
	}

	public function start_ujian_ist7($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes7'] = $this->Mdl_ujian->get_questions_ist_subtes_7($rdr);
		if (!empty($data['soal_subtes7'])) {
			$id_soal = $data['soal_subtes7']->id_soal;
			$nomor_soal = $data['soal_subtes7']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 7 AND id_ujian = $id");

		$data['jawaban7'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist7', $data);
	}

	public function start_ujian_ist8($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes8'] = $this->Mdl_ujian->get_questions_ist_subtes_8($rdr);
		if (!empty($data['soal_subtes8'])) {
			$id_soal = $data['soal_subtes8']->id_soal;
			$nomor_soal = $data['soal_subtes8']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 8 AND id_ujian = $id");

		$data['jawaban8'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist8', $data);
	}

	public function start_ujian_ist9($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes9'] = $this->Mdl_ujian->get_questions_ist_subtes_9($rdr);
		if (!empty($data['soal_subtes9'])) {
			$id_soal = $data['soal_subtes9']->id_soal;
			$nomor_soal = $data['soal_subtes9']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 9 AND id_ujian = $id");

		$data['jawaban9'] = $query->row();

		$this->load->view('pelamar/ujian/ist/pengerjaan_ist9', $data);
	}

	public function masukkan_jawaban_ist($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				//$insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist2($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist2/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist2/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist3($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist3/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist3/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist4($redirect = null)
	{
		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist4/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist4/' . $id_ujian . '/' . $rdr);
		}
	}


	public function masukkan_jawaban_ist5($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist5/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'jawaban_kunci3' => $kuncijawaban3,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist5/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist6($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai,
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist6/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'jawaban_kunci3' => $kuncijawaban3,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist6/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist7($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist7/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist7/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist8($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist8/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist8/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist9($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_ist9/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			redirect('Pelamar/Ujian/frame_ujian_ist9/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_ist_endSub1()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist2/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist2";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub2()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');



		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist3/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist3";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub3()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist4/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist4";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub4()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		$nilai = 0;

		if ($jawaban == $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist5/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist5";</script>';
		}
	}



	public function masukkan_jawaban_ist_endSub5()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist6/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist6";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub6()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban1');
		$kuncijawaban1 = $this->input->post('kunci_jawaban1');
		$kuncijawaban2 = $this->input->post('kunci_jawaban2');
		$kuncijawaban3 = $this->input->post('kunci_jawaban3');

		$nilai = 0;



		if (count($jawaban) == 3) {
			if ($jawaban[0] === $kuncijawaban1 && $jawaban[1] === $kuncijawaban2 && $jawaban[2] === $kuncijawaban3) {
				$nilai = 1;
			}
		} elseif (count($jawaban) === 2) {
			if ($jawaban[0] == $kuncijawaban1 && $jawaban[1] == $kuncijawaban2) {
				$nilai = 1;
			}
		} else {
			if ($jawaban[0] == $kuncijawaban1) {
				$nilai = 1;
			}
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban[0],
			'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
			'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
			'jawaban_kunci' => $kuncijawaban1,
			'jawaban_kunci2' => $kuncijawaban2,
			'jawaban_kunci3' => $kuncijawaban3,
			'nilai' => $nilai
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist7/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban[0],
				'jawaban2' => (isset($jawaban[1])) ? $jawaban[1] : null,
				'jawaban3' => (isset($jawaban[2])) ? $jawaban[2] : null,
				'jawaban_kunci' => $kuncijawaban1,
				'jawaban_kunci2' => $kuncijawaban2,
				'nilai' => $nilai,
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist7";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub7()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist8/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist8";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub8()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "latihan_ist9/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "latihan_ist9";</script>';
		}
	}

	public function masukkan_jawaban_ist_endSub9()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');

		$nilai = 0;

		if ($jawaban === $kuncijawaban) {
			$nilai = 1;
		}

		$data = array(
			'id_jawaban_ist' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban,
			'nilai' => $nilai,

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_ist WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_ist($data);
				$this->Mdl_ujian->insert_jawaban_ist($data);
			}
			echo '<script>window.top.location.href = "testulispsikotes/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban,
				'nilai' => $nilai
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_ist');
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		}
	}


	//HOLLAND

	public function ujian_holland($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianHolland', $id_ujian);

		$this->load->view('pelamar/ujian/holland');
	}

	public function jawaban_holland()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['nilai_r'] = $this->input->post("nilai_r");

		$send['nilai_i'] = $this->input->post("nilai_i");

		$send['nilai_a'] = $this->input->post("nilai_a");

		$send['nilai_s'] = $this->input->post("nilai_s");

		$send['nilai_e'] = $this->input->post("nilai_e");

		$send['nilai_k'] = $this->input->post("nilai_k");



		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_holland($send);



		$this->load->view('pelamar/ujian/holland', $kembalian);

		$this->session->set_flashdata('msg', 'Test Berhasil Diselesaikan!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}

	//TALENT
	public function latihan_talent()
	{
		$this->load->view('pelamar/ujian/latihan_talent');
	}

	public function ujian_talent($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianTalent', $id_ujian);

		$this->load->view('pelamar/ujian/talent');
	}

	public function jawaban_talent()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_talent'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban1'] = $this->input->post("jawaban1");

		$send['jawaban2'] = $this->input->post("jawaban2");

		$send['jawaban3'] = $this->input->post("jawaban3");


		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_talent($send);


		$this->load->view('pelamar/ujian/talent', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}


	//RMIB Pria

	public function ujian_rmib_pria($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianRmib', $id_ujian);

		$this->load->view('pelamar/ujian/rmib/rmib_pria');
	}



	public function jawaban_rmib_pria()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_rmib_pria'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['a1'] = $this->input->post("a1");

		$send['a2'] = $this->input->post("a2");

		$send['a3'] = $this->input->post("a3");

		$send['a4'] = $this->input->post("a4");

		$send['a5'] = $this->input->post("a5");

		$send['a6'] = $this->input->post("a6");

		$send['a7'] = $this->input->post("a7");

		$send['a8'] = $this->input->post("a8");

		$send['a9'] = $this->input->post("a9");

		$send['a10'] = $this->input->post("a10");

		$send['a11'] = $this->input->post("a11");

		$send['a12'] = $this->input->post("a12");

		$send['b1'] = $this->input->post("b1");

		$send['b2'] = $this->input->post("b2");

		$send['b3'] = $this->input->post("b3");

		$send['b4'] = $this->input->post("b4");

		$send['b5'] = $this->input->post("b5");

		$send['b6'] = $this->input->post("b6");

		$send['b7'] = $this->input->post("b7");

		$send['b8'] = $this->input->post("b8");

		$send['b9'] = $this->input->post("b9");

		$send['b10'] = $this->input->post("b10");

		$send['b11'] = $this->input->post("b11");

		$send['b12'] = $this->input->post("b12");

		$send['c1'] = $this->input->post("c1");

		$send['c2'] = $this->input->post("c2");

		$send['c3'] = $this->input->post("c3");

		$send['c4'] = $this->input->post("c4");

		$send['c5'] = $this->input->post("c5");

		$send['c6'] = $this->input->post("c6");

		$send['c7'] = $this->input->post("c7");

		$send['c8'] = $this->input->post("c8");

		$send['c9'] = $this->input->post("c9");

		$send['c10'] = $this->input->post("c10");

		$send['c11'] = $this->input->post("c11");

		$send['c12'] = $this->input->post("c12");

		$send['d1'] = $this->input->post("d1");

		$send['d2'] = $this->input->post("d2");

		$send['d3'] = $this->input->post("d3");

		$send['d4'] = $this->input->post("d4");

		$send['d5'] = $this->input->post("d5");

		$send['d6'] = $this->input->post("d6");

		$send['d7'] = $this->input->post("d7");

		$send['d8'] = $this->input->post("d8");

		$send['d9'] = $this->input->post("d9");

		$send['d10'] = $this->input->post("d10");

		$send['d11'] = $this->input->post("d11");

		$send['d12'] = $this->input->post("d12");

		$send['e1'] = $this->input->post("e1");

		$send['e2'] = $this->input->post("e2");

		$send['e3'] = $this->input->post("e3");

		$send['e4'] = $this->input->post("e4");

		$send['e5'] = $this->input->post("e5");

		$send['e6'] = $this->input->post("e6");

		$send['e7'] = $this->input->post("e7");

		$send['e8'] = $this->input->post("e8");

		$send['e9'] = $this->input->post("e9");

		$send['e10'] = $this->input->post("e10");

		$send['e11'] = $this->input->post("e11");

		$send['e12'] = $this->input->post("e12");

		$send['f1'] = $this->input->post("f1");

		$send['f2'] = $this->input->post("f2");

		$send['f3'] = $this->input->post("f3");

		$send['f4'] = $this->input->post("f4");

		$send['f5'] = $this->input->post("f5");

		$send['f6'] = $this->input->post("f6");

		$send['f7'] = $this->input->post("f7");

		$send['f8'] = $this->input->post("f8");

		$send['f9'] = $this->input->post("f9");

		$send['f10'] = $this->input->post("f10");

		$send['f11'] = $this->input->post("f11");

		$send['f12'] = $this->input->post("f12");

		$send['g1'] = $this->input->post("g1");

		$send['g2'] = $this->input->post("g2");

		$send['g3'] = $this->input->post("g3");

		$send['g4'] = $this->input->post("g4");

		$send['g5'] = $this->input->post("g5");

		$send['g6'] = $this->input->post("g6");

		$send['g7'] = $this->input->post("g7");

		$send['g8'] = $this->input->post("g8");

		$send['g9'] = $this->input->post("g9");

		$send['g10'] = $this->input->post("g10");

		$send['g11'] = $this->input->post("g11");

		$send['g12'] = $this->input->post("g12");

		$send['h1'] = $this->input->post("h1");

		$send['h2'] = $this->input->post("h2");

		$send['h3'] = $this->input->post("h3");

		$send['h4'] = $this->input->post("h4");

		$send['h5'] = $this->input->post("h5");

		$send['h6'] = $this->input->post("h6");

		$send['h7'] = $this->input->post("h7");

		$send['h8'] = $this->input->post("h8");

		$send['h9'] = $this->input->post("h9");

		$send['h10'] = $this->input->post("h10");

		$send['h11'] = $this->input->post("h11");

		$send['h12'] = $this->input->post("h12");

		$send['i1'] = $this->input->post("i1");

		$send['i2'] = $this->input->post("i2");

		$send['i3'] = $this->input->post("i3");

		$send['i4'] = $this->input->post("i4");

		$send['i5'] = $this->input->post("i5");

		$send['i6'] = $this->input->post("i6");

		$send['i7'] = $this->input->post("i7");

		$send['i8'] = $this->input->post("i8");

		$send['i9'] = $this->input->post("i9");

		$send['i10'] = $this->input->post("i10");

		$send['i11'] = $this->input->post("i11");

		$send['i12'] = $this->input->post("i12");

		$send['jawaban1'] = $this->input->post("jawaban1");

		$send['jawaban2'] = $this->input->post("jawaban2");

		$send['jawaban3'] = $this->input->post("jawaban3");


		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_rmib_pria($send);


		$this->load->view('pelamar/ujian/rmib/rmib_pria', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}

	//RMIB Wanita

	public function ujian_rmib_wanita($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianRmib', $id_ujian);

		$this->load->view('pelamar/ujian/rmib/rmib_wanita');
	}



	public function jawaban_rmib_wanita()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_rmib_wanita'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['a1'] = $this->input->post("a1");

		$send['a2'] = $this->input->post("a2");

		$send['a3'] = $this->input->post("a3");

		$send['a4'] = $this->input->post("a4");

		$send['a5'] = $this->input->post("a5");

		$send['a6'] = $this->input->post("a6");

		$send['a7'] = $this->input->post("a7");

		$send['a8'] = $this->input->post("a8");

		$send['a9'] = $this->input->post("a9");

		$send['a10'] = $this->input->post("a10");

		$send['a11'] = $this->input->post("a11");

		$send['a12'] = $this->input->post("a12");

		$send['b1'] = $this->input->post("b1");

		$send['b2'] = $this->input->post("b2");

		$send['b3'] = $this->input->post("b3");

		$send['b4'] = $this->input->post("b4");

		$send['b5'] = $this->input->post("b5");

		$send['b6'] = $this->input->post("b6");

		$send['b7'] = $this->input->post("b7");

		$send['b8'] = $this->input->post("b8");

		$send['b9'] = $this->input->post("b9");

		$send['b10'] = $this->input->post("b10");

		$send['b11'] = $this->input->post("b11");

		$send['b12'] = $this->input->post("b12");

		$send['c1'] = $this->input->post("c1");

		$send['c2'] = $this->input->post("c2");

		$send['c3'] = $this->input->post("c3");

		$send['c4'] = $this->input->post("c4");

		$send['c5'] = $this->input->post("c5");

		$send['c6'] = $this->input->post("c6");

		$send['c7'] = $this->input->post("c7");

		$send['c8'] = $this->input->post("c8");

		$send['c9'] = $this->input->post("c9");

		$send['c10'] = $this->input->post("c10");

		$send['c11'] = $this->input->post("c11");

		$send['c12'] = $this->input->post("c12");

		$send['d1'] = $this->input->post("d1");

		$send['d2'] = $this->input->post("d2");

		$send['d3'] = $this->input->post("d3");

		$send['d4'] = $this->input->post("d4");

		$send['d5'] = $this->input->post("d5");

		$send['d6'] = $this->input->post("d6");

		$send['d7'] = $this->input->post("d7");

		$send['d8'] = $this->input->post("d8");

		$send['d9'] = $this->input->post("d9");

		$send['d10'] = $this->input->post("d10");

		$send['d11'] = $this->input->post("d11");

		$send['d12'] = $this->input->post("d12");

		$send['e1'] = $this->input->post("e1");

		$send['e2'] = $this->input->post("e2");

		$send['e3'] = $this->input->post("e3");

		$send['e4'] = $this->input->post("e4");

		$send['e5'] = $this->input->post("e5");

		$send['e6'] = $this->input->post("e6");

		$send['e7'] = $this->input->post("e7");

		$send['e8'] = $this->input->post("e8");

		$send['e9'] = $this->input->post("e9");

		$send['e10'] = $this->input->post("e10");

		$send['e11'] = $this->input->post("e11");

		$send['e12'] = $this->input->post("e12");

		$send['f1'] = $this->input->post("f1");

		$send['f2'] = $this->input->post("f2");

		$send['f3'] = $this->input->post("f3");

		$send['f4'] = $this->input->post("f4");

		$send['f5'] = $this->input->post("f5");

		$send['f6'] = $this->input->post("f6");

		$send['f7'] = $this->input->post("f7");

		$send['f8'] = $this->input->post("f8");

		$send['f9'] = $this->input->post("f9");

		$send['f10'] = $this->input->post("f10");

		$send['f11'] = $this->input->post("f11");

		$send['f12'] = $this->input->post("f12");

		$send['g1'] = $this->input->post("g1");

		$send['g2'] = $this->input->post("g2");

		$send['g3'] = $this->input->post("g3");

		$send['g4'] = $this->input->post("g4");

		$send['g5'] = $this->input->post("g5");

		$send['g6'] = $this->input->post("g6");

		$send['g7'] = $this->input->post("g7");

		$send['g8'] = $this->input->post("g8");

		$send['g9'] = $this->input->post("g9");

		$send['g10'] = $this->input->post("g10");

		$send['g11'] = $this->input->post("g11");

		$send['g12'] = $this->input->post("g12");

		$send['h1'] = $this->input->post("h1");

		$send['h2'] = $this->input->post("h2");

		$send['h3'] = $this->input->post("h3");

		$send['h4'] = $this->input->post("h4");

		$send['h5'] = $this->input->post("h5");

		$send['h6'] = $this->input->post("h6");

		$send['h7'] = $this->input->post("h7");

		$send['h8'] = $this->input->post("h8");

		$send['h9'] = $this->input->post("h9");

		$send['h10'] = $this->input->post("h10");

		$send['h11'] = $this->input->post("h11");

		$send['h12'] = $this->input->post("h12");

		$send['i1'] = $this->input->post("i1");

		$send['i2'] = $this->input->post("i2");

		$send['i3'] = $this->input->post("i3");

		$send['i4'] = $this->input->post("i4");

		$send['i5'] = $this->input->post("i5");

		$send['i6'] = $this->input->post("i6");

		$send['i7'] = $this->input->post("i7");

		$send['i8'] = $this->input->post("i8");

		$send['i9'] = $this->input->post("i9");

		$send['i10'] = $this->input->post("i10");

		$send['i11'] = $this->input->post("i11");

		$send['i12'] = $this->input->post("i12");

		$send['jawaban1'] = $this->input->post("jawaban1");

		$send['jawaban2'] = $this->input->post("jawaban2");

		$send['jawaban3'] = $this->input->post("jawaban3");


		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_rmib_wanita($send);


		$this->load->view('pelamar/ujian/rmib/rmib_wanita', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}


	//Studi Kasus Bank

	public function ujian_studibank($id_pelamar, $id_ujian)
	{

		$idUjianStudibank = $this->session->set_userdata('ses_ujianStudibank', $id_ujian);

		$this->load->view('pelamar/ujian/studibank');
	}



	public function jawaban_studibank()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_studibank'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban1'] = $this->input->post("jawaban1");

		$send['jawaban2'] = $this->input->post("jawaban2");


		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_studibank($send);


		$this->load->view('pelamar/ujian/studibank', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}


	//ESSAY
	public function ujian_essay($id_pelamar, $id_ujian)
	{

		$idUjianEssay = $this->session->set_userdata('ses_ujianEssay', $id_ujian);

		$this->load->view('pelamar/ujian/essay');
	}



	public function jawaban_essay()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_essay'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban1'] = $this->input->post("jawaban1");

		$send['jawaban2'] = $this->input->post("jawaban2");

		$send['jawaban3'] = $this->input->post("jawaban3");

		$send['jawaban4'] = $this->input->post("jawaban4");

		$send['jawaban5'] = $this->input->post("jawaban5");

		$send['jawaban5b'] = $this->input->post("jawaban5b");

		$send['jawaban5c'] = $this->input->post("jawaban5c");

		$send['jawaban6'] = $this->input->post("jawaban6");

		$send['jawaban7'] = $this->input->post("jawaban7");

		$send['jawaban8'] = $this->input->post("jawaban8");

		// $send['jawaban5b']=$this->input->post("jawaban5b");

		// $send['jawaban5c']=$this->input->post("jawaban5c");

		//$send['jawaban6']=$this->input->post("jawaban6");

		// $send['jawaban7']=$this->input->post("jawaban7");

		// $send['jawaban8']=$this->input->post("jawaban8");



		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_essay($send);



		$this->load->view('pelamar/ujian/essay', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}


	//STUDI
	public function ujian_studi($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianStudi', $id_ujian);

		$this->load->view('pelamar/ujian/studi');
	}

	public function jawaban_studi()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");


		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_studi'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban1'] = $this->input->post("jawaban1");

		$send['jawaban2'] = $this->input->post("jawaban2");



		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_studi($send);


		$this->load->view('pelamar/ujian/studi', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}


	// Studi Kasus Manajerial

	public function ujian_studi_manajerial($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianStudi_manajerial', $id_ujian);

		$this->load->view('pelamar/ujian/studi_manajerial/studi_manajerial');
	}



	public function jawaban_studi_manajerial()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_studi_manajerial'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban1'] = $this->input->post("jawaban1");


		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_studi_manajerial($send);


		$this->load->view('pelamar/ujian/studi_manajerial/studi_manajerial', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}
	// Studi Kasus LDG

	public function ujian_studi_ldg($id_pelamar, $id_ujian)
	{

		$idUjianHolland = $this->session->set_userdata('ses_ujianStudi_ldg', $id_ujian);

		$this->load->view('pelamar/ujian/studi_ldg/grafis1');
	}

	public function jawaban_studi_ldg()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_studi_ldg'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban'] = $this->input->post("jawaban");
		$send['jawaban1'] = $this->input->post("jawaban1");


		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_studi_ldg($send);


		$this->load->view('pelamar/ujian/studi_ldg/studi_ldg', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}



	//Tes Hitung Akuntansi

	public function ujian_hitung($id_pelamar, $id_ujian)
	{

		$idUjianEssay = $this->session->set_userdata('ses_ujianHitung', $id_ujian);

		$this->load->view('pelamar/ujian/tes_hitung');
	}

	public function jawaban_hitung()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian_hitung'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['jawaban1a'] = $this->input->post("jawaban1a");

		$send['jawaban1b'] = $this->input->post("jawaban1b");

		$send['jawaban1c'] = $this->input->post("jawaban1c");

		$send['jawaban1d'] = $this->input->post("jawaban1d");

		$send['jawaban2a'] = $this->input->post("jawaban2a");

		$send['jawaban2b'] = $this->input->post("jawaban2b");

		$send['jawaban2c'] = $this->input->post("jawaban2c");

		$send['jawaban3a'] = $this->input->post("jawaban3a");

		$send['jawaban3b'] = $this->input->post("jawaban3b");



		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_hitung($send);



		$this->load->view('pelamar/ujian/tes_hitung', $kembalian);

		$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}



	// Papikostik
	public function panduan_papi($id_pelamar, $idUjian_papi)
	{

		$this->session->set_userdata('ses_papi', $idUjian_papi);

		$this->load->view('pelamar/ujian/papi/panduan');
	}



	public function start_ujian_papikostik($rdr)

	{

		$data['papikos'] = $this->Mdl_ujian->get_questions_papi($rdr);

		$this->load->view('pelamar/ujian/papi/v_papi', $data);
	}



	public function frame_ujian_papi($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		$id_pelamar = $this->session->userdata('ses_id');

		$data['papikos'] = $this->Mdl_ujian->get_questions_papi($rdr);

		if (!empty($data['papikos'])) {

			$id_soal = $data['papikos']->id_soal;

			$nomor_soal = $data['papikos']->no_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_papi WHERE id_lowongan = $id_lowongan AND no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban'] = $query->row();

		$this->load->view('pelamar/ujian/papi/frame_ujian_papi', $data);
	}



	public function masukkan_jawaban_papi($redirect = null)
	{



		// if ($redirect =='') redirect('Pelamar/Ujian/') ;



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');





		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_papi' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'no_soal' => $nomor_soal,

			'jawaban' => $jawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_papi  WHERE id_lowongan = $id_lowongan AND no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban_papi($data);
				$this->Mdl_ujian->insert_jawaban_papi($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_papi/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan


			);

			$data2 = array(

				'jawaban' => $jawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_papi');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_papi');
			}

			redirect('Pelamar/Ujian/frame_ujian_papi/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_endpapi($redirect = null)
	{





		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');





		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_papi' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'no_soal' => $nomor_soal,

			'jawaban' => $jawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_papi WHERE id_lowongan = $id_lowongan AND no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban_papi($data);
				$this->Mdl_ujian->insert_jawaban_papi($data);
			}

			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_papi');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_papi');
			}

			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		}
	}

	// Epps
	public function panduan_epps($id_pelamar, $idUjian_epps)
	{

		$this->session->set_userdata('ses_epps', $idUjian_epps);

		$this->load->view('pelamar/ujian/epps/panduan');
	}



	public function start_ujian_epps($rdr)

	{

		$data['epps'] = $this->Mdl_ujian->get_questions_epps($rdr);

		$this->load->view('pelamar/ujian/epps/v_epps', $data);
	}



	public function frame_ujian_epps($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		$data['epps'] = $this->Mdl_ujian->get_questions_epps($rdr);

		if (!empty($data['epps'])) {

			$id_soal = $data['epps']->id_soal;

			$nomor_soal = $data['epps']->no_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_epps WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");

		$data['jawaban'] = $query->row();

		$this->load->view('pelamar/ujian/epps/frame_ujian_epps', $data);
	}



	public function masukkan_jawaban_epps($redirect = null)
	{



		// if ($redirect =='') redirect('Pelamar/Ujian/') ;



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');





		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_epps' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'no_soal' => $nomor_soal,

			'jawaban' => $jawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_epps WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				$this->Mdl_ujian->insert_jawaban_epps($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_epps/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban

			);

			if (!empty($jawaban)) {

				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_epps');
			}

			redirect('Pelamar/Ujian/frame_ujian_epps/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_endepps($redirect = null)
	{

		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_epps' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'no_soal' => $nomor_soal,

			'jawaban' => $jawaban



		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_epps WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_epps WHERE no_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_epps WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		// $no_soal_kosong = $soal_kosong[0]->no_soal;
		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban_epps($data);
				$this->Mdl_ujian->insert_jawaban_epps($data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_epps/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
			// echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_papi');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_epps');
			}
			// redirect('Pelamar/Pelamar/testulispsikotes/');
			$id_ujian =  $this->session->userdata('ses_epps');
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_epps/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
			// echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
		}
	}


	// Msdt
	public function panduan_msdt($id_pelamar, $idUjian_msdt)
	{
		$this->session->set_userdata('ses_msdt', $idUjian_msdt);
		$this->load->view('pelamar/ujian/msdt/panduan');
	}

	public function start_ujian_msdt($rdr)
	{
		$data['msdt'] = $this->Mdl_ujian->get_questions_msdt($rdr);
		$this->load->view('pelamar/ujian/msdt/v_msdt', $data);
	}

	public function frame_ujian_msdt($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['msdt'] = $this->Mdl_ujian->get_questions_msdt($rdr);


		if (!empty($data['msdt'])) {
			$id_soal = $data['msdt']->id_soal;
			$nomor_soal = $data['msdt']->no_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_msdt WHERE id_lowongan = $id_lowongan AND no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/msdt/frame_ujian_msdt', $data);
	}

	public function masukkan_jawaban_msdt($redirect = null)
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$data = array(
			'id_jawaban_msdt' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_msdt WHERE id_lowongan = $id_lowongan AND no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$insert = $this->Mdl_ujian->insert_jawaban_msdt($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_msdt/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_msdt');
			}
			redirect('Pelamar/Ujian/frame_ujian_msdt/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_endmsdt($redirect = null)
	{


		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$data = array(
			'id_jawaban_msdt' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_msdt WHERE id_lowongan = $id_lowongan AND no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$insert = $this->Mdl_ujian->insert_jawaban_msdt($data);
				$this->Mdl_ujian->insert_jawaban_msdt($data);
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_msdt');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_msdt');
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		}
	}


	// Leadership
	public function frame_ujian_leadership($id_ujian, $rdr)
	{

		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_leadership($rdr);
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');

		if (!empty($data['soal_subtes1'])) {
			$id_soal = $data['soal_subtes1']->id_soal;
			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_leadership WHERE id_lowongan=$id_lowongan AND nomor_soal = " . $nomor_soal . " AND subtes = 1 AND id_ujian = " . $id_ujian . " AND id_pelamar = " . $id_pelamar);

		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/leadership/frame_ujian_leadership', $data);
	}


	public function start_ujian_leadership($id, $rdr)
	{
		$id_ujian = $this->session->set_userdata(['ses_leader' => $id]);
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_leadership($rdr);

		if (!empty($data['soal_subtes1'])) {
			$id_soal = $data['soal_subtes1']->id_soal;
			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_leadership WHERE id_lowongan=$id_lowongan AND nomor_soal = " . $nomor_soal . " AND subtes = 1 AND id_ujian = " . $id);

		$data['jawaban'] = $query->row();


		$this->load->view('pelamar/ujian/leadership/v_leader', $data);
	}

	public function masukkan_jawaban_leadership($redirect = null)
	{

		if ($redirect == '') redirect('Pelamar/Ujian/');

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$data = array(
			'id_jawaban_leadership' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_leadership WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$insert = $this->Mdl_ujian->insert_jawaban_leadership($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_leadership/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban
			);
			if (!empty($jawaban)) {
				$update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_leadership');
			}
			redirect('Pelamar/Ujian/frame_ujian_leadership/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_endLeader()
	{

		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$subtes = $this->input->post('subtes');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$kuncijawaban = $this->input->post('kunci_jawaban');


		$data = array(
			'id_jawaban_leadership' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'subtes' => $subtes,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'jawaban_kunci' => $kuncijawaban
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_leadership WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$insert = $this->Mdl_ujian->insert_jawaban_leadership($data);
				$this->Mdl_ujian->insert_jawaban_leadership($data);
			}
			echo '<script>window.top.location.href = "testulispsikotes/";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'subtes' => $subtes,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban,
				'jawaban_kunci' => $kuncijawaban
			);
			if (!empty($jawaban)) {
				$update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_leadership');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_leadership');
			}
			echo '<script>window.top.location.href = "testulispsikotes/";</script>';
		}
	}



	// DISC
	public function start_ujian_disc($id, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$this->session->set_userdata(['ses_ujian' => $rdr]);
		$data['disc'] = $this->Mdl_ujian->get_questions_disc($rdr);
		if (!empty($data['disc'])) {
			$id_soal = $data['disc']->id_soal;
			$nomor_soal = $data['disc']->no_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE no_soal = $nomor_soal AND id_ujian = $rdr AND id_lowongan=$id_lowongan");

		$data['jawaban2'] = $query->row();

		$this->load->view('pelamar/ujian/disc/v_disc', $data);
	}

	public function frame_ujian_disc($id_ujian, $rdr)
	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		$data['disc'] = $this->Mdl_ujian->get_questions_disc($rdr);

		if (!empty($data['disc'])) {
			$id_soal = $data['disc']->id_soal;
			$nomor_soal = $data['disc']->no_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");

		$data['jawaban2'] = $query->row();

		$this->load->view('pelamar/ujian/disc/discsoal24', $data);
	}

	public function masukkan_jawaban_disc($redirect = null)
	{


		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban1 = $this->input->post('jawaban1');
		$jawaban2 = $this->input->post('jawaban2');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$data = array(
			'id_jawaban_disc' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban1,
			'jawaban2' => $jawaban2
		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban1) && !empty($jawaban2)) {
				$this->Mdl_ujian->insert_jawaban_disc($data);
				// $insert = $this->Mdl_ujian->insert_jawaban_disc($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban1,
				'jawaban2' => $jawaban2,
			);
			if (!empty($jawaban1) && !empty($jawaban2)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_disc');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_disc');
			}
			redirect('Pelamar/Ujian/frame_ujian_disc/' . $id_ujian . '/' . $rdr);
		}
	}

	public function masukkan_jawaban_enddisc($redirect = null)
	{


		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban1 = $this->input->post('jawaban1');
		$jawaban2 = $this->input->post('jawaban2');


		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}

		$data = array(
			'id_jawaban_disc' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban1,
			'jawaban2' => $jawaban2

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_disc WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");

		if ($query->num_rows() == 0) {
			if (!empty($jawaban1) && !empty($jawaban2)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_disc($data);
				$this->Mdl_ujian->insert_jawaban_disc($data);
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban1,
				'jawaban2' => $jawaban2
			);
			if (!empty($jawaban1) && !empty($jawaban2)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_disc');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_disc');
			}
			echo '<script>window.top.location.href = "testulispsikotes";</script>';
		}
	}


	// INGGRIS
	public function panduan_inggris($id_pelamar, $idUjian_inggris)
	{
		$this->session->set_userdata('ses_inggris', $idUjian_inggris);
		$this->load->view('pelamar/ujian/inggris/panduan');
	}
	public function start_ujian_inggris($rdr)
	{
		$data['inggris'] = $this->Mdl_ujian->get_questions_inggris($rdr);
		$this->load->view('pelamar/ujian/inggris/v_inggris', $data);
	}
	public function frame_ujian_inggris($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['inggris'] = $this->Mdl_ujian->get_questions_inggris($rdr);
		if (!empty($data['inggris'])) {
			$id_soal = $data['inggris']->id_soal;
			$nomor_soal = $data['inggris']->nomor_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_inggris WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/inggris/frame_ujian_inggris', $data);
	}
	public function masukkan_jawaban_inggris($redirect = null)
	{
		// if ($redirect =='') redirect('Pelamar/Ujian/') ;
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_inggris' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_inggris WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->Mdl_ujian->insert_jawaban_inggris($data);
			}
			redirect('Pelamar/Ujian/frame_ujian_inggris/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_inggris');
			}
			redirect('Pelamar/Ujian/frame_ujian_inggris/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_endinggris($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_inggris' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_inggris WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_inggris WHERE nomor_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_inggris WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		// $no_soal_kosong = $soal_kosong[0]->no_soal;
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				// $insert = $this->Mdl_ujian->insert_jawaban_inggris($data);
				$this->Mdl_ujian->insert_jawaban_inggris($data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_inggris/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
			// echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_papi');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_inggris');
			}
			// redirect('Pelamar/Pelamar/testulispsikotes/');
			$id_ujian =  $this->session->userdata('ses_inggris');
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_inggris/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
			// echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
		}
	}

	// TKB Accounting
	public function start_ujian_tkb_accounting($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tkb_accounting', $rdr);
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_accountingstaff WHERE id_soal='$rdr' ")->result();
		$this->load->view('pelamar/ujian/tkb_accounting/v_ujian', $data);
	}
	public function frame_ujian_tkb_accounting($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_accountingstaff WHERE id_soal='$rdr' ")->result();
		if (!empty($data['array'])) {
			$id_soal = $data['array'][0]->id_soal;
			$nomor_soal = $data['array'][0]->no_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_accountingstaff WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tkb_accounting/frame_ujian', $data);
	}
	public function masukkan_jawaban_tkb_accounting($redirect = null)
	{
		// if ($redirect =='') redirect('Pelamar/Ujian/') ;
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_accountingstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_accountingstaff', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_accounting/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_accountingstaff');
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_accounting/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtkbaccounting($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_accountingstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tkb_accountingstaff WHERE no_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_tkb_accountingstaff WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_accountingstaff', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_accounting/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
				// echo 'Pelamar/Ujian/frame_ujian_tkb_accounting/' . $id_ujian . '/' . $soal_kosong[0]->no_soal;
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_accountingstaff');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_accounting/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
			// echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
		}
	}

	// TKB Bussines Development
	public function start_ujian_tkb_bussinessdevelopment($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tkb_bussinessdevelopment', $rdr);
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_bussinessdevelopmentstaff WHERE id_soal='$rdr' ")->result();
		$this->load->view('pelamar/ujian/tkb_bussinessdevelopment/v_ujian', $data);
	}
	public function frame_ujian_tkb_bussinessdevelopment($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_bussinessdevelopmentstaff WHERE id_soal='$rdr' ")->result();
		if (!empty($data['array'])) {
			$id_soal = $data['array'][0]->id_soal;
			$nomor_soal = $data['array'][0]->no_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_bussinessdevelopmentstaff WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tkb_bussinessdevelopment/frame_ujian', $data);
	}
	public function masukkan_jawaban_tkb_bussinessdevelopment($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_bussinessdevelopmentstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_bussinessdevelopmentstaff', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_bussinessdevelopment/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_bussinessdevelopmentstaff');
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_bussinessdevelopment/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtkbbussinessdevelopment($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_bussinessdevelopmentstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tkb_bussinessdevelopmentstaff WHERE no_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_tkb_bussinessdevelopmentstaff WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_bussinessdevelopmentstaff', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_bussinessdevelopment/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_bussinessdevelopmentstaff');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_bussinessdevelopment/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		}
	}
	// TKB Training Operation
	public function start_ujian_tkb_trainingoperation($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tkb_trainingoperation', $rdr);
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_trainingoperationstaff WHERE id_soal='$rdr' ")->result();
		$this->load->view('pelamar/ujian/tkb_trainingoperation/v_ujian', $data);
	}
	public function frame_ujian_tkb_trainingoperation($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_trainingoperationstaff WHERE id_soal='$rdr' ")->result();
		if (!empty($data['array'])) {
			$id_soal = $data['array'][0]->id_soal;
			$nomor_soal = $data['array'][0]->no_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_trainingoperationstaff WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tkb_trainingoperation/frame_ujian', $data);
	}
	public function masukkan_jawaban_tkb_trainingoperation($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_trainingoperationstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_trainingoperationstaff', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_trainingoperation/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_trainingoperationstaff');
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_trainingoperation/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtkbtrainingoperation($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_trainingoperationstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tkb_trainingoperationstaff WHERE no_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_tkb_trainingoperationstaff WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_trainingoperationstaff', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_trainingoperation/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_trainingoperationstaff');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_trainingoperation/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		}
	}
	// TKB Project Administration
	public function start_ujian_tkb_projectadministration($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tkb_projectadministration', $rdr);
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_projectadministrationstaff WHERE id_soal='$rdr' ")->result();
		$this->load->view('pelamar/ujian/tkb_projectadministration/v_ujian', $data);
	}
	public function frame_ujian_tkb_projectadministration($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_projectadministrationstaff WHERE id_soal='$rdr' ")->result();
		if (!empty($data['array'])) {
			$id_soal = $data['array'][0]->id_soal;
			$nomor_soal = $data['array'][0]->no_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_projectadministrationstaff WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tkb_projectadministration/frame_ujian', $data);
	}
	public function masukkan_jawaban_tkb_projectadministration($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_projectadministrationstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_projectadministrationstaff', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_projectadministration/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_projectadministrationstaff');
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_projectadministration/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtkbprojectadministration($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_projectadministrationstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tkb_projectadministrationstaff WHERE no_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_tkb_projectadministrationstaff WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_projectadministrationstaff', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_projectadministration/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_projectadministrationstaff');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_projectadministration/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		}
	}
	// TKB Frontliner Staff
	public function start_ujian_tkb_frontliner($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tkb_frontliner', $rdr);
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_frontlinerstaff WHERE id_soal='$rdr' ")->result();
		$this->load->view('pelamar/ujian/tkb_frontliner/v_ujian', $data);
	}
	public function frame_ujian_tkb_frontliner($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['array'] = $this->db->query("SELECT * FROM tb_soal_tkb_frontlinerstaff WHERE id_soal='$rdr' ")->result();
		if (!empty($data['array'])) {
			$id_soal = $data['array'][0]->id_soal;
			$nomor_soal = $data['array'][0]->no_soal;
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_frontlinerstaff WHERE no_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tkb_frontliner/frame_ujian', $data);
	}
	public function masukkan_jawaban_tkb_frontliner($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_frontlinerstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_frontlinerstaff', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_frontliner/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_frontlinerstaff');
			}
			redirect('Pelamar/Ujian/frame_ujian_tkb_frontliner/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtkbfrontliner($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('no_soal');
		$jawaban = $this->input->post('jawaban');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'no_soal' => $nomor_soal,
			'jawaban' => $jawaban
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tkb_frontlinerstaff WHERE no_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan");
		$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tkb_frontlinerstaff WHERE no_soal NOT IN (SELECT no_soal AS no_soal_test FROM tb_data_jawaban_tkb_frontlinerstaff WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan)")->result();
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tkb_frontlinerstaff', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_frontliner/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'no_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tkb_frontlinerstaff');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tkb_frontliner/' . $id_ujian . '/' . $soal_kosong[0]->no_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		}
	}

	// TPA
	public function panduan_tpa1($id_pelamar, $idUjian_tpa)
	{
		$this->session->set_userdata('ses_tpa', $idUjian_tpa);
		$this->session->set_userdata('ses_id', $id_pelamar);
		$cek_tpa = $this->db->query("SELECT * FROM tb_ujian_tpa_verbal")->result()[0]->tpa_panjang;
		$this->session->set_userdata('ses_jenis_tpa', $cek_tpa);
		$data['tpake'] = '1';
		$this->load->view('pelamar/ujian/tpa/panduan', $data);
	}

	public function start_ujian_tpa1($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tpa', $rdr);
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=1 AND jenis_tpa='pendek'")->result();
		} else {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=1")->result();
		}
		$this->load->view('pelamar/ujian/tpa/ujian_1', $data);
	}
	public function frame_ujian_tpa1($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=1 AND jenis_tpa='pendek'")->result();
		} else {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=1")->result();
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=1");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tpa/frame_ujian_1', $data);
	}
	public function masukkan_jawaban_tpa1($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$seksi = $this->input->post('seksi');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_tpa' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'seksi' => $seksi,
			'jenis_soal' => $this->input->post('jenis_soal')
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tpa', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tpa1/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan,
				'seksi' => $seksi,

				'jenis_soal' => $this->input->post('jenis_soal')
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tpa');
			}
			redirect('Pelamar/Ujian/frame_ujian_tpa1/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtpa1($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$seksi = $this->input->post('seksi');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_tpa' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'seksi' => $seksi,
			'jenis_soal' => $this->input->post('jenis_soal')
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi");
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal NOT IN (SELECT nomor_soal AS nomor_soal_test FROM tb_data_jawaban_tpa WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi) AND seksi=$seksi AND jenis_tpa='pendek'")->result();
		} else {
			$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal NOT IN (SELECT nomor_soal AS nomor_soal_test FROM tb_data_jawaban_tpa WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi) AND seksi=$seksi")->result();
		}
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tpa', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tpa1/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
				// echo "<script>window.top.location.href = 'start_ujian_tpa2/".$id_pelamar."/".$id_ujian."/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan,
				'seksi' => $seksi,

				'jenis_soal' => $this->input->post('jenis_soal')
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tpa');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tpa1/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
				// echo "<script>window.top.location.href = 'start_ujian_tpa2/".$id_pelamar."/".$id_ujian."/';</script>";
			}
		}
	}

	public function panduan_tpa2($id_pelamar, $idUjian_tpa)
	{
		$this->session->set_userdata('ses_tpa', $idUjian_tpa);
		$this->session->set_userdata('ses_id', $id_pelamar);
		$cek_tpa = $this->db->query("SELECT * FROM tb_ujian_tpa_kuantitatif")->result()[0]->tpa_panjang;
		$this->session->set_userdata('ses_jenis_tpa', $cek_tpa);
		$data['tpake'] = '2';
		$this->load->view('pelamar/ujian/tpa/panduan', $data);
	}
	public function start_ujian_tpa2($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tpa', $rdr);
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=2 AND jenis_tpa='pendek'")->result();
		} else {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=2")->result();
		}
		$this->load->view('pelamar/ujian/tpa/ujian_2', $data);
	}
	public function frame_ujian_tpa2($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=2 AND jenis_tpa='pendek'")->result();
		} else {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=2")->result();
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=2");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tpa/frame_ujian_2', $data);
	}
	public function masukkan_jawaban_tpa2($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$seksi = $this->input->post('seksi');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_tpa' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'seksi' => $seksi,
			'jenis_soal' => $this->input->post('jenis_soal')
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tpa', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tpa2/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan,
				'seksi' => $seksi,

				'jenis_soal' => $this->input->post('jenis_soal')
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tpa');
			}
			redirect('Pelamar/Ujian/frame_ujian_tpa2/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtpa2($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$seksi = $this->input->post('seksi');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_tpa' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'seksi' => $seksi,
			'jenis_soal' => $this->input->post('jenis_soal')
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi");
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal NOT IN (SELECT nomor_soal AS nomor_soal_test FROM tb_data_jawaban_tpa WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi) AND seksi=$seksi AND jenis_tpa='pendek'")->result();
		} else {
			$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal NOT IN (SELECT nomor_soal AS nomor_soal_test FROM tb_data_jawaban_tpa WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi) AND seksi=$seksi")->result();
		}
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tpa', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tpa2/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan,
				'seksi' => $seksi,
				'jenis_soal' => $this->input->post('jenis_soal')
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tpa');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tpa2/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		}
	}

	public function panduan_tpa3($id_pelamar, $idUjian_tpa)
	{
		$this->session->set_userdata('ses_tpa', $idUjian_tpa);
		$this->session->set_userdata('ses_id', $id_pelamar);
		$cek_tpa = $this->db->query("SELECT * FROM tb_ujian_tpa_penalaran")->result()[0]->tpa_panjang;
		$this->session->set_userdata('ses_jenis_tpa', $cek_tpa);
		$data['tpake'] = '3';
		$this->load->view('pelamar/ujian/tpa/panduan', $data);
	}
	public function start_ujian_tpa3($id_pelamar, $rdr)
	{
		$this->session->set_userdata('ses_tpa', $rdr);
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=3 AND jenis_tpa='pendek'")->result();
		} else {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=3")->result();
		}
		$this->load->view('pelamar/ujian/tpa/ujian_3', $data);
	}
	public function frame_ujian_tpa3($id_ujian, $rdr)
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=3 AND jenis_tpa='pendek'")->result();
		} else {
			$data['array'] = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal='$rdr' AND seksi=3")->result();
		}
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $rdr AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=3");
		$data['jawaban'] = $query->row();
		$this->load->view('pelamar/ujian/tpa/frame_ujian_3', $data);
	}
	public function masukkan_jawaban_tpa3($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$seksi = $this->input->post('seksi');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_tpa' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'seksi' => $seksi,
			'jenis_soal' => $this->input->post('jenis_soal')
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi");
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tpa', $data);
			}
			redirect('Pelamar/Ujian/frame_ujian_tpa3/' . $id_ujian . '/' . $rdr);
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan,
				'seksi' => $seksi,

				'jenis_soal' => $this->input->post('jenis_soal')
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tpa');
			}
			redirect('Pelamar/Ujian/frame_ujian_tpa3/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_endtpa3($redirect = null)
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_lowongan = $this->input->post('id_lowongan');
		$id_ujian = $this->input->post('id_ujian');
		$nomor_soal = $this->input->post('nomor_soal');
		$jawaban = $this->input->post('jawaban');
		$seksi = $this->input->post('seksi');
		if ($redirect == 1) {
			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {
			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {
			$rdr = $nomor_soal;
		}
		$data = array(
			'id_jawaban_tpa' => '',
			'id_pelamar' => $id_pelamar,
			'id_lowongan' => $id_lowongan,
			'id_ujian' => $id_ujian,
			'nomor_soal' => $nomor_soal,
			'jawaban' => $jawaban,
			'seksi' => $seksi,
			'jenis_soal' => $this->input->post('jenis_soal')
		);
		$query = $this->db->query("SELECT * FROM tb_data_jawaban_tpa WHERE nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi");
		$jenis_tpa = $this->session->userdata('ses_jenis_tpa');
		if ($jenis_tpa != 'aktif') {
			$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal NOT IN (SELECT nomor_soal AS nomor_soal_test FROM tb_data_jawaban_tpa WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi) AND seksi=$seksi AND jenis_tpa='pendek'")->result();
		} else {
			$soal_kosong = $this->db->query("SELECT * FROM tb_soal_tpa WHERE nomor_soal NOT IN (SELECT nomor_soal AS nomor_soal_test FROM tb_data_jawaban_tpa WHERE id_ujian = $id_ujian AND id_pelamar = $id_pelamar AND id_lowongan=$id_lowongan AND seksi=$seksi) AND seksi=$seksi")->result();
		}
		if ($query->num_rows() == 0) {
			if (!empty($jawaban)) {
				$this->db->insert('tb_data_jawaban_tpa', $data);
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tpa3/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		} else {
			$where = array(
				'id_ujian' => $id_ujian,
				'nomor_soal' => $nomor_soal,
				'id_pelamar' => $id_pelamar,
				'id_lowongan' => $id_lowongan,
				'seksi' => $seksi,

				'jenis_soal' => $this->input->post('jenis_soal')
			);
			$data2 = array(
				'jawaban' => $jawaban
			);
			if (!empty($jawaban)) {
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_tpa');
			}
			if (count($soal_kosong) != 0) {
				redirect('Pelamar/Ujian/frame_ujian_tpa3/' . $id_ujian . '/' . $soal_kosong[0]->nomor_soal);
			} else {
				echo "<script>window.top.location.href = 'testulispsikotes/';</script>";
			}
		}
	}

	//Konrak Psikologis

	public function ujian_kontrak_psikologis($id_pelamar, $id_ujian)
	{

		$this->session->set_userdata('ses_ujiankontrakpsikologis', $id_ujian);

		$this->load->view('pelamar/ujian/kontrak_psikologis/kontrak_psikologis');
	}
	public function save_kontrak_psikologis()
	{
		$jawaban = $this->input->post('name');
		$no = $this->input->post('no');
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$id_pelamar = $this->session->userdata('ses_id');
		// echo $jawaban;
		$data = array(
			'jawaban' => $jawaban,
			'no' => $no,
			'id_lowongan' => $id_lowongan,
			'id_pelamar' => $id_pelamar
		);
		// $insert = $this->db->query("INSERT INTO tb_data_jawaban_kontrak_psikologis (jawaban,no,id_lowongan) VALUES ('1','1','1')");
		// $this->load->model('ajax_model');
		// $insert = $this->ajax_model->createData($data);
		$cek = $this->db->query("SELECT * FROM tb_data_jawaban_kontrak_psikologis WHERE no='$no' AND id_lowongan='$id_lowongan' AND id_pelamar='$id_pelamar'")->result();
		if (empty($cek)) {
			$insert = $this->db->insert('tb_data_jawaban_kontrak_psikologis', $data);
		} else {
			$insert = $this->db->query("UPDATE tb_data_jawaban_kontrak_psikologis SET jawaban = '$jawaban' WHERE no='$no' AND id_lowongan='$id_lowongan' AND id_pelamar='$id_pelamar'");
		}

		echo json_encode($insert);
	}

	public function jawaban_kontrak_psikologis()
	{

		$idPelamar = $this->input->post("id_pelamar");

		$idUjian = $this->input->post("id_ujian");



		$send['id_pelamar'] = $this->input->post("id_pelamar");

		$send['id_ujian'] = $this->input->post("id_ujian");

		$send['id_lowongan'] = $this->input->post("id_lowongan");

		$send['nilai_r'] = $this->input->post("nilai_r");

		$send['nilai_i'] = $this->input->post("nilai_i");

		$send['nilai_a'] = $this->input->post("nilai_a");

		$send['nilai_s'] = $this->input->post("nilai_s");

		$send['nilai_e'] = $this->input->post("nilai_e");

		$send['nilai_k'] = $this->input->post("nilai_k");



		$kembalian['jumlah'] = $this->Mdl_ujian->jawaban_holland($send);



		$this->load->view('pelamar/ujian/holland', $kembalian);

		$this->session->set_flashdata('msg', 'Test Berhasil Diselesaikan!');

		redirect('Pelamar/Pelamar/testulispsikotes');
	}

	// BELBIN
	public function belbin2($id_pelamar, $id_ujian)
	{
		$this->load->view('belbin2', $paket);
	}
	public function belbin3($id_pelamar, $id_ujian)
	{
		$this->load->view('belbin3', $paket);
	}
	public function belbin4($id_pelamar, $id_ujian)
	{
		$this->load->view('belbin4', $paket);
	}
	public function belbin5($id_pelamar, $id_ujian)
	{
		$this->load->view('belbin5', $paket);
	}
	public function belbin6($id_pelamar, $id_ujian)
	{
		$this->load->view('belbin6', $paket);
	}
	public function belbin7($id_pelamar, $id_ujian)
	{
		$this->load->view('belbin7', $paket);
	}

	public function frame_ujian_belbin_sub1($id_ujian, $rdr)
	{

		$id_lowongan = $this->session->userdata('sesIdLowongan');

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_belbin_subtes_1($rdr);

		if (!empty($data['soal_subtes1'])) {

			$id_soal = $data['soal_subtes1']->id_soal;

			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 1 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");

		$data['jawaban'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin', $data);
	}

	public function frame_ujian_belbin_sub2($id_ujian, $rdr)
	{



		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes2'] = $this->Mdl_ujian->get_questions_belbin_subtes_2($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes2'])) {

			$id_soal = $data['soal_subtes2']->id_soal;

			$nomor_soal = $data['soal_subtes2']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 2 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		$data['jawaban2'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin2', $data);
	}
	
	public function frame_ujian_belbin_sub3($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes3'] = $this->Mdl_ujian->get_questions_belbin_subtes_3($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes3'])) {

			$id_soal = $data['soal_subtes3']->id_soal;

			$nomor_soal = $data['soal_subtes3']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 3 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");


		$data['jawaban3'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin3', $data);
	}
	public function frame_ujian_belbin_sub4($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes4'] = $this->Mdl_ujian->get_questions_belbin_subtes_4($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes4'])) {

			$id_soal = $data['soal_subtes4']->id_soal;

			$nomor_soal = $data['soal_subtes4']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 4 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");


		$data['jawaban4'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin4', $data);
	}
	public function frame_ujian_belbin_sub5($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes5'] = $this->Mdl_ujian->get_questions_belbin_subtes_5($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes5'])) {

			$id_soal = $data['soal_subtes5']->id_soal;

			$nomor_soal = $data['soal_subtes5']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 5 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");


		$data['jawaban5'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin5', $data);
	}
	public function frame_ujian_belbin_sub6($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes6'] = $this->Mdl_ujian->get_questions_belbin_subtes_6($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes6'])) {

			$id_soal = $data['soal_subtes6']->id_soal;

			$nomor_soal = $data['soal_subtes6']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 6 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");


		$data['jawaban6'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin6', $data);
	}
	public function frame_ujian_belbin_sub7($id_ujian, $rdr)
	{

		$id_pelamar = $this->session->userdata('ses_id');

		$data['soal_subtes7'] = $this->Mdl_ujian->get_questions_belbin_subtes_7($rdr);


		$id_lowongan = $this->session->userdata('sesIdLowongan');


		if (!empty($data['soal_subtes7'])) {

			$id_soal = $data['soal_subtes7']->id_soal;

			$nomor_soal = $data['soal_subtes7']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 7 AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");


		$data['jawaban7'] = $query->row();

		$this->load->view('pelamar/ujian/belbin/frame_ujian_belbin7', $data);
	}
	public function start_ujian_belbin($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes1'] = $this->Mdl_ujian->get_questions_belbin_subtes_1($rdr);

		if (!empty($data['soal_subtes1'])) {
			$id_soal = $data['soal_subtes1']->id_soal;
			$nomor_soal = $data['soal_subtes1']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 1 AND id_ujian = $id_ujian");

		$data['jawaban'] = $query->row();

		$this->load->view('pengerjaan_belbin', $data);
	}



	public function start_ujian_belbin_sub2($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes2'] = $this->Mdl_ujian->get_questions_belbin_subtes_2($rdr);

		if (!empty($data['soal_subtes2'])) {
			$id_soal = $data['soal_subtes2']->id_soal;
			$nomor_soal = $data['soal_subtes2']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 2 AND id_ujian = $id_ujian");

		$data['jawaban2'] = $query->row();


		$this->load->view('pelamar/ujian/belbin/pengerjaan_belbin2', $data);
	}

	public function start_ujian_belbin_sub3($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes3'] = $this->Mdl_ujian->get_questions_belbin_subtes_3($rdr);

		if (!empty($data['soal_subtes3'])) {
			$id_soal = $data['soal_subtes3']->id_soal;
			$nomor_soal = $data['soal_subtes3']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 3 AND id_ujian = $id_ujian");

		$data['jawaban3'] = $query->row();


		$this->load->view('pelamar/ujian/belbin/pengerjaan_belbin3', $data);
	}
	public function start_ujian_belbin_sub4($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes4'] = $this->Mdl_ujian->get_questions_belbin_subtes_4($rdr);

		if (!empty($data['soal_subtes4'])) {
			$id_soal = $data['soal_subtes4']->id_soal;
			$nomor_soal = $data['soal_subtes4']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 4 AND id_ujian = $id_ujian");

		$data['jawaban4'] = $query->row();


		$this->load->view('pelamar/ujian/belbin/pengerjaan_belbin4', $data);
	}
	public function start_ujian_belbin_sub5($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes5'] = $this->Mdl_ujian->get_questions_belbin_subtes_5($rdr);

		if (!empty($data['soal_subtes5'])) {
			$id_soal = $data['soal_subtes5']->id_soal;
			$nomor_soal = $data['soal_subtes5']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 5 AND id_ujian = $id_ujian");

		$data['jawaban5'] = $query->row();


		$this->load->view('pelamar/ujian/belbin/pengerjaan_belbin5', $data);
	}
	public function start_ujian_belbin_sub6($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes6'] = $this->Mdl_ujian->get_questions_belbin_subtes_6($rdr);

		if (!empty($data['soal_subtes6'])) {
			$id_soal = $data['soal_subtes6']->id_soal;
			$nomor_soal = $data['soal_subtes6']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 6 AND id_ujian = $id_ujian");

		$data['jawaban6'] = $query->row();


		$this->load->view('pelamar/ujian/belbin/pengerjaan_belbin6', $data);
	}
	public function start_ujian_belbin_sub7($id_ujian, $rdr)

	{
		$id_lowongan = $this->session->userdata('sesIdLowongan');
		$data['soal_subtes7'] = $this->Mdl_ujian->get_questions_belbin_subtes_7($rdr);

		if (!empty($data['soal_subtes7'])) {
			$id_soal = $data['soal_subtes7']->id_soal;
			$nomor_soal = $data['soal_subtes7']->nomor_soal;
		}

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND nomor_soal = $nomor_soal AND subtes = 7 AND id_ujian = $id_ujian");

		$data['jawaban7'] = $query->row();


		$this->load->view('pelamar/ujian/belbin/pengerjaan_belbin7', $data);
	}

	public function masukkan_jawaban_belbin($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');


		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub1/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,

				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub1/' . $id_ujian . '/' . $rdr);
		}
	}



	public function masukkan_jawaban_belbin_2($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

			
		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub2/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban

				

			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub2/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_belbin_3($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

			
		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub3/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub3/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_belbin_4($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

			
		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub4/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub4/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_belbin_5($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

			
		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub5/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub5/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_belbin_6($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

			
		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub6/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub6/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_belbin_7($redirect = null)
	{



		if ($redirect == '') redirect('Pelamar/Ujian/');



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		if ($redirect == 1) {

			$rdr = $nomor_soal - 1;
		} elseif ($redirect == 2) {

			$rdr = $nomor_soal + 1;
		} elseif ($redirect == 0) {

			$rdr = $nomor_soal;
		}





		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

			
		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan=$id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub7/' . $id_ujian . '/' . $rdr);
		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			redirect('Pelamar/Ujian/frame_ujian_belbin_sub7/' . $id_ujian . '/' . $rdr);
		}
	}
	public function masukkan_jawaban_belbin_endSub1()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,


		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			echo '<script>window.top.location.href = "belbin2";</script>';
	

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}
		
			echo '<script>window.top.location.href = "belbin2";</script>';
		

		}
	}

	public function masukkan_jawaban_belbin_endSub2()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,


		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

		echo '<script>window.top.location.href = "belbin3";</script>';
		

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}
		
			echo '<script>window.top.location.href = "belbin3";</script>';
		

		}
	}
	public function masukkan_jawaban_belbin_endSub3()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,


		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

		echo '<script>window.top.location.href = "belbin4";</script>';
		

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}
		
			echo '<script>window.top.location.href = "belbin4";</script>';
		

		}
	}
	public function masukkan_jawaban_belbin_endSub4()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,


		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

		echo '<script>window.top.location.href = "belbin5";</script>';
		

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}
		
			echo '<script>window.top.location.href = "belbin5";</script>';
		

		}
	}
	public function masukkan_jawaban_belbin_endSub5()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,


		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

		echo '<script>window.top.location.href = "belbin6";</script>';
		

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}
		
			echo '<script>window.top.location.href = "belbin6";</script>';
		}
	}
	public function masukkan_jawaban_belbin_endSub6()
	{



		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');



		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban,


		);



		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");



		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

		echo '<script>window.top.location.href = "belbin7";</script>';
		

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}
		
			echo '<script>window.top.location.href = "belbin7";</script>';
		}
	}


	public function masukkan_jawaban_belbin_endSub7()
	{

		$id_pelamar = $this->input->post('id_pelamar');

		$id_lowongan = $this->input->post('id_lowongan');

		$id_ujian = $this->input->post('id_ujian');

		$subtes = $this->input->post('subtes');

		$nomor_soal = $this->input->post('nomor_soal');

		$jawaban = $this->input->post('jawaban');

		$data = array(

			'id_jawaban_belbin' => '',

			'id_pelamar' => $id_pelamar,

			'id_lowongan' => $id_lowongan,

			'id_ujian' => $id_ujian,

			'subtes' => $subtes,

			'nomor_soal' => $nomor_soal,

			'jawaban' => $jawaban

		);

		$query = $this->db->query("SELECT * FROM tb_data_jawaban_belbin WHERE id_lowongan = $id_lowongan AND subtes = $subtes AND nomor_soal = $nomor_soal AND id_ujian = $id_ujian AND $id_pelamar = $id_pelamar");

		if ($query->num_rows() == 0) {

			if (!empty($jawaban)) {

				// $insert = $this->Mdl_ujian->insert_jawaban($data);
				$this->Mdl_ujian->insert_jawaban_belbin($data);
			}

			echo '<script>window.top.location.href = "testulispsikotes";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		} else {

			$where = array(

				'id_ujian' => $id_ujian,

				'nomor_soal' => $nomor_soal,

				'subtes' => $subtes,
				'id_lowongan' => $id_lowongan

			);

			$data2 = array(

				'jawaban' => $jawaban
			);

			if (!empty($jawaban)) {

				// $update = $this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_cfit');
				$this->Mdl_ujian->update($where, $data2, 'tb_data_jawaban_belbin');
			}

			echo '<script>window.top.location.href = "testulispsikotes";</script>';

			//redirect('Pelamar/Ujian/frame_latihan_cfit_2/');

		}
	}
}
