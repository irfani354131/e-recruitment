<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_ist extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_soal');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login','refresh');
		}		
	}

	public function index(){
		$paket['ist']=$this->Mdl_soal->ambildata_ist();
		$this->load->view('soal/ist/soal_ist',$paket);
	}

	public function tambahdata(){

		$send['id_soal']='';
		$send['nomor_soal']=$this->input->post('nomor_soal');
		$send['soal']=$this->input->post('soal_ist');
		$send['opsi_a']=$this->input->post('opsi_a');
		$send['opsi_b']=$this->input->post('opsi_b');
		$send['opsi_c']=$this->input->post('opsi_c');
		$send['opsi_d']=$this->input->post('opsi_d');
		$send['opsi_e']=$this->input->post('opsi_e');
		$send['jawaban']=$this->input->post('jawaban');
		$send['subtes']=$this->input->post('subtes');

		$kembalian['jumlah']=$this->Mdl_soal->tambahdata_ist($send);

		$this->session->set_flashdata('msg','Data Berhasil Ditambahkan!!!');
		redirect('Soal/Soal_ist/');
	}

	public function editist(){
		$id_soal = $this->input->post('id_soal');
		$soal_ist = $this->input->post('soal_ist');
		$opsi_a = $this->input->post('opsi_a');
		$opsi_b = $this->input->post('opsi_b');
		$opsi_c = $this->input->post('opsi_c');
		$opsi_d = $this->input->post('opsi_d');
		$opsi_e = $this->input->post('opsi_e');
		$jawaban = $this->input->post('jawaban');
		$subtes = $this->input->post('subtes');

		$data = array(
			'soal' => $soal_ist,
			'opsi_a' => $opsi_a,
			'opsi_b' => $opsi_b,
			'opsi_c' => $opsi_c,
			'opsi_d' => $opsi_d,
			'opsi_e' => $opsi_e,
			'jawaban' => $jawaban,
			'subtes' => $subtes
		);

		$where = array(
			'id_soal' => $id_soal
		);

		$this->Mdl_soal->update_data($where,$data,'tb_soal_ist');
		$this->session->set_flashdata('msg_update','Data Berhasil Diedit');
		redirect('Soal/Soal_ist/');
	}

	public function hapus($id){
		$where = array('id_soal' => $id);
		$this->Mdl_soal->do_delete($where,'tb_soal_ist');
		$this->session->set_flashdata('msg_hapus','Data Berhasil dihapus');
		redirect('Soal/Soal_ist/');
	}
}
?>