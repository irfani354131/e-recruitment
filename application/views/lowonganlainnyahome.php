<?php   $this->load->view('layout2/header') ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-3 col-xl-4  d-block">
            <h1 class="mb-0 site-logo"><img src="<?php echo base_url('assets2/images/companylogo.png') ?>" alt=""></h1>
            <!-- <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">imagine<span class="text-primary">.</span> </a></h1> -->
          </div>

          <div class="col-12 col-md-9 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li style="margin-left: -1000px;"><a href="#home-section" class="nav-link">BERANDA</a></li>
                <li><a href="#features-section" class="nav-link">LOWONGAN</a></li>
                <li><a href="#flow-section" class="nav-link">ALUR PENDAFTARAN</a></li>
                <li><a href="#faq-section" class="nav-link">FAQ</a></li>
                <li><a href="#contact-section" class="nav-link">HUBUNGI KAMI</a></li>
                <li><a href="<?php echo base_url('Login_pelamar/') ?>" class="nav-link">MASUK</a></li>
                <li><a href="<?php echo base_url('Home/daftar') ?>" class="nav-link">DAFTAR</a></li>
<!--                 <li><a href="#testimonials-section" class="nav-link">FAQ</a></li>
  <li><a href="#blog-section" class="nav-link">HUBUNGI KAMI</a></li> -->
<!--                 <li><a class="nav-link">MASUK</a></li>
  <li><a class="nav-link">REGISTRASI</a></li> -->
</ul>
</nav>
</div>


<div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

</div>
</div>

</header>

<div class="site-section" id="features-section">
  <div class="container">
    <div class="row justify-content-center text-center"  data-aos="fade-up">
      <div class="col-7 text-center mb-3">
        <h2 class="section-title">Lowongan Pekerjaan</h2>
        <p class="lead">Mulailah menemukan tujuan Anda dengan Choise. Lihat lowongan terbaru kami di bawah ini.</p>
      </div>
    </div>


    <div class="row align-items-stretch">
      <?php 
      foreach ($array as $key) { ?>
        <?php $perusahaan = $this->db->query("SELECT * FROM tb_perusahaan");
        foreach ($perusahaan->result() as $key_perusahaan) {
          if ($key_perusahaan->id_perusahaan==$key['id_perusahaan']) {
            $nama_perusahaan = $key_perusahaan->nama_perusahaan;
            $logo_perusahaan = $key_perusahaan->logo_perusahaan;
          } 
         } ?>
        <div class="col-md-6 col-lg-3 mb-3 mb-lg-3" data-aos="fade-up">
          <div class="unit-4 d-block">
            <div class="card-img-block">
              <img style="width: 130px" class="card-img-top" src="<?php echo ($logo_perusahaan != '' ? base_url('./upload/logo_perusahaan/' . $logo_perusahaan) : base_url('./upload/logo_perusahaan/img_default.jpg')); ?>">
            </div><br>
            <h3><?php echo $key['nama_jabatan'] ?></h3>
            <p><?php echo $nama_perusahaan ?></p>
            <div>
              <a href="<?php  echo base_url('Pelamar/Pelamar/lowongantersedia') ?>" class="btn btn-primary mr-2 mb-2">Lamar Posisi</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php   $this->load->view('layout2/footer') ?>