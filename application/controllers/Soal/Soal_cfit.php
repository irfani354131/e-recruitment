<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_cfit extends CI_Controller
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
		$paket['array'] = $this->Mdl_soal->ambildata();
		$this->load->view('soal/soal_cfit', $paket);
	}

	public function tambahdata()
	{
		$this->form_validation->set_rules('jawaban', 'Nama', 'trim|required');
		$this->form_validation->set_rules('type_soal', 'Nama', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['msg_error'] = "Silahkan isi semua kolom";
			$this->load->view('soal/vtambah_cfit', $data);
		} else {
			$send['id_soal'] = '';
			$send['jawaban'] = $this->input->post('jawaban');
			$send['type_soal'] = $this->input->post('type_soal');
			$send['subtes'] = $this->input->post('subtes');
			$send['jawaban2'] = $this->input->post('jawaban2');

			// soal
			if ($_FILES["soal"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Soal".$send['id_soal'];

				$this->load->library('upload', $config);

				//soal 
				if (!$this->upload->do_upload('soal')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['soal'] = $data['file_name'];
				}
			}


			//Jawaban opsi a
			if ($_FILES["opsi_a"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Jawaban_A_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_a')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['opsi_a'] = $data['file_name'];
				}
			}


			//Jawaban opsi b
			if ($_FILES["opsi_b"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Jawaban_B_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_b')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['opsi_b'] = $data['file_name'];
				}
			}

			//Jawaban opsi c
			if ($_FILES["opsi_c"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Jawaban_C_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_c')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['opsi_c'] = $data['file_name'];
				}
			}

			//Jawaban opsi d
			if ($_FILES["opsi_d"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Jawaban_D_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_d')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['opsi_d'] = $data['file_name'];
				}
			}

			//Jawaban opsi e
			if ($_FILES["opsi_e"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Jawaban_E_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_e')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['opsi_e'] = $data['file_name'];
				}
			}

			//Jawaban opsi f
			if ($_FILES["opsi_f"]["name"] != "") {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				// $config['file_name'] ="Jawaban_f_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_f')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('soal/vtambah_cfit');
				} else {
					$data = $this->upload->data();
					$send['opsi_f'] = $data['file_name'];
				}
			}

			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_soal->tambahdata($send);

			$this->load->view('soal/soal_cfit', $kembalian);
			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');
			redirect('Soal/Soal_cfit/');
		}
	}

	public function hapus_cfit($id)
	{
		$where = array('id_soal' => $id);

		$query_cekFoto = $this->db->query("SELECT * FROM tb_soal_cfit");

		foreach ($query_cekFoto->result() as $key) {
			if ($key->id_soal == $id) {
				$soal = $key->soal;
				$opsi_a = $key->opsi_a;
				$opsi_b = $key->opsi_b;
				$opsi_c = $key->opsi_c;
				$opsi_d = $key->opsi_d;
				$opsi_e = $key->opsi_e;
				$opsi_f = $key->opsi_f;
			}
		}
		if ($soal != "") {
			$target = "upload/bank_soal/cfit/" . $soal;
			unlink($target);
		}

		if ($opsi_a != "") {
			$target = "upload/bank_soal/cfit/" . $opsi_a;
			unlink($target);
		}

		if ($opsi_b != "") {
			$target = "upload/bank_soal/cfit/" . $opsi_b;
			unlink($target);
		}

		if ($opsi_c != "") {
			$target = "upload/bank_soal/cfit/" . $opsi_c;
			unlink($target);
		}

		if ($opsi_d != "") {
			$target = "upload/bank_soal/cfit/" . $opsi_d;
			unlink($target);
		}

		if ($opsi_e != "") {
			$target = "upload/bank_soal/cfit/" . $opsi_e;
			unlink($target);
		}

		if ($opsi_f != "") {
			$target = "upload/bank_soal/cfit/" . $opsi_f;
			unlink($target);
		}

		$this->Mdl_soal->do_delete($where, 'tb_soal_cfit');
		$this->session->set_flashdata('msg_hapus', 'Data Berhasil dihapus');
		redirect('Soal/Soal_cfit/');
	}

	public function edit_cfit($id_update)
	{
		$this->form_validation->set_rules('jawaban', 'Nama', 'trim|required');
		$this->form_validation->set_rules('type_soal', 'Nama', 'trim|required');
		$value_jawab = $this->input->post('jawaban');
		$value_type = $this->input->post('type_soal');
		$value_subtes = $this->input->post('subtes');

		if ($this->form_validation->run() == FALSE || $value_jawab == "zero" || $value_type == "zero" || $value_subtes == "zero") {
			$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
			$this->load->view('soal/vedit_cfit', $indexrow);
		} else {
			$send['id_soal'] = $this->input->post('id_soal');
			$send['jawaban'] = $this->input->post('jawaban');
			$send['type_soal'] = $this->input->post('type_soal');
			$send['subtes'] = $this->input->post('subtes');
			$send['jawaban2'] = $this->input->post('jawaban2');


			$current = $this->input->post('id_soal');
			$query = $this->db->query("SELECT * FROM tb_soal_cfit WHERE id_soal=$current")->result_array();

			// soal
			if ($_FILES["soal"]["name"] != ""  && $_FILES["soal"]["name"] != $query[0]['soal']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Soal".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('soal')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['soal'];
					unlink($target);
					$data = $this->upload->data();
					$send['soal'] = $data['file_name'];
				}
			} else {
				$send['soal'] = $query[0]['soal'];
			}


			//Jawaban opsi a
			if ($_FILES["opsi_a"]["name"] != "" && $_FILES["opsi_a"]["name"] != $query[0]['opsi_a']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Jawaban_A_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_a')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['opsi_a'];
					unlink($target);
					$data = $this->upload->data();
					$send['opsi_a'] = $data['file_name'];
				}
			} else {
				$send['opsi_a'] = $query[0]['opsi_a'];
			}


			//Jawaban opsi b
			if ($_FILES["opsi_b"]["name"] != "" && $_FILES["opsi_b"]["name"] != $query[0]['opsi_b']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Jawaban_B_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_b')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['opsi_b'];
					unlink($target);
					$data = $this->upload->data();
					$send['opsi_b'] = $data['file_name'];
				}
			} else {
				$send['opsi_b'] = $query[0]['opsi_b'];
			}

			//Jawaban opsi c
			if ($_FILES["opsi_c"]["name"] != "" && $_FILES["opsi_d"]["name"] != $query[0]['opsi_d']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Jawaban_C_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_c')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['opsi_c'];
					unlink($target);
					$data = $this->upload->data();
					$send['opsi_c'] = $data['file_name'];
				}
			} else {
				$send['opsi_c'] = $query[0]['opsi_c'];
			}

			//Jawaban opsi d
			if ($_FILES["opsi_d"]["name"] != "" && $_FILES["opsi_d"]["name"] != $query[0]['opsi_d']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Jawaban_D_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_d')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['opsi_d'];
					unlink($target);
					$data = $this->upload->data();
					$send['opsi_d'] = $data['file_name'];
				}
			} else {
				$send['opsi_d'] = $query[0]['opsi_d'];
			}

			//Jawaban opsi e
			if ($_FILES["opsi_e"]["name"] != "" && $_FILES["opsi_e"]["name"] != $query[0]['opsi_e']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Jawaban_E_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_e')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['opsi_e'];
					unlink($target);
					$data = $this->upload->data();
					$send['opsi_e'] = $data['file_name'];
				}
			} else {
				$send['opsi_e'] = $query[0]['opsi_e'];
			}

			//Jawaban opsi f
			if ($_FILES["opsi_f"]["name"] != "" && $_FILES["opsi_f"]["name"] != $query[0]['opsi_f']) {
				$config['upload_path']          = './upload/bank_soal/cfit';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 4000;
				$config['overwrite']             = TRUE;
				// $config['file_name'] ="Jawaban_f_".$send['id_soal'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('opsi_f')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$indexrow['data'] = $this->Mdl_soal->ambildata2($id_update);
					$this->load->view('soal/vedit_cfit', $indexrow);
				} else {
					$target = "./upload/bank_soal/cfit/" . $query[0]['opsi_f'];
					unlink($target);
					$data = $this->upload->data();
					$send['opsi_f'] = $data['file_name'];
				}
			} else {
				$send['opsi_f'] = $query[0]['opsi_f'];
			}
			// var_dump($send);
			$kembalian['jumlah'] = $this->Mdl_soal->modelupdate($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			redirect('Soal/Soal_cfit/');
		}
	}
	// // END CRUD PERUSAHAAN


}
