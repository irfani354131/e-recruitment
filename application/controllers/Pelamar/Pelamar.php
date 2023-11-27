<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Pelamar extends CI_Controller
{



	public function __construct() //MEMPERSIAPKAN

	{

		parent::__construct();

		$this->load->helper('url', 'form');

		$this->load->helper('download');

		$this->load->model('Mdl_home');

		$this->load->model('Mdl_data_pelamar');

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



	public function Dashboard()

	{

		$this->load->view('dasbor');
	}



	public function uploadImage($idUpload)

	{

		$id_pelamar = $this->session->userdata('ses_id');



		$send['id_pelamar'] = $this->input->post('id_pelamar');



		if ($_FILES["foto"]["name"] != "") {

			$config['upload_path']          = './upload/foto_pelamar/';

			$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';

			$config['max_size']             = 4000;

			$config['file_name'] = "pelamar_" . md5($id_pelamar);



			$this->load->library('upload', $config);



			//soal 

			if (!$this->upload->do_upload('foto')) {

				$error = $this->upload->display_errors();

				$this->session->set_flashdata('pesan_error', $error);

				$this->load->view('pengumuman');
			} else {

				$data = $this->upload->data();

				$send['foto'] = $data['file_name'];
			}
		}

		$kembalian['jumlah'] = $this->Mdl_data_pelamar->uploadImage($send);

		$this->load->view('pengaturan', $kembalian);

		$this->session->set_flashdata('msg', 'Foto Berhasil Diubah!!!');

		redirect('Pelamar/Pelamar/pengaturan');
	}





	public function uploadDocKTP()
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = "ktp";
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='ktp'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES["ktp"]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = "ktp_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload('ktp')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas KTP berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}
	public function uploadDocFOTO()
	{
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = "foto";
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='foto'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES["foto"]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = "foto_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload('foto')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas Foto berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}
	public function uploadDocIJASAH()
	{
		$a = "ijasah";
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = $a;
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='$a'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES[$a]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = $a . "_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload($a)) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas Ijasah berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}
	public function uploadDocTRANSKIP()
	{
		$a = "transkip";
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = $a;
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='$a'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES[$a]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = $a . "_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload($a)) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas Ijasah berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}
	public function uploadDocSERTIFIKAT()
	{
		$a = "sertifikat";
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = $a;
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='$a'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES[$a]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = $a . "_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload($a)) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas Ijasah berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}
	public function uploadDocREFERENSI()
	{
		$a = "referensi";
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = $a;
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='$a'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES[$a]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = $a . "_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload($a)) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas Ijasah berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}
	public function uploadDocBERKASCHAAKRA()
	{
		$a = "berkaschaakra";
		$id_pelamar = $this->session->userdata('ses_id');
		$send['id_pelamar'] = $this->input->post('id_pelamar');
		$send['kategori'] = $a;
		$dataDiri = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		$query = $this->db->query("SELECT * FROM tb_berkas WHERE id_pelamar = $id_pelamar and kategori='$a'");
		$query3 = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $id_pelamar");
		foreach ($query3->result() as $key_name) {
			if ($key_name->id_pelamar == $id_pelamar) {
				$nama = $key_name->nama_pelamar;
			}
		}
		if ($dataDiri->num_rows() < 1) {
			echo '<script language="javascript"> alert("Silahkan isi data diri terlebih dahulu");document.location.href = "../../Pelamar/Pelamar/profilawal";</script>';
		} else {
			if ($_FILES[$a]["name"] != "") {
				$config['upload_path']          = './upload/berkas_pelamar/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 40000;
				$config['file_name'] = $a . "_" . $nama;
				$this->load->library('upload', $config);
				//soal 
				if (!$this->upload->do_upload($a)) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('pesan_error', $error);
					$this->load->view('uploadberkas');
				} elseif ($query->num_rows() > 0) {
					// $target= "./upload/berkas_pelamar/".$query2[0]['berkas'];
					// unlink($target);
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				} else {
					$data = $this->upload->data();
					$send['berkas'] = $data['file_name'];
				}
			}
			if ($query->num_rows() > 0) {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->updateBerkas($send);
			} else {
				$kembalian['jumlah'] = $this->Mdl_data_pelamar->inputBerkas($send);
			}
			$this->load->view('uploadberkas', $kembalian);
			$this->session->set_flashdata('msg', 'Berkas Ijasah berhasil diunggah!!!');
			redirect('Pelamar/Pelamar/uploadberkas');
		}
	}

	public function mergepdf()
	{
		$fileArray = array("foto_User_Chaakra_Consulting.pdf", "ijasah_User_Chaakra_Consulting.pdf");

		$datadir = "./upload/berkas_pelamar/";
		$outputName = $datadir . "merged.pdf";

		$cmd = "gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=$outputName ";
		//Add each pdf file to the end of the command
		foreach ($fileArray as $file) {
			$cmd .= $file . " ";
		}
		shell_exec($cmd);
	}


	public function profilawal()

	{

		$this->load->view('profilawal');
	}



	public function profil()

	{

		$this->load->view('profil');
	}



	public function tambahdatadiri()

	{

		$this->form_validation->set_rules('nik', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nama_pelamar', 'Nama', 'trim|required');

		$this->form_validation->set_rules('alamat', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tempat_lahir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tgl_lahir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('alamat_ktp', 'Nama', 'trim|required');

		$this->form_validation->set_rules('status_perkawinan', 'Nama', 'trim|required');

		$this->form_validation->set_rules('agama', 'Nama', 'trim|required');

		$this->form_validation->set_rules('anak_ke', 'Nama', 'trim|required');

		$this->form_validation->set_rules('dari_x_sdr', 'Nama', 'trim|required');

		$this->form_validation->set_rules('gender', 'Nama', 'trim|required');

		$this->form_validation->set_rules('no_hp', 'Nama', 'trim|required');

		$this->form_validation->set_rules('facebook', 'Nama', 'trim|required');

		$this->form_validation->set_rules('instagram', 'Nama', 'trim|required');

		$this->form_validation->set_rules('twitter', 'Nama', 'trim|required');

		$this->form_validation->set_rules('linkedin', 'Nama', 'trim|required');



		$id_pelamar = $this->input->post('id_pelamar');





		if ($this->form_validation->run() == FALSE) {

			$data['msg_error'] = "Silahkan isi semua kolom";

			$this->load->view('tambahdatadiri', $data);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nik'] = $this->input->post('nik');

			$send['nama_pelamar'] = $this->input->post('nama_pelamar');

			$send['alamat'] = $this->input->post('alamat');

			$send['tempat_lahir'] = $this->input->post('tempat_lahir');

			$send['tanggal_lahir'] = $this->input->post('tgl_lahir');

			$send['alamat_ktp'] = $this->input->post('alamat_ktp');

			$send['status_perkawinan'] = $this->input->post('status_perkawinan');

			$send['agama'] = $this->input->post('agama');

			$send['anak_ke'] = $this->input->post('anak_ke');

			$send['dari_x_sdr'] = $this->input->post('dari_x_sdr');

			$send['jenis_kelamin'] = $this->input->post('gender');

			$send['no_hp'] = $this->input->post('no_hp');

			$send['facebook'] = $this->input->post('facebook');

			$send['instagram'] = $this->input->post('instagram');

			$send['twitter'] = $this->input->post('twitter');

			$send['linkedin'] = $this->input->post('linkedin');



			$nikPel = $this->input->post('nik');



			$query_data_diri = $this->db->query("SELECT * FROM tb_data_diri WHERE nik = $nikPel");

			if ($query_data_diri->num_rows() > 0) {

				echo '<script language="javascript"> alert("NIK sudah terdaftar");document.location.href = "./Pelamar/Pelamar/tambahdatadiri";</script>';
			}

			$kembalian['jumlah'] = $this->Mdl_home->isi_data_diri($send);



			$this->load->view('profilawal', $kembalian);

			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

			redirect('Pelamar/Pelamar/profilawal/');
		}
	}



	public function tambahdatakeluarga()

	{

		$this->form_validation->set_rules('nama_ayah', 'Nama', 'trim|required');

		$this->form_validation->set_rules('pekerjaan_ayah', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nama_ibu', 'Nama', 'trim|required');

		$this->form_validation->set_rules('pekerjaan_ibu', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$data['msg_error'] = "Silahkan isi semua kolom";

			$this->load->view('tambahdatakeluarga', $data);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_ayah'] = $this->input->post('nama_ayah');

			$send['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');

			$send['nama_ibu'] = $this->input->post('nama_ibu');

			$send['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');

			$send['nama_pasangan'] = $this->input->post('nama_pasangan');

			$send['pekerjaan_pasangan'] = $this->input->post('pekerjaan_pasangan');

			$kembalian['jumlah'] = $this->Mdl_home->isi_data_keluarga($send);



			$this->load->view('profilawal', $kembalian);

			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

			redirect('Pelamar/Pelamar/profilawal/');
		}
	}



	public function tambahpendidikan()

	{

		$this->form_validation->set_rules('nama_institusi', 'Nama', 'trim|required');

		$this->form_validation->set_rules('jurusan', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nilai_akhir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tahun_masuk', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tahun_keluar', 'Nama', 'trim|required');

		$jenjang = $this->input->post('jenjang_pendidikan');



		if ($this->form_validation->run() == FALSE || $jenjang == "") {

			$data['msg_error'] = "Silahkan isi semua kolom";

			$this->load->view('tambahpendidikan', $data);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_institusi'] = $this->input->post('nama_institusi');

			$send['jenjang_pendidikan'] = $this->input->post('jenjang_pendidikan');

			$send['jurusan'] = $this->input->post('jurusan');

			$send['nilai_akhir'] = $this->input->post('nilai_akhir');

			$send['tahun_masuk'] = $this->input->post('tahun_masuk');

			$send['tahun_keluar'] = $this->input->post('tahun_keluar');



			$kembalian['jumlah'] = $this->Mdl_home->isi_data_pendidikan($send);



			$this->load->view('profilawal', $kembalian);

			$this->session->set_flashdata('msg', 'Data Pendidikan Berhasil Ditambahkan!!!');

			redirect('Pelamar/Pelamar/profilawal/');
		}
	}



	public function tambahpendidikannonformal()

	{

		$this->form_validation->set_rules('nama_pendidikan_nonformal', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tujuan_pendidikan_nonformal', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tahun_pendidikan_nonformal', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$data['msg_error'] = "Silahkan isi semua kolom";

			$this->load->view('tambahpendidikannonformal', $data);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_pendidikan_nonformal'] = $this->input->post('nama_pendidikan_nonformal');

			$send['tujuan_pendidikan_nonformal'] = $this->input->post('tujuan_pendidikan_nonformal');

			$send['nomor_sertifikat'] = $this->input->post('nomor_sertifikat');

			$send['tahun_pendidikan_nonformal'] = $this->input->post('tahun_pendidikan_nonformal');



			$kembalian['jumlah'] = $this->Mdl_home->isi_data_pendidikan_nonformal($send);



			$this->load->view('profilawal', $kembalian);

			$this->session->set_flashdata('msg', 'Data Pendidikan Non Formal Berhasil Ditambahkan!!!');

			redirect('Pelamar/Pelamar/profilawal/');
		}
	}



	public function hapus_pendidikan($id)
	{

		$where = array('id_pendidikan' => $id);

		$this->Mdl_home->do_delete($where, 'tb_data_pendidikan');

		$this->session->set_flashdata('msg_hapus', 'Data Pendidikan Berhasil dihapus');

		redirect('Pelamar/Pelamar/profilawal');
	}



	public function hapus_pendidikan_nonformal($id)
	{

		$where = array('id_pendidikan_nonformal' => $id);

		$this->Mdl_home->do_delete($where, 'tb_data_pendidikan_nonformal');

		$this->session->set_flashdata('msg_hapus', 'Data Pendidikan Non Formal Berhasil dihapus');

		redirect('Pelamar/Pelamar/profilawal');
	}



	public function ubahpendidikan($id_update)

	{

		$this->form_validation->set_rules('nama_institusi', 'Nama', 'trim|required');

		$this->form_validation->set_rules('jurusan', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nilai_akhir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tahun_masuk', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tahun_keluar', 'Nama', 'trim|required');

		$jenjang = $this->input->post('jenjang_pendidikan');



		if ($this->form_validation->run() == FALSE || $jenjang = "") {

			$indexrow['data'] = $this->Mdl_home->ambildata_pendidikan2($id_update);

			$this->load->view('ubahpendidikan', $indexrow);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['id_pendidikan'] = $this->input->post('id_pendidikan');

			$send['nama_institusi'] = $this->input->post('nama_institusi');

			$send['jenjang_pendidikan'] = $this->input->post('jenjang_pendidikan');

			$send['jurusan'] = $this->input->post('jurusan');

			$send['nilai_akhir'] = $this->input->post('nilai_akhir');

			$send['tahun_masuk'] = $this->input->post('tahun_masuk');

			$send['tahun_keluar'] = $this->input->post('tahun_keluar');



			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_home->modelupdate_pendidikan($send);

			$this->session->set_flashdata('msg_update', 'Data Pendidikan Berhasil diupdate');

			redirect('Pelamar/Pelamar/profilawal');
		}
	}



	public function ubahpendidikannonformal($id_update)

	{

		$this->form_validation->set_rules('nama_pendidikan_nonformal', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tujuan_pendidikan_nonformal', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tahun_pendidikan_nonformal', 'Nama', 'trim|required');

		$nama_pendidikan_nonformal = $this->input->post('nama_pendidikan_nonformal');



		if ($this->form_validation->run() == FALSE || $nama_pendidikan_nonformal = "") {

			$indexrow['data'] = $this->Mdl_home->ambildata_pendidikan_nonformal2($id_update);

			$this->load->view('ubahpendidikannonformal', $indexrow);
		} else {

			$send['id_pendidikan_nonformal'] = $this->input->post('id_pendidikan_non');

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_pendidikan_nonformal'] = $this->input->post('nama_pendidikan_nonformal');

			$send['tujuan_pendidikan_nonformal'] = $this->input->post('tujuan_pendidikan_nonformal');

			$send['nomor_sertifikat'] = $this->input->post('nomor_sertifikat');

			$send['tahun_pendidikan_nonformal'] = $this->input->post('tahun_pendidikan_nonformal');



			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_home->modelupdate_pendidikan_nonformal($send);

			$this->session->set_flashdata('msg_update', 'Data Pendidikan Non Formal Berhasil Diupdate');

			redirect('Pelamar/Pelamar/profilawal');
		}
	}



	public function editProfile($id_update)

	{

		$id_pelamar = $this->session->userdata('ses_id');

		$cekPassword = $this->db->query("SELECT * FROM tb_pelamar where id_pelamar = $id_pelamar");

		foreach ($cekPassword->result() as $keyPass) {

			$passLama = $keyPass->password;
		}



		$passNow = md5($this->input->post('passOld'));



		if ($passNow != $passLama) {

			$message = "Password lama tidak sama";

			echo "<script type='text/javascript'>alert('$message'); history.go(-1);</script>";

			$this->load->view('pengaturan');
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['username'] = $this->input->post('username');

			$send['password'] = md5($this->input->post('passNew'));

			$send['confirm_password'] = $this->input->post('confirmPass');



			$kembalian['jumlah'] = $this->Mdl_data_pelamar->modelupdate_profile($send);

			$this->session->set_flashdata('msg_update', 'Username dan password berhasil diupdate');

			redirect('Pelamar/Pelamar/pengaturan');
		}
	}



	public function tambahdatapengalamankerja()

	{

		$this->form_validation->set_rules('nama_perusahaan', 'Nama', 'trim|required');

		$this->form_validation->set_rules('periode', 'Nama', 'trim|required');

		$this->form_validation->set_rules('jabatan_akhir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('alasan_keluar', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nama_referensi', 'Nama', 'trim|required');

		$this->form_validation->set_rules('no_hp_referensi', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$data['msg_error'] = "Silahkan isi semua kolom";

			$this->load->view('tambahdatapengalamankerja', $data);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_perusahaan'] = $this->input->post('nama_perusahaan');

			$send['periode'] = $this->input->post('periode');

			$send['jabatan_akhir'] = $this->input->post('jabatan_akhir');

			$send['alasan_keluar'] = $this->input->post('alasan_keluar');

			$send['nama_referensi'] = $this->input->post('nama_referensi');

			$send['no_hp_referensi'] = $this->input->post('no_hp_referensi');

			$kembalian['jumlah'] = $this->Mdl_home->isi_data_pengalaman($send);

			$this->load->view('profilawal', $kembalian);

			$this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan!!!');

			redirect('Pelamar/Pelamar/profilawal/');
		}
	}



	public function ubahdatadiri($id_update)

	{

		$this->form_validation->set_rules('nik', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nama_pelamar', 'Nama', 'trim|required');

		$this->form_validation->set_rules('alamat', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tempat_lahir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('tgl_lahir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('alamat_ktp', 'Nama', 'trim|required');

		$this->form_validation->set_rules('status_perkawinan', 'Nama', 'trim|required');

		$this->form_validation->set_rules('agama', 'Nama', 'trim|required');

		$this->form_validation->set_rules('anak_ke', 'Nama', 'trim|required');

		$this->form_validation->set_rules('dari_x_sdr', 'Nama', 'trim|required');

		// $this->form_validation->set_rules('gender','Nama','trim|required');

		$this->form_validation->set_rules('no_hp', 'Nama', 'trim|required');

		$this->form_validation->set_rules('facebook', 'Nama', 'trim|required');

		$this->form_validation->set_rules('instagram', 'Nama', 'trim|required');

		$this->form_validation->set_rules('twitter', 'Nama', 'trim|required');

		$this->form_validation->set_rules('linkedin', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$indexrow['data'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_update);

			$this->load->view('ubahdatadiri', $indexrow);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nik'] = $this->input->post('nik');

			$send['nama_pelamar'] = $this->input->post('nama_pelamar');

			$send['alamat'] = $this->input->post('alamat');

			$send['tempat_lahir'] = $this->input->post('tempat_lahir');

			$send['tanggal_lahir'] = $this->input->post('tgl_lahir');

			$send['jenis_kelamin'] = $this->input->post('gender');

			$send['alamat_ktp'] = $this->input->post('alamat_ktp');

			$send['status_perkawinan'] = $this->input->post('status_perkawinan');

			$send['agama'] = $this->input->post('agama');

			$send['anak_ke'] = $this->input->post('anak_ke');

			$send['dari_x_sdr'] = $this->input->post('dari_x_sdr');

			$send['no_hp'] = $this->input->post('no_hp');

			$send['facebook'] = $this->input->post('facebook');

			$send['instagram'] = $this->input->post('instagram');

			$send['twitter'] = $this->input->post('twitter');

			$send['linkedin'] = $this->input->post('linkedin');

			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_data_pelamar->modelupdate($send);

			$this->session->set_flashdata('msg_update', 'Data Diri Berhasil diupdate');

			redirect('Pelamar/Pelamar/profilawal');
		}
	}



	public function ubahdatakeluarga($id_update)

	{

		$this->form_validation->set_rules('nama_ayah', 'Nama', 'trim|required');

		$this->form_validation->set_rules('pekerjaan_ayah', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nama_ibu', 'Nama', 'trim|required');

		$this->form_validation->set_rules('pekerjaan_ibu', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$indexrow['data'] = $this->Mdl_home->ambil_data_keluarga($id_update);

			$this->load->view('ubahdatakeluarga', $indexrow);
		} else {

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_ayah'] = $this->input->post('nama_ayah');

			$send['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');

			$send['nama_ibu'] = $this->input->post('nama_ibu');

			$send['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');

			$send['nama_pasangan'] = $this->input->post('nama_pasangan');

			$send['pekerjaan_pasangan'] = $this->input->post('pekerjaan_pasangan');

			// var_dump($send);

			$kembalian['jumlah'] = $this->Mdl_home->modelupdate_keluarga($send);

			$this->session->set_flashdata('msg_update', 'Data Diri Berhasil diupdate');

			redirect('Pelamar/Pelamar/profilawal');
		}
	}



	public function ubahdatapengalamankerja($id_update)

	{

		$this->form_validation->set_rules('nama_perusahaan', 'Nama', 'trim|required');

		$this->form_validation->set_rules('periode', 'Nama', 'trim|required');

		$this->form_validation->set_rules('jabatan_akhir', 'Nama', 'trim|required');

		$this->form_validation->set_rules('alasan_keluar', 'Nama', 'trim|required');

		$this->form_validation->set_rules('nama_referensi', 'Nama', 'trim|required');

		$this->form_validation->set_rules('no_hp_referensi', 'Nama', 'trim|required');



		if ($this->form_validation->run() == FALSE) {

			$indexrow['data'] = $this->Mdl_home->ambil_data_pengalaman($id_update);

			$this->load->view('ubahdatapengalamankerja', $indexrow);
		} else {

			// var_dump($send);



			$send['id_pengalaman'] = $this->input->post('id_pengalaman');

			$send['id_pelamar'] = $this->input->post('id_pelamar');

			$send['nama_perusahaan'] = $this->input->post('nama_perusahaan');

			$send['periode'] = $this->input->post('periode');

			$send['jabatan_akhir'] = $this->input->post('jabatan_akhir');

			$send['alasan_keluar'] = $this->input->post('alasan_keluar');

			$send['nama_referensi'] = $this->input->post('nama_referensi');

			$send['no_hp_referensi'] = $this->input->post('no_hp_referensi');

			$kembalian['jumlah'] = $this->Mdl_home->modelupdate_pengalaman($send);

			$this->session->set_flashdata('msg_update', 'Data Pengalaman Berhasil diupdate');

			redirect('Pelamar/Pelamar/profilawal');
		}
	}



	public function hapus_pengalaman($id)
	{

		$where = array('id_pengalaman' => $id);

		$this->Mdl_home->do_delete($where, 'tb_data_pengalaman_kerja');

		$this->session->set_flashdata('msg_hapus', 'Data Pengalaman Berhasil dihapus');

		redirect('Pelamar/Pelamar/profilawal');
	}



	public function ujian($id_lowongan)

	{

		$this->session->set_userdata('sesIdLowongan', $id_lowongan);

		$this->load->view('ujian');
	}

	public function disc()

	{

		$this->load->view('disc');
	}

	public function discsoal1()

	{

		$this->load->view('discsoal1');
	}

	public function discsoal2()

	{

		$this->load->view('discsoal2');
	}

	public function discsoal24()

	{

		$this->load->view('discsoal24');
	}

	public function testulispsikotes()

	{

		$paket['array'] = $this->Mdl_data_ujian->ambildata_ujian();

		$paket['holland'] = $this->Mdl_data_ujian->ambildata_ujian_holland();

		$paket['ist'] = $this->Mdl_data_ujian->ambildata_ujian_ist();

		$paket['essay'] = $this->Mdl_data_ujian->ambildata_ujian_essay();

		$paket['leader'] = $this->Mdl_data_ujian->ambildata_ujian_leader();

		$paket['studi'] = $this->Mdl_data_ujian->ambildata_ujian_studi();

		$paket['studi_manajerial'] = $this->Mdl_data_ujian->ambildata_ujian_studi_manajerial();

		$paket['studi_ldg'] = $this->Mdl_data_ujian->ambildata_ujian_studi_ldg();

		$paket['hitung'] = $this->Mdl_data_ujian->ambildata_ujian_hitung();

		$paket['papi'] = $this->Mdl_data_ujian->ambildata_ujian_papi();

		$paket['msdt'] = $this->Mdl_data_ujian->ambildata_ujian_msdt();

		$paket['disc'] = $this->Mdl_data_ujian->ambildata_ujian_disc();

		$paket['talent'] = $this->Mdl_data_ujian->ambildata_ujian_talent();

		$paket['studibank'] = $this->Mdl_data_ujian->ambildata_ujian_studibank();

		$paket['rmib_pria'] = $this->Mdl_data_ujian->ambildata_ujian_rmib_pria();

		$paket['rmib_wanita'] = $this->Mdl_data_ujian->ambildata_ujian_rmib_wanita();

		$paket['belbin'] = $this->Mdl_data_ujian->ambildata_ujian_belbin();

		$paket['grafis'] = $this->Mdl_data_ujian->ambildata_ujian_grafis();

		$paket['grafis2'] = $this->Mdl_data_ujian->ambildata_ujian_grafis2();

		$this->load->view('testulispsikotes', $paket);
	}

	public function cfit($id_pelamar, $id_ujian)

	{

		$idUjian = $this->session->set_userdata('ses_ujian', $id_ujian);

		$paket['array'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_pelamar);

		$paket['arrayU'] = $this->Mdl_data_ujian->ambildata_ujian2($id_ujian);

		$this->load->view('cfit', $paket);
	}

	public function latihancfit1()

	{

		$this->load->view('latihancfit1');
	}



	public function jawabancontoh()

	{

		$this->load->view('jawabancontoh');
	}

	public function ist($id_pelamar, $id_ujian)
	{
		$idUjian = $this->session->set_userdata('ses_ujian', $id_ujian);
		$paket['ist'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_pelamar);
		$paket['istU'] = $this->Mdl_data_ujian->ambildata_ujian_ist($id_ujian);
		$this->load->view('ist', $paket);
	}

	public function latihanist1()
	{
		$idUjian = $this->session->userdata('ses_ujian');

		$paket['ujian_ist'] = $this->Mdl_data_ujian->ambildata_ujian_ist($idUjian);
		$this->load->view('latihanist1', $paket);
	}

	public function jawabancontoh_ist()
	{
		$jawaban1 = $this->input->post('jawaban_latihan');
		$jawaban2 = $this->input->post('jawaban_latihan2');

		$this->session->set_userdata('ses_jawab1', $jawaban1);
		$this->session->set_userdata('ses_jawab2', $jawaban2);
		$this->load->view('jawabancontoh_ist');
	}
	
	
	public function belbin($id_pelamar, $id_ujian)

	{

		$idUjian = $this->session->set_userdata('ses_ujian', $id_ujian);

		$paket['belbin'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_pelamar);

		$paket['belbinU'] = $this->Mdl_data_ujian->ambildata_ujian_belbin($id_ujian);

		$this->load->view('belbin', $paket);
	}

	public function grafis($id_pelamar, $id_ujian)

	{

		$idUjian = $this->session->set_userdata('ses_ujian', $id_ujian);

		$paket['grafis'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_pelamar);

		$paket['grafisU'] = $this->Mdl_data_ujian->ambildata_ujian_grafis($id_ujian);

		$this->load->view('grafis', $paket);
	}
	public function grafis2($id_pelamar, $id_ujian)

	{

		$idUjian = $this->session->set_userdata('ses_ujian', $id_ujian);

		$paket['grafis2'] = $this->Mdl_data_pelamar->ambildata_pelamar($id_pelamar);

		$paket['grafisU'] = $this->Mdl_data_ujian->ambildata_ujian_grafis2($id_ujian);

		$this->load->view('grafis2', $paket);
	}

	public function pengaturan()

	{

		$this->load->view('pengaturan');
	}



	public function uploadberkas()

	{

		$this->load->view('uploadberkas');
	}



	public function vdownload_doc()

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



		$this->load->view('vdownload_doc');
	}



	// public function download_doc_esay()

	// {

	// 	force_download('upload/dokumen/ESSAY_KOMPETENSI_TEKNO_ITS.pdf');

	// }





}
