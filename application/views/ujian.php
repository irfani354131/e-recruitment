<?php
$this->load->view('layout3/header');
$this->load->view('layout3/navbar');
$this->load->view('layout3/sidebar');
?>

<?php
$query = $this->db->query("SELECT * FROM tb_ujian WHERE `status`='aktif'")->result();
$disc = $this->db->query("SELECT * FROM tb_ujian_disc WHERE `status`='aktif'")->result();
$essay = $this->db->query("SELECT * FROM tb_ujian_essay WHERE `status`='aktif'")->result();
$hitung = $this->db->query("SELECT * FROM tb_ujian_hitung WHERE `status`='aktif'")->result();
$holland = $this->db->query("SELECT * FROM tb_ujian_holland WHERE `status`='aktif'")->result();
$ist = $this->db->query("SELECT * FROM tb_ujian_ist WHERE `status`='aktif'")->result();
$kasus = $this->db->query("SELECT * FROM tb_ujian_kasus WHERE `status`='aktif'")->result();
$kasus_manager = $this->db->query("SELECT * FROM tb_ujian_kasus_manajerial WHERE `status`='aktif'")->result();
$leadership = $this->db->query("SELECT * FROM tb_ujian_leadership WHERE `status`='aktif'")->result();
$msdt = $this->db->query("SELECT * FROM tb_ujian_msdt WHERE `status`='aktif'")->result();
$papi = $this->db->query("SELECT * FROM tb_ujian_papi WHERE `status`='aktif'")->result();
$rmibL = $this->db->query("SELECT * FROM tb_ujian_rmib_pria WHERE `status`='aktif'")->result();
$rmibP = $this->db->query("SELECT * FROM tb_ujian_rmib_wanita WHERE `status`='aktif'")->result();
$studibank = $this->db->query("SELECT * FROM tb_ujian_studibank WHERE `status`='aktif'")->result();
$talent = $this->db->query("SELECT * FROM tb_ujian_talent WHERE `status`='aktif'")->result();
$inggris = $this->db->query("SELECT * FROM tb_ujian_inggris WHERE `status`='aktif'")->result();
$tkb_acc = $this->db->query("SELECT * FROM tb_ujian_tkb_accountingstaff WHERE `status`='aktif'")->result();
$tkb_buss = $this->db->query("SELECT * FROM tb_ujian_tkb_bussinessdevelopmentstaff WHERE `status`='aktif'")->result();
$tkb_pro = $this->db->query("SELECT * FROM tb_ujian_tkb_projectadministrationstaff WHERE `status`='aktif'")->result();
$tkb_train = $this->db->query("SELECT * FROM tb_ujian_tkb_trainingoperationstaff WHERE `status`='aktif'")->result();
$tkb_front = $this->db->query("SELECT * FROM tb_ujian_tkb_frontlinerstaff WHERE `status`='aktif'")->result();
$tpa_kuanti = $this->db->query("SELECT * FROM tb_ujian_tpa_kuantitatif WHERE `status`='aktif'")->result();
$tpa_pena = $this->db->query("SELECT * FROM tb_ujian_tpa_penalaran WHERE `status`='aktif'")->result();
$tpa_ver = $this->db->query("SELECT * FROM tb_ujian_tpa_verbal WHERE `status`='aktif'")->result();
$kontrak_psikologis = $this->db->query("SELECT * FROM tb_ujian_kontrak_psikologis WHERE `status`='aktif'")->result();
$belbin = $this->db->query("SELECT * FROM tb_ujian_belbin WHERE `status`='aktif'")->result();
$epps = $this->db->query("SELECT * FROM tb_ujian_epps WHERE `status`='aktif'")->result();

if (
	empty($query) &&
	empty($disc) &&
	empty($essay) &&
	empty($hitung) &&
	empty($holland) &&
	empty($ist) &&
	empty($kasus) &&
	empty($kasus_manager) &&
	empty($leadership) &&
	empty($msdt) &&
	empty($papi) &&
	empty($rmibL) &&
	empty($rmibP) &&
	empty($studibank) &&
	empty($talent) &&
	empty($inggris) &&
	empty($tpa_kuanti) &&
	empty($tpa_pena) &&
	empty($tpa_ver) &&
	empty($tkb_acc) &&
	empty($tkb_buss) &&
	empty($tkb_pro) &&
	empty($tkb_train) &&
	empty($tkb_front) &&
	empty($kontrak_psikologis) &&
	empty($belbin) &&
	empty($epps)
) {
	// echo "Data Kosong";
	$cek = "";
} else {
	// echo "Data Ada";
	$cek = "Ada";
}

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-envelope color-amber"></em>
				</a></li>
			<li class="active">Ujian Saya</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Ujian Saya</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="card text-center" style="background-color: #fff; padding: 20px; border-radius: 5px;">
		<div class="card-body">
			<h4 class="card-title"><b>Tes Tulis dan Psikotes</b></h4>
			<?php
			if ($cek == "") { ?>
				<p class="card-text">Ujian Dalam Persiapan, Silahkan Tunggu & Check Secara Berkala!</p>
				<a href="<?php echo base_url('Pelamar/Lamaran/lamaransaya') ?>" class="btn btn-primary button-uj-tittle">Kembali</a>
			<?php } else {
			?>
				<p class="card-text">Kerjakan Sesuai Dengan Waktu Yang Telah Ditentukan!</p>
				<a href="<?php echo base_url('Pelamar/Pelamar/testulispsikotes') ?>" class="btn btn-primary button-uj-tittle">Kerjakan Sekarang</a>
			<?php }
			?>
		</div>
	</div>
	<br>
	<!--/.row-->
</div>
<!--/.main-->

<?php $this->load->view('layout3/footer') ?>