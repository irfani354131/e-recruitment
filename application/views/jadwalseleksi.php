<?php   $this->load->view('layout3/header') ?>
<?php   $this->load->view('layout3/navbar') ?>
<?php   $this->load->view('layout3/sidebar') ?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-envelope color-amber"></em>
			</a></li>
			<li class="active">Jadwal Seleksi</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Jadwal Seleksi</h1>
		</div>
	</div><!--/.row-->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Tahapan Seleksi</th>
				<th scope="col">Tanggal Pelaksanaan</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			foreach ($array as $key) {
				$tes_tulis = $key['tes_tulis'];
				$tes_wawancara = $key['tes_wawancara'];
				$test_fgd = $key['test_fgd']; 
				?>

				<tr>
					<th scope="row">1</th>
					<td>Tes Tulis</td>
					<td><?php echo  date('d F Y', strtotime($tes_tulis)) ?></td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Tes Wawancara</td>
					<td><?php echo  date('d F Y', strtotime($tes_wawancara)) ?></td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Forum Group Discussion (FGD)</td>
					<td><?php echo  date('d F Y', strtotime($test_fgd)) ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

</div><!--/.row-->
</div>	<!--/.main-->

<?php   $this->load->view('layout3/footer') ?>