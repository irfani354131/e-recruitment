<!-- Sidebar menu-->

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">

  <?php

  $perusahaan = $this->session->userdata('ses_id');

  $image = $this->db->query("SELECT * FROM tb_perusahaan WHERE id_perusahaan = $perusahaan");

  foreach ($image->result() as $key) {

    $logoPerusahaan = $key->logo_perusahaan;
  }

  ?>

  <div class="app-sidebar__user"><img width="25%" class="app-sidebar__user-avatar" src="<?php echo ($logoPerusahaan != '' ? base_url('./upload/logo_perusahaan/' . $logoPerusahaan) : base_url('./upload/logo_perusahaan/default.png')); ?>" alt="User Image">

    <div>

      <p class="app-sidebar__user-name"><?php echo $this->session->userdata('ses_nama') ?></p>

      <p class="app-sidebar__user-designation"><?php echo $this->session->userdata('ses_idLevel') ?></p>

    </div>

  </div>

  <ul class="app-menu">

    <?php if ($this->session->userdata('ses_idLevel') == 'Administrator') { ?>

      <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Welcome" && $this->uri->segment(3) == "") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Welcome') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>



      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Data_lowongan') ?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lowongan Kerja</span></a></li>



      <!-- <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_motlet") {
                                            echo "active";
                                          } ?>" href="<?php echo base_url('Administrator/Data_motlet') ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Motivation Letter </span></a></li> -->



      <!--  <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Data_jadwal") {
                                            echo "active";
                                          } ?>" href="<?php echo base_url('Administrator/Data_jadwal') ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li> -->




      <li class="treeview <?php if ($this->uri->segment(2) == "Data_Pelatihan") {
                            echo "is-expanded";
                          } ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Pelatihan/Telent Test</span><i class="treeview-indicator fa fa-angle-right"></i></a>

        <ul class="treeview-menu">

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "master") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Data_Pelatihan/master') ?>"><i class="icon fa fa-circle-o"></i> Master Pelatihan/Talent Test</a></li>
          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "pendaftar") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Data_Pelatihan/pendaftar') ?>"><i class="icon fa fa-circle-o"></i> Data Pendaftar</a></li>

        </ul>

      </li>


      <li><a class="app-menu__item  <?php if ($this->uri->segment(3) == "data_faq" || $this->uri->segment(3) == "tambahdata_faq" || $this->uri->segment(3) == "edit_faq") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Welcome/data_faq') ?>"><i class="app-menu__icon fa fa-question-circle-o"></i><span class="app-menu__label">FAQ</span></a></li>




      <li class="treeview <?php if ($this->uri->segment(3) == "data_level" || $this->uri->segment(3) == "data_admin" || $this->uri->segment(3) == "data_perusahaan" || $this->uri->segment(3) == "data_psikolog" || $this->uri->segment(3) == "data_pelamar") {
                            echo "is-expanded";
                          } ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>

        <ul class="treeview-menu">

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_level") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_level') ?>"><i class="icon fa fa-circle-o"></i> Level</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_admin") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_admin') ?>"><i class="icon fa fa-circle-o"></i> Admin</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_perusahaan") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_perusahaan') ?>"><i class="icon fa fa-circle-o"></i> Perusahaan</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_psikolog") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_psikolog') ?>"><i class="icon fa fa-circle-o"></i> Psikolog</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_pelamar") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_pelamar') ?>"><i class="icon fa fa-circle-o"></i> Pelamar</a></li>

        </ul>

      </li>







    <?php } else if ($this->session->userdata('ses_idLevel') == 'Admin Sdm') { ?>

      <li><a class="app-menu__item  <?php if ($this->uri->segment(2) == "Dashboard") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Welcome') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Data_lowongan') ?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lowongan Kerja</span></a></li>

      <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_motlet") {
                                          echo "active";
                                        } ?>" href="<?php echo base_url('Administrator/Data_motlet') ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Motivation Letter </span></a></li> -->

      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_jadwal") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Data_jadwal') ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li>



      <li class="treeview <?php if ($this->uri->segment(3) == "data_level" || $this->uri->segment(3) == "data_admin" || $this->uri->segment(3) == "data_perusahaan" || $this->uri->segment(3) == "data_psikolog" || $this->uri->segment(3) == "data_pelamar") {
                            echo "is-expanded";
                          } ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>

        <ul class="treeview-menu">

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_level") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_level') ?>"><i class="icon fa fa-circle-o"></i> Level</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_admin") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_admin') ?>"><i class="icon fa fa-circle-o"></i> Admin</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_perusahaan") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_perusahaan') ?>"><i class="icon fa fa-circle-o"></i> Perusahaan</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_psikolog") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_psikolog') ?>"><i class="icon fa fa-circle-o"></i> Psikolog</a></li>

          <li><a class="treeview-item <?php if ($this->uri->segment(3) == "data_pelamar") {
                                        echo "active";
                                      } ?>" href="<?php echo base_url('Administrator/Welcome/data_pelamar') ?>"><i class="icon fa fa-circle-o"></i> Pelamar</a></li>

        </ul>

      </li>





    <?php } else if ($this->session->userdata('ses_idLevel') == 'Psikolog') { ?>

      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Welcome") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Administrator/Welcome') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Psikolog/Data_lowongan') ?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lowongan Kerja</span></a></li>

      <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_jadwal") {
                                          echo "active";
                                        } ?>" href="<?php echo base_url('Psikolog/Data_jadwal') ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li> -->

    




    <?php } else if ($this->session->userdata('ses_idLevel') == 'Perusahaan') {

      $ses_id = $this->session->userdata('ses_id');

      $query = $this->db->query("SELECT * FROM tb_lowongan WHERE id_perusahaan = $ses_id");

      foreach ($query->result() as $key) {

        $id = $key->id_perusahaan;
      }

    ?>

      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Dashboard") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Perusahaan/Dashboard') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

      <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_lowongan") {
                                      echo "active";
                                    } ?>" href="<?php echo base_url('Perusahaan/Data_lowongan/lowongan/' . $id) ?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lowongan Kerja</span></a></li>

      <!-- <li><a class="app-menu__item <?php if ($this->uri->segment(2) == "Data_jadwal") {
                                          echo "active";
                                        } ?>" href="<?php echo base_url('Perusahaan/Data_jadwal/jadwal/' . $id) ?>"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Jadwal Seleksi </span></a></li> -->

      
    <?php
    } ?>

  </ul>

</aside>

<!-- end sidebar menu -->