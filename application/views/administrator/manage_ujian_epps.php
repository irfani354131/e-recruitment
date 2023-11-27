<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> EPPS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item"><a href="#">Manage EPPS</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Manage EPPS</h3>
                <div class="tile-body">
                    <div id="notifikasi">
                        <?php if ($this->session->flashdata('msg')) : ?>
                            <div class="alert alert-primary">
                                <?php echo $this->session->flashdata('msg') ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('msg_update')) : ?>
                            <div class="alert alert-primary">
                                <?php echo $this->session->flashdata('msg_update') ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('msg_hapus')) : ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('msg_hapus') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tile-body">

                        <?php
                        $modal = 0;
                        $no = 1;
                        $id_admin = $this->session->userdata('ses_id');
                        foreach ($arraysma as $key) {
                            $nama_ujian = $key['nama_ujian'];
                            $query = $this->db->query("SELECT * FROM tb_admin where id_admin = $id_admin");
                            $waktu_mulai = $key['waktu_mulai'];
                            $waktu_akhir = $key['waktu_akhir'];
                            $status = $key['status'];
                        }
                        foreach ($arrays1 as $key1) {
                            $waktu_mulai1 = $key1['waktu_mulai'];
                            $waktu_akhir1 = $key1['waktu_akhir'];
                        }
                        ?>
                        <form action="<?php echo base_url('Administrator/Data_ujian/updateepps') ?>" method="post">

                            <div class="form-group">
                                <label class="control-label">Nama Ujian</label>
                                <input class="form-control" name="nama_ujian" value="<?php echo $nama_ujian ?>" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Waktu Mulai</label>
                                <input class="form-control time" name="waktu_mulai" value="<?php echo $waktu_mulai ?>" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Waktu Ujian (Menit) - SMA, SMP</label>
                                <input class="form-control" name="waktu_ujian" value="<?php echo (strtotime($waktu_akhir) - strtotime($waktu_mulai)) / 60 ?>" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Waktu Ujian (Menit) - D4/S1, S2, S3</label>
                                <input class="form-control" name="waktu_ujian1" value="<?php echo (strtotime($waktu_akhir1) - strtotime($waktu_mulai1)) / 60 ?>" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Waktu Berakhir - SMA, SMP</label>
                                <input class="form-control" value="<?php echo $waktu_akhir ?>" type="text" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Waktu Berakhir - D4/S1, S2, S3</label>
                                <input class="form-control" value="<?php echo $waktu_akhir1 ?>" type="text" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">STATUS : </label>
                                <input class="form-input" type="checkbox" value="aktif" name="status" <?php if ($status == "aktif") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                            </div>

                            <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('ses_nama'); ?>">

                            <input style="margin-top: 15px" type="submit" value="Perbarui" class="btn btn-primary">
                        </form>
                    </div>

                </div>
            </div>
        </div>
</main>


<?php $this->load->view('layout/footer') ?>