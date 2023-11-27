<!DOCTYPE html>
<html lang="en">
<head>
	<title>Masuk</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets2/login/images/icons/favicon.ico') ?>"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/vendor/animsition/css/animsition.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/vendor/daterangepicker/daterangepicker.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/login/css/main.css') ?>">
	<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<!--===============================================================================================-->
</head>
  
<body>
	<div class="background-container">
<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1231630/moon2.png" alt="">
<div class="stars"></div>
<div class="twinkling"></div>
<div class="clouds"></div>
</div>
	
				<div class="login-box" >
					<p>Masuk</p>
					
					<div id="notifikasi">
						<?php if($this->session->flashdata('msg')):?>
							<div class="alert alert-primary">
								<?php  echo $this->session->flashdata('msg')?>
							</div>
						<?php endif ;?>
						<?php if($this->session->flashdata('msg_update')):?>
							<div class="alert alert-primary">
								<?php  echo $this->session->flashdata('msg_update')?>
							</div>
						<?php endif ;?>
						<?php if($this->session->flashdata('msg_gagal')):?>
							<div class="alert alert-danger">
								<?php  echo $this->session->flashdata('msg_gagal')?>
							</div>
						<?php endif ;?>
						<?php if($this->session->flashdata('msg_email')):?>
							<div class="alert alert-danger">
								<?php  echo $this->session->flashdata('msg_email')?>
							</div>
						<?php endif ;?>
					</div>
					<form class="#" action="<?php echo base_url('Login_pelamar/do_login') ?>" method="post">
					<div class="user-box">
     				 <input required="" name="username" type="text">
      				<label>Username</label>
    				</div>
    				<div class="user-box">
     				<input required="" name="password" type="password">
      				<label>Password</label>
    				</div>

					<button class="#" type="submit">
					<font color="#8d83a0"> 	
					<a>
      				<span></span>
     			 	<span></span>
      				<span></span>
     				<span></span>
     				Login
					</a></font></button>


				</form>
				<p align="center">Belum punya akun? <a href="<?php echo base_url('Daftar/') ?>" class="a2">Daftar Sekarang!</a></p>
				</div>
		
	
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/vendor/animsition/js/animsition.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets2/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/vendor/select2/select2.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets2/login/vendor/daterangepicker/daterangepicker.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/vendor/countdowntime/countdowntime.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/login/js/main.js') ?>"></script>

	<script type="text/javascript">
      $('#notifikasi').delay(8000).slideUp('slow');
    </script>

</body>
</html>