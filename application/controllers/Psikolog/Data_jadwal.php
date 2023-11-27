<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jadwal extends CI_Controller {

	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('Mdl_data_jadwal');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login','refresh');
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

	// CRUD Motlet
	public function index()
	{
		$paket['array']=$this->Mdl_data_jadwal->ambildata_jadwal();	
		$this->load->view('psikolog/data_jadwal',$paket);
	}

	
	public function tambahdata(){
		// $this->form_validation->set_rules('id_lowongan','Nama','trim|required');
		$this->form_validation->set_rules('tes_tulis','Nama','trim|required');
		$this->form_validation->set_rules('tes_wawancara','Nama','trim|required');
		$this->form_validation->set_rules('tes_fgd','Nama','trim|required');
		$value['id_lowongan']=$this->input->post('id_lowongan');

		if ($this->form_validation->run()==FALSE || $value['id_lowongan']=='zero' ) {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('administrator/vtambah_jadwal',$data);
		}
		else{
			$send['id_jadwal']='';
			$send['id_lowongan']=$this->input->post('id_lowongan');
			$send['tes_tulis']=$this->input->post('tes_tulis');
			$send['tes_wawancara']=$this->input->post('tes_wawancara');
			$send['test_fgd']=$this->input->post('tes_fgd');

			$kembalian['jumlah']=$this->Mdl_data_jadwal->tambahdata_jadwal($send);
						
			$this->load->view('administrator/data_jadwal',$kembalian);
			$this->session->set_flashdata('msg','Data Berhasil Ditambahkan!!!');
			redirect('Administrator/Data_jadwal/');
		}
	}

	public function hapus_jadwal($id){
		$where = array('id_jadwal' => $id);
		$this->Mdl_data_jadwal->do_delete($where,'tb_jadwal');
		$this->session->set_flashdata('msg_hapus','Data Berhasil dihapus');
		redirect('Administrator/Data_jadwal/');
	}

	public function edit_jadwal($id_update){
		$this->form_validation->set_rules('tes_tulis','Nama','trim|required');
		$this->form_validation->set_rules('tes_wawancara','Nama','trim|required');
		$this->form_validation->set_rules('tes_fgd','Nama','trim|required');
		$value['id_lowongan']=$this->input->post('id_lowongan');

		if($this->form_validation->run()==FALSE || $value['id_lowongan']=='zero' ){
			$indexrow['data']=$this->Mdl_data_jadwal->ambildata2_jadwal($id_update);
			$this->load->view('administrator/vedit_jadwal', $indexrow);
		}
		else{
			$send['id_jadwal']=$this->input->post('id_jadwal');
			$send['id_lowongan']=$this->input->post('id_lowongan');
			$send['tes_tulis']=$this->input->post('tes_tulis');
			$send['tes_wawancara']=$this->input->post('tes_wawancara');
			$send['test_fgd']=$this->input->post('tes_fgd');
			// var_dump($send);
			$kembalian['jumlah']=$this->Mdl_data_jadwal->modelupdate($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Administrator/Data_jadwal');
		}
	}

	// END CRUD Motlet
// ============================================================================================
	

}
