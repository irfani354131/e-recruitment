<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets2/daftar/images/icons/favicon.ico') ?>"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/vendor/animsition/css/animsition.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/vendor/daterangepicker/daterangepicker.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/daftar/css/util.css') ?>">
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

	<div class="login-box">
      <p>Daftar</p>
          <form class="#" action="<?php echo base_url('Daftar/') ?>" method="post">

          <?php if($this->session->flashdata('msg_gagal')):?>
              <div class="alert alert-danger">
                <?php  echo $this->session->flashdata('msg_gagal')?>
              </div>
            <?php endif ;?>

          <div class="user-box" data-validate="Please enter username">
            <input  required="" type="text" name="username">
            <label>Username</label>
            
          </div>

          <div class="user-box" data-validate="Please enter email">
            <input  required="" type="email" name="email" >
            <label>Email</label>
          </div>

          <div class="user-box" data-validate = "Please enter password">
            <input required="" type="password" id="password" name="pass"  id="txtPassword">
          <label>Kata Sandi</label>
          </div>

          <div class="user-box" data-validate = "Please re-enter password">
            <input  required="" type="password" name="repass" id="confirm_password"  id="txtComfirmPassword">
          <label>Konfirmasi Kata Sandi</label>
          </div>

          <button class="#" type="submit">
          <font color="#8d83a0">  
          <a>
              <span></span>
            <span></span>
              <span></span>
            <span></span>
            Daftar
          </a></font></button>
        </form>
        <p align="center">Sudah punya akun? <a href="<?php echo base_url('Home/login2') ?>" class="a2">Masuk Sekarang</a></p>
      </div>

	<script type="text/javascript">
		
		var password = document.getElementById("password")
		, confirm_password = document.getElementById("confirm_password");

		function validatePassword(){
			if(password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords Tidak Sama");
			} else {
				confirm_password.setCustomValidity('');
			}
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
	
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/vendor/animsition/js/animsition.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets2/daftar/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/vendor/select2/select2.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets2/daftar/vendor/daterangepicker/daterangepicker.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/vendor/countdowntime/countdowntime.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/daftar/js/main.js') ?>"></script>

</body>
</html>