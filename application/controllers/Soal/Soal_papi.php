<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_papi extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_soal');
		// $this->load->model('mdl_data_nilai');
		// $this->load->model('mdl_data_pelamar');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login','refresh');
		}		
	}

	public function index(){
		$paket['papi']=$this->Mdl_soal->ambildata_papi();
		$this->load->view('soal/papi/soal_papi',$paket);
	}

	public function tambahdata(){
		$this->form_validation->set_rules('no_soal','No Soal','trim|required');
		$value['aspek']=$this->input->post('aspek');
		$value['aspek2']=$this->input->post('aspek2');

		if ($this->form_validation->run()==FALSE || $value['aspek']=='zero' || $value['aspek2']=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('soal/papi/vtambah_papi',$data);
		}
		else{
			$send['id_soal']='';
			$send['no_soal']=$this->input->post('no_soal');
			$send['pernyataan1']=$this->input->post('pernyataan1');
			$send['pernyataan2']=$this->input->post('pernyataan2');
			$send['aspek']=$this->input->post('aspek');
			$send['aspek2']=$this->input->post('aspek2');

			$kembalian['jumlah']=$this->Mdl_soal->tambahdata_papi($send);

			$this->load->view('soal/papi/vtambah_papi');
			$this->session->set_flashdata('msg','Data Berhasil Ditambahkan!!!');
			redirect('Soal/Soal_papi/');
		}
	}

	public function edit_papi(){
		$id_soal = $this->input->post('id_soal');
		$no_soal = $this->input->post('no_soal');
		$pernyataan1 = $this->input->post('pernyataan1');
		$pernyataan2 = $this->input->post('pernyataan2');
		$aspek = $this->input->post('aspek');
		$aspek2 = $this->input->post('aspek2');

		$data = array(
			'pernyataan1' => $pernyataan1,
			'pernyataan2' => $pernyataan2,
			'aspek' => $aspek,
			'aspek2' => $aspek2
		);

		$where = array(
			'id_soal' => $id_soal
		);

		$this->Mdl_soal->update_data($where,$data,'tb_soal_papi');
		$this->session->set_flashdata('msg_update','Data Berhasil Diedit');
		redirect('Soal/Soal_papi/');
	}

	public function hapus_papi($id){
		$where = array('id_soal' => $id);
		$this->Mdl_soal->do_delete($where,'tb_soal_papi');
		$this->session->set_flashdata('msg_hapus','Data Berhasil dihapus');
		redirect('Soal/Soal_papi/');
	}
}
?>