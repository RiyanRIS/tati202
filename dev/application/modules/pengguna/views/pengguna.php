<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
?>
<?= $this->load->view('template/head') ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->load->view('template/nav') ?>
        <div class="content-wrapper">
            <?= $this->load->view('template/content_header') ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?= site_url('pengguna/aksi') ?>" class="btn btn-success btn-sm">Tambah Pengguna</a>
                                </div>

                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>USERNAME</th>
                                                <th>ROLE</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pengguna as $key => $v) {
                                                ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $v->username ?></td>
                                                    <td><?= $v->role ?></td>
                                                    <td>
                                                    <?php if($v->id_user != '1'){ ?>
                                                        <a href="<?=site_url('pengguna/aksi/' . $v->id_user)?>" class="btn btn-info btn-sm">Ubah</a>
                                                        <button type="button" onclick="hapus('<?=site_url('pengguna/hapus/' . $v->id_user)?>')" class="btn btn-danger btn-sm">Hapus</button>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <?= $this->load->view('template/footer') ?>
    </div>

    <?= $this->load->view('template/script') ?>

</body>

</html>