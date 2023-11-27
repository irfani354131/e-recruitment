<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-envelope color-amber"></em>
				</a></li>
				<li class="active">Tes DISC (Tes Kepribadian)</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tes DISC (Tes Kepribadian)</h1>
			</div>
		</div><!--/.row-->

		<div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;">
			<div class="col-sm-12">
				<h3><b>Konfirmasi Data</b></h3>
				<hr color="black">
			</div>
			<div class="col-md-7 col-sm-12" style="margin-bottom: 5px;">
				<table class="table table-bordered">
				  <tbody>
				    <tr>
				      <td><b>Nama Lengkap</b></td>
				      <td>Dhicky</td>
				    </tr>
				    <tr>
				      <td><b>NIK</b></td>
				      <td>123456789101112</td>
				    </tr>
				    <tr>
				      <td><b>Posisi Dilamar</b></td>
				      <td>Asisten Programmer</td>
				    </tr>
				    <tr>
				      <td><b>Jenis Ujian</b></td>
				      <td>Tes DISC (Tes Kepribadian)</td>
				    </tr>
				    <tr>
				      <td><b>Jumlah Soal</b></td>
				      <td>24 Soal</td>
				    </tr>
				    <tr>
				      <td><b>Waktu Pengerjaan</b></td>
				      <td>15 Menit</td>
				    </tr>
				    <tr>
				      <td><b>Jenis Soal</b></td>
				      <td>Pilihan Ganda</td>
				    </tr>
				    <tr>
				      <td><b>Tanggal Pelaksanaan</b></td>
				      <td>1 Januari 2020</td>
				    </tr>
				  </tbody>
				</table>
			</div>
			<div class="col-md-5 col-sm-12">
				<div style="background-color: #f9243f; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; border-radius: 5px;">
					<h4 style="color: #fff;"><b>Peraturan Ujian!</b></h4>
					<li style="color: #fff;">Pilihlah 1 pernyataan yang PALING sesuai dengan diri Anda SAAT INI (M)</li>
					<li style="color: #fff;">Pilihlah 1 pernyataan yang PALING tidak sesuai dengan Anda SAAT INI (L)</li>
					<li style="color: #fff;">Sehingga dalam 1 soal akan ada 1 pernyataan M dan pernyataan L</li>
				</div>
				<div class="button-lm-tittle">
	                <a href="<?php  echo base_url('Pelamar/Pelamar/discsoal1') ?>" class="btn btn-primary mr-2 mb-2 btn-block">Mulai Ujian</a>
	            </div>
			</div>
		</div>

        </div>
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>