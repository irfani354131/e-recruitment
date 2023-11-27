<?php $this->load->view('layout/header') ?>

<?php $this->load->view('layout/sidebar') ?>

<main class="app-content">

  <div class="app-title">

    <div>

      <h1><i class="fa fa-edit"></i> Edit Data FAQ</h1>

    </div>

    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

      <li class="breadcrumb-item">User</li>

      <li class="breadcrumb-item"><a href="#">Edit FAQ</a></li>

    </ul>

  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="tile">

        <h3 class="tile-title">Edit FAQ</h3>

        <div class="tile-body">

          <?php foreach ($data as $d) {

          ?>

            <form action="<?php echo base_url("Administrator/Welcome/edit_faq/" . $d['id_faq']) ?>" method="post">

              <!--<input class="form-control" name="id_faq" type="text" value="<?= $d['id_faq'] ?>">-->

              <div class="form-group">

                <label class="control-label">Pertanyaan</label>

                <input class="form-control" name="pertanyaan" type="text" placeholder="Pertanyaan" value="<?= $d['pertanyaan'] ?>">

              </div>

              <div class="form-group">

                <label class="control-label">Jawaban</label>

                <textarea name="jawaban" class="ckeditor" id="ckeditor" rows="3"><?= $d['jawaban'] ?></textarea>

              </div>

              <div class="form-group">

                <label class="control-label">STATUS : </label>

                <input class="form-input" type="checkbox" value="aktif" name="status" <?php if ($d['status'] == "aktif") {

                                                                                        echo "checked";

                                                                                      } ?>>

              </div>

              <input type="submit" value="Kirim" class="btn btn-primary">

              <a href="<?php echo base_url('Administrator/Welcome/data_faq') ?>" class="btn btn-secondary"> Cancel</a>

            </form>

        </div>

      <?php } ?>

      </div>

    </div>

  </div>

</main>

<?php $this->load->view('layout/footer') ?>