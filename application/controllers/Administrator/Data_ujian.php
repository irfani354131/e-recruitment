<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Data_ujian extends CI_Controller
{



	public function __construct() //MEMPERSIAPKAN

	{

		parent::__construct();

		$this->load->helper('url', 'form');

		$this->load->model('Mdl_data_ujian');

		$this->load->library('form_validation');

		$this->load->database();

		if ($this->session->userdata('masuk') == FALSE) {

			redirect('Login', 'refresh');
		}
		function tambahmenit($datetime_mulai, $menit)
		{
			$time = new DateTime($datetime_mulai);
			$time->add(new DateInterval('PT' . $menit . 'M'));
			$stamp = $time->format('Y-m-d H:i:s');
			return $stamp;
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



	// -------------------------CRUD Motlet------------------------------------

	public function index()

	{

		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian();

		$this->load->view('administrator/manage_ujian_cfit', $paket);
	}
	public function updatecfit()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktult = $this->input->post('waktu_latihan');
		$waktuujian1 = $this->input->post('waktu_ujiansubtes1');
		$waktuujian2 = $this->input->post('waktu_ujiansubtes2');
		$waktuujian3 = $this->input->post('waktu_ujiansubtes3');
		$waktuujian4 = $this->input->post('waktu_ujiansubtes4');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startltsub1 = $datetime_mulai;
		$endltsub1 = tambahmenit($startltsub1, $waktult);
		$startujiansub1 = $endltsub1;
		$endujiansub1 = tambahmenit($startujiansub1, $waktuujian1);


		$startltsub2 = $endujiansub1;
		$endltsub2 = tambahmenit($startltsub2, $waktult);
		$startujiansub2 = $endltsub2;
		$endujiansub2 = tambahmenit($startujiansub2, $waktuujian2);


		$startltsub3 = $endujiansub2;
		$endltsub3 = tambahmenit($startltsub3, $waktult);
		$startujiansub3 = $endltsub3;
		$endujiansub3 = tambahmenit($startujiansub3, $waktuujian3);


		$startltsub4 = $endujiansub3;
		$endltsub4 = tambahmenit($startltsub4, $waktult);
		$startujiansub4 = $endltsub4;
		$endujiansub4 = tambahmenit($startujiansub4, $waktuujian4);

		echo "waktu mulai ujian $datetime_mulai.<br>";
		echo "waktu latihan subtes 1 ($waktult menit) dari $startltsub1 hingga $endltsub1. <br>";
		echo "waktu UJIAN subtes 1 ($waktuujian1 menit) dari $startujiansub1 hingga $endujiansub1. <br>";
		echo "waktu latihan subtes 2 ($waktult menit) dari $startltsub2 hingga $endltsub2. <br>";
		echo "waktu UJIAN subtes 2 ($waktuujian2 menit) dari $startujiansub2 hingga $endujiansub2. <br>";
		echo "waktu latihan subtes 3 ($waktult menit) dari $startltsub3 hingga $endltsub3. <br>";
		echo "waktu UJIAN subtes 3 ($waktuujian3 menit) dari $startujiansub3 hingga $endujiansub3. <br>";
		echo "waktu latihan subtes 4 ($waktult menit) dari $startltsub4 hingga $endltsub4. <br>";
		echo "waktu UJIAN subtes 4 ($waktuujian4 menit) dari $startujiansub4 hingga $endujiansub4. <br>";
		echo "waktu Selesai ujian $endujiansub4.<br>";



		// "INSERT INTO tb_ujian (
		// 	id_ujian,nama_ujian,waktu_dimulai,waktu_berakhir
		// 	,start_lat_sub1,end_lat_sub1, start_uji_sub1, end_uji_sub1
		// 	,start_lat_sub2,end_lat_sub2, start_uji_sub2, end_uji_sub2
		// 	,start_lat_sub3,end_lat_sub3, start_uji_sub3, end_uji_sub3
		// 	,start_lat_sub4,end_lat_sub4, start_uji_sub4, end_uji_sub4
		// 	,durasi,nama_pembuat,STATUS
		// 	) VALUE (
		// 	'1','$namates','$datetime_mulai','$endujiansub4',
		// 	'$startltsub1','$endltsub1','$startujiansub1','$endujiansub1',
		// 	'$startltsub2','$endltsub2','$startujiansub2','$endujiansub2',
		// 	'$startltsub3','$endltsub3','$startujiansub3','$endujiansub3',
		// 	'$startltsub4','$endltsub4','$startujiansub4','$endujiansub4',
		// 	1950,'Administrator','tersedia'
		// 	)";
		$this->db->query("UPDATE tb_ujian SET
nama_ujian='$namates',waktu_dimulai='$datetime_mulai',waktu_berakhir='$endujiansub4'
,start_lat_sub1='$startltsub1',end_lat_sub1='$endltsub1', start_uji_sub1='$startujiansub1', end_uji_sub1='$endujiansub1'
,start_lat_sub2='$startltsub2',end_lat_sub2='$endltsub2', start_uji_sub2='$startujiansub2', end_uji_sub2='$endujiansub2'
,start_lat_sub3='$startltsub3',end_lat_sub3='$endltsub3', start_uji_sub3='$startujiansub3', end_uji_sub3='$endujiansub3'
,start_lat_sub4='$startltsub4',end_lat_sub4='$endltsub4', start_uji_sub4='$startujiansub4', end_uji_sub4='$endujiansub4'
,durasi='1950',nama_pembuat='$pembuat',STATUS='$status'
 where id_ujian=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian CFIT Berhasil di Update.');
		redirect('Administrator/Data_ujian/');
	}

	// -------------------------CRUD IST------------------------------------

	public function ujian_ist()
	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_ist();
		$this->load->view('administrator/manage_ujian_ist', $paket);
	}

	public function updateist()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktult = $this->input->post('waktu_latihan');
		$waktult9 = $this->input->post('waktu_latihan9');
		$waktuujian1 = $this->input->post('waktu_ujiansubtes1');
		$waktuujian2 = $this->input->post('waktu_ujiansubtes2');
		$waktuujian3 = $this->input->post('waktu_ujiansubtes3');
		$waktuujian4 = $this->input->post('waktu_ujiansubtes4');
		$waktuujian5 = $this->input->post('waktu_ujiansubtes5');
		$waktuujian6 = $this->input->post('waktu_ujiansubtes6');
		$waktuujian7 = $this->input->post('waktu_ujiansubtes7');
		$waktuujian8 = $this->input->post('waktu_ujiansubtes8');
		$waktuujian9 = $this->input->post('waktu_ujiansubtes9');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		if ($this->input->post('khusus') == "aktif") {
			$khusus_ist = "aktif";
		} else {
			$khusus_ist = "tidak aktif";
		}

		$startltsub1 = $datetime_mulai;
		$endltsub1 = tambahmenit($startltsub1, $waktult);
		$startujiansub1 = $endltsub1;
		$endujiansub1 = tambahmenit($startujiansub1, $waktuujian1);

		$startltsub2 = $endujiansub1;
		$endltsub2 = tambahmenit($startltsub2, $waktult);
		$startujiansub2 = $endltsub2;
		$endujiansub2 = tambahmenit($startujiansub2, $waktuujian2);

		$startltsub3 = $endujiansub2;
		$endltsub3 = tambahmenit($startltsub3, $waktult);
		$startujiansub3 = $endltsub3;
		$endujiansub3 = tambahmenit($startujiansub3, $waktuujian3);

		$startltsub4 = $endujiansub3;
		$endltsub4 = tambahmenit($startltsub4, $waktult);
		$startujiansub4 = $endltsub4;
		$endujiansub4 = tambahmenit($startujiansub4, $waktuujian4);

		$startltsub5 = $endujiansub4;
		$endltsub5 = tambahmenit($startltsub5, $waktult);
		$startujiansub5 = $endltsub5;
		$endujiansub5 = tambahmenit($startujiansub5, $waktuujian5);

		$startltsub6 = $endujiansub5;
		$endltsub6 = tambahmenit($startltsub6, $waktult);
		$startujiansub6 = $endltsub6;
		$endujiansub6 = tambahmenit($startujiansub6, $waktuujian6);

		$startltsub7 = $endujiansub6;
		$endltsub7 = tambahmenit($startltsub7, $waktult);
		$startujiansub7 = $endltsub7;
		$endujiansub7 = tambahmenit($startujiansub7, $waktuujian7);

		$startltsub8 = $endujiansub7;
		$endltsub8 = tambahmenit($startltsub8, $waktult);
		$startujiansub8 = $endltsub8;
		$endujiansub8 = tambahmenit($startujiansub8, $waktuujian8);

		$startltsub9 = $endujiansub8;
		$endltsub9 = tambahmenit($startltsub9, $waktult9);
		$startujiansub9 = $endltsub9;
		$endujiansub9 = tambahmenit($startujiansub9, $waktuujian9);
		// "INSERT INTO tb_ujian (
		// 	id_ujian,nama_ujian,waktu_dimulai,waktu_berakhir
		// 	,start_lat_sub1,end_lat_sub1, start_uji_sub1, end_uji_sub1
		// 	,start_lat_sub2,end_lat_sub2, start_uji_sub2, end_uji_sub2
		// 	,start_lat_sub3,end_lat_sub3, start_uji_sub3, end_uji_sub3
		// 	,start_lat_sub4,end_lat_sub4, start_uji_sub4, end_uji_sub4
		// 	,durasi,nama_pembuat,STATUS
		// 	) VALUE (
		// 	'1','$namates','$datetime_mulai','$endujiansub4',
		// 	'$startltsub1','$endltsub1','$startujiansub1','$endujiansub1',
		// 	'$startltsub2','$endltsub2','$startujiansub2','$endujiansub2',
		// 	'$startltsub3','$endltsub3','$startujiansub3','$endujiansub3',
		// 	'$startltsub4','$endltsub4','$startujiansub4','$endujiansub4',
		// 	1950,'Administrator','tersedia'
		// 	)";
		$this->db->query("UPDATE tb_ujian_ist SET
nama_ujian='$namates',waktu_dimulai='$datetime_mulai',waktu_berakhir='$endujiansub9'
,start_lat_sub1='$startltsub1',end_lat_sub1='$endltsub1', start_uji_sub1='$startujiansub1', end_uji_sub1='$endujiansub1'
,start_lat_sub2='$startltsub2',end_lat_sub2='$endltsub2', start_uji_sub2='$startujiansub2', end_uji_sub2='$endujiansub2'
,start_lat_sub3='$startltsub3',end_lat_sub3='$endltsub3', start_uji_sub3='$startujiansub3', end_uji_sub3='$endujiansub3'
,start_lat_sub4='$startltsub4',end_lat_sub4='$endltsub4', start_uji_sub4='$startujiansub4', end_uji_sub4='$endujiansub4'
,start_lat_sub4='$startltsub4',end_lat_sub4='$endltsub4', start_uji_sub4='$startujiansub4', end_uji_sub4='$endujiansub4'
,start_lat_sub5='$startltsub5',end_lat_sub5='$endltsub5', start_uji_sub5='$startujiansub5', end_uji_sub5='$endujiansub5'
,start_lat_sub6='$startltsub6',end_lat_sub6='$endltsub6', start_uji_sub6='$startujiansub6', end_uji_sub6='$endujiansub6'
,start_lat_sub7='$startltsub7',end_lat_sub7='$endltsub7', start_uji_sub7='$startujiansub7', end_uji_sub7='$endujiansub7'
,start_lat_sub8='$startltsub8',end_lat_sub8='$endltsub8', start_uji_sub8='$startujiansub8', end_uji_sub8='$endujiansub8'
,start_lat_sub9='$startltsub9',end_lat_sub9='$endltsub9', start_uji_sub9='$startujiansub9', end_uji_sub9='$endujiansub9'
,durasi='1950',nama_pembuat='$pembuat',STATUS='$status', khusus='$khusus_ist'
 where id_ujian=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian IST Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_ist');
	}


	// -------------------------CRUD Holland------------------------------------

	public function ujian_holland()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_holland();
		$this->load->view('administrator/manage_ujian_holland', $paket);
	}

	public function updateholland()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_holland SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_holland=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian HOLLAND Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_holland');
	}


	// -------------------------CRUD DISC------------------------------------

	public function ujian_disc()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_disc();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_disc', $paket);
	}

	public function updatedisc()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_disc SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_disc=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian DISC Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_disc');
	}

	// -------------------------CRUD ESSAY------------------------------------

	public function ujian_essay()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_essay();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_essay', $paket);
	}

	public function updateessay()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_essay SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_essay=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian RMIB Pria Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_essay');
	}

	// -------------------------CRUD Hitung------------------------------------

	public function ujian_hitung()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_hitung();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_hitung', $paket);
	}

	public function updatehitung()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_hitung SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_hitung=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian RMIB Pria Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_hitung');
	}
	// -------------------------CRUD Kasus------------------------------------

	public function ujian_kasus()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_studi();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_studikasus', $paket);
	}

	public function updatekasus()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_kasus SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_studi=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Studi Kasus Staff Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_kasus');
	}
	// -------------------------CRUD Kasus Manajerial------------------------------------

	public function ujian_kasus_m()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_studi_manajerial();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_studikasusmanagerial', $paket);
	}

	public function updatekasusm()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_kasus_manajerial SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_studi_manajerial=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Studi Kasus Manajerial Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_kasus_m');
	}// -------------------------CRUD Kasus LDG------------------------------------

	public function ujian_kasus_ldg()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_studi_ldg();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_studikasusldg', $paket);
	}

	public function updatekasusldg()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_kasus_ldg SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_studi_ldg=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Studi Kasus LDG Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_kasus_ldg');
	}
	// -------------------------CRUD Kasus Leadership------------------------------------

	public function ujian_leadership()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_leader();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_leadership', $paket);
	}

	public function updateleadership()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_leadership SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_leadership=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Leadership Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_leadership');
	}
	// -------------------------CRUD Kasus MSDT------------------------------------

	public function ujian_msdt()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_msdt();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_msdt', $paket);
	}

	public function updatemsdt()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_msdt SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_msdt=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian MSDT Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_msdt');
	}
	// -------------------------CRUD Kasus Papikostik------------------------------------

	public function ujian_papi()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_papi();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_papi', $paket);
	}

	public function updatepapi()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_papi SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_papi=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Papikostik Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_papi');
	}

	// -------------------------CRUD Kasus RMIB Pria------------------------------------

	public function ujian_rmib_pria()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_rmib_pria();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_rmib_pria', $paket);
	}

	public function updatermibpria()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_rmib_pria SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_rmib_pria=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian RMIB Pria Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_rmib_pria');
	}
	// -------------------------CRUD Kasus RMIN Wanita------------------------------------

	public function ujian_rmib_wanita()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_rmib_wanita();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_rmib_wanita', $paket);
	}

	public function updatermibwanita()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_rmib_wanita SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_rmib_wanita=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian RMIB Wanita Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_rmib_wanita');
	}
	// -------------------------CRUD Kasus Studi Bank------------------------------------

	public function ujian_studibank()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_studibank();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_studibank', $paket);
	}

	public function updatestudibank()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_studibank SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_studibank=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Studi Bank Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_studibank');
	}
	// -------------------------CRUD Kasus Talent------------------------------------

	public function ujian_talent()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_talent();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_talent', $paket);
	}

	public function updatetalent()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_talent SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_talent=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Talent Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_talent');
	}
	// -------------------------CRUD Kasus EPPS------------------------------------

	public function ujian_epps()

	{
		$paket['arraysma'] = $this->Mdl_data_ujian->ambildata_ujian_epps_sma();
		$paket['arrays1'] = $this->Mdl_data_ujian->ambildata_ujian_epps_s1();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_epps', $paket);
	}

	public function updateepps()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		$waktuujian1 = $this->input->post('waktu_ujian1');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$endujian1 = tambahmenit($startujian, $waktuujian1);

		$this->db->query("UPDATE tb_ujian_epps SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian1',STATUS='$status' where id_ujian_epps=1");
		$this->db->query("UPDATE tb_ujian_epps SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_epps=2");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian EPPS Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_epps');
	}

	// -------------------------CRUD Ujian Bahasa Inggris------------------------------------

	public function ujian_inggris()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_inggris();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_inggris', $paket);
	}

	public function updateinggris()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$this->db->query("UPDATE tb_ujian_inggris SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_inggris=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Bahasa Inggris Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_inggris');
	}

	// -------------------------CRUD Ujian TKB Accounting------------------------------------

	public function ujian_tkb_accounting()

	{
		// $paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_inggris();
		$paket['array'] = $this->db->query("SELECT * FROM tb_ujian_tkb_accountingstaff where id_ujian=1")->result_array();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_tkb_accounting', $paket);
	}

	public function updatetkbaccounting()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$data = array(
			'nama_ujian' => $namates,
			'waktu_mulai' => $datetime_mulai,
			'waktu_akhir' => $endujian,
			'status' => $status
		);
		$where = array(
			'id_ujian' => 1
		);
		$this->db->where($where);
		$this->db->update('tb_ujian_tkb_accountingstaff', $data);
		// $this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_inggris=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TKB Accounting Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_tkb_accounting');
	}
	// -------------------------CRUD Ujian TKB Bussiness Development------------------------------------

	public function ujian_tkb_bussinessdevelopment()

	{
		// $paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_inggris();
		$paket['array'] = $this->db->query("SELECT * FROM tb_ujian_tkb_bussinessdevelopmentstaff where id_ujian=1")->result_array();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_tkb_bussinessdevelopment', $paket);
	}

	public function updatetkbbussinessdevelopment()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$data = array(
			'nama_ujian' => $namates,
			'waktu_mulai' => $datetime_mulai,
			'waktu_akhir' => $endujian,
			'status' => $status
		);
		$where = array(
			'id_ujian' => 1
		);
		$this->db->where($where);
		$this->db->update('tb_ujian_tkb_bussinessdevelopmentstaff', $data);
		// $this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_inggris=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TKB Bussiness Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_tkb_bussinessdevelopment');
	}
	// -------------------------CRUD Ujian TKB Training Operation------------------------------------

	public function ujian_tkb_trainingoperation()

	{
		// $paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_inggris();
		$paket['array'] = $this->db->query("SELECT * FROM tb_ujian_tkb_trainingoperationstaff where id_ujian=1")->result_array();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_tkb_trainingoperation', $paket);
	}

	public function updatetkbtrainingoperation()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$data = array(
			'nama_ujian' => $namates,
			'waktu_mulai' => $datetime_mulai,
			'waktu_akhir' => $endujian,
			'status' => $status
		);
		$where = array(
			'id_ujian' => 1
		);
		$this->db->where($where);
		$this->db->update('tb_ujian_tkb_trainingoperationstaff', $data);
		// $this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_inggris=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TKB Training Operation di Update.');
		redirect('Administrator/Data_ujian/ujian_tkb_trainingoperation');
	}

	// -------------------------CRUD Ujian TKB Project Administration------------------------------------

	public function ujian_tkb_projectadministration()

	{
		// $paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_inggris();
		$paket['array'] = $this->db->query("SELECT * FROM tb_ujian_tkb_projectadministrationstaff where id_ujian=1")->result_array();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_tkb_projectadministration', $paket);
	}

	public function updatetkbprojectadministration()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$data = array(
			'nama_ujian' => $namates,
			'waktu_mulai' => $datetime_mulai,
			'waktu_akhir' => $endujian,
			'status' => $status
		);
		$where = array(
			'id_ujian' => 1
		);
		$this->db->where($where);
		$this->db->update('tb_ujian_tkb_projectadministrationstaff', $data);
		// $this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_inggris=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TKB Project Administration di Update.');
		redirect('Administrator/Data_ujian/ujian_tkb_projectadministration');
	}
	// -------------------------CRUD Ujian TKB Frontliner------------------------------------

	public function ujian_tkb_frontliner()

	{
		// $paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_inggris();
		$paket['array'] = $this->db->query("SELECT * FROM tb_ujian_tkb_frontlinerstaff where id_ujian=1")->result_array();
		// var_dump($paket['array']);
		$this->load->view('administrator/manage_ujian_tkb_frontliner', $paket);
	}

	public function updatetkbfrontliner()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);
		$data = array(
			'nama_ujian' => $namates,
			'waktu_mulai' => $datetime_mulai,
			'waktu_akhir' => $endujian,
			'status' => $status
		);
		$where = array(
			'id_ujian' => 1
		);
		$this->db->where($where);
		$this->db->update('tb_ujian_tkb_frontlinerstaff', $data);
		// $this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_inggris=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TKB Frontliner di Update.');
		redirect('Administrator/Data_ujian/ujian_tkb_frontliner');
	}

	//-----------------------------TPA---------------------
	public function ujian_tpa()

	{

		$paket['array1'] = $this->db->query("SELECT * FROM tb_ujian_tpa_verbal where id_ujian=1")->result_array();
		$paket['array2'] = $this->db->query("SELECT * FROM tb_ujian_tpa_kuantitatif where id_ujian=1")->result_array();
		$paket['array3'] = $this->db->query("SELECT * FROM tb_ujian_tpa_penalaran where id_ujian=1")->result_array();

		$this->load->view('administrator/manage_ujian_tpa', $paket);
	}
	public function updatetpa1()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		if ($this->input->post('tpa_panjang') == "aktif") {
			$tpa_panjang = "aktif";
		} else {
			$tpa_panjang = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_tpa_verbal SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',tpa_panjang='$tpa_panjang',STATUS='$status' where id_ujian=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TPA Verbal Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_tpa');
	}
	public function updatetpa2()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		if ($this->input->post('tpa_panjang') == "aktif") {
			$tpa_panjang = "aktif";
		} else {
			$tpa_panjang = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_tpa_kuantitatif SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',tpa_panjang='$tpa_panjang',STATUS='$status' where id_ujian=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TPA Kuantitatif Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_tpa');
	}
	public function updatetpa3()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		if ($this->input->post('tpa_panjang') == "aktif") {
			$tpa_panjang = "aktif";
		} else {
			$tpa_panjang = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		$this->db->query("UPDATE tb_ujian_tpa_penalaran SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',tpa_panjang='$tpa_panjang',STATUS='$status' where id_ujian=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian TPA Penalaran Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_tpa');
	}
	// -------------------------CRUD Holland------------------------------------

	public function ujian_kontrak_psikologis()

	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_kontrak_psikologis();
		$this->load->view('administrator/manage_ujian_kontrak_psikologis', $paket);
	}

	public function updatekontrakpsikologis()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian = $this->input->post('waktu_ujian');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}

		$startujian = $datetime_mulai;
		$endujian = tambahmenit($startujian, $waktuujian);

		// echo "UPDATE tb_ujian_kontrak_psikologis SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_kontrak_psikologis=1";
		$this->db->query("UPDATE tb_ujian_kontrak_psikologis SET nama_ujian='$namates',waktu_mulai='$datetime_mulai',waktu_akhir='$endujian',STATUS='$status' where id_ujian_kontrak_psikologis=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian Kontrak Psikologis Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_kontrak_psikologis');
	}
		// -------------------------CRUD BELBIN------------------------------------

	public function ujian_belbin()
	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_belbin();
		$this->load->view('administrator/manage_ujian_belbin', $paket);
	}

	public function updatebelbin()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian1 = $this->input->post('waktu_ujiansubtes1');
		$waktuujian2 = $this->input->post('waktu_ujiansubtes2');
		$waktuujian3 = $this->input->post('waktu_ujiansubtes3');
		$waktuujian4 = $this->input->post('waktu_ujiansubtes4');
		$waktuujian5 = $this->input->post('waktu_ujiansubtes5');
		$waktuujian6 = $this->input->post('waktu_ujiansubtes6');
		$waktuujian7 = $this->input->post('waktu_ujiansubtes7');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujiansub1 = $datetime_mulai;
		$endujiansub1 = tambahmenit($startujiansub1, $waktuujian1);

		$startujiansub2 = $endujiansub1;
		$endujiansub2 = tambahmenit($startujiansub2, $waktuujian2);

		$startujiansub3 = $endujiansub2;
		$endujiansub3 = tambahmenit($startujiansub3, $waktuujian3);

		$startujiansub4 = $endujiansub3;
		$endujiansub4 = tambahmenit($startujiansub4, $waktuujian4);

		$startujiansub5 = $endujiansub4;
		$endujiansub5 = tambahmenit($startujiansub5, $waktuujian5);

		$startujiansub6 = $endujiansub5;
		$endujiansub6 = tambahmenit($startujiansub6, $waktuujian6);

		$startujiansub7 = $endujiansub6;
		$endujiansub7 = tambahmenit($startujiansub7, $waktuujian7);

		// 	id_ujian,nama_ujian,waktu_dimulai,waktu_berakhir
		// 	,start_lat_sub1,end_lat_sub1, start_uji_sub1, end_uji_sub1
		// 	,start_lat_sub2,end_lat_sub2, start_uji_sub2, end_uji_sub2
		// 	,start_lat_sub3,end_lat_sub3, start_uji_sub3, end_uji_sub3
		// 	,start_lat_sub4,end_lat_sub4, start_uji_sub4, end_uji_sub4
		// 	,durasi,nama_pembuat,STATUS
		// 	) VALUE (
		// 	'1','$namates','$datetime_mulai','$endujiansub4',
		// 	'$startltsub1','$endltsub1','$startujiansub1','$endujiansub1',
		// 	'$startltsub2','$endltsub2','$startujiansub2','$endujiansub2',
		// 	'$startltsub3','$endltsub3','$startujiansub3','$endujiansub3',
		// 	'$startltsub4','$endltsub4','$startujiansub4','$endujiansub4',
		// 	1950,'Administrator','tersedia'
		// 	)";
		$this->db->query("UPDATE tb_ujian_belbin SET
nama_ujian='$namates',waktu_dimulai='$datetime_mulai',waktu_berakhir='$endujiansub7'
, start_uji_sub1='$startujiansub1', end_uji_sub1='$endujiansub1'
, start_uji_sub2='$startujiansub2', end_uji_sub2='$endujiansub2'
, start_uji_sub3='$startujiansub3', end_uji_sub3='$endujiansub3'
, start_uji_sub4='$startujiansub4', end_uji_sub4='$endujiansub4'
, start_uji_sub4='$startujiansub4', end_uji_sub4='$endujiansub4'
, start_uji_sub5='$startujiansub5', end_uji_sub5='$endujiansub5'
, start_uji_sub6='$startujiansub6', end_uji_sub6='$endujiansub6'
, start_uji_sub7='$startujiansub7', end_uji_sub7='$endujiansub7'
,durasi='1950',nama_pembuat='$pembuat',STATUS='$status'
 where id_ujian_belbin=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian BELBIN Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_belbin');
	}

	// -------------------------CRUD GRAFIS 1------------------------------------

	public function ujian_grafis()
	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_grafis();
		$this->load->view('administrator/manage_ujian_grafis', $paket);
	}

	public function updategrafis()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian1 = $this->input->post('waktu_ujiansubtes1');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujiansub1 = $datetime_mulai;
		$endujiansub1 = tambahmenit($startujiansub1, $waktuujian1);


		$this->db->query("UPDATE tb_ujian_grafis SET
nama_ujian='$namates',waktu_dimulai='$datetime_mulai',waktu_berakhir='$endujiansub1'
, start_uji_sub1='$startujiansub1', end_uji_sub1='$endujiansub1'
,durasi='1950',nama_pembuat='$pembuat',STATUS='$status'
 where id_ujian_grafis=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian GRAFIS 1 Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_grafis');
	}
	// -------------------------CRUD GRAFIS 2------------------------------------

	public function ujian_grafis2()
	{
		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian_grafis2();
		$this->load->view('administrator/manage_ujian_grafis2', $paket);
	}

	public function updategrafis2()
	{
		$namates = $this->input->post('nama_ujian');
		$datetime_mulai = $this->input->post('waktu_mulai');
		$waktuujian1 = $this->input->post('waktu_ujiansubtes1');
		$pembuat = $this->input->post('id_admin');
		if ($this->input->post('status') == "aktif") {
			$status = "aktif";
		} else {
			$status = "tidak aktif";
		}
		$startujiansub1 = $datetime_mulai;
		$endujiansub1 = tambahmenit($startujiansub1, $waktuujian1);


		$this->db->query("UPDATE tb_ujian_grafis2 SET
nama_ujian='$namates',waktu_dimulai='$datetime_mulai',waktu_berakhir='$endujiansub1'
, start_uji_sub1='$startujiansub1', end_uji_sub1='$endujiansub1'
,durasi='1950',nama_pembuat='$pembuat',STATUS='$status'
 where id_ujian_grafis=1");
		$this->session->set_flashdata('msg', 'Waktu Pelaksanaan Ujian GRAFIS  2 Berhasil di Update.');
		redirect('Administrator/Data_ujian/ujian_grafis2');
	}
	// -------------------------CRUD END-----------------------------------


	public function aktifkansemua()
	{
		$this->db->query("UPDATE tb_ujian SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_disc SET STATUS='aktif' where id_ujian_disc=1");
		$this->db->query("UPDATE tb_ujian_essay SET STATUS='aktif' where id_ujian_essay=1");
		$this->db->query("UPDATE tb_ujian_hitung SET STATUS='aktif' where id_ujian_hitung=1");
		$this->db->query("UPDATE tb_ujian_holland SET STATUS='aktif' where id_ujian_holland=1");
		$this->db->query("UPDATE tb_ujian_ist SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_kasus SET STATUS='aktif' where id_ujian_studi=1");
		$this->db->query("UPDATE tb_ujian_kasus_manajerial SET STATUS='aktif' where id_ujian_studi_manajerial=1");
		$this->db->query("UPDATE tb_ujian_kasus_ldg SET STATUS='aktif' where id_ujian_studi_ldg=1");
		$this->db->query("UPDATE tb_ujian_leadership SET STATUS='aktif' where id_ujian_leadership=1");
		$this->db->query("UPDATE tb_ujian_msdt SET STATUS='aktif' where id_ujian_msdt=1");
		$this->db->query("UPDATE tb_ujian_papi SET STATUS='aktif' where id_ujian_papi=1");
		$this->db->query("UPDATE tb_ujian_rmib_pria SET STATUS='aktif' where id_ujian_rmib_pria=1");
		$this->db->query("UPDATE tb_ujian_rmib_wanita SET STATUS='aktif' where id_ujian_rmib_wanita=1");
		$this->db->query("UPDATE tb_ujian_studibank SET STATUS='aktif' where id_ujian_studibank=1");
		$this->db->query("UPDATE tb_ujian_talent SET STATUS='aktif' where id_ujian_talent=1");
		$this->db->query("UPDATE tb_ujian_epps SET STATUS='aktif' where id_ujian_epps=1");
		$this->db->query("UPDATE tb_ujian_epps SET STATUS='aktif' where id_ujian_epps=2");
		$this->db->query("UPDATE tb_ujian_inggris SET STATUS='aktif' where id_ujian_inggris=1");
		$this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_bussinessdevelopmentstaff SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_trainingoperationstaff SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_projectadministrationstaff SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_frontlinerstaff SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tpa_verbal SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tpa_kuantitatif SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tpa_penalaran SET STATUS='aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_kontrak_psikologis SET STATUS='aktif' where id_ujian_kontrak_psikologis=1");
		$this->db->query("UPDATE tb_ujian_belbin SET STATUS='aktif' where id_ujian_belbin=1");
		$this->db->query("UPDATE tb_ujian_grafis SET STATUS='aktif' where id_ujian_grafis=1");
		$this->db->query("UPDATE tb_ujian_grafis2 SET STATUS='aktif' where id_ujian_grafis=1");
		$this->session->set_flashdata('msg', 'Semua Ujian Diaktifkan.');
		redirect('Administrator/Data_ujian');
	}
	public function nonaktifkansemua()
	{
		$this->db->query("UPDATE tb_ujian SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_disc SET STATUS='tidak aktif' where id_ujian_disc=1");
		$this->db->query("UPDATE tb_ujian_essay SET STATUS='tidak aktif' where id_ujian_essay=1");
		$this->db->query("UPDATE tb_ujian_hitung SET STATUS='tidak aktif' where id_ujian_hitung=1");
		$this->db->query("UPDATE tb_ujian_holland SET STATUS='tidak aktif' where id_ujian_holland=1");
		$this->db->query("UPDATE tb_ujian_ist SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_kasus SET STATUS='tidak aktif' where id_ujian_studi=1");
		$this->db->query("UPDATE tb_ujian_kasus_manajerial SET STATUS='tidak aktif' where id_ujian_studi_manajerial=1");
		$this->db->query("UPDATE tb_ujian_kasus_ldg SET STATUS='tidak aktif' where id_ujian_studi_ldg=1");
		$this->db->query("UPDATE tb_ujian_leadership SET STATUS='tidak aktif' where id_ujian_leadership=1");
		$this->db->query("UPDATE tb_ujian_msdt SET STATUS='tidak aktif' where id_ujian_msdt=1");
		$this->db->query("UPDATE tb_ujian_papi SET STATUS='tidak aktif' where id_ujian_papi=1");
		$this->db->query("UPDATE tb_ujian_rmib_pria SET STATUS='tidak aktif' where id_ujian_rmib_pria=1");
		$this->db->query("UPDATE tb_ujian_rmib_wanita SET STATUS='tidak aktif' where id_ujian_rmib_wanita=1");
		$this->db->query("UPDATE tb_ujian_studibank SET STATUS='tidak aktif' where id_ujian_studibank=1");
		$this->db->query("UPDATE tb_ujian_talent SET STATUS='tidak aktif' where id_ujian_talent=1");
		$this->db->query("UPDATE tb_ujian_epps SET STATUS='tidak aktif' where id_ujian_epps=1");
		$this->db->query("UPDATE tb_ujian_epps SET STATUS='tidak aktif' where id_ujian_epps=2");
		$this->db->query("UPDATE tb_ujian_inggris SET STATUS='tidak aktif' where id_ujian_inggris=1");
		$this->db->query("UPDATE tb_ujian_tkb_accountingstaff SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_bussinessdevelopmentstaff SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_trainingoperationstaff SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_projectadministrationstaff SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tkb_frontlinerstaff SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tpa_verbal SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tpa_kuantitatif SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_tpa_penalaran SET STATUS='tidak aktif' where id_ujian=1");
		$this->db->query("UPDATE tb_ujian_kontrak_psikologis SET STATUS='tidak aktif' where id_ujian_kontrak_psikologis=1");
		$this->db->query("UPDATE tb_ujian_belbin SET STATUS='tidak aktif' where id_ujian_belbin=1");
		$this->db->query("UPDATE tb_ujian_grafis SET STATUS='tidak aktif' where id_ujian_grafis=1");
		$this->db->query("UPDATE tb_ujian_grafis2 SET STATUS='tidak aktif' where id_ujian_grafis=1");
		$this->session->set_flashdata('msg', 'Semua Ujian Dinonaktifkan.');
		redirect('Administrator/Data_ujian');
	}



	// END CRUD Ujian

	// ============================================================================================





}
