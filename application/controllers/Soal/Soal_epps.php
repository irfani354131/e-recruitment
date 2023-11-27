<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_epps extends CI_Controller
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
        $paket['epps'] = $this->Mdl_soal->ambildata_epps();
        $this->load->view('soal/epps/soal_epps', $paket);
    }

    public function tambahdata()
    {
        $this->form_validation->set_rules('no_soal', 'No Soal', 'trim|required');
        $value['aspek1'] = $this->input->post('aspek1');
        $value['aspek2'] = $this->input->post('aspek2');

        if ($this->form_validation->run() == FALSE || $value['aspek1'] == 'zero' || $value['aspek2'] == 'zero') {
            $data['msg_error'] = "Silahkan isi semua kolom";
            $this->load->view('soal/epps/vtambah_epps', $data);
        } else {
            $send['id_soal'] = '';
            $send['no_soal'] = $this->input->post('no_soal');
            $send['pilihan1'] = $this->input->post('pilihan1');
            $send['pilihan2'] = $this->input->post('pilihan1');
            $send['aspek1'] = $this->input->post('aspek1');
            $send['aspek2'] = $this->input->post('aspek2');

            $kembalian['jumlah'] = $this->Mdl_soal->tambahdata_epps($send);

            $this->load->view('soal/epps/vtambah_epps');
            $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
            redirect('Soal/Soal_epps/');
        }
    }

    public function edit_epps()
    {
        $id_soal = $this->input->post('id_soal');
        $no_soal = $this->input->post('no_soal');
        $pilihan1 = $this->input->post('pilihan1');
        $pilihan2 = $this->input->post('pilihan2');
        $aspek1 = $this->input->post('aspek1');
        $aspek2 = $this->input->post('aspek2');

        $data = array(
            'no_soal' => $no_soal,
            'pilihan1' => $pilihan1,
            'pilihan1' => $pilihan2,
            'aspek1' => $aspek1,
            'aspek2' => $aspek2
        );

        $where = array(
            'id_soal' => $id_soal
        );

        $this->Mdl_soal->update_data($where, $data, 'tb_soal_epps');
        $this->session->set_flashdata('msg_update', 'Data Berhasil Diedit');
        redirect('Soal/Soal_epps/');
    }

    public function hapus_epps($id)
    {
        $where = array('id_soal' => $id);
        $this->Mdl_soal->do_delete($where, 'tb_soal_epps');
        $this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
        redirect('Soal/Soal_epps/');
    }
}
