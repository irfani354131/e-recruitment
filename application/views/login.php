<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/4.7.0/css/font-awesome.min.css') ?>">
  <title>Login - E-Recruitment</title>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>E-Recruitment</h1>
    </div>
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
    </div>
    <div class="login-box"> 
      <form class="login-form" action="<?php echo base_url('Login/do_login') ?>" method="post">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input name="username" class="form-control" type="text" placeholder="Username" autocomplete="off" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input name="password" class="form-control" type="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="utility">
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
        </div>
      </form>
      <form class="forget-form" action="https://pratikborsadiya.in/vali-admin/index.html">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
          <label class="control-label">EMAIL</label>
          <input class="form-control" type="text" placeholder="Email">
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
        </div>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?php echo base_url('assets/js/plugins/pace.min.js') ?>"></script>
  <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
    <script type="text/javascript">
      $('#notifikasi').delay(5000).slideUp('slow');
    </script>
  </body>
  </html>