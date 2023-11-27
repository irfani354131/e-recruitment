<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user color-amber"></em>
				</a></li>
				<li class="active">Profil Saya</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Profil Saya</h1>
			</div>
		</div><!--/.row-->

		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h3><b>Data Diri</b></h3>
				<hr color="black">
			</div>
			<div class="col-md-4 col-sm-12" style="margin-bottom: 5px;">
				<img src="<?php  echo base_url('assets3/images/ava.jpg') ?>" alt="" style="width: 275px; height: 275px;">
			</div>
			<div class="col-md-8 col-sm-12">
				<h4><b>Nia Sanchez</b></h4>
				<p style="word-spacing: 5px;"><em class="fa fa-id-card color-amber"></em> 1234567899874563</p>
				<p style="word-spacing: 5px;"><em class="fa fa-calendar color-amber"></em> Nevada, 29 Februari 1995</p>
				<p style="word-spacing: 5px;"><em class="fa fa-user color-amber"></em> Perempuan</p>
				<p style="word-spacing: 5px;"><em class="fa fa-map-marker color-amber"></em> Nevada, Las Vegas</p>
				<p style="word-spacing: 5px;"><em class="fa fa-phone color-amber"></em> 081180081180</p>
				<p style="word-spacing: 5px;"><em class="fa fa-facebook color-amber"></em> Nia Sanchez</p>
				<p style="word-spacing: 5px;"><em class="fa fa-instagram color-amber"></em> niasanchez</p>
				<p style="word-spacing: 5px;"><em class="fa fa-twitter color-amber"></em> @niasanchez</p>
				<div class="col-sm-12" style="text-align: right;">
					<a href="<?php  echo base_url('Home/ubahdatadiri') ?>" class="btn btn-success mr-2 mb-2"><em class="fa fa-pencil color-white"></em> Ubah Data</a>
		        </div>
			</div>
		</div>

		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h3><b>Data Keluarga</b></h3>
				<hr color="black">
			</div>
			<div class="col-sm-12">
				<p><b>Nama Ayah</b></p>
				<p>Cristian Sanchez</p>
				<p><b>Pekerjaan Ayah</b></p>
				<p>Pengusaha</p>
				<p><b>Nama Ibu</b></p>
				<p>Alenxandra Sanchez</p>
				<p><b>Pekerjaan Ibu</b></p>
				<p>Akuntan</p>
				<div class="col-sm-12" style="text-align: right;">
					<a href="<?php  echo base_url('Home/ubahdatakeluarga') ?>" class="btn btn-success mr-2 mb-2"><em class="fa fa-pencil color-white"></em> Ubah Data</a>
					<a href="#" class="btn btn-danger mr-2 mb-2"><em class="fa fa-trash color-white"></em> Hapus Data</a>
		        </div>
			</div>
		</div>

		<div class="col-sm-12" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h3><b>Data Pendidikan</b></h3>
				<hr color="black">
			</div>
			<div class="col-sm-12">
				<h4><b>Pendidikan Formal</b></h4>
				<a href="<?php  echo base_url('Home/tambahpendidikan') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				<table class="table table-bordered" style="margin-top: 10px;">
				  <thead>
				    <tr>
				      <th scope="col"><b>No</b></th>
				      <th scope="col"><b>Jenjang Pendidikan</b></th>
				      <th scope="col"><b>Nama Institusi</b></th>
				      <th scope="col"><b>Jurusan</b></th>
				      <th scope="col"><b>Tanggal Lulus</b></th>
				      <th scope="col"><b>Nilai Akhir</b></th>
				      <th scope="col" colspan="2"><b>Aksi</b></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>SMA/SMK</td>
				      <td>Nevada Highschool</td>
				      <td>IPA</td>
				      <td>31/06/2016</td>
				      <td>489</td>
				      <td><a href="<?php  echo base_url('Home/ubahpendidikan') ?>" class="btn btn-success mr-2 mb-2"><em class="fa fa-pencil color-white"></em> Ubah Data</a></td>
				      <td><a href="#" class="btn btn-danger mr-2 mb-2"><em class="fa fa-trash color-white"></em> Hapus Data</a></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>D3/D4/S1</td>
				      <td>Nevada State University</td>
				      <td>Computer Science</td>
				      <td>28/02/2020</td>
				      <td>3.99</td>
				      <td><a href="<?php  echo base_url('Home/ubahpendidikan') ?>" class="btn btn-success mr-2 mb-2"><em class="fa fa-pencil color-white"></em> Ubah Data</a></td>
				      <td><a href="#" class="btn btn-danger mr-2 mb-2"><em class="fa fa-trash color-white"></em> Hapus Data</a></td>
				    </tr>
				  </tbody>
				</table>
		    </div>
		    <div class="col-sm-12">
				<h4><b>Pendidikan Non Formal</b></h4>
				<a href="<?php  echo base_url('Home/tambahpendidikannonformal') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				<table class="table table-bordered" style="margin-top: 10px;">
				  <thead>
				    <tr>
				      <th scope="col"><b>No</b></th>
				      <th scope="col"><b>Nama Kursus/Pelatihan</b></th>
				      <th scope="col"><b>Tujuan Kursus/Pelatihan</b></th>
				      <th scope="col"><b>Tahun</b></th>
				      <th scope="col" colspan="2"><b>Aksi</b></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Microsoft Office Training</td>
				      <td>Membekali kemampuan Ms Office.</td>
				      <td>2019</td>
				      <td><a href="<?php  echo base_url('Home/ubahpendidikannonformal') ?>" class="btn btn-success mr-2 mb-2"><em class="fa fa-pencil color-white"></em> Ubah Data</a></td>
				      <td><a href="#" class="btn btn-danger mr-2 mb-2"><em class="fa fa-trash color-white"></em> Hapus Data</a></td>
				    </tr>
				  </tbody>
				</table>
		    </div>
		</div>

		<div class="col-sm-12" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h3><b>Data Pengalaman Kerja</b></h3>
				<hr color="black">
			</div>
			<div class="col-sm-12">
				<a href="<?php  echo base_url('Home/tambahdatapengalamankerja') ?>" class="btn btn-blue mr-2 mb-2"><em class="fa fa-plus color-white"></em> Tambah Data</a>
				<table class="table table-bordered" style="margin-top: 10px;">
				  <thead>
				    <tr>
				      <th scope="col"><b>No</b></th>
				      <th scope="col"><b>Nama Perusahaan</b></th>
				      <th scope="col"><b>Lama Bekerja (Dalam Tahun)</b></th>
				      <th scope="col"><b>Jabatan Terakhir</b></th>
				      <th scope="col"><b>Alasan Keluar</b></th>
				      <th scope="col" colspan="2"><b>Aksi</b></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Google</td>
				      <td>10</td>
				      <td>UI/UX Designer</td>
				      <td>Pindah rumah.</td>
				      <td><a href="<?php  echo base_url('Home/ubahdatapengalamankerja') ?>" class="btn btn-success mr-2 mb-2"><em class="fa fa-pencil color-white"></em> Ubah Data</a></td>
				      <td><a href="#" class="btn btn-danger mr-2 mb-2"><em class="fa fa-trash color-white"></em> Hapus Data</a></td>
				    </tr>
				  </tbody>
				</table>
		    </div>
		</div>

		<div class="col-sm-12">
			<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
		</div>

	</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>