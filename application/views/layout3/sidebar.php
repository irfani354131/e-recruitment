<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

	<div class="profile-sidebar">

		<div class="profile-userpic">

			<?php

			$id_pelamar = $this->session->userdata('ses_id');

			$image = $this->db->query("SELECT * FROM tb_pelamar WHERE id_pelamar = $id_pelamar");

			foreach ($image->result() as $key_user) {

				$imageUser = $key_user->foto;

			} ?>

			<img src="<?php echo ($imageUser != '' ? base_url('./upload/foto_pelamar/' . $imageUser) : base_url('./upload/foto_pelamar/default.png')); ?>" class="img-responsive" alt="">

		</div>



		<?php

		$ses_id = $this->session->userdata('ses_id');

		$ses_user = $this->session->userdata('ses_user');

		$pelamar = $this->db->query("SELECT * FROM tb_data_diri WHERE id_pelamar = $ses_id");

		if ($pelamar->num_rows() > 0) {

			foreach ($pelamar->result() as $key) {

				$nama_pelamar = $key->nama_pelamar;

			}

		} else {

			$nama_pelamar = $ses_user;

		}



		?>

		<div class="profile-usertitle">

			<div class="profile-usertitle-name"><?php echo $nama_pelamar ?></div>

			<div class="profile-usertitle-status"><?php echo $this->session->userdata('ses_idLevel') ?></div>

		</div>

		<div class="clear"></div>

	</div>

	<div class="divider"></div>

	<ul class="nav menu">

		<li class="<?php if ($this->uri->segment(3) == "Dashboard") {

						echo "active";

					} ?>"><a href="<?php echo base_url('Pelamar/Pelamar/Dashboard') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dasbor</a></li>

		<li class="<?php if ($this->uri->segment(3) == "profilawal" || $this->uri->segment(3) == "tambahdatadiri" || $this->uri->segment(3) == "tambahdatakeluarga") {

						echo "active";

					} ?>"><a href="<?php echo base_url('Pelamar/Pelamar/profilawal') ?>"><em class="fa fa-user">&nbsp;</em> Profil Saya</a></li>
<li class="<?php if ($this->uri->segment(3) == "lowongantersedia") {

						echo "active";

					} ?>"><a href="<?php echo base_url('Pelamar/Lamaran/lowongantersedia') ?>"><em class="fa fa-suitcase">&nbsp;</em> Lowongan Tersedia</a></li>

		<li class="<?php if ($this->uri->segment(3) == "vdownload_doc") {

						echo "active";

					} ?>"><a href="<?php echo base_url('Pelamar/Pelamar/vdownload_doc') ?>"><em class="fa fa-file">&nbsp;</em> Download Dokumen</a></li>

		<li class="<?php if ($this->uri->segment(3) == "uploadberkas") {

						echo "active";

					} ?>"><a href="<?php echo base_url('Pelamar/Pelamar/uploadberkas') ?>"><em class="fa fa-paperclip">&nbsp;</em> Upload Berkas</a></li>


	</ul>

</div>

<!--/.sidebar-->