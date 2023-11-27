<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="../blog/vali-admin/hero-social.png">
  <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <?php
  if ($this->session->userdata('ses_idLevel') == 'Administrator') {
    $tittle = "Administrator Panel";
  } else if ($this->session->userdata('ses_idLevel') == 'Admin Sdm') {
    $tittle = "Admin SDM Panel";
  } else if ($this->session->userdata('ses_idLevel') == 'Psikolog') {
    $tittle = "Psikolog Panel";
  } else if ($this->session->userdata('ses_idLevel') == 'Perusahaan') {
    $tittle = "Perusahaan Panel";
  }
  ?>
  <title><?php echo $tittle ?> || Sistem E-recruitment</title>
  <link href=" <?php echo base_url('assets/images/shortcuticon.png') ?>" rel="shortcut icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bie.css') ?>">
  <link href="<?php echo base_url('assets/datetimepicker/css/bootstrap-datetimepicker.css'); ?>" rel="stylesheet">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/4.7.0/css/font-awesome.min.css') ?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
  </script>
  <script>
    MathJax = {
      tex: {
        inlineMath: [
          ['$', '$'],
          ['\\(', '\\)']
        ]
      }
    };
  </script>
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <header class="app-header"><a class="app-header__logo" href="index.html">E-Recruitment</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <!-- end header -->